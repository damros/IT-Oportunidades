<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class AddressZone extends Model
{
    protected $table = "address_zone";
	
    protected $fillable = ['code','name'];
}
