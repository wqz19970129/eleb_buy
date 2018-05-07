<?php

namespace App\Http\Controllers;

use App\Addoder;
use App\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddoderController extends Controller
{
    //
    public function index(){
        $id=Auth::user()->id;
        //dd($id);
        $a_id=DB::table('admins')->where('p_id',$id)->value('id');
        //dd($a_id);
        $orders=DB::table('addoders')->where('shop_id',$a_id)->get();
        return view('addoders.index',compact('orders'));
    }

    public function edit(Addoder $Addoder){
        $id=$Addoder->id;
        if($Addoder->status==1){
            DB::table('addoders')->where('id',$id)->update(['status'=>0]);
            return redirect()->route('Addoder.index');
        }else{
            DB::table('addoders')->where('id',$id)->update(['status'=>1]);
            return redirect()->route('Addoder.index');
        }
    }
    public function show(Addoder $Addoder){
        $s_id=$Addoder->id;

        $id=$Addoder->shop_id;
        //var_dump($id);die;
        $orders=DB::table('ordergs')->where([['order_id',$s_id] ,['a_id',$id]])->get();
        return view('addoders.show',compact('orders'));
    }
    //日订单
    public function care(){
        return view('addoders.care');
    }
    public function show1(Request $request){
        $start=$request->start;
        //dd($start.' 00:00:00');
        $start1=$start.' 00:00:00';
        $start2=$start.' 23:59:59';
        $id=Auth::user()->id;
        //dd($id);
        $a_id=DB::table('admins')->where('p_id',$id)->value('id');
        $orders=DB::select("select * from addoders where shop_id='{$a_id}'and  created_at BETWEEN '{$start1}' and '{$start2}'");
        //dd($orders);
        $count=DB::table('addoders')->whereBetween('created_at',[$start1,$start2])->whereRaw('shop_id',$a_id)->count();
        //dd($count);
        return view('addoders.show1',compact('orders','count'));
    }
    //月订单
    public function care1(){
        return view('addoders.care1');
    }
    public function show2(Request $request){
        $start=$request->start;
        $end=$request->end;
        //dd($end);
        $id=Auth::user()->id;
        //dd($id);
        $a_id=DB::table('admins')->where('p_id',$id)->value('id');
        //dd($a_id);
        $count=DB::table('addoders')->whereBetween('created_at',[$start,$end])->whereRaw('shop_id',$a_id)->count();
        //dd($count);
        return view('addoders.show2',compact('count'));
    }
    public function care2(){
        $id=Auth::user()->id;
        //dd($id);
        $a_id=DB::table('admins')->where('p_id',$id)->value('id');
        $count=DB::table('addoders')->where('shop_id',$a_id)->count();
        //dd($count);
        return view('addoders.care2',compact('count'));
    }
    //查看菜品

    public function goods(){
        $id=Auth::user()->id;
        //dd($id);
        $a_id=DB::table('admins')->where('p_id',$id)->value('id');
        $goods=DB::table('goods')->where('a_id',$a_id)->get();
        //dd($goods);
        $amount=0;
        foreach ($goods as $good){
            $g_id=$good->id;
           $rows=DB::table('ordergs')->where('goods_id',$g_id)->get();
            foreach ($rows as $row){
                $amount+=$row->amount;
            }
        }
        //dd($amount);
        return view('addoders.list',compact('goods','amount'));
    }
    //菜品的日记录
        public function goods2(){
     return view('addoders.goods2');
    }
    public function show3(Request $request){
        $start=$request->start;
        //dd($start.' 00:00:00');
        $start1=$start.' 00:00:00';
        $start2=$start.' 23:59:59';
        $id=Auth::user()->id;
        //dd($id);
        $a_id=DB::table('admins')->where('p_id',$id)->value('id');
        $goods=DB::select("select goods_name,sum(amount)as a from ordergs where a_id='{$a_id}'and  created_at BETWEEN '{$start1}' and '{$start2}' GROUP by goods_name");
        /*goods = DB::select('select goods_name,sum(amount) from ordergs where 1=1 GROUP  by goods_name');*/
        //dd($goods);
        return view('addoders.list1',compact('goods'));
    }
//菜品的月记录
    public function goods3(){
        return view('addoders.goods3');
    }
    public function show4(Request $request){
        $start=$request->start;
        $end=$request->end;
        //dd($end);
        $id=Auth::user()->id;
        //dd($id);
        $a_id=DB::table('admins')->where('p_id',$id)->value('id');
        //dd($a_id);
        $goods=DB::select("select goods_name,sum(amount)as a from ordergs where a_id='{$a_id}'and  created_at BETWEEN '{$start}' and '{$end}' GROUP by goods_name");
        //dd($count);
        return view('addoders.list2',compact('goods'));
    }
}
