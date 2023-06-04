<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\HomeCourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {

        if ($request->new) {
            $query = Course::orderBy('id', 'desc');
        } else if ($request->discount) {
            $query = Course::whereNotNull('sale_price');
        }
        $query ??= Course::orderBy('id', 'asc');
        $courses = $request->limit ? $query->take($request->limit)->get() : $query->get();

        return HomeCourseResource::collection($courses);
    }

    public function show(Request $request, Course $course)
    {
        $course->load(['institute', 'teachers']);
        return new CourseResource($course);
    }
}
