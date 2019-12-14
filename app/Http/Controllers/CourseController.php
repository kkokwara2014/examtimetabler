<?php

namespace App\Http\Controllers;

use App\Classlevel;
use Illuminate\Http\Request;
use App\Course;
use App\Department;
use App\Semester;
use App\User;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $classlevels = Classlevel::all();
        $departments = Department::orderBy('name', 'asc')->get();
        $courses = Course::orderBy('created_at', 'desc')->get();
        $invigilators = User::where('role_id', '2')->orderBy('lastname', 'asc')->get();

        return view('admin.course.index', compact('courses', 'departments', 'classlevels', 'user', 'invigilators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'code' => 'required',
            'classlevel_id' => 'required',
            'department_id' => 'required',
        ]);

        Course::create($request->all());

        return redirect(route('course.index'));
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
        $user = Auth::user();
        $classlevels = Classlevel::all();
        $departments = Department::orderBy('name', 'asc')->get();
        $courses = Course::where('id', $id)->first();
        $invigilators = User::where('role_id', '2')->orderBy('lastname', 'asc')->get();

        return view('admin.course.edit', compact('courses', 'departments', 'classlevels', 'user', 'invigilators'));
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
        $this->validate($request, [
            'title' => 'required|string',
            'code' => 'required',
            'classlevel_id' => 'required',
            'department_id' => 'required',
        ]);

        $course = Course::find($id);
        $course->title = $request->title;
        $course->code = $request->code;
        
        $course->classlevel_id = $request->classlevel_id;
       
        $course->department_id = $request->department_id;
       

        $course->save();

        return redirect(route('course.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = Course::where('id', $id)->delete();
        return redirect()->back();
    }
}
