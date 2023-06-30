<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $table = 'users';

    protected $data = ['email' => 'admin@mail.com', 'password'=> 'allowme'];

    public function run()
    {
        if(!isset($this->table)){
    		throw new Exception("No table Specified!", 1);
    		
    	}

    	if(!isset($this->data)){
    		throw new Exception("No data Specified!", 1);
    		
    	}

    	DB::table($this->table)->truncate();
    	$user = Sentinel::registerAndActivate($this->data);

   		$role = Sentinel::findRoleBySlug('admin');
   		$role->users()->attach($user);
    }
}
