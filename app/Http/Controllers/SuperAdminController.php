<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SuperAdminController extends Controller
{
	
	public function adminevalist(){
		
		
		$evaluateByManager = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('department','department.DEPT_ID', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','evaluateByManager')
		->select('jobapplicant.*','department.*','hrm_login.*')
		->get();
		
		
		// dd($evaluateByManager);
		
		return view('coo.cevalutioncandidate',['data' => $evaluateByManager]);
		
	}
	
    public function incooevfor($id){
		 
		 
		$evuinterviewform = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->join('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
		->join('can_evulation','can_evulation.can_evu_job_id', '=','jobapplicant.jobapplicant_id')
		->where('jobapplicant.jobapplicant_id','=',$id)
		->select('jobapplicant.*','hrm_Department.dept_name','can_evulation.*','sub_department.*')
		->first();
		
			
		// dd($evuinterviewform);
		
		 
		return view('coo.forms.cooevaluationform',['data' => $evuinterviewform]);
	}
	
	public function coodevuform(Request $request){
		
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
					// 'can_hr_qua' =>'required',
					// 'can_hr_per_tra' =>'required',
					// 'can_hr_com_ski' =>'required',
					// 'can_hr_obtai' =>'required',
					// 'can_hr_pre' =>'required',
					// 'can_hr_verbal_ski' =>'required',
					// 'can_hr_body' =>'required',
					// 'can_hr_manner' =>'required',
					// 'can_hr_rea' =>'required',
					// 'can_hr_obtainedmarks' =>'required',
					// 'can_hr_intname' =>'required',
					// 'can_hr_intdate' =>'required|date',
					// 'can_hr_commets' =>'required',
					// 'can_hod_job_rel' =>'required',
					// 'can_hod_exp' =>'required',
					// 'can_hod_know' =>'required',
					// 'can_hod_carpro' =>'required',
					// 'can_hod_noble' =>'required',
					// 'can_hod_pot' =>'required',
					// 'can_hod_obtain' =>'required',
					// 'can_hr_cand' =>'required',
					// 'can_hod_cand' =>'required',
					'can_rec_sal' =>'required',
					'can_pro_desg' =>'required',
					'can_coo_remark' =>'required',
					'can_approval' =>'required',
					'can_app_name' =>'required',
					'can_app_date' =>'required|date',
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
					// 'can_evu_hr_qua' => $request->can_hr_qua,
					// 'can_evu_hr_per_tra' => $request->can_hr_per_tra,
					// 'can_evu_hr_com_ski' => $request->can_hr_com_ski,
					// 'can_evu_hr_obtain' => $request->can_hr_obtai,
					// 'can_evu_hr_pre' => $request->can_hr_pre,
					// 'can_evu_hr_ver_ski' => $request->can_hr_verbal_ski,
					'can_evu_ChangeBy' => session()->get("name"),
					// 'can_evu_hr_body' => $request->can_hr_body,
					// 'can_evu_hr_manner' => $request->can_hr_manner,
					// 'can_evu_hr_reson' => $request->can_hr_rea,
					// 'can_evu_hr_obtain_mark' => $request->can_hr_obtainedmarks,
					// 'can_evu_hr_int_name' => $request->can_hr_intname,
					// 'can_evu_hr_int_date' => $request->can_hr_intdate,
					// 'can_evu_hr_comments' => $request->can_hr_commets,
					// 'can_evu_hod_job_rel' => $request->can_hod_job_rel,
					// 'can_evu_hod_exp' => $request->can_hod_exp,
					// 'can_evu_hod_know' => $request->can_hod_know,
					// 'can_evu_hod_carpro' => $request->can_hod_carpro,
					// 'can_evu_hod_noble' => $request->can_hod_noble,
					// 'can_evu_hod_pot' => $request->can_hod_pot,
					// 'can_evu_hod_obtain' => $request->can_hod_obtain,
					// 'can_evu_hr_cand' => $request->can_hr_cand,
					// 'can_evu_hod_cand' => $request->can_hod_cand,
					'can_evu_rec_sal' => $request->can_rec_sal,
					'can_evu_pro_desg' => $request->can_pro_desg,
					'can_evu_coo_remark' => $request->can_coo_remark,
					'can_evu_approval' => $request->can_approval,
					'can_evu_app_name' => $request->can_app_name,
					'can_evu_app_date' => $request->can_app_date,
					'updated_at' => date('Y-m-d H:i:s'),
				]);
				
			if($request->can_approval == "2"){
				$updated = DB::connection('mysql')->table('jobapplicant')
				->where('jobapplicant_id','=',$request->can_job_id)
				->update([
				'jobapplicant_status' => "rejectBycoo",
			   'updated_at' => date('Y-m-d H:i:s'),
			   'jobapplicant_ChangeBy' => session()->get("name"),
				]);
				
			}else{
				$updated = DB::connection('mysql')->table('jobapplicant')
				->where('jobapplicant_id','=',$request->can_job_id)
				->update([
				'jobapplicant_status' => "evaluateByCoo",
			   'updated_at' => date('Y-m-d H:i:s'),
			   'jobapplicant_ChangeBy' => session()->get("name"),
				]);
				
			}
			
			
			
			 // $updated = DB::table('jobapplicant')
				// ->where('jobapplicant_id','=',$request->can_job_id)
				// ->update([
				// 'jobapplicant_status' => "evaluateByCoo",
			   // 'updated_at' => date('Y-m-d H:i:s'),
			   // 'jobapplicant_ChangeBy' => session()->get("name"),
				// ]);
				
				 
			if($update){
				return redirect('/cevalutioncandidate');
			}else{
				return redirect('/cevalutioncandidate');
			}
		
	}
	
	public function cooapprovelist(){
		
		$evaluateByCoo = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('department','department.DEPT_ID', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','evaluateByCoo')
		->select('jobapplicant.*','department.*','hrm_login.*')
		->get();
		
		
		// dd($evaluateByManager);
		
		return view('coo.approved',['data' => $evaluateByCoo]);
		
	}

	public function coodeclist(){
		
		
		$rejectByCoo = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('department','department.DEPT_ID', '=','jobapplicant.jobapplicant_department')
		->where('jobapplicant.jobapplicant_channel','=','1')
		->where('jobapplicant.jobapplicant_status','=','rejectBycoo')
		->select('jobapplicant.*','department.*','hrm_login.*')
		->get();
		
		
		// dd($evaluateByManager);
		
		return view('coo.declined',['data' => $rejectByCoo]);
		

	}
	
	public function cancoolist(){
		
		$candidatelist = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->get();
		
		// dd($all);
		
		// $allData = array("task" => $task);
	
		return view('coo.coocandidatelist' , ['data' => $candidatelist]);
	}

	public function candidate_listcoo(){

		if(session()->get("email")){
				
			$task = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();

		return view('coo.coocandidate_list',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}

	public function coocandidate_listdata(){

		$task = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
		->paginate(10);


		// dd($task);
		
		// $allData = array("task" => $task);
	
		return view('dynamicemployeedata.coocan_dynamictable',['data'=>$task]);
		
	}
	
	public function searchcoocan_list($id){

		$data = explode("~",$id);
		
		if($data[1] == 'name'){
		
			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_name','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'department'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_department','=',$data[0])
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}elseif($data[1] == 'position'){

			$task = DB::connection('mysql')->table('jobapplicant')
			->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			->where('jobapplicant.jobapplicant_postionapppliedform','like','%' . $data[0] .'%')
			->select('jobapplicant.*','hrm_Department.*','hrm_login.*')
			->paginate(10);

		}

			// dd();

				return view('dynamicemployeedata.coocan_dynamicsearch',['data'=>$task]);
				
	}
}
