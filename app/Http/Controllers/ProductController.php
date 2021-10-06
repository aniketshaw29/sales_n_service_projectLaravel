<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return $products;
    }
    public function getProductById($id){
        $product = Product::findOrFail($id);
        return $product;
    }    
    public function saveProduct(Request $request){
        $rules = array(
            'productName' => 'required|unique:products,product_name|max:20',
            'unitID' => 'required|exists:units,id'
        );
        $messages = array(
            'productName.required' => 'Please enter the product name',
            'unitID.required' => 'Please enter the Unit id',
            'unitID.exists' =>  'Hey select a good ID'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return $validator->messages();
        }
        $product = new Product();
        $product->product_name = $request->productName;
        $product->unit_id = $request->unitID;
        $product->save();
        return $product;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request)
    {
        $product = Product::findOrFail( $request->input('id'));
        $product->product_name=$request->input('productName');
        $product->save();
        return $product;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteProductById( $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return "Deleted";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
