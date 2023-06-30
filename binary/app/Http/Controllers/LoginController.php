<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use DB;
use App\User;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('authentication.login');
    }

    public function postLogin(Request $request){
        //dd($request->all());
       
        try{
            $rememberMe = false;
            if($request->remember_me == 'true'){
                $rememberMe = true;
            }
            $credentials = ([
                'login'     => $request->email,
                'password'  => $request->password,
            ]);

            if(Sentinel::authenticate($credentials, $rememberMe)){
                $slug = Sentinel::getUser()->roles()->first()->slug;
                if(Sentinel::getUser()->status == 1){
                    if($slug == 'admin'){
                        $request->session()->flash('loginmessage', 'You are successfully logged in!');
                        return response()->json(['redirect'=> route('admin.dashboard')]);
                    }
                    if($slug == 'user'||$slug == 'director'){
                        $request->session()->flash('loginmessage', 'You are successfully logged in!');
                        return response()->json(['redirect'=> route('member.dashboard')]);
                    }
                }else{
                    Sentinel::logout();
                    return response()
                            ->json(['error_message'=>'You are blocked from accessing this system!'], 500);
                }
            }else{
                return response()
                            ->json(['error_message'=>'User credentials provided are wrong!'], 500);
            }
        }catch(ThrottlingException $e){
            $delay = $e->getDelay();
            return response()
                        ->json(['error_message'=>"Your account is banned for $delay seconds for suspicious activities!"], 500);
        }catch (NotActivatedException $e){
            return response()
                        ->json(['error_message'=>'Account Not Activated!'], 500);
        }
    }

    public function logout(){
    	Sentinel::logout();
    	return redirect()
				->route('user.login')
				->with('logout-message', 'You have successfully logged out of IBPMS!');
    }
}
