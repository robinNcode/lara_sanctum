<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use HttpResponses;

    /**
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'min:8|required'
        ]);

        return $this->success([$request->all()], 'This is the login method');
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
            'Registration successful');
    }

    public function logout(Request $request)
    {
        return 'This is the logout method';
    }
}
