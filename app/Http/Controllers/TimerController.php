<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimerController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function calldeveloper()
    {
        return view('calldeveloper.callus');
    }
}
