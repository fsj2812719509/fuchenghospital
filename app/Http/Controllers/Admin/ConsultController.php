<?php

namespace App\Http\Controllers\Admin;

use App\Model\ConsultModel;
use App\Model\OfficeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultController extends Controller
{
    public function ConsultAddList(){
        $res = OfficeModel::where(['office_statue'=>1])->get();
        return view('admin.consultaddlsit',['res'=>$res]);
    }

    public function ConsultAddDo(Request $request){
        $dataInfo=$request->input();
        if(empty($dataInfo["consult_name"] || empty($dataInfo["consult_content"]) || empty($dataInfo["office_id"]) )){
            $arr=[
                "code"=>40000,
                "msg"=>"必填项不能为空",
                "data"=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $dataInfo["consult_statue"]=1;
        $res=ConsultModel::insertGetId($dataInfo);
        if($res){
            $arr=[
                "code"=>200,
                "msg"=>"添加成功",
                "data"=>[
                    "id"=>$res
                ]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                "code"=>40001,
                "msg"=>"添加失败",
                "data"=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    public function ConsultList(){
        //两表联查
        $sql =ConsultModel::join('office', function ($join) {
                $join->on('consult.office_id', '=','office.office_id');
            })->get();
        return view('admin.consultlist',['sql'=>$sql]);
    }

    public function ConsultDel(){
        $consult_id = $_GET['consult_id'];

        $where = [
            'consult_id'=>$consult_id
        ];

        $sql = ConsultModel::where($where)->update(['consult_statue'=>0]);
        if($sql==1){
            echo '删除成功';
            header("refresh:2;url='/consultList'");
        }else{
            echo '删除失败';
        }
    }

    public function ConsultUpdateList(){
        $consult_id = $_GET['consult_id'];

        $where = [
            'consult_id'=>$consult_id
        ];

        $data = ConsultModel::where($where)->join('office', function ($join) {
            $join->on('consult.office_id', '=','office.office_id');
        })->first();
        $res = OfficeModel::where(['office_statue'=>1])->get();
        return view('admin.consultupdate',['data'=>$data,'res'=>$res]);
    }

    public function ConsultUpdateDo(Request $request){
        $consult_id = $request->input('consult_id');
        $consult_name = $request->input('consult_name');
        $consult_content = $request->input('consult_content');
        $office_id = $request->input('office_id');

        if($consult_name==''){
            return 2;
        }else if($consult_content==""){
            return 3;
        }else if($office_id==""){
            return 4;
        }

        $data = [
            'consult_name'=>$consult_name,
            'consult_content'=>$consult_content,
            'office_id'=>$office_id
        ];
        //根据id修改
       $res =  ConsultModel::where(['consult_id'=>$consult_id])->update($data);
       if($res==1){
           return 5;
       }else{
           return 6;
       }

    }

    public function ConsultPart(Request $request){
        $consult_id = $_GET['consult_id'];
        $sql =ConsultModel::where(['consult_id'=>$consult_id])->join('office', function ($join) {
            $join->on('consult.office_id', '=','office.office_id');
        })->first();
        return view('admin.consultpart',['sql'=>$sql]);
    }

    public function ConsultRecover(){
        $consult_id = $_GET['consult_id'];

        $where = [
            'consult_id'=>$consult_id
        ];

        $sql = ConsultModel::where($where)->update(['consult_statue'=>1]);
        if($sql){
            echo '恢复成功';
            header("refresh:2;url='/ConsultList'");
        }else{
            echo '恢复失败';
        }
    }
}
