<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = 'roles';

    public function getData(){
    	return [
    		['slug' => 'admin', 'name' => 'Admin'],
    		['slug' => 'user', 'name' => 'User']
    	];
    }

    public function run()
    {
        if(!isset($this->table)){
    		throw new Exception("No table Specified!", 1);
    		
    	}

    	if(method_exists(get_class(), 'getData()')){
    		throw new Exception("No data Specified!", 1);
    		
    	}

    	DB::table($this->table)->truncate();
    	DB::table($this->table)->insert($this->getData());
    }
}
