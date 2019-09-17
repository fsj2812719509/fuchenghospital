@extends('admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">科室展示</h4>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>科室名称</th>
                        <th>添加科室时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($res as $k=>$v)
                    <tr>
                        <td>{{$v['office_name']}}</td>
                        <td>{{$v['office_time']}}</td>
                        @if($v['office_statue']==1)
                            <td>
                                <a href="/OfficeDel?office_id={{$v['office_id']}}">
                                    <label class="badge badge-danger">删除</label>
                                </a>
                                <a href="/OfficeUpdateList?office_id={{$v['office_id']}}">
                                    <label class="badge badge-danger">修改</label>
                                </a>
                            </td>
                            @elseif($v['office_statue']==0)
                            <td>
                                <a href="/OfficeRecover?office_id={{$v['office_id']}}">
                                    恢复
                                </a>
                            </td>

                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection