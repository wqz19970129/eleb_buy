<?php

namespace App\Http\Controllers;

use App\Plople;
use Illuminate\Http\Request;

class PlopleController extends Controller
{
    //
    public function index(){
        return view('ploples.index');
    }
    public function create(){
     return view('ploples.plople');
    }

        public function store(Request $request){
            $this->validate($request,[
                'name'=>'required|max:50',
                'password'=>'required|confirmed|min:6',
                'phone'=>'required|max:11',
            ],
                [
                    'name.required'=>'用户名不能为空',
                    'phone.required'=>'电话不能为空',
                    'password.required'=>'密码不能为空',
                    'password.confirmed'=>'两次密码一致',
                    'password.min'=>'密码最小为6',
                ]);

            Plople::create([
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'password'=>bcrypt($request->password),
                ]
            );
            session()->flash('success','注册成功');
            return redirect()->route('login');
        }

}
