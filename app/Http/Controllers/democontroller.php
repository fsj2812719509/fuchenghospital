<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\user;


class democontroller extends Controller
{
    public function demo(){
        return view('demo');
    }

    public function js(){
        return view('public.js');
    }

    public function add(Request $request){
        $post = $request->all();
        $output = $this->Douploade('photo');
        dd($output);

    }

    public function Douploade($photoname){
        if (request()->hasFile($photoname) && request()->file($photoname)->isValid()) {
            $photo = request()->file($photoname);
            $extension = $photo->extension();
            $dirName = date('Y-m-d');
            $store_result = $photo->store($dirName);
//            $store_result = $photo->storeAs('photo', 'test.jpg');
            $output = [
                'extension' => $extension,
                'store_result' => $store_result
            ];
            return $output;
        }
        exit('未获取到上传文件或上传过程出错');
    }

    /*
     * 监听sql
     */
    public function demosql(){
        $user = new user;
        $user->name='崔金虎';
        $user->save();
    }
}
