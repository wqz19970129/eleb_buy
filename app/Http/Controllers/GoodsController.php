<?php

namespace App\Http\Controllers;

use App\Good;
use App\Goodcate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    //->paginate(3)
    public function __construct()
    {        //出这个之外的都要验证权限
        $this->middleware('auth',[
            'except'=>['create','store']
        ]);
       /* $this->middleware('guest', [
            'only' => ['create']
        ]);*/
    }
    public function index(){
        $id=Auth::user()->id;
        $a_id=DB::table('admins')->where('p_id',$id)->value('id');
        $goods=Good::where('a_id','=',$a_id)->paginate(3);
        //var_dump($goods);die;
        return view('goods.index',compact('goods'));
    }
    public function create(Request $request){
        $goodscates=Goodcate::select('*')->get();
        //var_dump($names);die;
        return view('goods.create',compact('goodscates'));
    }
    public function store(Good $good,Request $request){
        $this->validate($request,
            [
                'goods_name'=>'required',
                'rating'=>'required',
                'goods_price'=>'required',
                'detail'=>'required',
                'month_sales'=>'required',
                'rating_count'=>'required',
                'satisfy_count'=>'required',
                //'satisfy_rate'=>'required',
                'c_id'=>'required',
                //'goods_img'=>'image',
            ],[
                'goods_name.required'=>'姓名为空',
                'rating.required'=>'评分为空',
                'goods_price.required'=>'价格为空',
                'detail.required'=>'详情为空',
                'month_sales.required'=>'月销售为空',
                'rating_count.required'=>'评分比率为空',
                'satisfy_count.required'=>'好评为空',
                //'satisfy_rate.required'=>'好平率为空',
                'c_id.required'=>'分类为空',
                //'goods_img.image'=>'图片为空',
            ]
            );
        $id=Auth::user()->id;

        Good::create([
            'goods_name'=>$request->goods_name,
            'rating'=>$request->rating,
            'goods_price'=>$request->goods_price,
            'detail'=>$request->detail,
            'month_sales'=>$request->month_sales,
            'rating_count'=>$request->rating_count,
            'satisfy_count'=>$request->satisfy_count,
            //'satisfy_rate'=>$request->satisfy_rate,
            'c_id'=>$request->c_id,
            'a_id'=>$id,
            'goods_img'=>$request->goods_img,
        ]);
        session()->flash('success','添加成功');
        return redirect()->route('goods.index');
    }
    public function edit(Good $good){
        $goodscates=Goodcate::select('*')->get();
       return view('goods.edit',compact('good','goodscates'));
    }
    public function update(Request $request,Good $good){
        //var_dump($request->input());exit;
        $this->validate($request,
            [
                'goods_name'=>'required',
                'rating'=>'required',
                'goods_price'=>'required',
                'detail'=>'required',
                'month_sales'=>'required',
                //'rating_count'=>'required',
                'satisfy_count'=>'required',
                //'satisfy_rate'=>'required',
                'c_id'=>'required',
                //'logo'=>'image',
            ],[
                'goods_name.required'=>'菜名为空',
                'rating.required'=>'评分为空',
                'goods_price.required'=>'价格为空',
                'detail.required'=>'详情为空',
                'month_sales.required'=>'月销售为空',
                //'rating_count.required'=>'评分比率为空',
                'satisfy_count.required'=>'好评为空',
                //'satisfy_rate.required'=>'好平率为空',
                'c_id.required'=>'分类为空',
                //'logo.image'=>'图片为空',
            ]
        );
        $id=Auth::user()->id;
        if($request->goods_img){
            /*$filename=$request->file('logo')->store('public/goods');
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
            $good->update([
                'goods_name'=>$request->goods_name,
                'rating'=>$request->rating,
                'goods_price'=>$request->goods_price,
                'detail'=>$request->detail,
                'month_sales'=>$request->month_sales,
                'rating_count'=>$request->rating_count,
                'satisfy_count'=>$request->satisfy_count,
                //'satisfy_rate'=>$request->satisfy_rate,
                'c_id'=>$request->c_id,
                'a_id'=>$id,
                'goods_img'=>$request->goods_img,
            ]);
            session()->flash('success','修改成功');
            return redirect()->route('goods.index');
        }else{
            $good->update([
                'goods_name'=>$request->goods_name,
                'rating'=>$request->rating,
                'goods_price'=>$request->goods_price,
                'detail'=>$request->detail,
                'month_sales'=>$request->month_sales,
                'rating_count'=>$request->rating_count,
                'satisfy_count'=>$request->satisfy_count,
                //'satisfy_rate'=>$request->satisfy_rate,
                'c_id'=>$request->c_id,
                'a_id'=>$id,
            ]);
            session()->flash('success','修改成功');
            return redirect()->route('goods.index');
        }
    }
 public function destroy(Good $good){
    $good->delete();
    echo 'success';
 }
}
