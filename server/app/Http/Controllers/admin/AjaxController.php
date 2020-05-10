<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function changePictureStatus(Request $request){
        $picture_id     = $request->picture_id;
        $picture_sts    = $request->picture_sts;

        $db_status      = ( $picture_sts == 'Inactive' ) ? 0 : 1;

        DB::table('pictures')
            ->where('id', $picture_id)
            ->update(['status' => $db_status]);

        return response()->json(['status'=>'success']);
    }

    public function deletePicture(Request $request){
        $picture_id     = $request->picture_id;
        $picture_title  = $request->picture_title;

        DB::table('pictures')
            ->where('id', $picture_id)
            ->delete();
        
        unlink(public_path() . '/uploaded_images/thumbnail/' . $picture_title);
        unlink(public_path() . '/uploaded_images/' . $picture_title);

        return response()->json(['status'=>'success']);
    }
}
