@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">资讯添加</h4>
                <form class="forms-sample">
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">资讯名称</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="consult_name" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">资讯内容</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="consult_content" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">所属科室</label>
                        <div class="col-sm-9">
                            <select name="" id="sel" class="form-control">
                                @foreach($res as $k=>$v)
                                    <option value="{{$v['office_id']}}">{{$v['office_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="button" class="btn btn-gradient-primary mr-2" id="btn" value="提交">

                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#btn").click(function () {
                var conslut_name= $("#consult_name").val();
                var consult_content = $("#consult_content").val();
                var office_id = $("#sel").val();

                $.ajax({
                    url:"/ConsultAddDo",
                    data:{consult_name:conslut_name,consult_content:consult_content,office_id:office_id},
                    dataType:"json",
                    method:"post",
                    success:function (msg) {
                       if(msg.code=200){
                           alert(msg.msg);
                           location.href="/consultList";
                       }else{
                           alert(msg.msg);
                           location.href="/ConsultAddList";
                       }
                    }
                })
            })
        })
    </script>

@endsection