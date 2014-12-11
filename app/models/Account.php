<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class Account extends Eloquent implements UserInterface, RemindableInterface
{
	protected $table = 'auth';
	public $timestamps = true;
	protected $hidden = array('password');

	public static $rules = 
				['username' => 'required',
				'password' => 'required',
				'role' => 'required'
				];
	
	public $fillable = 
				['username',
				'password',				
				'role',
				'id_anggota'
				];
				
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }


    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        
    }

    public function setRememberToken($value)
    {
       
    }


    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getReminderEmail()
    {
        return $this->username;
    }
	
	public function anggota()
    {
       return $this->belongsTo('Anggota', 'id_anggota');
    }
}

