<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\PermissionResourse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Override;

class PermissionController extends Controller implements HasMiddleware
{
    use AuthorizesRequests, ApiResponseTrait;

    public static function middleware()
    {
        return [
            new Middleware('permission:permission-list',only:['index']),
            new Middleware('permission:permission-show',only:['show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Permission::class);
        return $this->success($this->paginateResponse(Permission::with('roles')->paginated($request->integer('per_page')), PermissionResourse::class), "fetch data successfully");
    }


    public function show(Permission $permission)
    {
        $this->authorize('view', $permission);
        return $this->success(new PermissionResourse($permission->load("roles")), "fetch data succssfully");
    }
}
