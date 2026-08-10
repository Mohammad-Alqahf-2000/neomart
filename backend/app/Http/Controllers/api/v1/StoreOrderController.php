<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\StoreOrderResource;
use Illuminate\Http\Request;
use App\Models\StoreOrder;
use App\Traits\ApiResponseTrait;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreOrderController extends Controller implements HasMiddleware
{
    use ApiResponseTrait, AuthorizesRequests;
    public static function middleware()
    {
        return [
            new Middleware("permission:storeOrder-list", only: ['index']),
            // new Middleware("permission:storeOrder-show", only: ['show']),
            // new Middleware("permission:storeOrder-create", only: ['store']),
            // new Middleware("permission:storeOrder-update", only: ['update']),
            // new Middleware("permission:storeOrder-delete", only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', StoreOrder::class);
        if ($request->user()->store) {
            return $this->success($this->paginateResponse(StoreOrder::where('store_id', $request->user()->store->id)->with('storeOrderItems')->paginated($request->integer("per_page")), StoreOrderResource::class), "fetch data successfully");
        }
        return $this->error("You cant reach this area");
    }
}
