<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    public static function allPins(){
    	return static::where('status', '=', 'open')->orderby('id', 'desc')->get();
    }

    public static function getPin($id){
    	return static::where('id', '=', $id)->first();
    }

    public static function getPinByUsername($id){
    	return static::where('username', '=', $id)->get();
    }
}
