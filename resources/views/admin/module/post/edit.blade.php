@extends('admin.layout.index')
@section('admin_title')
Edit: {{ $data->title_post }}
@stop
@section('admin_content_right')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit: {{ $data->title_post }}</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="post">
                {{ csrf_field()}}
                <div class="item form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12">Select Category<span class="required"> * </span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <select class="form-control" name="sltcat">
                        @foreach($cat as $item)
                            @if($item->id == $data->cat_id)
                                <option value="{{ $item->id }}" selected>{{ $item->title_cat }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->title_cat }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12" for="name-for-post">Title Name<span class="required"> * </span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input id="name-for-post" class="form-control col-md-7 col-xs-12" name="txtTitleName" placeholder="Enter not null here!" required="required" type="text" value="{{ old('txtTitleName', ($data->title_post)?$data->title_post : null) }}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12" for="txtIntro">Description</label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea id="txtIntro" name="txtIntro" rows="3" class="form-control col-md-7 col-xs-12">
                        {{ old('txtIntro', ($data->intro)?$data->intro : null) }}
                        </textarea>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12" for="txtIntro">Content Detail</label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea id="txtContent" name="txtContent" rows="10" class="form-control col-md-7 col-xs-12">
                            {{ old('txtContent', ($data->content)?$data->content : null) }}
                        </textarea>
                    </div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <a href="{{ route('admin.del.post', $data->id) }}" class="btn btn-danger">Remove</a>
                        <button id="send" type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection