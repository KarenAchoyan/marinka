<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider =Slider::all();
        return $slider->toArray();
    }

    function store(SliderRequest $request)
    {
       /* if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                try {
                    $file = $request->file('file');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $request->file('file')->move("images", $name);*/

                    $slider = new Slider();
                    $slider->image = 'images/';
                    $slider->title = $request->title;
                    $slider->url = $request->url;
                    $slider->save();
                    return 1;
               /* } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }*/
        /*}*/

        return 0;
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
        $slider =Slider::where('id',$id)->first();
        return $slider;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        if(Slider::find($id)){
            Slider::where('id',$id)->update(['title'=>$request->title]);
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
        if(Slider::find($id)){
            Slider::where('id',$id)->delete();
            return 1;
        }
        return 0;
    }
}
