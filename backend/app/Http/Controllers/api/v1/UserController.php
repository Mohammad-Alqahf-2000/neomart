<?php

namespace App\Http\Controllers\api\v1;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\LoginUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\v1\RegisterUserRequest;
use App\Http\Resources\v1\UserResource;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->attach(Role::select('id')->where('slug', 'client')->first()->id);
        return response()->json(['data' => ["message" => 'register successfully']], 201);
    }
    public function login(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }
        $user = User::where('email', $request->email)->FirstOrFail();
        $tokenName = $user->roles[0]->slug;
        $tokenPermissions = $user->roles[0]->permissions->pluck('slug')->toArray();
        $expirationDate = Carbon::now()->addDays(3);
        $user = $user->createToken($tokenName, $tokenPermissions, $expirationDate);
        return response()->json(['data' => ["token" => $user->plainTextToken, "role" => $user->accessToken->name]], 200);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['data' => ["message" => 'Logout successfully']], 200);
    }
    public function user (Request $request)g
    {
        return response()->json(['data' => ["user" => $request->user()->currentAccessToken()->tokenable]], 200);
    }
}
