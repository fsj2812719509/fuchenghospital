@extends('public.common')
@section('sidebar')

@endsection
@section('content')
    <form action="/Demo/add" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo" id="">
        <button>上传</button>
    </form>
@endsection


@include('public.js')
<script>
    $(function(){
        layui.use('layer', function(){
            var layer = layui.layer;
//        layer.alert('酷毙了', {icon: 1});
        })
    })

</script>