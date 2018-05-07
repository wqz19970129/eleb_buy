<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Plople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function create(Request $request,Plople $plople){
        //var_dump($request->plople);die;
        $id=$request->plople;
        return view('admins.create',compact('admin','id'));
    }
    public function store(Request $request){
        //var_dump($request);die;
        $this->validate($request,[
            'shop_name'=>'required',
            //'shop_img'=>'image',
            'brand'=>'required',
            'on_time'=>'required',
            'fengniao'=>'required',
            'bao'=>'required',
            'piao'=>'required',
            'zhun'=>'required',
            'start_send'=>'required',
            'send_cost'=>'required',
            'notice'=>'required',
            'discount'=>'required',

        ],
            [
                'shop_name.required'=>'用户名不能为空',
                //'shop_img.image'=>'图片不正确',
                'brand.required'=>'品牌不能为空',
                'on_time.required'=>'准时不能为空',
                'fengniao.required'=>'蜂鸟不能为空',
                'bao.required'=>'保不能为空',
                'piao.required'=>'票不能为空',
                'zhun.required'=>'按时不能为空',
                'start_send.required'=>'金额不能为空',
                'send_cost.required'=>'起价不能为空',
                'notice.required'=>'不能为空',
                'discount.required'=>'不能为空',
            ]);
        DB::transaction(function ()use ($request) {
          /*  $filename=$request->file('shop_img')->store('public/shop');
            //var_dump($request->p_id);die;
            $client =App::make('aliyun-oss');
            $object = "$filename";
            try{
                $client->uploadFile(getenv('OSS_BUCKET'), $object, storage_path('app/'.$filename));
            } catch(OssException $e) {
                printf(__FUNCTION__ . ": FAILED\n");
                printf($e->getMessage() . "\n");
                return;
            }
            print(__FUNCTION__ . ": OK" . "\n");*/
            Admin::create([
                    'shop_name'=>$request->shop_name,
                    'shop_img'=>$request->shop_img,
                    'brand'=>$request->brand,
                    'on_time'=>$request->on_time,
                    'fengniao'=>$request->fengniao,
                    'bao'=>$request->bao,
                    'piao'=>$request->piao,
                    'zhun'=>$request->zhun,
                    'start_send'=>$request->start_send,
                    'send_cost'=>$request->send_cost,
                    'notice'=>$request->notice,
                    'discount'=>$request->discount,
                    'p_id'=>$request->p_id,
                ]
            );
        });

        session()->flash('success','注册成功');
        return redirect()->route('help');
    }
    public function show(Request $request,Admin $admin){
        //$id=$plople->id;
        //var_dump($id);die;
        return view('admins.show',compact('admin'));
    }
    public function edit(Admin $admin){
        return view('admins.edit',compact('admin'));
    }
    public function update(Request $request,Admin $admin){
        $this->validate($request,[
            'shop_name'=>'required',
            //'shop_img'=>'image',
            'brand'=>'required',
            'on_time'=>'required',
            'fengniao'=>'required',
            'bao'=>'required',
            'piao'=>'required',
            'zhun'=>'required',
            'start_send'=>'required',
            'send_cost'=>'required',
            'notice'=>'required',
            'discount'=>'required',

        ],
            [
                'shop_name.required'=>'用户名不能为空',
                //'shop_img.image'=>'图片不正确',
                'brand.required'=>'品牌不能为空',
                'on_time.required'=>'准时不能为空',
                'fengniao.required'=>'蜂鸟不能为空',
                'bao.required'=>'保不能为空',
                'piao.required'=>'票不能为空',
                'zhun.required'=>'按时不能为空',
                'start_send.required'=>'金额不能为空',
                'send_cost.required'=>'起价不能为空',
                'notice.required'=>'不能为空',
                'discount.required'=>'不能为空',
            ]);
       if($request->shop_img){
           $admin->update([
                   'shop_name'=>$request->shop_name,
                   'shop_img'=>$request->shop_img,
                   'brand'=>$request->brand,
                   'on_time'=>$request->on_time,
                   'fengniao'=>$request->fengniao,
                   'bao'=>$request->bao,
                   'piao'=>$request->piao,
                   'zhun'=>$request->zhun,
                   'start_send'=>$request->start_send,
                   'send_cost'=>$request->send_cost,
                   'notice'=>$request->notice,
                   'discount'=>$request->discount,
               ]
           );
           session()->flash('success','修改成功');
           return redirect()->route('admin.show',compact('admin'));
       }else{
           $admin->update([
                   'shop_name'=>$request->shop_name,
                   //'shop_img'=>$filename,
                   'brand'=>$request->brand,
                   'on_time'=>$request->on_time,
                   'fengniao'=>$request->fengniao,
                   'bao'=>$request->bao,
                   'piao'=>$request->piao,
                   'zhun'=>$request->zhun,
                   'start_send'=>$request->start_send,
                   'send_cost'=>$request->send_cost,
                   'notice'=>$request->notice,
                   'discount'=>$request->discount,
               ]
           );
           session()->flash('success','修改成功');
           return redirect()->route('admin.show',compact('admin'));
       }

    }
}
