<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response([
                'message' => 'Email or password is wrong',
            ], 401);
        }

        $token = auth()->user()->createToken("token")->plainTextToken;

        return response([
            'token' => $token,
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $token = $user->createToken("token")->plainTextToken;

        return response([
            'token' => $token,
        ]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
