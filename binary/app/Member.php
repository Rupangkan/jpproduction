<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Member extends Model
{
    public static function tree_data($member_code){
        return DB::table('tree')->where('member_code', '=', $member_code)->first();
    }
    
    public static function getMemberIncome($member_code){
        return DB::table('incomes')->where('member_code', '=', $member_code)->first();
    }
    
    public static function getTotalSponsored($id){
        return DB::table('users')->where('sponsoror_id', '=', $id)->count();
    }
}
