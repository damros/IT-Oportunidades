<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = "job_types";

    protected $fillable = ['name'];
}
