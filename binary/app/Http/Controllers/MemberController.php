<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;
use Sentinel;
use Session;
use Image;
use DB;
use Mail;
use Exception;

class MemberController extends Controller
{
    private $data=array();
    private $i=0;
        
    private function sendEmail($email, $full_name, $username){
    	Mail::send('emails.email', [
    		'email'	    => $email,
    		'full_name' => $full_name,
                'username'  => $username,
    	], function($message) use ($email, $full_name, $username){
    		$message->to($email);
    		$message->subject("Hello Dear $full_name, your registration is successfull.");
    	});
    }

    public function getMembers(){
    	$members = Sentinel::getUserRepository()->orderby("id")->get();
        if(Sentinel::getUser()->roles()->first()->slug == 'admin')
    	    return view('back.admin.pages.members')->with(['members' => $members]);
        else{
            $member = DB::table('users')->where('sponsoror_id', '=' , Sentinel::getUser()->id)->get();
            return view('back.user.pages.members')->with(['members' => $member]);
            
        }
    }
    
    private function _preorder($node){
        $x=0;
        $data[] = DB::table('users')->where('username', '=', $node)->first();
        $node = DB::table('tree')->where('member_code', '=', $node)->first();
        if($node->left) {
            $this->_preorder($node->left);
        }else{
            $x=1;
        }
        
        if($node->right) {
            $this->_preorder($node->right); 
        }else{
            $x=1;
        }
         if($x ==1){
             print_r($data);
             echo '<br/><br/>';
         }
    }

    public function getAddMember(){

    	if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
    		return view('back.admin.pages.add-member')->with(['member' => null]);
    	}else{
            return view('back.user.pages.add-member')->with(['member' => null]);
        }
    }

    public function getAddNewMember($id){
        $newMember = DB::table('registrations')
                        ->where('id', '=', $id)
                        ->first();
        //dd($newMember);
        DB::table('registrations')->where('id', '=', $id)->delete();
        return view('back.admin.pages.add-member')->with(['newMember' => $newMember]);
    }
    
    public function getAddMemberByCode($mem_code){
    	if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
    		return view('back.admin.pages.add-member')->with(['code' => $mem_code]);
    	}else{
    		return view('back.user.pages.add-member')->with(['code' => $mem_code]);
    	}
    }

    public function postAddMember(Request $request){
    	//dd($request->all());
        
    	$this->validate($request, [
            "full_name"         => "required",            
            "phone"             => "required",
            "pan"               => "required",
            "referance_code"    => "required",
            "side"              => "required"
        ]);
        
        $sponsoror_id = DB::table('users')->where('username', '=', $request->referance_code)->first()->id;

        $username = 'JPP'.date('is').rand(10,9999);
        $under_userID = $request->referance_code;
        $temp_under_userID  = $under_userID;
        $slug = Sentinel::getUser()->roles()->first()->slug;
        $side = $request->side;

        // $pin = DB::table('pin_list')
        //             ->where('pin', '=', $request->pin)
        //             ->where('status', '=', 'open')
        //             ->first();
        
        $pin = '123456';

        $sponser_id = DB::table('users')
                        ->where('username', '=', $under_userID)
                        ->first();


        $side_check = DB::table('tree')
                                ->where('member_code', '=', $under_userID)
                                ->first();
                                
        if($pin || $slug =='admin'){

            if($sponser_id){
                
                //insert tree--------------------------------------------------
                DB::table('tree')
                    ->insert([
                        'member_code'   => $username,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);

                //insert income------------------------------------------------
                DB::table('incomes')
                    ->insert([
                        'member_code'   => $username,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);

                $value =1;
                while ($value > 0) {
                    if($side_check->$side == ''){
                        
                        //tree updated------------------------------------------------
                        DB::table('tree')
                            ->where('member_code', '=', $temp_under_userID)
                            ->update([
                                    $request->side  => $username,
                                    'created_at'    => date('Y-m-d') 
                                ]);

                        $value = 0;
                    }else{
                        //tree updated------------------------------------------------
                        $under = DB::table('tree')
                                    ->where('member_code', '=', $temp_under_userID)
                                    ->first();
                        $side_check = DB::table('tree')
                                    ->where('member_code', '=', $under->$side)
                                    ->first();
                        $temp_under_userID = $side_check->member_code;
                    }
                }

                if($request->side == 'left'){
                    $s_leftCount = User::byUsername($request->referance_code)->total_sponsored_l;
                    $s_leftCount+=1;
                    //dd($s_leftCount);
                    DB::table('users')
                        ->where('username', '=', $request->referance_code)
                        ->update([
                                'total_sponsored_l' => $s_leftCount,
                                'updated_at'        => date('Y-m-d H:i:s')
                            ]);
                }else if($request->side == 'right'){
                    $s_rightCount = User::byUsername($request->referance_code)->total_sponsored_r;
                    $s_rightCount+=1;
                    DB::table('users')
                        ->where('username', '=', $request->referance_code)
                        ->update([
                                'total_sponsored_r' => $s_rightCount,
                                'updated_at'        => date('Y-m-d H:i:s')
                            ]);
                }
                
                $sponsor_bal = 0;
                $current_bal = 0;
                $total_bal =0;
                $sponsor = DB::table('incomes')->where('member_code', '=', $request->referance_code)->first();
                
                $sponsor_bal = $sponsor->sponsor_balance + 20;
                $current_bal = $sponsor->current_bal + 20;
                $total_bal = $sponsor->total_bal + 20;
                $serial = DB::table('users')->max('sl_no')+1;
                
                DB::table('incomes')
                    ->where('member_code', '=', $request->referance_code)
                    ->update(['sponsor_balance' => $sponsor_bal, 'current_bal' => $current_bal, 'total_bal' => $total_bal]);
                $serial = DB::table('users')->max('sl_no')+1;
                $data= array(
                    'sl_no'             => $serial,
                    'username'          => $username,
                    'full_name'         => $request->full_name,
                    'phone'             => $request->phone,
                    'email'             => $request->email,
                    'pan'               => $request->pan,
                    'address'           => $request->address,
                    'account_no'        => $request->account_no,
                    'bank_name'         => $request->bank_name,
                    'bank_phone'        => $request->bank_phone,
                    'nominee_name'      => $request->nominee_name,
                    'referance_code'    => $temp_under_userID,
                    'side'              => $request->side,
                    'join_date'         => $request->join_date,
                    'total_sponsored_r' => 0,
                    'total_sponsored_l' => 0,
                    'sponsoror_id'      => $sponsoror_id,
                    'password'          => '123456'
                );

                $user = Sentinel::registerAndActivate($data);

                $role = Sentinel::findRoleBySlug('user');
                $role->users()->attach($user);
                               

                //Close used pin-----------------------------------------------
                if($slug == 'user'){
                    DB::table('pin_list')
                        ->where('pin', '=', $request->pin)
                        ->update([
                                'status'        => 'close',
                                'updated_at'    => date('Y-m-d')
                            ]);
                }

                //main function------------------------------------------------

                $temp_side          = $side;
                $temp_side_count    = $side.'count';

                $total_count = 1;
                while($total_count>0){
                    
                    $result = DB::table('tree')
                                ->where('member_code', '=', $temp_under_userID)
                                ->first();
                    //dd($temp_side_count);
                    $current_temp_side_count = $result->$temp_side_count + 1;

                    DB::table('tree')
                        ->where('member_code', '=', $temp_under_userID)
                        ->update([
                                "$temp_side_count"  => $current_temp_side_count,
                                'updated_at'        => date('Y-m-d')
                            ]);

                    if($temp_under_userID != ""){
                        $income_data = $this->getIncome($temp_under_userID);
                        $tree_data = $this->getTree($temp_under_userID);
                        $temp_left_count = $tree_data->leftcount;
                        $temp_right_count = $tree_data->rightcount;

                        if($temp_left_count>0 && $temp_right_count>0){

                            if($temp_side == "left"){

                                if($temp_left_count<=$temp_right_count){
                                    $new_day_bal = $income_data->day_bal+20;
                                    $new_current_bal = $income_data->current_bal+20;
                                    $new_total_bal = $income_data->total_bal+20;

                                    DB::table('incomes')
                                        ->where('member_code', '=', $temp_under_userID)
                                        ->update([
                                                'day_bal'       => $new_day_bal,
                                                'current_bal'   => $new_current_bal,
                                                'total_bal'     => $new_total_bal,
                                                'updated_at'    => date('Y-m-d')
                                            ]);
                                }
                                
                            }else{
                                if($temp_left_count>=$temp_right_count){
                                    $new_day_bal = $income_data->day_bal+20;
                                    $new_current_bal = $income_data->current_bal+20;
                                    $new_total_bal = $income_data->total_bal+20;

                                    DB::table('incomes')
                                        ->where('member_code', '=', $temp_under_userID)
                                        ->update([
                                                'day_bal'       => $new_day_bal,
                                                'current_bal'   => $new_current_bal,
                                                'total_bal'     => $new_total_bal,
                                                'updated_at'    => date('Y-m-d')
                                            ]);
                                }
                            }
                        }

                        $next_under_userID = $this->getUnderUserID($temp_under_userID)->referance_code;
                        $temp_side =  $this->getUnderUserIDSide($temp_under_userID)->side;
                        $temp_side_count = $temp_side.'count';
                        $temp_under_userID = $next_under_userID;
                    }
                    if($temp_under_userID == ""){
                        $total_count = 0;
                    }

                }
               
            }else{
                return redirect()->route('add.member')->with('error', 'Invalid Sponser ID.');
            }
        }else{
            return redirect()->route('add.member')->with('error', 'Invalid Pin entered.');
        }
//sms integration---------------------------------------------------------------
        if($request->phone){
            $api_key = '25B8FA31403A49';
            $contacts = $request->phone;
            $from = 'GANESH';
            $sms_text = urlencode('Welcome to JP Production, Guwahati. Congratulation, you are very lucky, your Member ID No is '.$username.'. and Password is 123456. Kindly visit jpproductionganesh.in');
            
            //Submit to server
            
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, "http://msg.24techsoft.com/app/smsapi/index.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
            $response = curl_exec($ch);
            curl_close($ch);
        }
    
        Session::flash('message', 'Member successfully registered!');

        return redirect()->route('add.member');
    }

    protected function getIncome($member_code){
        return DB::table('incomes')->where('member_code', '=', $member_code)->first();
    }

    protected function getTree($member_code){
        return DB::table('tree')->where('member_code', '=', $member_code)->first();
    }

    protected function getUnderUserID($member_code){
        return DB::table('users')->where('username', '=', $member_code)->first();
    }

    protected function getUnderUserIDSide($member_code){
        return DB::table('users')->where('username', '=', $member_code)->first();
    }

    public function getUpdateMemberDetails($id){
        $member = Sentinel::findUserById($id);

        if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
            return view('back.admin.pages.add-member')->with(['member' => $member]);
        }else{
            return view('back.user.pages.add-member')->with(['member' => $member]);
        }
    }

    public function udateMemeberDetails(Request $request){
        
    	$this->validate($request, [
    		"full_name" 			=> "required",
    	]);        

    	User::where('username', '=', $request->username)
    			->update([
		    		'full_name'     => $request->full_name,
    				'pan'           => $request->pan,
    				'email'         => $request->email,
    				'phone'         => $request->phone,
    				'address'       => $request->address,
                    'account_no'    => $request->account_no,
                    'bank_name'     => $request->bank_name,
                    'bank_phone'    => $request->bank_phone,
                    'nominee_name'  => $request->nominee_name,
                    'join_date'     => $request->join_date,
                    'updated_at'    => date('Y-m-d')
		    	]);
        
        $id = User::byUsername($request->username)->id;
        Session::flash('message', 'Details successfully updated!');
        if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
		  return redirect()->route('edit.member',$id);
        }else{
          return redirect()->route('member.details', $id);
        }
    }

    public function getTreeView(){
        $isAdmin = Sentinel::getUser()->roles()->first()->slug;
        if($isAdmin == 'admin'){
            return view('back.admin.pages.tree-view-member');
        }else{
            return view('back.user.pages.tree-view-member');
        }
    }

    public function getTreeViewPar($id){
    	return view('back.admin.pages.tree-view-par')->with(['id' => $id]);
    }

    public function getTreeViewForm(Request $request){
        if(Sentinel::getUser()->roles()->first()->slug == 'admin')
        return view('back.admin.pages.tree-view-par')->with(['id' => $request->srch]);
        else
        return view('back.user.pages.tree-view-par')->with(['id' => $request->srch]);
    }

    public function delete($id){
    	$member = Member::getMember($id);

    	if(count($member) > 0){
    		unlink('./'.$member->sign);
    		unlink('./'.$member->photo);

    		Member::where('id', '=', $id)->delete();
    		User::where('member_code', '=', $member->mem_code)->delete();
    		DB::table('member_income')->where('member_code', '=', $member->code)->delete();
    	}

    	return redirect()->route('get.members')->with('delete', 'Member successfully deleted!');
    }
    
    public function sendSms($id){
        $member = User::getUser($id);
        //dd($member->phone);
        if($member->phone){
            $api_key = '25B8FA31403A49';
            $contacts = $member->phone;
            $from = 'GANESH';
            $sms_text = urlencode('Welcome to JP Production, Guwahati. Congratulation, you are very lucky, your Member ID No is '.$member->username.'. and Password is 123456. jpproductionganesh.in, Mobile- 8638707780.');
            
            //Submit to server
            
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, "http://msg.24techsoft.com/app/smsapi/index.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
            $response = curl_exec($ch);
            curl_close($ch);
            //dd($response);
            Session::flash('message', 'Message sent to member.');
            return redirect()->route('get.members');
        }
        Session::flash('message', 'Message not sent to member.');
        return redirect()->route('get.members');
    }
    
    public function sendSmsAll(){
        $members = User::allUsers();
        //dd($member->phone);
        foreach($members as $member){
            if($member->referance_code){
                if($member->phone){
                    $api_key = '25B8FA31403A49';
                    $contacts = $member->phone;
                    $from = 'GANESH';
                    $sms_text = urlencode('Welcome to JP Production, Guwahati. Congratulation, you are very lucky, your Member ID No is '.$member->username.'. and Password is 123456.  jpproductionganesh.in, Mobile- 8638707780.');
                    
                    //Submit to server
                    
                    $ch = curl_init();
                    curl_setopt($ch,CURLOPT_URL, "http://book.24techsoft.com/api/sendmsg.php?user=jppg&pass=123456&sender=GANESH&phone=".$contacts."&text=".$sms_text."&priority=ndnd&stype=normal");
                    	

                    /*curl_setopt($ch,CURLOPT_URL, "http://msg.24techsoft.com/app/smsapi/index.php");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);*/
                    $response = curl_exec($ch);
                    curl_close($ch);
                    //dd($response);
                }
            }
        }
        Session::flash('message', 'Message sent to member.');
        return redirect()->route('get.members');
    }
    
    public function getMessage(){
        $members = Sentinel::getUserRepository()->get();
    	
    	return view('back.admin.pages.message')->with(['members' => $members]);
    }
    
    public function postMessage(Request $request){
        //dd($request->all());
        $this->validate($request, [
                'phone'     => 'required',
                'message'   => 'required'
            ]);
            
        if($request->phone){
        foreach($request->phone as $phone){
            $api_key = '25B8FA31403A49';
            $contacts = $phone;
            $from = 'GANESH';
            $sms_text = urlencode($request->message);
            
            //Submit to server
            
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, "http://msg.24techsoft.com/app/smsapi/index.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
            $response = curl_exec($ch);
            curl_close($ch);
            //dd($response);
        }
    }
       
    Session::flash('message', 'Message sent to member.');
    return redirect()->route('admin.message');
    }
}