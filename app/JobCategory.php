<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $table = "jobs_categorys";
	
	protected $fillable = ['job_id','category_id','principal'];
}
