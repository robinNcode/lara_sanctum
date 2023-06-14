<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    /**
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        $request->validated($request->all());

        if(!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('', 'Invalid login credentials!', 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of: ' . $user->name)->plainTextToken
        ], 'Login successful!');
    }

    public function register(StoreUserRequest $request): JsonResponse
    {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of: ' . $user->name)->plainTextToken
            ],
            'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([], 'Logout successful!, Your token has been destroyed!');
    }
}
