<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function index(){
        $activitys=Activity::all();
    return view('activitys.index',compact('activitys'));
    }
    public function show(Activity $activity){
        return view('activitys.show',compact('activity'));
    }
}
