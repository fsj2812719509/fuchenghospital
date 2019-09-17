@extends('index/layouts/main')

@section('title', '后台首页')


@section('content')
    @foreach($sql as $k=>$v)
    <div class="template-demo">
        <a href="/IndexPart?consult_id={{$v['consult_id']}}">
            <h2>{{$v['consult_name']}}</h2>
        </a>
    </div>
    @endforeach
@endsection