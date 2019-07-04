@extends('admin.layout.index')
@section('admin_title')
{{$info->title_post}}
@stop
@section('admin_content_right')
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <h2>Title name: {{$info->title_post}}</h2>
    <strong>{{$info->intro}}</strong>
    <div class="content">
        {{$info->content}}
    </div>
    <small>Published date: {{ $info->updated_at }}</small>
</div>
@endsection