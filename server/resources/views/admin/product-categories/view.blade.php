@extends('layouts.admin')

@section('title')
    Product Categories
@endsection

@section('content')
    
    <div class="module">
        <div class="module-head">
            <h3>Product Categories</h3>
        </div>
        <div class="module-body">

            @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ Session::get('success') }}</strong>
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($Categories as $key => $Category)
                        <tr>
                            <td>{{$Category->category_title}}</td>
                            <td>{{$Category->category_details}}</td>
                            <td style="text-align: center;"><input type="checkbox" class="change_status" id="status_{{$Category->id}}" @if($Category->status == 1) checked @endif></td>
                            <td>
                                <form action="{{ route('admin.product-categories.destroy', $Category->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    
                                    <div class="media-option btn-group shaded-icon">
                                        <a href="{{ route('admin.product-categories.edit', $Category->id) }}" class="btn btn-small" data-toggle="tooltip" data-placement="right" title="Edit this Category">
                                            <i class="icon-edit"></i>
                                        </a>
                                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-small" data-toggle="tooltip" data-placement="right" title="Delete this Category.">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            
        </div>
    </div>

    <br />

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.change_status').click(function(){
        category_status = '';
        
        if( $(this).prop('checked') == true ){
            category_status = 'active';
        }
        else if( $(this).prop('checked') == false) {
            category_status = 'inactive';
        }
        
        if( confirm('Are you sure to make this category '+category_status+'?') ){
            item_id_string   = $(this).attr('id');

            item_id_split   = item_id_string.split('_');
            category_id     = item_id_split[1];

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url:'/change-category-status',
                    data:{category_id: category_id, category_status: category_status},
                    success:function(data) {
                        if(data.status == 'success'){
                            alert('Category status has been changed to '+category_status);
                       }
                    }
            });
        }
        else{
            return false;
        }
    });
});
</script>
@endpush
