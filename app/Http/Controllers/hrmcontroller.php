<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Item;
use Session;
use Image;
use Illuminate\Support\Facades\Mail;
use PDF;
use Excel;
use App\Exports\AlarmExport;
//use Maatwebsite\Excel\Facades\Excel;
use File;
use App\jobapplicant;

class hrmcontroller extends Controller
{
	
	// public function __construct(){
		
		// if(session()->get("email")){
	
			// session()->get("email")->except('hrmlogin');
		// }else{
			// return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		// }
	// }
	
    public function hrmlogin(Request $request){
    		
		// dd($request);
		
    	if($request->username != ""){
			if($request){
				$task = DB::connection('mysql')->table('elsemployees')
				->select('elsemployees.*')
				->where('elsemployees_email','=',$request->username)
				->where('elsemployees_password','=',$request->pass)
				->where('elsemployees_status','=',2)
				->first();
			
			
				if($task){
		
					session()->put([
					'id' => $task->elsemployees_empid,
					'batchid' => $task->elsemployees_batchid,
					'name' => $task->elsemployees_name,
					'role' => $task->elsemployees_roleid,
					'image' => $task->elsemployees_image,
					'email' => $task->elsemployees_email,
					'dptid' => $task->elsemployees_departid,				  

					// 'storeid' => $task->store_uid,

					]);
					$getdatetoacknowledged = date('Y-m').'-02';
					$newdate = date("Y-m", strtotime ( '-1 month' , strtotime ( $getdatetoacknowledged ) )) ;
					if (session()->get('batchid') == 1218 && date('Y-m-d') > $getdatetoacknowledged) {
					 	$acknowledgedemployee = DB::connection('mysql')->table('acknowledgedpay')
						->where('status_id','=',2)
						->where('acknowledgedpay_month','=',$newdate)
						->select('created_by')
						->get();
						$ackemployee = array();
						foreach ($acknowledgedemployee as $acknowledgedemployees) {
							$ackemployee[] = $acknowledgedemployees->created_by;
						}
						// if (!empty($acknowledgedemployees)) {
						$allemployee = DB::connection('mysql')->table('elsemployees')
						->where('elsemployees_status','=',2)
						->whereNotIn('elsemployees_batchid',$ackemployee)
						->select('elsemployees_batchid')
						->get();
						$insert =  array();
						foreach ($allemployee as $allemployees) {
						  $insert[] = array(
			                    'acknowledgedpay_status' => "Acknowledged",
			                    'acknowledgedpay_month'  => $newdate,
			                    'created_by'             => $allemployees->elsemployees_batchid,
			                    'status_id'              => 2,
			                    'created_at'             => date('Y-m-d h:i:s'),
			                );
						}
						    $created = DB::connection('mysql')->table('acknowledgedpay')->insert($insert);
						// }
					}
					// $batchid = session()->get("batchid");
						
					// // dd($batchid);
					
					// $userinfo = DB::connection('sqlsrv')->table('USERINFO')
					// ->where('USERINFO.BADGENUMBER','=',$batchid)
					// ->select('USERINFO.USERID')
					// ->first();
					
					
					// if(isset($userinfo->USERID)){
						
					// $userinfo =  $userinfo->USERID;
					
					// session()->put([
					
					// 'userinfo' => $userinfo,
					
					// ]);
					
					// }else{
						
					// 	$userinfo = null;
					
					// 	session()->put([
						
					// 	'userinfo' => $userinfo,
						
					// 	]);
						
						
					// }
					
					// $year = date("Y");
					// $month = date("m");
					
					// $userinfo = session()->get("userinfo");
					
					
					// $taskCHECK = DB::connection('sqlsrv')->table('CHECKINOUT')
					// ->where('CHECKINOUT.USERID','=',$userinfo)
					// ->where('CHECKINOUT.CHECKTYPE','!=','1')
					// ->where('CHECKINOUT.CHECKTYPE','!=','0')
					// ->whereYear('CHECKINOUT.CHECKTIME', $year)
					// ->whereMonth('CHECKINOUT.CHECKTIME', $month)
					// ->select('CHECKINOUT.*')
					// ->first();
					
					// // dd($userinfo);
					
					// if(isset($taskCHECK->CHECKTIME)){
						
					// 	$checktimefirst = $taskCHECK->CHECKTIME ;
					
					// 	session()->put([
						
					// 	'chktime' => $checktimefirst,
						
					// 	]);
						
					// }else{
						
					// 	$checktimefirst = 0;
					
					// 	session()->put([
						
					// 	'chktime' => $checktimefirst,
						
					// 	]);
						
					// }
						// dd($empEmail);
				
				
					if(session()->get("email")){
						
						$empEmail = session()->get("email");

						$empEmailMobile = explode("@",$empEmail);

						if($empEmailMobile[1] == "autelecom.net"){
														
							if($task->elsemployees_roleid == "1"){

								$addannualleave = DB::connection('mysql')->table('elsemployees')
								->select('elsemployees.*')
								->where('elsemployees_email','=',session()->get("email"))
								->first();

								// dd($addannualleave);

								$jdate = explode("-",$addannualleave->elsemployees_dofjoining);
								
								// dd($jdate);

								$mdate = date('m');
								$ydate = date('Y');
								$ddate = date('d');
								
								// dd($ydate);
								//echo "Current".$ddate;exit;

								// dd($addannualleave);
								$empdofj = $addannualleave->elsemployees_dofjoining;

								$empdofj1 = strtotime(date("Y-m-d", strtotime($empdofj)) . " +1 month");
								$empdofj1 = date("Y-m-d",$empdofj1);

								$empdofj2 = explode("-",$empdofj1);
								// dd($empdofj2);

								if($jdate[1] == $mdate && $ddate >= $jdate[2]  ){
									if($addannualleave->elsemployees_leaveyear != $ydate){
										$dataa = array(
											'elsemployees_leaveyear' => date('Y'),
											'elsemployees_annualleaves' => 12,
											'elsemployees_sickleaves' => 0
										);
										//if(session()->get("email") == 'arqum_siddiqui@mobilelinkusa.com'){
											DB::connection('mysql')->table('elsemployees')
											->where('elsemployees_email', session()->get("email"))
											->update($dataa);
										//}
									}
								}elseif ($empdofj2[1] == $mdate && $ddate <= $empdofj2[2] ) {
									if($addannualleave->elsemployees_leaveyear != $ydate){
										$dataa = array(
											'elsemployees_leaveyear' => date('Y'),
											'elsemployees_annualleaves' => 12,
											'elsemployees_sickleaves' => 0
										);
										//if(session()->get("email") == 'arqum_siddiqui@mobilelinkusa.com'){
											DB::connection('mysql')->table('elsemployees')
											->where('elsemployees_email', session()->get("email"))
											->update($dataa);
										//}
									}
								}

								if ($task->elsemployees_password == "bizz@1") {
					               return redirect('/forgetpassword'); 
					              }else{
					                
									return redirect('/adminDashboard');
							  
								}
							}elseif($task->elsemployees_roleid == "2"){

								$addannualleave = DB::connection('mysql')->table('elsemployees')
								->select('elsemployees.*')
								->where('elsemployees_email','=',session()->get("email"))
								->first();

								// dd($addannualleave);

								$jdate = explode("-",$addannualleave->elsemployees_dofjoining);
								
								// dd($jdate);

								$mdate = date('m');
								$ydate = date('Y');
								$ddate = date('d');
								
								// dd($ydate);
								//echo "Current".$ddate;exit;

								// dd($addannualleave);
								$empdofj = $addannualleave->elsemployees_dofjoining;

								$empdofj1 = strtotime(date("Y-m-d", strtotime($empdofj)) . " +1 month");
								$empdofj1 = date("Y-m-d",$empdofj1);

								$empdofj2 = explode("-",$empdofj1);
								// dd($empdofj2);

								if($jdate[1] == $mdate && $ddate >= $jdate[2]  ){
									if($addannualleave->elsemployees_leaveyear != $ydate){
										$dataa = array(
											'elsemployees_leaveyear' => date('Y'),
											'elsemployees_annualleaves' => 12,
											'elsemployees_sickleaves' => 0
										);
										//if(session()->get("email") == 'arqum_siddiqui@mobilelinkusa.com'){
											DB::connection('mysql')->table('elsemployees')
											->where('elsemployees_email', session()->get("email"))
											->update($dataa);
										//}
									}
								}elseif ($empdofj2[1] == $mdate && $ddate <= $empdofj2[2] ) {
									if($addannualleave->elsemployees_leaveyear != $ydate){
										$dataa = array(
											'elsemployees_leaveyear' => date('Y'),
											'elsemployees_annualleaves' => 12,
											'elsemployees_sickleaves' => 0
										);
										//if(session()->get("email") == 'arqum_siddiqui@mobilelinkusa.com'){
											DB::connection('mysql')->table('elsemployees')
											->where('elsemployees_email', session()->get("email"))
											->update($dataa);
										//}
									}
								}
								if ($task->elsemployees_password == "cricket9") {
					               return redirect('/forgetpassword'); 
				                }else{
					                
									return redirect('/adminDashboard');
							  
								}
							}elseif($task->elsemployees_roleid == "3"){

								$addannualleave = DB::connection('mysql')->table('elsemployees')
								->select('elsemployees.*')
								->where('elsemployees_email','=',session()->get("email"))
								->first();

								// dd($addannualleave);

								$jdate = explode("-",$addannualleave->elsemployees_dofjoining);
								
								// dd($jdate);

								$mdate = date('m');
								$ydate = date('Y');
								$ddate = date('d');
								
								// dd($ydate);
								//echo "Current".$ddate;exit;

								// dd($addannualleave);
								$empdofj = $addannualleave->elsemployees_dofjoining;

								$empdofj1 = strtotime(date("Y-m-d", strtotime($empdofj)) . " +1 month");
								$empdofj1 = date("Y-m-d",$empdofj1);

								$empdofj2 = explode("-",$empdofj1);
								// dd($empdofj2);

								if($jdate[1] == $mdate && $ddate >= $jdate[2]  ){
									if($addannualleave->elsemployees_leaveyear != $ydate){
										$dataa = array(
											'elsemployees_leaveyear' => date('Y'),
											'elsemployees_annualleaves' => 12,
											'elsemployees_sickleaves' => 0
										);
										//if(session()->get("email") == 'arqum_siddiqui@mobilelinkusa.com'){
											DB::connection('mysql')->table('elsemployees')
											->where('elsemployees_email', session()->get("email"))
											->update($dataa);
										//}
									}
								}elseif ($empdofj2[1] == $mdate && $ddate <= $empdofj2[2] ) {
									if($addannualleave->elsemployees_leaveyear != $ydate){
										$dataa = array(
											'elsemployees_leaveyear' => date('Y'),
											'elsemployees_annualleaves' => 12,
											'elsemployees_sickleaves' => 0
										);
										//if(session()->get("email") == 'arqum_siddiqui@mobilelinkusa.com'){
											DB::connection('mysql')->table('elsemployees')
											->where('elsemployees_email', session()->get("email"))
											->update($dataa);
										//}
									}
								}
								if ($task->elsemployees_password == "bizzworld@1") {
					               return redirect('/forgetpassword'); 
				              	}else{
									
									return redirect('/managerDashboard');
							  
								}

							}elseif($task->elsemployees_roleid == "4"){

								$addannualleave = DB::connection('mysql')->table('elsemployees')
								->select('elsemployees.*')
								->where('elsemployees_email','=',session()->get("email"))
								->first();
								$jdate = explode("-",$addannualleave->elsemployees_dofjoining);
								$mdate = date('m');
								$ydate = date('Y');
								$ddate = date('d');
								//echo "Current".$ddate;exit;

								// dd($addannualleave);
								$empdofj = $addannualleave->elsemployees_dofjoining;

								$empdofj1 = strtotime(date("Y-m-d", strtotime($empdofj)) . " +1 month");
								$empdofj1 = date("Y-m-d",$empdofj1);

								$empdofj2 = explode("-",$empdofj1);
								// dd($empdofj2);
								
								if($jdate[1] == $mdate && $ddate >= $jdate[2]  ){
									if($addannualleave->elsemployees_leaveyear != $ydate){
										$dataa = array(
												'elsemployees_leaveyear' => date('Y'),
												'elsemployees_annualleaves' => 12,
												'elsemployees_sickleaves' => 0
																	);

												//if(session()->get("email") == 'muhammd_mehroz@mobilelinkusa.com'){
													DB::connection('mysql')->table('elsemployees')
													->where('elsemployees_email', session()->get("email"))
													->update($dataa);
												//}
									}
								}elseif ($empdofj2[1] == $mdate && $ddate <= $empdofj2[2] ) {
									if($addannualleave->elsemployees_leaveyear != $ydate){
										$dataa = array(
											'elsemployees_leaveyear' => date('Y'),
											'elsemployees_annualleaves' => 12,
											'elsemployees_sickleaves' => 0
										);
										//if(session()->get("email") == 'arqum_siddiqui@mobilelinkusa.com'){
											DB::connection('mysql')->table('elsemployees')
											->where('elsemployees_email', session()->get("email"))
											->update($dataa);
										//}
									}
								}
								if ($task->elsemployees_password == "cricket9") {
					               return redirect('/forgetpassword'); 
				              	}else{
									return redirect('/maindashboard');
							  
								}

							}else{
								return redirect('/')->with('message', 'Kindly Reach Web Depart For Credential');
							}
						}else{
							return redirect('/')->with('message','Kindly reach IT Department Or Create Your Account.');
						}
						 
					}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
					}
							
				}else{
					return redirect('/')->with('message','Kindly Reachout HR Department for Credential');
				}
	
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}	
			
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}	
	}
	
	public function jobforminput(){
		// if(session()->get("emailocand")){
			
			// $emailadd = session()->get("emailocand");
			
			// 	$department = DB::connection('mysql')->table('hrm_Department')
			// 				// ->where('dept_id','>',8)	
			// 				->select('hrm_Department.*')
			// 				->get();
							
			// 	$designation = DB::connection('mysql')->table('designation')
			// 				->select('designation.*')
			// 				->get(); 
				
			// 	$user = DB::connection('mysql')->table('hrm_login')
			// 		->where('log_email','=',$emailadd)	
			// 		->select('hrm_login.*')
			// 		->first();
						
					// ->join('hrm_Department','hrm_Department.dept_id','=','jobapplicant.jobapplicant_department')
					// ->join('sub_department','hrm_Department.dept_id', '=','sub_department.sd_id')
					// ,'hrm_Department.*','sub_department.*'
						
				// dd($user);
				
				// $all=[
				// 	'department'=>$department,
				// 	'designation'=>$designation,
				// 	'userdata'=>$user,
				// ];

				// dd($all);
		 
				return view('pre_employment_application_form');
		// }else{
		// 	return redirect('/canLogin')->with('message','Kindly Do Login For Access');
		// }	
    }
	
    public function submitjobapplicant(Request $request){
			
		// dd($request);	
		
		// $task =  DB::table('jobapplicant')
			// ->where('jobapplicant.jobapplicant_cnic','=',$request->can_nic)
			// ->select('jobapplicant.*')
			// ->first();
			
        // dd($task);
		
		// if($task){
			
			$this->validate($request, [
					// 'input'=>'mimes:jpeg,bmp,png|max:5120',
					// 'input1'  => 'mimes:doc,docx,pdf,txt|max:2048',
					// 'can_name' =>'required',
					// 'can_nic' => 'max:13|min:13|regex:/^[1-9]\d*$/|not_in:0',
					// 'can_fathername' =>'required',
					// 'can_address' => 'required',
					// 'carlev' =>'required',
					// 'subdeptname' => 'required',
					// 'can_gender' =>'required',
					// 'experience' => 'required',
					// 'can_mobileno' =>'max:11|min:11|regex:/^[0-9]\d*$/|not_in:0',
					// 'can_age'=> 'max:2|min:2|regex:/^[1-9]\d*$/|not_in:0',
					// 'can_postionapppliedform' =>'required',
					// 'can_currentsalary' =>'regex:/^[1-9]\d*$/|not_in:0',
					// 'can_monthlyexpectedsalary' =>'regex:/^[1-9]\d*$/|not_in:0',
					// 'can_reasonofleave' =>'required',
					// 'can_negotiablesalary' =>'required',
					// 'can_remarksofleave' =>'required',
					// 'can_nightshift' =>'required',
					// 'can_periodjoining' =>'required',
					// 'can_communicationskills' =>'required',
					// 'can_placeob' =>'required',
					// 'can_email' =>'required|email',
					// 'can_religion' =>'required',
					// 'can_martialstatus' =>'required',
					// 'can_occupation' =>'required',
					// 'can_edu_cerdeg.*' =>'required',
					// 'can_edu_year.*' =>'required',
					// 'can_edu_regpri.*' =>'required',
					// 'can_edu_majsub.*' =>'required',
					// 'can_edu_divgra.*' =>'required',
					// 'can_edu_institute.*' =>'required',
					// 'can_empreport_org.*' =>'required',
					// 'can_empreport_perfrom.*' =>'required',
					// 'can_empreport_perto.*' =>'required',
					// 'can_empreport_posstart.*' =>'required',
					// 'can_empreport_last.*' =>'required',
					// 'can_empreport_grossalarystart.*' =>'regex:/^[1-9]\d*$/|not_in:0',
					// 'can_empreport_grossalarylast.*' =>'regex:/^[1-9]\d*$/|not_in:0',
					// 'can_empreport_reasoleave.*' =>'required',
				]);
				
				
				$edu_sno = "";
				
				$edu_edu_cerdeg = implode("~",$request->can_edu_cerdeg);
				
				$edu_year = implode("~",$request->can_edu_year);
				
				$edu_regpri = implode("~",$request->can_edu_regpri);
				
				$edu_majsub = implode("~",$request->can_edu_majsub);
				
				$edu_divgra = implode("~",$request->can_edu_divgra);
				
				$edu_institute = implode("~",$request->can_edu_institute);
				
				$empreport_sno = "";
				
				$empreport_org = implode("~",$request->can_empreport_org);
				
				$empreport_perfrom = implode("~",$request->can_empreport_perfrom);
				
				$empreport_perto = implode("~",$request->can_empreport_perto);
				
				$empreport_posstart = implode("~",$request->can_empreport_posstart);
				
				$empreport_last = implode("~",$request->can_empreport_last);
				
				$empreport_grossalarystart = implode("~",$request->can_empreport_grossalarystart);
				
				$empreport_grossalarylast = implode("~",$request->can_empreport_grossalarylast);
				
				$empreport_reasoleave = implode("~",$request->can_empreport_reasoleave);
			
				
				
				if($request->hasFile('input') && $request->input->isValid()){
				
					
					$number = rand(1,999);

					$numb = $number / 7 ;


					$extension = $request->input->extension();
					$filename  = $request->name."_".date('Y-m-d')."_.".$numb."_.".$extension;
					$filename = $request->input->move(public_path('img'),$filename);

						
					$img = Image::make($filename)->resize(800,800, function($constraint) {
						$constraint->aspectRatio();
					});

					$img->save($filename);

					$filename = $request->name."_".date('Y-m-d')."_.".$numb."_.".$extension;


				}else{
				
				$filename = 'no_image.jpg';    
				// dd($filename);
				// $request->thumbnail->move(public_path('/img'),$filename);
				
				}
				

				if($request->hasFile('input1') && $request->input1->isValid()){
				
					
					$number = rand(1,999);

					$numb = $number / 7 ;


					$extension = $request->input1->extension();
					$filename1  = $request->name."_".date('Y-m-d')."_.".$numb."_.".$extension;
					$filename1 = $request->input1->move(public_path('file'),$filename1);

						
					// $file = Image::make($filename1)->resize(800,800, function($constraint) {
					//     $constraint->aspectRatio();
					// });

					// $file->save($filename1);
					
					

					$filename1 = $request->name."_".date('Y-m-d')."_.".$numb."_.".$extension;


				}else{
				
				$filename1 = 'no_file.png';    
				// dd($filename1);
				// $request->thumbnail->move(public_path('/img'),$filename);
				
				}
				
				// dd($empreport_org);
				
				// $delete = DB::table('jobapplicant')
						// ->where('jobapplicant_email', '=', session()->get("emailocand"))
						// ->delete();
				
				 $insert[] = [
					 'jobapplicant_name' => $request->can_name,
					 'jobapplicant_fname' => $request->can_fathername,
					 'can_email' => $request->can_email,
					 'jobapplicant_cnic' => $request->can_nic,
				   'jobapplicant_address' => $request->can_address,
				   'jobapplicant_log_id' => $request->can_log_id,
				   'jobapplicant_password' => $request->can_pass,
				   'jobapplicant_careerlevel' => $request->carlev,
				   'jobapplicant_department' => $request->deptname,
				   'jobapplicant_gender' => $request->can_gender,
				   'jobapplicant_sub_department' => $request->subdeptname,
				   'jobapplicant_contact' => $request->can_mobileno,
				   'updated_at' => date('Y-m-d H:i:s'),
				   'created_at' => date('Y-m-d H:i:s'),
				   'jobapplicant_cv' => $filename1,
				   'jobapplicant_picture' => $filename,
				   'jobapplicant_status' => "candidatelist",
				   'jobapplicant_channel' => 1,
				   'jobapplicant_edu_cerdeg' => $edu_edu_cerdeg,
				   'jobapplicant_edu_year' => $edu_year,
				   'jobapplicant_edu_regpri' => $edu_regpri,
				   'jobapplicant_edu_majsub' => $edu_majsub,
				   'jobapplicant_edu_divgra' => $edu_divgra,
				   'jobapplicant_edu_institute' => $edu_institute,
				   'jobapplicant_empreport_org' => $empreport_org,
				   'jobapplicant_empreport_perfrom' => $empreport_perfrom,
				   'jobapplicant_empreport_perto' => $empreport_perto,
				   'jobapplicant_posstart' => $empreport_posstart,
				   'jobapplicant_last' => $empreport_last,
				   'jobapplicant_grossalarystart' => $empreport_grossalarystart,
				   'jobapplicant_grossalarylast' => $empreport_grossalarylast,
				   'jobapplicant_reasoleave' => $empreport_reasoleave,
				   'jobapplicant_addresstemporaray' => $request->can_addresstemporaray,
				   'jobapplicant_officeno' => $request->can_officeno,
				   'jobapplicant_age' => $request->can_age,
				   'jobapplicant_occupation' => $request->can_occupation,
				   'jobapplicant_currentsalary' => $request->can_currentsalary,
				   'jobapplicant_religion' => $request->can_religion,
				   'jobapplicant_martialstatus' => $request->can_martialstatus,
				   'jobapplicant_placeob' => $request->can_placeob,
				   'jobapplicant_communicationskills' => $request->can_communicationskills,
				   'jobapplicant_periodjoining' => $request->can_periodjoining,
				   'jobapplicant_nationality' => $request->can_nationality,
				   'jobapplicant_postionapppliedform' => $request->can_postionapppliedform,
				   'jobapplicant_monthlyexpectedsalary' => $request->can_monthlyexpectedsalary,
				   'jobapplicant_reasonofleave' => $request->can_reasonofleave,
				   'jobapplicant_negotiablesalary' => $request->can_negotiablesalary,
				   'jobapplicant_remarksofleave' => $request->can_remarksofleave,
				   'jobapplicant_nightshift' => $request->can_nightshift,
				   'jobapplicant_dob' => $request->can_dob,
				   'jobapplicant_reference' => $request->can_reference,
				   'jobapplicant_socialmedialinks' => $request->socialmedialinks,

				
					];
					
					
				
					// $delete = DB::table('jobapplicant')
						// ->where('jobapplicant_email', '=', $task->jobapplicant_email)
						// ->delete();
				
					$created = DB::connection('mysql')->table('jobapplicant')->insert($insert);
					   
					Mail::send('emails.done_employee',[
						'can_name' => $request->can_name,
						],
					function ($message) use ($request){
					 $message->to($request->can_email);
					 $message->cc('recruitment@arcinventador.com');
					 $message->subject('Application Received for Job');
					});
					session()->put([
					
					'can_name' => $request->can_name,
					
					]);
					return redirect('/thankyou');
				
			
		// }else{
			
				// $this->validate($request, [
					// 'input'=>'mimes:jpeg,bmp,png|max:5120',
					// 'input1'  => 'required|mimes:doc,docx,pdf,txt|max:2048',
					// 'can_name' =>'required',
					// 'can_nic' => 'required|max:13|min:13|regex:/^[1-9]\d*$/|not_in:0',
					// 'can_fathername' =>'required',
					// 'can_address' => 'required',
					// 'carlev' =>'required',
					// 'subdeptname' => 'required',
					// 'can_gender' =>'required',
					// 'experience' => 'required',
					// 'can_mobileno' =>'required|max:11|min:11|regex:/^[0-9]\d*$/|not_in:0',
					// 'can_age'=> 'required|max:2|min:2|regex:/^[1-9]\d*$/|not_in:0',
					// 'can_postionapppliedform' =>'required',
					// 'can_currentsalary' =>'required|regex:/^[1-9]\d*$/|not_in:0',
					// 'can_monthlyexpectedsalary' =>'required|regex:/^[1-9]\d*$/|not_in:0',
					// 'can_reasonofleave' =>'required',
					// 'can_negotiablesalary' =>'required',
					// 'can_remarksofleave' =>'required',
					// 'can_nightshift' =>'required',
					// 'can_periodjoining' =>'required',
					// 'can_communicationskills' =>'required',
					// 'can_placeob' =>'required',
					// 'can_email' =>'required|email',
					// 'can_religion' =>'required',
					// 'can_martialstatus' =>'required',
					// 'can_occupation' =>'required',
					// 'can_edu_cerdeg.*' =>'required',
					// 'can_edu_year.*' =>'required',
					// 'can_edu_regpri.*' =>'required',
					// 'can_edu_majsub.*' =>'required',
					// '"can_edu_divgra.*' =>'required',
					// '"can_edu_institute.*' =>'required',
					// 'can_empreport_org.*' =>'required',
					// 'can_empreport_perfrom.*' =>'required',
					// 'can_empreport_perto.*' =>'required',
					// 'can_empreport_posstart.*' =>'required',
					// 'can_empreport_last.*' =>'required',
					// 'can_empreport_grossalarystart.*' =>'required|regex:/^[1-9]\d*$/|not_in:0',
					// 'can_empreport_grossalarylast.*' =>'required|regex:/^[1-9]\d*$/|not_in:0',
					// 'can_empreport_reasoleave.*' =>'required',
				// ]);
				
				
				// $edu_sno = "";
				
				// $edu_edu_cerdeg = implode("~",$request->can_edu_cerdeg);
				
				// $edu_year = implode("~",$request->can_edu_year);
				
				// $edu_regpri = implode("~",$request->can_edu_regpri);
				
				// $edu_majsub = implode("~",$request->can_edu_majsub);
				
				// $edu_divgra = implode("~",$request->can_edu_divgra);
				
				// $edu_institute = implode("~",$request->can_edu_institute);
				
				// $empreport_sno = "";
				
				// $empreport_org = implode("~",$request->can_empreport_org);
				
				// $empreport_perfrom = implode("~",$request->can_empreport_perfrom);
				
				// $empreport_perto = implode("~",$request->can_empreport_perto);
				
				// $empreport_posstart = implode("~",$request->can_empreport_posstart);
				
				// $empreport_last = implode("~",$request->can_empreport_last);
				
				// $empreport_grossalarystart = implode("~",$request->can_empreport_grossalarystart);
				
				// $empreport_grossalarylast = implode("~",$request->can_empreport_grossalarylast);
				
				// $empreport_reasoleave = implode("~",$request->can_empreport_reasoleave);
				
				

				// if($request->hasFile('input') && $request->input->isValid()){
				
					
					// $number = rand(1,999);

					// $numb = $number / 7 ;


					// $extension = $request->input->extension();
					// $filename  = $request->name."_".date('Y-m-d')."_.".$numb."_.".$extension;
					// $filename = $request->input->move(public_path('img'),$filename);

						
					// $img = Image::make($filename)->resize(800,800, function($constraint) {
						// $constraint->aspectRatio();
					// });

					// $img->save($filename);

					// $filename = $request->name."_".date('Y-m-d')."_.".$numb."_.".$extension;


				// }else{
				
				// $filename = 'no_image.jpg';    
				// dd($filename);
			// $request->thumbnail->move(public_path('/img'),$filename);
				// }
				

				// if($request->hasFile('input1') && $request->input1->isValid()){
				
					
					// $number = rand(1,999);

					// $numb = $number / 7 ;


					// $extension = $request->input1->extension();
					// $filename1  = $request->name."_".date('Y-m-d')."_.".$numb."_.".$extension;
					// $filename1 = $request->input1->move(public_path('file'),$filename1);

						
					// $file = Image::make($filename1)->resize(800,800, function($constraint) {
					    // $constraint->aspectRatio();
					// });

					// $file->save($filename1);

					// $filename1 = $request->name."_".date('Y-m-d')."_.".$numb."_.".$extension;


				// }else{
				
				// $filename1 = 'no_file.png';    
				// dd($filename1);
			// $request->thumbnail->move(public_path('/img'),$filename);
				// }
				
					// dd($empreport_org);
			
					// $update  = DB::table('jobapplicant')
					// ->where('jobapplicant_email','=', session()->get("emailocand"))
					// ->update([
					   // 'jobapplicant_name' => $request->can_name,
					   // 'jobapplicant_fname' => $request->can_fathername,
					   // 'jobapplicant_cnic' => $request->can_nic,
					   // 'jobapplicant_address' => $request->can_address,
					   // 'jobapplicant_email' e=> sssion()->get("emailocand"),
					   // 'jobapplicant_careerlevel' => $request->carlev,
					   // 'jobapplicant_department' => $request->deptname,
					   // 'jobapplicant_gender' => $request->can_gender,
					   // 'jobapplicant_sub_department' => $request->subdeptname,
					   // 'jobapplicant_contact' => $request->can_mobileno,
					   // 'updated_at' => date('Y-m-d H:i:s'),
					   // 'created_at' => date('Y-m-d H:i:s'),
					   // 'jobapplicant_cv' => $filename1,
					   // 'jobapplicant_picture' => $filename,
					   // 'jobapplicant_status' => "candidatelist",
					   // 'jobapplicant_channel' => 1,
					   // 'jobapplicant_edu_cerdeg' => $edu_edu_cerdeg,
					   // 'jobapplicant_edu_year' => $edu_year,
					   // 'jobapplicant_edu_regpri' => $edu_regpri,
					   // 'jobapplicant_edu_majsub' => $edu_majsub,
					   // 'jobapplicant_edu_divgra' => $edu_divgra,
					   // 'jobapplicant_edu_institute' => $edu_institute,
					   // 'jobapplicant_empreport_org' => $empreport_org,
					   // 'jobapplicant_empreport_perfrom' => $empreport_perfrom,
					   // 'jobapplicant_empreport_perto' => $empreport_perto,
					   // 'jobapplicant_posstart' => $empreport_posstart,
					   // 'jobapplicant_last' => $empreport_last,
					   // 'jobapplicant_grossalarystart' => $empreport_grossalarystart,
					   // 'jobapplicant_grossalarylast' => $empreport_grossalarylast,
					   // 'jobapplicant_reasoleave' => $empreport_reasoleave,
					   // 'jobapplicant_addresstemporaray' => $request->can_addresstemporaray,
					   // 'jobapplicant_officeno' => $request->can_officeno,
					   // 'jobapplicant_age' => $request->can_age,
					   // 'jobapplicant_occupation' => $request->can_occupation,
					   // 'jobapplicant_currentsalary' => $request->can_currentsalary,
					   // 'jobapplicant_religion' => $request->can_religion,
					   // 'jobapplicant_martialstatus' => $request->can_martialstatus,
					   // 'jobapplicant_placeob' => $request->can_placeob,
					   // 'jobapplicant_communicationskills' => $request->can_communicationskills,
					   // 'jobapplicant_periodjoining' => $request->can_periodjoining,
					   // 'jobapplicant_nationality' => $request->can_nationality,
					   // 'jobapplicant_postionapppliedform' => $request->can_postionapppliedform,
					   // 'jobapplicant_monthlyexpectedsalary' => $request->can_monthlyexpectedsalary,
					   // 'jobapplicant_reasonofleave' => $request->can_reasonofleave,
					   // 'jobapplicant_negotiablesalary' => $request->can_negotiablesalary,
					   // 'jobapplicant_remarksofleave' => $request->can_remarksofleave,
					   // 'jobapplicant_nightshift' => $request->can_nightshift,
					   // 'jobapplicant_dob' => $request->can_dob,
					   // 'jobapplicant_reference' => $request->can_reference,
					   // ]);
			
			   
				// return redirect('/jobform')->with('message','Successfully Submit');
			// }
			
			   
			
	}

	public function candiaction($value){
			
		$action = explode("~", $value);
		
		// dd($action);
		
		$update  = DB::connection('mysql')->table('jobapplicant')
			->where('jobapplicant_id','=',$action[1])
			->update([
		   'updated_at' => date('Y-m-d H:i:s'),
		   'jobapplicant_status' => $action[0],
			]);
			
		if($update){
			echo json_encode(true);
		} else{
			echo json_encode(false);
		}
		
	}
	
	
	// public function candidatelistall(){
		
	// 	$screeninglist = DB::table('jobapplicant')
	// 	->join('department','department.DEPT_ID', '=','jobapplicant.jobapplicant_department')
	// 	->join('designation','designation.DESG_ID', '=','jobapplicant.jobapplicant_designation')
	// 	->where('jobapplicant.jobapplicant_status','=','candidatelist')
	// 	->select('jobapplicant.*','department.*','designation.*')
	// 	->get();
		
	// 	dd($task); 
		
	// 	// $allData = array("task" => $task);
		
	// 	return view('admin.candidatelist' , ['data' => $task]);
		
	// }
	
	public function savecandi(Request $request){
		$validate = $this->validate($request,[
            'email' =>'required',
			'password' => 'required|confirmed'
        ]);
// |unique:hrm_login,log_email|Email
		
		
			// $post = new jobapplicant;
			// $post->jobapplicant_email = $request->email;
			// $post->jobapplicant_password = $request->password;
			// $post->jobapplicant_status = "candidatelist";
			// $created = $post->save();
			
			
			$insert[] = [
			
				'log_email' => $request->email,
				'log_pass' => $request->password,
				'updated_at' => date('Y-m-d H:i:s'),
				'created_at' => date('Y-m-d H:i:s'),
			   
			   ];
			
			
			
			$created = DB::connection('mysql')->table('hrm_login')->insert($insert);
			
			// $user = DB::table('hrm_login')
					// ->where('log_email','=',$request->email)	
					// ->select('hrm_login.*')
					// ->first();
					
				// $insertme[] = [
				
					// 'jobapplicant_log_id' => $user->log_id,
					// 'updated_at' => date('Y-m-d H:i:s'),
					// 'created_at' => date('Y-m-d H:i:s'),
				   
				   // ];		
			
			// $update = DB::table('jobapplicant')->insert($insertme);
			
			if($created){
						return redirect('/canLogin');
				}else{
						return redirect('/addemployee')->with('message','Oops something wrong ');
				}
	}
	
	public function hrmcandatelogin(Request $request){
		
		// dd($request);
		
      if($request->username != ""){
			
			$task = DB::connection('mysql')->table('hrm_login')
			->select('hrm_login.*')
			->where('log_email','=',$request->username)
			->where('log_pass','=',$request->pass)
			->first();
			
		if($task){
	
  		   session()->put([
			'emailocand' => $task->log_email,
			'emailopass' => $task->log_pass,
			]);
					if(session()->get("emailocand")){
								
								return redirect('/jobform');
							
						}else{
									return redirect('/canLogin')->with('message','Kindly Register Yourself');
						}
				}else{
						return redirect('/canLogin')->with('message','Kindly Register Yourself');
				}	
		}else{
			return redirect('/canLogin')->with('message','Kindly Register Yourself');
		}	
	}
	
	public function canlopage() {
	
		session()->forget('emailocand');
		
		return view('candidatelogin');
	}
	
	public function subd($id) {
	
		$subde = DB::connection('mysql')->table('sub_department')
            ->where('sub_department.sd_dept_id', '=', $id)
            ->select('sub_department.*')
            ->get();
		
		return view('subdeptoption',compact('subde'));
	}
	
	// PDF Start
	public function generatepdf($id){
    	// dd($id);
        
		$task = DB::connection('mysql')->table('jobapplicant')
				->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
				->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
				->join('can_evulation','can_evulation.can_evu_job_id', '=','jobapplicant.jobapplicant_id')
				->where('hrm_login.log_email','=',$id)
				->select('jobapplicant.*','hrm_Department.dept_name','can_evulation.*','hrm_login.*')
				->first();
		
			// dd($task);
		
				view()->share('test');         
        // view()->share('lpmain',$allRecord);

        
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('offerletterpdf', ['datas' => $task]);
            // $pdf = PDF::loadView('getpdf',['data'=>$allRecord]);
            // download pdf
            // return $pdf->download('getpdf.pdf');
            //Live Previe
           return $pdf->stream();
        
        return view('offerletterpdf', ['datas' => $task]);
    }
	// PDF End
	
	// public function evaluteformpdf($id){
    // 	// dd($id);
        
	// 	// $task = DB::table('jobapplicant')
	// 			// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
	// 			// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
	// 			// ->join('can_evulation','can_evulation.can_evu_job_id', '=','jobapplicant.jobapplicant_id')
	// 			// ->where('hrm_login.log_email','=',$id)
	// 			// ->select('jobapplicant.*','hrm_Department.dept_name','can_evulation.*','hrm_login.*')
	// 			// ->first();
		
	// 			view()->share('test');         

        
    //         // Set extra option
    //         PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    //         // pass view file
    //         // $pdf = PDF::loadView('evalutepdfform', ['datas' => $task]);
			
	// 		$pdf = PDF::loadView('evalutepdffom');
    //         // $pdf = PDF::loadView('getpdf',['data'=>$allRecord]);
    //         // download pdf
    //         // return $pdf->download('getpdf.pdf');
    //         //Live Previe
    //        return $pdf->stream();
        
    //     // return view('evalutepdfform', ['datas' => $task]);
		
	// 	return view('evalutepdffom');
    // }


    public function evalution_formpdf($id){
    	// dd($id);
        
		$task = DB::connection('mysql')->table('jobapplicant')
		->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
		->join('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
		->join('can_evulation','can_evulation.can_evu_job_id', '=','jobapplicant.jobapplicant_id')
		->where('jobapplicant.jobapplicant_id','=',$id)
		->select('jobapplicant.*','hrm_Department.*','can_evulation.*','sub_department.*')
		->first();
		
				view()->share('test');         

        
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
           //pass view file
            $pdf = PDF::loadView('evalution_formpdf', ['datas' => $task]);
			
			// $pdf = PDF::loadView('evalution_formpdf');
            // $pdf = PDF::loadView('getpdf',['data'=>$allRecord]);
            // download pdf
            // return $pdf->download('getpdf.pdf');
            //Live Previe
           return $pdf->stream();
        
        // return view('evalutepdfform', ['datas' => $task]);
		
		return view('evalution_formpdf', ['datas' => $task]);
    }
	

	public function preemployementpdf($id){
    	// dd($id);
        
		$task = DB::connection('mysql')->table('jobapplicant')
			// ->join('hrm_login','hrm_login.log_id', '=','jobapplicant.jobapplicant_log_id')
			// ->join('hrm_Department','hrm_Department.dept_id', '=','jobapplicant.jobapplicant_department')
			// ->join('sub_department','sub_department.sd_id', '=','jobapplicant.jobapplicant_sub_department')
			->where('jobapplicant.jobapplicant_id', '=', $id)
			->first();

			// dd($task);
			
			// $department = DB::table('hrm_Department')
			// 			->select('hrm_Department.*')
			// 			->get();
			
			// $task=[
			// 		'department'=>$department,
			// 		'userdatas'=>$empdata,
			// 	];
		
				view()->share('test');         

        
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
           //pass view file
            $pdf = PDF::loadView('evalutepdffom', ['datas' => $task]);
			
			// $pdf = PDF::loadView('evalution_formpdf');
            // $pdf = PDF::loadView('getpdf',['data'=>$allRecord]);
            // download pdf
            // return $pdf->download('getpdf.pdf');
            //Live Previe
           return $pdf->stream();
        
        // return view('evalutepdfform', ['datas' => $task]);
		
		return view('evalutepdffom', ['datas' => $task]);
    }
	
	
	
	public function newpreemployeeform(){
		
			session()->put([
			  'phopo' => "muhammad.mehroz@bizzworld.com",
			  

			  // 'storeid' => $task->store_uid,

				]);
			
			
			
			$emailadd = session()->get("phopo");
			
				$department = DB::connection('mysql')->table('hrm_Department')
							->select('hrm_Department.*')
							->get();
							
				$designation = DB::connection('mysql')->table('designation')
							->select('designation.*')
							->get(); 
				
				$user = DB::connection('mysql')->table('hrm_login')
					->where('log_email','=',$emailadd)	
					->select('hrm_login.*')
					->first();
						
					// ->join('hrm_Department','hrm_Department.dept_id','=','jobapplicant.jobapplicant_department')
					// ->join('sub_department','hrm_Department.dept_id', '=','sub_department.sd_id')
					// ,'hrm_Department.*','sub_department.*'
						
				// dd($user);
				
				$all=[
					'department'=>$department,
					'designation'=>$designation,
					'userdata'=>$user,
				];

				// dd($all);
		 
				return view('newpreempform',['data'=>$all]);
		
		
	}


	public function probationemployee($id){
		if(session()->get("email")){
			

		$subde = DB::connection('mysql')->table('probationary_form')
            ->where('probationary_form.probationary_form_empbatchid', '=', $id)
            ->select('probationary_form.*')
			->first();

		$empdata = DB::connection('mysql')->table('elsemployees')
            ->join('hrm_Department','hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
            ->join('designation','designation.DESG_ID', '=', 'elsemployees.elsemployees_desgid')
            ->where('elsemployees.elsemployees_batchid' , '=' , $id)
            ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME')
			->first();
			// dd($subde);

		// dd($empdata);
		$all = ['probdata'=>$subde,'empdata'=>$empdata];
		if(isset($empdata)){
		if(session()->get("role")==3 && (session()->get("email")!="salman.khairi@bizzworld.com")){
			return view('probationary_manager_form',['data'=>$empdata]);
		}elseif(session()->get("role")==4) {
			return view('probationary_employee_form',['data'=>$all]);
		}elseif(session()->get("email")=="salman.khairi@bizzworld.com"){
			return view('probationary_coo_form',['data'=>$all]);
		}else{
			return view('probationary_hr_form',['data'=>$all]);
		}
		}else{
		return redirect('/probationaryformlist')->with('message','Batch Id Is Not Valid');
	}
	}else{
		return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
}

}

	public function submitprobationaeryform(Request $request){
		if(session()->get("email")){
		// $validate = $this->validate($request,[
        //     'email' =>'required|unique:hrm_login,log_email|Email',
		// 	'password' => 'required|confirmed'
		// ]);
			
			$this->validate($request, [
					'batchid' =>'required',
					'empname' => 'required',
					'desgid' => 'required',
					'deptid' => 'required',
					'evname' => 'required',
					'date' => 'required',
					'mreview' => 'required',
					'mreviewc' => 'required',
					'qaacow' => 'required',
					'effpro' => 'required',
					'attpun' => 'required',
					'tima' => 'required',
					'wrtm' => 'required',
					'citr' => 'required',
					'htoppbm' => 'required',
					'httppba' => 'required',
					'sepp' => 'required',
					'successcom' => 'required',
					'recommendext' => 'required',
					'empmdate' => 'required',
				]);
			
			$insert[] = [
			
				'probationary_form_empbatchid' => $request->batchid,
				'probationary_form_empname' => $request->empname,
				'probationary_form_empdesig' => $request->desgid,
				'probationary_form_empdept' => $request->deptid,
				'probationary_form_empevaluator' => $request->evname,
				'probationary_form_date' => $request->date,
				'probationary_form_empmonthsreview' => $request->mreview,
				'probationary_form_empmonthsreviewcomment' => $request->mreviewc,
				'probationary_form_empqualitywork' => $request->qaacow,
				'probationary_form_empefficiency' => $request->effpro,
				'probationary_form_empattenpunctuality' => $request->attpun,
				'probationary_form_emptimemang' => $request->tima,
				'probationary_form_empworkskills' => $request->wrtm,
				'probationary_form_empcompetency' => $request->citr,
				'probationary_form_empobjectives' => $request->htoppbm,
				'probationary_form_empnoobjectivescomment' => $request->htoppbm_ifnoc,
				'probationary_form_emptraining' => $request->httppba,
				'probationary_form_empnotrainingcomment' => $request->httppba_ifnoc,
				'probationary_form_empsummarizeperformance' => $request->sepp,
				'probationary_form_empsuccesscompleted' => $request->successcom,
				'probationary_form_empsuccesscompletedcomment' => $request->successcom_ifno,
				'probationary_form_emprecommendextended' => $request->recommendext,
				'probationary_form_empyesrecommendextendedcomment' => $request->recommendext_ifyes,
				'probationary_form_empextentiondate' => $request->extensiondate,
				'probationary_form_empnewprobcompdate' => $request->npropcd,
				'probationary_form_empmangerdate' => $request->empmdate,

				// 'updated_at' => date('Y-m-d H:i:s'),
				// 'created_at' => date('Y-m-d H:i:s'),
			   
			   ];
			
			
			$created = DB::connection('mysql')->table('probationary_form')->insert($insert);

				// dd($created);
				$empname = DB::connection('mysql')->table('elsemployees')
				->join('hrm_Department','hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
				->where('elsemployees.elsemployees_batchid','=',$request->batchid)
				->select('elsemployees.*','hrm_Department.*')
				->first();

				// dd($empname);

				$requester = $empname->elsemployees_email;

				$update  = DB::connection('mysql')->table('elsemployees')
					->where('elsemployees_batchid','=', $request->batchid)
					->update([
						'probiation_status' => "Done",
					]);
					
					
					
				if($update){
					Mail::send('emails.probationary_coorequest', [ 
					
						'datas' =>$empname,
					],
					function ($message) use ($requester) {
					$message->to('muhammad.mehroz@bizzworld.com')
					// ->cc(session()->get("email"))
					->bcc('muhammad.mehroz@bizzworld.com')
					->subject('Invitation To Submit Employee Probationary Form');
					});

					if($update){

						Mail::send('emails.probationary_emprequest', [ 
						
							'datas' =>$empname,
						],
						function ($message) use ($requester) {
						$message->to($requester)
						->bcc('muhammad.mehroz@bizzworld.com')
						->subject('Invitation To Submit Employee Probationary Form');
						});
					}
					else{
						
					}
					return redirect('/probationaryformlist')->with('message','Proceed Probiation Successfully');
				}else{
				return redirect('/probationaryform/'.$request->probationary_batchid)->with('message','something went wrong');
				}
				
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}

	}

	public function submitprobationaeryempform(Request $request){
			// dd($request);
			$this->validate($request, [
					'empnamec' =>'required',
					'empnamecom' => 'required',
				]);
		
		
			$update = DB::connection('mysql')->table('probationary_form')
					->where('probationary_form_id','=',$request->probationary_id)
					->update([
						'probationary_form_empnamep' => $request->empnamec,
						'probationary_form_empnamecomment' => $request->empnamecom,
						'probationary_form_empdate' => date('Y-m-d'),
					]);
					// dd($update);
				 
			if($update ){
				return redirect('probationaryformlist')->with('message','Success ');
			}else{
				return redirect('/probationemployee/'.$request->probationary_batchid)->with('message','Oops something wrong ');
			}
		
	}

	public function submitprobationaeryCOOform(Request $request){
		
		$empname = DB::connection('mysql')->table('elsemployees')
		->join('hrm_Department','hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
		->where('elsemployees.elsemployees_batchid','=',$request->probationary_batchid)
		->select('elsemployees.*','hrm_Department.*')
		->first();

		// dd($empname);

		$requester = $empname->elsemployees_email;
			
			$this->validate($request, [
					'cooname' =>'required',
					'coodate' => 'required',
					'coocom' => 'required',
				]);
		
		
			$update = DB::connection('mysql')->table('probationary_form')
					->where('probationary_form_id','=',$request->probationary_id)
					->update([
						'probationary_form_empcooname' => $request->cooname,
						'probationary_form_empcoodate' => $request->coodate,
						'probationary_form_empcoocomment' => $request->coocom,
						'probationary_status' => 'COOapproved',
					]);
				// dd($update);
				 
			if($update ){
				Mail::send('emails.probationary_hrrequest', [ 
					
				'datas' =>$empname,
				],
				function ($message) use ($requester) {
				$message->to('muhammad.mehroz@bizzworld.com')
				->subject('Invitation To Submit Employee Probationary Form');
				});

				return redirect('/probationaryformlist')->with('message','Proceed Probiation Successfully');
			}else{
			return redirect('/probationaryform/'.$request->probationary_batchid)->with('message','something went wrong');
			}
		
	}

	public function submitprobationaeryhrform(Request $request){
		
		$empname = DB::connection('mysql')->table('elsemployees')
		->join('hrm_Department','hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
		->where('elsemployees.elsemployees_batchid','=',$request->probationary_batchid)
		->select('elsemployees.*','hrm_Department.*')
		->first();

		$requester = $empname->elsemployees_email;
			
			$this->validate($request, [
					'cltm' =>'required',
					'empstatus' => 'required',
					'extproper' => 'required',
					'pawa' =>'required',
					'hrdate' => 'required',
					'hrpartdate' => 'required',
				]);
		
		if($request->cltm == "Pending"){
			$update  = DB::connection('mysql')->table('probationary_form')
					->where('probationary_form_id','=',$request->probationary_id)
					->update([
						'probationary_form_empconfirmationletter' => $request->cltm,
						'probationary_form_empstatus' => $request->empstatus,
						'probationary_form_empextentionprobperiod' => $request->extproper,
						'probationary_form_empconfirmationlettercomment' => $request->rifp,
						'probationary_form_emppayrolladvised' => $request->pawa,
						'probationary_form_emphrmangerdate' => $request->hrdate,
						'probationary_form_empdate1' => $request->hrpartdate,
						'probationary_status' => 'COOapproved',
					]);
		}else{

			$update  = DB::connection('mysql')->table('probationary_form')
					->where('probationary_form_id','=',$request->probationary_id)
					->update([
						'probationary_form_empconfirmationletter' => $request->cltm,
						'probationary_form_empstatus' => $request->empstatus,
						'probationary_form_empextentionprobperiod' => $request->extproper,
						'probationary_form_empconfirmationlettercomment' => $request->rifp,
						'probationary_form_emppayrolladvised' => $request->pawa,
						'probationary_form_emphrmangerdate' => $request->hrdate,
						'probationary_form_empdate1' => $request->hrpartdate,
						'probationary_status' => 'Done',
					]);
		}
				// dd($update);
			if($update ){

				if($request->cltm == "Issued"){

					Mail::send('emails.confirmation_empletter', [ 
						
					'datas' =>$empname,
					],
					function ($message) use ($requester) {
					$message->to('muhammad.mehroz@bizzworld.com')
					->subject('Employment Confirmation Letter');
					});
				}

				return redirect('probationaryformlist')->with('message','Success ');
			}else{
				return redirect('/probationemployee/'.$request->probationary_batchid)->with('message','Oops something wrong ');
			}
		
	}

		

	public function probationaryformlist(){
		if(session()->get("email")){
						
						// dd($testtttt);
						
			if(session()->get("role") ==3 && session()->get("email") != "salman.khairi@bizzworld.com" ){
				$problistemp = DB::connection('mysql')->table('elsemployees')
				->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
				->where('elsemployees.probiation_status', '=', 'Pending')
				->select('designation.DESG_NAME','hrm_Department.dept_name','elsemployees.*')
				->get();
			}
			elseif(session()->get("role") ==4){
				$problistemp = DB::connection('mysql')->table('elsemployees')
				->join('probationary_form','probationary_form.probationary_form_empbatchid', '=','elsemployees.elsemployees_batchid')
				->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
				->where('probationary_form.probationary_form_empbatchid', '=', session()->get("batchid"))
				->where('probationary_form.probationary_status', '=', 'Mapproved')
				->select('probationary_form.*','designation.DESG_NAME','hrm_Department.dept_name','elsemployees.*')
				->get();

			}
			elseif(session()->get("email") == "salman.khairi@bizzworld.com" ){
				$problistemp = DB::connection('mysql')->table('elsemployees')
				->join('probationary_form','probationary_form.probationary_form_empbatchid', '=','elsemployees.elsemployees_batchid')
				->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
				->where('probationary_form.probationary_status', '=', 'Mapproved')
				->select('probationary_form.*','designation.DESG_NAME','hrm_Department.dept_name','elsemployees.*')
				->get();

			}
			elseif(session()->get("role") == 2){
				$problistemp = DB::connection('mysql')->table('elsemployees')
				->join('probationary_form','probationary_form.probationary_form_empbatchid', '=','elsemployees.elsemployees_batchid')
				->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
				->where('probationary_form.probationary_status', '=', 'COOapproved')
				->select('probationary_form.*','designation.DESG_NAME','hrm_Department.dept_name','elsemployees.*')
				->get();
				// dd($problistemp);
			}
			else{
				$problistemp = DB::connection('mysql')->table('elsemployees')
				->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
				->where('elsemployees.probiation_status', '=', 'New')
				->select('designation.DESG_NAME','hrm_Department.dept_name','elsemployees.*')
				->get();
				// dd($problistemp);
			}
					// dd($problistemp);
						
				return view('probationaryformlist', ['data'=>$problistemp]);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}

	}


	public function probationaryreport(){
		if(session()->get("email")){
			if(session()->get("role") ==3 && session()->get("email") != "salman.khairi@bizzworld.com" ){
				$problistemp = DB::connection('mysql')->table('elsemployees')
				->join('probationary_form','probationary_form.probationary_form_empbatchid', '=','elsemployees.elsemployees_batchid')
				->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
				->where('probationary_form.probationary_status', '=', 'Done')
				->where('probationary_form.probationary_form_empconfirmationletter', '=', 'Issued')
				->where('elsemployees.elsemployees_reportingto', '=', session()->get("id"))
				->select('designation.DESG_NAME','hrm_Department.dept_name','elsemployees.*')
				->get();
			}
			elseif(session()->get("email") == "salman.khairi@bizzworld.com" || session()->get("role") <= 2 ){
				$problistemp = DB::connection('mysql')->table('elsemployees')
				->join('probationary_form','probationary_form.probationary_form_empbatchid', '=','elsemployees.elsemployees_batchid')
				->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
				->where('probationary_form.probationary_status', '=', 'Done')
				->where('probationary_form.probationary_form_empconfirmationletter', '=', 'Issued')
				->select('probationary_form.*','designation.DESG_NAME','hrm_Department.dept_name','elsemployees.*')
				->get();

			}
					// dd($problistemp);
			
			return view('probationary_report', ['data'=>$problistemp]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}

	}


	public function probationaryreportview($id){
		if(session()->get("email")){
			

		$subde = DB::connection('mysql')->table('probationary_form')
            ->where('probationary_form.probationary_form_empbatchid', '=', $id)
			->where('probationary_form.probationary_status', '=', 'Done')
            ->select('probationary_form.*')
			->first();

		$empdata = DB::connection('mysql')->table('elsemployees')
            ->join('hrm_Department','hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
            ->join('designation','designation.DESG_ID', '=', 'elsemployees.elsemployees_desgid')
            ->where('elsemployees.elsemployees_batchid' , '=' , $id)
            ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME')
			->first();
			// dd($subde);

			// dd($empdata);
			$all = ['probdata'=>$subde,'empdata'=>$empdata];

			return view('probationary_reportview',['data'=>$all]);
				
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}

	}



	public function probationaryemppdf($id){
		if(session()->get("email")){
	    	// dd($id);
	        
			$subde = DB::connection('mysql')->table('probationary_form')
	            ->where('probationary_form.probationary_form_empbatchid', '=', $id)
				->where('probationary_form.probationary_status', '=', 'Done')
	            ->select('probationary_form.*')
				->first();

			$empdata = DB::connection('mysql')->table('elsemployees')
	            ->join('hrm_Department','hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
	            ->join('designation','designation.DESG_ID', '=', 'elsemployees.elsemployees_desgid')
	            ->where('elsemployees.elsemployees_batchid' , '=' , $id)
	            ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME')
				->first();
				// dd($subde);

				// dd($empdata);
			$all = ['probdata'=>$subde,'empdata'=>$empdata];
				// dd($all);
			
					view()->share('test');         
	        // view()->share('lpmain',$allRecord);

	        
	            // Set extra option
	            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
	            // pass view file
	            $pdf = PDF::loadView('probationaryemppdf', ['datas' => $all]);
	            // $pdf = PDF::loadView('getpdf',['data'=>$allRecord]);
	            // download pdf
	            // return $pdf->download('getpdf.pdf');
	            //Live Previe
	           return $pdf->stream();
        
        	return view('probationaryemppdf', ['datas' => $all]);
    	}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
    }


    public function probation_manageremail($id){
		if(session()->get("email")){
			
			if(session()->get("role")==1){

				$empname = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_batchid','=',$id)
				->select('elsemployees.elsemployees_name')
				->first();

				$reportto = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_batchid','=',$id)
				->select('elsemployees.elsemployees_reportingto')
				->first();
				
				
				$reportemail = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_empid','=',$reportto->elsemployees_reportingto)
				->select('elsemployees.elsemployees_email')
				->first();
				
				
				$reportemaild = $reportemail->elsemployees_email;

				$update  = DB::connection('mysql')->table('elsemployees')
					->where('elsemployees_batchid','=',$id)
					->update([
						'probiation_status' => "Pending",
					]);
				
				 
				
				if($update){
					Mail::send('emails.probationary_request', [ 
					
						'datas' =>$empname,
					],
					function ($message) use ($reportemaild) {
					$message->to($reportemaild)
					->bcc('muhammad.mehroz@bizzworld.com')
					->subject('Invitation To Submit Employee Probationary Form');
					});
					return redirect('/probationaryformlist')->with('message','Send Probiation Successfully');
					}else{
					return redirect('/probationaryformlist')->with('message','something went wrong');
					}
			}else{
			return redirect('/')->with('message','something went wrong');
			}

		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}



	public function confirmationletterpdf($id){
    	// dd($id);

		$subde = DB::connection('mysql')->table('probationary_form')
	            ->where('probationary_form.probationary_form_empbatchid', '=', $id)
				->where('probationary_form.probationary_status', '=', 'Done')
	            ->select('probationary_form.*')
				->first();

		$empdata = DB::connection('mysql')->table('elsemployees')
            ->join('hrm_Department','hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
            ->join('designation','designation.DESG_ID', '=', 'elsemployees.elsemployees_desgid')
            ->where('elsemployees.elsemployees_batchid' , '=' , $id)
            ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME')
			->first();
			// dd($subde);

			// dd($empdata);
		$all = ['probdata'=>$subde,'empdata'=>$empdata];
		
			// dd($task);
		
				view()->share('test');         
        // view()->share('lpmain',$allRecord);

        
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('confirmationletterpdf', ['datas' => $all]);
            // $pdf = PDF::loadView('getpdf',['data'=>$allRecord]);
            // download pdf
            // return $pdf->download('getpdf.pdf');
            //Live Previe
           return $pdf->stream();
        
        return view('confirmationletterpdf', ['datas' => $all]);
    }


    public function employeetimings(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
					$task =  DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('elsemployeestiming','elsemployeestiming.emptime_batchid', '=','elsemployees.elsemployees_batchid')
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','elsemployeestiming.*')
					->get();
					
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('elsemployeestiming','elsemployeestiming.emptime_batchid', '=','elsemployees.elsemployees_batchid')
					->where('elsemployees.elsemployees_status','=',2)
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->select('elsemployees.*','hrm_Department.dept_name','elsemployeestiming.*')
					->get();
				
				}
						return view('payroll.employeetimings',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}

	public function addemployeetimingsmodal(){
		if(session()->get("email")){
			
			if(session()->get("role") <= 2){
				
			}else{
			
			}
					return view('modal.addemployeetimings');
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}

	}

	public function addemployeetimings(Request $request){
		$arrivaltime = date('h:i:sa', strtotime($request->emptime_arrival));
		$departuretime = date('h:i:sa', strtotime($request->emptime_departure));
		$startdate = date('Y-m-d', strtotime($request->emptime_sdate));
		$enddate = date('Y-m-d', strtotime($request->emptime_edate));
		if(session()->get("email")){
			if(session()->get("role") <= 3){
				$empid =  DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_batchid','=',$request->emptime_batchid)
				->select('elsemployees.elsemployees_empid')
				->first();
				$addemptime[] = array(
					'emptime_batchid' => $request->emptime_batchid,
					'emptime_empid' => $empid->elsemployees_empid,
					'emptime_start' => $arrivaltime,
					'emptime_end' => $departuretime,
					'emptime_startdate' => $startdate,
					'emptime_enddate' => $enddate,
					'emptime_updateby' => session()->get('name')
					);
				DB::connection('mysql')->table('elsemployeestiming')->insert($addemptime);
				if($addemptime){
					echo json_encode(true);
				}
				else{
					echo json_encode(false);
				}					
			}
			else{
				return redirect('/')->with('message','You dont Have Access To Performe This Action');
			}
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function editemployeetiming($id){
        $task = DB::connection('mysql')->table('elsemployeestiming')
          ->where('emptime_id' , '=' ,$id)
          ->select('*')
          ->first();
        return view('modal.editemployeetiming ',compact('task'));
    }
    public function submiteditemployeetiming(Request $request){
		$startdate = date('Y-m-d', strtotime($request->emptime_sdate));
		$enddate = date('Y-m-d', strtotime($request->emptime_edate));
		if(session()->get("email")){
			if(session()->get("role") <= 3){
				$update = array(
					'emptime_start' => $request->emptime_arrival,
					'emptime_end' => $request->emptime_departure,
					'emptime_startdate' => $startdate,
					'emptime_enddate' => $enddate,
					'emptime_updateby' => session()->get('name')
					);
					$save = DB::connection('mysql')->table('elsemployeestiming')
		            ->where('emptime_id',$request->hdnemptime_id)
		            ->update($update);
				if($save){
					echo json_encode(true);
				}
				else{
					echo json_encode(false);
				}					
			}
			else{
				return redirect('/')->with('message','You dont Have Access To Performe This Action');
			}
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
}
