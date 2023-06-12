<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\HomeCourseResource;
use App\Http\Resources\HomeInstituteResource;
use App\Models\Course;
use App\Models\Institute;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SearchRequest $request)
    {
        $courses = Course::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->q) . '%'])->get();
        $institutes = Institute::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->q) . '%'])->get();

        return response([
            'courses' => HomeCourseResource::collection($courses),
            'institutes' => HomeInstituteResource::collection($institutes),
        ]);
    }
}
