<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Sentinel;
use Session;
use DB;

class UserController extends Controller
{
	public function getProfile($id){
        $member = Member::getMemberDtls($id);
        //dd($user);
        return view('back.user.pages.profile')->with(['member' => $member]);
    }
    public function getChangePassword(){
		return view('back.user.pages.change-password');
	}

	public function postChangePassword(Request $request){

		$hasher = Sentinel::getHasher();

        $oldPassword =$request->current_password;
        $password = $request->new_password;
        $passwordConf = $request->confirm_password;

        $user = Sentinel::getUser();

        if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
            Session::flash('error', 'You have entered a wrong Current Password.');
            return redirect()->route('change.password');
        }

        Sentinel::update($user, array('password' => $password));

      	Session::flash('message', 'Password has been changed successfully.');
        return redirect()->route('change.user.password');
    }
    public function MemberDetailByCode(Request $request)
    {
        $data=DB::table("users")->where("username",$request["username"])->first();
        return json_encode($data);
    }
}
