@extends('layouts.admin')

@section('title')
    Edit Video
@endsection

@section('content')
    
    <div class="module">
        <div class="module-head">
            <h3>Edit Video</h3>
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

            <form method="POST" action="{{ route('admin.videos.update', $video->id) }}" class="form-horizontal row-fluid">
                @method('PATCH')
                @csrf
                
                <div class="control-group">
                    <label class="control-label" for="video_title">Video Title</label>
                    <div class="controls">
                        <input type="text" name="video_title" id="video_title" placeholder="Video Title" class="span8" value="{{ $video->video_title }}">

                        @if ($errors->has('video_title'))
                            <br />
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $errors->first('video_title') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="video_link">YouTube Link</label>
                    <div class="controls">
                        <input type="text" name="video_link" id="video_link" placeholder="YouTube Link" class="span8" value="{{ $video->video_link }}">

                        @if ($errors->has('video_link'))
                            <br />
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $errors->first('video_link') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="video_description">Video Description</label>
                    <div class="controls">
                        <textarea class="span8" name="video_description" id="video_description" rows="5" placeholder="Video Description">{{ $video->video_description }}</textarea>

                        @if ($errors->has('video_description'))
                            <br />
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $errors->first('video_description') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success">Edit Video</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <br />

@endsection