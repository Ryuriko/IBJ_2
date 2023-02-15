<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_category;

class Course_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$course_category = Course_category::paginate(10);
        return response()->json([
			"data" => $course_category
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course_category = Course_category::create([
			'name' => $request->name
		]);
		
		return response()->json([
			"data" => $course_category
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course_category $course_category)
    {
        return response()->json([
			"data" => $course_category
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course_category $course_category)
    {
        $course_category->name = $request->name;
		$course_category->save();
		
		return response()->json([
			"data" => $course_category
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course_category $course_category)
    {
        $course_category->delete();
		
		return response()->json([
			"message" => "Course Category Has Been Deleted"
		], 204);
    }
}
