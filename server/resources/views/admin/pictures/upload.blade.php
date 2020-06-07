@extends('layouts.admin')

@section('title')
    Upload Pictures
@endsection

@section('content')
    
    <div class="module">
        <div class="module-head">
            <h3>Upload Pictures</h3>
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

                <p><img src="/uploaded_images/{{ Session::get('image_path') }}"></p>
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

                <form id="pic_upload_form" method="POST" action="{{ route('admin.pictures.store') }}" enctype="multipart/form-data" class="form-horizontal row-fluid">
                    @csrf

                    <div class="control-group">
                        <label class="control-label" for="Category">Category</label>
                        <div class="controls">
                            <select name="picture_catagory" tabindex="1" data-placeholder="Select Category" class="span8">
                                <option value="">Select Category</option>
                                <option value="profile" {{ ( 'profile' == old('picture_catagory')) ? 'selected' : '' }}>Profile Picture</option>
                                <option value="merchandise" {{ ( 'merchandise' == old('picture_catagory')) ? 'selected' : '' }}>Merchandise</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Picture">Attach Picture</label>
                        <div class="controls">
                            <input type="file" name="picture_title" class="form-control" onchange="browse_image(this);">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="picture_caption">Caption (Optional)</label>
                        <div class="controls">
                            <input type="text" name="picture_caption" id="picture_caption" placeholder="Caption" class="span8" value="{{ old('picture_caption') }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" id="upload_btn" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

    <br />

@endsection

@push('scripts')
<script>
function browse_image(this_obj){
    max_size_mb     = 2;
    max_size_byte	= max_size_mb * 1048576;
    file_ext_err	= 0;
    err_cnt			= 0;
    err_msg			= '';
    
    file_size		= this_obj.files[0].size;
    file_ext 		= $(this_obj).val().split('.').pop().toLowerCase();
    
    if($.inArray(file_ext, ['gif','png','jpg','jpeg']) == -1) {
        file_ext_err++;
    }
    
    if(parseInt(file_size) > parseInt(max_size_byte)){
        err_cnt++;
        err_msg	+= err_cnt + '. Please select an image of size less than '+ max_size_mb +' mb. \n';
    }
    
    if(file_ext_err>0){
        err_cnt++;
        err_msg	+= err_cnt + '. Invalid file format ['+file_ext+']. \n';
    }

    if(err_cnt > 0){
        alert(err_msg);
        $(this_obj).val('');
    }
}
</script>
@endpush