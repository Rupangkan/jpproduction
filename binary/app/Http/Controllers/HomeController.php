<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Sentinel;
use Session;
use Mail;

class HomeController extends Controller
{
	public function Home()
	{
	    return view("AIECPL/Home");
	}
	public function About()
	{
	    return view("AIECPL/About");
	}
	public function Mission()
	{
	    return view("AIECPL/Mission");
	}
	public function Vision()
	{
	    return view("AIECPL/Vision");
	}
	public function Board()
	{
	    return view("AIECPL/Board");
	}
	public function Business()
	{
	    return view("AIECPL/BusinessPlan");
	}
	public function Contact()
	{
	    return view("AIECPL/Contact");
	}
	public function Career()
	{
	    return view("AIECPL/Career");
	}
	public function Lucky()
	{
	    return view("AIECPL/LuckyAward");
	}
	public function Products()
	{
	    return view("AIECPL/Product");
	}
	
	public function contactSend(Request $request){
	    $this->sendEmail($request);
	    return view("AIECPL/Contact")->with(['message'=> 'Your message has been successfully delivered, Thank You!']);
	}
	
	 private function sendEmail($email){
    	Mail::send('emails.contact', [
    		'email'	=> $email
    	], function($message) use ($email){
    		$message->to('info@aiecpl.in');
    		$message->subject("Hello admin, ".$email->FullName." tried to contact you.");
    	});
    }
}
