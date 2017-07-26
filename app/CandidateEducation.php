<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
    protected $table = "candidates_educations";
	
	protected $fillable = ['candidate_id','school_name','qualifications','date_from','date_to','notes'];
}
