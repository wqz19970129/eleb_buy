<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Plople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    //
    public function create(){
        return view('sessions.create');
    }
    public function store(Request $request,Admin $admin){
        //var_dump($request);die;
        /*$remember = $request->remember;
        var_dump($request->has('remember'));exit;*/
        $this->validate($request,
            [
                'name'=>'required',
                'password'=>'required',
            ],[
                'name.required'=>$request->name,
                'password.required'=>$request->password,
            ]);
       //var_dump(Auth::user()->id);die;
        $name=$request->name;
        //var_dump($name);die;
        $id=Plople::where('name','=',$name)->value('id');
        //var_dump($id);die;
          $status=Admin::where('p_id','=',$id)->value('status');
        //var_dump($status);die;

        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password,'status'=>1],$request->has('remember'))){
            session()->flash('success','登陆成功,审核通过');
            //$p_id=Auth::user()->id;
            //$id=DB::table('admins')->where('p_id',$p_id)->value('id');
            //var_dump($id);die;
            return redirect()->route('help',[Auth::user()]);
        }else{
            session()->flash('danger','登陆失败,审核等待中');
            return redirect()->back()->withInput();
        }
    }
    public function destroy(){
        Auth::logout();
        session()->flash('success','成功退出');
        return redirect('login');
    }

}
