<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use Carbon\Carbon;

Carbon::setLocale('es');

class Job extends Model
{
    protected $table = "jobs";

    protected $fillable = ['company_id','title','location','job_type_id','tags','description','salary','start_date','end_date','fill_date'];

    public function company()
        {
        return $this->belongsTo('ITOportunidades\Company');
    }
	
    public function categorys() {
        return $this->hasMany('ITOportunidades\JobCategory');
    }
	
    public function applications(){
        return $this->hasMany('ITOportunidades\CandidateApplication');
    }
   
    public function setStartDateAttribute($valor) 
	{
        if( ! empty( $valor ) ){
            $this->attributes['start_date'] = DateTime::createFromFormat('d/m/Y',$valor)->format('Y-m-d H:i:s');
        }
    }

	public function getStartDateAttribute($valor) 
	{
        if( ! empty( $valor ) ){
            return DateTime::createFromFormat('Y-m-d',$valor)->format('d/m/Y'); 
        }
    }	
    
	public function setEndDateAttribute($valor) 
	{
        if( ! empty( $valor ) ){
            $this->attributes['end_date'] = DateTime::createFromFormat('d/m/Y',$valor)->format('Y-m-d H:i:s');
		} else {
			$this->attributes['end_date'] = null; 
		}
    }

	public function getEndDateAttribute($valor) 
	{
        if( ! empty( $valor ) ){
            return DateTime::createFromFormat('Y-m-d',$valor)->format('d/m/Y'); 
        }
    }

	public function setFillDateAttribute($valor) 
	{
        if( ! empty( $valor ) ){
            $this->attributes['fill_date'] = DateTime::createFromFormat('d/m/Y',$valor)->format('Y-m-d H:i:s');
		} else {
			$this->attributes['fill_date'] = null; 
		}
    }

	public function getFillDateAttribute($valor) 
	{
        if( ! empty( $valor ) ){
            return DateTime::createFromFormat('Y-m-d',$valor)->format('d/m/Y'); 
        }
    }
	
	public function save_categories( $request ) {
		
		$id = $this->id;
		
		JobCategory::where('job_id', $id)->delete();
		
		$categorys = $request->category;

		for ($i = 0; $i < sizeof($categorys); ++$i) {
			
			$job_category = new JobCategory();

			$job_category->job_id = $id;
			$job_category->category_id = $categorys[$i];

			$job_category->save();
		}		
		
	}
	
	static function activeJobs() {
		
		$jobs = Job::whereNull('fill_date')
            ->where(function ($query) {
            $query->where('end_date', '>', Carbon::now())
                  ->orWhereNull('end_date');
            });
		
		return $jobs;
	}
	
	static function recentJobs() {
		
		$jobs = Job::whereNull('fill_date')
            ->where(function ($query) {
            $query->where('end_date', '>', Carbon::now())
                  ->orWhereNull('end_date');
            })
			->orderBy('created_at')
			->groupBy('company_id')
			->take(5)
			->get();
		
		return $jobs;
	}
	
	static function searchJobs( $request ) {
		
		$q = $request->q;
		
		$jobs = Job::whereNull('fill_date')
			->where('title','like','%'.$q.'%')
            ->where(function ($query) {
            $query->where('end_date', '>', Carbon::now())
                  ->orWhereNull('end_date');
            });
		
		return $jobs;
	}	
}
