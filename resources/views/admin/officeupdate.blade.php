@extends('admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">科室修改</h4>
                <form class="forms-sample">
                    <input type="hidden" value="{{$data['office_id']}}" id="office_id">
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">科室名称</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  placeholder="Username" id="office_name" value="{{$data['office_name']}}">
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
                var office_name = $("#office_name").val();
                var office_id = $("#office_id").val();

                $.ajax({
                    url:"/OfficeUpdate",
                    data:{office_name:office_name,office_id:office_id},
                    dataType:"json",
                    type:"post",
                    success:function (msg) {
                        if(msg==1){
                            alert('添加成功');
                            location.href="/OfficeList";
                        }else if(msg==2){
                            alert('添加失败');
                        }else if(msg==4){
                            alert('科室名称不能为空');
                        }
                    }
                })
            })
        })
    </script>
@endsection
