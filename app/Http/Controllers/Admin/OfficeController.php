<?php

namespace App\Http\Controllers\Admin;

use App\Model\OfficeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeController extends Controller
{
    //科室添加页面
    public function OfficeAddList(){
        return view('admin.officeaddlist');
    }

    //科室添加
    public function OfficeDo(Request $request){
        $office_name = $request->input('office_name');
        if($office_name==''){
            echo 4;
        }
        //查询是否有相同的科室
        $where = [
            'office_name'=>$office_name
        ];
        $res = OfficeModel::where($where)->first();
        if($res==''){
            $data = [
                'office_name'=>$office_name,
                'office_time'=>time(),
                'office_statue'=>1
            ];

            //链接数据库
            $sql = OfficeModel::insert($data);
            if($sql){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            echo '3';
        }
    }

    public function OfficeList(){
        $res = OfficeModel::get();
        return view('admin.officelist',['res'=>$res]);

    }

    public function OfficeDel(){
        $office_id = $_GET['office_id'];

        $where = [
            'office_id'=>$office_id
        ];

        $sql = OfficeModel::where($where)->update(['office_statue'=>0]);
        if($sql==1){
            echo '删除成功';
            header("refresh:2;url='/OfficeList'");
        }else{
            echo '删除失败';
        }

    }

    public function OfficeRecover(){
        $office_id = $_GET['office_id'];

        $where = [
            'office_id'=>$office_id
        ];

        $sql = OfficeModel::where($where)->update(['office_statue'=>1]);
        if($sql==1){
            echo '恢复成功';
            header("refresh:2;url='/OfficeList'");
        }else{
            echo '恢复失败';
        }
    }

    public function OfficeUpdateList(){
        $office_id = $_GET['office_id'];

        $where = [
            'office_id'=>$office_id
        ];

        $data = OfficeModel::where($where)->first();
        return view('admin.officeupdate',['data'=>$data]);
    }

    public function OfficeUpdate(Request $request){

        $office_name = $request->input('office_name');
        $office_id = $request->input('office_id');
        if($office_name==''){
            echo 4;
        }
        $sql = OfficeModel::where(['office_id'=>$office_id])->update(['office_name'=>$office_name]);
        if($sql){
            echo 1;
        }else{
            echo 2;
        }
    }
}
