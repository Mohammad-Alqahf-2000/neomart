<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Category;
use App\Http\Requests\v1\StoreCategoryRequest;
use App\Http\Requests\v1\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CategoryResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Override;

class CategoryController extends Controller implements HasMiddleware
{
    use ApiResponseTrait, AuthorizesRequests;

    public static function middleware()
    {
        return [
            new Middleware("permission:category-create", only: ['store']),
            new Middleware("permission:category-update", only: ['update']),
            new Middleware("permission:category-delete", only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->success($this->paginateResponse(Category::with('subCategories')->paginated($request->integer('per_page')), CategoryResource::class), 'fetch data successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('category-create', Category::class);
        return $this->success(new CategoryResource(Category::create($request->validated())->load("subCategories")), "created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $this->success(new CategoryResource($category->load("subCategories")), 'fetch data successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('category-update', $category);
        $category->update($request->validated());
        return $this->success(new CategoryResource($category->load("subCategories")), "updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize('category-delete', $category);
        $category->delete();
        return $this->success(new CategoryResource($category->load("subCategories")), "deleted successfully");
    }
}
