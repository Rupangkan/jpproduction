<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Payout extends Model
{
    public static function allPayouts(){
    	return static::orderby('id', 'asc')->get();
    }

    public static function getPayout($id){
    	return static::where('id', '=', $id)->first();
    }

    public static function getPayoutByMember($id){
    	return static::where('member_code', '=', $id)->first();
    }

    public static function getTodaysPayout(){
    	return static::where('last_payout_date', '=', date('Y-mm-dd'))->sum('last_payout_amount');
    }

    public static function getTotalPayout(){
    	return static::sum('total_payout_amount');
    }
    
    public static function getPayoutDetails($id){
        return DB::table('payout_details')->where('id', '=', $id)->first();
    }
}
