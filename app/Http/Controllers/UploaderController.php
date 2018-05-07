<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UploaderController extends Controller
{
    //
    public function upload(Request $request){
        $filename=$request->file('file')->store('public/shop');
        $client =App::make('aliyun-oss');
        $object = "$filename";
        try{
            $client->uploadFile(getenv('OSS_BUCKET'), $object, storage_path('app/'.$filename));
            return ['url'=>'https://laravel-elem.oss-cn-beijing.aliyuncs.com/'.$filename];
        } catch(OssException $e) {
            printf(__FUNCTION__ . ": FAILED\n");
            printf($e->getMessage() . "\n");
            return;
        }
        print(__FUNCTION__ . ": OK" . "\n");
    }
}
