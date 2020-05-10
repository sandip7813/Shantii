<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pictures;

class PictureController extends Controller
{
    public function homeGalleryPhotos($photo_type){
       
        if($photo_type == 'all'){
            $profilePhoto = DB::table('pictures')
                            ->select('*')
                            ->where([
                                ['status', '=', '1']
                            ])
                            ->get();
        }
        else{
            $profilePhoto = DB::table('pictures')
                            ->select('*')
                            ->where([
                                ['picture_catagory', '=', $photo_type], 
                                ['status', '=', '1']
                            ])
                            ->get();
        }

        return $profilePhoto;
    }

}
