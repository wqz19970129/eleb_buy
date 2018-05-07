<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //
    protected $fillable = [
        'goods_name','is_selected','a_id','c_id','goods_img','rating','goods_price','detail','month_sales','satisfy_count','satisfy_rate'
    ];
    public function goodscate(){
        return $this->belongsTo(Goodcate::class,'c_id');//User::class  'App\User'
    }
}
