<?php

namespace App\Http\Controllers;

use App\Category;
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

        $arrImages = [];
        $i=0;
        foreach($request->file('images') as $key){
            $i++;
            $file =$key;
            $name = 'img/'.rand(11111, 9999999999) .$i. time(). '.' . $file->getClientOriginalExtension();
            $key->move("img", $name);
            array_push($arrImages, $name);
        }

        $file = $request->file('image');
        $name = rand(11111, 99999) .time(). '.' . $file->getClientOriginalExtension();
        $request->file('image')->move("img", $name);

        $arr = json_encode($request->category_id);
        $images = json_encode($arrImages);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->brand_id = $request->brand_id;
        $product->category_id = $arr;
        $product->avatar = 'img/'.$name;
        $product->images = $images;
        $product->save();
        return  redirect()->back();


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
