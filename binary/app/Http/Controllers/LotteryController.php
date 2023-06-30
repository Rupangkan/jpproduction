<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lottery;
use App\Member;
use Sentinel;
use DB;

class LotteryController extends Controller
{
    public function getAddLottery(){
    	$lotteries = Lottery::allLotteries();

    	return view('back.admin.pages.lottery-creation')->with(['lottery' => null, 'lotteries' => $lotteries]);
    }

    public function postAddLottery(Request $request){
    	$this->validate($request, [
    		'issue_date'	=> 'required',
    		'expiry_date'	=> 'required',
    		'no_of_tickets'	=> 'required',
    	]);

    	Lottery::insert([
    		'title'			=> $request->title,
    		'issue_date'	=> $request->issue_date,
    		'expiry_date'	=> $request->expiry_date,
    		'no_of_tickets'	=> $request->no_of_tickets,
    		'status'		=> 1
    	]);

    	$lotteryID 	= Lottery::max('id');
    	
        $members    = Member::getRandMemberId();
    	for($i=0; $i<$request->no_of_tickets; $i++){
    		$ticketNumber 	= rand(0,99999999);
    		DB::table('all_lotteries')
    			->insert([
    				'ticket_id'		=> $lotteryID,
    				'ticket_number'	=> $ticketNumber.$i,
                    'member_code'   => $members[$i]->mem_code,
    				'status'		=> 0,
                    'created_at'    => date('Y-m-d')
    			]);
    	}

    	return redirect()->route('add.lottery')->with('message', 'Lottery Tickets Generated!');
    }

    public function getEditLottery($id){
    	$lottery = Lottery::getLottery($id);
    	$lotteries = Lottery::allLotteries();

    	return view('back.admin.pages.lottery-creation')->with(['lottery' => $lottery, 'lotteries' => $lotteries]);

    }

    public function postEditLottery(Request $request, $id){
    	$lotteryID 	= Lottery::where('id', '=', $id)->first();
    	$this->validate($request, [
    		'issue_date'	=> 'required',
    		'expiry_date'	=> 'required',
    		'no_of_tickets'	=> 'required',
    	]);

    	Lottery::where('id', '=', $id)
    			->update([
		    		'title'			=> $request->title,
		    		'issue_date'	=> $request->issue_date,
		    		'expiry_date'	=> $request->expiry_date,
		    		'no_of_tickets'	=> $request->no_of_tickets,
		    		'status'		=> 1
		    	]);

    	// if($lotteryID->no_of_tickets == $request->no_of_tickets){

    	// }else if($lotteryID->no_of_tickets < $request->no_of_tickets){
    	// 	$nor = $request->no_of_tickets - $lotteryID->no_of_tickets;
    	// 	for($i=0; $i<$nor; $i++){
	    // 		$ticketNumber 	= rand(0,99999999);
	    // 		DB::table('all_lotteries')
	    // 			->insert([
	    // 				'ticket_id'		=> $id,
	    // 				'ticket_number'	=> $ticketNumber.$i,
	    // 				'status'		=> 0
	    // 			]);
	    // 	}
    	// }else if($lotteryID->no_of_tickets > $request->no_of_tickets){
    	// 	DB::table('all_lotteries')
    	// 		->where('ticket_id', '=', $lotteryID->id)
    	// 		->delete();

    	// 	for($i=0; $i<$request->no_of_tickets; $i++){
	    // 		$ticketNumber 	= rand(0,99999999);
	    // 		DB::table('all_lotteries')
	    // 			->insert([
	    // 				'ticket_id'		=> $id,
	    // 				'ticket_number'	=> $ticketNumber.$i,
	    // 				'status'		=> 0
	    // 			]);
	    // 	}
    	// }

    	return redirect()->route('add.lottery')->with('message', 'Lottery Tickets Updated!');
    	
    }

    public function getTickets($id){
    	$tickets = Lottery::getTickets($id);

    	return view('back.admin.pages.lottery-tickets')->with(['tickets' => $tickets]);
    }

    public function getActiveLottery(){
        $member = Member::getMemberByEmail(Sentinel::getUser()->email);
    	$ticket = DB::table('all_lotteries')
                        ->where('member_code', '=', $member->mem_code)
                        ->first();
    	//dd($tickets);
    	return view('back.user.pages.lottery-tickets')->with(['ticket' => $ticket]);
    }

    public function delete($id){
    	DB::table('lotteries')
    		->where('id', '=', $id)
    		->delete();
    	DB::table('all_lotteries')
    		->where('ticket_id', '=', $id)
    		->delete();

    	return redirect()->route('add.lottery')->with('delete', 'Lottery deleted!');
    }

}
