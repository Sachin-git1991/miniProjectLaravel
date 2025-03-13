<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Product;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Validator;
use DB;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch = Batch::all();
        $product = Product::all();
        $qrdetails = DB::table('product')
        ->select('*')
        ->join('batch', 'product.id', '=', 'batch.pud_id')
        ->get();
    	return view('batch', compact('batch','product','qrdetails'));
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

            'pud_id' => 'required',
            'batch_name' => 'required',
            'quantity' => 'required',


        ]);

        if($validator->fails()) {

            return response()->json([

                'error' => $validator->errors()->all()

            ]);

        }else{

            $new = new Batch();
            $new->pud_id = $request->pud_id;
            $new->batch_name = $request->batch_name;
            $new->quantity = $request->quantity;
            $new->save();

            return response()->json("success");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Batch $batch)
    {
        $Batch = Batch::find($request->id);

    	if($Batch->exists()){
    		return response()->json($Batch);
    	}
    	else{
    		return response()->json('Failed');
    	}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        $batch = Batch::find($request->batch_id);

    	if($batch->exists())
    	{
            $batch->pud_id = $request->pud_id;
    		$batch->batch_name = $request->batch_name;
    	    $batch->quantity = $request->quantity;
    		$data = $batch->save();

    		return response()->json("success");
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Batch $batch)
    {
        $data = Batch::destroy($request->id);
    	return response()->json($data);
    }
}
