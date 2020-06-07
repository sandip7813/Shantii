<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Products;

class StoreController extends Controller
{
    public function allActiveCategories(){
        $all_categories = Categories::where('status', '=', '1')->get();

        return $all_categories;
    }

    public function allActiveProducts($cat_slug){
        //++++++++++++++++++++++ PREPARING CONDITIONAL WHERE CLAUSE :: Start ++++++++++++++++++++++//
        $where_array    = array();
        
        $where_array[]  = ['status', '=', 1];
        
        if( isset($cat_slug) && ($cat_slug != '') && ($cat_slug != 'all') ){
            $where_array[]  = ['category_slug', '=', $cat_slug];
        }
        //++++++++++++++++++++++ PREPARING CONDITIONAL WHERE CLAUSE :: End ++++++++++++++++++++++//
        
        //++++++++++++++++++++++ GENERATING PRODUCTS QUERY :: Start ++++++++++++++++++++++//
        $products_arr   = Categories::with(
                            [
                                'products' => function($prd_qry) {
                                    $prd_qry->where('product_status', '=', 1); 
                                },
                                'products.pictures' => function($pic_qry) {
                                    $pic_qry->where('image_status', '=', 1); 
                                }
                            ]
                        )
                        ->where($where_array)
                        ->get();
        //++++++++++++++++++++++ GENERATING PRODUCTS QUERY :: End ++++++++++++++++++++++//

        return $products_arr;
    }

    public function activeProductDetails($prod_slug){
        //++++++++++++++++++++++ GENERATING PRODUCTS QUERY :: Start ++++++++++++++++++++++//
        $product_dtls   = Products::with(
                            [
                                'categories' => function($cat_qry) {
                                    $cat_qry->where('status', '=', 1); 
                                },
                                'pictures' => function($pic_qry) {
                                    $pic_qry->where('image_status', '=', 1); 
                                }
                            ]
                        )
                        ->where([
                            ['product_slug', '=', $prod_slug],
                            ['product_status', '=', 1]
                        ])
                        ->first();
        //++++++++++++++++++++++ GENERATING PRODUCTS QUERY :: End ++++++++++++++++++++++//

        return $product_dtls;
    }
    
}
