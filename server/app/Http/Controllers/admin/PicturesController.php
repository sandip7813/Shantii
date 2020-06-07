<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pictures;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class PicturesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = DB::table('pictures')->select('*')->get();

        $picturesArr    = array();

        if( !empty($pictures) ){
            foreach($pictures as $pictureVal){
                if( $pictureVal->picture_catagory == 'profile' ){
                    $picturesArr['profile_img'][]   = $pictureVal;
                }
                elseif( $pictureVal->picture_catagory == 'merchandise' ){
                    $picturesArr['merchandise_img'][]   = $pictureVal;
                }
            }
        }

        return view('admin/pictures/view')->with('pictures', $picturesArr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pictures/upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'picture_title'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'picture_catagory'  => 'required',
        ]);

        $img_dir    = 'uploaded_images';

        $image = $request->file('picture_title');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path($img_dir), $imageName);
        
        //+++++++++++++++++++++ CREATE THUMBNAIL :: Start +++++++++++++++++++++//
        // open an image file
        $imgThumb = Image::make($img_dir . '/'.$imageName);

        // resize image instance
        $imgThumb->resize(200, 200);

        // insert a watermark
        //$imgThumb->insert('public/watermark.png');

        // save image in desired format
        $imgThumb->save($img_dir . '/thumbnail/'.$imageName);
        //+++++++++++++++++++++ CREATE THUMBNAIL :: End +++++++++++++++++++++//

        //+++++++++++++++++++++ CREATE 780 :: Start +++++++++++++++++++++//
        // open an image file
        $img780 = Image::make($img_dir . '/'.$imageName);

        // resize image instance
        $img780->resize(780, 780);

        // insert a watermark
        //$imgThumb->insert('public/watermark.png');

        // save image in desired format
        $img780->save($img_dir . '/thumb_780/'.$imageName);
        //+++++++++++++++++++++ CREATE THUMBNAIL :: End +++++++++++++++++++++//

        //+++++++++++++++++++++ INSERT INTO DB :: Start +++++++++++++++++++++//
        $Pictures   = new Pictures();

        $Pictures->picture_title    = $imageName;
        $Pictures->picture_caption  = $request->picture_caption;
        $Pictures->picture_catagory = $request->picture_catagory;

        $Pictures->save();
        //+++++++++++++++++++++ INSERT INTO DB :: End +++++++++++++++++++++//

        return back()
            ->with('success','Picture uploaded successfully!')
            ->with('image_path', $imageName);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
