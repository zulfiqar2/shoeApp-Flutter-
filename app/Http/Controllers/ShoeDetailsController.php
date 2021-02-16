<?php

namespace App\Http\Controllers;

use App\ShoeDetails;
use Illuminate\Http\Request;

class ShoeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $shoes = ShoeDetails::with('brand')->get();
            return response()->json([
                'success' => true,
                'data' => $shoes
            ]);

        } catch (\Exception $e) {
             return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
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
        try
        {
            
            $data = $request->validate([
                'brand_id' => 'required',
                'image'    => 'required',
                'quantity' => 'required',
                'color'    => 'required',
                'artical'  => 'required',
            ]);

            $destination = 'public/images';
            $image = $request->image;
            $image_name = $image->getClientOriginalName(); // insert this into database
            $path = $request->image->storeAs($destination,$image_name);

            $data['image'] = $image_name;


            $shoe = ShoeDetails::create($data);

            return response()->json([
                'success' => true,
                'Message'    => 'Created SuccessFull'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
               'error' => $e->getMessage(),
           ]);
       }
    }


    public function getShoesQuantity(){

        try {
            $totalQuantity = ShoeDetails::sum('quantity');

            return response()->json([
                'success' => true,
                'data' => $totalQuantity
            ]);

        } catch (\Exception $e) {
             return response()->json([
                 'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShoeDetails  $shoeDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ShoeDetails $shoeDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShoeDetails  $shoeDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoeDetails $shoeDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoeDetails  $shoeDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoeDetails $shoeDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoeDetails  $shoeDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoeDetails $shoeDetails)
    {
        //
    }
}
