<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\RedirectResponse;
use Laravel\Sanctum\PersonalAccessToken as Token;

class AuthController extends Controller
{
    private APIs\AuthController $auth;

    public function __construct()
    {
        $this->auth = new APIs\AuthController();
    }

    public function signin(LoginUserRequest $request)
    {
        $response = $this->auth->login($request);

        if ($response->getStatusCode() != 200) {
            return redirect()->back()->with('error', $response->getData()->message);
        }

        $request->session()->put('token', $response->getData()->data->token);
        $request->session()->put('user', $response->getData()->data->user);

        return redirect()->route('home');
    }

    public function signout(): RedirectResponse
    {
        // Retrieve the token instance
        $token = Token::findToken(session('token'));

        if ($token) {
            // Revoke the token
            $token->delete();
        } else {
            // Token not found
            return redirect()->route('signin-view')->with('error', 'Token not found!');
        }

        session()->forget('token');
        session()->forget('user');

        return redirect()->route('signin-view');
    }
}
