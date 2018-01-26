<?php

namespace App\Http\Controllers;

use App\Product;
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
        return view('products.index', [
            "products" => Product::where("user_id", auth()->user()->id)
            ->get()
        ]);
    }

    public function indexall()
    {
        //
        return view('products.indexall', [
            "products" => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($values + ['user_id' => auth()->user()->id]);

        return redirect()->route("products.index")->with('success','Item created successfully!');;
    }

    public function search(Request $request)
    {
        $values = $this->validate($request,[
            'name' => 'required'
        ]);

        return view('products.indexall', [
            "products" => Product::where("name", "LIKE", "%".$values['name']."%")
            ->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',[
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $values = $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($values);

        return redirect()->route("products.index")->with('success','Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route("products.index")->with('success','Item deleted successfully!');
    }
}
