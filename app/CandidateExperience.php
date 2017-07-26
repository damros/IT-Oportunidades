<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
    protected $table = "candidates_experiences";
	
	protected $fillable = ['candidate_id','job_title','date_from','date_to','notes'];
}
