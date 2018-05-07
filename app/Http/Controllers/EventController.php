<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    //
    public function index(){
        $events=DB::table('events')->get();
        return view('events.index',compact('events'));
    }
    public function hert(Request $request){
    $event_id=$request->event_id;
    //dd($event_id);
        $member_id=Auth::user()->id;
        //dd($member_id);
        $events=DB::insert("insert into eventmembers SET `events_id`='{$event_id}',`member_id`='{$member_id}'");
        //return view('events.index',compact('events'));
        $rows=DB::table('eventmembers')->where('member_id',$member_id)->orwhere('events_id',$event_id)->first();
//        dd($rows);
        $ids=$rows->events_id;
        //var_dump($ids);die;
        session()->flash('success','报名成功');
        return redirect()->route('events.index',compact('ids'));
    }
}
