@extends('layouts.admin')

@section('title')
    Add Product Category
@endsection

@section('content')
    
    <div class="module">
        <div class="module-head">
            <h3>Add Product Category</h3>
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

                <form method="POST" action="{{ route('admin.product-categories.store') }}" class="form-horizontal row-fluid">
                    @csrf
                    
                    <div class="control-group">
                        <label class="control-label" for="category_title">Category Name</label>
                        <div class="controls">
                            <input type="text" name="category_title" id="category_title" placeholder="Category Name" class="span8" value="{{ old('category_title') }}">

                            @if ($errors->has('category_title'))
                                <br />
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $errors->first('category_title') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="category_details">Category Details</label>
                        <div class="controls">
                            <textarea class="span8" name="category_details" id="category_details" rows="5" placeholder="Category Details">{{ old('category_details') }}</textarea>

                            @if ($errors->has('category_details'))
                                <br />
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $errors->first('category_details') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Add Category</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

    <br />

@endsection