<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('pages.course', compact('courses'));
    }

    public function detail($id)
    {
        $course = Course::with(['category'])->find($id);
        return view('pages.detail', compact('course'));
    }
}
