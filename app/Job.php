<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use Carbon\Carbon;

Carbon::setLocale('es');

class Job extends Model {

    protected $table = "jobs";
    protected $fillable = ['company_id', 'title', 'location', 'job_type_id', 'tags', 'description', 'salary', 'start_date', 'end_date', 'fill_date','address_zone_id'];

    public function company() {
        return $this->belongsTo('ITOportunidades\Company');
    }

    public function type() {
        return $this->belongsTo('ITOportunidades\JobType', 'job_type_id');
    }

    public function categorys() {
        return $this->hasMany('ITOportunidades\JobCategory');
    }

    public function applications() {
        return $this->hasMany('ITOportunidades\CandidateApplication');
    }
    
    public function zone() {
        return $this->belongsTo('ITOportunidades\AddressZone','address_zone_id');
    }

    public function setStartDateAttribute($valor) {
        if (!empty($valor)) {
            $this->attributes['start_date'] = DateTime::createFromFormat('d/m/Y', $valor)->format('Y-m-d H:i:s');
        }
    }

    public function getStartDateAttribute($valor) {
        if (!empty($valor)) {
            return DateTime::createFromFormat('Y-m-d', $valor)->format('d/m/Y');
        }
    }

    public function setEndDateAttribute($valor) {
        if (!empty($valor)) {
            $this->attributes['end_date'] = DateTime::createFromFormat('d/m/Y', $valor)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['end_date'] = null;
        }
    }

    public function getEndDateAttribute($valor) {
        if (!empty($valor)) {
            return DateTime::createFromFormat('Y-m-d', $valor)->format('d/m/Y');
        }
    }

    public function setFillDateAttribute($valor) {
        if (!empty($valor)) {
            $this->attributes['fill_date'] = DateTime::createFromFormat('d/m/Y', $valor)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['fill_date'] = null;
        }
    }

    public function getFillDateAttribute($valor) {
        if (!empty($valor)) {
            return DateTime::createFromFormat('Y-m-d', $valor)->format('d/m/Y');
        }
    }

    public function save_categories($request) {

        $id = $this->id;

        JobCategory::where('job_id', $id)->where('principal', false)->delete();

        $categorys = $request->category;

        for ($i = 0; $i < sizeof($categorys); ++$i) {

            $job_category = new JobCategory();

            $job_category->job_id = $id;
            $job_category->category_id = $categorys[$i];
            $job_category->principal = false;

            $job_category->save();
        }
    }

    public function save_principal_category($request) {

        $id = $this->id;

        JobCategory::where('job_id', $id)->where('principal', true)->delete();

        $job_category = new JobCategory();

        $job_category->job_id = $id;
        $job_category->category_id = $request->principal_category;
        $job_category->principal = true;

        $job_category->save();
    }

    static function activeJobs() {

        $jobs = Job::whereNull('fill_date')
                ->where(function ($query) {
                    $query->where('end_date', '>', Carbon::now())
                    ->orWhereNull('end_date');
                })
                ->orderBy('created_at', 'desc');

        return $jobs;
    }

    static function recentJobs() {

        $jobs = Job::whereNull('fill_date')
                ->where(function ($query) {
                    $query->where('end_date', '>', Carbon::now())
                    ->orWhereNull('end_date');
                })
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

        return $jobs;
    }

    static function searchJobs($request) {

        $q = $request->q;
        $loc = $request->loc;
        $addresszone = $request->addresszone;
        $jobtype = array($request->jobtype);

        switch ($request->sort) {
            case "new":
                $sortB = "jobs.created_at";
                $sortD = "desc";
                break;
            case "old":
                $sortB = "jobs.created_at";
                $sortD = "asc";
                break;
            case "exp_asc":
                $sortB = "jobs.end_date";
                $sortD = "asc";
                break;
            case "exp_dsc":
                $sortB = "jobs.end_date";
                $sortD = "asc";
            default:
                $sortB = "jobs.created_at";
                $sortD = "desc";
                break;
        }


        $jobs = Job::join('companys', 'companys.id', '=', 'company_id')
                ->whereNull('fill_date')
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', '%' . $q . '%')
                    ->orWhere('tags', 'like', '%' . $q . '%')
                    ->orWhere('companys.name', 'like', '%' . $q . '%');
                })
                ->where(function ($query) {
                    $query->where('end_date', '>', Carbon::now())
                    ->orWhereNull('end_date');
                })
                ->where(function ($query) use ($addresszone) {
                    if ($addresszone) {
                        $query->where('jobs.address_zone_id', $addresszone);
                    }
                })
                ->where('jobs.location', 'like', '%' . $loc . '%')
                ->select('jobs.*')
                ->orderBy($sortB, $sortD);

        if ($jobtype[0][0] != '-0') {
            $jobs->whereIn('jobs.job_type_id', $jobtype[0]);
        }

        return $jobs;
    }

    public function getCandidateAccuracy($c) {

        $ac = 'med';
        $pcc = $this->categorys()->count();

        $jcc = JobCategory::join('candidates_categorys', 'candidates_categorys.category_id', '=', 'jobs_categorys.category_id')
                ->where('jobs_categorys.job_id', $this->id)
                ->where('candidates_categorys.candidate_id', $c->id)
                ->select('candidates_categorys.*')
                ->get()
                ->count();

        $acp = $jcc / $pcc;

        switch ($pcc) {
            case ($pcc <= 3):
                if ($acp > 0.6) {
                    $ac = 'hig';
                }
                break;
            case ($pcc >= 4 && $pcc <= 7):
                if ($acp > 0.5) {
                    $ac = 'hig';
                }
                break;
            case ($pcc >= 8):
                if ($acp > 0.4) {
                    $ac = 'hig';
                }
                break;
            default:
                break;
        }

        return $ac;
    }

}
