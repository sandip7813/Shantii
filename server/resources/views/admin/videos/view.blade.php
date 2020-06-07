@extends('layouts.admin')

@section('title')
    Videos
@endsection

@section('content')
    
    <div class="module">
        <div class="module-head">
            <h3>Videos</h3>
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
                        <th>Video Title</th>
                        <th>Video Link</th>
                        <th>Description</th>
                        <th>Active</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $key => $video)
                        <tr>
                            <td>{{$video->video_title}}</td>
                            <td><a href="{{$video->video_link}}" target="_blank">{{$video->video_link}}</a></td>
                            <td>{{$video->video_description}}</td>
                            <td style="text-align: center;"><input type="checkbox" class="change_status" id="status_{{$video->id}}" @if($video->status == 1) checked @endif></td>
                            <td>
                                <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <div class="media-option btn-group shaded-icon">
                                        <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-small" data-toggle="tooltip" data-placement="right" title="Edit this Video">
                                            <i class="icon-edit"></i>
                                        </a>
                                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-small" data-toggle="tooltip" data-placement="right" title="Delete this Video.">
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
        video_status = '';
        
        if( $(this).prop('checked') == true ){
            video_status = 'active';
        }
        else if( $(this).prop('checked') == false) {
            video_status = 'inactive';
        }
        
        if( confirm('Are you sure to make this video '+video_status+'?') ){
            item_id_string   = $(this).attr('id');

            item_id_split   = item_id_string.split('_');
            video_id     = item_id_split[1];

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url:'/change-video-status',
                    data:{video_id: video_id, video_status: video_status},
                    success:function(data) {
                        if(data.status == 'success'){
                            alert('Video status has been changed to '+video_status);
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
