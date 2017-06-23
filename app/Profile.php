<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profiles";

    protected $fillable = ['code','name'];
	
	public function permissions() {
		
		return $this->belongsToMany('ITOportunidades\Permission', 'profiles_permissions', 'profile_id', 'permission_id');
		
	}
	
    public function users()
    {
        return $this->hasMany('ITOportunidades\User');
    }	
}
