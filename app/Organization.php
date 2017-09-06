<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;


class Organization extends Model
{
    protected $table = "organization";
    protected $fillable = ['address','location','province','phone','email'];
    
    
}
