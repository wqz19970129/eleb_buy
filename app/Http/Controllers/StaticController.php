<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    //
    public function help(Request $request){
        //var_dump($request->a_id);die;
        return view('help/help',compact('a_id'));
    }
    public function show(Request $request){
       //return redirect()->route('admins.show',compact( 'admin'));
        //return view('help.show');
        $p_id=$request->p_id;
        //var_dump($id);
        $id=DB::table('admins')->where('p_id',$p_id)->value('id');
        //var_dump($id);
        //$admins=DB::table('admins')->where('id',$id)->get();
        $admins=Admin::where('id',$id)->get();
        return view('help/show',compact('admins'));
    }
}
