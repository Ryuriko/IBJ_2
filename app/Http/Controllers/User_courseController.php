<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_course;

class User_courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_course = User_course::paginate(10);
		
		return response()->json([
			"data" => $user_course
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
        $user_course = User_course::create([
			'user_id' => $request->user_id,
			'course_id' => $request->course_id,
		]);
		
		return response()->json([
			"data" => $user_course
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User_course $user_course)
    {
        return response()->json([
			"data" => $user_course
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_course $user_course)
    {
        $user_course->user_id = $request->user_id;
		$user_course->course_id = $request->course_id;
		$user_course->save();
		
		return response()->json([
			"data" => $user_course
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_course $user_course)
    {
        $user_course->delete();
		
		return response()->json([
			"message" => "User Course Has Been Deleted"
		], 204);
    }
}
