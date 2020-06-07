<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pictures;

class PictureController extends Controller
{
    public function homeGalleryPhotos($photo_type){
        //++++++++++++++++++++++ PREPARING CONDITIONAL WHERE CLAUSE :: Start ++++++++++++++++++++++//
        $where_array    = array();
        
        $where_array[]  = ['status', '=', 1];
        
        if( isset($photo_type) && ($photo_type != '') && ($photo_type != 'all') ){
            $where_array[]  = ['picture_catagory', '=', $photo_type];
        }
        //++++++++++++++++++++++ PREPARING CONDITIONAL WHERE CLAUSE :: End ++++++++++++++++++++++//

         //++++++++++++++++++++++ GENERATING QUERY :: Start ++++++++++++++++++++++//
        $profilePhoto = DB::table('pictures')
                            ->select('*')
                            ->where($where_array)
                            ->get();
        //++++++++++++++++++++++ GENERATING QUERY :: End ++++++++++++++++++++++//

        return $profilePhoto;
    }

}
