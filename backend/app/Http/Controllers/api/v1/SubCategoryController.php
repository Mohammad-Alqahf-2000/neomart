<?php

namespace App\Http\Controllers\api\v1;

use App\Models\SubCategory;
use App\Http\Requests\v1\StoreSubCategoryRequest;
use App\Http\Requests\v1\UpdateSubCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\SubCategoryResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Override;

class SubCategoryController extends Controller implements HasMiddleware
{
    use ApiResponseTrait, AuthorizesRequests;

    #[Override]
    public static function middleware()
    {
        return [
            new Middleware('permission:subCategory-create', only: ['store']),
            new Middleware('permission:subCategory-update', only: ['update']),
            new Middleware('permission:subCategory-delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->success($this->paginateResponse(SubCategory::paginated($request->integer('per_page')), SubCategoryResource::class), "fetch data successfully");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $this->authorize('create', SubCategory::class);
        return $this->success(new SubCategoryResource(SubCategory::create($request->validated())), "created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        return $this->success(new SubCategoryResource($subCategory), "fetch data sucessfully");
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $this->authorize('update', $subCategory);
        $subCategory->update($request->validated());
        return $this->success(new SubCategoryResource($subCategory), "updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $this->authorize('delete', $subCategory);
        $subCategory->delete();
        return $this->success(new SubCategoryResource($subCategory), "deleted successfully");
    }
}
