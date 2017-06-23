<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;
use ITOportunidades\CandidateUrl;
use ITOportunidades\CandidateEducation;
use ITOportunidades\CandidateExperience;
use Carbon\Carbon;

class Candidate extends Model
{
    protected $table = "candidates";

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
    
    public function setPhotoAttribute( $photo ) {
		$name = Carbon::now()->timestamp.$photo->getClientOriginalName();
		$this->attributes["photo"] = $name;
		\Storage::disk('candidatephoto')->put($name, \File::get($photo));
    }

    public function setResumeFileAttribute( $resume ) {
		$name = Carbon::now()->timestamp.$resume->getClientOriginalName();
		$this->attributes["resume_file"] = $name;            
		\Storage::disk('candidateresume')->put($name, \File::get($resume));
    }

    public function save_resume( $request ) {

		$this->fill($request->all());

		if ( $this->save() ) {		
				$this->save_categorys($request);
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
		$education_dates = $request->education_dates;
		$education_notes = $request->education_notes;
		$education_reg = $request->education_reg;

		for ($i = 0; $i < sizeof($education_name); ++$i) {

				if ( $education_reg[$i] == 1) {
						$candidate_education = new CandidateEducation();

						$candidate_education->candidate_id = $id;
						$candidate_education->school_name = $education_name[$i];
						$candidate_education->qualifications = $education_qualification[$i];
						$candidate_education->edates = $education_dates[$i];
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
		$experience_dates = $request->experience_dates;
		$experience_notes = $request->experience_notes;
		$experience_reg = $request->experience_reg;

		for ($i = 0; $i < sizeof($experience_employeer); ++$i) {

				if ( $experience_reg[$i] == 1 ) {
						$candidate_experience = new CandidateExperience();

						$candidate_experience->candidate_id = $id;
						$candidate_experience->employeer = $experience_employeer[$i];
						$candidate_experience->job_title = $experience_title[$i];
						$candidate_experience->edates = $experience_dates[$i];
						$candidate_experience->notes = $experience_notes[$i];

						$candidate_experience->save();
				}
		}		
    }

    public function save_categorys( $request ) {

		$id = $this->id;

		CandidateCategory::where('candidate_id', $id)->delete();

		$categorys = $request->category;

		for ($i = 0; $i < sizeof($categorys); ++$i) {

				$candidate_category = new CandidateCategory();

				$candidate_category->candidate_id = $id;
				$candidate_category->category_id = $categorys[$i];

				$candidate_category->save();
		}		
    }

}
