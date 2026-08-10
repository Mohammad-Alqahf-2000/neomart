<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentStatusEnum;
use App\Enums\StoreOrderStatusEnum;
use App\Enums\StoreOrderTaxTypeEnum;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;
use App\Models\StoreOrderItem;
use App\Models\StoreOrder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Store;
use Exception;

class OrderService
{
    use ApiResponseTrait;
    public function __construct() {}
    public function showUserOrder(Order $order, $user)
    {
        // if($user_id === $order->user_id){
        //     return
        // } else {
        //     return $this->error("403",)
        // }
    }

    // cart = {items:[{product_id , product_name ,product_price , quantity , store_order_id},{product_id , product_name ,product_price , quantity , store_order_id},..etc] ,note}
    public function checkout(User $userData, array $cart): Order
    {
        return DB::transaction(function () use ($userData, $cart) {
            $orderTotalAmount = 0;
            $itemsWithFreshPrice = [];

            // Verify prices if match with product price, then calculate totals
            $itemsWithFreshPrice = $this->checkProducts($cart);

            // create order (the grandpa)
            // dd($cart['note'] ?? null);
            $order = Order::create([
                'user_id' => $userData->id,
                'note' => $cart['note'],
                "status" => OrderStatusEnum::PENDING,
                "paid_at" => null,
                "payment_status" => PaymentStatusEnum::PENDING,
                "total_amount" => 0,
            ]);

            $orderTotalAmount = $this->createStoreOrders($order->id, $itemsWithFreshPrice);

            $order->update([
                'total_amount' => $orderTotalAmount
            ]);
            return $order;
        });
    }
    public function cancelOrder(Order $order, $userData)
    {
        // Check if user own this order
        if ($order->user_id !== $userData->id) {
            throw new Exception("You are not allowed to cancel this order");
        }

        // Cancel orders only which have "pending" status
        if ($order->status === 'pending' && $order->payment_status === 'pending') {

            $order->update([
                'status' => 'canceled',
                'payment_status' => "canceled",
            ]);

            // update storeOrder status too.
            $order->storeOrders()->update(['status' => 'canceled']);

            return true;
        }

        throw new Exception("You can't cancel this order.");
    }
    public function updateOrder($order, $updatedCart, $userData)
    {
        return DB::transaction(function () use ($order, $updatedCart, $userData) {
            // Check if who own order. he is update it?
            if ($userData->id !== $order->user_id) {
                throw new Exception("You cant update this order");
            }
            $order = Order::findOrFail($order->id);


            // Check order status ( Update orders only which have "pending" , 'processing' status)
            if ($order->status !== OrderStatusEnum::PENDING || $order->payment_status !== PaymentStatusEnum::PENDING) {
                throw new Exception("You cant update order in this status.");
            }

            // Delete all StoreOrders and StoreOrderItems
            foreach ($order->storeOrders as $storeOrder) {
                $storeOrder->storeOrderItems()->delete();
                $storeOrder->delete();
            }

            $itemsWithFreshPrice = $this->checkProducts($updatedCart);
            $newOrderTotalAmount = $this->createStoreOrders($order->id, $itemsWithFreshPrice);

            // update totalAmount , note  (after get total amount)
            $order->update([
                'total_amount' => $newOrderTotalAmount,
                'note' => $updatedCart['note'] ?? $order->note,
            ]);

            return $order;
        });
    }
    public function createStoreOrders($orderId, $items)
    {
        $totalAmount = 0;
        // Grouping by store_id
        $itemGroupedByStore = collect($items)->groupBy("store_id");

        foreach ($itemGroupedByStore as $storeId => $storeItems) {

            $store = Store::findOrFail($storeId);

            // caluelate total for products
            $productsTotal = $storeItems->sum(function ($item) {
                return (float)$item['price'] * (int)$item['quantity'];
            });

            // bring shipping cost from store
            $shippingCost = (float) $store->shipping_cost;

            // Calulate tax amount
            $taxAmount = 0;
            if ($store->tax_type === StoreOrderTaxTypeEnum::PERCENTAGE) {
                $taxAmount = $productsTotal * ($store->tax_rate / 100);
            } else {
                $taxAmount = (float) $store->tax_rate;
            }

            // caluculate
            $storeTotal = $productsTotal + $taxAmount + $shippingCost;
            $totalAmount += $storeTotal;

            $storeOrder = StoreOrder::create([
                'order_id' => $orderId,
                'store_id' => $storeId,
                'shipping_cost' => $shippingCost,
                "tax_rate" => $store->tax_rate,
                "tax_amount" => $taxAmount,
                "tax_type" => $store->tax_type,
                "total_sub" => $productsTotal,
                "total" => $storeTotal,
                "status" => StoreOrderStatusEnum::PENDING,
            ]);

            foreach ($storeItems as $storeItem) {
                // dd($storeOtrd);
                StoreOrderItem::create([
                    "store_order_id" => $storeOrder->id,
                    "product_id" => $storeItem['product_id'],
                    "product_name" => $storeItem['product_name'],
                    "product_price" => $storeItem['price'],
                    "quantity" => $storeItem['quantity'],
                ]);
            }
        }
        return $totalAmount;
    }
    private function checkProducts($cart)
    {
        $itemsWithFreshPrice = [];
        foreach ($cart['items'] as $item) {
            $product = Product::findOrFail($item['product_id']);

            if ((float)$product->price !== (float)$item['product_price']) {
                throw new Exception("The price has been changed. Try again!!!" . $product->price . "  |" . $item['product_price']);
            }
            if (!($product->ar_name === $item['product_name'] || $product->en_name === $item['product_name'])) {
                throw new Exception("The name has been changed. Try again!!!!");
            }

            $notFound = true;

            foreach ($itemsWithFreshPrice as &$itemWithFreshPrice) {
                if ($itemWithFreshPrice['product_id'] === $item['product_id']) {
                    $itemWithFreshPrice['quantity'] += $item['quantity'];
                    $notFound = false;
                    break;
                }
            }
            unset($itemWithFreshPrice);
            if ($notFound) {
                array_push($itemsWithFreshPrice, array_merge($item, [
                    "price" => $product->price,
                    "store_id" => $product->store_id,
                ]));
            }
        }
        // dd($itemsWithFreshPrice);
        return $itemsWithFreshPrice;
    }
}
