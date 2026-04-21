<?php

namespace App\Http\Controllers\api\v1;

use App\Models\SubCategory;
use App\Http\Requests\v1\StoreSubCategoryRequest;
use App\Http\Requests\v1\UpdateSubCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\SubCategoryCollection;
use App\Http\Resources\v1\SubCategoryResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    use ApiResponseTrait;
    use AuthorizesRequests;
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
        $this->authorize('view', $subCategory);
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
