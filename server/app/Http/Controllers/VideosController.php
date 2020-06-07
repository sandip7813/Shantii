<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
    public function allActiveVideos(){
        $allVideosArr = DB::table('videos')
                            ->select('*')
                            ->where('status', '=', 1)
                            ->get();

        return $allVideosArr;
    }

    public function activeVideoDetails($vid_slug){
        $videosDetailsArr = DB::table('videos')
                                ->where('video_slug', '=', $vid_slug)
                                ->where('status', '=', 1)
                                ->get();

        return $videosDetailsArr;
    }
}
