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
use \App\holidays;
use Session;
use Image;
use Config;
use App\elsemployee;
use App\elsleaverequest;
use Illuminate\Support\Facades\Mail;
use Excel;
use App\Exports\EmployeesExport;
use DateTime;

class elscontroller extends Controller
{
    public function login(Request $request){
		if($request->username != ""){
			if($request){
			$task = DB::connection('mysql')->table('elsemployees')
			->select('elsemployees.*')
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees_email','=',$request->username)
			->where('elsemployees_password','=',$request->pass)
			->first();
			// dd($task);
				if($task){
			
		  		   session()->put([
				  'id' => $task->elsemployees_empid,
				  'batchid' => $task->elsemployees_batchid,
				  'name' => $task->elsemployees_name,
				  'role' => $task->elsemployees_roleid,
				  'image' => $task->elsemployees_image,
				  'email' => $task->elsemployees_email,
				  // 'storeid' => $task->store_uid,
					]);
		  		   	DB::table('elsemployees')
					->where('elsemployees_empid','=',$task->elsemployees_empid)
					->update([
					'user_loginstatus' 		=> "Online",
					]); 
					if(session()->get("email")){
						$empEmail = session()->get("email");
						$empEmailMobile = explode("@",$empEmail);
						if($empEmailMobile[1] == "autelecom.net"){
							if($task){
								$addannualleave = DB::connection('mysql')->table('elsemployees')
								->select('elsemployees.*')
								->where('elsemployees_email','=',session()->get("email"))
								->first();
								$jdate = explode("-",$addannualleave->elsemployees_dofjoining);
								$mdate = date('m');
								$ydate = date('Y');
								$ddate = date('d');
								//echo "Current".$ddate;exit;
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
								}
								if ($task->elsemployees_password == "bizz@1") {
					               return redirect('/forgetpassword'); 
					              }else{

					                return redirect('dashboard');
							  
								}
							}else{
								return redirect('/')->with('message', 'Kindly Reach Web Depart For Credential');
								}
						}else{
							return redirect('/')->with('message','Kindly reach IT Department Or Creat Gmail Account.');
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
	
	
	public function dashboard(){
		if(session()->get("email")){
		$task = DB::connection('mysql')->table('elsemployees')
		->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
		->where('elsemployees.elsemployees_status','=',2)
		->where('elsemployees_email','=',session()->get("email"))
		->select('elsemployees.*','role.*')
		->first();
		return view('dashboard',['data'=>$task]);
	}
	else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}	
	}
	
	
	public function getimage(){
		
		if(session()->get("email")){
			
			return view('modal.getimage');
		
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}
	
	
	public function loadimage(Request $request){
		
		$this->validate($request, [
        	'input'=>'mimes:jpeg,bmp,png|max:20024'
        ]);
				
		if($request->hasFile('input') && $request->input->isValid()){
                
                    
                    $number = rand(1,999);

                    $numb = $number / 7 ;


                    $extension = $request->input->extension();
                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
                    $filename = $request->input->move(public_path('img'),$filename);

                        
                    $img = Image::make($filename)->resize(800,800, function($constraint) {
                        $constraint->aspectRatio();
                    });

                    $img->save($filename);

                    $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;


                }else{
                
                $filename = 'no_image.jpg';    
                //dd($filename);
            // $request->thumbnail->move(public_path('/img'),$filename);
                }
		
			 $post = elsemployee::on('mysql')->findOrFail($request->editreqid);

				$post->elsemployees_image = $filename ;
				$post->elsemployees_changeby = session()->get("name") ;
				$post->save();

				$created = $post->save();

		if($created){
			if(session()->get('role') == 2){
				return redirect('/adminDashboard')->with('message','Your image upload Successfully'); 
			}
			elseif(session()->get('role') == 3){
				return redirect('/managerDashboard')->with('message','Your image upload Successfully'); 
			}
			else{
				return redirect('/maindashboard')->with('message','Your image upload Successfully'); 
			}
			
          }else{
              return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
          } 
	}
	
	// cover image 09/April/2021 start
	public function getcover(){
		
		if(session()->get("email")){
			
			return view('modal.getcover');
		
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}
	
	
	public function loadcover(Request $request){
		
		$this->validate($request, [
                    'input'=>'mimes:jpeg,bmp,png|max:20024|required'
                ]);
				
		if($request->hasFile('input') && $request->input->isValid()){
                
                    
                    $number = rand(1,999);

                    $numb = $number / 7 ;


                    $extension = $request->input->extension();
                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
                    $filename = $request->input->move(public_path('coverimage'),$filename);

                        
                    $img = Image::make($filename)->resize(800,800, function($constraint) {
                        $constraint->aspectRatio();
                    });

                    $img->save($filename);

                    $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;


                }else{
                
                $filename = 'no_image.jpg';    
                //dd($filename);
            // $request->thumbnail->move(public_path('/img'),$filename);
                }
		
			 $post = elsemployee::on('mysql')->findOrFail($request->editreqid);

				$post->elsemployees_coverimage = $filename ;
				$post->elsemployees_changeby = session()->get("name") ;
				$post->save();

				$created = $post->save();

		if($created){
			if(session()->get('role') == 2){
				return redirect('/adminDashboard')->with('message','Cover Image Upload Successfully'); 
			}
			elseif(session()->get('role') == 3){
				return redirect('/managerDashboard')->with('message','Cover Image Upload Successfully'); 
			}
			else{
				return redirect('/maindashboard')->with('message','Cover Image Upload Successfully'); 
			}
			
          }else{
              return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
          } 
	}
	// cover image 09/April/2021 end
	
	public function createemployee(){
		
		if(session()->get("email")){
		
		$desg = DB::connection('mysql')->table('designation')
		->select('designation.*')
		->get();
				
		$depart = DB::connection('mysql')->table('hrm_Department')
		->select('hrm_Department.*')
		->get();
		
		$manager = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_roleid','=','3')
		->where('elsemployees.elsemployees_status','=',2)
		->select('elsemployees.*')
		->get();
		
		
		$role = DB::connection('mysql')->table('role')
		->orderBy('role.roleid', 'desc')
		->select('role.*')
		->get();
		
		$getcar = DB::connection('mysql')->table('car')
		->where('status_id','=',2)
		->select('car_id','car_name')
		->get();
		
		$allData = array("depart" => $depart, "desg" => $desg, "role" => $role, "manager" => $manager, 'car' => $getcar);
		
		// dd($allData);
		
			return view('addemployee' , ['data' => $allData]);
		
		
				}
			else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}	
			
	}
	
	
	public function empsave(Request $request){

		$empBatchID = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_batchid','=',$request->emp_batch)
		->select('elsemployees.*')
		->first();

		// dd($empBatchID->elsemployees_batchid);

		$empEmail = DB::connection('mysql')->table('elsemployees')
		->where('elsemployees.elsemployees_email','=',$request->emp_com_email)
		->select('elsemployees.*')
		->first();

		// dd($empEmail);

		if($empBatchID == "" && $empEmail == "") {

			// $validate = $this->validate($request, [
			// 	'emp_batch' => 'required|unique:mysql.elsemployees,elsemployees_batchid|Numeric',
			// 	'emp_com_email' => 'required|unique:mysql.elsemployees,elsemployees_email|String',
			// 									// unique:connection.tablename,tablecolumn
			// 	// 'emp_com_email' => 'required|unique:elsemployee,elsemployees_email|',
			// ]);
			
			// dd($validate);
			
					// dd($request);
			$post = new elsemployee;
			$post->setConnection('mysql');
			$post->elsemployees_type = $request->emp_type ; 
			$post->elsemployees_ext = $request->ext ; 
			$post->elsemployees_batchid = $request->emp_batch ; 
			$post->elsemployees_name = $request->emp_name ;
			$post->elsemployees_fname = $request->emp_fname;
			$post->elsemployees_image = "no_image.jpg";
			$post->elsemployees_cnic = $request->emp_cnic ;
			$post->elsemployees_cno = $request->emp_contactno ;
			$post->elsemployees_email = $request->emp_com_email ;
			$post->elsemployees_password = "autelecom@2023" ;
			$post->elsemployees_dofbirth = $request->emp_dob ;
			$post->elsemployees_dofjoining = $request->emp_doj ;
			$post->elsemployees_address = $request->emp_address ;
			$post->elsemployees_departid = $request->emp_dept ;
			$post->elsemployees_desgid = $request->emp_desg ;
			$post->elsemployees_reportingto = $request->emp_report ;
			$post->elsemployees_roleid = $request->emp_role ;
			$post->elsemployees_status = $request->emp_status ;
			$post->elsemployees_annualleaves = $request->emp_annual_leave ;
			$post->elsemployees_sickleaves = $request->emp_sick_leave ;
			$post->elsemployees_leaveyear =  date('Y');
			$post->elsemployees_dofpayroll =  $request->payrolldate;
			$post->account_title = $request->emp_acctitle ;
			$post->account_no = $request->emp_accno ;
			$post->iban_no = $request->emp_ibanno ;
			$post->bank_branch = $request->emp_bbranch ;
			$post->bank_name = $request->emp_bname ;
			$post->elsemployees_emailaddress = $request->emailaddress ;
			$post->elsemployees_emailpassword = $request->emailpassword ;
			$post->elsemployees_emailhost = $request->emailhost ;
			$post->elsemployees_careligibility = $request->elsemployees_careligibility ;
			$post->elsemployees_assigncaroramount = $request->elsemployees_assigncaroramount ;
			$post->car_id = $request->car_id ;
			$post->elsemployees_caramount = $request->elsemployees_caramount ;
			$post->elsemployees_changeby = session()->get("name") ;
			$post->elsemployees_addby = session()->get("name") ;
			$post->created_at = date('Y-m-d H:i:s');
			$post->save();

			// dd($post);

			$created = $post->save();

			if ($request->elsemployees_careligibility == "Yes") {
				$insert = array(
                'carassign_month' => date('Y-m'),
                'carassign_to' => $request->emp_batch,
                'car_id' => $request->car_id,
                'status_id'=> 2,
                'created_by'=>  session()->get("batchid"),
                'created_at'=> date('Y-m-d h:i:s'),
                );
            	DB::connection('mysql')->table('carassign')->insert($insert);
			}

			$insert[] = array(
                'Name' => $request->emp_name,
                'EMP_BADGE_ID' => $request->emp_batch,
                'BankAccountNo' => $request->emp_accno,
                'Salary'=> $request->salary,
                'attendance_allowance'=> $request->attendance_allowance,
                'punctuality_allowance'=> $request->punctuality_allowance,
                'transport_allowance'=> $request->transport_allowance,
                'fuel_allowance'=> $request->fuel_allowance,
                'fund'=> $request->fund,
                'fund_month'=> date('m'),
                'fund_year'=> date('Y'),
                'Date'=> date('Y-m-d'),	
                'Salary_Comment'=> "",
            );
            $created = DB::connection('mysql')->table('payrollsalaries')->insert($insert);
            $empid =  DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_batchid','=',$request->emp_batch)
				->select('elsemployees.elsemployees_empid')
				->first();
			$arrivaltime = date('h:i:sa', strtotime($request->checkintime));
			$departuretime = date('h:i:sa', strtotime($request->checkouttime));
			$addemptime[] = array(
					'emptime_batchid' => $request->emp_batch,
					'emptime_empid' => $empid->elsemployees_empid,
					'emptime_start' => $arrivaltime,
					'emptime_end' => $departuretime,
					'emptime_startdate' => $request->startdate,
					'emptime_enddate' => $request->enddate,
					'emptime_updateby' => session()->get('name')
					);
			DB::connection('mysql')->table('elsemployeestiming')->insert($addemptime);
			
			if($created){
				$empemaild = $request->emp_com_email;
				// Mail::send('email.credentials', [ 
				
				// 	'datas' =>$request,
				// ],
				// function ($message) use ($empemaild) {
				// $message->to($empemaild)
				// ->cc('hr@bizzworld.com')
				// ->bcc(session()->get("email"))
				// ->bcc('muhammad.mehroz@bizzworld.com')
				// ->subject('Employee Credentials Assigned By: ' . 'Bizz World Web Team');
				// });
			
				return redirect('/employeelist')->with('message','Employee Add Successfully ');
			}else{
				return redirect('/addemployeenos')->with('message','Oops something wrong ');
			}


		}

		elseif($empBatchID != "" && $empEmail != ""){
			return redirect('/addemployeenos')->with("message","Your Requested Batch ID ($request->emp_batch), and Email ID ($request->emp_com_email) Have Already Access");
		}

		elseif($empEmail != "" && $empBatchID == ""){
			return redirect('/addemployeenos')->with("message","Your Requested Email ID ($request->emp_com_email) Have Already Access");
		}

		else{
			return redirect('/addemployeenos')->with("message","Your Requested Batch ID ($request->emp_batch) Have Already Access");
		}
				
	}
	
	
	public function employeelist(){
			if(session()->get("email")){
				
				if(session()->get("role") == 1 || session()->get("batchid") == 1406){
					
					$task =  DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					
					// dd($task);
					
				}
				elseif(session()->get("role") == 2){
					
					$task =  DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
				
				}
				$depart = DB::connection('mysql')->table('hrm_Department')
				->select('hrm_Department.*')
				->get();
						return view('employeelist',['data'=>$task, 'department'=>$depart]);
			}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}

	public function notactiveemployeelist(){
			if(session()->get("email")){
				
				if(session()->get("role") == 1){
					
					$task =  DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',1)
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					
					// dd($task);
					
				}
				elseif(session()->get("role") == 2){
					
					$task =  DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',1)
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',1)
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
				
				}
				$depart = DB::connection('mysql')->table('hrm_Department')
				->select('hrm_Department.*')
				->get();
						return view('notactiveemployeelist',['data'=>$task, 'department'=>$depart]);
			}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}

	public function deptemp(Request $request){
			if(session()->get("email")){
				
				if(session()->get("role") == 1){
					
					$task =  DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->where('elsemployees.elsemployees_departid','=',$request->emp_dept)
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					
					// dd($task);
					
				}
				elseif(session()->get("role") == 2){
					
					$task =  DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->where('elsemployees.elsemployees_departid','=',$request->emp_dept)
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->where('elsemployees.elsemployees_departid','=',$request->emp_dept)
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
				
				}
				$depart = DB::connection('mysql')->table('hrm_Department')
				->select('hrm_Department.*')
				->get();
						return view('employeelist',['data'=>$task, 'department'=>$depart]);
			}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}


	public function employee_list(){
			
			// dd(session()->get("email"));
			if(session()->get("email")){
				
					$task = DB::connection('mysql')->table('hrm_Department')
					->select('hrm_Department.*')
					->get();
				
						return view('employee_list',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
	
	public function searchemployee_list($id){
		$data = explode("~",$id);
		if(session()->get("email")){
				if($data[1] == 'name'){
				
					// if(session()->get("role") <= 2){
						
						
						
						$task = DB::connection('mysql')->table('elsemployees')
						->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
						->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
						->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
						->where('elsemployees.elsemployees_status','=',2)
						->where('elsemployees.elsemployees_name','like','%' . $data[0] .'%')
						->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
						->paginate(20);
						// dd($task);
						
					// }else{
					
					// $task = DB::connection('mysql')->table('elsemployees')
					// 	->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					// 	->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					// 	->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					// 	->where('elsemployees.elsemployees_status','=',2)
					// 	->where('elsemployees.elsemployees_name','like','%' . $data[0] .'%')
					// 	->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					// 	->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					// 	->paginate(20);
					
					// }
				}elseif($data[1] == 'department'){
					
					// if(session()->get("role") <= 2){
						
						
						
						$task = DB::connection('mysql')->table('elsemployees')
						->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
						->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
						->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
						->where('elsemployees.elsemployees_status','=',2)
						->where('elsemployees.elsemployees_departid','=',$data[0])
						->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
						->paginate(20);
						// dd($task);
						
					// }else{
					
					// $task = DB::connection('mysql')->table('elsemployees')
					// 	->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					// 	->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					// 	->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					// 	->where('elsemployees.elsemployees_status','=',2)
					// 	->where('elsemployees.elsemployees_name','=', $data[0] )
					// 	->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					// 	->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					// 	->paginate(20);
					
					// }
					
				}elseif($data[1] == 'batch'){
					
					// if(session()->get("role") <= 2){
						
						
						
						$task = DB::connection('mysql')->table('elsemployees')
						->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
						->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
						->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
						->where('elsemployees.elsemployees_status','=',2)
						->where('elsemployees.elsemployees_batchid','like','%' . $data[0] .'%')
						->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
						->paginate(20);
						// dd($task);
						
					// }else{
					
					// $task = DB::connection('mysql')->table('elsemployees')
					// 	->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					// 	->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					// 	->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					// 	->where('elsemployees.elsemployees_status','=',2)
					// 	->where('elsemployees.elsemployees_batchid','like','%' . $data[0] .'%')
					// 	->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					// 	->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					// 	->paginate(20);
					
					// }
					
				}
					// dd($task);
					
						return view('dynamicemployeedata.dynamicsearch',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
	
	public function employee_listdata(){
		
		if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
					$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->paginate(30);
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					// ->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->orderBy('role.roleid', 'DESC')
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->paginate(30);
				
				}
				// dd($task);
						return view('dynamicemployeedata.dynamictable',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
		
		
	}

	//attendanceview
	public function attendance(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
					$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
				
				}
						return view('attendance.attendance',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
	public function viewattendnce(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
					$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
				
				}
						return view('viewattendnce',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
	
	public function submitselectattendance(Request $request){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
					$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
				
				}
				$sendyear = $request->attendanceyear;
				$setmonth = $request->attendancemonth;
					$allData = array("maindata" => $task, "sendyear" => $sendyear, "sendmonth" => $setmonth);
						return view('attendancereport',['data'=>$allData]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
	public	function viewattendancedw($t,$f){
			if (session()->get("email")) {
					if(session()->get("role") <= 2){
					
				$task = DB::connection('mysql')->table('attendance')
				->join ('elsemployees','elsemployees.elsemployees_batchid', '=','attendance.elsemployees_empid')
				->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->whereBetween ('attendance_date', [$t, $f])
				->where('elsemployees.elsemployees_status','=',2)
				->select('attendance.*','elsemployees.*','hrm_Department.dept_name')
				->get();
					
				}else{
				
				$task = DB::connection('mysql')->table('attendance')
				->join ('elsemployees','elsemployees.elsemployees_batchid', '=','attendance.elsemployees_empid')
				->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
				->whereBetween ('attendance_date', [$t, $f])
				->where('elsemployees.elsemployees_status','=',2)
				->select('attendance.*','elsemployees.*','hrm_Department.dept_name')
				->get();
				
				}
		return view('viewattendnce',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
	public	function viewempattendancedw($t,$f){
			if (session()->get("email")) {
					if(session()->get("role") <= 2){
					
				$task = DB::connection('mysql')->table('attendance')
				->join ('elsemployees','elsemployees.elsemployees_batchid', '=','attendance.elsemployees_empid')
				->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->whereBetween ('attendance_date', [$t, $f])
				->where('elsemployees.elsemployees_status','=',2)
				->select('attendance.*','elsemployees.*','hrm_Department.dept_name')
				->get();
					
				}else{
				
				$task = DB::connection('mysql')->table('attendance')
				->join ('elsemployees','elsemployees.elsemployees_batchid', '=','attendance.elsemployees_empid')
				->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
				->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
				->whereBetween ('attendance_date', [$t, $f])
				->where('elsemployees.elsemployees_status','=',2)
				->select('attendance.*','elsemployees.*','hrm_Department.dept_name')
				->get();
				
				}
		return view('viewempattendnce',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
	//attendanceview
	//attendace update
	public function submitupdateattendance($value,$d) {
        // dd($d);
        if (session()->get("email")){
        $attendance = explode("~", $value);
         $dated = explode("-",$d);
        // dd($requeststatus);
         	$uniquedate = DB::connection('mysql')->table('attendance')
				->where('attendance.elsemployees_empid','=',$attendance [1])
				->select('attendance.attendance_date')
				->get();
					$udate = array();

				  foreach ($uniquedate as $tabb) {

                  
                   $udate = $tabb->attendance_date;
               }

         if($d !=$udate){
         	// dd("yes");
         		DB::connection('mysql')->table('attendance')->insert([
			    'attendance_date' => $d,
			    'attendance_month' =>  $dated[1],
			    'attendance_mark' => $attendance [0],
			    'elsemployees_empid' =>  $attendance [1],
			    'attendance_submitby' => session()->get('name')
			]);

         	}else
            { 
            	
                        return redirect('/attendance')->with('message','Attendance Already Marked');
            }
           // return redirect('/viewusers');
     }
         else
            {
                        return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }
    }
	//End attendace update

	//view Attendance
	public function viewempattendance($id){
	if(session()->get("email")){
				
			
				$task = DB::connection('mysql')->table('attendance')
					->join ('elsemployees','elsemployees_batchid', '=','attendance.elsemployees_empid')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->where('attendance.elsemployees_empid','=',$id)
					->where('elsemployees.elsemployees_status','=',2)
					->select('attendance.*','hrm_Department.dept_name','elsemployees.elsemployees_reportingto','elsemployees.elsemployees_name','elsemployees.elsemployees_fname')
					->get();

					// $task = DB::table('elsemployees')
     //             ->join ('department','department.DEPT_ID', '=','elsemployees.elsemployees_departid')
     //             ->join ('attendance','elsemployees_empid', '=','elsemployees.elsemployees_batchid')
     //             ->where('elsemployees.elsemployees_batchid','=',$id)
     //             ->select('elsemployees.*','attendance.attendance_date','attendance.attendance_month','attendance.attendance_mark','department.DEPT_NAME')
     //             ->get();
		
			return view('viewempattendance',['data' => $task]);
			}
			else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
}
}
	//View Attendance


	
	public function editemployee($id){
			if(session()->get("email")){
				
				if(session()->get("role") == 1 || session()->get("role") == 2){
				
						$task = DB::connection('mysql')->table('elsemployees')
						->select('elsemployees.*','empstatus.*','hrm_Department.*','designation.*','role.*')
						->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
						->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
						->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
						->join ('empstatus','empstatus.status_id', '=','elsemployees.elsemployees_status')
						->where('elsemployees.elsemployees_empid','=',$id)
						->first();
						
						$desg = DB::connection('mysql')->table('designation')
						->select('designation.*')
						->get();
						
						$depart = DB::connection('mysql')->table('hrm_Department')
						->select('hrm_Department.*')
						->get();
						
						$manager = DB::connection('mysql')->table('elsemployees')
						->where('elsemployees.elsemployees_roleid','<=','3')
						->where('elsemployees.elsemployees_status','=',2)
						->select('elsemployees.*')
						->get();
						
						
						$role = DB::connection('mysql')->table('role')
						->select('role.*')
						->get();

						$status = DB::connection('mysql')->table('empstatus')
						->select('empstatus.*')
						->get();

						$getpayroll = DB::connection('mysql')->table('payrollsalaries')
						->where('payrollsalaries.EMP_BADGE_ID','=',$task->elsemployees_batchid)
						->select('payrollsalaries.Salary','payrollsalaries.fund','attendance_allowance','punctuality_allowance','transport_allowance','fuel_allowance')
						->first();

						$getcar = DB::connection('mysql')->table('car')
						->where('status_id','=',2)
						->select('car_id','car_name')
						->get();
						$payroll = array();
						if ($getpayroll) {
							$payroll[0] = $getpayroll->Salary;
							$payroll[1] = $getpayroll->fund;
							$payroll[2] = $getpayroll->attendance_allowance;
							$payroll[3] = $getpayroll->punctuality_allowance;
							$payroll[4] = $getpayroll->transport_allowance;
							$payroll[5] = $getpayroll->fuel_allowance;
						}else{
							$payroll[0] = "0";
							$payroll[1] = "0";
							$payroll[2] = "0";
							$payroll[3] = "0";
							$payroll[4] = "0";
							$payroll[5] = "0";
						}
						// dd($payroll);
						
						$allData = array("depart" => $depart, "desg" => $desg, "role" => $role, "empstatus" => $status,"manager" => $manager,"user" =>$task,"salary" =>$payroll, 'car' => $getcar);
				
					// dd($allData);
					
						return view('editemployee' , ['data' => $allData]);
				
				
				   // dd($task);
				}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal this page with this role');
				}
			
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}

	public function datapaginator(){

        $bhai =   "Driver: " . Config::get('database.connections.mysql.driver') . "<br/>\r\n"."Host: " . Config::get('database.connections.mysql.host') . "<br/>\r\n"."Database: " . Config::get('database.connections.mysql.database') . "<br/>\r\n"."Username: " . Config::get('database.connections.mysql.username') . "<br/>\r\n"."Password: " . Config::get('database.connections.mysql.password');
			
		return $bhai; 
    }

	public function viewreq($id){
		
		
		if(session()->get("email")){
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsleaverequests.elsleaverequests_id','=',$id)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->first();
				

				
				   // dd($task);
						return view('els.modal.requestview',['data' => $task ]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
		
		
	}


	public function updateemployee(Request $request) {

		// dd($request->emp_doj);
		
				// $jdate = explode("-",$request->emp_doj);
				// if($jdate[0] < date('Y') && $jdate[1] == date('m')){
				// 	$leave_year = date('Y');
				// }else{
				// 	$leave_year = $jdate[0];
				// }
		
				$post = elsemployee::on('mysql')->findOrFail($request->hdnempid);
				$post->elsemployees_type = $request->emp_type ; 
				$post->elsemployees_ext = $request->ext ; 
				$post->elsemployees_batchid = $request->emp_batch; 
				$post->elsemployees_name = $request->emp_name;
				$post->elsemployees_fname = $request->emp_fname;
				$post->elsemployees_cnic = $request->emp_cnic;
				$post->elsemployees_cno = $request->emp_contactno;
				$post->elsemployees_email = $request->emp_com_email;
				$post->elsemployees_dofbirth = $request->emp_dob;
				$post->elsemployees_dofjoining = $request->emp_doj;
				$post->elsemployees_address = $request->emp_address;
				$post->elsemployees_departid = $request->emp_dept;
				$post->elsemployees_desgid = $request->emp_desg;
				$post->elsemployees_reportingto = $request->emp_report;
				$post->elsemployees_roleid = $request->emp_role;
				$post->elsemployees_status = $request->emp_status;
				$post->account_title = $request->emp_acctitle ;
				$post->account_no = $request->emp_accno ;
				$post->iban_no = $request->emp_ibanno ;
				$post->bank_branch = $request->emp_bbranch ;
				$post->bank_name = $request->emp_bname ;
				$post->elsemployees_dofleaving = $request->dol ;
				$post->elsemployees_dofpayroll = $request->payrolldate ;
				$post->elsemployees_emailaddress = $request->emailaddress ;
				$post->elsemployees_emailpassword = $request->emailpassword ;
				$post->elsemployees_emailhost = $request->emailhost ;
				$post->elsemployees_careligibility = $request->elsemployees_careligibility ;
				$post->elsemployees_assigncaroramount = $request->elsemployees_assigncaroramount ;
				$post->car_id = $request->car_id ;
				$post->elsemployees_caramount = $request->elsemployees_caramount ;
	
				if (session()->get('role') == 1 || session()->get('role') == 2 ) {
				$post->elsemployees_annualleaves = $request->emp_annual_leave;
				$post->elsemployees_sickleaves = $request->emp_sick_leave;	
				// $post->elsemployees_leaveyear =  $leave_year;
				}else{
				return redirect('/employeelist')->with('message','You Are Cheating');
				}
				$post->elsemployees_changeby = session()->get("name");
				$post->updated_at = date('Y-m-d H:i:s');
				$updated = $post->save();

				if ($request->elsemployees_careligibility == "Yes") {
					$insert = array(
	                'carassign_month' => date('Y-m'),
	                'carassign_to' => $request->emp_batch,
	                'car_id' => $request->car_id,
	                'status_id'=> 2,
	                'created_by'=>  session()->get("batchid"),
	                'created_at'=> date('Y-m-d h:i:s'),
	                );
	            	DB::connection('mysql')->table('carassign')->insert($insert);
				}

				$task = DB::connection('mysql')->table('payrollsalaries')
				->select('payrollsalaries.*')
				->where('payrollsalaries.EMP_BADGE_ID','=',$request->emp_batch)
				->first();
				if (isset($task)) {
					DB::connection('mysql')->table('payrollsalaries')
                 	->where('EMP_BADGE_ID','=',$request->emp_batch)
                 	->update(['Salary' => $request->salary,
                 		'attendance_allowance'=> $request->attendance_allowance,
                		'punctuality_allowance'=> $request->punctuality_allowance,
                		'transport_allowance'=> $request->transport_allowance,
                		'fuel_allowance'=> $request->fuel_allowance,
                		'fund' => $request->fund,
                		'Update_By' => session()->get('id'),
                		'update_at' => date('Y-m-d h:i:s')]); 
				}else{
					$insert[] = array(
	                'Name' => $request->emp_name,
	                'EMP_BADGE_ID' => $request->emp_batch,
	                'BankAccountNo' => $request->emp_accno,
	                'Salary'=> $request->salary,
	                'attendance_allowance'=> $request->attendance_allowance,
	                'punctuality_allowance'=> $request->punctuality_allowance,
	                'transport_allowance'=> $request->transport_allowance,
	                'fuel_allowance'=> $request->fuel_allowance,
	                'fund'=> $request->fund,
	                'fund_month'=> date('m'),
	                'fund_year'=> date('Y'),
	                'Date'=> date('Y-m-d'),	
	                'Salary_Comment'=> "",
	            	);
	            	$created = DB::connection('mysql')->table('payrollsalaries')->insert($insert);
					}
			
			if ($updated) {

				return Redirect::to('/employeelist')->with('message','Employee Successfully Updated');
			} else {
				return Redirect::to('/employeelist')->with('message','Something Went Wrong');
			}
				
	}
	public function employeeprofile($id){
		if(session()->get("email")){
			
			$task = DB::connection('mysql')->table('elsemployees')
			->select('elsemployees.*','hrm_Department.*','designation.*','role.*','empstatus.*')
			->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
			->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
			->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
			->join ('empstatus','empstatus.status_id', '=','elsemployees.elsemployees_status')
			->where('elsemployees.elsemployees_empid','=',$id)
			->first();
			
			$desg = DB::connection('mysql')->table('designation')
			->select('designation.*')
			->get();
			
			$depart = DB::connection('mysql')->table('hrm_Department')
			->select('hrm_Department.*')
			->get();
			
			$manager = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_roleid','=','3')
			->select('elsemployees.*')
			->get();
			
			
			$role = DB::connection('mysql')->table('role')
			->select('role.*')
			->get();

			$status = DB::connection('mysql')->table('empstatus')
			->select('empstatus.*')
			->get();
			
			$allData = array("depart" => $depart, "desg" => $desg, "role" => $role, "status" => $status, "manager" => $manager,"user" =>$task);
	
	// dd($allData);
	
		return view('employeeprofile' , ['data' => $allData]);
			
			
			   // dd($task);
					
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}

}
	
	public function selfrequest(){
			if(session()->get("email")){
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
				->select('elsleaverequests.*','elsemployees.*')
				->get();
				
				$reqcheck = DB::connection('mysql')->table('elsleaverequests')
				->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
				->where('elsleaverequests.elsleaverequests_status','=',"Pending")
				->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
				->select('elsleaverequests.*')
				->first();
			
				//$request_submit = 
				// dd($reqcheck);
				
				
				$alldata = ['task'=>$task,'leavecheck' => $reqcheck];
				
				//    dd($task);
						return view('els.selfrequest',['data' => $alldata ]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}


	public function addrequest($date){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_empid','=',session()->get("id"))
			->select('elsemployees.*')
			->first();
			
			
			
			// dd($task);
		return view('els.modal.addrequest' , ['req' => $task, 'date' => $date]);
		}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	}

//New Code

	function dateDiffInDays($date1, $date2){ 
	    // Calulating the difference in timestamps 
	    $diff = strtotime($date2) - strtotime($date1); 
	      
	    // 1 day = 24 hours 
	    // 24 * 60 * 60 = 86400 seconds 
	    return abs(round($diff / 86400)); 
	}

	public function test(){
	 	$elsemployee = elsemployee::on('mysql')->find(80);
	 	foreach ($elsemployee->leaverequest as $value) {
	 		echo $value->elsleaverequests_empid."<br/>";
	 	}
	 	//dd($elsemployee->leaverequest);
	 	echo "Hello";


	 	/*// Start date 
	 	echo date('Y-m-d')."Current Date";
		$date1 = "17-09-2019"; 
		  
		// End date 
		$date2 = "31-09-2019"; 
		  
		// Function call to find date difference 
		$dateDiff = $this->dateDiffInDays($date1, $date2); 
		  
		// Display the result 
		printf("Difference between two dates: "
		   . $dateDiff . " Days "); */
	 } 

	//Employee Request Model
	public function addrequestemp(){
			$data= array();
		if(session()->get("email")){
			/*$task = DB::table('elsemployees')
			->where('elsemployees.elsemployees_empid','=',session()->get("id"))
			->select('elsemployees.*')
			->first();*/
			$result = DB::connection('mysql')->table('elsemployees')
			 ->select('*')
			 ->get();
			
			// $data['req'] = $task;
			 $data['result'] = $result;
			// dd($task);
		return view('els.modal.addrequestemp' , $data);
		}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	}

	// Get Employee Data
	public function getemployeeDetail(Request $request){
		$batchid = $request->get('batchid');
		$result = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_batchid','=',$batchid)
			->where('elsemployees.elsemployees_status','=',2)
			->select('elsemployees.*')
			->first();
		if(!empty($result)){
			echo json_encode($result);
		} else{
			echo json_encode(null);
		}
	}

	// Submit Employee Request
	public function submitrequestemp(Request $request){
		//dd($request);
		if( ( $request->leaveType == 1 ) && ( $request->annual < $request->totalDays ) ){
				
				
				  $ans = array("no" => "You are applying " .$request->totalDays." Annual Leaves and your reamining Annual leaves are ".$request->annual);
				  
				echo json_encode($ans);
				
			}else if( ($request->leaveType == 2 ) && ( $request->sick < $request->totalDays ) ){
				
				$ans = array("no" => "You are applying " .$request->totalDays." Sick Leaves and your reamining Sick leaves are ".$request->sick);
			
				echo json_encode($ans);
				
			}
			else{
		
			
				// dd($request->startDate);
				
				if($request->leaveType == 1 ){
					
						$date = $request->dojoin;
						$date = strtotime(date("Y-m-d", strtotime($date)) . " +12 month");
						$date = date("Y-m-d",$date);
						
						// dd($date);
						if($request->startDate <  $date ){
							 
							 
							$ans = array("no" => "Sorry you are not allowed to apply any Annual Leave request before an year! HR Policy");
				
							echo json_encode($ans);
							
							die;
							 
						}
						
				}
				
				$reportto = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_empid','=',$request->empid)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsemployees.elsemployees_reportingto')
				->first();
				
				
				$reportemail = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_empid','=',$reportto->elsemployees_reportingto)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsemployees.elsemployees_email')
				->first();
				
				
				$reportemaild = $reportemail->elsemployees_email;
			
				$post = new elsleaverequest;
				$post->setConnection('mysql');

				$post->elsleaverequests_empid = $request->empid; 
				$post->elsleaverequests_leavetypeid = $request->leaveType;
				$post->elsleaverequests_leavestartdate = $request->startDate;
				$post->elsleaverequests_leaveenddate = $request->endDate;
				$post->elsleaverequests_totalleavedays = $request->totalDays;
				$post->elsleaverequests_remainingannualleave = $request->annual;
				$post->elsleaverequests_reamainingsickleave = $request->sick;
				$post->elsleaverequests_usercomment = $request->comment;
				$post->elsleaverequests_leavesubmitdate = date('Y-m-d');
				$post->elsleaverequests_status = "Pending";
				$post->elsleaverequests_managerstatus = "Pending";
				$post->elsleaverequests_coostatus = "Pending";
				$post->elsleaverequests_hrstatus = "Pending";
				$post->elsleaverequests_changeby = session()->get("name");
			
				$created = $post->save();
				if($created){
				// Mail::send('els.email.addrequest', [ 
				
				// 	'datas' =>$request,
				// ],
				// function ($message) use ($reportemaild) {
				// $message->to($reportemaild)
				// ->cc(session()->get("email"))
				// ->bcc('muhammad.mehroz@bizzworld.com')
				// ->subject('Employee Leave Request Submited By: ' . session()->get("name"));
				// });
				
				$ans = array("no" => "Your request has been Added Successfully");
				
						echo json_encode($ans);
				  }else{
					 $ans = array("no" => "Oops something went wrong");
				
						echo json_encode($ans);
				  } 
					
			}

	}

//End Code

	public function submitrequest(Request $request){

		if (session()->get("batchid") == $request->batchid ) {

			// dd($request->startDate);			

			if( ( $request->leaveType == 1 ) && ( $request->annual < $request->totalDays ) ){
				return redirect('/dailyattendance')->with('message','You are applying '.$request->totalDays.' Annual Leaves and your reamining Annual leaves are '.$request->annual);
				
		// $ans = array("no" => 'You are applying ' .$request->totalDays.' Annual Leaves and your reamining Annual leaves are '.$request->annual);
				  
				// echo json_encode($ans);
				
			}else if( ($request->leaveType == 2 ) && ( $request->sick < $request->totalDays ) ){
				return redirect('/dailyattendance')->with('message','You are applying ' .$request->totalDays.' Sick Leaves and your reamining Sick leaves are '.$request->sick);
				// $ans = array("no" => "You are applying " .$request->totalDays." Sick Leaves and your reamining Sick leaves are ".$request->sick);
			
				// echo json_encode($ans);
				
			}
			else{
			
			
			
				if($request->leaveType == 1 ){
				
					$date = $request->dojoin;
					$date = strtotime(date("Y-m-d", strtotime($date)) . " +12 month");
					$date = date("Y-m-d",$date);
					
					// dd($date);
					// if($request->startDate <  $date && $request->leaveType != 3){
						 
						 // return redirect('/dailyattendance')->with('message','Sorry your not allowed to apply any Annual Leave request before an year! HR Policy');
						// $ans = array("no" => "Sorry your not allowed to apply any Annual Leave request before an year! HR Policy");
			
						// echo json_encode($ans);
						
						// die;
						 
					// }
					
				}

				$startDate = $request->startDate;
			    $CurrentDate = date('Y-m-d');
			    $totalDays = $request->totalDays;
				// Function call to find date difference 
		    	$dateDiff = $this->dateDiffInDays($startDate, $CurrentDate);
		    	

		    	if($totalDays > 3){

		    		if($dateDiff < 45  && $request->leaveType != 3){
		    			return redirect('/dailyattendance')->with('message','Sorry your not allowed to apply More Than 3 Days Leave request before 45 Days! HR Policy');
		    			// $ans = array("no" => "Sorry your not allowed to apply More Than 3 Days Leave request before 45 Days! HR Policy");
			
						// echo json_encode($ans);
						
						// die;
		    		}
		    	}

		    	/*New Line */
		    	$currentDate1 = explode('-', $request->startDate);

				// dd($currentDate1);

				$currentMonth = $currentDate1[1];
				$currentYear = $currentDate1[0];

				// dd($currentYear);

				$totalleavedays = 0;

				$elsrequests = DB::connection('mysql')->table('elsleaverequests')
					->where('elsleaverequests_empid','=',session()->get("id"))
					->Where('elsleaverequests_status','!=','Decline')
					->select('elsleaverequests.*')
					->get();

				// dd($elsrequests);

				foreach ($elsrequests as $row) {
					$requestDate = explode('-',  $row->elsleaverequests_leavestartdate);
					// dd($requestDate[1]);
					if($currentMonth == $requestDate[1] && $currentYear == $requestDate[0]){
						$totalleavedays +=  $row->elsleaverequests_totalleavedays;
					}
				}

				// if($totalleavedays >= 3  && $request->leaveType != 3){
					// return redirect('/dailyattendance')->with('message','You are not allowed to apply more Than 3 Days Leave request in a Month! HR Policy.');
					// $ans = array("no" => "You are not allowed to apply more Than 3 Days Leave request in a Month! HR Policy.");
		
					// echo json_encode($ans);
					// die;
				// } 
				// $sumlaeves = DB::connection('mysql')->table('elsleaverequests')
				// 	->where('elsleaverequests_empid','=',session()->get("id"))
				// 	->Where('elsleaverequests_status','!=','Decline')
				// 	->select('elsleaverequests_id')
				// 	->count();	 
				// 	if($sumlaeves >= 3){
				// 	return redirect('/dailyattendance')->with('message','You are not allowed to apply more Than 3 Days Leave request in a Month! HR Policy.');
					// $ans = array("no" => "You are not allowed to apply more Than 3 Days Leave request in a Month! HR Policy.");	
					// echo json_encode($ans);
				// } 
				//dd($request->startDate);
		    	/*End Line */
		    	//echo "success";exit;

				$reportto = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_empid','=',$request->empid)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsemployees.elsemployees_reportingto')
				->first();
				
				
				$reportemail = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees.elsemployees_empid','=',$reportto->elsemployees_reportingto)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsemployees.elsemployees_email')
				->first();
				
				
				$reportemaild = $reportemail->elsemployees_email;
			
				$post = new elsleaverequest;
				$post->setConnection('mysql');

				$post->elsleaverequests_empid = $request->empid; 
				$post->elsleaverequests_leavetypeid = $request->leaveType;
				$post->elsleaverequests_leavestartdate = $request->startDate;
				$post->elsleaverequests_leaveenddate = $request->endDate;
				$post->elsleaverequests_totalleavedays = $request->totalDays;
				$post->elsleaverequests_remainingannualleave = $request->annual;
				$post->elsleaverequests_reamainingsickleave = $request->sick;
				$post->elsleaverequests_usercomment = $request->comment;
				$post->elsleaverequests_leavesubmitdate = date('Y-m-d');
				$post->elsleaverequests_status = "Pending";
				$post->elsleaverequests_managerstatus = "Pending";
				$post->elsleaverequests_coostatus = "Pending";
				$post->elsleaverequests_hrstatus = "Pending";
				$post->elsleaverequests_changeby = session()->get("name");
			
				$created = $post->save();
				if($created){
					// Mail::send('els.email.addrequest', [ 
				
					// 'datas' =>$request,
					// ],
					// function ($message) use ($reportemaild) {
					// $message->to($reportemaild)
					// ->cc(session()->get("email"))
					// ->bcc('muhammad.mehroz@bizzworld.com')
					// ->subject('Employee Leave Request Submited By: ' . session()->get("name"));
					// });
				
					// $ans = array("no" => "Your request has been Added Successfully");
				
					// echo json_encode($ans);
					return redirect('/dailyattendance')->with('message','Leave Request Submited Successfully');
				}else{
					// $ans = array("no" => "Oops  went wrong");
					// echo json_encode($ans);
					return redirect('/dailyattendance')->with('message','Oops  went wrong');
				} 
					
			}
		}else{
			return redirect('/dailyattendance')->with('message','You Insert Wrong Details');
			// $ans = array("no" => "You Insert Wrong Details");

			// echo json_encode($ans);
		} 	
	}

	public function emprequest(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				// ->where('elsemployees.elsemployees_status','=',2)
				// ->orderBy('elsleaverequests.elsleaverequests_status','ASC')
				->orderBy('elsleaverequests.elsleaverequests_id', 'DESC')
				->select('elsleaverequests.*','elsemployees.*')
				->get();
					
				}elseif(session()->get("email") == "salman.khairi@bizzworld.com"){
					
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsemployees.elsemployees_status','=',2)
				->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
				->orWhere('elsleaverequests.elsleaverequests_status','=',"COO Approval Required")
				->orderBy('elsleaverequests.elsleaverequests_id', 'DESC')
				->select('elsleaverequests.*','elsemployees.*')
				->get();
					
				}else{
				
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
				->where('elsemployees.elsemployees_status','=',2)
				->orderBy('elsleaverequests.elsleaverequests_id', 'DESC')
				->select('elsleaverequests.*','elsemployees.*')
				->get();
				
				}
				//    dd($task);
						return view('els.emprequest',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}

	public function viewemprequest(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2 && session()->get("email") != "salman.khairi@bizzworld.com"){
					
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->Where('elsleaverequests.elsleaverequests_status','=',"Approved")
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				// ->orderBy('elsleaverequests.elsleaverequests_status','ASC')
				->get();
					
				}elseif(session()->get("email") == "salman.khairi@bizzworld.com"){
					
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
				->where('elsemployees.elsemployees_status','=',2)
				->where('elsleaverequests.elsleaverequests_status','=',"Pending")
				// ->orWhere('elsleaverequests.elsleaverequests_status','=',"COO Approval Required")
				->select('elsleaverequests.*','elsemployees.*')
				->get();
					
				}else{
				
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
				->where('elsemployees.elsemployees_status','=',2)
				->Where('elsleaverequests.elsleaverequests_status','=',"Pending")
				->select('elsleaverequests.*','elsemployees.*')
				->get();
				
				}
				//    dd($task);
						return view('els.viewemprequest',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}

	public function approvedmulti_request(){
		if(session()->get("email")){
			
			if(session()->get("role") <= 2){
				
			$task = DB::connection('mysql')->table('elsleaverequests')
			->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
			->Where('elsleaverequests.elsleaverequests_status','=',"Approved")
			->where('elsemployees.elsemployees_status','=',2)
			->select('elsleaverequests.*','elsemployees.*')
			// ->orderBy('elsleaverequests.elsleaverequests_status','ASC')
			->get();

			}else{
				
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			
			}
			//    dd($task);
					return view('els.approvedmulti_request',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	
	}


	public function updatemultirequest(Request $request) {

        if (session()->get("email")){
        	// $attendance = explode("~", $request->invsdreqstatus);
        	// $dated = explode("-",$request->attendancedate);
        	// dd($request);
			$bad = 0;
        	foreach ($request->invsdreqstatus as $updatereq) {
          	
    			//$uniquedate = DB::connection('mysql')->table('attendance')
				// ->where('attendance.elsemployees_empid','=',$request->emp_batchid[$bad])
				// ->select('attendance.attendance_date')
				// ->get();
				// $udate = array();

				// foreach ($uniquedate as $tabb) {
			    //$udate = $tabb->attendance_date;
			    //}
				// dd($updatereq);

        		if($updatereq != 'Pending'){
 						//dd("yes");
	    				//DB::connection('mysql')->table('attendance')->insert([
						//'attendance_date' => $request->attendancedate,
						//'attendance_month' =>  $dated[1],
						//'attendance_mark' => $markatt,
						//'elsemployees_empid' =>  $request->emp_batchid[$bad],
						//'attendance_submitby' => session()->get('name')
						//]);


					$id = $request->emp_batchid[$bad];

					// dd($id);

        			if($updatereq == 'Done'){
						$hrstatus = 'Approved';

						$task = DB::connection('mysql')->table('elsleaverequests')
						->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
						->where('elsleaverequests.elsleaverequests_id','=',$id)
						->where('elsemployees.elsemployees_status','=',2)
						->select('elsleaverequests.*','elsemployees.*')
						->first();
						 
						// dd($task);
						 
						if($task->elsleaverequests_status != "Done" ){
							
							if ($task->elsemployees_annualleaves >= $task->elsleaverequests_totalleavedays || $task->elsemployees_sickleaves >= $task->elsleaverequests_totalleavedays){
		 						$leavetable = elsemployee::on('mysql')->findOrFail($task->elsemployees_empid);

								if($task->elsleaverequests_leavetypeid == 1 ){

									if($task->elsemployees_annualleaves >= $task->elsleaverequests_totalleavedays){
									
										$annual = $leavetable->elsemployees_annualleaves;
										
										
										$leavededuction = $annual - $task->elsleaverequests_totalleavedays;
										
										$leavetable->elsemployees_annualleaves = $leavededuction;
										
										
										$updated = $leavetable->save();
									}else{
										if($task->elsleaverequests_totalleavedays == 1){
											return redirect('/approvedmulti_request')->with("message","You can't Approve this requst, $task->elsemployees_name has requested for $task->elsleaverequests_totalleavedays-day Annual leave but his Reamining Leave Is $task->elsemployees_annualleaves");
										}else{
										return redirect('/approvedmulti_request')->with("message","You can't Approve this requst, $task->elsemployees_name has requested for $task->elsleaverequests_totalleavedays-days Annual leaves but his Reamining Leaves Is $task->elsemployees_annualleaves");

										}
									}
									
								}else if($task->elsleaverequests_leavetypeid == 2){

									if($task->elsemployees_sickleaves >= $task->elsleaverequests_totalleavedays){
									
										$sick = $leavetable->elsemployees_sickleaves;
										
										$leavededuction = $sick - $task->elsleaverequests_totalleavedays;
											
										$leavetable->elsemployees_sickleaves = $leavededuction;	
										
										$updated = $leavetable->save();

									}else{
										if($task->elsleaverequests_totalleavedays == 1){
											return redirect('/approvedmulti_request')->with("message","You can't Approve this requst, $task->elsemployees_name has requested for $task->elsleaverequests_totalleavedays-day Sick leave but his Reamining Leave Is $task->elsemployees_sickleaves");
										}else{
										return redirect('/approvedmulti_request')->with("message","You can't Approve this requst, $task->elsemployees_name has requested for $task->elsleaverequests_totalleavedays-days Sick leaves but his Reamining Leaves Is $task->elsemployees_sickleaves");

										}
										// return redirect('/approvedmulti_request')->with("message","The $task->elsemployees_name Reamining Leave Is $task->elsemployees_sickleaves");
									}
										
								}

								$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
													  
								$empleavetable->elsleaverequests_status = $updatereq;
								$empleavetable->elsleaverequests_hrstatus = $hrstatus;
								$empleavetable->elsleaverequests_hrcomment = "Multiple Done By HR";
								$empleavetable->elsleaverequests_changeby = session()->get("name");
								$empleavetable->elsleaverequests_hrempid = session()->get("id");
								$empleavetable->elsleaverequests_hrdate = date('Y-m-d');
								$updatedleave = $empleavetable->save();
								
								$reportemail = DB::connection('mysql')->table('elsemployees')
										->where('elsemployees.elsemployees_empid','=',$task->elsemployees_reportingto)
										->where('elsemployees.elsemployees_status','=',2)
										->select('elsemployees.*')
										->first();
								
								
								$allData = array("report"=>$reportemail,"data"=>$task);
								
								$reportemaild = $reportemail->elsemployees_email;
								
								
								
								if($updatedleave){
										
										// Mail::send('els.email.donerequest', [ 
										
										// 	'datas' =>$allData,
										// ],
										// function ($message) use ($reportemaild,$task) {
											
										// $message->to($task->elsemployees_email)
										// ->cc(session()->get("email"))
										// ->cc($reportemaild)
										// ->bcc('muhammad.mehroz@bizzworld.com')
										// ->subject('Employee Leave Done By: ' . session()->get("name"));
										// });
										
								}else{
									return redirect('/approvedmulti_request')->with('message','Something Went Wrong');
								}
							}else{
								return redirect('/approvedmulti_request')->with('message','The Requester Leave Balance Is Zero!');
							}
						}
        			}elseif ($updatereq == 'Declined') {
        				$hrstatus = 'Decline';

        				$id = $request->emp_batchid[$bad];

						// dd($id);

        				$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
													  
						$empleavetable->elsleaverequests_status = $updatereq;
						$empleavetable->elsleaverequests_hrstatus = $hrstatus;
						$empleavetable->elsleaverequests_hrcomment = "Multiple Done By HR";
						$empleavetable->elsleaverequests_changeby = session()->get("name");
						$empleavetable->elsleaverequests_hrempid = session()->get("id");
						$empleavetable->elsleaverequests_hrdate = date('Y-m-d');
						$updatedleave = $empleavetable->save();

						$task = DB::connection('mysql')->table('elsleaverequests')
							->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
							->where('elsleaverequests.elsleaverequests_id','=',$id)
							->where('elsemployees.elsemployees_status','=',2)
							->select('elsleaverequests.*','elsemployees.*')
							->first();
							
							$requester = $task->elsemployees_email;

						// dd($task);


						if($updatedleave){

						// Mail::send('els.email.declinerequest', [ 
							
						// 		'datas' =>$task,
						// 	],
						// 	function ($message) use ($requester) {
						// 	$message->to($requester)
						// 	->cc(session()->get("email"))
						// 	->bcc('muhammad.mehroz@bizzworld.com')
						// 	->subject('Employee Leave Declined By: ' . session()->get("name"));
						// 	});
							
						}else{
							return redirect('/approvedmulti_request')->with('message','Something Went Wrong');
						}
        			}else{
        				$updatereq == 'Approved';
        				$hrstatus = 'Pending';

        				$id = $request->emp_batchid[$bad];

						// dd($id);

        				$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
													  
						$empleavetable->elsleaverequests_status = $updatereq;
						$empleavetable->elsleaverequests_hrstatus = $hrstatus;
						$empleavetable->elsleaverequests_hrcomment = "Multiple Done By HR";
						$empleavetable->elsleaverequests_changeby = session()->get("name");
						$empleavetable->elsleaverequests_hrempid = session()->get("id");
						$empleavetable->elsleaverequests_hrdate = date('Y-m-d');
						$updatedleave = $empleavetable->save();
        			}

					// dd($hrstatus);

					// $empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
										  
					// $empleavetable->elsleaverequests_status = $updatereq;
					// $empleavetable->elsleaverequests_hrstatus = $hrstatus;
					// $empleavetable->elsleaverequests_hrcomment = "Multiple Done By (session()->get('name'))";
					// $empleavetable->elsleaverequests_changeby = session()->get("name");
					// $empleavetable->elsleaverequests_hrempid = session()->get("id");
					// $empleavetable->elsleaverequests_hrdate = date('Y-m-d');
					// $updatedleave = $empleavetable->save();
         			$bad++;

         		}else{
         			return redirect('/approvedmulti_request')->with('message','Requests Already Approved');
            	}
        	}
        	return redirect('/approvedmulti_request')->with('message','Requests Approved Successfully');
    	}else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }

	
	public function showempreq($id){
		
		
		if(session()->get("email")){
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsleaverequests.elsleaverequests_id','=',$id)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->first();
				

				
				   // dd($task);
						return view('els.modal.showemprequest',['data' => $task ]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
		
		
	}

	
	public function emprequestedit($id){
		
		
		if(session()->get("email")){
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsleaverequests.elsleaverequests_id','=',$id)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->first();
				

				
				   // dd($task);
						return view('els.modal.emprequestedit',['data' => $task ]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
		
		
	}

	public function updateeditrequest(Request $request){
		//dd($request);
		if( ( $request->leaveType == 1 ) && ( $request->annual < $request->totalDays ) ){
				
				
				  $ans = array("no" => "You are applying " .$request->totalDays." Annual Leaves and your reamining Annual leaves are ".$request->annual);
				  
				echo json_encode($ans);
				
		}else if( ($request->leaveType == 2 ) && ( $request->sick < $request->totalDays ) ){
			
			$ans = array("no" => "You are applying " .$request->totalDays." Sick Leaves and your reamining Sick leaves are ".$request->sick);
		
			echo json_encode($ans);
			
		}
		else{
		
			
			// dd($request->startDate);
			
			if($request->leaveType == 1 ){
				
					$date = $request->dojoin;
					$date = strtotime(date("Y-m-d", strtotime($date)) . " +12 month");
					$date = date("Y-m-d",$date);
					
					// dd($date);
					 if($request->startDate <  $date ){
						 
						 
						 $ans = array("no" => "Sorry you are not allowed to apply any Annual Leave request before an year! HR Policy");
			
						echo json_encode($ans);
						
						die;
						 
					 }
					
			}

			$post = elsleaverequest::on('mysql')->findOrFail($request->elsreqid);

			$post->elsleaverequests_leavetypeid = $request->leaveType;
			$post->elsleaverequests_leavestartdate = $request->startDate;
			$post->elsleaverequests_leaveenddate = $request->endDate;
			$post->elsleaverequests_status = $request->leavestatus;
			$post->elsleaverequests_totalleavedays = $request->totalDays;
			$post->elsleaverequests_changeby = session()->get("name");
			
			$updated = $post->save();
			if($updated){
			
			$ans = array("no" => "Your request has been Update Successfully");
			
					echo json_encode($ans);
			  }else{
				 $ans = array("no" => "Oops  went wrong");
			
					echo json_encode($ans);
			  } 
				
		}	
	}



	public function done($id){
    	if($id){
		$task = DB::connection('mysql')->table('elsleaverequests')
		->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
		->where('elsleaverequests.elsleaverequests_id','=',$id)
		->where('elsemployees.elsemployees_status','=',2)
		->select('elsleaverequests.*','elsemployees.*')
		->first();
		if($task->elsleaverequests_status != "Done" ){
		if ($task->elsemployees_annualleaves >= $task->elsleaverequests_totalleavedays || $task->elsemployees_sickleaves >= $task->elsleaverequests_totalleavedays){
			$leavetable = elsemployee::on('mysql')->findOrFail($task->elsemployees_empid);
		if($task->elsleaverequests_leavetypeid == 1 ){
			$annual = $leavetable->elsemployees_annualleaves;
			$leavededuction = $annual - $task->elsleaverequests_totalleavedays;
			$leavetable->elsemployees_annualleaves = $leavededuction;
			$updated = $leavetable->save();
		}else if($task->elsleaverequests_leavetypeid == 2){
			$sick = $leavetable->elsemployees_sickleaves;
			$leavededuction = $sick - $task->elsleaverequests_totalleavedays;
			$leavetable->elsemployees_sickleaves = $leavededuction;	
			$updated = $leavetable->save();
		}else{
			true;
		}
		$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
		  $empleavetable->elsleaverequests_status = "Done";
		  $empleavetable->elsleaverequests_hrstatus = "Approved";
		  $empleavetable->elsleaverequests_hrempid = session()->get("id");
		  $empleavetable->elsleaverequests_hrdate = date('Y-m-d');
		  $updatedleave = $empleavetable->save();
		$checkduplicate = DB::connection('mysql')->table('attendancecorrection')
		->where('created_by','=',$task->elsemployees_batchid)
		->where('attendancecorrection_affdate','=',$empleavetable->elsleaverequests_leavestartdate)
		->select('attendancecorrection_id')
		->count();
		$checkdone = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests_id','=',$id)
		->where('elsleaverequests_status','=',"Done")
		->select('elsleaverequests_id')
		->count();
		if ($checkduplicate == 0 && $checkdone != 0) {
			$addcorrection[] = array(
			'attendancecorrection_title' 	=> "Absent",
			'attendancecorrection_desc' 	=> "Leave Correction",
			'attendancecorrection_affdate' 	=> $empleavetable->elsleaverequests_leavestartdate,
			'attendancecorrection_amount' 	=> 1,
			'attendancecorrection_status' 	=> "Approved",
			'status_id' 					=> 3,
			'created_at' 					=> date('Y-m-d h:i:s'),
			'created_by' 					=> $task->elsemployees_batchid,
			);
			DB::connection('mysql')->table('attendancecorrection')->insert($addcorrection);
		}
	if($updatedleave){
		return redirect('/emprequest')->with('message','Approved Successfully');			
	}
	} elseif ($task->elsleaverequests_leavetypeid == 3) {
  	$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
				  $empleavetable->elsleaverequests_status = "Done";
				  $empleavetable->elsleaverequests_hrstatus = "Approved";
				  $empleavetable->elsleaverequests_hrempid = session()->get("id");
				  $empleavetable->elsleaverequests_hrdate = date('Y-m-d');
				  $updatedleave = $empleavetable->save();
				$checkduplicate = DB::connection('mysql')->table('attendancecorrection')
				->where('created_by','=',$task->elsemployees_batchid)
				->where('attendancecorrection_affdate','=',$empleavetable->elsleaverequests_leavestartdate)
				->select('attendancecorrection_id')
				->count();
				$checkdone = DB::connection('mysql')->table('elsleaverequests')
				->where('elsleaverequests_id','=',$id)
				->where('elsleaverequests_status','=',"Done")
				->select('elsleaverequests_id')
				->count();
				if ($checkduplicate == 0 && $checkdone != 0) {
					$addcorrection[] = array(
					'attendancecorrection_title' 	=> "Absent",
					'attendancecorrection_desc' 	=> "Leave Correction",
					'attendancecorrection_affdate' 	=> $empleavetable->elsleaverequests_leavestartdate,
					'attendancecorrection_amount' 	=> 1,
					'attendancecorrection_status' 	=> "Approved",
					'status_id' 					=> 3,
					'created_at' 					=> date('Y-m-d h:i:s'),
					'created_by' 					=> $task->elsemployees_batchid,
					);
					DB::connection('mysql')->table('attendancecorrection')->insert($addcorrection);
				}
			if($updatedleave){
				return redirect('/emprequest')->with('message','Approved Successfully');
			}else{
				return redirect('/emprequest')->with('message','Oops! Something Went Wrong');
			}
  	}else{
		return redirect('/emprequest')->with('message','Annual Leaves Balance');
  	} 
	}else{
		return redirect('/emprequest')->with('message','Oops! Something Went Wrong');
	}
	}else{
		return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
	}
}
    public function decline($id){
        $empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
		  if(session()->get("role") == 3 && session()->get("email") == "salman.khairi@bizzworld.com"){
		  $empleavetable->elsleaverequests_status = "Decline";
		  $empleavetable->elsleaverequests_coostatus = "Decline";
		  $empleavetable->elsleaverequests_cooempid = session()->get("id");
		  $empleavetable->elsleaverequests_coodate = date('Y-m-d');
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();
		  }elseif(session()->get("role") == 3 && session()->get("email") != "salman.khairi@bizzworld.com"){
		  $empleavetable->elsleaverequests_status = "Decline";
		  $empleavetable->elsleaverequests_managerstatus = "Decline";
		  $empleavetable->elsleaverequests_approverempid = session()->get("id");
		  $empleavetable->elsleaverequests_approverdate = date('Y-m-d');
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();
		  }else{
		  $empleavetable->elsleaverequests_status = "Decline";
		  $empleavetable->elsleaverequests_hrstatus = "Decline";
		  $empleavetable->elsleaverequests_hrempid = session()->get("id");
		  $empleavetable->elsleaverequests_hrdate = date('Y-m-d');
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();
		  }
			$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsleaverequests.elsleaverequests_id','=',$id)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->first();
				
				$requester = $task->elsemployees_email;

			// dd($task);


		if($updatedleave){
			
			// Mail::send('els.email.declinerequest', [ 
				
			// 		'datas' =>$task,
			// 	],
			// 	function ($message) use ($requester) {
			// 	$message->to($requester)
			// 	->cc(session()->get("email"))
			// 	->bcc('muhammad.mehroz@bizzworld.com')
			// 	->subject('Employee Leave Decline By: ' . session()->get("name"));
			// 	});
				
          }else{
              echo json_encode(false);
          } 
    }

	public function deccom($id,$comment){
		
	 $empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
		  if(session()->get("role") == 3 && session()->get("email") == "salman.khairi@bizzworld.com"){
		  $empleavetable->elsleaverequests_status = "Decline";
		  $empleavetable->elsleaverequests_coostatus = "Decline";
		  $empleavetable->elsleaverequests_cooempid = session()->get("id");
		  $empleavetable->elsleaverequests_coodate = date('Y-m-d');
		  $empleavetable->elsleaverequests_coocomment = $comment;
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();
		  }elseif(session()->get("role") == 3 && session()->get("email") != "salman.khairi@bizzworld.com"){
		  $empleavetable->elsleaverequests_status = "Decline";
		  $empleavetable->elsleaverequests_managerstatus = "Decline";
		  $empleavetable->elsleaverequests_approverempid = session()->get("id");
		  $empleavetable->elsleaverequests_approverdate = date('Y-m-d');
		  $empleavetable->elsleaverequests_approvercomment = $comment;
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();
		  }else{
		  $empleavetable->elsleaverequests_status = "Decline";
		  $empleavetable->elsleaverequests_hrstatus = "Decline";
		  $empleavetable->elsleaverequests_hrempid = session()->get("id");
		  $empleavetable->elsleaverequests_hrdate = date('Y-m-d');
		  $empleavetable->elsleaverequests_hrcomment = $comment;
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();
		  }
			$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsleaverequests.elsleaverequests_id','=',$id)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->first();
				
				$requester = $task->elsemployees_email;

			// dd($task);
			
			$allData = array("comment"=>$comment,"data"=>$task);

			// dd($allData);

		if($updatedleave){
			
			// Mail::send('els.email.deccomment', [ 
				
			// 		'datas' =>$allData,
			// 	],
			// 	function ($message) use ($requester) {
			// 	$message->to($requester)
			// 	->cc(session()->get("email"))
			// 	->bcc('muhammad.mehroz@bizzworld.com')
			// 	->subject('Employee Leave Decline By: ' . session()->get("name"));
			// 	});
				
          }else{
              echo json_encode(false);
          }
	
	}
	
	
	public function approve($id,$comment){
		
		if($id){
			$task1 = DB::connection('mysql')->table('elsleaverequests')
			->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
			->where('elsleaverequests.elsleaverequests_id','=',$id)
			->where('elsemployees.elsemployees_status','=',2)
			->select('elsleaverequests.*','elsemployees.*')
			->first();
			 
			 // dd($task);
			 
			if($task1->elsleaverequests_totalleavedays >= "3" && $task1->elsleaverequests_status == "Pending" ){
				if(session()->get("email") == "salman.khairi@bizzworld.com"){
					$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
		  
					$empleavetable->elsleaverequests_status = "Approved";
			  		$empleavetable->elsleaverequests_coostatus = "Approved";
					$empleavetable->elsleaverequests_coocomment = $comment;
					$empleavetable->elsleaverequests_cooempid = session()->get("id");
					$empleavetable->elsleaverequests_coodate = date('Y-m-d');
					$empleavetable->elsleaverequests_changeby = session()->get("name");
					$updatedleave = $empleavetable->save();
				}else{
					$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
		  
					$empleavetable->elsleaverequests_status = "COO Approval Required";
					$empleavetable->elsleaverequests_managerstatus = "Approved";
					$empleavetable->elsleaverequests_approvercomment = $comment;
					$empleavetable->elsleaverequests_approverempid = session()->get("id");
					$empleavetable->elsleaverequests_approverdate = date('Y-m-d');
					$empleavetable->elsleaverequests_changeby = session()->get("name");
					$updatedleave = $empleavetable->save();

				}

			$task = DB::connection('mysql')->table('elsleaverequests')
			->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
			->where('elsleaverequests.elsleaverequests_id','=',$id)
			->where('elsemployees.elsemployees_status','=',2)
			->select('elsleaverequests.*','elsemployees.*')
			->first();
				
			$requester = $task->elsemployees_email;

		// dd($task);

		if($updatedleave){
				
				
				// Mail::send('els.email.approvedrequest', [ 
				
				// 	'datas' =>$task,
				// ],
				// function ($message) use ($requester) {
				// $message->to('salman.khairi@bizzworld.com')
				// ->bcc('muhammad.mehroz@bizzworld.com')
				// ->cc(session()->get("email"))
				// ->cc($requester)
				// ->subject('Employee Leave Approved By: ' . session()->get("name"));
				// });
				
          }else{
              echo json_encode(false);
          }
			}
				elseif($task1->elsleaverequests_totalleavedays >= "3" && $task1->elsleaverequests_status == "COO Approval Required" ){

				$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
		  
		  $empleavetable->elsleaverequests_status = "Approved";
		  $empleavetable->elsleaverequests_coostatus = "Approved";
		  $empleavetable->elsleaverequests_coocomment = $comment;
		  $empleavetable->elsleaverequests_cooempid = session()->get("id");
		  $empleavetable->elsleaverequests_coodate = date('Y-m-d');
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();



				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsleaverequests.elsleaverequests_id','=',$id)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->first();
				

				
			$requester = $task->elsemployees_email;

		// dd($task);

		if($updatedleave){
				
				
				// Mail::send('els.email.approvedrequest', [ 
				
				// 	'datas' =>$task,
				// ],
				// function ($message) use ($requester) {
				// $message->to('hr@bizzworld.com')
				// ->bcc('muhammad.mehroz@bizzworld.com')
				// ->cc(session()->get("email"))
				// ->cc($requester)
				// ->subject('Employee Leave Approved By: ' . session()->get("name"));
				// });
				
          }else{
              echo json_encode(false);
          }
			}
		

		
		else{
			$empleavetable = elsleaverequest::on('mysql')->findOrFail($id);
		  if(session()->get("role") <= 2 && session()->get("email") == "salman.khairi@bizzworld.com"){
		  // dd("yes");
		  $empleavetable->elsleaverequests_status = "Approved";
		  $empleavetable->elsleaverequests_coostatus = "Approved";
		  $empleavetable->elsleaverequests_coocomment = $comment;
		  $empleavetable->elsleaverequests_cooempid = session()->get("id");
		  $empleavetable->elsleaverequests_coodate = date('Y-m-d');
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();
		  }elseif(session()->get("role") == 3 && session()->get("email") != "salman.khairi@bizzworld.com"){
		  	// dd("test");
		  $empleavetable->elsleaverequests_status = "Approved";
		  $empleavetable->elsleaverequests_managerstatus = "Approved";
		  $empleavetable->elsleaverequests_approvercomment = $comment;
		  $empleavetable->elsleaverequests_approverempid = session()->get("id");
		  $empleavetable->elsleaverequests_approverdate = date('Y-m-d');
		  $empleavetable->elsleaverequests_changeby = session()->get("name");
		  $updatedleave = $empleavetable->save();
		  }
	



				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsleaverequests.elsleaverequests_id','=',$id)
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->first();
				
				
				
			$requester = $task->elsemployees_email;

		// dd($task);

		if($updatedleave){
				
				
				// Mail::send('els.email.approvedrequest', [ 
				
				// 	'datas' =>$task,
				// ],
				// function ($message) use ($requester) {
				// $message->to('hr@bizzworld.com')
				// ->bcc('muhammad.mehroz@bizzworld.com')
				// ->cc(session()->get("email"))
				// ->cc($requester)
				// ->subject('Employee Leave Approved By: ' . session()->get("name"));
				// });
				
          }else{
              echo json_encode(false);
          }

		}
		 
		
	}
	else{
		return redirect('/')->with('message','Something Went Wrong');
	}
	
}

	

	public function passchange(){
			return view('pach');
	}
	
	 public function passubmit(Request $get){
     

    	if($get->password == ""){
            return redirect('/chapass')->with('message','Please Enter Password');
        }
        	if($get->password_confirm == ""){
            return redirect('/chapass')->with('message','Please Enter Confirm Password');
        }
        if($get->password != $get->password_confirm ){
            return redirect('/chapass')->with('message','New Password And Confirm Password Are Not Same');
        }
		DB::connection('mysql')->table('elsemployees')
                 ->where('elsemployees_name','=',session()->get("name"))
                 ->update(['elsemployees_password' => $get->password]); 

                 
                return redirect('/chapass')->with('message','Your Password Has Been Updated.');
    }

	public	function viewdatewisereport($t,$f){
			if (session()->get("email")) {
				if(session()->get("role") <= 2){
					
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->whereBetween ('elsleaverequests_leavestartdate', [$t, $f])
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				// ->orderBy('elsleaverequests.elsleaverequests_status','ASC')
				->get();
					
				}elseif(session()->get("email") == "salman.khairi@bizzworld.com"){
					
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
				->orWhere('elsleaverequests.elsleaverequests_status','=',"COO Approval Required")
				->whereBetween ('elsleaverequests_leavestartdate', [$t, $f])
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->get();
					
				}else{
				
				$task = DB::connection('mysql')->table('elsleaverequests')
				->join ('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
				->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
				->whereBetween ('elsleaverequests_leavestartdate', [$t, $f])
				->where('elsemployees.elsemployees_status','=',2)
				->select('elsleaverequests.*','elsemployees.*')
				->get();
				
				}
				//    dd($task);
						return view('els.emprequest',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
}
	public function editattendance($id){
		
		
		if(session()->get("email")){
				$task = DB::connection('mysql')->table('attendance')
				->where('attendance.attendance_id','=',$id)
				->select('attendance.*')
				->first();
				

				
				   // dd($task);
						return view('modal.editattendance',['data' => $task ]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
		
		
	}
	public function submiteditattendancerequest(Request $request)
	{
	// dd($request);
        if(session()->get("email")) {
            // dd($request);
          
             $created =   DB::connection('mysql')->table('attendance')
                ->where('attendance.attendance_id', '=', $request->hdnattid)
                ->update(['attendance_mark' => $request->attendacestatus]);
            // dd($cond);
            if($created){
                echo json_encode(true);
            }else{
                echo json_encode(false);
            }//end if else.
          }     
            else
            {
                        return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }

	}


	public function submitattendance(Request $request) {
       	// dd($request);
        if (session()->get("email")){
        // $attendance = explode("~", $request->invsdreqstatus);
         $dated = explode("-",$request->attendancedate);
        // dd($requeststatus);
		$bad = 0;
          foreach ($request->invsdreqstatus as $markatt) {
          	   // $attendance = explode("~", $request->invsdreqstatus);
         	$uniquedate = DB::connection('mysql')->table('attendance')
				->where('attendance.elsemployees_empid','=',$request->emp_batchid[$bad])
				->select('attendance.attendance_date')
				->get();
					$udate = array();

				  foreach ($uniquedate as $tabb) {

                  
                   $udate = $tabb->attendance_date;
               }
// dd($udate);
         if($request->attendancedate !=$udate){
         	// dd("yes");
         		DB::connection('mysql')->table('attendance')->insert([
			    'attendance_date' => $request->attendancedate,
			    'attendance_month' =>  $dated[1],
			    'attendance_mark' => $markatt,
			    'elsemployees_empid' =>  $request->emp_batchid[$bad],
			    'attendance_submitby' => session()->get('name')
			]);
         		$bad++;

         	}else
            { 
            	
                        return redirect('/attendance')->with('message','Attendance Already Marked');
            }
        }
        return redirect('/attendance')->with('message','Attendance Marked Successfully');
           // return redirect('/viewusers');
     }
         else
            {
                        return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }
    }
    public function selectattendancemonth(){
      return view('selectattendancemonth');
    }
	//End attendace update

    //Forget Function
    public function forgetpassword(){
      return view('forgetpassword');
    }
	
    public function forget_submit(Request $get){
    	if($get->email == ""){
            return redirect('/')->with('message','Please Enter Email');
        }
      $verify_token =  $this->generateRandomString(100);
      $data = array();
      $data['verify_token'] = $verify_token;
       $cmd = DB::connection('mysql')->table('elsemployees')
                 ->where('elsemployees_email', $get->email)
                 ->update(['verify_token' => $verify_token]);
      if($cmd){
        $toemail = $get->email;
              Mail::send('email.forget_password', ['name' => 'AU Telecom',
                    'email' => 'hr@bizzworld.com','verify_token' => $verify_token,],
                function ($message) use ($toemail) {
                  $message->to($toemail)
                //->subject('Employee Leave Request Submited By: Noman');
                ->subject('Forget Password');
                });
        return redirect('/')->with('message','Check Your Email'); 
      } else{
        return redirect('/')->with('message','Something went wrong'); 
      }
                
      //dd($get);
    }
	
    public function forget($verify_token){
      $result =  DB::connection('mysql')->table('elsemployees')
                 ->where('verify_token', '=',$verify_token)
                 ->select('elsemployees.elsemployees_empid')->first();

      if(!empty($result)){
        $data = array();
        $data['verify_token'] = $verify_token;
       return view('resetpassword',$data);
      } else{
         return redirect('/')->with('message','Link Expired.');
      }
    }
	
    public function reset_submit(Request $get){
      // dd($get);
    	if($get->verify_token){
		      $cmd = DB::connection('mysql')->table('elsemployees')
		                 ->where('verify_token', $get->verify_token)
		                 ->update(['elsemployees_password' => $get->password,'verify_token' => '']);
		      if($cmd){
		        return redirect('/')->with('message','Password Has been Reset Successfully.'); 
		      } else{
		        return redirect('/')->with('message','Something Went Wrong'); 
		      }	
		}else{

			return redirect('/')->with('message','verify token required');
		}
    }

    public  function generateRandomString($length = 20){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
	}
	
	public function emailtemp(){

		return view('els.emailtemp');
	}
//hamza ahmed
	public function departmentlist(){
		if(session()->get("email")){
			
			if(session()->get("role") <= 2){
				
				$task = DB::connection('mysql')->table('hrm_Department')
				->select('hrm_Department.*')
				->where('status_id','=',2)
				->get();
				// dd($task);
				
			}else{
			
			}
					return view('departmentlist',['data'=>$task]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}

	}

	public function adddepartmentmodal(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
				}else{
				
				}
						return view('modal.adddepartment');
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}

		}

	public function adddepartment(Request $request){

		if(session()->get("email")){

			if(session()->get("role") <= 2){
				
				$adddept[] = array(
					'dept_name' => $request->deptname,
					);
					
				DB::connection('mysql')->table('hrm_Department')->insert($adddept);

				if($adddept){
						echo json_encode(true);
							}
				else{
						echo json_encode(false);
					}
						
					}
					else{
						return redirect('/');

						}
			} 
		}

	public function editdepartmentmodal($id){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
				
					$task = DB::connection('mysql')->table('hrm_Department')
						->where('hrm_Department.dept_id','=',$id)
						->select('hrm_Department.*')
						->first();
					
				}else{
				
				}
						return view('modal.editdepartment',['data' => $task ]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
		
		}


		public function editsubmitdepartment(Request $request){

			if(session()->get("email")){
	
				if(session()->get("role") <= 2){

					$adddept =   DB::connection('mysql')->table('hrm_Department')
					->where('hrm_Department.dept_id', '=', $request->hdndeptid)
					->update(['dept_name' => $request->deptname]);
					
				
	
					if($adddept){
							echo json_encode(true);
								}
					else{
							echo json_encode(false);
						}
							
						}
						else{
							return redirect('/');
	
							}
				} 
			}
			public function deletedepartment($id){

			if(session()->get("email")){
	
				if(session()->get("role") <= 2){

				$adddept =   DB::connection('mysql')->table('hrm_Department')
				->where('dept_id', '=', $id)
				->update(['status_id' => 1]);
				
			

				if($adddept){
						echo json_encode(true);
				}else{
						echo json_encode(false);
				}
				}else{
						echo json_encode(false);

				}
				}else{
						echo json_encode(false);
				}
			}
//Designation Functions

			public function designationlist(){
				if(session()->get("email")){
					
					if(session()->get("role") <= 2){
						
						$task = DB::connection('mysql')->table('designation')
						->select('designation.*')
						->get();
						// dd($task);
						
					}else{
					
					}
							return view('designationlist',['data'=>$task]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}

			}

			public function adddesignationmodal(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
				}else{
				
				}
						return view('modal.adddesignation');
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}

		}

		public function adddesignation(Request $request){

			if(session()->get("email")){

				if(session()->get("role") <= 2){
					
					$adddesig[] = array(
						'DESG_NAME' => $request->designame,
						);
						
					DB::connection('mysql')->table('designation')->insert($adddesig);

					if($adddesig){
							echo json_encode(true);
								}
					else{
							echo json_encode(false);
						}
							
						}
						else{
							return redirect('/');

							}
				} 
			}

			public function editdesignationmodal($id){
				if(session()->get("email")){
					
					if(session()->get("role") <= 2){
					
						$task = DB::connection('mysql')->table('designation')
							->where('designation.DESG_ID','=',$id)
							->select('designation.*')
							->first();
						
					}else{
					
					}
							return view('modal.editdesignation',['data' => $task ]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}
			
			}

			public function editsubmitdesignation(Request $request){

				if(session()->get("email")){
		
					if(session()->get("role") <= 2){

						$adddesig =   DB::connection('mysql')->table('designation')
						->where('designation.DESG_ID', '=', $request->hdndesigid)
						->update(['DESG_NAME' => $request->designame]);
						
					
		
						if($adddesig){
								echo json_encode(true);
									}
						else{
								echo json_encode(false);
							}
								
							}
							else{
								return redirect('/');
		
								}
					} 
				}

//Holidays Functions

			public function holidayslist(){
				if(session()->get("email")){
					
					if(session()->get("role") <= 4){
						
						$task = DB::connection('mysql')->table('holidays')
						->select('holidays.*')
						->get();
						// dd($task);
						
					}else{
					
					}
							return view('holidayslist',['data'=>$task]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}

			}

			public function addholidaysmodal(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
				}else{
				
				}
						return view('modal.addholidays');
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}

		}

			public function addholidays(Request $request){

			if(session()->get("email")){

				if(session()->get("role") <= 2){
					
					$addholi[] = array(
						'HOLI_TITLE' => $request->holititle,
						'HOLI_DATE' => $request->holidate,
						);
						
					DB::connection('mysql')->table('holidays')->insert($addholi);

					if($addholi){
							echo json_encode(true);
								}
					else{
							echo json_encode(false);
						}
							
						}
						else{
							return redirect('/');

							}
				} 
			}

			public function editholidaysmodal($id){
				if(session()->get("email")){
					
					if(session()->get("role") <= 2){
					
						$task = DB::connection('mysql')->table('holidays')
							->where('holidays.HOLI_ID','=',$id)
							->select('holidays.*')
							->first();
						
					}else{
					
					}
							return view('modal.editholidays',['data' => $task ]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}
			
			}

			public function editsubmitholidays(Request $request){

				if(session()->get("email")){
		
					if(session()->get("role") <= 2){

						$addholi =   DB::connection('mysql')->table('holidays')
						->where('holidays.HOLI_ID', '=', $request->hdnholiid)
						->update(['HOLI_TITLE' => $request->holititle,'HOLI_DATE' => $request->holidate]);
						
					
		
						if($addholi){
								echo json_encode(true);
									}
						else{
								echo json_encode(false);
							}
								
							}
							else{
								return redirect('/');
		
								}
					} 
				}

				public function deleteholidaysmodal($id){
					if(session()->get("email")){
						
						if(session()->get("role") <= 2){
						
							$task = DB::connection('mysql')->table('holidays')
								->where('holidays.HOLI_ID','=',$id)
								->select('holidays.*')
								->first();
							
						}else{
						
						}
								return view('modal.deleteholidays',['data' => $task ]);
					}else{
							return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
					}
				
				}

				public function destroyholiday($id){
					DB::connection('mysql')->table('holidays')
					->where('holidays.HOLI_ID','=',$id)
					->delete();

					return redirect('/holidayslist')->with('message','Holiday Successfully Deleted!');
				}

//Resignation Functions

			public function resignationlist(){
				if(session()->get("email")){
					
					if(session()->get("role") <= 2){
					
						$task = DB::connection('mysql')->table('elsemployees')
						->join ('resignation','resignation.resig_empid', '=','elsemployees.elsemployees_batchid')
						->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
						->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
						->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
						->where('elsemployees.elsemployees_status','=',2)
						->select('resignation.*','elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
						->get();
						// dd($task);
					
					}elseif (session()->get("role") == 3) {
				
					$task = DB::connection('mysql')->table('elsemployees')
						->join ('resignation','resignation.resig_empid', '=','elsemployees.elsemployees_batchid')
						->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
						->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
						->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
						->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
						->where('elsemployees.elsemployees_status','=',2)
						->select('resignation.*','elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
						->get();
					
					}else{
					$task = DB::connection('mysql')->table('elsemployees')
						->join ('resignation','resignation.resig_empid', '=','elsemployees.elsemployees_batchid')
						->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
						->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
						->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
						->where('elsemployees.elsemployees_batchid','=',session()->get("batchid"))
						->where('elsemployees.elsemployees_status','=',2)
						->select('resignation.*','elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
						->get();
					}
							return view('resignationlist',['data'=>$task]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}

			}

			public function addresignationmodal(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 4){
					
				}else{
				
				}
						return view('modal.addresignation');
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}

		}

			public function addresignation(Request $request){

				if(session()->get("email")){

					if(session()->get("role") <= 4){
						
						$addresig[] = array(
							'resig_empid' => $request->empid,
							'resig_lastdate' => $request->lastdate,
							'resig_submitdate' => $request->submitdate,
							'resig_reason' => $request->resigreason,
							'resig_status' => 'Submited',
							);
							
							DB::connection('mysql')->table('resignation')->insert($addresig);

								if($addresig){
										echo json_encode(true);
								}else{
										echo json_encode(false);
								}
								
					}else{
						return redirect('/');

					}
				} 
			}

			public function editresignationmodal($id){
				if(session()->get("email")){
					
					if(session()->get("role") <= 2){
					
						$task = DB::connection('mysql')->table('resignation')
							->where('resignation.resignation_id','=',$id)
							->select('resignation.*')
							->first();
						
					}else{
					
					}
							return view('modal.editresignation',['data' => $task ]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}
			
			}

			public function editsubmitresignation(Request $request){

				if(session()->get("email")){
		
					if(session()->get("role") <= 2){

						$addresig =   DB::connection('mysql')->table('resignation')
						->where('resignation.resignation_id', '=', $request->hdnresigid)
						->update(['resig_empid' => $request->empid,'resig_lastdate' => $request->lastdate,'resig_submitdate' => $request->submitdate,'resig_reason' => $request->resigreason,'resig_status' => 'Submited']);
						
					
		
						if($addresig){
							// dd(yes);
								echo json_encode(true);
									}
						else{
							// dd(no);
								echo json_encode(false);
							}
								
							}
							else{
								return redirect('/');
		
								}
					} 
				}



			public function viewresignationmodal($id){
				if(session()->get("email")){
					
					if(session()->get("role") <= 2){
					
						$task = DB::connection('mysql')->table('resignation')
							->where('resignation.resignation_id','=',$id)
							->select('resignation.*')
							->first();
						
					}else{
					
					}
							return view('modal.viewresignation',['data' => $task ]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}
			
			}

			public function viewsubmitresignation(Request $request){

				if(session()->get("email")){
		
					if(session()->get("role") <= 2){

						$addresig =   DB::connection('mysql')->table('resignation')
						->where('resignation.resignation_id', '=', $request->hdnresigid)
						->update(['resig_empid' => $request->empid,'resig_lastdate' => $request->lastdate,'resig_submitdate' => $request->submitdate,'resig_reason' => $request->resigreason,'resig_status' => $request->resigstatus]);
						
					
		
						if($addresignation){
								echo json_encode(true);
									}
						else{
								echo json_encode(false);
							}
								
							}
							else{
								return redirect('/');
		
								}
					} 
				}

//announcement Functions

			public function announcementlist(){
				if(session()->get("email")){
					
					if(session()->get("role") <= 4){
						
						$task = DB::connection('mysql')->table('announcement')
						->select('announcement.*')
						->orderBy('announcement_id', 'desc')
						->get();
						// dd($task);
						
					}else{
					
					}
							return view('announcementlist',['data'=>$task]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}

			}

			public function addannouncementmodal(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					$depart = DB::connection('mysql')->table('hrm_Department')
					->select('hrm_Department.*')
					->get();
				}else{
				
				}
						return view('modal.addannouncement',['depart' => $depart]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}

		}

			public function addannouncement(Request $request){
				if(session()->get("email")){
				if(session()->get("role") <= 2){
					$this->validate($request, [
                	  	'image'=>'mimes:jpeg,bmp,png,jpg,gif,mp4,wmv,avi,mkv,mpg,mpeg,webm,|max:80120',
                	    'announcementfor'=>'required',
                	    'annoutitle'=>'required',
                	    // 'annoudesc'=>'required',
            	    ]);
				$allowedimageext = array('jpeg','bmp','png','jpg');
				if($request->hasFile('image') && $request->image->isValid()){
		                
		                    
		                    $number = rand(1,999);

		                    $numb = $number / 7 ;


		                    $extension = $request->image->extension();
		                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
		                    $filename = $request->image->move(public_path('announcement'),$filename);

		     //                if (in_array($extension, $allowedimageext)) {
		     //                $img = Image::make($filename)->resize(800,800, function($constraint) {
		     //                    $constraint->aspectRatio();
		     //                });
							// $img->save($filename);
							// }

		                    $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;


		                }else{
		                
		                $filename = 'no_image.jpg';    
		                }
		                $annfor = implode(',', $request->announcementfor);
					$addannou[] = array(
						'announcement_title' => $request->annoutitle,
						'announcement_desc' => $request->annoudesc,
						'announcement_image' => $filename,
						'announcement_for' => $annfor,
						'created_at' => date('Y-m-d h:i:s'),
						'created_by' => session()->get('name'),
						);
					DB::connection('mysql')->table('announcement')->insert($addannou);

					if($addannou){
							return redirect('/announcementlist')->with('message','Annoouncement added Successfully');;
							// echo json_encode(true);
								}
					else{
							// echo json_encode(false);
						return redirect('/announcementlist')->with('message','Oops! Something went wrong');;
						}
							
						}
						else{
							return redirect('/')->with('message','Reach HR For Access');

							}
						}else{
							return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;

							} 
			}

			public function editannouncementmodal($id){
				if(session()->get("email")){
					
					if(session()->get("role") <= 2){
					
						$task = DB::connection('mysql')->table('announcement')
							->where('announcement.announcement_id','=',$id)
							->select('announcement.*')
							->first();
						
					}else{
					
					}
							return view('modal.editannouncement',['data' => $task ]);
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}
			
			}

			public function editsubmitannouncement(Request $request){

				if(session()->get("email")){
		
					if(session()->get("role") <= 2){
						$this->validate($request, [
                	    'image'=>'mimes:jpeg,bmp,png,jpg,gif,mp4,wmv,avi,mkv,mpg,mpeg,webm,|max:20120',
	            	    ]);
					$allowedimageext = array('jpeg','bmp','png','jpg');
					if($request->hasFile('image') && $request->image->isValid()){
			                
			                    
			                    $number = rand(1,999);

			                    $numb = $number / 7 ;


			                    $extension = $request->image->extension();
			                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
			                    $filename = $request->image->move(public_path('announcement'),$filename);

			                    if (in_array($extension, $allowedimageext)) {
			                    $img = Image::make($filename)->resize(800,800, function($constraint) {
			                        $constraint->aspectRatio();
			                    });
								$img->save($filename);
			                	}

			                    $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;


			                }else{
			                
			                $filename = 'no_image.jpg';    
			                }
			                if ($filename == 'no_image.jpg') {
			                	$addannou =   DB::connection('mysql')->table('announcement')
								->where('announcement.announcement_id', '=', $request->hdnannouid)
								->update(['announcement_title' => $request->annoutitle,'announcement_desc' => $request->annoudesc]);
			                }else{
						$addannou =   DB::connection('mysql')->table('announcement')
						->where('announcement.announcement_id', '=', $request->hdnannouid)
						->update(['announcement_title' => $request->annoutitle,
							'announcement_desc' => $request->annoudesc,
							'announcement_image' => $filename,
							'updated_at' => date('Y-m-d h:i:s'),
							'updated_by' => session()->get('name')]);
						}
					
		
						if($addannou){
								return redirect('/announcementlist')->with('message','Annoouncement edit Successfully');;
								// echo json_encode(true);
									}
						else{
								return redirect('/announcementlist')->with('message','Oops! Something went wrong');;
								// echo json_encode(false);
							}
								
							}else{
								return redirect('/')->with('message','Reach HR For Access');
								}
					}else{
								return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
								} 
				}

				public function destroy($id){
					DB::connection('mysql')->table('announcement')
					->where('announcement.announcement_id','=',$id)
					->delete();

					return redirect('/announcementlist')->with('message','Announcement Successfully Deleted!');

					// return view('announcementlist')->with('message', 'Announcement Successfully Deleted!');
				}


				//HRM Form

				public	function departmentpictures(){
			    	if (session()->get("email")) {
						$task =  DB::connection('mysql')->table('elsemployees')
						->join('hrm_Department', 'hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
					  	->where('elsemployees.elsemployees_name','=',session()->get('name'))
					  	->where('elsemployees.elsemployees_status','=',2)
					  	->select('elsemployees.*','hrm_Department.*')
					  	->first();
					return view('hrmform',['data'=> $task,]);
			        } else {
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
					}
				}


				public function savepictures(Request $request){
					
					if(session()->get("name")){
					$empEmail = session()->get("name");
				
						if ($empEmail != null) {
					
					//start image validation
						$this->validate($request,[
							'dept_picture.*' => 'mimes:jpeg,bmp,png|max:3120',
							'dept_video' => 'mimes:mp4,wmv,3gp|max:3420',
							'deptid' => 'required',
							'description' => 'required',
							 ]);
							 
							 
						// dd($request);	 
							 //end image validation
						 $images = $request->dept_picture;
						 
						 // dd($images[1]);
						$index = 0 ;
						
							$filename = array();
							// dd("1");
							$mehimg = array();
						   
								
						if(!empty($images)){
						foreach($images as $ima){
														
							
							$number = rand(1,999);
		
							$numb = $number / 7 ;
		
		
							$extension = $request->dept_picture[$index]->extension();
							
							$filename[$index]  = date('Y-m-d')."_".$numb."_".$index."_.".$extension;
							$filename[$index] = $request->dept_picture[$index]->move(public_path('img'),$filename[$index]);
		
							$img = Image::make($filename[$index])->resize(800,800, function($constraint) {
	                        $constraint->aspectRatio();
	                    });

							$img->save($filename[$index]);

							$filename[$index] = date('Y-m-d')."_".$numb."_".$index."_.".$extension;

							array_push($mehimg,$filename[$index]);

							$index++;

						}
						
						}
						if($filename){
							$filename = implode("|",$mehimg);
							
						}else{
							$filename = 'no_image.jpg';
						}
						
						if($request->hasFile('dept_video') && $request->dept_video->isValid()){
							
							$number = rand(1,999);
							$numb = $number / 7 ;

							$extension = $request->dept_video->extension();
							$filename2  = $request->deptid."_".date('Y-m-d')."_.".$numb."_.".$extension;
							$filename2 = $request->dept_video->move(public_path('video'),$filename2);
							$filename2 = $request->deptid."_".date('Y-m-d')."_.".$numb."_.".$extension;


						}else{
							$filename2 = 'novideo.png';
						}

						$adds[] = array(
							'dept_name' => $request->deptid,
							'dept_description' => $request->description,
							'elsemployees_name' => session()->get("name"),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
							'dept_date' => date('Y-m-d'),
							'dept_picture' => $filename,
							'dept_video' =>  $filename2,
						);
						// dd($adds);
						DB::connection('mysql')->table('deptpictures')->insert($adds);
						// dd($adds);
						 // DB::table('stores')
			    //              ->where('store_uid', $request->storeuid)
			    //              ->update(['covidsubmited' => "Yes"]); 
						// return redirect()->back()->withSuccess('Successfull');
							return redirect('/hrmform')->with('message','Successfull Uploaded');
					} else {
						return redirect('/')->with('message','Please login');
				
					}	
					} else {
						return redirect('/')->with('message','Please login');
				
					}
				}


				public function hrmreport() {
						if(session()->get("role") <= 2 || session()->get('email') == "salman.khairi@bizzworld.com"){
						$task = DB::connection('mysql')->table('elsemployees')
						->join('hrm_Department', 'hrm_Department.dept_id', '=', 'elsemployees.elsemployees_departid')
						->join('deptpictures', 'deptpictures.elsemployees_name', '=', 'elsemployees.elsemployees_name')
						->where('elsemployees.elsemployees_status','=',2)
						->select('elsemployees.*','deptpictures.*','hrm_Department.*')
						->get();
						return view('hrmreport',['data' => $task]);
					
					}else{
								return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
						}
				}

				public function viewpicture($id){
					if(session()->get("email")){
					 $task =  DB::connection('mysql')->table('deptpictures')
			        ->where('deptpictures.deptpic_id','=',$id)
			        ->select('deptpictures.*')
			        ->get()[0];
			        
			        return view('modal.viewpicture',['data' => $task]);
					
					}else{
								return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
						}
				}

				//End HRM Form
				public function downloadExcel(){
					// dd($request->exceldatagive);
					//dd("WEB");
					// $data = avpdetail::get()->toArray();
					if (session()->get("email")) {
					//dd("WEB");

					$type= "xls";
					
					return Excel::download(new EmployeesExport, 'ELS.xlsx');
			
					} else {
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
					}
				}

				public function empleavechart(){
					if(session()->get("email")){
					$maintask;
						// dd(session()->get("email"));
				
						if(session()->get("role") <= 2 || session()->get("email") == "salman.khairi@bizzworld.com"){
							    $employeename = DB::connection('mysql')->table('elsemployees')
					          ->select('elsemployees.*')
					          ->get();
							$currentyear = date('Y');
							$currentmonth = date('m');
							foreach($employeename as $name){
							$maintask[$name->elsemployees_empid] = DB::connection('mysql')->table('elsleaverequests')
							->join('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
							->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$currentyear.'-'.$currentmonth.'-'."%")
							->where('elsleaverequests.elsleaverequests_empid','=',$name->elsemployees_empid)
							->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
							->where('elsemployees.elsemployees_status','=',2)
							->select('elsleaverequests.elsleaverequests_totalleavedays','elsemployees.elsemployees_name')
							 ->sum('elsleaverequests.elsleaverequests_totalleavedays');
							}
							// dd($task);
							
						}elseif(session()->get("role") == 3 ){
								    $employeename = DB::connection('mysql')->table('elsemployees')
								    ->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
						          ->select('elsemployees.*')
						          ->get();
							$currentyear = date('Y');
							$currentmonth = date('m');
							foreach($employeename as $name){
							$maintask[$name->elsemployees_empid] = DB::connection('mysql')->table('elsleaverequests')
							->join('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
							->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$currentyear.'-'.$currentmonth.'-'."%")
							->where('elsleaverequests.elsleaverequests_empid','=',$name->elsemployees_empid)
							->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
							->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
							->where('elsemployees.elsemployees_status','=',2)
							->select('elsleaverequests.elsleaverequests_totalleavedays','elsemployees.elsemployees_name')
							 ->sum('elsleaverequests.elsleaverequests_totalleavedays');
							}
						
						}
						 $all=['employeename'=>$employeename,'maintask'=>$maintask];
						return view('employeechart',['data'=>$all]);
						
					}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
					}
				}

		
	
		public function depleavechart(){
			
			if(session()->get("role") <= 2 || session()->get("email") == "salman.khairi@bizzworld.com"){
			
					$currentyear = date('Y');
					$currentmonth = date('m');
					
					
					$employeedepart = DB::connection('mysql')->table('hrm_Department')
					->select('hrm_Department.*')
					->get();
					
					foreach($employeedepart as $dept){

						
						$maintask[$dept->dept_id] = DB::connection('mysql')->table('elsleaverequests')
									->join('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
									->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$currentyear.'-'.$currentmonth.'-'."%")
									->where('elsemployees.elsemployees_departid','=',$dept->dept_id)
									->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
									->where('elsemployees.elsemployees_status','=',2)
									->select('elsleaverequests.elsleaverequests_totalleavedays')
									->sum('elsleaverequests.elsleaverequests_totalleavedays');
							
							
					}	
					
					$all=['employeedepart'=>$employeedepart,'empdata'=>$maintask];
					
					
					// dd($all);
					
					
					// return view('depleavechart',['data'=>$all]);
					return view('depleavesearchchart',['data'=>$all]);
				
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}
			
			
			
		}

		public function depleavesearchchart(){
			
			if(session()->get("role") <= 2 || session()->get("email") == "salman.khairi@bizzworld.com"){
			
					$currentyear = date('Y');
					$currentmonth = date('m');
					
					
					$employeedepart = DB::connection('mysql')->table('hrm_Department')
					->select('hrm_Department.*')
					->get();
					
					foreach($employeedepart as $dept){

						
						$maintask[$dept->dept_id] = DB::connection('mysql')->table('elsleaverequests')
									->join('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
									->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$currentyear.'-'.$currentmonth.'-'."%")
									->where('elsemployees.elsemployees_departid','=',$dept->dept_id)
									->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
									->where('elsemployees.elsemployees_status','=',2)
									->select('elsleaverequests.elsleaverequests_totalleavedays')
									->sum('elsleaverequests.elsleaverequests_totalleavedays');
							
							
					}	
					
					$all=['employeedepart'=>$employeedepart,'empdata'=>$maintask];
					
					
					// dd($all);
					
					
					return view('depleavesearchchart',['data'=>$all]);
				
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}
			
			
			
		}

		public function depleavesearchmonthchart($month){
			
			if(session()->get("role") <= 2 || session()->get("email") == "salman.khairi@bizzworld.com"){
			
					$currentyear = date('Y');
					$searchmonth = $month;

					// dd($currentyear);
					
					
					$employeedepart = DB::connection('mysql')->table('hrm_Department')
					->select('hrm_Department.*')
					->get();
					
					foreach($employeedepart as $dept){

						
						$maintask[$dept->dept_id] = DB::connection('mysql')->table('elsleaverequests')
						->join('elsemployees','elsemployees.elsemployees_empid', '=','elsleaverequests.elsleaverequests_empid')
						->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$currentyear.'-'.$searchmonth.'-'."%")
						->where('elsemployees.elsemployees_departid','=',$dept->dept_id)
						->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
						->where('elsemployees.elsemployees_status','=',2)
						->select('elsleaverequests.elsleaverequests_totalleavedays')
						->sum('elsleaverequests.elsleaverequests_totalleavedays');
							
							
					}	

					// dd($maintask);
										
					$all=['employeedepart'=>$employeedepart,'empdata'=>$maintask];
					
					
					// dd($all);
					
					
					return view('depleavesearchchart',['data'=>$all]);
				
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
				}
			
			
			
		}

	public function usertimein() {
        if (session()->get("email")){
        		DB::connection('mysql')->table('attendance')->insert([
			    'attendance_date' => date('Y-m-d'),
			    'attendance_month' =>  date('m'),
			    'attendance_mark' => date('h:i:s'),
			    'elsemployees_empid' =>  session()->get('batchid'),
			    'attendance_submitby' => session()->get('name')
			]);
		}else{
           		return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function usertimeout() {
        if (session()->get("email")){
        		DB::connection('mysql')->table('attendancetimeout')->insert([
			    'attendance_date' => date('Y-m-d'),
			    'attendance_month' =>  date('m'),
			    'attendance_mark' => date('h:i:s'),
			    'elsemployees_empid' =>  session()->get('batchid'),
			    'attendance_submitby' => session()->get('name')
			]);
        		return redirect('/maindashboard')->with('message','Timeout Successfully');	
		}else{
           		return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function viewattendnceout(){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
					$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
				
				}
						return view('viewattendnceout',['data'=>$task]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
	public function viewempattendanceout($id){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('attendancetimeout')
			->join ('elsemployees','elsemployees_batchid', '=','attendancetimeout.elsemployees_empid')
			->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
			->where('attendancetimeout.elsemployees_empid','=',$id)
			->where('elsemployees.elsemployees_status','=',2)
			->select('attendancetimeout.*','hrm_Department.dept_name','elsemployees.elsemployees_reportingto','elsemployees.elsemployees_name','elsemployees.elsemployees_fname')
			->get();
			return view('viewempattendanceout',['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function selectattendanceoutmonth(){
      return view('selectattendanceoutmonth');
    }
    public function submitselectattendanceout(Request $request){
			if(session()->get("email")){
				
				if(session()->get("role") <= 2){
					
					$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
					// dd($task);
					
				}else{
				
				$task = DB::connection('mysql')->table('elsemployees')
					->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
					->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
					->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
					->where('elsemployees.elsemployees_reportingto','=',session()->get("id"))
					->where('elsemployees.elsemployees_status','=',2)
					->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
					->get();
				
				}
				$sendyear = $request->attendanceyear;
				$setmonth = $request->attendancemonth;
					$allData = array("maindata" => $task,"sendyear" => $sendyear, "sendmonth" => $setmonth);
						return view('attendanceoutreport',['data'=>$allData]);
			}else{
					return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	
	}
    public function attendancecorrection(){
		if(session()->get("email")){
			$task;
			if (session()->get('role') == 4) {
				$task = DB::connection('mysql')->table('attendancecorrection')
					->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
					->where('attendancecorrection.status_id','=',2)
					->where('elsemployees.elsemployees_empid','=',session()->get('id'))
					->where('elsemployees.elsemployees_status','=',2)
					->select('attendancecorrection.*','elsemployees.elsemployees_name')
					->get();
			}elseif(session()->get('role') == 3){
				$task = DB::connection('mysql')->table('attendancecorrection')
					->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
					->where('attendancecorrection.status_id','=',2)
					->where('attendancecorrection.attendancecorrection_status','=',"Pending")
					->where('elsemployees.elsemployees_reportingto','=',session()->get('id'))
					->where('elsemployees.elsemployees_status','=',2)
					->select('attendancecorrection.*','elsemployees.elsemployees_name')
					->get();
			}else{
				$task = DB::connection('mysql')->table('attendancecorrection')
				->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
				->where('attendancecorrection.status_id','=',2)
				->where('attendancecorrection.attendancecorrection_status','=',"Proceed")
				->where('elsemployees.elsemployees_status','=',2)
				->select('attendancecorrection.*','elsemployees.elsemployees_name')
				->get();
			}
			return view('attendancecorrection',['data'=>$task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function attendancecorrectionforadmin(){
		if(session()->get("email")){
				$task = DB::connection('mysql')->table('attendancecorrection')
					->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
					->where('attendancecorrection.status_id','=',2)
					->where('attendancecorrection.attendancecorrection_status','=',"Pending")
					->where('elsemployees.elsemployees_reportingto','=',session()->get('id'))
					->where('elsemployees.elsemployees_status','=',2)
					->select('attendancecorrection.*','elsemployees.elsemployees_name')
					->get();
					// dd($task);
			return view('attendancecorrection',['data'=>$task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addcorrectionmodal($date){
			if(session()->get("email")){
				return view('modal.addcorrection',['data'=>$date]);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	}

	public function submitcorrection(Request $request){
			if(session()->get("email")){
				$this->validate($request, [
            	    'image'=>'mimes:jpeg,bmp,png|max:5120'
        	    ]);
        	    $this->validate($request, [
            	    'title'			=>'required',
            	    'description'	=>'required',
            	    'affecteddate'	=>'required'
            	]);
            	$checkduplicate = DB::connection('mysql')->table('attendancecorrection')
				->where('created_by','=',session()->get('batchid'))
				->where('attendancecorrection_affdate','=',$request->affecteddate)
				->where('status_id','!=',1)
				->select('attendancecorrection_id')
				->count();
				if ($checkduplicate != 0) {
					return redirect('/dailyattendance')->with('message','Request Already Submited');;
				}
            	$correctionamount;
				if ($request->title == "Late") {
					$correctionamount = 0.25;
				}
				elseif ($request->title == "Half Day") {
					$correctionamount = 0.5;
				}
				elseif ($request->title == "OFF") {
					$correctionamount = 1;
				}
				elseif ($request->title == "Absent") {
					$correctionamount = 1;
				}
				// dd($correctionamount);
			if($request->hasFile('image') && $request->image->isValid()){
	                
	                    
	                    $number = rand(1,999);

	                    $numb = $number / 7 ;


	                    $extension = $request->image->extension();
	                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
	                    $filename = $request->image->move(public_path('attendancecorrection'),$filename);

	                        
	                    $img = Image::make($filename)->resize(800,800, function($constraint) {
	                        $constraint->aspectRatio();
	                    });

	                    $img->save($filename);

	                    $filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;


	                }else{
	                
	                $filename = 'no_image.jpg';    
	                }
	         	$addannou[] = array(
					'attendancecorrection_title' 	=> $request->title,
					'attendancecorrection_desc' 	=> $request->description,
					'attendancecorrection_affdate' 	=> $request->affecteddate,
					'attendancecorrection_amount' 	=> $correctionamount,
					'attendancecorrection_image' 	=> $filename,
					'attendancecorrection_status' 	=> "Pending",
					'status_id' 					=> 2,
					'created_at' 					=> date('Y-m-d h:i:s'),
					'created_by' 					=> session()->get('batchid'),
					);
				DB::connection('mysql')->table('attendancecorrection')->insert($addannou);

				if($addannou){
						// $ans = array("no" => "Attendance Correctioin Added Successfully");
						// echo json_encode($ans);
						return redirect('/dailyattendance')->with('message','Attendance Correctioin Added Successfully');
							}
				else{
						return redirect('/dailyattendance')->with('message','Oops! Something went wrong');;
					}
					}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;

					} 
		}
		public function deletecorrection($id){
			if(session()->get("email") && session()->get('role') <= 2){
				$dataa = array(
				'status_id' => 1
				);
				DB::connection('mysql')->table('attendancecorrection')
				->where('attendancecorrection_id', $id)
				->update($dataa);
				return redirect('/attendancecorrectionlist')->with('message','Attendance Correctioin Successfully Deleted!');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
		}
		public function approvecorrection($id,$comment){
			if(session()->get("email") && session()->get('role') == 1){
				$dataa = array(
				'attendancecorrection_admincomment' => $comment,
				'attendancecorrection_status' => "Approved",
				'updated_by' => session()->get('id'),
				'updated_at' => date('Y-m-d h:i:s'),
				);
				DB::connection('mysql')->table('attendancecorrection')
				->where('attendancecorrection_id', $id)
				->update($dataa);
				return redirect('/attendancecorrectionlist')->with('message','Attendance Correctioin Approved Successfully!');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
		}
		public function declinecorrection($id,$comment){
			if(session()->get("email") && session()->get('role') == 1){
				$dataa = array(
				'attendancecorrection_admincomment' => $comment,
				'attendancecorrection_status' => "Declined",
				'updated_by' => session()->get('id'),
				'updated_at' => date('Y-m-d h:i:s'),
				);
				DB::connection('mysql')->table('attendancecorrection')
				->where('attendancecorrection_id', $id)
				->update($dataa);
				return redirect('/attendancecorrectionlist')->with('message','Attendance Correctioin Declined Deleted!');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
		}
		public function proceedcorrection($id,$comment){
			if(session()->get("email") && session()->get('role') <= 3){
				$dataa = array(
				'attendancecorrection_managercomment' => $comment,
				'attendancecorrection_status' => "Proceed",
				'updated_by' => session()->get('id'),
				'updated_at' => date('Y-m-d h:i:s'),
				);
				DB::connection('mysql')->table('attendancecorrection')
				->where('attendancecorrection_id', $id)
				->update($dataa);
				return redirect('/attendancecorrectionlist')->with('message','Attendance Correctioin Procced Successfully!');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
		}
		public function managerdeclinecorrection($id,$comment){
			if(session()->get("email") && session()->get('role') <= 3){
				$dataa = array(
				'attendancecorrection_managercomment' => $comment,
				'attendancecorrection_status' => "Declined By Manager",
				'updated_by' => session()->get('id'),
				'updated_at' => date('Y-m-d h:i:s'),
				);
				DB::connection('mysql')->table('attendancecorrection')
				->where('attendancecorrection_id', $id)
				->update($dataa);
				return redirect('/attendancecorrectionlist')->with('message','Attendance Correction Declined Successfully!');
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
			} 
		}
		public function correctionreport(){
		if(session()->get("email")){
			$task;
			if (session()->get('role') == 4) {
				$task = DB::connection('mysql')->table('attendancecorrection')
					->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
					->where('attendancecorrection.status_id','=',2)
					->where('elsemployees.elsemployees_empid','=',session()->get('id'))
					->where('elsemployees.elsemployees_status','=',2)
					->select('attendancecorrection.*','elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
					->get();
			}elseif(session()->get('role') == 3){
				$task = DB::connection('mysql')->table('attendancecorrection')
					->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
					->where('attendancecorrection.status_id','=',2)
					->where('elsemployees.elsemployees_reportingto','=',session()->get('id'))
					->orwhere('elsemployees.elsemployees_empid','=',session()->get('id'))
					->where('elsemployees.elsemployees_status','=',2)
					->select('attendancecorrection.*','elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
					->get();
			}else{
				$task = DB::connection('mysql')->table('attendancecorrection')
				->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
				->where('attendancecorrection.status_id','=',2)
				->where('elsemployees.elsemployees_status','=',2)
				->select('attendancecorrection.*','elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
				->get();
			}
			return view('correctionreport',['data'=>$task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
		public function approvedmulti_correction(){
		if(session()->get("email")){
			if(session()->get("role") <= 2){
				$task = DB::connection('mysql')->table('attendancecorrection')
				->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
				->where('attendancecorrection.status_id','=',2)
				->where('attendancecorrection.attendancecorrection_status','=',"Proceed")
				->where('elsemployees.elsemployees_status','=',2)
				->select('attendancecorrection.*','elsemployees.elsemployees_name')
				->get();
				return view('attendancecorrectionmulti',['data'=>$task]);
			}elseif(session()->get('role') == 3){
				$task = DB::connection('mysql')->table('attendancecorrection')
					->join('elsemployees','elsemployees.elsemployees_batchid', '=','attendancecorrection.created_by')
					->where('attendancecorrection.status_id','=',2)
					->where('attendancecorrection.attendancecorrection_status','=',"Pending")
					->where('elsemployees.elsemployees_reportingto','=',session()->get('id'))
					->where('elsemployees.elsemployees_status','=',2)
					->select('attendancecorrection.*','elsemployees.elsemployees_name')
					->get();
				return view('attendancecorrectionmulti',['data'=>$task]);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function updatemulticorrection(Request $request) {
		if (session()->get("email")){
			foreach ($request->reqstatus as $updatereq) {
          		$splitdata = explode('~', $updatereq);
				$dataa = array(
				'attendancecorrection_status' => $splitdata[0],
				'updated_by' => session()->get('id'),
				'updated_at' => date('Y-m-d h:i:s'),
				);
          		DB::connection('mysql')->table('attendancecorrection')
				->where('attendancecorrection_id', $splitdata[1])
				->update($dataa);
				}
         	return redirect('/attendancecorrectionlist')->with('message','Corrections Approved Successfully');
    	}else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function editcorrectionmodal($id){
			if(session()->get("email")){
				$task = DB::connection('mysql')->table('attendancecorrection')
				->where('attendancecorrection_id','=',$id)
				->select('*')
				->first();
				return view('modal.editcorrection',['data'=>$task]);
			}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	}
	public function submiteditcorrection(Request $request){
			if(session()->get("email")){
				$this->validate($request, [
            	    'hdncorrectionid'	=>'required',
            	    'hdnempbatchid'		=>'required',
            	    'edittitle'			=>'required',
            	    'approvedecline'	=>'required'
            	]);
				$editcorrectionamount;
				if ($request->edittitle == "Late") {
					$editcorrectionamount = 0.25;
				}
				elseif ($request->edittitle == "Half Day") {
					$editcorrectionamount = 0.5;
				}elseif ($request->edittitle == "Quarter Day") {
					$editcorrectionamount = 0.75;
				}
				elseif ($request->edittitle == "OFF") {
					$editcorrectionamount = 1;
				}
				elseif ($request->edittitle == "Absent") {
					$editcorrectionamount = 1;
				}
				$dataa = array(
				'attendancecorrection_title'  => $request->edittitle,
				'attendancecorrection_amount' => $editcorrectionamount,
				'attendancecorrection_status' => $request->approvedecline,
				'updated_by' => session()->get('id'),
				'updated_at' => date('Y-m-d h:i:s'),
				);
				$success = DB::connection('mysql')->table('attendancecorrection')
				->where('attendancecorrection_id', $request->hdncorrectionid)
				->update($dataa);
				if($success){
						return redirect('/attendancecorrectionlist')->with('message','Attendance Correction Edit And Proceed Successfully');;
				}else{
						return redirect('/attendancecorrectionlist')->with('message','Oops! Something went wrong');;
					}
				}else{
						return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
				} 
		}
    	public function changepicturemodal($id){
		
		if(session()->get("email")){
			
			return view('modal.changepicturemodal', ['data' => $id]);
		
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
		
	}
	public function submitchangeemployeepicture(Request $request){
		if(session()->get('role') <= 2 && session()->get('email')){
		$this->validate($request, [
        	'input'=>'mimes:jpeg,bmp,png|max:20024|required'
        ]);
		if($request->hasFile('input') && $request->input->isValid()){
                	$number = rand(1,999);
					$numb = $number / 7 ;
					$extension = $request->input->extension();
                    $filename  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
                    $filename = $request->input->move(public_path('img'),$filename);
					$img = Image::make($filename)->resize(800,800, function($constraint) {
                        $constraint->aspectRatio();
                    });
					$img->save($filename);
					$filename = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
		}else{
                
                $filename = 'no_image.jpg';    
        }
        		$dataa = array(
				'elsemployees_image' => $filename,
				'elsemployees_changeby' => session()->get("name")
				);
				$created = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees_empid', $request->editreqid)
				->update($dataa);
		if($created){
				return redirect('/employee_list')->with('message','Employee Image Upload Successfully'); 
			}else{
				return redirect('/employee_list')->with('message','Oops! Something Went Wrong'); 
			}
          }else{
              return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
          } 
	}
}