<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;
use ITOportunidades\Job;
use Carbon\Carbon;

class Company extends Model
{
    protected $table = "companys";

    protected $fillable = ['name','identification','phone','website','tagline','logo','video','twitter','profile_detail','user_id','actived'];
	
	public function urls() {
        return $this->hasMany('ITOportunidades\Job');
    }
	
    public function setLogoAttribute( $logo ) {
		$name = $this->attributes["id"].Carbon::now()->timestamp.".".$logo->getClientOriginalExtension();
        $this->attributes["logo"] = $name;
		\Storage::disk('companylogo')->put($name, \File::get($logo));
    }	
	
	static function jobsByCompany( $id ) {
		
		$jobs = Job::where('company_id', $id)->get();
		
		return $jobs;
	}
	
	static function logos() {
		
		$logos = Company::whereNotNull('logo')->get();
		
		return $logos;
	}
}
