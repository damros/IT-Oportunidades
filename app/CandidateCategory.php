<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class CandidateCategory extends Model
{
    protected $table = "candidates_categorys";
	
	protected $fillable = ['candidate_id','category_id','preferred'];
	
    public function candidate() {
        return $this->belongsTo('ITOportunidades\Candidate');
    }	
    
	public function category() {
        return $this->belongsTo('ITOportunidades\Category');
    }
}
