<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $table='subcategories';

    public function parent(){
        return $this->hasMany('App\Category', 'id', 'parent_id');
    }
    public function child(){
        return $this->hasMany('App\Category', 'id', 'child_id');
    }
}
