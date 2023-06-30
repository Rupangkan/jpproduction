<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payout;
use App\Member;
use DB;
use Sentinel;

class PayoutController extends Controller
{
	public function getPayouts(){
		$payouts = DB::table('incomes')
    				->orderby('id', 'asc')->get();

    	return view('back.admin.pages.payouts')->with(['payouts' => $payouts]);
	}

	public function getPayoutHistory(){
		$payouts = Payout::allPayouts();

		return view('back.admin.pages.payout-history')->with(['payouts' => $payouts]);
	}

    public function getPayoutDetails($id){
        $payouts = DB::table('payout_details')
                        ->where('member_code', '=', $id)
                        ->get();
        return view('back.admin.pages.payout-details')->with(['payouts' => $payouts]);
    }

	public function makePayment(Request $request){
		//dd($request->all());
        //dd(date('Y-m-d', strtotime(date('Y-m-d') .' -1 day')));
		$currentBal = 0;
        $dayBal = 0;
		$totalPayout = 0;
		$memberIncome = DB::table('incomes')
							->where('member_code', '=', $request->payout_id)
							->first();
        //dd($memberIncome);
        
		if($request->amount == ''){
			return redirect()->route('admin.payouts')->with('error', 'Invalid payout amount.');
		}
		if($memberIncome->current_bal >= $request->amount){
          $currentBal   = ($memberIncome->current_bal)-$request->amount;
          $dayBal       = 0;
        }else{
            return redirect()->route('admin.payouts')->with('error', 'Invalid payout amount.');
        }

		//dd($totalPayout);
		$check = Payout::where('member_code', '=', $request->payout_id)->first();
        $totalPayout = $request->amount;
		if($check){
            $totalPayout += $check->total_payout_amount;
			Payout::where('member_code', '=', $request->payout_id)
					->update([
						'last_payout_date'		=> date('Y-m-d'),
						'last_payout_amount'	=> $request->amount,
						'total_payout_amount'	=> $totalPayout
					]);

		}else{
			Payout::insert([
				'last_payout_date'		=> date('Y-m-d'),
				'last_payout_amount'    => $request->amount,
				'member_code'			=> $request->payout_id,
				'total_payout_amount'	=> $totalPayout,
				'created_at'			=> date('Y-m-d H:i:s')
			]);
		}

		DB::table('payout_details')
			->insert([
				'payout_date' 	=> date('Y-m-d'),
				'sponsor_amount'=> $memberIncome->sponsor_balance,
				'payout_amount'	=> $request->amount,
				'member_code'	=> $request->payout_id,
				'created_at'	=> date('Y-m-d H:i:s')
			]);
		
		DB::table('incomes')
			->where('member_code', '=', $request->payout_id)
			->update([
				'current_bal'	=> $currentBal,
                'day_bal'       => $dayBal,
                'sponsor_balance' => 0,
                'updated_at'    => date('Y-m-d')
			]);

		return redirect('admin/receipt/'.DB::table('payout_details')->max('id'));
	}
	
	public function makeMultiPayments(Request $request){
	    
	    if(count($request->member_code)>0){
	        $arr = explode(',', $request->member_code);    
	    }else{
	        $str = DB::table('incomes')->get();
	        foreach($str as $sr){
	            $arr[] = $sr->member_code;
	        }
	    }
	    
	    for($i=0;$i<count($arr);$i++){
	        $PrevPayout=DB::table('payout_details')->where('member_code','=',$arr[$i])->where('payout_date','=',date('Y-m-d'))->first();
	        if($PrevPayout!=null)
	        {
	            continue;
	        }
	        $currentBal = 0;
            $dayBal = 0;
    		$totalPayout = 0;
    		$memberIncome = DB::table('incomes')
    							->where('member_code', '=', $arr[$i])
    							->first();
            //dd($memberIncome);
            
    		if($memberIncome->current_bal == ''){
    			continue;
    		}
    
    		//dd($totalPayout);
    		$check = Payout::where('member_code', '=', $arr[$i])->first();
    		$totalPayout = $memberIncome->current_bal;
    		if($check!=null){
    		    
                $totalPayout += $check->total_payout_amount;
    			Payout::where('member_code', '=',  $arr[$i])
    					->update([
    						'last_payout_date'		=> date('Y-m-d'),
    						'last_payout_amount'	=> $memberIncome->current_bal,
    						'total_payout_amount'	=> $totalPayout
    					]);
    
    		}else{
    			Payout::insert([
    				'last_payout_date'		=> date('Y-m-d'),
    				'last_payout_amount'    => $memberIncome->current_bal,
    				'member_code'			=> $arr[$i],
    				'total_payout_amount'	=> $totalPayout,
    				'created_at'			=> date('Y-m-d H:i:s')
    			]);
    		}
    
    		DB::table('payout_details')
    			->insert([
    				'payout_date' 	=> date('Y-m-d'),
    				'sponsor_amount'=> $memberIncome->sponsor_balance,
    				'payout_amount'	=> $memberIncome->current_bal,
    				'member_code'	=> $arr[$i],
    				'created_at'	=> date('Y-m-d H:i:s')
    			]);
    		
    		DB::table('incomes')
    			->where('member_code', '=', $arr[$i])
    			->update([
    				'current_bal'	=> $currentBal,
                    'day_bal'       => $dayBal,
                    'sponsor_balance' => 0,
                    'updated_at'    => date('Y-m-d')
    			]);
            
            
	    }
	    return 'success';
	}

	public function getMemberPayout(){
		$member_id = Sentinel::getUser()->username;
		$payout = DB::table('payouts')
						->where('member_code', '=', $member_id)
						->first();
		$payouts = DB::table('payout_details')
						->where('member_code', '=', $member_id)
						->get();
		$income = DB::table('incomes')
						->where('member_code', '=', $member_id)
						->first();

		return view('back.user.pages.payouts')->with(['payouts' => $payouts, 'payout' => $payout, 'income' => $income]);	
	}

	public function getFilterData(Request $request){
		$period = $request->id;
        if($period == '0'){
            $payouts = DB::table('payout_details')
                                ->where('payout_date', '=', date('Y-m-d'))
                                ->orderby('id', 'desc')
                                ->get();
            
            return view('back.user.pages.filter-payout-data')->with(['payouts' => $payouts]);
        }elseif($period == '1'){
            $payouts = DB::table('payout_details')
                                ->whereRaw('MONTH(payout_details.payout_date) = ?', date('m'))
                                ->orderby('id', 'desc')
                                ->get();
          	return view('back.user.pages.filter-payout-data')->with(['payouts' => $payouts]);
    	}elseif($period == '3'){
            $payouts = DB::table('payout_details')
                                ->where('payout_details.payout_date', '>=', Carbon::now()->subMonths(3))
                                ->orderby('id', 'desc')
                                ->get();
    		return view('back.user.pages.filter-payout-data')->with(['payouts' => $payouts]);
    	}elseif($period	=='6'){
            $payouts = DB::table('payout_details')
                                ->where('payout_details.payout_date', '>=', Carbon::now()->subMonths(6))
                                ->orderby('id', 'desc')
                                ->get();
    		return view('back.user.pages.filter-payout-data')->with(['payouts' => $payouts]);
    	}elseif($period =='12'){
            $payouts = DB::table('payout_details')
                                ->where('payout_details.payout_date', '>=', Carbon::now()->subMonths(12))
                                ->orderby('id', 'desc')
                                ->get();
    		return view('back.user.pages.filter-payout-data')->with(['payouts' => $payouts]);
    	}elseif($period == 'prd'){
            $payouts = DB::table('payout_details')
                                ->where('payout_details.payout_date', '>=', $from)
                                ->where('payout_details.payout_date', '<=', $to)
                                ->orderby('id', 'desc')
                                ->get();
		    return view('back.user.pages.filter-payout-data')->with(['payouts' => $payouts]);
		}else{
            $payouts = Sales::allSales();
            return view('back.user.pages.filter-payout-data')->with(['payouts' => $payouts]);
        }
	}

	public function getFilterPayoutHistory(Request $request){
		$period = $request->id;
        if($period == '0'){
            $payouts = DB::table('payouts')
                                ->where('created_at', '=', date('Y-m-d'))
                                ->orderby('id', 'desc')
                                ->get();
            
            return view('back.admin.pages.filter-payout-history-data')->with(['payouts' => $payouts]);
        }elseif($period == '1'){
            $payouts = DB::table('payouts')
                                ->whereRaw('MONTH(payouts.created_at) = ?', date('m'))
                                ->orderby('id', 'desc')
                                ->get();
          	return view('back.admin.pages.filter-payout-history-data')->with(['payouts' => $payouts]);
    	}elseif($period == '3'){
            $payouts = DB::table('payouts')
                                ->where('payouts.created_at', '>=', Carbon::now()->subMonths(3))
                                ->orderby('id', 'desc')
                                ->get();
    		return view('back.admin.pages.filter-payout-history-data')->with(['payouts' => $payouts]);
    	}elseif($period	=='6'){
            $payouts = DB::table('payouts')
                                ->where('payouts.created_at', '>=', Carbon::now()->subMonths(6))
                                ->orderby('id', 'desc')
                                ->get();
    		return view('back.admin.pages.filter-payout-history-data')->with(['payouts' => $payouts]);
    	}elseif($period =='12'){
            $payouts = DB::table('payouts')
                                ->where('payouts.created_at', '>=', Carbon::now()->subMonths(12))
                                ->orderby('id', 'desc')
                                ->get();
    		return view('back.admin.pages.filter-payout-data')->with(['payouts' => $payouts]);
    	}elseif($period == 'prd'){
            $payouts = DB::table('payouts')
                                ->where('payouts.created_at', '>=', $from)
                                ->where('payouts.created_at', '<=', $to)
                                ->orderby('id', 'desc')
                                ->get();
		    return view('back.admin.pages.filter-payout-history-data')->with(['payouts' => $payouts]);
		}else{
            $payouts = Sales::allSales();
            return view('back.admin.pages.filter-payout-history-data')->with(['payouts' => $payouts]);
        }
	}
	public function DowloadReceiptAll(Request $request)
	{
	    $LastDate=DB::table("payout_details")->orderby("payout_date","desc")->first();
	    $data["Payouts"]=DB::table("users")->leftjoin("payout_details","users.username","=","payout_details.member_code")->leftjoin("tree","tree.member_code","=","users.username")->select("payout_details.id as ReceiptNo","users.id","users.username","users.full_name","users.phone","users.address","payout_details.payout_date","payout_details.sponsor_amount","payout_details.payout_amount","tree.leftcount","tree.rightcount")->where("payout_details.payout_date",'2019-10-31')->orderby("users.id")->get();
	   //dd($data);
	    return view("receipts",$data);
	}
	
	public function DowloadReceiptSelected($mem)
	{
	    //dd($request->member_code);
	    $member_code = explode(',', $mem);
	    
	    for($i = 0; $i<count($member_code); $i++){
    	    $data[]=DB::table("users")
    	                            ->leftjoin("payout_details","users.username","=","payout_details.member_code")->leftjoin("tree","tree.member_code","=","users.username")->select("payout_details.id as ReceiptNo","users.username","users.id","users.full_name","users.phone","users.address","payout_details.payout_date","payout_details.sponsor_amount","payout_details.payout_amount","tree.leftcount","tree.rightcount")
    	                            ->where('payout_details.member_code', '=', $member_code[$i])
    	                            ->first();
	    }
	   //dd($data);
	   return view("receipts", ['Payouts' => $data]);
	}
}
