<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;



class CandidateApplication extends Model
{
    
    protected $table = "candidates_applications";
    protected $fillable = ['candidate_id','message','job_id','application_status_id','rating','notes'];
    
    public function job(){
        return $this->belongsTo('ITOportunidades\Job');
    }
    
    public function candidate(){
        return $this->belongsTo('ITOportunidades\Candidate');
    }
    
	public function status(){
        return $this->belongsTo('ITOportunidades\ApplicationStatus','application_status_id');
    }
            

}
