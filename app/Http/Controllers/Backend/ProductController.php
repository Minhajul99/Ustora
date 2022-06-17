<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id', 'asc')->get();
        return view('backend.manageproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_name' => 'required',
            'brand_name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        $products = new Product();
        $products->name = $request->name;
        $products->category_name = $request->category_name;
        $products->brand_name = $request->brand_name;
        $products->description = $request->description;
        $products->status = $request->status;

        $image = $request->file('image');
        $imageCustomname = rand() . '.' . $image->getClientOriginalExtension();
        $location = public_path('backend/productimgages/' . $imageCustomname);
        Image::make($image)->save($location);
        $products->image = $imageCustomname;

        $products->save();
        return redirect()->route('manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view('backend.editproduct', compact('products'));
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
        $products = Product::find($id);
        $products->name = $request->name;
        $products->category_name = $request->category_name;
        $products->brand_name = $request->brand_name;
        $products->description = $request->description;
        $products->status = $request->status;

        if (!empty($request->image)) {
            if (File::exists('backend/productimgages/' . $products->image)) {
                File::delete('backend/productimgages/' . $products->image);
            }
            $image = $request->file('image');
            $imageCustomname = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/productimgages/' . $imageCustomname);
            Image::make($image)->save($location);
            $products->image = $imageCustomname;
        }


        $products->update();
        return redirect()->route('manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        if (File::exists('backend/productimgages/' . $products->image)) {
            File::delete('backend/productimgages/' . $products->image);
        }
        $products->delete();
        return redirect()->route('manage');
    }
}
