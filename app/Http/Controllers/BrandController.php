<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $brands = Brand::all();
       return $brands->toArray();
    }
    function store(BrandRequest $request)
    {
//        if ($request->hasFile('file')) {
//            if ($request->file('file')->isValid()) {
//                try {
//                    $file = $request->file('file');
//                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
//                    $request->file('file')->move("images", $name);

                    $brand = new Brand();
                    $brand->image = 'images/';
                    $brand->name = $request->name;
                    $brand->save();

                    return 1;
//                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
//
//                }
//            }
//        }

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
        $brand =Brand::where('id',$id)->first();
        return $brand;
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
        if(Brand::find($id)){
            Brand::where('id',$id)->update(['name'=>$request->name]);
            return 1;
        }
        return 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Brand::find($id)){
            Brand::where('id',$id)->delete();
            return 1;
        }
        return 0;
    }
}
