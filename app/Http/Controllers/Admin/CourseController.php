<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Count;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view ('backend.system.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view ('backend.system.courses.create',compact('users','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'required',
            'np_name' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'description' => 'required | max:4000'
        ],[
            'user_id.required' => 'User is required',
            'category_id.required' => 'Category is required'
        ]);

        $course = Course::create([
            'en_name' => $request->en_name,
            'np_name' => $request->np_name,
            'status' => $request->status,
            'slug' => Str::slug($request->en_name),
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'views' => 0,
        ]);

        return redirect()->route('admin.courses.index')->with('message','Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $users = User::all();
        $categories = Category::all();
        return view ('backend.system.courses.edit',compact('course','users','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'en_name' => 'required | unique:users,en_name,'.$id,
            'np_name' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'description' => 'required | max:4000'
        ]);

        $course = tap(Course::find($id))->update([
            'en_name' => $request->en_name,
            'np_name' => $request->np_name,
            'status' => $request->status,
            'slug' => Str::slug($request->en_name),
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.courses.index')->with('message','Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::find($id);
        $course->delete();
        return redirect()->back()->with('message','Course deleted successfully!');
    }
}
