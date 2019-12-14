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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
