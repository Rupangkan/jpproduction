<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;

class DashboardController extends Controller
{
    public function getDashboard(){
        
        if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
        	return view('back.admin.pages.dashboard');
        }else{
        	return view('back.user.pages.dashboard');
        }
    	
    }
}
