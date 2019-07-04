@extends('admin.layout.master')
@section('admin_title','PageHome: administrator')
@section('admin_content')
    <div class="row content-right">
        <div class="col-md-12">
        @yield('admin_content_right')
        </div>
    </div>
@endsection