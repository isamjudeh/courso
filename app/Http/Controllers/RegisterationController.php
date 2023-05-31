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
        $registeration = Registeration::create($request->validated());

        return new RegisterationResource($registeration);
    }
}
