<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Brand;
use App\Http\Requests\v1\StoreBrandRequest;
use App\Http\Requests\v1\UpdateBrandRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BrandCollection;
use App\Http\Resources\v1\BrandResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use ApiResponseTrait;
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->success($this->paginateResponse(Brand::paginated($request->integer('per_page')), BrandResource::class), "fetch data successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $this->authorize('create', Brand::class);
        return $this->success(new BrandResource(Brand::create($request->validated())), 'created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $this->authorize('view', $brand);
        return $this->success(new BrandResource($brand), "fetch data successfully");
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $this->authorize('update', $brand);
        $brand->update($request->validated());
        return $this->success(new BrandResource($brand), "updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $this->authorize('delete', $brand);
        $brand->delete();
        return $this->success(new BrandResource($brand), "deleted successfully");
    }
}
