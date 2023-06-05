<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeInstituteResource;
use App\Http\Resources\InstituteCollection;
use App\Http\Resources\InstituteResource;
use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index(Request $request)
    {
        $institutes = $request->limit ? Institute::take($request->limit)->get() : Institute::all();

        return HomeInstituteResource::collection($institutes);
    }

    public function show(Request $request, Institute $institute)
    {
        $institute->load('courses');
        return new InstituteResource($institute);
    }
}
