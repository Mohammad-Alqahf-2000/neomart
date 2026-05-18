<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Store;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\v1\StoreStoreRequest;
use App\Http\Requests\v1\UpdateStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\PermissionCollection;
use App\Http\Resources\v1\PermissionResourse;
use App\Http\Resources\v1\StoreResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class StoreController extends Controller
{
    use ApiResponseTrait, AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->success($this->paginateResponse(Store::with("user")->paginated($request->integer('per_page')), StoreResource::class), 'fetch data succssfully');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        $this->authorize('create', Store::class);

        if (Store::where('user_id', $request->user()->id)->exists()) {
            return $this->error("You already have a store", 403);
        }

        $user = $request->user();
        $store = Store::create(array_merge($request->validated(), ['user_id' => $user->id]));
        $user->assignRole('seller');

        return $this->success(new StoreResource($store->load("user")), "create data successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return $this->success(new StoreResource($store->load('user')), "fetch data successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $this->authorize('update', $store);
        if ($request->user()->id == $store->user_id) {
            $store->update($request->validated());
            return $this->success(new StoreResource($store->load('user')),"update data successfully");
        }
        return $this->error("Unable to do this",404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
         $this->authorize('delete', $store);
         $store->delete();
         return $this->success(new StoreResource($store->load('user')),"delete data successfully");
    }
}
