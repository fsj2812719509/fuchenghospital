@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">资讯展示</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            资讯id
                        </th>
                        <th>
                            资讯名字
                        </th>
                        <th>
                            所属科室
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sql as $k=>$v)
                        <tr class="table-info">
                            <td>
                                {{$v['consult_id']}}
                            </td>
                            <td>
                                {{$v['consult_name']}}
                            </td>
                            <td>
                                {{$v['office_name']}}
                            </td>

                            @if($v['consult_statue']==1)
                                <td>
                                    <a href="/ConsultDel?consult_id={{$v['consult_id']}}">
                                        <label class="badge badge-danger">删除</label>
                                    </a>
                                    <a href="/ConsultUpdateList?consult_id={{$v['consult_id']}}">
                                        <label class="badge badge-danger">修改</label>
                                    </a>
                                    <a href="/ConsultPart?consult_id={{$v['consult_id']}}">
                                        <label class="badge badge-danger">查看详情</label>
                                    </a>
                                </td>
                            @elseif($v['consult_statue']==0)
                                <td>
                                    <a href="/ConsultRecover?consult_id={{$v['consult_id']}}">
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