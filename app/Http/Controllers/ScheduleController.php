<?php

namespace App\Http\Controllers;

use App\Course;
use App\Examday;
use App\Room;
use App\Schedule;
use App\User;
use Illuminate\Http\Request;

use Auth;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $invigilators = User::where('role_id', '3')->orderBy('created_at', 'desc')->get();
        $examdays = Examday::all();
        $rooms = Room::orderBy('rmnumber', 'asc')->get();
        $courses = Course::orderBy('code', 'asc')->get();
        $schedules = Schedule::orderBy('created_at','desc')->get();

        return view('admin.schedule.index', compact('user', 'invigilators', 'examdays','rooms','courses','schedules'));
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
            'room_id' => 'required',
            'user_id' => 'required',
            'examday_id' => 'required',
            'course_id' => 'required',
            'examtime' => 'required',
        ]);

        // $inputs = $request->all();
        // $user_ids = $inputs['user_id'];
       

        //Multiple insert queries
        // foreach ($user_ids as $user_id) {
        //     $users[] = [
        //         'user_id' => $user_id,
        //         'examday_id' => $request->examday_id,
        //         'room_id' => $request->room_id,
        //         'course_id' => $request->course_id,
        //         'examtime' => $request->examtime,
                
        //     ];
        // }

        Schedule::create($request->all());


        return redirect()->back();
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
