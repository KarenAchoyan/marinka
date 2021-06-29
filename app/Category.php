<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategory(){
        return $this->hasMany('App\SubCategory', 'parent_id', 'id');
    }

    public function test()
    {
        return $this
            ->belongsToMany(Category::class,'subcategories','parent_id', 'child_id')
            ->with('test');
    }
}
