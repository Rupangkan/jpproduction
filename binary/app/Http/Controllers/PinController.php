<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pin;
use Exception;
use Sentinel;
use DB;

class PinController extends Controller
{
    public function getRequestPin(){
    	$pins = Pin::getPinByUsername(Sentinel::getUser()->username);
    	return view('back.user.pages.pin-request')->with(['pins' => $pins]);
    }

    public function requestPin(Request $request){
    	$this->validate($request, [
    			'amount' => 'required'
    		]);

    	try {
    		Pin::insert([
    				'amount' 	=> $request->amount,
    				'dated'		=> date('Y-m-d'),
    				'username'	=> Sentinel::getUser()->username,
    				'created_at'=> date('Y-m-d')
    			]);

    		return redirect()->route('user.pin-request')->with('message', 'Pin request successfully generate.');
    	} catch (Exception $e) {
    		dd($e);
    	}
    }

    public function getAllRequestPin(){
    	$pins = Pin::allPins();
    	return view('back.admin.pages.admin-pin-request')->with(['pins' => $pins]);
    }

    public function sendPin($id){
        $pin_data = Pin::getPin($id);
        $no_of_pin = $pin_data->amount/10;
        try {
            for($i=0; $i<$no_of_pin; $i++){
                $pin = date('dhis').rand(0,100);
                $check = DB::table('pin_list')
                            ->where('pin', '=', $pin)
                            ->first();
                if(!$check){
                    DB::table('pin_list')
                    ->insert([
                            'username'  => $pin_data->username,
                            'pin'       => $pin,
                            'created_at'=> date('Y-m-d')
                        ]);
                }
            }
            DB::table('pins')->where('id', '=', $id)->update(['status' => 'close']);
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->route('admin.pin-request-list')->with('message', 'Pin generated successfully.');
    }

    public function getPinList(){
        $pins = DB::table('pin_list')
                    ->where('status', '=', 'open')
                    ->orWhere('username', '=', Sentinel::getUser()->username)
                    ->get();

        return view('back.user.pages.pin-list')->with(['pins' => $pins]);
    }
}
