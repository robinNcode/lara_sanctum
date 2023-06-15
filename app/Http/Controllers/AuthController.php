<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    private APIs\AuthController $auth;

    public function __construct()
    {
        $this->auth = new APIs\AuthController();
    }

    public function signin(LoginUserRequest $request): JsonResponse
    {
        return $this->auth->login($request);
    }
}
