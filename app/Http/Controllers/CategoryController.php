<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        DB::listen(function ($sql, $bindings, $time) {
//            Log::info('Time : ' .$time);
//        DB::connection()->enableQueryLog();
            $categories = Category::with('test')->get();
            return response()->json([$categories]);
//        });

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
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        if ($request->parent_id != 0){
            $child_id = Category::orderBy('id','desc')->first()->id;
            $subcaregory = new SubCategory();
            $subcaregory->parent_id = $request->parent_id;
            $subcaregory->child_id = $child_id;
            $subcaregory->save();
        }
        return 1;
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
    public function update(CategoryRequest $request, $id)
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
        $deleteSuccess = true;
        if(Category::find($id)){
            if(count(SubCategory::where('parent_id',$id)->get())<=0) {
                if (count(SubCategory::where('child_id', $id)->get()) > 0) {
                    $products = Product::all();
                    foreach ($products as $key) {
                        $cat = json_decode($key['category_id']);
                        foreach ($cat as $keys) {
                            if ($id == $keys) {
                                $deleteSuccess = false;
                            }

                        }
                    }
                    if ($deleteSuccess) {
                        SubCategory::where('child_id', $id)->delete();
                        Category::where('id', $id)->delete();
                        return 1;

                    }
                }else{
                    Category::where('id', $id)->delete();
                    return 1;
                }

            }
            return 0;
        }
    }
    public function delete($id)
    {

    }
}
