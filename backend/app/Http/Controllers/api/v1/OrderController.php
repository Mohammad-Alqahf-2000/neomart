<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\User;

use App\Http\Requests\v1\StoreOrderRequest;
use App\Http\Requests\v1\UpdateOrderRequest;

use App\Http\Resources\v1\OrderResource;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use App\Traits\ApiResponseTrait;
use App\Services\OrderService;

class OrderController extends Controller implements HasMiddleware
{
    use ApiResponseTrait, AuthorizesRequests;

    public static function middleware()
    {
        return [
            new Middleware("permission:order-list", only: ['index']),
            new Middleware("permission:order-show", only: ['show']),
            new Middleware("permission:order-create", only: ['store']),
            new Middleware("permission:order-update", only: ['update']),
            new Middleware("permission:order-delete", only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Order::class);
        return $this->success($this->paginateResponse(Order::with("storeOrders", "user", 'storeOrders.store')->paginated($request->integer("per_page")), OrderResource::class), "fetch data successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, OrderService $orderService)
    {
        $this->authorize('create', Order::class);
        return $this->success(new OrderResource($orderService->checkout($request->user(), $request->validated())), "create data successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order, User $user, OrderService $orderService)
    {
        $this->authorize('view', $order);
        return $this->success(new OrderResource($order->load(['user', 'storeOrders'])), "fetch data successfully");
    }
    public function userOwnOrders(Request $request)
    {
        $this->authorize('viewAny', Order::class);
        return  $this->success($this->paginateResponse(Order::where('user_id', $request->user()->id)->with('storeOrders', 'storeOrders.store')->paginated($request->integer("per_page")), OrderResource::class), "fetch data successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order, OrderService $orderService)
    {
        $this->authorize('update', $order);
        return $this->success(new OrderResource($orderService->updateOrder($order, $request->validated(), $request->user())), "update data successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Order $order)
    // {
    //     //
    // }

    public function cancel(Request $request, Order $order, OrderService $orderService)
    {
        $this->authorize('update', $order);
        return $this->success($orderService->cancelOrder($order, $request->user()), "order canceled successfully");
    }
}
