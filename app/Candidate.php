<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;
use ITOportunidades\CandidateUrl;
use ITOportunidades\CandidateEducation;
use ITOportunidades\CandidateExperience;
use ITOportunidades\CandidateCategory;
use ITOportunidades\JobCategory;
use Carbon\Carbon;

class Candidate extends Model
{
    protected $table = "candidates";
	
    protected $appends = ['photo_candidate','job_accuracy'];
	
    protected $fillable = ['name','identification','phone','address','photo','video','profesional_title','resume_content','resume_file','description','user_id'];
    
    
	/**
    * Get the user that owns the phone.
    */
    public function user() {
        return $this->belongsTo('ITOportunidades\User');
    }
	
    public function urls() {
        return $this->hasMany('ITOportunidades\CandidateUrl');
    }

    public function educations() {
        return $this->hasMany('ITOportunidades\CandidateEducation');
    }
	
    public function experiences() {
        return $this->hasMany('ITOportunidades\CandidateExperience');
    }

    public function categorys() {
        return $this->hasMany('ITOportunidades\CandidateCategory');
    }
    
    public function applications(){
        return $this->hasMany('ITOportunidades\CandidateApplication');
    }
    
    /*public function application(){
        return $this->belongsTo('ITOportunidades\CandidateApplication');
    }*/
    
    public function getPhotoCandidateAttribute(){
        return '/images/candidatephoto/'.($this->photo ? $this->photo : 'avatar-placeholder.png');
        //return \Storage::disk('candidatephoto')->getDriver()->getAdapter()->getPathPrefix(); //\Storage::disk('candidatephoto')->url('AvatarCandidato.jpg');
    }
            
    
    public function setPhotoAttribute( $photo ) {
		$name = $this->attributes["id"].Carbon::now()->timestamp.".".$photo->getClientOriginalExtension();
		$this->attributes["photo"] = $name;
		\Storage::disk('candidatephoto')->put($name, \File::get($photo));
    }

    public function setResumeFileAttribute( $resume ) {
		$name = $this->attributes["id"].Carbon::now()->timestamp.".".$resume->getClientOriginalExtension();
		$this->attributes["resume_file"] = $name;            
		\Storage::disk('candidateresume')->put($name, \File::get($resume));
    }

    public function save_resume( $request ) {

		$this->fill($request->all());

		if ( $this->save() ) {		
				$this->save_categorys($request);
				$this->save_preferred_categorys($request);
				$this->save_urls($request);
				$this->save_education($request);
				$this->save_experience($request);

				return true;

		} else {
				return false;
		}
    }

    public function save_urls( $request ) {

		$id = $this->id;

		CandidateUrl::where('candidate_id', $id)->delete();

		$url_name = $request->url_name;
		$url_path = $request->url_path;
		$url_reg = $request->url_reg;

		for ($i = 0; $i < sizeof($url_name); ++$i) {

				if ( $url_reg[$i] == 1 ) {
						$candidate_url = new CandidateUrl;

						$candidate_url->candidate_id = $id;
						$candidate_url->name = $url_name[$i];
						$candidate_url->url = $url_path[$i];

						$candidate_url->save();
				}
		}
    }

    public function save_education( $request ) {

		$id = $this->id;

		CandidateEducation::where('candidate_id', $id)->delete();

		$education_name = $request->education_name;
		$education_qualification = $request->education_qualification;
		$education_date_from = $request->education_date_from;
		$education_date_to = $request->education_date_to;
		$education_notes = $request->education_notes;
		$education_reg = $request->education_reg;

		for ($i = 0; $i < sizeof($education_name); ++$i) {

				if ( $education_reg[$i] == 1) {
						$candidate_education = new CandidateEducation();

						$candidate_education->candidate_id = $id;
						$candidate_education->school_name = $education_name[$i];
						$candidate_education->qualifications = $education_qualification[$i];
						$candidate_education->date_from = $education_date_from[$i];
						$candidate_education->date_to = $education_date_to[$i];
						$candidate_education->notes = $education_notes[$i];

						$candidate_education->save();
				}
		}		
    }

    public function save_experience( $request ) {

		$id = $this->id;

		CandidateExperience::where('candidate_id', $id)->delete();

		$experience_employeer = $request->experience_employeer;
		$experience_title = $request->experience_title;
		$experience_date_from = $request->experience_date_from;
		$experience_date_to = $request->experience_date_to;
		$experience_notes = $request->experience_notes;
		$experience_reg = $request->experience_reg;

		for ($i = 0; $i < sizeof($experience_employeer); ++$i) {

				if ( $experience_reg[$i] == 1 ) {
						$candidate_experience = new CandidateExperience();

						$candidate_experience->candidate_id = $id;
						$candidate_experience->employeer = $experience_employeer[$i];
						$candidate_experience->job_title = $experience_title[$i];
						$candidate_experience->date_from = $experience_date_from[$i];
						$candidate_experience->date_to = $experience_date_to[$i];
						$candidate_experience->notes = $experience_notes[$i];

						$candidate_experience->save();
				}
		}		
    }

    public function save_categorys( $request ) {

		$id = $this->id;

		CandidateCategory::where('candidate_id', $id)->where('preferred',0)->delete();

		$categorys = $request->category;

		for ($i = 0; $i < sizeof($categorys); ++$i) {

				$candidate_category = new CandidateCategory();

				$candidate_category->candidate_id = $id;
				$candidate_category->category_id = $categorys[$i];

				$candidate_category->save();
		}		
    }

	public function save_preferred_categorys( $request ) {

		$id = $this->id;

		CandidateCategory::where('candidate_id', $id)->where('preferred',true)->delete();

		$categorys = $request->preferred_category;

		for ($i = 0; $i < sizeof($categorys); ++$i) {

				$candidate_category = new CandidateCategory();

				$candidate_category->candidate_id = $id;
				$candidate_category->category_id = $categorys[$i];
				$candidate_category->preferred = true;

				$candidate_category->save();
		}		
    }
	
	static function candidatesByJob( $job ) {
		
		$jobc = JobCategory::where('job_id',$job->id)
							->where('principal',true)
							->firstOrFail();
		
		$candidates = CandidateCategory::where('category_id',$jobc->category_id)
							->where('preferred',true)
							->distinct()
							->pluck('candidate_id');
		
		$ca = Candidate::whereIn('id',$candidates)
						->get();
		
		foreach ($ca as $c) {		
			$ac = $job->getCandidateAccuracy($c);
			$c->job_accuracy = $ac;
		}
		
		return $ca;
		
	}

}
