<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use DB;

class ManagerController extends Controller
{
    public function mngerdash(){
		
		
		$task = DB::connection('mysql')->table('elsemployees')
		->join('role','role.roleid', '=','elsemployees.elsemployees_roleid')
		->join('designation','elsemployees.elsemployees_desgid', '=','designation.DESG_ID')
		->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
		->where('elsemployees.elsemployees_batchid','=',session()->get("batchid"))
		->select('elsemployees.*','role.*','designation.*','hrm_Department.*')
		->first();
		
		// dd($task);
		
		$employeetotal = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_reportingto','=', $task->elsemployees_empid ) 
		->select('elsemployees.*')
		->count();

	$adate = strtotime("+7 day");
		$afterdate =  date('Y-m-d', $adate);
		$todaydate =  date('Y-m-d');
		$year = date('Y');
		$explodedate = explode('-', $afterdate);
		$getdob = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_status','=',2)
		->where('elsemployees.elsemployees_reportingto','=',session()->get('id'))
		->orwhere('elsemployees.elsemployees_empid','=',session()->get("id"))
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
		->where('elsemployees.elsemployees_reportingto','=',session()->get('id'))
		->orwhere('elsemployees.elsemployees_empid','=',session()->get("id"))
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
		$all=[
			'emptota'=>$employeetotal,
			'empdata'=>$task,
			'bddata'=>$birthday,
			'jdata'=>$jday,
		];
		
		// dd($all);
		
		return view('manager.managerdashboard', ['data' => $all]);
		
	}
	
	public function candidatelimgst(){
		
		$Screeninglist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','Screening')
		// ->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();
		
		// dd($Screeninglist);
		
		$Rejected = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','rejectedByManager')
		// ->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();
		
		$Callforinter = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','inprocess')
		// ->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();
		
		$Irreleventlist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','irreleventByManager')
		// ->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();
		
		// dd($task);
		
		// $allData = array("task" => $task);
		
		$all=[
			 'rejected'=>$Rejected,
			'screeninglist'=>$Screeninglist,
			'callforinter'=>$Callforinter,
			'irreleventlist'=>$Irreleventlist,
		];
		
		return view('manager.mcandidatelist' , ['data' => $all]);
		
	}

	public function mcandidate_list(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('manager.mcandidate_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function mcandidate_listdata(){

		$task = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','Screening')
		->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->paginate(10);


		// dd($task);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.mcan_dynamictable',['data'=>$task]);
		
	}
	
	public function searchmcandidate_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Screening')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Screening')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','Screening')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

			// dd();

				return view('dynamicemployeedata.mcan_dynamicsearch',['data'=>$task]);
				
	}

	public function callforinterview_list(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('manager.callforinterview_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function callforinterview_listdata(){

		$task = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','inprocess')
		->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->paginate(10);


		// dd($task);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.mcan_dynamictable',['data'=>$task]);
		
	}
	
	public function searchintcan_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','inprocess')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','inprocess')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','inprocess')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

			// dd();

				return view('dynamicemployeedata.mcan_dynamicsearch',['data'=>$task]);
				
	}

	public function rejected_list(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('manager.rejectedcan_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function rejectedcan_listdata(){

		$task = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','rejectedByManager')
		->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->paginate(10);


		// dd($task);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.mcan_dynamictable',['data'=>$task]);
		
	}
	
	public function searchrejectedcan_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','rejectedByManager')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','rejectedByManager')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','rejectedByManager')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

			// dd();

				return view('dynamicemployeedata.mcan_dynamicsearch',['data'=>$task]);
				
	}

	public function mirrelevent_list(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('manager.mirrelevent_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function mirreleventcan_listdata(){

		$task = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','irreleventByManager')
		->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->paginate(10);


		// dd($task);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.mcan_dynamictable',['data'=>$task]);
		
	}
	
	public function searchmirreleventcan_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','irreleventByManager')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','irreleventByManager')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_channel','=','1')
			->where('jobapplicant.jobapplicant_status','=','irreleventByManager')
			->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

			// dd();

				return view('dynamicemployeedata.mcan_dynamicsearch',['data'=>$task]);
				
	}
	
	public function candmiaction($value){
	
		$action = explode("~", $value);
		
		// dd($action);
		
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
	
	public function modalmanagerview($id){

			$employeemodal = DB::connection('mysql')->table('jobapplicant')
			->join('department','department.DEPT_ID', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_id', '=', $id)
			->first();
			
			$department = DB::connection('mysql')->table('department')
							->select('department.*')
							->get();
			
			$all=[
					'department'=>$department,
					'userdata'=>$employeemodal,
				];
				
			// dd($employeemodal);
			
			return view('manager.model.mngcanview',['data'=>$all]);
				
	}
	
	public function submitcanmngmodel(Request $request){
			
			// dd($request);
			
			
			// dd($action);
			
			if($request->actionname == "inprocess"){
			
				$insert[] = [
					   'can_evu_job_id' => $request->can_id,
					   'created_at' => date('Y-m-d H:i:s'),
					   'updated_at' => date('Y-m-d H:i:s'),
					   ];
					   
					   $created = DB::connection('mysql')->table('can_evulation')->insert($insert);
			
			}
			
			
			
			$update  = DB::connection('mysql')->table('jobapplicant')
				->where('jobapplicant_id','=',$request->can_id)
				->update([
			   'updated_at' => date('Y-m-d H:i:s'),
			   'jobapplicant_mngrComment' => $request->can_mngcmnt,
			   'jobapplicant_status' => $request->actionname,
			   'jobapplicant_ChangeBy' => session()->get("name"),
				]);
				
			
				
			if($update){
				return redirect('/mcandidatelist');
			}else{
				return redirect('/mcandidatelist');
			}
		
	}
	
	public function maevucan(){
		
		$Maevucandidate = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('department','department.DEPT_ID', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','evaluateByAdmin')
		->where('jobapplicant.jobapplicant_department','=',session()->get("dptid"))
		->select('jobapplicant.*','department.*','hrm_login.*')
		->get();
		
		$all=[
			 'maevucandidate'=>$Maevucandidate,
		];
		
		
		// dd($all);
		
		return view('manager.mevalutioncandidate' , ['data' => $all]);
		
	}
	
	public function inasfo($id) {
		
		$evuinterviewform = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->join('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
		->join('can_evulation','can_evulation.can_evu_job_id', '=','jobapplicant.jobapplicant_id')
		->where('jobapplicant.jobapplicant_id','=',$id)
		->select('jobapplicant.*','hrm_Department.dept_name','can_evulation.*','sub_department.*')
		->first();
		
		// dd($evuinterviewform);
		 
		return view('manager.other.mevaluationform',['data' => $evuinterviewform]);
		 
		// return view('interview_assessment_form');
	}
	
	public function formsubmitevu(Request $request){
		
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
					// 'can_company' =>'required',
					// 'can_report' => 'required',
					// 'can_loc' =>'required',
					// 'can_grade' => 'required',
					// 'can_ref' =>'required',
					// 'can_job_type'=> 'required',
					// 'can_relative' =>'required',
					// 'can_BPN' =>'required',
					// 'can_depends' =>'required',
					// 'can_exp_benefit' =>'required',
					// 'can_job_summary' =>'required',
					'can_hod_job_rel' =>'required',
					'can_hod_exp' =>'required',
					'can_hod_know' =>'required',
					'can_hod_carpro' =>'required',
					'can_hod_noble' =>'required',
					'can_hod_pot' =>'required',
					'can_hod_obtain' =>'required',
					// 'can_hr_cand' =>'required',
					'can_hod_cand' =>'required',
				]);
		
		
		$update  = DB::connection('mysql')->table('can_evulation')
				->where('can_evu_id','=',$request->can_evu_id)
				->update([
					// 'can_evu_company' => $request->can_company,
					// 'can_evu_reportsto' => $request->can_report,
					// 'can_evu_location' => $request->can_loc,
					// 'can_evu_grade' => $request->can_grade,
					// 'can_evu_reference' => $request->can_ref,
					// 'can_evu_job_type' => $request->can_job_type,
					// 'can_evu_relativename' => $request->can_relative,
					// 'can_evu_budget' => $request->can_BPN,
					// 'can_evu_depends' => $request->can_depends,
					// 'can_evu_expbnft' => $request->can_exp_benefit,
					// 'can_evu_job_sum' => $request->can_job_summary,
					'can_evu_hod_job_rel' => $request->can_hod_job_rel,
					'can_evu_hod_exp' => $request->can_hod_exp,
					'can_evu_hod_know' => $request->can_hod_know,
					'can_evu_hod_carpro' => $request->can_hod_carpro,
					'can_evu_hod_noble' => $request->can_hod_noble,
					'can_evu_hod_pot' => $request->can_hod_pot,
					'can_evu_hod_obtain' => $request->can_hod_obtain,
					// 'can_evu_hr_cand' => $request->can_hr_cand,
					'can_evu_hod_comments' => $request->can_hod_commets,
					'can_evu_hod_cand' => $request->can_hod_cand,
					'updated_at' => date('Y-m-d H:i:s'),
					'can_evu_ChangeBy' => session()->get("name"),
				]);
				
			
			 $updated = DB::connection('mysql')->table('jobapplicant')
				->where('jobapplicant_id','=',$request->can_job_id)
				->update([
				'jobapplicant_status' => "evaluateByManager",
			   'updated_at' => date('Y-m-d H:i:s'),
			   'jobapplicant_ChangeBy' => session()->get("name"),
				]);
				
				Mail::send('emails.emailforcoo',[
					],
				function ($message) {
				 $message->to("muhammad.mehroz@bizzworld.com");
				 $message->cc('hr@bizzworld.com');
				 $message->subject('Candidate Arrival For Interview');
				});
				
				 
			if($update){
				return redirect('/mevalutioncandidate');
			}else{
				return redirect('/mevalutioncandidate');
			}
	
	}
	
	public function modalemployeeviewjust($id){

			$employeemodal = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->join('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
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
			if( session()->get("email") == "salman.khairi@bizzworld.com"  || (session()->get("role") == 1 ) ){
				return view('admin.modal.viewonlyemployee',['data'=>$all]);  
			}else{
			return view('manager.model.viewonmanaemponl',['data'=>$all]);    
			}
				
	}
	// Employee Target Start
	public function employeetargetlist(Request $request){
		if(session()->get("email")){
			// dd($request->attendancemonth);
			if ($request->attendancemonth != null) {
				$monthoftarget = $request->attendancemonth;
			}else{
				$monthoftarget = date('Y-m');
			}
			// dd($monthoftarget);
			if(session()->get("role") <= 2){
			$task = DB::connection('mysql')->table('employeetarget')
			->join ('elsemployees','elsemployees.elsemployees_batchid', '=','employeetarget.elsemployees_batchid')
			->where('employeetarget.status_id','=',2)
			->where('employeetarget.employeetarget_month','=',$monthoftarget)
			->select('employeetarget.*','elsemployees.*')
			->get();
			}elseif(session()->get("role") == 3){
			$task = DB::connection('mysql')->table('employeetarget')
			->join ('elsemployees','elsemployees.elsemployees_batchid', '=','employeetarget.elsemployees_batchid')
			->where('employeetarget.status_id','=',2)
			->where('employeetarget.employeetarget_month','=',$monthoftarget)
			->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
			->select('employeetarget.*','elsemployees.*')
			->get();
			}
			// dd($task);
			return view('target.employeetargetlist',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal');
		}
	}
	public function addtargetmodal(){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$result = DB::connection('mysql')->table('elsemployees')
                ->where('elsemployees_status','=',2)
                ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name','elsemployees.elsemployees_empid')
                ->get();
            }elseif(session()->get("role") == 3){
            	$result = DB::connection('mysql')->table('elsemployees')
                ->where('elsemployees_status','=',2)
                ->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
                ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name','elsemployees.elsemployees_empid')
                ->get();
			}
			$data['result'] = $result;
			return view('target.modal.addtarget', $data);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}

	public function submitaddtarget(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 3){
			$this->validate($request, [
        	    'target'=>'required',
        	    'month'=>'required',
        	    'batchid'=>'required',
        	    'type'=>'required',
    	    ]);
			$addtarget[] = array(
				'employeetarget_target' => $request->target,
				'employeetarget_type' 	=> $request->type,
				'employeetarget_month' 	=> $request->month,
				'elsemployees_batchid' 	=> $request->batchid,
				'status_id' => 2,
				'created_by' => session()->get('id'),
				'created_at' => date('Y-m-d h:i:s')
				);
			DB::connection('mysql')->table('employeetarget')->insert($addtarget);
			if($addtarget){
					return redirect('/employeetargetlist')->with('message','Employee Target Added Successfully');;
			}
			else{
				return redirect('/employeetargetlist')->with('message','Oops! Something went wrong');;
			}
			}
			else{
				return redirect('/')->with('message','Reach HR For Access');
				}
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
	}

	public function edittargetmodal($id){
		if(session()->get("email")){
			if(session()->get("role") <= 3){
				$task = DB::connection('mysql')->table('employeetarget')
					->where('employeetarget.employeetarget_id','=',$id)
					->select('employeetarget.*')
					->first();
				return view('target.modal.edittarget',['data' => $task ]);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Edit Employee Target');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitedittarget(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 3){
				$this->validate($request, [
        	    'target'=>'required',
        	    'month'=>'required',
        	    'hdntargetid'=>'required',
        	    ]);
				$edittarget =   DB::connection('mysql')->table('employeetarget')
				->where('employeetarget.employeetarget_id', '=', $request->hdntargetid)
				->update(['employeetarget_target' => $request->target,
					'employeetarget_month' => $request->month,
					'updated_at' => date('Y-m-d h:i:s'),
					'updated_by' => session()->get('id')]);
				
				if($edittarget){
						return redirect('/employeetargetlist')->with('message','Employee Target Updated Successfully');;
							}
				else{
						return redirect('/employeetarget_id ')->with('message','Oops! Something went wrong');;
					}
					}else{
						return redirect('/')->with('message','Reach HR For Access');
						}
			}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				} 
		}
		public function deletetarget($id){
			if(session()->get("email")){
				DB::connection('mysql')->table('employeetarget')
				->where('employeetarget.employeetarget_id', '=', $id)
				->update(['status_id' => 1]);
					return redirect('/employeetargetlist')->with('message','Employee Target Successfully Deleted!');
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				} 
		}
		public function addachievedmodal($id){
		if(session()->get("email")){
			if(session()->get("role") <= 3){
				$getdata = explode("~", $id);
				$arraydata = array('batchid' => $getdata[0], 'month' => $getdata[1]);
				return view('target.modal.addachieved',['data' => $arraydata]);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Add Employee Target');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitaddachieved(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 3){
			$this->validate($request, [
        	    'batchid'=>'required',
        	    'month'=>'required',
        	    'achieved'=>'required',
    	    ]);
			$addachieved[] = array(
				'employeeachieved_achieved' => $request->achieved,
				'employeeachieved_month' => $request->month,
				'employeeachieved_date' => $request->acieveddate,
				'elsemployees_batchid' => $request->batchid,
				'status_id' => 2,
				'created_by' => session()->get('id'),
				'created_at' => date('Y-m-d h:i:s')
				);
			DB::connection('mysql')->table('employeeachieved')->insert($addachieved);
			if($addachieved){
					return redirect('/employeetargetlist')->with('message','Employee Target Achieved Added Successfully');;
			}
			else{
				return redirect('/employeetargetlist')->with('message','Oops! Something went wrong');;
			}
			}
			else{
				return redirect('/')->with('message','Reach HR For Access');
				}
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
	}
	public function employeeachievedlist($id){
		if(session()->get("email") && session()->get("role") <= 3){
			$getdata = explode("~", $id);
			$task = DB::connection('mysql')->table('employeeachieved')
			->join ('elsemployees','elsemployees.elsemployees_batchid', '=','employeeachieved.elsemployees_batchid')
			->where('employeeachieved.employeeachieved_month','=',$getdata[1])
			->where('employeeachieved.elsemployees_batchid','=',$getdata[0])
			->where('employeeachieved.status_id','=',2)
			->select('employeeachieved.*','elsemployees.*')
			->get();
			return view('target.employeeachievedlist',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal');
		}
	}
	public function editachievedmodal($id){
		if(session()->get("email")){
			if(session()->get("role") <= 3){
				$task = DB::connection('mysql')->table('employeeachieved')
					->where('employeeachieved.employeeachieved_id','=',$id)
					->select('employeeachieved.*')
					->first();
					// dd($task);
				return view('target.modal.editachieved',['data' => $task ]);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Edit Employee Target Achieved');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submiteditachieved(Request $request){
		if(session()->get("email")){
			if(session()->get("role") <= 3){
				$this->validate($request, [
        	    'achieved'=>'required',
        	    'hdnachivedid'=>'required',
        	    ]);
				$edittarget =   DB::connection('mysql')->table('employeeachieved')
				->where('employeeachieved.employeeachieved_id', '=', $request->hdnachivedid)
				->update(['employeeachieved_achieved' => $request->achieved,
					'updated_at' => date('Y-m-d h:i:s'),
					'updated_by' => session()->get('id')]);
				
				if($edittarget){
						return redirect('/employeeachievedlist/'.$request->hdnredirecturl)->with('message','Employee Target Achieved Updated Successfully');
							}
				else{
						return redirect('/employeetargetlist')->with('message','Oops! Something went wrong');;
					}
					}else{
						return redirect('/')->with('message','Reach HR For Access');
						}
			}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				} 
		}
		public function deleteachived($id){
			if(session()->get("email")){
				DB::connection('mysql')->table('employeetarget')
				->where('employeetarget.employeetarget_id', '=', $id)
				->update(['status_id' => 1]);
					return redirect('/employeetargetlist')->with('message','Employee Target Successfully Deleted!');
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				} 
		}
		public function selecttargetmonth(){
		if(session()->get("email")){
			if(session()->get("role") <= 3){
				return view('target.selecttargetmonth');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Edit Employee Target Achieved');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	// Employee Target End
}
