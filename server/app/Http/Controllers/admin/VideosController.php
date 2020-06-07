<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos  = DB::table('videos')
                        ->select('*')
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('admin/videos/view')->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/videos/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'video_title' => 'required|max:255',
            'video_link' => 'required|unique:videos|max:255',
            'video_description' => 'required',
        ]);

        DB::table('videos')->insert([
            'video_link' => $request->video_link, 
            'video_title' => $request->video_title, 
            'video_slug' => mt_rand(10000,99999) . '-' . str_slug(substr($request->video_title, 0, 100), '-'), 
            'video_description' => $request->video_description,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return back()->with('success', 'Video added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = DB::table('videos')
                    ->where('id', $id)
                    ->first();
        
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'video_title' => 'required|max:255',
            'video_link' => 'required|max:255',
            'video_description' => 'required',
        ]);

        DB::table('videos')
            ->where('id', $id)
            ->update([
                'video_link' => $request->video_link, 
                'video_title' => $request->video_title, 
                'video_slug' => mt_rand(10000,99999) . '-' . str_slug(substr($request->video_title, 0, 100), '-'), 
                'video_description' => $request->video_description,
                'updated_at' => \Carbon\Carbon::now()
            ]);

        return back()->with('success', 'Video has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('videos')->where('id', $id)->delete();

        return redirect()
                ->route('admin.videos.index')
                ->with('success','Video Deleted Successfully!');
    }

    public function changeStatus(Request $request){
        $video_id       = $request->video_id;
        $video_status   = $request->video_status;

        $db_status  = ( $video_status == 'inactive' ) ? 0 : 1;

        DB::table('videos')
            ->where('id', $video_id)
            ->update([
                'status'        => $db_status,
                'updated_at'    => \Carbon\Carbon::now()
            ]);

        return response()->json(['status'=>'success']);
    }
}
