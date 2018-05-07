<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    public function index(){
        return view('password.index');
    }
    public function edit(Request $request){
        $this->validate($request,
            [
                'password'=>'required',
                'new'=>'required|confirmed',
            ],
        [
            'password.required'=>'密码不为空',
            'new.required'=>'密码不为空',
            'new.confirmed'=>'两次密码一致',
        ]
            );
        if(Hash::check($request->password,Auth::user()->password)){
            $new=bcrypt($request->new);
            $id=Auth::user()->id;
            DB::update("update ploples set password='{$new}' where id='{$id}'");
            session()->flash('success','修改成功');
            return  redirect()->route('login');
        }else{
            session()->flash('success','修改失败');
            return  redirect()->route('edit');
        }
    }
}
