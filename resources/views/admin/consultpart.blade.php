@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
        <div class="template-demo">
            <h1>{{$sql['consult_name']}}</h1>
            <h6>科室 : {{$sql['office_name']}}</h6>

            内容 : <div class="card-body">
                <p>{{$sql['consult_content']}}</p>
            </div>
        </div>
@endsection