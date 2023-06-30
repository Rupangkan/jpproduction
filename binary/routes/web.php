<?php


Route::get('/', function(){
	return view('front.index');
});

Route::get('about-us', function(){
	return view('front.about');
});

Route::get('contact-us', function(){
	return view('front.contact');
});


Route::get('reg-msg', function(){
	return view('front.registration-msg');
});

Route::get('/logout', [
	'uses'	=> 'LoginController@logout',
	'as'	=> 'logout',
]);

Route::post('/contact-send', [
    'uses'  => 'HomeController@contactSend',
    'as'    => 'contact.send' 
]);

Route::get('/non-payment', function(){
    return view('front.index');
});

Route::group(['middleware' => 'visitors'], function(){

	Route::get('/login', [
		'uses'	=> 'LoginController@getLogin',
		'as'	=> 'user.login',
	]);

	Route::post('/login', [
		'uses'	=> 'LoginController@postLogin',
		'as'	=> 'user.login',
	]);

	Route::get('/register', [
		'uses'	=> 'RegistrationController@getRegister',
		'as'	=> 'user.register',
	]);

	Route::post('/register', [
		'uses'	=> 'RegistrationController@postRegister',
		'as'	=> 'user.register',
	]);

	Route::get('/forgot/password', [
		'uses'	=> 'ForgotPasswordController@forgotPassword',
		'as'	=> 'forgot.password',
	]);

	Route::post('/forgot/password', [
		'uses'	=> 'ForgotPasswordController@postForgotPassword',
		'as'	=> 'forgot.password',
	]);

	Route::get('/reset/{email}/{resetCode}', [
		'uses'	=> 'ForgotPasswordController@resetPassword',
		'as'	=> 'reset.password',
	]);

	Route::post('/reset/{email}/{resetCode}', [
		'uses'	=> 'ForgotPasswordController@postResetPassword',
		'as'	=> 'reset.password',
	]);
});
    


Route::group(['middleware' => 'legal.user'], function(){


//Admin routes================================================

	Route::get('admin/dashboard', [
		'uses'	=> 'DashboardController@getDashboard',
		'as'	=> 'admin.dashboard',
		'middleware' => 'admin'
	]);

	Route::get('admin/profile/{email}', [
		'uses' 	=> 'AdminController@getProfile',
		'as'	=> 'admin.profile'
	]);

	//change Password
	Route::get('admin/change/password', [
		'uses'	=> 'AdminController@getChangePassword',
		'as'	=> 'change.password',
	]);

	Route::post('admin/change/password', [
		'uses'	=> 'AdminController@postChangePassword',
		'as'	=> 'change.password',
	]);

	//Pin Request
	Route::get('admin/pin-request/list', [
		'uses'	=> 'PinController@getAllRequestPin',
		'as'	=> 'admin.pin-request-list',
	]);

	Route::get('admin/send-pin/{id}', [
		'uses'	=> 'PinController@sendPin',
		'as'	=> 'admin.send-pin',
	]);

	Route::get('user/pin-request', [
		'uses'	=> 'PinController@getRequestPin',
		'as'	=> 'user.pin-request',
	]);

	Route::post('user/pin-request', [
		'uses'	=> 'PinController@requestPin',
		'as'	=> 'user.pin-request',
	]);

	Route::get('user/pin-list', [
		'uses'	=> 'PinController@getPinList',
		'as'	=> 'user.pin-list',
	]);

	//Memeber Routes
	
	Route::get('members', [
		'uses'	=> 'MemberController@getMembers',
		'as'	=> 'get.members',
	]);

	Route::get('member/add', [
		'uses' 	=> 'MemberController@getAddMember',
		'as'	=> 'add.member'
	]);

	Route::get('member/add-new/{id}', [
		'uses' 	=> 'MemberController@getAddNewMember',
		'as'	=> 'add.new-member'
	]);
	
	Route::get('member/add/{mem_code}', [
		'uses' 	=> 'MemberController@getAddMemberByCode',
		'as'	=> 'add.member.code'
	]);

	Route::post('member/add', [
		'uses' 	=> 'MemberController@postAddMember',
		'as'	=> 'add.member'
	]);

	Route::get('member/edit/{id}', [
		'uses' 	=> 'MemberController@getUpdateMemberDetails',
		'as'	=> 'edit.member'
	]);

	Route::get('admin/tree', [
		'uses' 	=> 'MemberController@getTreeView',
		'as'	=> 'admin.tree'
	]);

	Route::get('admin/tree/{id}', [
		'uses' 	=> 'MemberController@getTreeViewPar',
		'as'	=> 'admin.tree.par'
	]);

	Route::get('admin/search/tree', [
		'uses' 	=> 'MemberController@getTreeViewForm',
		'as'	=> 'admin.tree.form'
	]);

	Route::get('member/delete/{id}', [
		'uses' 	=> 'MemberController@delete',
		'as'	=> 'delete.member',
		'middleware' => 'admin'
	]);
	
//Payouts================================================
	Route::get('admin/payouts', [
		'uses'	=> 'PayoutController@getPayouts',
		'as'	=> 'admin.payouts',
	]);

	Route::get('admin/payouts/history', [
		'uses'	=> 'PayoutController@getPayoutHistory',
		'as'	=> 'admin.payout.history',
	]);

	Route::post('admin/make/payment', [
		'uses'	=> 'PayoutController@makePayment',
		'as'	=> 'make.payment',
	]);
	
	Route::get('admin/make/multi-payments', [
	    'uses'  => 'PayoutController@makeMultiPayments',
	    'as'    => 'make.multi-payments',
	]);

	Route::post('admin/filter/payout/history/data', [
		'uses'	=> 'PayoutController@getFilterPayoutHistory',
		'as'	=> 'filter.payout.history.data',
	]);

	Route::get('admin/payouts/history/{id}', [
		'uses'	=> 'PayoutController@getPayoutDetails',
		'as'	=> 'admin.payout.details',
	]);
	
	Route::get('admin/receipt/{id}', function($id){
	    return view('back.admin.pages.receipt')->with(['id' => $id]);
	});
	
	
    Route::get('admin/receiptall', 'PayoutController@DowloadReceiptAll');
    Route::get('/admin/receiptselectd/{data}', 'PayoutController@DowloadReceiptSelected');
//Lottery Routes=====================================================

	Route::get('admin/lottery/add', [
		'uses'	=> 'LotteryController@getAddLottery',
		'as'	=> 'add.lottery',
	]);

	Route::post('admin/lottery/add', [
		'uses'	=> 'LotteryController@postAddLottery',
		'as'	=> 'add.lottery',
	]);

	Route::get('admin/lottery/edit/{id}', [
		'uses'	=> 'LotteryController@getEditLottery',
		'as'	=> 'edit.lottery',
	]);

	Route::post('admin/lottery/edit/{id}', [
		'uses'	=> 'LotteryController@postEditLottery',
		'as'	=> 'edit.lottery',
	]);

	Route::get('admin/lottery/tickets/{id}', [
		'uses'	=> 'LotteryController@getTickets',
		'as'	=> 'get.tickets',
	]);

	Route::get('admin/lottery/delete/{id}', [
		'uses'	=> 'LotteryController@delete',
		'as'	=> 'lottery.delete',
	]);


//User Routes=========================================================

	Route::get('member/dashboard', [
		'uses'	=> 'DashboardController@getDashboard',
		'as'	=> 'member.dashboard'
	]);

	Route::get('member/details/{id}', [
		'uses' 	=> 'MemberController@getUpdateMemberDetails',
		'as'	=> 'member.details'
	]);

	Route::post('member/details', [
		'uses' 	=> 'MemberController@udateMemeberDetails',
		'as'	=> 'member.update'
	]);

	Route::get('member/tree', [
		'uses' 	=> 'MemberController@getTreeView',
		'as'	=> 'member.tree'
	]);

	Route::get('member/profile/{email}', [
		'uses' 	=> 'UserController@getProfile',
		'as'	=> 'member.profile'
	]);

//Product
	Route::get('admin/product', [
		'uses'	=> 'ProductController@getProduct',
		'as'	=> 'admin.product',
	]);

	Route::post('admin/product', [
		'uses'	=> 'ProductController@addProduct',
		'as'	=> 'admin.product',
	]);

	Route::get('admin/edit-product/{id}', [
		'uses'	=> 'ProductController@getEditProduct',
		'as'	=> 'admin.edit-product',
	]);

	Route::post('admin/edit-product/{id}', [
		'uses'	=> 'ProductController@postEditProduct',
		'as'	=> 'admin.edit-product',
	]);

	Route::get('admin/product-delete/{id}', [
		'uses'	=> 'ProductController@delete',
		'as'	=> 'admin.product-delete',
	]);

//Payouts
	Route::get('member/payouts', [
		'uses'	=> 'PayoutController@getMemberPayout',
		'as'	=> 'member.payouts',
	]);

	Route::post('member/filter/payout/data', [
		'uses'	=> 'PayoutController@getFilterData',
		'as'	=> 'filter.payout.data',
	]);

	//Lottery route
	Route::get('member/lottery', [
		'uses'	=> 'LotteryController@getActiveLottery',
		'as'	=> 'get.active.lottery',
	]);

	//New REgistration
	Route::get('admin/new-registration', [
		'uses'	=> 'RegistrationController@getRegistration',
		'as'	=> 'admin.new-registration',
	]);
	
	Route::post('/user-register', [
		'uses'	=> 'RegistrationController@postRegister',
		'as'	=> 'user.user-register',
	]);


	//change Password
	Route::get('user/change/password', [
		'uses'	=> 'UserController@getChangePassword',
		'as'	=> 'change.user.password',
	]);

	Route::post('user/change/password', [
		'uses'	=> 'UserController@postChangePassword',
		'as'	=> 'change.user.password',
	]);
	
	//send sms
	Route::get('admin/send-sms/{id}', [
	    'uses'  => 'MemberController@sendSms',
	    'as'    => 'send.sms',
	]);
	Route::get('admin/send-sms-all', [
	    'uses'  => 'MemberController@sendSmsAll',
	    'as'    => 'send.sms-all',
	]);
	
	Route::get('admin/message', [
	    'uses'  => 'MemberController@getMessage',
	    'as'    => 'admin.message',
	]);
	
	Route::post('admin/message', [
	    'uses'  => 'MemberController@postMessage',
	    'as'    => 'admin.message',
	]);
});
