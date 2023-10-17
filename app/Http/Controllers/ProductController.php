<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Product List";
        $products = Product::all(); //fetch all products from DB
        return view('product.list',  $data, ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $newPost = Product::create([
            'title' => $request->title,
            'short_notes' => $request->short_notes,
            'price' => $request->price
            
        ]);

        return redirect('admin/product/list' . $newPost->id . '/edit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
