<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\HomeCourseResource;
use App\Models\Course;
use App\Models\User;
use App\Models\UserToken;
use Illuminate\Http\Request;
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
        auth()->user()->firebaseTokens()->create(['token' => $request->fcm_token]);
        return response([
            'token' => $token,
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $user->firebaseTokens()->create(['token' => $request->fcm_token]);

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
        $image = ['image' => $request->file('image')->storeAs('images', $user->id)];
        $user->update(array_merge($request->validated(), $image));
        $user->refresh();

        return response([
            'user' => $user,
        ]);
    }

    public function courses()
    {
        $courses = Course::whereHas('students', fn ($query) => $query->where('user_id', auth()->id()))->get();

        return HomeCourseResource::collection($courses);
    }

    public function logout(Request $request)
    {
        UserToken::where('token', $request->fcm_token)->first()->delete();
        auth()->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
