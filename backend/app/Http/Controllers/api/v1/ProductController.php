<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Product;
use App\Http\Requests\v1\StoreProductRequest;
use App\Http\Requests\v1\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ProductResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller implements HasMiddleware
{
    use ApiResponseTrait, AuthorizesRequests;

    public static function middleware()
    {
        return [
            new Middleware("permission:product-create", only: ['store']),
            new Middleware("permission:product-update", only: ['update']),
            new Middleware("permission:product-delete", only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->success($this->paginateResponse(Product::with(['brand', 'subCategory', 'store'])->paginated($request->integer('per_page')), ProductResource::class), "fetch data successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize("create", Product::class);
        $userStore = $request->user()->store;
        if ($userStore) {
            $product = Product::create(array_merge($request->validated(), ['store_id' => $userStore->id]));
            return $this->success(new ProductResource($product->load(['store', 'brand', 'subCategory'])), "create data successfully", 201);
        }
        return $this->error("You dont have store", 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->success(new ProductResource($product->load(['store', 'brand', 'subCategory'])), "fetch data successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize("update", $product);
        $userStore = $request->user()->store;
        if ($userStore  && $userStore->id === $product->store_id) {
            $product->update($request->validated());
            return $this->success(new ProductResource($product), "update data successfully");
        }
        return $this->error("You dont own this store , or dont have a store", 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        $this->authorize("delete", $product);
        $userStore = $request->user()->store;
        if ($userStore && $userStore->id === $product->store_id) {
            $product->delete();
            return $this->success(new ProductResource($product), "delete data successfully");
        }
        return $this->error("You dont own this store , or dont have a store", 404);
    }
}
