<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "permissions";

    protected $fillable = ['name','description'];
}
