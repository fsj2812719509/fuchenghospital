@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">资讯添加</h4>
            <form class="forms-sample">
                <input type="hidden" value="{{$data['consult_id']}}" id="consult_id">
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">资讯名称</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="consult_name" placeholder="Username" value="{{$data['consult_name']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">资讯内容</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="consult_content" rows="4">{{$data['consult_content']}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">所属科室</label>{{$data['office_name']}}

                    <div class="col-sm-9">

                        <select name="" id="sel" class="form-control">

                            @foreach($res as $k=>$v)
                            <option value="{{$v['office_id']}}">{{$v['office_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="button" class="btn btn-gradient-primary mr-2" id="btn" value="修改">

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
            var consult_id = $("#consult_id").val();

            $.ajax({
                url:"/ConsultUpdateDo",
                data:{consult_name:conslut_name,consult_content:consult_content,office_id:office_id,consult_id:consult_id},
                dataType:"json",
                method:"post",
                success:function (msg) {
                    if(msg==1) {
                        alert('姓名不能为空');
                    }else if(msg==2){
                        alert('内容必填');
                    }else if(msg==5){
                        alert('修改成功');
                        location.href="/consultList";
                    }else if(msg==6){
                        alert('修改失败');
                    }
                }
            })
        })
    })
</script>

@endsection