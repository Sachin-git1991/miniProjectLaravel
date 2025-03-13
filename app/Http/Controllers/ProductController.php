<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
    	return view('admin', compact('products'));

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
        $validator = Validator::make($request->all(), [

            'prodect' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'unit_of_measurement' => 'required',


        ]);

        if($validator->fails()) {

            return response()->json([

                'error' => $validator->errors()->all()

            ]);

        }else{

            $new = new Product();
            $new->product_name = $request->prodect;
            $new->category = $request->category;
            $new->brand = $request->brand;
            $new->price = $request->price;
            $new->unit_of_measurement = $request->unit_of_measurement;
            $new->save();

            return response()->json("success");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $Product = Product::find($request->id);

    	if($Product->exists()){
    		return response()->json($Product);
    	}
    	else{
    		return response()->json('Failed');
    	}
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

        $product = Product::find($request->pid_id);

    	if($product->exists())
    	{
    		$product->product_name = $request->prodect;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->price = $request->price;
            $product->unit_of_measurement = $request->unit_of_measurement;
    		$data = $product->save();

    		return response()->json("success");
    	} 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $data = Product::destroy($request->id);
    	return response()->json($data);
    }
}
