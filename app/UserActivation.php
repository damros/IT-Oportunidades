<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $table = 'users_activations';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'token'];
}
