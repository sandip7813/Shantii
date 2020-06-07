<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\ProductImages;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Categories::Select('id', 'category_title')->Where('status', '1')->get();

        return view('admin/products/add')->with('Categories', $Categories);
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
            'product_name'          => 'required|max:200',
            'categories'            => 'required',
            'product_price'         => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'items_left'            => 'required|integer',
            'product_pictures'      => 'required',
            'product_pictures.*'    => 'image|mimes:jpeg,png,jpg',
            'product_description'   => 'required'
        ]);

        //+++++++++++++++++++++ INSERT INTO PRODUCTS TABLE :: Start +++++++++++++++++++++//
        $product_slug   = mt_rand(10000,99999) . '-' . str_slug($request->product_name, '-');
        
        $Products = new Products();

        $Products->product_name         = $request->product_name;
        $Products->product_slug         = substr($product_slug, 0, 200);
        $Products->product_price        = $request->product_price;
        $Products->items_left           = $request->items_left;
        $Products->product_description  = $request->product_description;

        $Products->save();
        $Product_ID = $Products->id;
        //+++++++++++++++++++++ INSERT INTO PRODUCTS TABLE :: End +++++++++++++++++++++//

        //+++++++++++++++++++++ INSERT INTO PRODUCT CATEGORIES TABLE :: Start +++++++++++++++++++++//
        $Products->categories()->attach($request->categories);
        //+++++++++++++++++++++ INSERT INTO PRODUCT CATEGORIES TABLE :: End +++++++++++++++++++++//
        
        //+++++++++++++++++++++ VALIDATE & INSERT IMAGES :: Start +++++++++++++++++++++//
        $images     = $request->file('product_pictures');

        $img_dir    = 'product_images';

        $images_arr = array();

        foreach($images as $image){
            //$imageName = $image->getClientOriginalName();
            $imageName = 'P_' . $Product_ID . '_' .time().'.'.$image->getClientOriginalExtension();

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

            // Generate Model Array
            $images_arr[] = new ProductImages(array('image_title' => $imageName));
        }

        $Products->pictures()->saveMany($images_arr);
        //+++++++++++++++++++++ VALIDATE & INSERT IMAGES :: Start +++++++++++++++++++++//

        return back()
                ->with('success','Product Added Successfully!');
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
