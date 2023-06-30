<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;

class RegistrationController extends Controller
{
   public function getRegister(){
   		return view('authentication.register');
   }

   public function postRegister(Request $request){
        
        // dd($request->all());
   		
   		$this->validate($request, [
   			'full_name'	    => 'required',
            'phone'         => 'required',
            'sponser'       => 'required',
            'side'          => 'required'
   		]);

         DB::table('registrations')
               ->insert([
                     'full_name'        => $request->full_name,
                     'phone'            => $request->phone,
                     'sponser'          => $request->sponser,
                     'side'             => $request->side,
                     'email'            => $request->email,
                     'address'          => $request->address,
                     'account_number'   => $request->account_number,
                     'bank_name'        => $request->bank_name,
                     'bank_phone'       => $request->bank_phone,
                     'nominee'     => $request->nominee,
                     'created_at'       => date('Y-m-d')
                  ]);

   		return redirect()->route('add.member')
                     ->with('message', 'Member added successfully!');
   }

   public function getRegistration(){
      $members = DB::table('registrations')
                     ->orderby('id', 'desc')
                     ->get();

      return view('back.admin.pages.new-registrations')->with(['members' => $members]);
   }
}
