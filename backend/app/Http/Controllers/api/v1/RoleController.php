<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\v1\StoreRoleRequest;
use App\Http\Requests\v1\UpdateRoleRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\RoleCollection;
use App\Http\Resources\v1\RoleResourse;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use ApiResponseTrait;
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Role::class);
        return $this->success($this->paginateResponse((Role::with('permissions')->paginated($request->integer('per_page'))), RoleResourse::class, 'permissions'), "fetch data successfully");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $this->authorize('create', Role::class);
        $role = Role::create($request->only('en_name', 'ar_name'));
        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }
        return $this->success(new RoleResourse($role->load("permissions")), 'create data successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $this->authorize('view', $role);
        return $this->success(new RoleResourse($role->load("permissions")), "fetch data successfully");
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);
        $role->update($request->only('en_name', 'ar_name'));
        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }
        return $this->success(new RoleResourse($role->load("permissions")), 'update data successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->authorize("delete", $role);
        $oldRole = $role->load('permissions');
        $role->delete();
        return $this->success(new RoleResourse($oldRole), "delete data successfully");
    }
}
