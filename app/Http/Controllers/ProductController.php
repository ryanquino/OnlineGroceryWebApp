<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productList = Products::get();
        
        return view('home', compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'brand' => 'required',
            'productName' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        Products::create([
            'brand' => $request->brand,
            'productName' => $request->productName,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('home')->with('Success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
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
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
        $request->validate([
            'brand' => 'required',
            'productName' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $update = DB::table('products')->where('id', $products->id)
                    ->update(['brand' =>$products->brand,'productName' =>$products->productName,'description' =>$products->description,'price' =>$products->price,'quantity' =>$products->quantity]);

        return redirect()->route('home')->with('Success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }

    public function editProduct($id)
    {
        //
        $product = DB::table('products')
                    ->where('id', $id)
                    ->select('*')
                    ->get();
        return view('edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        //
        $request->validate([
            'brand' => 'required',
            'productName' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $update = DB::table('products')->where('id', $id)
                    ->update(['brand' =>$request->brand,'productName' =>$request->productName,'description' =>$request->description,'price' =>$request->price,'quantity' =>$request->quantity]);

        return redirect()->route('home')->with('Success', 'Product Updated Successfully');
    }


    public function deleteProduct($id){
        $delete = DB::table('products')->where('id', $id)->delete();

        return redirect()->route('home')->with('Success', 'Product Deleted Successfully');
    }
}
