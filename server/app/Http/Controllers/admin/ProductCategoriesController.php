<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\DB;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories  = Categories::all();

        return view('admin/product-categories/view')->with('Categories', $Categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/product-categories/add');
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
            'category_title' => 'required|unique:categories|max:255',
            'category_details' => 'required',
        ]);

        $Categories  = new Categories();

        $Categories->category_title      = $request->category_title;
        $Categories->category_slug       = mt_rand(10000,99999) . '-' . str_slug($request->category_title, '-');
        $Categories->category_details    = $request->category_details;

        $Categories->save();

        //return 'Product Category has been created successfully!';
        return back()->with('success', 'Product Category has been created successfully!');
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
        $category = Categories::find($id);

        return view('admin.product-categories.edit', compact('category'));
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
            'category_title' => 'required|max:255',
            'category_details' => 'required',
        ]);

        $Categories  = Categories::find($id);

        $Categories->category_title      = $request->category_title;
        $Categories->category_slug       = mt_rand(10000,99999) . '-' . str_slug($request->category_title, '-');
        $Categories->category_details    = $request->category_details;

        $Categories->update();

        return back()->with('success', 'Product Category has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Categories = Categories::find($id);
        $Categories->delete();

        return redirect()
                ->route('admin.product-categories.index')
                ->with('success','Product Category Deleted Successfully!');
    }

    public function changeStatus(Request $request){
        $category_id        = $request->category_id;
        $category_status    = $request->category_status;

        $db_status  = ( $category_status == 'inactive' ) ? 0 : 1;

        $Categories = Categories::find($category_id);
        $Categories->status = $db_status;
        $Categories->update();

        return response()->json(['status'=>'success']);
    }
}
