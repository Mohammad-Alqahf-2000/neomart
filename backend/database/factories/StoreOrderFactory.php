<?php

namespace Database\Factories;

use App\Enums\StoreOrderStatusEnum;
use App\Enums\StoreOrderTaxTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Store;
use App\Models\StoreOrder;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StoreOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static array $usedCommbinations = [];

    public function definition(): array
    {

        $orders = Order::pluck('id')->toArray();
        $stores = Store::pluck('id')->toArray();

        $existing = StoreOrder::select('order_id', 'store_id')->get()->mapWithKeys(fn($item) => ["{$item->order_id}-{$item->store_id}" => true])->toArray();

        $allUsed = array_merge($existing, self::$usedCommbinations);

        $attempts = 0;
        do {
            $orderId = fake()->randomElement($orders);
            $storeId = fake()->randomElement($stores);

            $key = "{$orderId}-{$storeId}";
            $attempts++;

            if ($attempts > 1000) {
                throw new \RunTimeException("No more unique cominations available");
            }
        } while (isset($allUsed[$key]));

        self::$usedCommbinations[$key] = true;

        $shipping = fake()->randomFloat(2, 0, 99);
        $totalSub = fake()->randomFloat(1, 0, 9999);
        $taxType = fake()->randomElement(StoreOrderTaxTypeEnum::cases());
        $taxRate = $taxType === StoreOrderTaxTypeEnum::PERCENTAGE ? fake()->randomFloat(2, 0, 50) : fake()->randomFloat(2, 0, 200);
        $taxAmount = $taxType === StoreOrderTaxTypeEnum::PERCENTAGE  ? $totalSub * ($taxRate / 100) : $taxRate;
        $total = $totalSub - $taxAmount;
        return [
            "shipping_cost" => $shipping,
            "tax_rate" => $taxRate,
            "tax_amount" => $taxAmount,
            "tax_type" => $taxType,
            "total_sub" => $totalSub,
            'status' => fake()->randomElement(StoreOrderStatusEnum::cases()),
            "total" => $total,
            "order_id" => $orderId,
            "store_id" => $storeId,
        ];
    }
}
