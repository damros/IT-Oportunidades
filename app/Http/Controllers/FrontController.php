<?php

namespace ITOportunidades\Http\Controllers;

use ITOportunidades\Category;
use ITOportunidades\Company;
use ITOportunidades\JobType;
use ITOportunidades\Job;
use ITOportunidades\Candidate;
use ITOportunidades\ApplicationStatus;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
	/**
	 * Display the web home Page.
	 *
	 * @return \Illuminate\Http\Response
	 */
   public function index(){
	   
	   $recentjobs = Job::recentJobs();
	   $jobcount = Job::activeJobs()->count();
	   $candidatecount = Candidate::all()->count();
	   $companycount = Company::all()->count();
	   $logos = Company::logos();
	   
       return view('website.index',compact('jobcount','candidatecount','companycount','recentjobs','logos'));
   }
   
   public function myaccount(){
	   
		if ( Auth::check() ) {
			return redirect()->to('/');
		};
    
        return view('website.my-account.index');
   }
   
   public function contact(){
        return view('website.contact');
   }

   public function resume(){
	   
		$categorys = Category::with('group')->get();
	
		$cats = array();
		
		if (Auth::check()) {
			$catu = currentUser()->candidate->categorys;		
			foreach ($catu as $cat) {
				$cats[] = $cat->category_id;
			}
		}
	
		return view('website.candidates.resume.index',compact('categorys','cats')); 
		
   }
   
   public function addJob() {
	   
	   $job = new Job;
	   $jobtypes = JobType::all();
	   $categorys = Category::with('group')->get();
	   $cats = array();
	   
	   return view('website.company.jobs.add',compact('job','jobtypes','categorys','cats'));
   }
   
   public function manageJobs() {
	   
		$id = currentUser()->company->id;
		$jobs = Company::jobsByCompany($id);
		
		return view('website.company.jobs.manage',compact('jobs')); 	   
	   
   }
   
   public function editJob( $id ) {
	   
	   $job = Job::find($id);
	   $jobtypes = JobType::all();
	   $categorys = Category::with('group')->get();
	   
		$cats = array();
		
		$catj = $job->categorys;		
		foreach ($catj as $cat) {
			$cats[] = $cat->category_id;
		}
  
	   
	   return view('website.company.jobs.edit',compact('job','jobtypes','categorys','cats')); 	
	   
   }
   
   public function browseJobs(Request $request) {
	   
	   if ( $request->has("q") ) {
		   $jobs = Job::searchJobs( $request )->paginate(5)->appends($request->input());
	   } else {
		   $jobs = Job::activeJobs()->paginate(5);
	   } 
	   
	   return view('website.candidates.jobs.browse.index',compact('jobs'));
	   
   }
   
   public function applicationManage( $id, Request $request ){
       
		$job = Job::find($id);
		$status = $request->input('status');

		if ( $request->has("status") ) {
			$applications = $job->applications->where('application_status_id',intval($status));
		} else {
			$applications = $job->applications;
		}		   
		$applicationStatus = ApplicationStatus::lists('name','id');
		
		return view('website.company.applications.manage.index',compact('applications','applicationStatus','job'));
           
   }

   public function viewJob( $id ) {
	   
	   $job = Job::find($id);
	   
	   return view('website.candidates.jobs.detail.index',compact('job'));
	   
   }

   public function editCompany() {
	   
	   if ( ! ( $company = Company::find( ( currentUser()->company ? currentUser()->company->id : 0 ) ) ) ) {
				return response()->json(array(	"status" =>	"error",
												"message"=> trans("messages.save_error") ) );			
			}
	   
	   return view('website.company.profile.edit',compact('company'));
	   
   }
   
   public function termsOfService() {
	   
	   return view('website.terms');
	   
   }
   
   public function aboutUs() {
	   
	   return view('website.about-us');
	   
   }

   public function searchJobs(Request $request) {
	   
		$jobs = Job::searchJobs( $request )->paginate(5);
		$view = view('website.candidates.jobs.browse.partials.jobs',compact('jobs'));
	   
		if( $request->ajax() ) {
			
			$view = $view->render();
					
			return response()->json(array(	"status" =>	"success",
											"message"=> trans("messages.save_success"),
											"data"=>$view) 
									);			
		}	   
	   
   }

}
