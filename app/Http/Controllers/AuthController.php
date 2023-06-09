<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
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

    public function profile()
    {
        $user = auth()->user();
        return response([
            'user' => $user,
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update($request->validated());
        $user->refresh();
        return response([
            'user' => $user,
        ]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
