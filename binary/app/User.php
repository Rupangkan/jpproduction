<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Cartalyst\Sentinel\Users\EloquentUser;
use Sentinel;
use DB;

class User extends EloquentUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'email',
            'username',
            'password',
            'permissions',
            'last_login',
            'full_name',
            'phone',
            'pan',
            'address',
            'account_no',
            'bank_name',
            'bank_phone',
            'nominee_name',
            'total_sponsored_l',
            'total_sponsored_r',
            'sponsoror_id',
            'referance_code',
            'side',
            'status',
            'join_date',
            'sl_no'
    ];

    protected $loginNames = [
        'username', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function byEmail($email){
        return static::whereEmail($email)->first();
    }
    public static function byUsername($username){
        return static::where('username', '=', $username)->first();
    }
    public static function byMemberCode($code){
        return static::where('username', '=', $code)->first();
    }

    public static function allUsers(){
        return static::orderBy('id')->get();
    }

    public static function getUser($id){
        return static::where('id', '=', $id)->first();
    }

    public static function getThisMonthCount($id){
        //dd($id);
        $count = DB::table('users')
                    ->whereRaw('YEAR(created_at)=?', date('Y'))
                    ->whereRaw('MONTH(created_at) = ?', date('m'))
                    ->where('sponsoror_id', '=', $id)
                    ->count();
        return $count;
    }
}
