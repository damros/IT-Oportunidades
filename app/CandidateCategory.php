<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class CandidateCategory extends Model
{
    protected $table = "candidates_categorys";
	
	protected $fillable = ['candidate_id','category_id'];
}
