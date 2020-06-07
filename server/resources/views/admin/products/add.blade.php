@extends('layouts.admin')

@section('title')
    Add New Product
@endsection

@section('content')

    <div class="module">
        <div class="module-head">
            <h3>Add New Product</h3>
        </div>
        <div class="module-body">

                <br />

                @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ Session::get('success') }}</strong>

                    @php
                        Session::forget('success');
                    @endphp
                </div>

                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="product_form" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="form-horizontal row-fluid">
                    @csrf

                    <div class="control-group">
                        <label class="control-label" for="product_name">Product Title</label>
                        <div class="controls">
                            <input type="text" name="product_name" id="product_name" placeholder="Product Title" class="span8" value="{{ old('product_name') }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="product_name">Categories</label>
                        <div class="controls">
                            <select id="categories" name="categories[]" multiple class="form-control">
                                @if (count($Categories) > 0)
                                    @foreach ($Categories as $Category)
                                        <option value="{{ $Category->id }}"{{ in_array($Category->id, old('categories', [])) ? 'selected' : '' }}>{{ $Category->category_title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="product_price">Product Price ($)</label>
                        <div class="controls">
                            <input type="text" name="product_price" id="product_price" placeholder="Product Price ($)" class="span3" value="{{ old('product_price') }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="items_left">Items Left</label>
                        <div class="controls">
                            <input type="text" name="items_left" id="items_left" placeholder="Items Left" class="span2" value="{{ old('items_left') }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Picture">Attach Picture</label>
                        <div class="controls">
                            <input type="file" name="product_pictures[]" id="product_pictures" class="form-control" multiple>

                            <div class="alert alert-error" id="picture_size_error" style="display:none;"></div>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="product_description">Product Description</label>
                        <div class="controls">
                            <textarea name="product_description" id="product_description" placeholder="Product Description" rows="5" class="span8">{{ old('product_description') }}</textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" id="upload_btn" class="btn btn-success">Add Product</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

    <br />

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
<script>
$(document).ready(function() {
    $('#categories').multiselect({
        nonSelectedText: 'Select Category',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true
    });

    $('#product_price').mask('###0.00', {reverse: true});
    $('#items_left').mask('###0', {reverse: true});

    //+++++++++++++++++ ATTACH PICTURES :: Start +++++++++++++++++//
    $('#product_pictures').bind('change', function() {
        $('#picture_size_error').html('').hide();
        
        max_allowed_MB      = 30;
        one_MB_in_Byte      = 1048576;
        max_allowed_size    = max_allowed_MB * one_MB_in_Byte; //in MB
        file_size   = 0;
        
        for (var i = 0; i < this.files.length; i++) {
            file_size   += this.files[i].size;
        }

        if(file_size >= max_allowed_size){
            uploaded_mb = parseInt( file_size / one_MB_in_Byte );
            
            $('#picture_size_error').show().html('<strong>Total Selected: '+uploaded_mb+' MB. <br>Max '+max_allowed_MB+' MB Upload Allowed.</strong>');

            $('#product_pictures').val('');

            return false;
        }
    });
    //+++++++++++++++++ ATTACH PICTURES :: End +++++++++++++++++//
});
</script>
@endpush
