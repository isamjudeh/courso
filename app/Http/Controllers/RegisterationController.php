<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterationStoreRequest;
use App\Models\Registeration;
use App\Models\Student;
use Illuminate\Http\Request;

class RegisterationController extends Controller
{
    public function store(RegisterationStoreRequest $request)
    {
        $student = Student::where('course_id', $request->course_id)->where('user_id', auth()->id())->first();
        $notification = auth()->user()->notifications()->where('course_id', $request->course_id)->first();
        if ($student || $notification) {
            return response([
                'message' => 'انت بالفعل قمت بتقديم طلب تسجيل على هذا الكورس'
            ], 400);
        }

        Registeration::create(array_merge($request->validated(), ['user_id' => auth()->id()]));

        return response()->noContent();
    }

    public function approve(Request $request, Registeration $registeration)
    {
        $request->validate([
            'user_approved' => ['required', 'boolean'],
        ]);

        if ($request->user_approved) {
            $registeration->course->students()->create(['user_id' => $registeration->user->id]);
            $registeration->delete();
        }

        return response()->noContent();
    }
}
