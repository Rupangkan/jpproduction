<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Member;
use Sentinel;
use Session;
use DB;

class AdminController extends Controller
{
	public function getAdminManage(){
		$roles  = Role::allRoles();
                $users  = User::allUsers();
		return view('admin.pages.manage-admin')
				->with([
					'roles'	   => $roles,
                                        'users'    => $users
				]);
	}

	public function getChangePassword(){
		return view('back.admin.pages.change-password');
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
        return redirect()->route('change.password');
    }

    public function createUser(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'name'      => 'required|unique:users',
            'username'  => 'required|unique:users',
            'phone'     => 'required|unique:users',
            'email'     => 'required|unique:users|email',
        ]);

    	$user = Sentinel::registerAndActivate($request->all());

   		$role = Sentinel::findRoleBySlug($request->role);
   		$role->users()->attach($user);

   		return redirect()
                 ->route('admin.manage')
                 ->with('message', 'New User has been successfully created.');
    }

    public function getEditUser(Request $request){

        $roles  = Role::allRoles();
        $user = User::getUser($request->id);
        return view('admin.pages.edit-user')
                ->with([
                    'user'  => $user,
                    'roles' => $roles,
                    ]);
    }

    public function postEditUser(Request $request){
        User::where('id', '=', $request->id)
                ->update([
                    'name'      => $request->edit_name,
                    'username'  => $request->edit_username,
                    'email'     => $request->edit_email,
                    'phone'     => $request->edit_phone,
                    'address'   => $request->edit_address,
                    ]);
        DB::table('role_users')
                ->where('user_id', $request->id)
                ->update(['role_id' => $request->edit_role]);

        $roles  = Role::allRoles();
        $users   = User::allUsers();
        Session::flash('message', 'User data has been successfully updated.');
        return redirect()->route('admin.manage')
                ->with([
                    'roles' => $roles,
                    'users' => $users,
                ]);
    }

    public function blockUser(Request $request){
        if(isset($request->id)){
            if(Sentinel::findById($request->id)->status == 1)
                $status = 0;
            else
                $status =1;

            User::where('id', '=', $request->id)
                    ->update([
                        'status' => $status,
                    ]);
            echo 'success';
           
        }else{
            echo 'unsuccess';
        }
    }

    public function getProfile($id){
        $member = Sentinel::getUser();
        //dd($user);
        return view('back.admin.pages.profile')->with(['member' => $member]);
    }
}
