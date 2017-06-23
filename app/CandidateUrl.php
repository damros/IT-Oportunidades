<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class CandidateUrl extends Model
{
    protected $table = "candidates_urls";
	
	protected $fillable = ['candidate_id','name','url'];
}
