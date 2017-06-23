<?php

namespace ITOportunidades;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	
	use SoftDeletes;
	
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'username', 'profile_id', 'activated'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	protected $dates = ['deleted_at'];
	
	public function setPasswordAttribute($valor) 
	{
        if( ! empty( $valor ) ){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }
	
	public function profile()
    {
        return $this->belongsTo('ITOportunidades\Profile');
    }
	
	public function candidate()
    {
        return $this->hasOne('ITOportunidades\Candidate');
    }

	public function company()
    {
        return $this->hasOne('ITOportunidades\Company');
    }
	
}
