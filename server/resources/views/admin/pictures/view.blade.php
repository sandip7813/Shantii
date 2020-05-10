@extends('layouts.admin')

@section('title')
    Manage Pictures
@endsection

@section('content')
    
    <div class="module">
        <div class="module-head">
            <h3>Manage Pictures</h3>
        </div>
        <div class="module-body">
            <ul class="profile-tab nav nav-tabs">
                <li class="active"><a href="#profile" data-toggle="tab">Profile Pictures</a></li>
                <li><a href="#merchandise" data-toggle="tab">Merchandise Pictures</a></li>
            </ul>
            <div class="profile-tab-content tab-content">
                <div class="tab-pane fade active in" id="profile">
                    
                    <div class="module-body">
                        
                        @isset($pictures['profile_img'])
                            @php
                                $p_cnt = 0;
                            @endphp

                            <div class="row-fluid">

                            @foreach($pictures['profile_img'] as $key => $profileVal)
                                @php
                                    $p_cnt++;

                                    $p_statusText = ( $profileVal->status == 1 ) ? 'Inactive' : 'Active';
                                @endphp
                                
                                <div class="span6" id="picture_{{$profileVal->id}}" @if($profileVal->status == 0) style="background: #fabebe;" @endif>
                                    <div class="media user">
                                        <a class="media-avatar pull-left" href="javascript:void(0);" onclick="open_image_modal('{{$profileVal->picture_title}}');">
                                            <img src="/uploaded_images/thumbnail/{{$profileVal->picture_title}}">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="media-title">
                                                {{$profileVal->picture_caption}}
                                            </h3>
                                            <p><small class="muted">&nbsp;</small></p>
                                            <div class="media-option btn-group shaded-icon">
                                                <button class="btn btn-small" data-toggle="tooltip" data-placement="right" title="Delete this picture." onclick="delete_picture('{{$profileVal->id}}', '{{$profileVal->picture_title}}');">
                                                    <i class="icon-trash"></i>
                                                </button>

                                                <button class="btn btn-small" data-toggle="tooltip" data-placement="right" title="Make this picture {{$p_statusText}}." onclick="change_picture_status('{{$profileVal->id}}', '{{$p_statusText}}');">
                                                    <i class="icon-share-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @if($p_cnt % 2 == 0)
                                    </div>
                                    <br />
                                    <div class="row-fluid">
                                @endif

                            @endforeach
                            </div>
                        @endisset

                        <br />
                    </div>
                </div>


                <div class="tab-pane fade" id="merchandise">
                    
                    <div class="module-body">
                        
                        @isset($pictures['merchandise_img'])
                        @php
                            $m_cnt = 0;
                        @endphp

                        <div class="row-fluid">

                        @foreach($pictures['merchandise_img'] as $key => $merchandiseVal)
                            @php
                                $m_cnt++;

                                $m_statusText = ( $merchandiseVal->status == 1 ) ? 'Inactive' : 'Active';
                            @endphp
                            
                            <div class="span6" id="picture_{{$merchandiseVal->id}}" @if($merchandiseVal->status == 0) style="background: #fabebe;" @endif>
                                <div class="media user">
                                    <a class="media-avatar pull-left" href="javascript:void(0);" onclick="open_image_modal('{{$merchandiseVal->picture_title}}');">
                                        <img src="/uploaded_images/thumbnail/{{$merchandiseVal->picture_title}}">
                                    </a>
                                    <div class="media-body">
                                        <h3 class="media-title">
                                            {{$merchandiseVal->picture_caption}}
                                        </h3>
                                        <p><small class="muted">&nbsp;</small></p>
                                        <div class="media-option btn-group shaded-icon">
                                            <button class="btn btn-small" data-toggle="tooltip" data-placement="right" title="Delete this picture." onclick="delete_picture('{{$merchandiseVal->id}}', '{{$merchandiseVal->picture_title}}');">
                                                <i class="icon-trash"></i>
                                            </button>
                                            <button class="btn btn-small" data-toggle="tooltip" data-placement="right" title="Make this picture {{$m_statusText}}." onclick="change_picture_status('{{$merchandiseVal->id}}', '{{$m_statusText}}');">
                                                <i class="icon-share-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @if($m_cnt % 2 == 0)
                                </div>
                                <br />
                                <div class="row-fluid">
                            @endif

                        @endforeach
                        </div>
                    @endisset
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />

@endsection

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 700px;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
function open_image_modal(img_name){
    $('#imagepreview').attr('src', '/uploaded_images/'+img_name);
    $('#imagemodal').modal('show');
}

function change_picture_status(picture_id, picture_sts){
    if( confirm('Are you sure to make this picture '+picture_sts+'?') ){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
                dataType: 'json',
                type:'POST',
                url:'/change_picture_status',
                data:{picture_id: picture_id, picture_sts:picture_sts},
                success:function(data) {
                    console.log(data);

                    if(data.status == 'success'){
                        alert('Picture has been changed to '+picture_sts);
                        
                        bg_color    = (picture_sts == 'Inactive') ? '#fabebe' : 'none';
                        $('#picture_'+picture_id).css({'background': bg_color});
                    }
                }
        });
    }
}

function delete_picture(picture_id, picture_title){
    if(confirm('Are you sure to delete this picture?')){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
                dataType: 'json',
                type:'POST',
                url:'/delete_picture',
                data:{picture_id: picture_id, picture_title:picture_title},
                success:function(data) {
                    console.log(data);

                    if(data.status == 'success'){
                        alert('Picture has been deleted successfully!');
                        $('#picture_'+picture_id).hide('slow');
                    }
                }
        });
    }
}
</script>
