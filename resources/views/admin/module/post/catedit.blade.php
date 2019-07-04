@extends('admin.layout.index')
@section('admin_title')
Edit: {{ $data['title_cat'] }}
@stop
@section('admin_content_right')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit: {{ $data->title_cat }}</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
        @if ($errors->any())
            <div class="alert alert-warning">
                {{ $errors->first('txtCatName') }}
            </div>
        @endif
        <form class="form-horizontal form-label-left" novalidate="" method="post">
            {{ csrf_field()}}
            <div class="item form-group">
                <label class="col-md-2 col-sm-2 col-xs-12" for="name">Name Category<span class="required"> * </span></label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <input id="name-for-cat" class="form-control col-md-7 col-xs-12" name="txtCatName" placeholder="Enter not null here!" required="required" type="text" value="{{ trim(old('txtCatName', ($data->title_cat) ? $data->title_cat : null)) }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-md-2 col-sm-2 col-xs-12" for="name">Introduct</label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea id="catIntro" name="txtintro" rows="10" class="form-control col-md-7 col-xs-12">
                        {{ old('txtintro', ($data->intro) ? $data->intro : null) }}
                    </textarea>
                </div>
            </div>
            
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <a href="{{ route('admin.del.catpost',$data->id) }}" class="btn btn-danger">Remove</a>
                    <button id="send" type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection