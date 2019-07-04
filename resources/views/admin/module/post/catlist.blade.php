@extends('admin.layout.index')
@section('admin_title','List Category for post')
@section('admin_content_right')
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="item form-group">
        <a href="{{ route('admin.add.catpost') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Add New Category</a>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>List Category for Post</h2>
            <div class="clearfix"></div>
        </div>
        
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title" style="display: table-cell;">STt </th>
                            <th class="column-title" style="display: table-cell;">Name Category</th>
                            <th class="column-title" style="display: table-cell;">Excerpt</th>
                            <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach($data as $item)
                        <?php $i++ ?>
                        <tr class="even pointer">
                            <td>{{ $i }}</td>
                            <td>{{ $item->title_cat }}</td>
                            <td>{{ $item->intro }}</td>
                            <td>
                                <a href="{{ route('admin.edit.catpost',$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.del.catpost',$item->id) }}" class="btn btn-danger" onclick="alert('You want delete record?')">Remove</a>
                            </td>
                        </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection