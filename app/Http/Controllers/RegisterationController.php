<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterationStoreRequest;
use App\Http\Resources\RegisterationResource;
use App\Models\Registeration;
use Illuminate\Http\Request;

class RegisterationController extends Controller
{
    public function store(RegisterationStoreRequest $request)
    {
        $registeration = Registeration::create(array_merge($request->validated(), ['user_id' => auth()->id()]));

        return new RegisterationResource($registeration);
    }

    public function approve(Request $request, Registeration $registeration)
    {
        $request->validate([
            'user_approved' => ['required'],
        ]);

        $registeration->course->students()->create(['user_id' => $registeration->user->id]);
        $registeration->delete();

        return response()->noContent();
    }
}
