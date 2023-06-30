<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function allProducts(){
    	return static::orderby('id', 'asc')->get();
    }

    public static function getProduct($id){
    	return static::where('id', '=', $id)->first();
    }
}
