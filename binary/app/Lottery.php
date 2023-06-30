<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Lottery extends Model
{
    public static function allLotteries(){
    	return static::orderby('id', 'desc')->get();
    }

    public static function getLottery($id){
    	return static::where('id', '=', $id)->first();
    }

    public static function getActiveLottery(){
    	return static::where('status', '=', 1)->get();
    }

    public static function getTickets($id){
    	return DB::table('all_lotteries')
    				->where('ticket_id', '=', $id)
    				->get();
    }

    public static function getMemberTicketsByMember($id){
    	return DB::table('lottery_bookings')
    				->where('member_code', '=', $id)
    				->first();
    }

    public static function getMemberTicketsByTicket($id){
    	return DB::table('lottery_bookings')
    				->where('ticket_number', '=', $id)
    				->first();
    }
}
