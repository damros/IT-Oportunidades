<?php

namespace ITOportunidades\Http\Controllers;

use ITOportunidades\Category;
use ITOportunidades\Company;
use ITOportunidades\JobType;
use ITOportunidades\Job;
use ITOportunidades\Candidate;
use ITOportunidades\ApplicationStatus;
use ITOportunidades\Organization;
use ITOportunidades\CandidateApplication;
use ITOportunidades\AddressZone;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class FrontController extends Controller {

    /**
     * Display the web home Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $recentjobs = Job::recentJobs();
        $jobcount = Job::activeJobs()->count();
        $candidatecount = Candidate::all()->count();
        $companycount = Company::all()->count();
        $logos = Company::logos();

        return view('website.index', compact('jobcount', 'candidatecount', 'companycount', 'recentjobs', 'logos'));
    }

    public function myaccount() {

        if (Auth::check()) {
            return redirect()->to('/');
        }

        return view('website.my-account.index');
    }

    public function contact() {
        $organization = Organization::all()->first();
        return view('website.contact', compact('organization'));
    }

    public function resume() {

        if (!( can('candidate-resume') ) && Auth::check()) {
            return Redirect::to('/');
        }

        $categorys = Category::all()->sortBy("full_name");
        $addresszones = AddressZone::all();

        $pref_cats = array();
        $cats = array();

        if (Auth::check()) {
            $catu = currentUser()->candidate->categorys;
            foreach ($catu as $cat) {
                if ($cat->preferred) {
                    $pref_cats[] = $cat->category_id;
                } else {
                    $cats[] = $cat->category_id;
                }
            }
        }

        return view('website.candidates.resume.index', compact('categorys', 'cats', 'pref_cats','addresszones'));
    }

    public function addJob() {

        if (!( can('company-jobs-add') ) && Auth::check()) {
            return Redirect::to('/');
        }

        $job = new Job;
        $jobtypes = JobType::all();
        $addresszones = AddressZone::all();
        $categorys = Category::all()->sortBy("full_name");

        $cats = array();
        $princ_cat = null;

        return view('website.company.jobs.add', compact('job', 'jobtypes', 'categorys', 'cats', 'princ_cat','addresszones'));
    }

    public function manageJobs() {

        if (!can('company-jobs-manage')) {
            return Redirect::to('/');
        }

        $id = currentUser()->company->id;
        $jobs = Company::jobsByCompany($id);

        return view('website.company.jobs.manage.index', compact('jobs'));
    }

    public function editJob($id) {

        if (!can('company-jobs-edit')) {
            return Redirect::to('/');
        }

        if (!( $job = currentUser()->company->getJob($id) )) {
            return redirect()->back()->with('error', trans('messages.no_records_found'));
        }

        $jobtypes = JobType::all();
        $addresszones = AddressZone::all();
        $categorys = Category::all()->sortBy("full_name");

        $cats = array();
        $princ_cat = null;

        $catj = $job->categorys;
        foreach ($catj as $cat) {
            if ($cat->principal) {
                $princ_cat = $cat->category_id;
            } else {
                $cats[] = $cat->category_id;
            }
        }

        return view('website.company.jobs.edit', compact('job', 'jobtypes', 'categorys', 'cats', 'princ_cat','addresszones'));
    }

    public function browseJobs(Request $request) {

        $jobtypes = JobType::all();
        $addresszones = AddressZone::all();

        if ($request->has("sort")) {
            $seljobtypes = array($request->jobtype);
            $jobs = Job::searchJobs($request)->paginate(5)->appends($request->input());
        } else {
            $seljobtypes[0] = array('-0');
            $jobs = Job::activeJobs()->paginate(5);
        }

        return view('website.candidates.jobs.browse.index', compact('jobs', 'jobtypes', 'seljobtypes','addresszones'));
    }

    public function applicationManage($id, Request $request) {

        if (!can('company-applications')) {
            return Redirect::to('/');
        }

        if (!( $job = currentUser()->company->getJob($id) )) {
            return redirect()->back()->with('error', trans('messages.no_records_found'));
        }

        $status = $request->input('status');

        if ($request->has("status")) {
            $applications = $job->applications->where('application_status_id', intval($status));
        } else {
            $applications = $job->applications;
        }

        $applicationStatus = ApplicationStatus::lists('name', 'id');

        return view('website.company.applications.manage.index', compact('applications', 'applicationStatus', 'job'));
    }

    public function viewJob($id) {

        $job = Job::find($id);
        $application = null;
        
        if (Auth::check()) {
            $application = CandidateApplication::where('candidate_id', currentUser()->candidate->id)->where('job_id',$id)->first(); 
        }

        return view('website.candidates.jobs.detail.index', compact('job','application'));
    }

    public function editCompany() {

        if (!can('company-edit-profile')) {
            return Redirect::to('/');
        }

        if (!( $company = Company::find(( currentUser()->company ? currentUser()->company->id : 0)) )) {
            return response()->json(array("status" => "error", "message" => trans("messages.save_error")));
        }

        return view('website.company.profile.edit', compact('company'));
    }

    public function termsOfService() {

        return view('website.terms');
    }

    public function aboutUs() {

        return view('website.about-us');
    }

    public function searchJobs(Request $request) {

        $jobs = Job::searchJobs($request)->paginate(5);
        $view = view('website.candidates.jobs.browse.partials.jobs', compact('jobs'));

        if ($request->ajax()) {

            $view = $view->render();

            return response()->json(array("status" => "success",
                        "message" => trans("messages.save_success"),
                        "data" => $view)
            );
        }
    }

    public function candidatesByJob($id, Request $request) {

        if (!can('candidates-by-job')) {
            return Redirect::to('/');
        }

        if (!( $job = currentUser()->company->getJob($id) )) {
            return redirect()->back()->with('error', trans('messages.no_records_found'));
        }

        $candidates = Candidate::candidatesByJob($job);

        if (($f = $request->filter)) {
            $candidates = $candidates->where('job_accuracy', $f);
        }

        return view('website.company.jobs.manage.candidates.index', compact('candidates', 'job'));
    }

    public function candidateJobDetail($jobId, $candidateSlug) {

        if (!can('candidate-detail')) {
            return Redirect::to('/');
        }
        
        if (!( $job = currentUser()->company->getJob($jobId) )) {
            return redirect()->back()->with('error', trans('messages.no_records_found'));
        }        

        $candidate = Candidate::where('slug',$candidateSlug)->first();

        if (!( $candidate )) {
            return redirect()->back()->with('error', trans('messages.no_records_found'));
        }          
        
        $catj = $job->categorys;
        foreach ($catj as $cat) {
            $cats[] = $cat->category_id;
        }        

        return view('website.company.jobs.manage.candidates.detail', compact('candidate','cats'));
    }

    public function getChange() {

        return view('website.auth.change');
    }

}
