<?php

namespace App\Http\Controllers;

use App\Good;
use App\Goodcate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoodscateController extends Controller
{
    //
    public function __construct()
    {        //出这个之外的都要验证权限
        $this->middleware('auth',[
            'except'=>['create',]
        ]);

       /* $this->middleware('guest', [
            'only' => ['create']
        ]);*/
    }
    public function index(){
        //var_dump(Auth::user()->id);die;
        $goodscates=Goodcate::all()->where('a_id','=',Auth::user()->id);
        return view('goodcates.index',compact('goodscates'));
    }
    public function create(){
        return view('goodcates.create');
    }
    public function store(Request $request){
     $this->validate($request,[
         'name'=>'required',
         'detail'=>'required',

     ],[
         'name.required'=>'菜名不为空',
         'detail.required'=>'详情不为空',
         ]
         );
        $id= Auth::user()->id;
        //var_dump($id);die;
        Goodcate::create(
            ['name'=>$request->name,
                'detail'=>$request->detail,
                'a_id'=>$id
                ]
        );
        session()->flash('success','添加成功');
        return redirect()->route('goodscate.index');
    }
    public function destroy(Goodcate $goodscate,Request $request){
        $id=$goodscate->id;
        $c_id=Good::select('c_id')->where('c_id',$id)->first();
        //var_dump($c_id);die;
        if(empty($c_id)){
            $goodscate->delete();
            return redirect()->route('goodscate.index');
        }else{
            session()->flash('danger','下面存在东西不能删除');
            return redirect()->route('goodscate.index');
        }
    }
    public function edit(Goodcate $goodscate){
        //var_dump($goodcate);die;e
        return view('goodcates.edit',compact('goodscate'));
    }
    public function update(Request $request,Goodcate $goodscate){
        $this->validate($request,[
            'name'=>'required',
            'detail'=>'required',

        ],[
                'name.required'=>'菜名不为空',
                'detail.required'=>'详情不为空',
            ]
        );
        $id= Auth::user()->id;
        //var_dump($id);die;
        $goodscate->update(
            ['name'=>$request->name,
                'detail'=>$request->detail,
                'a_id'=>$id
            ]
        );
        session()->flash('success','修改成功');
        return redirect()->route('goodscate.index');
    }
    public function show(Goodcate $goodscate,Request $request){
        //var_dump($goodscate->id);die;

    }
}
