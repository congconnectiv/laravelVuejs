@extends('admin.layout.index')
@section('admin_title','List Post')
@section('admin_content_right')
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="item form-group">
        <a href="{{ route('admin.add.post') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Add New</a>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>List Post</h2>
            <div class="clearfix"></div>
        </div>
        
        <div class="x_content">
        @if(count($data) > 0)
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title" style="display: table-cell;">STT </th>
                            <th class="column-title" style="display: table-cell;">Title Post</th>
                            <th class="column-title" style="display: table-cell;">Category Name</th>
                            <th class="column-title" style="display: table-cell;">DateTime</th>
                            <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach($data as $item)
                        <?php $i++ ?>
                        <tr class="even pointer">
                            <td>{{ $i }}</td>
                            <td><a href="{{ route('admin.showpost',$item->id) }}" target="_blank">{{ $item->title_post }}</a></td>
                            <td>{{ $item->title_cat }}</td>
                            <td>{{ ($item->created_at <= $item->updated_at) ? $item->created_at : "<strong class='required'>$item->updated_at</strong>" }}</td>
                            <td>
                                <a href="{{ route('admin.edit.post',$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.del.post',$item->id) }}" class="btn btn-danger" onclick="alert('You want delete record?')">Remove</a>
                            </td>
                        </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            @else
                <p class="alert alert-warning">No record for Post!</p>
            @endif
        </div>
    </div>
</div>
@endsection