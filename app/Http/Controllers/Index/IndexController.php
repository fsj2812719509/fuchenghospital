<?php

namespace App\Http\Controllers\Index;

use App\Model\ConsultModel;
use App\Model\OfficeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        //查询导航
        $res = OfficeModel::where(['office_statue'=>2])->get();

        return view('index.index',['res'=>$res]);
    }

    public function IndexOffice(){
        $office_id = $_GET['office_id'];

        //查询导航
        $res = OfficeModel::where(['office_statue'=>1])->get();

        //根据id查询资讯
        $sql = ConsultModel::where(['office_id'=>$office_id])->get();

        return view('index.indexoffice',['sql'=>$sql,'res'=>$res]);

    }

    public function IndexPart(){
        //根据ip查询详情
        $consult_id = $_GET['consult_id'];
        $where = [
            'consult_id'=>$consult_id
        ];
        $sql = ConsultModel::where($where)->first();
        $res = OfficeModel::where(['office_statue'=>1])->get();
        return view('index.indexpart',['sql'=>$sql,'res'=>$res]);

    }
}
