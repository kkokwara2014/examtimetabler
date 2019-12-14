<?php

namespace App\Http\Controllers;

use App\Room;
use Auth;
use App\Block;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $blocks = Block::orderBy('name', 'asc')->get();
        $rooms = Room::orderBy('created_at', 'desc')->get();

        return view('admin.room.index', compact('user', 'blocks','rooms'));
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
            'rmnumber' => 'required',
            'block_id' => 'required',
           
        ]);

        Room::create($request->all());

        return redirect(route('room.index'));
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
        $blocks = Block::orderBy('name', 'asc')->get();
        $rooms = Room::where('id', $id)->first();

        return view('admin.room.edit', compact('user', 'blocks','rooms'));
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
            'rmnumber' => 'required',
            'block_id' => 'required',
           
        ]);

        $room = Room::find($id);
        $room->rmnumber = $request->rmnumber;
        $room->block_id = $request->block_id;
       
        $room->save();

        return redirect(route('room.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rooms = Room::where('id', $id)->delete();
        return redirect()->back();
    }
}
