<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use PDF;
use Excel;
use App\Exports\EmployeesExport;
use Image;

class AdminController extends Controller
{
    public function admindashboard(){
		$task = DB::connection('mysql')->table('elsemployees')
		->join('role','role.roleid', '=','elsemployees.elsemployees_roleid')
		->where('elsemployees.elsemployees_batchid','=',session()->get("batchid"))
		->select('elsemployees.*','role.*')
		->first(); 
		
		$employeetotal = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=', 2 ) 
		->select('elsemployees.*')
		->count();

		$desigcount = DB::connection('mysql')->table('designation')
		->select('designation.*')
		->count();

		$departmentcount = DB::connection('mysql')->table('department')
		->select('department.*')
		->count();
		$adate = strtotime("+7 day");
		$afterdate =  date('Y-m-d', $adate);
		$todaydate =  date('Y-m-d');
		$year = date('Y');
		$explodedate = explode('-', $afterdate);
		$getdob = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=',2)
		->select('elsemployees.elsemployees_dofbirth','elsemployees_empid')
		->get(); 
		$birthday = array();
		foreach ($getdob as $getdobs) {
			$dob = $getdobs->elsemployees_dofbirth;
			$explodedob = explode('-', $dob);
			$fdate = $explodedob[0].'-'.$explodedate[1].'-'.$explodedate[2];
			$tdate = $explodedob[0].'-'.date('m-d');
			$birthday[] = DB::connection('mysql')->table('elsemployees')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->where('elsemployees.elsemployees_dofbirth','<=',$fdate)
			->where('elsemployees.elsemployees_dofbirth','>=',$tdate)
			->where('elsemployees.elsemployees_empid','=',$getdobs->elsemployees_empid)
			->select('elsemployees.*','hrm_department.dept_name')
			->first(); 
		}
		$ajdate = strtotime("+7 day");
		$jafterdate =  date('Y-m-d', $ajdate);
		$jtodaydate =  date('Y-m-d');
		$jyear = date('Y');
		$explodejdate = explode('-', $jafterdate);
		$getdoj = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=',2)
		->select('elsemployees.elsemployees_dofjoining','elsemployees_empid')
		->get(); 
		$jday = array();
		foreach ($getdoj as $getdojs) {
			$doj = $getdojs->elsemployees_dofjoining;
			$explodedoj = explode('-', $doj);
			$fjdate = $explodedoj[0].'-'.$explodejdate[1].'-'.$explodejdate[2];
			$tjdate = $explodedoj[0].'-'.date('m-d');
			$jday[] = DB::connection('mysql')->table('elsemployees')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->where('elsemployees.elsemployees_dofjoining','<=',$fjdate)
			->where('elsemployees.elsemployees_dofjoining','>=',$tjdate)
			->where('elsemployees.elsemployees_empid','=',$getdojs->elsemployees_empid)
			->select('elsemployees.*','hrm_department.dept_name')
			->first(); 
		}
		$getpayrolldoj = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=',2)
		->select('elsemployees.elsemployees_dofjoining','elsemployees_empid')
		->get(); 
		$pday = array();
		foreach ($getpayrolldoj as $getpayrolldojs) {
			$dopayroll = $getpayrolldojs->elsemployees_dofjoining;
			$explodepayroll = explode('-', $dopayroll);
			$addfivedays = date('Y-m-d',strtotime('-5 day'));
			$addtendays = date('Y-m-d',strtotime('-2 day'));
			$pday[] = DB::connection('mysql')->table('elsemployees')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->where('elsemployees.elsemployees_dofjoining','>',$addfivedays) 
			->where('elsemployees.elsemployees_dofjoining','<',$addtendays)  
			->where('elsemployees.elsemployees_empid','=',$getpayrolldojs->elsemployees_empid)
			->select('elsemployees.*','hrm_department.dept_name')
			->first(); 
		}
		$filtermonth = date('Y-m');
		$all=[
			'emptota'=>$employeetotal,
			'countdpt'=>$departmentcount,
			'desgc'=>$desigcount,
			'empdata'=>$task,
			'bddata'=>$birthday,
			'jdata'=>$jday,
			'pdata'=>$pday,
			'filtermonth'=>$filtermonth,
		];
		return view('admin.admindashboard', ['data' => $all]);
	}
	public function filteradminDashboard($filter){
		$task = DB::connection('mysql')->table('elsemployees')
		->join('role','role.roleid', '=','elsemployees.elsemployees_roleid')
		->where('elsemployees.elsemployees_batchid','=',session()->get("batchid"))
		->select('elsemployees.*','role.*')
		->first(); 
		
		$employeetotal = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=', 2 ) 
		->select('elsemployees.*')
		->count();

		$desigcount = DB::connection('mysql')->table('designation')
		->select('designation.*')
		->count();

		$departmentcount = DB::connection('mysql')->table('department')
		->select('department.*')
		->count();
		$adate = strtotime("+7 day");
		$afterdate =  date('Y-m-d', $adate);
		$todaydate =  date('Y-m-d');
		$year = date('Y');
		$explodedate = explode('-', $afterdate);
		$getdob = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=',2)
		->select('elsemployees.elsemployees_dofbirth','elsemployees_empid')
		->get(); 
		$birthday = array();
		foreach ($getdob as $getdobs) {
			$dob = $getdobs->elsemployees_dofbirth;
			$explodedob = explode('-', $dob);
			$fdate = $explodedob[0].'-'.$explodedate[1].'-'.$explodedate[2];
			$tdate = $explodedob[0].'-'.date('m-d');
			$birthday[] = DB::connection('mysql')->table('elsemployees')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->where('elsemployees.elsemployees_dofbirth','<=',$fdate)
			->where('elsemployees.elsemployees_dofbirth','>=',$tdate)
			->where('elsemployees.elsemployees_empid','=',$getdobs->elsemployees_empid)
			->select('elsemployees.*','hrm_department.dept_name')
			->first(); 
		}
		$ajdate = strtotime("+7 day");
		$jafterdate =  date('Y-m-d', $ajdate);
		$jtodaydate =  date('Y-m-d');
		$jyear = date('Y');
		$explodejdate = explode('-', $jafterdate);
		$getdoj = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=',2)
		->select('elsemployees.elsemployees_dofjoining','elsemployees_empid')
		->get(); 
		$jday = array();
		foreach ($getdoj as $getdojs) {
			$doj = $getdojs->elsemployees_dofjoining;
			$explodedoj = explode('-', $doj);
			$fjdate = $explodedoj[0].'-'.$explodejdate[1].'-'.$explodejdate[2];
			$tjdate = $explodedoj[0].'-'.date('m-d');
			$jday[] = DB::connection('mysql')->table('elsemployees')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->where('elsemployees.elsemployees_dofjoining','<=',$fjdate)
			->where('elsemployees.elsemployees_dofjoining','>=',$tjdate)
			->where('elsemployees.elsemployees_empid','=',$getdojs->elsemployees_empid)
			->select('elsemployees.*','hrm_department.dept_name')
			->first(); 
		}
		$getpayrolldoj = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=',2)
		->select('elsemployees.elsemployees_dofjoining','elsemployees_empid')
		->get(); 
		$pday = array();
		foreach ($getpayrolldoj as $getpayrolldojs) {
			$dopayroll = $getpayrolldojs->elsemployees_dofjoining;
			$explodepayroll = explode('-', $dopayroll);
			$addfivedays = date('Y-m-d',strtotime('-5 day'));
			$addtendays = date('Y-m-d',strtotime('-2 day'));
			$pday[] = DB::connection('mysql')->table('elsemployees')
			->join('hrm_department','hrm_department.dept_id', '=','elsemployees.elsemployees_departid')
			->where('elsemployees.elsemployees_dofjoining','>',$addfivedays) 
			->where('elsemployees.elsemployees_dofjoining','<',$addtendays)  
			->where('elsemployees.elsemployees_empid','=',$getpayrolldojs->elsemployees_empid)
			->select('elsemployees.*','hrm_department.dept_name')
			->first(); 
		}
		$filtermonth = $filter;
		$all=[
			'emptota'=>$employeetotal,
			'countdpt'=>$departmentcount,
			'desgc'=>$desigcount,
			'empdata'=>$task,
			'bddata'=>$birthday,
			'jdata'=>$jday,
			'pdata'=>$pday,
			'filtermonth'=>$filter,
		];
		return view('admin.admindashboard', ['data' => $all]);
	}
	public function yajratable() {
	
			

				// ->join('leave_request','leave_request.LREQ_EMP_ID', '=', 'employee.EMP_ID' )
				//     ->where('employee.EMP_BADGE_ID','=',$batchId)
				//     ->where('leave_request.LREQ_STATUS_ID','=',4)
				//     ->select('leave_request.LREQ_START','leave_request.LREQ_END')
				//     ->get();

				// dd($task);
                
				
				$query =  collect($candidatelist);
				
				return DataTables::of($query)->addColumn('resume', function ($query) {
					return view('admin.employeebutton', ['id' => $query]);
				})->addColumn('action', function ($query) {
					return view('admin.dropdown', ['datas' => $query]);
				})->addColumn('view', function ($query) {
					return view('admin.modal.candidateviewmodal', ['datas' => $query]);
				})
				->make(true);

	}
	
	public function alllist(){
		
		$candidatelist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();
		
		// dd($all);
		
		// $allData = array("task" => $task);
	
		return view('admin.allrequest' , ['data' => $candidatelist]);
		
	}
	
	public function candidatelist(){
		
		$candidatelist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','candidatelist')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();

		$Screeninglist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','Screening')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();

		$Irreleventlist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','Irrelevent')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();
		
		$Irexperiencelist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','inexperience')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();

		$all=[
			'Candidatelist'=>$candidatelist,
			'Screeninglist'=>$Screeninglist,
			'Irreleventlist'=>$Irreleventlist,
			'Irexperiencelist'=>$Irexperiencelist,
		];
		// dd($all);
		
		// $allData = array("task" => $task);
	
		return view('admin.candidatelist' , ['data' => $all]);
		
	}


	public function downloadExcel(){
        
		if (session()->get("email")) {

		$type= "xls";
		
		return Excel::download(new EmployeesExport, 'Candidatereport.xlsx');
  
		} else {
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
    }

	public function candidate_list(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('admin.candidate_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function candidate_listdata(){
		
		$task = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','candidatelist')
		->select('jobapplicant.*')
		->orderBy('jobapplicant_id', 'DESC')
		->paginate(10);


		// dd($task);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.can_dynamictable',['data'=>$task]);
		
	}
	
	public function searchcandidate_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','candidatelist')
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','candidatelist')
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','candidatelist')
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

			// dd();

				return view('dynamicemployeedata.can_dynamicsearch',['data'=>$task]);
				
	}

	public function getimageview($id){

		$update  = DB::connection('mysql')->table('jobapplicant')
				->where('jobapplicant_id','=',$id)
				->update([
			   'jobapplicant_imageview' => 'check.png',
				]);

				return redirect('/candidate_list');
	}



	public function screening_list(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('admin.screening_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function screening_listdata(){
		
		$task = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		// ->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','Screening')
		->select('jobapplicant.*')
		->paginate(20);

		// dd($task);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.candynamictable',['data'=>$task]);
		
	}
	
	public function searchscreening_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Screening')
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Screening')
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Screening')
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

				return view('dynamicemployeedata.candynamicsearch',['data'=>$task]);
				
	}

	public function irexperience_list(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('admin.irexperience_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function irexperience_listdata(){
		
		$task = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','inexperience')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->paginate(10);
		// dd($all);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.candynamictable',['data'=>$task]);
		
	}
	
	public function searchirexperience_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','inexperience')
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','inexperience')
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','inexperience')
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

				return view('dynamicemployeedata.candynamicsearch',['data'=>$task]);
				
	}

	public function irrelevent_list(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('admin.irrelevent_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function irrelevent_listdata(){
		
		$task = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','Irrelevent')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->paginate(10);
		// dd($all);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.candynamictable',['data'=>$task]);
		
	}
	
	public function searchirrelevent_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Irrelevent')
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Irrelevent')
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Irrelevent')
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

				return view('dynamicemployeedata.candynamicsearch',['data'=>$task]);
				
	}
	
	public function modalemployeeview($id){

			$employeemodal = DB::connection('mysql')->table('jobapplicant')
			// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			// ->join('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
			->where('jobapplicant.jobapplicant_id', '=', $id)
			->first();
			
			$department = DB::connection('mysql')->table('hrm_Department')
						->select('hrm_Department.*')
						->get();
			
			$all=[
					'department'=>$department,
					'userdata'=>$employeemodal,
				];
				
			// dd($employeemodal);
			
			return view('admin.modal.viewemployee',['data'=>$all]);     
				
	}

	public function submitcanmodel(Request $request){
			
			// dd($request);
			
			$update  = DB::connection('mysql')->table('jobapplicant')
				->where('jobapplicant_id','=',$request->can_id)
				->update([
			   'updated_at' => date('Y-m-d H:i:s'),
			   'jobapplicant_department' => $request->deptname,
			   'jobapplicant_postionapppliedform' => $request->can_postionapppliedform,
			   'jobapplicant_status' => $request->actionname,
				]);
				
				$task =  DB::connection('mysql')->table('jobapplicant')
				->where('jobapplicant.jobapplicant_id','=',$request->can_id)
				->select('jobapplicant.*')
				->first();
				
				
			if($request->actionname == "Screening"){
					
					// dd($task->jobapplicant_department);
					
					if( $task->jobapplicant_department == 1 ){
						
						// $manageremail = DB::table('elsemployees')
						// ->where('elsemployees.elsemployees_departid','=',$task->jobapplicant_department)
						// ->where('elsemployees.elsemployees_subdepartid','=',$task->jobapplicant_sub_department)
						// ->where('elsemployees.elsemployees_roleid','=', "3" )
						// ->select('elsemployees.*')
						// ->first();
						
						$manageremail = (object) array('elsemployees_name' => 'Finance Manager');
						
						// $managername = $manageremail->elsemployees_email;
						
						$all=[
								'managerdetail'=>$manageremail,
								'candidate'=>$task,
								];
						
						Mail::send('emails.managerfirstmail',[
							'datas' =>$all,
							],
						function ($message){
						 $message->to('salman.khairi@bizzworld.com');
						 $message->bcc('muhammad.mehroz@bizzworld.com');
						 $message->cc('hr@bizzworld.com');
						 $message->subject('Candidate Arrival For Interview');
						});
						
					}else{
					
						$manageremail = DB::connection('mysql')->table('elsemployees')
						->where('elsemployees.elsemployees_departid','=',$task->jobapplicant_department)
						->where('elsemployees.elsemployees_roleid','=', "3" )
						->select('elsemployees.*')
						->first();
						
						// dd($manageremail);
						
						$managername = $manageremail->elsemployees_email;
						
						
						$all=[
								'managerdetail'=>$manageremail,
								'candidate'=>$task,
								];
						
						Mail::send('emails.managerfirstmail',[
							'datas' =>$all,
							],
						function ($message) use ($managername) {
						 $message->to($managername);
						 $message->bcc('muhammad.mehroz@bizzworld.com');
						 $message->cc('hr@bizzworld.com');
						 $message->subject('Candidate Arrival For Interview');
						});
						
					}
					
					// dd($managername);
					
						
						
			}else{
				
			
				
			}
				
			if($update){
				return redirect('/candidatelist');
			}else{
				return redirect('/candidatelist');
			}
		
	}
	
	public function candiaction($value,$comment){
		$action = explode("~", $value);
		
		$task =  DB::connection('mysql')->table('jobapplicant')
		->where('jobapplicant.jobapplicant_id','=',$action[1])
		->select('jobapplicant.*')
		->first();
		
		
		// $update  = DB::table('jobapplicant')
            // ->where('jobapplicant_id','=',$action[1])
            // ->update([
           // 'updated_at' => date('Y-m-d H:i:s'),
		   // 'jobapplicant_status' => $action[0],
		   // 'jobapplicant_ChangeBy' => session()->get("name"),
			// ]);
			
			// dd($manageremail);
		
		$update  = DB::connection('mysql')->table('jobapplicant')
            ->where('jobapplicant_id','=',$action[1])
            ->update([
           'updated_at' => date('Y-m-d H:i:s'),
		   'jobapplicant_status' => $action[0],
		   'jobapplicant_hrcomment' => $comment,
		   'jobapplicant_ChangeBy' => session()->get("name"),
			]);
			
			// dd($manageremail->elsemployees_email);
			
			if($action[0] == "Screening"){
				
				
				if( $task->jobapplicant_department == 1 ){
						
						// $manageremail = DB::table('elsemployees')
						// ->where('elsemployees.elsemployees_departid','=',$task->jobapplicant_department)
						// ->where('elsemployees.elsemployees_subdepartid','=',$task->jobapplicant_sub_department)
						// ->where('elsemployees.elsemployees_roleid','=', "3" )
						// ->select('elsemployees.*')
						// ->first();
						
						$manageremail = (object) array('elsemployees_name' => 'Finance Manager');
						
						// $managername = $manageremail->elsemployees_email;
						
						$all=[
								'managerdetail'=>$manageremail,
								'candidate'=>$task,
								];
						
						// Mail::send('emails.managerfirstmail',[
						// 	'datas' =>$all,
						// 	],
						// function ($message){
						//  $message->to('salman.khairi@bizzworld.com');
						//  $message->cc('hr@bizzworld.com');
						//  $message->bcc('muhammad.mehroz@bizzworld.com');
						//  $message->subject('Candidate Arrival For Interview');
						// });
						
					}else{
					
						$manageremail = DB::connection('mysql')->table('elsemployees')
						->where('elsemployees.elsemployees_departid','=',$task->jobapplicant_department)
						->where('elsemployees.elsemployees_roleid','=', "3" )
						->select('elsemployees.*')
						->first();
						
						// dd($manageremail);
						
						$managername = $manageremail->elsemployees_email;
						
						
						$all=[
								'managerdetail'=>$manageremail,
								'candidate'=>$task,
								];
						
						// Mail::send('emails.managerfirstmail',[
						// 	'datas' =>$all,
						// 	],
						// function ($message) use ($managername) {
						//  $message->to($managername);
						//  $message->cc('hr@bizzworld.com');
						//  $message->bcc('muhammad.mehroz@bizzworld.com');
						//  $message->subject('Candidate Arrival For Interview');
						// });
						
					}
				
				
			 
			 
			}else{
				
			
				
			}
			
			
		if($update){
			echo json_encode(true);
		} else{
			echo json_encode(false);
		}
		
	}
	
	public function inprocandidatelist(){
		
		$Inprocess = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','inprocess')
		->select('jobapplicant.*')
		->get();
		
		$Awaiting = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','awaiting')
		->select('jobapplicant.*')
		->get();
		
		$all=[
			'inprocess'=>$Inprocess,
			'awaiting'=>$Awaiting,
		];
		
		return view('admin.inprocesscandidates',['data' => $all]);
		
	}
	
	public function cfinterview($id){

        $task =  DB::connection('mysql')->table('jobapplicant')
        ->where('jobapplicant.jobapplicant_id','=',$id)
        ->select('jobapplicant.*')
        ->first();
		
		// dd($task);
        // dd($allData["user"]);
        return view('admin.other.callforinterandawaitng',['data' => $task]);

    }
	
	public function savecallfiorawait(Request $request){
		
		
		$validate = $this->validate($request,[
            'interTime' =>'required|',
        ]);
		// dd($request);
		
		

        $updated = DB::connection('mysql')->table('jobapplicant')
            ->where('jobapplicant_id','=',$request->editempid)
            ->update([
		   'jobapplicant_status' => $request->optradio,
		   'jobapplicant_intDateandTime' => $request->interTime,
		   'updated_at' => date('Y-m-d H:i:s'),
		   'jobapplicant_ChangeBy' => session()->get("name"),
			]);
			
			$Callforin = DB::connection('mysql')->table('jobapplicant')
			// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->where('jobapplicant.jobapplicant_id','=',$request->editempid )
			->select('jobapplicant.*')
			->first();
			
			// dd($request);
			
			$all=[
			'candidatedata'=>$Callforin,
			'request'=>$request,
			];
			
			
			
			$emailcandi = $all['candidatedata']->can_email;
			
			// dd($emailcandi);
			
			if($request->optradio == "awaiting"){
			
			 
					
			}else{
				
				 Mail::send('emails.interview-call',[
					'datas' =>$all,
					],
				function ($message) use ($emailcandi) {
				 $message->to($emailcandi);
				 $message->cc('recruitment@arcinventador.com');
				 $message->subject('Invitation to Interview - Arc Inventador');
				});
			}
	

		
       // if($updated){
            // echo json_encode(true);
        // }else{
            // echo json_encode(false);
        // }

    }
	
	public function callforinter(){
		
		
		$Callforin = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','callforinterview')
		->select('jobapplicant.*')
		->get();
		
		$Attend = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','attend')
		->select('jobapplicant.*')
		->get();
		// dd($Attend);
		
		$Notattend = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','notattend')
		->select('jobapplicant.*')
		->get();
		

		
		$all=[
			'callforin'=>$Callforin,
			'attend'=>$Attend,
			'notattend'=>$Notattend,
		];
		
		return view('admin.callforinterview',['data' => $all]);
		
	}
	
	public function inevfor($id){
		 
		 
		$evuinterviewform = DB::connection('mysql')->table('jobapplicant')
		// ->leftjoin('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		// ->leftjoin('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
		->leftjoin('can_evulation','can_evulation.can_evu_job_id', '=','jobapplicant.jobapplicant_id')
		->where('jobapplicant.jobapplicant_id','=',$id)
		->select('jobapplicant.*','can_evulation.*')
		->first();
		
		// dd($evuinterviewform);
		 
		return view('interview_assessment_form',['data' => $evuinterviewform]);
	}
		
	public function evalutedcandi(){
		
		
		$evaluation = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','evaluateByCoo')
		->select('jobapplicant.*')
		->get();
		
		// dd($evaluation);
		
		return view('admin.evalutioncandidate' ,['data' =>$evaluation]);
		
		
	}
	
	public function hiredcandi(){
		
		$hired = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','hired')
		->orWhere('jobapplicant.jobapplicant_status','=','nothired')
		->select('jobapplicant.*')
		->get();
		
		$joined = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','joined')
		->select('jobapplicant.*')
		->get();
		
		$notinter = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','notinterested')
		->select('jobapplicant.*')
		->get();
		
		$all=[
			'hired'=>$hired,
			'join'=>$joined,
			'notinterested'=>$notinter,
		];
		
		return view('admin.hiredcandidates' , ['data' => $all]);
	}
	
	public function adminsdevuform(Request $request){
		
		// dd($request);
		
		// $this->validate($request, [
					// 'can_techass' =>'required',
					// 'can_DesgDept' => 'required',
					// 'can_rate' =>'required',
					// 'can_date' => 'required',
					// 'can_inter1Name' =>'required',
					// 'can_int1date'=> 'required|date',
					// 'can_inter2Name' =>'required',
					// 'can_int2date' =>'required|date',
					// 'can_hr' =>'required',
					// 'can_hod' =>'required',
					// 'can_GM' =>'required',
					// 'can_Fpos' =>'required',
					// 'can_Fgra' =>'required',
					// 'can_Fsal' =>'required',
					// 'can_FupConfi' =>'required',
					// 'can_tc.*' =>'required',
					// 'can_examsucapp.*' =>'required',
					// 'can_rat.*' =>'required',
					// 'can_rem.*' =>'required',
					// 'can_edu_institute.*' =>'required',
					
				// ]);
		
		// $evu_tc = implode("~",$request->can_tc);
		
		// $evu_exams = implode("~",$request->can_examsucapp);
		
		// $evu_rate = implode("~",$request->can_rat);
		
		// $evu_rem = implode("~",$request->can_rem);
		
		// $update  = DB::table('can_evulation')
				// ->where('can_evu_id','=',$request->can_evu_id)
				// ->update([
					// 'can_evu_techass' => $request->can_techass,
					// 'can_evu_DesgDept' => $request->can_DesgDept,
					// 'can_evu_rate' => $request->can_rate,
					// 'can_evu_com_ass' => $request->can_remark,
					// 'can_evu_intdatetime' => $request->can_intDT,
					// 'can_evu_date' => $request->can_date,
					// 'can_evu_inter1Name' => $request->can_inter1Name,
					// 'can_evu_int1date' => $request->can_int1date,
					// 'can_evu_inter2Nam' => $request->can_inter2Name,
					// 'can_evu_int2date' => $request->can_int2date,
					// 'can_evu_com_hr' => $request->can_hr,
					// 'can_evu_com_hod' => $request->can_hod,
					// 'can_evu_com_GM' => $request->can_GM,
					// 'can_evu_Fpos' => $request->can_Fpos,
					// 'can_evu_Fgra' => $request->can_Fgra,
					// 'can_evu_Fsal' => $request->can_Fsal,
					// 'can_evu_FupConfi' => $request->can_FupConfi,
					// 'can_evu_ChangeBy' => session()->get("name"),
					// 'can_evu_techname' => $evu_tc,
					// 'can_evu_exam' => $evu_exams,
					// 'can_evu_techrate' => $evu_rate,
					// 'can_evu_rem' => $evu_rem,
					// 'updated_at' => date('Y-m-d H:i:s'),
				// ]);
				
			
			 // $updated = DB::table('jobapplicant')
				// ->where('jobapplicant_id','=',$request->can_job_id)
				// ->update([
			   // 'jobapplicant_status' => "evaluateByAdmin",
			   // 'updated_at' => date('Y-m-d H:i:s'),
			   // 'jobapplicant_ChangeBy' => session()->get("name"),
				// ]);
				
				 
			// if($update){
				// return redirect('/callforinterview');
			// }else{
				// return redirect('/callforinterview');
			// }
			
			$this->validate($request, [
					'can_company' =>'required',
					'can_report' => 'required',
					'can_loc' =>'required',
					'can_grade' => 'required',
					// 'can_ref' =>'required',
					'can_job_type'=> 'required',
					'can_relative' =>'required',
					'can_BPN' =>'required',
					'can_depends' =>'required',
					'can_exp_benefit' =>'required',
					// 'can_job_summary' =>'required',
					'can_hr_qua' =>'required',
					'can_hr_per_tra' =>'required',
					'can_hr_com_ski' =>'required',
					'can_hr_obtai' =>'required',
					'can_hr_pre' =>'required',
					'can_hr_verbal_ski' =>'required',
					'can_hr_body' =>'required',
					'can_hr_manner' =>'required',
					'can_hr_rea' =>'required',
					'can_hr_obtainedmarks' =>'required',
					'can_hr_intname' =>'required',
					// 'can_off_salary' =>'required',
					// 'can_off_desg' =>'required',
					'can_hr_expdate' =>'required',
					'can_hr_intdate' =>'required|date',
					'can_hr_commets' =>'required',
					// 'can_hod_job_rel' =>'required',
					// 'can_hod_exp' =>'required',
					// 'can_hod_know' =>'required',
					// 'can_hod_carpro' =>'required',
					// 'can_hod_noble' =>'required',
					// 'can_hod_pot' =>'required',
					// 'can_hod_obtain' =>'required',
					'can_hr_cand' =>'required',
					// 'can_hod_cand' =>'required',
					// 'can_rec_sal' =>'required',
					// 'can_pro_desg' =>'required',
					// 'can_coo_remark' =>'required',
					// 'can_approval' =>'required',
					// 'can_app_name' =>'required',
					// 'can_app_date' =>'required|date',
				]);
		
		
			$update  = DB::connection('mysql')->table('can_evulation')
					->where('can_evu_id','=',$request->can_evu_id)
					->update([
						'can_evu_company' => $request->can_company,
						'can_evu_reportsto' => $request->can_report,
						'can_evu_location' => $request->can_loc,
						'can_evu_grade' => $request->can_grade,
						'can_evu_reference' => $request->can_ref,
						'can_evu_job_type' => $request->can_job_type,
						'can_evu_relativename' => $request->can_relative,
						'can_evu_budget' => $request->can_BPN,
						'can_evu_depends' => $request->can_depends,
						'can_evu_expbnft' => $request->can_exp_benefit,
						'can_evu_job_sum' => $request->can_job_summary,
						'can_evu_hr_qua' => $request->can_hr_qua,
						'can_evu_hr_per_tra' => $request->can_hr_per_tra,
						'can_evu_hr_com_ski' => $request->can_hr_com_ski,
						'can_evu_hr_obtain' => $request->can_hr_obtai,
						'can_evu_hr_pre' => $request->can_hr_pre,
						'can_evu_hr_ver_ski' => $request->can_hr_verbal_ski,
						'can_evu_ChangeBy' => session()->get("name"),
						'can_evu_hr_body' => $request->can_hr_body,
						'can_evu_hr_manner' => $request->can_hr_manner,
						'can_evu_hr_reson' => $request->can_hr_rea,
						'can_evu_hr_obtain_mark' => $request->can_hr_obtainedmarks,
						'can_evu_hr_int_name' => $request->can_hr_intname,
						'can_evu_hr_int_date' => $request->can_hr_intdate,
						'can_evu_hr_comments' => $request->can_hr_commets,
						'can_evu_off_salary' => $request->can_off_salary,
						'can_evu_hr_expdate' => $request->can_hr_expdate,
						'can_evu_off_desg' => $request->can_off_desg,
						// 'can_evu_hod_job_rel' => $request->can_hod_job_rel,
						// 'can_evu_hod_exp' => $request->can_hod_exp,
						// 'can_evu_hod_know' => $request->can_hod_know,
						// 'can_evu_hod_carpro' => $request->can_hod_carpro,
						// 'can_evu_hod_noble' => $request->can_hod_noble,
						// 'can_evu_hod_pot' => $request->can_hod_pot,
						// 'can_evu_hod_obtain' => $request->can_hod_obtain,
						'can_evu_hr_cand' => $request->can_hr_cand,
						// 'can_evu_hod_cand' => $request->can_hod_cand,
						// 'can_evu_rec_sal' => $request->can_rec_sal,
						// 'can_evu_pro_desg' => $request->can_pro_desg,
						// 'can_evu_coo_remark' => $request->can_coo_remark,
						// 'can_evu_approval' => $request->can_approval,
						// 'can_evu_app_name' => $request->can_app_name,
						// 'can_evu_app_date' => $request->can_app_date,
						'updated_at' => date('Y-m-d H:i:s'),
					]);
				
				
				$task =  DB::connection('mysql')->table('jobapplicant')
				->where('jobapplicant.jobapplicant_id','=',$request->can_job_id)
				->select('jobapplicant.*')
				->first();
				
				// dd($task);
				
				$manageremail = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_departid','=',$task->jobapplicant_department)
				->where('elsemployees.elsemployees_roleid','=', "3" )
				->select('elsemployees.*')
				->first();
				
				
				
				// $managername = $manageremail->elsemployees_email;
				
				$all=[
				'managerdetail'=>$manageremail,
				'candidate'=>$task,
				];
				
				// dd($managername);
				
				
				// Mail::send('emails.evadcometomana',[
				// 	'datas' =>$all,
				// 	],
				// function ($message) use ($managername) {
				//  $message->to($managername);
				//  $message->cc('hr@bizzworld.com');
				//  $message->bcc('muhammad.mehroz@bizzworld.com');
				//  $message->subject('Candidate Confirmed And Will Attend Interview');
				// });
				
				
			
				$updated = DB::connection('mysql')->table('jobapplicant')
					->where('jobapplicant_id','=',$request->can_job_id)
					->update([
					'jobapplicant_status' => "evaluateByAdmin",
					'updated_at' => date('Y-m-d H:i:s'),
					'jobapplicant_ChangeBy' => session()->get("name"),
					]);
				
				 
			if($update){
				return redirect('/callforinterview');
			}else{
				return redirect('/callforinterview');
			}
		
	}
	
	public function modalemployeeviewjust($id){

			$employeemodal = DB::connection('mysql')->table('jobapplicant')
			// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			// ->join('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
			->where('jobapplicant.jobapplicant_id', '=', $id)
			->first();
			
			$department = DB::connection('mysql')->table('hrm_Department')
							->select('hrm_Department.*')
							->get();
			
			
			$all=[
					'department'=>$department,
					'userdata'=>$employeemodal,
				];
				
			// dd($employeemodal);
			
			return view('admin.modal.viewonlyemployee',['data'=>$all]);     
				
	}
	
	public function finallastevau($id){
		 
		 
		$evuinterviewform = DB::connection('mysql')->table('jobapplicant')
		// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		// ->join('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
		->join('can_evulation','can_evulation.can_evu_job_id', '=','jobapplicant.jobapplicant_id')
		->where('jobapplicant.jobapplicant_id','=',$id)
		->select('jobapplicant.*','can_evulation.*')
		->first();
		
		// dd($evuinterviewform);
		 
		return view('admin.modal.finalevauform',['data' => $evuinterviewform]);
	}
	
	public function finalaction(Request $request){
	
		// dd($request);
			$update  = DB::connection('mysql')->table('jobapplicant')
            ->where('jobapplicant_id','=',$request->can_job_id)
            ->update([
           'updated_at' => date('Y-m-d H:i:s'),
		   'jobapplicant_status' => $request->can_finalstatus,
		   'jobapplicant_ChangeBy' => session()->get("name"),
			]);
			
			$update  = DB::connection('mysql')->table('can_evulation')
				->where('can_evu_id','=',$request->can_evu_id)
				->update([
				'can_evu_sal_afpro' => $request->can_sal_afpro,
				'updated_at' => date('Y-m-d H:i:s'),
				'can_evu_ChangeBy' => session()->get("name")."BackToCoo",
				]);
			
			if($request->can_finalstatus == "evaluateByManager"){
				
				Mail::send('emails.emailforcoo',[
					],
				function ($message) {
				 $message->cc('hr@bizzworld.com');
				 $message->bcc('muhammad.mehroz@bizzworld.com');
				 $message->subject('Candidate Arrival For Interview');
				});
			 
			 
			}else if($request->can_finalstatus == "hired"){
				
				$task = DB::connection('mysql')->table('jobapplicant')
					// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
					// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
					->join('can_evulation','can_evulation.can_evu_job_id', '=','jobapplicant.jobapplicant_id')
					->where('jobapplicant.jobapplicant_id','=',$request->can_job_id )
					->select('jobapplicant.*')
					->first();
				
				$candiname = $task->can_email;
				
				// dd($candiname);
				
				$all=[
				'candidate'=>$task,
				];
				
				// dd($all);
				
				 Mail::send('emails.offerlettermail',[
					'datas' =>$all,
					],
				function ($message) use ($candiname,$task) {
				//  $message->to($candiname);
				 $message->to('avidhaus.mehroz@gmail.com');
				 $message->cc('recruitment@arcinventador.com');
				 $message->subject('Appointment Letter for '.$task->jobapplicant_postionapppliedform.' Arc Inventador');
				});
				
				
				
				
				// Mail::send('emails.offerlettermail',[
					// 'datas' =>$all,
					// ],
				// function ($message) use ($candiname) {
				 // $message->to($candiname);
				 // $message->to("badaruddin_tariq@mobilelinkusa");
				// $message->cc('uzair_khalid@mobilelinkusa.com');
				 // $message->subject('Candidate Arrival For Interview');
				// });
				
			}else{
				
			
				
			}
			
			
		if($update){
				return redirect('/evalutioncandidate');
			}else{
				return redirect('/evalutioncandidate');
			}
		
	}
	
	public function candiacttoattend($value){
	
		$action = explode("~", $value);
		
		$task =  DB::connection('mysql')->table('jobapplicant')
        ->where('jobapplicant.jobapplicant_id','=',$action[1])
        ->select('jobapplicant.*')
        ->first();
		
		// dd($task->jobapplicant_department);
		
		// $manageremail = DB::connection('mysql')->table('elsemployees')
		// ->where('elsemployees.elsemployees_departid','=',$task->jobapplicant_department)
		// ->where('elsemployees.elsemployees_roleid','=', "3" )
		// ->select('elsemployees.*')
		// ->first();
		
		// dd($manageremail);
		
		// $managername = $manageremail->elsemployees_email;
		$candidateemail = $task->can_email;
		
		$all=[
			'candidate'=>$task,
			];
			
			// dd($manageremail);
		
		$update  = DB::connection('mysql')->table('jobapplicant')
            ->where('jobapplicant_id','=',$action[1])
            ->update([
           'updated_at' => date('Y-m-d H:i:s'),
		   'jobapplicant_status' => $action[0],
		   'jobapplicant_ChangeBy' => session()->get("name"),
			]);
			
			// dd($manageremail->elsemployees_email);
			
			if($action[0] == "attend"){
				
				Mail::send('emails.managerattendcanemail',[
					'datas' =>$all,
					],
				function ($message) use ($candidateemail) {
				 $message->to($candidateemail);
				 $message->cc('recruitment@arcinventador.com');
				 $message->subject('Thank You for Interviewing with Arc Inventador');
				});
			 
			 
			}elseif($action[0] == "notattend"){
				
				Mail::send('emails.notattendinterview',[
					'datas' =>$all,
					],
				function ($message) use ($candidateemail) {
				 $message->to($candidateemail);
				 $message->cc('recruitment@arcinventador.com');
				 $message->subject('Invitation to Reschedule Interview - Arc Inventador');
				});
			 
			 
			}else{
				
			
				
			}
			
		if($update){
			echo json_encode(true);
		} else{
			echo json_encode(false);
		}
		
	}
	
	public function hire($value){
		
		$action = explode("~", $value);
		
		// dd($value);
		
		$update  = DB::connection('mysql')->table('jobapplicant')
            ->where('jobapplicant_id','=',$action[1])
            ->update([
           'updated_at' => date('Y-m-d H:i:s'),
		   'jobapplicant_status' => $action[0],
		   'jobapplicant_ChangeBy' => session()->get("name"),
			]);
			
		if($update){
			echo json_encode(true);
		} else{
			echo json_encode(false);
		}
		
	}
	
	public function horejld(){
		
		$candidatelist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('department','department.DEPT_ID', '=','jobapplicant.jobapplicant_department')
		->select('jobapplicant.*','department.*','hrm_login.*')
		->get();
		
		// dd($all);
		
		// $allData = array("task" => $task);
	
		return view('admin.holdon' , ['data' => $candidatelist]);
		
	}
	
	public function prhchannel($value){
		
		$action = explode("~", $value);
		
		// dd($value);
		
		$update  = DB::connection('mysql')->table('jobapplicant')
            ->where('jobapplicant_id','=',$action[1])
            ->update([
           'updated_at' => date('Y-m-d H:i:s'),
		   'jobapplicant_channel' => $action[0],
		   'jobapplicant_ChangeBy' => session()->get("name"),
			]);
			
		if($update){
			echo json_encode(true);
		} else{
			echo json_encode(false);
		}
		
	}
	
	public function testserver(){
		
		$year = date("Y");
		$month = date("m");
		
		
		// dd($month);
		$batchid = session()->get("batchid");
		
		// dd(DB::connection('sqlsrv'));
	
        $userinfo = DB::connection('sqlsrv')->table('userinfo')
					->where('userinfo.Userid','=',$batchid)
					->select('userinfo.*')
                    ->first();
		
		// dd($userinfo);
					
		// $task = DB::connection('sqlsrv')->select("select * from CHECKINOUT where (
		// CHECKINOUT.USERID = $userinfo->USERID					
		// AND CHECKINOUT.CHECKTYPE != '1' 
		// AND CHECKINOUT.CHECKTYPE != '0'
		// AND DATEPART(yy, CHECKINOUT.CHECKTIME) = $year
		// AND DATEPART(mm, CHECKINOUT.CHECKTIME) = $month
		  // ) ");
		
		$task = DB::connection('sqlsrv')->table('Checkinout')
		->where('Checkinout.Userid','=',$batchid)
		->where('Checkinout.CheckType','!=','2')
		// ->where('Checkinout.CheckType','=','1')
		// ->where('CHECKINOUT.CHECKTYPE','!=','O')
		->whereYear('Checkinout.CheckTime','=',$year)
		->whereMonth('Checkinout.CheckTime','=',$month)
		// ->where('Checkinout.CheckTime','like','%'.'-'.$month.'-'.'%')
		->select('Checkinout.*')
		->get();
					
		

		$userdetails = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_batchid','=',$batchid)
		->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
		->get();

		// dd($userdetails[0]->elsemployees_batchid);
					
		// dd($task);

		// $all=[
		// 	'data'=>$task,
		// 	'userdetail'=>$userdetails,
		// ];
					
		dd($task);
		
		return view('testserver',['data'=>$task,'userdetail'=>$userdetails]);
    }
	
	// public function testserverdata(){
		
	// 	$year = date("Y");
	// 	$month = date("m");
		
		
	// 	// dd($month);
	// 	$batchid = session()->get("batchid");
	// 	// $sno = 0;
		
	// 	// dd($batchid);
	
 //        $userinfo = DB::connection('sqlsrv')->table('USERINFO')
	// 	->where('USERINFO.BADGENUMBER','=',$batchid)
	// 	->select('USERINFO.USERID')
 //        ->first();
		
	// 	$task = DB::connection('sqlsrv')->table('CHECKINOUT')
	// 	->where('CHECKINOUT.USERID','=',$userinfo->USERID)
	// 	->where('CHECKINOUT.CHECKTYPE','!=','1')
	// 	->where('CHECKINOUT.CHECKTYPE','!=','0')
	// 	// ->where('CHECKINOUT.CHECKTYPE','!=','O')
	// 	->whereYear('CHECKINOUT.CHECKTIME', $year)
	// 	->whereMonth('CHECKINOUT.CHECKTIME', $month)
	// 	->select('CHECKINOUT.*')
	// 	->get();

	// 	// $all=[
	// 	// 	'task'=>$task,
	// 	// 	'sno'=>$sno,
	// 	// ];

	// 	// dd($sno);
					
					
	// 	return view('dynamicemployeedata.testserverdata',['data'=>$task]);
 //    }
	
	public function testserversearchmonth($month,$name){

		if (session()->get('role') == 1) {
		
			if(session()->get('role') == 4 && $name != session()->get('batchid')){
	             return redirect('/')->with('message','We report your id on HR');
	        }
	        
	        $empinfo = DB::connection('mysql')->table('elsemployees')
	        ->where('elsemployees.elsemployees_batchid','=',$name)
	        ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name','elsemployees.elsemployees_departid')
	        ->first();

	        // dd($empinfo->elsemployees_batchid);

	        $currentyear = date('Y');
			
			
			// dd($currentyear);
			// $batchid = session()->get("batchid");
			
			// dd($batchid);
		
	        $userinfo = DB::connection('sqlsrv')->table('USERINFO')
			->where('USERINFO.BADGENUMBER','=',$empinfo->elsemployees_batchid)
			->select('USERINFO.USERID')
	        ->first();
			
			// dd($userinfo);
						
			// $task = DB::connection('sqlsrv')->select("select * from CHECKINOUT where (
			// CHECKINOUT.USERID = $userinfo->USERID					
			// AND CHECKINOUT.CHECKTYPE != '1' 
			// AND CHECKINOUT.CHECKTYPE != '0'
			// AND DATEPART(yy, CHECKINOUT.CHECKTIME) = $year
			// AND DATEPART(mm, CHECKINOUT.CHECKTIME) = $month
			  // ) ");
			
			$task = DB::connection('sqlsrv')->table('CHECKINOUT')
			->where('CHECKINOUT.USERID','=',$userinfo->USERID)
			->where('CHECKINOUT.CHECKTYPE','!=','1')
			->where('CHECKINOUT.CHECKTYPE','!=','0')
			// ->where('CHECKINOUT.CHECKTYPE','!=','O')
			->whereYear('CHECKINOUT.CHECKTIME', $currentyear)
			->whereMonth('CHECKINOUT.CHECKTIME', $month)
			->select('CHECKINOUT.*')
			->get();
						
			

			$userdetails = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_batchid','=',$name)
			->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
			->get();

			// dd($userdetails);

			return view('dynamicemployeedata.testserverdata',['data'=>$task,'userdetail'=>$userdetails]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal this page with this role');
		}
    }
    // Bizz Album Start
    public function albumlist(){
		if(session()->get("email")){
				return view('gallery.albumlist');
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function albumlistdata(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('album')
			->where('album.status_id','=',2)
			->orderBy('album_id', 'DESC')
			->select('album.*')
			->paginate(20);
			return view('gallery.albumlistdata',['data'=>$task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function createalbummodal(){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
		        return view('gallery.modal.createalbum');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Create Album');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitcreatealbum(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
			$this->validate($request, [
               'title'=>'required',
               'eventdate'=>'required',
               'input'=>'mimes:jpeg,bmp,png|max:20024|required',
			]);
		if($request->hasFile('input') && $request->input->isValid()){
            	$number = rand(1,999);
				$numb = $number / 7 ;
				$extension = $request->input->extension();
                $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
                $filename = $request->input->move(public_path('album'),$filename);
				$img = Image::make($filename)->resize(800,800, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($filename);
			    $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
			}else{
            $filename = 'no_image.jpg';    
            }
			$createalbum[] = array(
				'album_title' => $request->title,
				'album_date' => $request->eventdate,
				'album_image' => $filename,
				'status_id' => 2,
				'created_by' => session()->get('id'),
				'created_at' => date('Y-m-d h:i:s')
				);
			DB::connection('mysql')->table('album')->insert($createalbum);
		if($createalbum){
				return redirect('/albumlist')->with('message','Album Created Successfully'); 
		}else{
              return redirect('/')->with('message','Oops! Something Went Wrong');
        }
        }else{
				return redirect('/')->with('message','You Are Not Allowed To Create Album');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function editalbummodal($id){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$task = DB::connection('mysql')->table('album')
					->where('album.album_id','=',$id)
					->select('album.*')
					->first();
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');	
			}
					return view('gallery.modal.editalbum',['data' => $task ]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	
	}
	public function submiteditalbum(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$this->validate($request, [
               'title'=>'required',
               'eventdate'=>'required',
               'input'=>'mimes:jpeg,bmp,png|max:20024',
			]);
			if($request->hasFile('input') && $request->input->isValid()){
	                	$number = rand(1,999);
			            $numb = $number / 7 ;
			            $extension = $request->input->extension();
	                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
	                    $filename = $request->input->move(public_path('album'),$filename);
			            $img = Image::make($filename)->resize(800,800, function($constraint) {
	                        $constraint->aspectRatio();
	                    });
			            $img->save($filename);
			            $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
			        }else{
	         		      $filename = 'no_image.jpg';    
	                }
	                if ($filename == 'no_image.jpg') {
	                	$addalbum =   DB::connection('mysql')->table('album')
						->where('album.album_id', '=', $request->hdnalbumid)
						->update(['album_title' => $request->title,
							'album_date' => $request->eventdate,
							'updated_at' => date('Y-m-d h:i:s'),
							'updated_by' => session()->get('id')]);
	                }else{
						$addalbum =   DB::connection('mysql')->table('album')
						->where('album.album_id', '=', $request->hdnalbumid)
						->update(['album_title' => $request->title,
							'album_date' => $request->eventdate,
							'album_image' => $filename,
							'updated_at' => date('Y-m-d h:i:s'),
							'updated_by' => session()->get('id')]);
					}
				if($addalbum){
						return redirect('/albumlist')->with('message','Album Updated Successfully');;
				}else{
						return redirect('/albumlist')->with('message','Oops! Something went wrong');;
					}
					}else{
						return redirect('/')->with('message','Reach HR For Access');
					}
			}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			} 
	}
	public function deletealbum($id){
		if(session()->get("email")){
			DB::connection('mysql')->table('album')
			->where('album.album_id', '=', $id)
			->update(['status_id' => 1]);
				return redirect('/albumlist')->with('message','Album Successfully Deleted!');
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			} 
	}
	public function gallerylist($id){
		if(session()->get("email")){
				return view('gallery.gallerylist',['data'=>$id]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function gallerylistdata($id){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('gallery')
			->where('gallery.status_id','=',2)
			->where('gallery.album_id','=',$id)
			->orderBy('gallery_id', 'DESC')
			->select('gallery.*')
			->paginate(20);
			$task->albumid = $id;
			return view('gallery.gallerylistdata',['data'=>$task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function uploadgallerymodal($id){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
		        return view('gallery.modal.uploadgallery',['albumid'=>$id]);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Upload');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submituploadgallery(Request $request){
		if(session()->get("email")){
			$this->validate($request,[
	        'input.*'		=>'mimes:jpeg,bmp,png,jpg,mp4,x-m4v|max:20024',
	        'input'  		=> 'max:15',
	        'hdnalbumid'  	=> 'required',
			]);
            $videos = $request->input;
        	$indexvideo = 0;
        	$videofilename = array();
            if ($request->has('input')) {
            	foreach($videos as $vd ){
            		if( $request->input[$indexvideo]->isValid()){
			            $number = rand(1,999);
				        $numb = $number / 7 ;
				        $extension = $request->input[$indexvideo]->extension();
			            $videofilename[$indexvideo]  = date('Y-m-d')."_".$numb."_".$indexvideo."_.".$extension;
			          	$videofilename[$indexvideo] = $request->input[$indexvideo]->move(public_path('gallery/'),$videofilename[$indexvideo]);
			          	$videofilename[$indexvideo]  = date('Y-m-d')."_".$numb."_".$indexvideo."_.".$extension;
						$addtogallery[] = array(
							'gallery_image' => $videofilename[$indexvideo],
							'album_id' 		=> $request->hdnalbumid,
							'status_id' 	=> 2,
							'created_by' => session()->get('id'),
							'created_at' => date('Y-m-d h:i:s')
						);
			            $indexvideo++;
            		}
	        	}
	        	$save = DB::connection('mysql')->table('gallery')->insert($addtogallery);
        	}
            else{
            	        $videofilename = 'no_video.png'; 
                }
                $redirectgallery = "gallerylist/".$request->hdnalbumid;
		if($save){
            return redirect($redirectgallery)->with('message','Uploaded Successfully');
        }else{
            return redirect('/gallerylist')->with('message','Oops! Something Went Wrong');
        }
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}	
	}
	public function deletegallery($id,$aid){
		if(session()->get("email")){
			DB::connection('mysql')->table('gallery')
			->where('gallery.gallery_id', '=', $id)
			->update(['status_id' => 1]);
			$redirectgallery = "gallerylist/".$aid;
				return redirect($redirectgallery)->with('message','Successfully Deleted!');
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			} 
	}
	public function complainreport(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('complain')
			->join ('complainstatus','complainstatus.complainstatus_id', '=','complain.complainstatus_id')
			->join ('elsemployees','elsemployees.elsemployees_batchid', '=','complain.created_by')
			->orderBy('complain_id', 'DESC')
			->select('complain.*','complainstatus_name','elsemployees_name')
			->get();
			// dd($task);
			return view('complainreport',['data'=>$task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		} 
	}
	public function processcomplain($id){
		if(session()->get("email")){
			DB::connection('mysql')->table('complain')
			->where('complain_id', '=', $id)
			->update(['complainstatus_id' => 2]);
		}
	}
	public function rejectcomplain($id){
		if(session()->get("email")){
			DB::connection('mysql')->table('complain')
			->where('complain_id', '=', $id)
			->update(['complainstatus_id' => 3]);
		}
	}
	public function resolvecomplain($id){
		if(session()->get("email")){
			DB::connection('mysql')->table('complain')
			->where('complain_id', '=', $id)
			->update(['complainstatus_id' => 4]);
		}
	}
	public function submitcomplaincomment($id, $value){
		if(session()->get("email")){
			DB::connection('mysql')->table('complaincomment')->insert([
		    'complaincomment_comment' 	=> $value,
		    'complaincomment_date' 		=> date('Y-m-d'),
		    'complain_id'				=> $id,
		    'status_id' 				=> 1,
		    'created_by'				=> session()->get('batchid'),
		    'created_at'				=> date('Y-m-d h:i:s'),
		   ]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	}
	// Bizz Album End
}