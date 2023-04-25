<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jobapplicant;
use DB;
use DataTables;
use Carbon\Carbon;

class UserController extends Controller
{
    private function generateDateRange(Carbon $start_date, Carbon $end_date){

        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay()) {

            $dates[] = $date->format('Y-m-d');

        }

        return $dates;

    }
	
	public function yajratable() {
	
		$candidatelist = DB::connection('mysql')->table('jobapplicant')
		->join('department','department.DEPT_ID', '=','jobapplicant.jobapplicant_department')
		->join('designation','designation.DESG_ID', '=','jobapplicant.jobapplicant_designation')
		->where('jobapplicant.jobapplicant_status','=','candidatelist')
		->select('jobapplicant.*','department.*','designation.*')
		->get();

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
	
	public function userdash() {
		
		$task = DB::connection('mysql')->table('elsemployees')
		->join('role','role.roleid', '=','elsemployees.elsemployees_roleid')
		->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
		->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
		->join ('empstatus','empstatus.status_id', '=','elsemployees.elsemployees_status')
		->where('elsemployees.elsemployees_batchid','=',session()->get("batchid"))
		->select('elsemployees.*','role.*','designation.*','hrm_Department.*','empstatus.*')
		->first();
		
		// dd($task);
		
		$jdate = explode("-",$task->elsemployees_dofjoining);
		$mdate = $jdate[1];

		$Leaveyear = $task->elsemployees_leaveyear;
		
		// dd($empleaveym);

		$mmdate = $jdate[1];
		// $mmmdate = $mmdate + 2;
		$mmmdate = $mmdate;
		$leavemy=  $mmmdate.-$Leaveyear;
		$empleaveym = explode("-",$leavemy);
		
		// dd($empleaveym);

		$lyear= $empleaveym[1];
		$lmonth= $empleaveym[0];

		$leavefdate= $lyear.'-'.$lmonth.'-'."$jdate[2]";
		$leaved= $leavefdate;

		// dd($emplmnt);

		$ldate[0] = $leavefdate;
		$ldate[1] = strtotime(date("Y-m-d", strtotime($leaved)) . " +1 month");
		$ldate[1] = date("Y-m-d",$ldate[1]);
		$ldate[2] = strtotime(date("Y-m-d", strtotime($leaved)) . " +2 month");
		$ldate[2] = date("Y-m-d",$ldate[2]);
		$ldate[3] = strtotime(date("Y-m-d", strtotime($leaved)) . " +3 month");
		$ldate[3] = date("Y-m-d",$ldate[3]);
		$ldate[4] = strtotime(date("Y-m-d", strtotime($leaved)) . " +4 month");
		$ldate[4] = date("Y-m-d",$ldate[4]);
		$ldate[5] = strtotime(date("Y-m-d", strtotime($leaved)) . " +5 month");
		$ldate[5] = date("Y-m-d",$ldate[5]);
		$ldate[6] = strtotime(date("Y-m-d", strtotime($leaved)) . " +6 month");
		$ldate[6] = date("Y-m-d",$ldate[6]);
		$ldate[7] = strtotime(date("Y-m-d", strtotime($leaved)) . " +7 month");
		$ldate[7] = date("Y-m-d",$ldate[7]);
		$ldate[8] = strtotime(date("Y-m-d", strtotime($leaved)) . " +8 month");
		$ldate[8] = date("Y-m-d",$ldate[8]);
		$ldate[9] = strtotime(date("Y-m-d", strtotime($leaved)) . " +9 month");
		$ldate[9] = date("Y-m-d",$ldate[9]);
		$ldate[10] = strtotime(date("Y-m-d", strtotime($leaved)) . " +10 month");
		$ldate[10] = date("Y-m-d",$ldate[10]);
		$ldate[11] = strtotime(date("Y-m-d", strtotime($leaved)) . " +11 month");
		$ldate[11] = date("Y-m-d",$ldate[11]);
		$ldate[12] = strtotime(date("Y-m-d", strtotime($leaved)) . " +12 month");
		$ldate[12] = date("Y-m-d",$ldate[12]);

		// $aldate= $ldate;

		// dd($ldate);
		$lfd = $ldate[0];
		$lfdate = explode("-",$lfd);
		$fmonth = $lfdate [1];
		$fyear = $lfdate [0];
		$fdate = $lfdate [2];
		$empsleavedate = $fyear.'-'.$fmonth.'-'.$fdate;
		$emps2leavedate = $fyear.'-'.$fmonth.'-'.'31';
			
		$fLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','>=',$empsleavedate)
		->where('elsleaverequests.elsleaverequests_leavestartdate','<=',$emps2leavedate)
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($fLmonth);
		$lsd = $ldate[1];
		$lsdate = explode("-",$lsd);
		$smonth = $lsdate [1];
		$syear = $lsdate [0];
			
		$sLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$syear.'-'.$smonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($sLmonth);
		$ltd = $ldate[2];
		$ltdate = explode("-",$ltd);
		$tmonth = $ltdate [1];
		$tyear = $ltdate [0];
			
		$tLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$tyear.'-'.$tmonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($tLmonth);
		$lfourd = $ldate[3];
		$lfourdate = explode("-",$lfourd);
		$fourmonth = $lfourdate [1];
		$fouryear = $lfourdate [0];
			
		$fourLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$fouryear.'-'.$fourmonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($fourLmonth);
		$lfid = $ldate[4];
		$lfidate = explode("-",$lfid);
		$fimonth = $lfidate [1];
		$fiyear = $lfidate [0];
			
		$fiLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$fiyear.'-'.$fimonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($fiLmonth);
		$lsixd = $ldate[5];
		$lsixdate = explode("-",$lsixd);
		$sixmonth = $lsixdate [1];
		$sixyear = $lsixdate [0];
			
		$sixLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$sixyear.'-'.$sixmonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($sixLmonth);
		$lsevd = $ldate[6];
		$lsevdate = explode("-",$lsevd);
		$sevmonth = $lsevdate [1];
		$sevyear = $lsevdate [0];
			
		$sevLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$sevyear.'-'.$sevmonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($sevmonth);
		$leigd = $ldate[7];
		$leigdate = explode("-",$leigd);
		$eigmonth = $leigdate [1];
		$eigyear = $leigdate [0];
			
		$eigLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$eigyear.'-'.$eigmonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($eigLmonth);
		$lnined = $ldate[8];
		$lninedate = explode("-",$lnined);
		$ninemonth = $lninedate [1];
		$nineyear = $lninedate [0];
			
		$nineLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$nineyear.'-'.$ninemonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($nineLmonth);
		$ltend = $ldate[9];
		$ltendate = explode("-",$ltend);
		$tenmonth = $ltendate [1];
		$tenyear = $ltendate [0];
			
		$tenLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$tenyear.'-'.$tenmonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($tenLmonth);
		$lelevend = $ldate[10];
		$lelevendate = explode("-",$lelevend);
		$elevenmonth = $lelevendate [1];
		$elevenyear = $lelevendate [0];
			
		$elevenLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$elevenyear.'-'.$elevenmonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($elevenLmonth);
		$ltweleved = $ldate[11];
		$ltwelevedate = explode("-",$ltweleved);
		$twelevemonth = $ltwelevedate [1];
		$tweleveyear = $ltwelevedate [0];
			
		$tweleveLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','LIKE',$tweleveyear.'-'.$twelevemonth.'-'."%")
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		// dd($tweleveLmonth);
		$llastd = $ldate[12];
		$llastdate = explode("-",$llastd);
		$lastmonth = $llastdate [1];
		$lastyear = $llastdate [0];
		$lastdate =	$llastdate [2];
		$emplastleavedate = $lastyear.'-'.$lastmonth.'-'.$lastdate;
		$emplast2leavedate = $lastyear.'-'.$lastmonth.'-'.'01';

		// dd($emplastleavedate);
			
		$lastLmonth = DB::connection('mysql')->table('elsleaverequests')
		->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
		->where('elsleaverequests.elsleaverequests_leavestartdate','>=',$emplast2leavedate)
		->where('elsleaverequests.elsleaverequests_leavestartdate','<',$emplastleavedate)
		->where('elsleaverequests.elsleaverequests_status','!=',"Decline")
		->select('elsleaverequests.elsleaverequests_totalleavedays')
		->sum('elsleaverequests.elsleaverequests_totalleavedays');

		$leavedata = ([
			$leaveFdata = ([
				$leavefdata = $fLmonth,
				$leavefmonth = $fmonth,
			]),
			$leaveSdata = ([
				$leavesdata = $sLmonth,
				$leavesmonth = $smonth,
			]),
			$leaveTdata = ([
				$leavetdata = $tLmonth,
				$leavetmonth = $tmonth,
			]),
			$leaveFourdata = ([
				$leavefourdata = $fourLmonth,
				$leavefourmonth = $fourmonth,
			]),
			$leaveFidata = ([
				$leavefidata = $fiLmonth,
				$leavefimonth = $fimonth,
			]),
			$leaveSixdata = ([
				$leavesixdata = $sixLmonth,
				$leavesixmonth = $sixmonth,
			]),
			$leaveSevdata = ([
				$leavesevdata = $sevLmonth,
				$leavesevmonth = $sevmonth,
			]),
			$leaveEigdata = ([
				$leaveeigdata = $eigLmonth,
				$leaveeigmonth = $eigmonth,
			]),
			$leaveNinedata = ([
				$leaveninedata = $nineLmonth,
				$leaveninemonth = $ninemonth,
			]),
			$leaveTendata = ([
				$leavetendata = $tenLmonth,
				$leavetenmonth = $tenmonth,
			]),
			$leaveElevendata = ([
				$leaveelevendata = $elevenLmonth,
				$leaveelevenmonth = $elevenmonth,
			]),
			$leaveTwelvedata = ([
				$leavetwelvedata = $tweleveLmonth,
				$leavetwelvemonth = $twelevemonth,
			]),
			$leaveLastdata = ([
				$leavelastdata = $lastLmonth,
				$leavelastmonth = $lastmonth,
			]),
		]);
		
		// dd($empleavedata);

		$all=['dataa' => $task,'leavedata'=>$leavedata];

		// dd($all['leavedata'][0][1]);

		return view('userdashboard', ['data' => $all]);
		
		// return view('userdashboard', ['data' => $task]);
		
	
	}
	public function maindashboard() {
		// dd(session()->get("email"));
		if(session()->get("email")){
		$empinfo = DB::connection('mysql')->table('elsemployees')
			->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
			->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
			->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees.elsemployees_empid','=',session()->get("id"))
			->orderBy('role.roleid', 'DESC')
			->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename','role.roleid')
			->first();

		$reportsto = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_empid','=',$empinfo->elsemployees_reportingto)
			->where('elsemployees.elsemployees_status','=',2)
			->select('elsemployees.elsemployees_name')
			->first();
			if (isset($reportsto->elsemployees_name)) {
				$empinfo->reportingto = $reportsto->elsemployees_name;
			}else{
				$empinfo->reportingto =	27;
			}

		$empsalary = DB::connection('mysql')->table('payrollsalaries')
			->where('payrollsalaries.EMP_BADGE_ID','=',$empinfo->elsemployees_batchid)
			->where('payrollsalaries.delete_status','=',2)
			->select('payrollsalaries.Salary')
			->first();
		if (isset($empsalary->Salary)) {
			$empinfo->salary = $empsalary->Salary;
		}else{
			$empinfo->salary = 0;
		}

		$empearning = DB::connection('mysql')->table('adjustments')
			->where('adjustments.EMP_BADGE_ID','=',$empinfo->elsemployees_batchid)
			->where('adjustments.AdjMonth','=',date('Y-m'))
			->select('adjustments.*')
			->first();
		if (isset($empearning->adjustment)) {
			$empinfo->earning = $empearning->adjustment + $empearning->incentiveamount + $empearning->spiffamount + $empearning->otheramount + $empearning->lastamount;
		}else{
			$empinfo->earning = 0;
		}

		$empinfo->grosssalary = $empinfo->salary+$empinfo->earning;
		$empdeduction = DB::connection('mysql')->table('deductions')
			->where('deductions.EMP_BADGE_ID','=',$empinfo->elsemployees_batchid)
			->where('deductions.deductions_month','=',date('Y-m'))
			->select('deductions.*')
			->first();
		if (isset($empdeduction->deductions_bizzfund)) {
			$empinfo->deduction = $empdeduction->deductions_bizzfund + $empdeduction->deductions_tax + $empdeduction->deductions_loan + $empdeduction->deductions_apiff + $empdeduction->deductions_advance;
		}else{
			$empinfo->deduction = 0;
		}
		$empinfo->netsalary = $empinfo->grosssalary-$empinfo->deduction;
		$departmentannouncement = DB::connection('mysql')->table('announcement')
			->where('announcement.announcement_for','like',"%".$empinfo->dept_name."%")
			->orderByDesc('announcement_id')
			->select('announcement.*')
			->get()->toArray();
		$announcement = DB::connection('mysql')->table('announcement')
			->where('announcement.announcement_for','=',"All")
			->orderByDesc('announcement_id')
			->select('announcement.*')
			->get()->toArray();
		$mergearray = array_merge($departmentannouncement,$announcement);
		rsort($mergearray);
		if (isset($mergearray)) {
		$indexall = 0;
		foreach ($mergearray as $announcements) {
			$empinfo->allannouncementid[$indexall] = $announcements->announcement_id;
			$empinfo->allannouncementtitle[$indexall] = $announcements->announcement_title;
			$empinfo->allannouncementdesc[$indexall] = $announcements->announcement_desc;
			$empinfo->allannouncementimage[$indexall] = $announcements->announcement_image;
			$empinfo->allannouncementdate[$indexall] = $announcements->created_at;
		$indexall++;
		}
		}
		$bdannouncement = DB::connection('mysql')->table('announcement')
			->where('announcement.announcement_for','=',"BD")
			->orderByDesc('announcement_id')
			->select('announcement.*')
			->get()->toArray();
		if (isset($bdannouncement)) {
		$indexbd = 0;
		foreach ($bdannouncement as $bdannouncements) {
			$empinfo->bdannouncementid[$indexbd] = $bdannouncements->announcement_id;
			$empinfo->bdannouncementtitle[$indexbd] = $bdannouncements->announcement_title;
			$empinfo->bdannouncementdesc[$indexbd] = $bdannouncements->announcement_desc;
			$empinfo->bdannouncementimage[$indexbd] = $bdannouncements->announcement_image;
			$empinfo->bdannouncementdate[$indexbd] = $bdannouncements->created_at;
		$indexbd++;
		}
		}
			$timestamp = strtotime(date('Y-m-d'));
			$daysRemaining = (int)date('t', $timestamp) - (int)date('j', $timestamp);
			if ($daysRemaining == 0) {
			$empinfo->remainingdays = 1;
			$daysRemaining = 1;
			}else{
			$empinfo->remainingdays = $daysRemaining;
			}
			// dd($daysRemaining);
			$emptarget = DB::connection('mysql')->table('employeetarget')
			->where('employeetarget.employeetarget_month','=',date('Y-m'))
			->where('employeetarget.elsemployees_batchid','=',$empinfo->elsemployees_batchid)
			->where('employeetarget.status_id','=',2)
			->select('employeetarget.employeetarget_target')
			->first();
			if (isset($emptarget->employeetarget_target)) {
				$empinfo->target = $emptarget->employeetarget_target;
			$empachieved = DB::connection('mysql')->table('employeeachieved')
				->where('employeeachieved.employeeachieved_month','=',date('Y-m'))
				->where('employeeachieved.elsemployees_batchid','=',$empinfo->elsemployees_batchid)
				->where('employeeachieved.status_id','=',2)
				->select('employeeachieved.employeeachieved_achieved')
				->sum('employeeachieved.employeeachieved_achieved');
			$empinfo->achieved = $empachieved;
			$remaining = $emptarget->employeetarget_target - $empachieved;
			$perday = $remaining / $daysRemaining;
			$empinfo->remaining = $remaining;
			$empinfo->perday = $perday;
			}else{
				$empinfo->target = 0;
				$empinfo->achieved = 0;
				$empinfo->remaining = 0;
				$empinfo->perday = 0;
			}
			$album = DB::connection('mysql')->table('album')
			->where('album.status_id','=',2)
			->select('album.album_id','album_image')
			->get();
			$indexalbum = 0;
			foreach ($album as $albums) {
				$empinfo->albumid[$indexalbum] = $albums->album_id;
				$empinfo->albumimage[$indexalbum] = $albums->album_image;
			$indexalbum++;
			}
			$departemployee = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_departid','=',$empinfo->elsemployees_departid)
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees.elsemployees_type','=',"Revenue")
			->select('elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
			->get();
			$indexdepartemployees = 0;
			foreach ($departemployee as $departemployees) {
				$empinfo->departemployeename[$indexdepartemployees] = $departemployees->elsemployees_name;
				$empinfo->departemployeebatchid[$indexdepartemployees] = $departemployees->elsemployees_batchid;
			$indexdepartemployees++;
			}
			// dd($empinfo);
			$saledepartemployee = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_departid','=',$empinfo->elsemployees_departid)
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees.elsemployees_type','=',"Sales")
			->select('elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
			->get();
			$saleindexdepartemployees = 0;
			foreach ($saledepartemployee as $saledepartemployees) {
				$empinfo->saledepartemployeename[$saleindexdepartemployees] = $saledepartemployees->elsemployees_name;
				$empinfo->saledepartemployeebatchid[$saleindexdepartemployees] = $saledepartemployees->elsemployees_batchid;
			$saleindexdepartemployees++;
			}
			$departchieved = DB::connection('mysql')->table('employeeachieved')
			->join ('employeetarget','employeetarget.elsemployees_batchid', '=','employeeachieved.elsemployees_batchid')
			->join ('elsemployees','elsemployees.elsemployees_batchid', '=','employeeachieved.elsemployees_batchid')
			->where('elsemployees.elsemployees_departid','=',$empinfo->elsemployees_departid)
			->where('employeeachieved.employeeachieved_month','=',date('Y-m'))
			->where('employeeachieved.employeeachieved_date','=',date('Y-m-d'))
			->where('employeetarget.employeetarget_type','=',"Revenue")
			->where('employeeachieved.status_id','=',2)
			->select('employeeachieved.employeeachieved_achieved','elsemployees.elsemployees_name','employeetarget.employeetarget_type')
			->get();
			$indexdepartachieved = 0;
			foreach ($departchieved as $departchieveds) {
				$empinfo->departavhievedemployeename[$indexdepartachieved] = $departchieveds->elsemployees_name;
				$empinfo->departavhievedemployeescore[$indexdepartachieved] = $departchieveds->employeeachieved_achieved;
			$indexdepartachieved++;
			}
			$departchievedsale = DB::connection('mysql')->table('employeeachieved')
			->join ('employeetarget','employeetarget.elsemployees_batchid', '=','employeeachieved.elsemployees_batchid')
			->join ('elsemployees','elsemployees.elsemployees_batchid', '=','employeeachieved.elsemployees_batchid')
			->where('elsemployees.elsemployees_departid','=',$empinfo->elsemployees_departid)
			->where('employeeachieved.employeeachieved_month','=',date('Y-m'))
			->where('employeeachieved.employeeachieved_date','=',date('Y-m-d'))
			->where('employeetarget.employeetarget_type','=',"Sales")
			->where('employeeachieved.status_id','=',2)
			->select('employeeachieved.employeeachieved_achieved','elsemployees.elsemployees_name','employeetarget.employeetarget_type')
			->get();
			$indexdepartachievedsale = 0;
			foreach ($departchievedsale as $departchievedsales) {
				$empinfo->departavhievedemployeenamesale[$indexdepartachievedsale] = $departchievedsales->elsemployees_name;
				$empinfo->departavhievedemployeescoresale[$indexdepartachievedsale] = $departchievedsales->employeeachieved_achieved;
			$indexdepartachievedsale++;
			}
			$dedepartemployee = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_departid','=',6)
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees.elsemployees_type','=',"Revenue")
			->select('elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
			->get();
			$indexdedepartemployees = 0;
			foreach ($dedepartemployee as $dedepartemployees) {
				$empinfo->dedepartemployeename[$indexdedepartemployees] = $dedepartemployees->elsemployees_name;
				$empinfo->dedepartemployeebatchid[$indexdedepartemployees] = $dedepartemployees->elsemployees_batchid;
			$indexdedepartemployees++;
			}
			// dd($empinfo);
			$salededepartemployee = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_departid','=',6)
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees.elsemployees_type','=',"Sales")
			->select('elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
			->get();
			$saledeindexdepartemployees = 0;
			foreach ($salededepartemployee as $salededepartemployees) {
				$empinfo->salededepartemployeename[$saledeindexdepartemployees] = $salededepartemployees->elsemployees_name;
				$empinfo->salededepartemployeebatchid[$saledeindexdepartemployees] = $salededepartemployees->elsemployees_batchid;
			$saledeindexdepartemployees++;
			}
			$maxdepartemployee = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_departid','=',2)
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees.elsemployees_type','=',"Revenue")
			->select('elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
			->get();
			$indexmaxdepartemployees = 0;
			foreach ($maxdepartemployee as $maxdepartemployees) {
				$empinfo->maxdepartemployeename[$indexmaxdepartemployees] = $maxdepartemployees->elsemployees_name;
				$empinfo->maxdepartemployeebatchid[$indexmaxdepartemployees] = $maxdepartemployees->elsemployees_batchid;
			$indexmaxdepartemployees++;
			}
			// dd($empinfo);
			$salemaxdepartemployee = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_departid','=',2)
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees.elsemployees_type','=',"Sales")
			->select('elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
			->get();
			$salemaxindexdepartemployees = 0;
			foreach ($salemaxdepartemployee as $salemaxdepartemployees) {
				$empinfo->salemaxdepartemployeename[$salemaxindexdepartemployees] = $salemaxdepartemployees->elsemployees_name;
				$empinfo->salemaxdepartemployeebatchid[$salemaxindexdepartemployees] = $salemaxdepartemployees->elsemployees_batchid;
			$salemaxindexdepartemployees++;
			}
			$csdepartemployee = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_departid','=',15)
			->where('elsemployees.elsemployees_status','=',2)
			->where('elsemployees.elsemployees_type','=',"Revenue")
			->select('elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
			->get();
			$indexcsdepartemployees = 0;
			foreach ($csdepartemployee as $csdepartemployees) {
				$empinfo->csdepartemployeename[$indexcsdepartemployees] = $csdepartemployees->elsemployees_name;
				$empinfo->csdepartemployeebatchid[$indexcsdepartemployees] = $csdepartemployees->elsemployees_batchid;
			$indexcsdepartemployees++;
			}
			// dd($empinfo);
			$salecsdepartemployee = DB::connection('mysql')->table('elsemployees')
			->where('elsemployees.elsemployees_departid','=',15)
			->where('elsemployees.elsemployees_status','=',2)
			// ->where('elsemployees.elsemployees_type','=',"Sales")
			->select('elsemployees.elsemployees_name','elsemployees.elsemployees_batchid')
			->get();
			// dd($salecsdepartemployee);
			$salecsindexdepartemployees = 0;
			foreach ($salecsdepartemployee as $salecsdepartemployees) {
				$empinfo->salecsdepartemployeename[$salecsindexdepartemployees] = $salecsdepartemployees->elsemployees_name;
				$empinfo->salecsdepartemployeebatchid[$salecsindexdepartemployees] = $salecsdepartemployees->elsemployees_batchid;
			$salecsindexdepartemployees++;
			}
			// dd($empinfo);
		$year = date("Y");
            $month = date("m");
			$taskCHECK = DB::connection('sqlsrv')->table('Checkinout')
            ->where('Checkinout.Userid','=',$empinfo->elsemployees_batchid)
            ->where('Checkinout.CheckType','!=','2')
            ->whereYear('Checkinout.CheckTime', $year)
            ->whereMonth('Checkinout.CheckTime', $month)
            ->select('Checkinout.*')
            ->first();
            
            // dd($userinfo);
            
            if(isset($taskCHECK->CheckTime)){
                
                $checktimefirst = $taskCHECK->CheckTime ;
            
                session()->put([
                
                'chktime' => $checktimefirst,
                
                ]);
                
            }else{
                
                $checktimefirst = 0;
            
                session()->put([
                
                'chktime' => $checktimefirst,
                
                ]);
                
            }
            $checkintime = '09:00:00';
            $checkouttime = '05:00:00';
            $name = session()->get("name");
            $checktime = session()->get("chktime");
            if($checktime != 0){
                $userinfo = $empinfo->elsemployees_batchid;
                $emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
                ->where('elsemployeestiming.emptime_batchid','=',$userinfo)
                ->select('elsemployeestiming.*')
                ->get();
                $taskin = DB::connection('sqlsrv')->table('Checkinout')
                ->where('Checkinout.Userid','=',$userinfo)
                ->where('Checkinout.CheckType','!=','2')
                ->where('Checkinout.CheckType','!=','1')
                ->whereYear('Checkinout.CheckTime', $year)
                ->whereMonth('Checkinout.CheckTime', $month)
                ->select('Checkinout.*')
                ->orderBy('Checkinout.CheckTime', 'DESC')
                ->get();
                $taskout = DB::connection('sqlsrv')->table('Checkinout')
                ->where('Checkinout.Userid','=',$userinfo)
                ->where('Checkinout.CheckType','!=','2')
                ->where('Checkinout.CheckType','!=','0')
                ->whereYear('Checkinout.CheckTime', $year)
                ->whereMonth('Checkinout.CheckTime', $month)
                ->select('Checkinout.*')
                ->get();
                foreach($taskin as $payrolldata){
                    $split_time = explode(" ",$payrolldata->CheckTime);
                    $emp_checkin[$split_time[0]] = $split_time[1];
                }   
                foreach($taskout as $payrolldataout){
                    $split_outtime = explode(" ",$payrolldataout->CheckTime);
                        $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                }
                $begin = explode(" ",$checktime);
                $begin = explode("-",$begin[0]);
                $end = date('Y-m-d');
                $end = explode("-",$end);
                $from = Carbon::createFromDate($end[0],$end[1],$end[2]+1);
                $to = Carbon::createFromDate($begin[0],$begin[1],$begin[2]);
                $dates = $this->generateDateRange($to, $from);
                foreach ($dates as $key => $dt) {
                if(isset($emp_checkin[$dt])){
                        $timeformin = strtotime($emp_checkin[$dt]); 
                        $timein = date("h:i:sa",$timeformin); 
                    }else{ 
                        $timein = "MissIn" ;
                    }
                    $a = null;
                    if(isset($dates[$key + 1])){
                        $a = $key + 1 ; 
                    }else{ 
                        $dates[$a] = "MissOut";
                    }
                    if(isset($emp_checkout[$dates[$a]])){
                        $timeformout = strtotime($emp_checkout[$dates[$a]]);
                        $timeout = date("h:i:sa",$timeformout);
                    }else{
                        $timeout = "MissOut" ;
                    }
                    $day = date("l", strtotime($dt));
                    $todaytime = $emptimeinfo->where('emptime_startdate', '<=', $dt)->sortByDesc('emptime_id')->first();
                    if($todaytime){
                            if($dt >= $todaytime->emptime_startdate ){
                                $checkintime = date("h:i:sa",strtotime($todaytime->emptime_start));
                                $checkouttime = date("h:i:sa",strtotime($todaytime->emptime_end));
                            }else{
                                $checkintime = "09:05:59pm";
                                $checkouttime = "05:00:00am";
                            }
                    }
                    if( $timein == "MissIn" ){
                        $labelin = 3;
                    }elseif( $timein > $checkintime ){
                        $labelin = 0;
                    }elseif( $timein < $checkintime ){
                        $labelin = 1;
                    }
                    if( $timeout == "MissOut" ){
                        $labelout = 3;
                    }elseif( $timeout > $checkouttime ){
                        $labelout = 1;
                    }elseif( $timeout <= $checkouttime){
                        $labelout = 0;
                    }
                    if(($timein == "MissIn") && ($timeout == "MissOut") ){
                        $labelin = 2;
                        $labelout = 2;
                    }else{
                    }
                $taskdata[$dt] = array(
                        "s.no" => $key+1 ,
                        "emp_batchid" => session()->get("batchid"),
                        "emp_name" => session()->get("name"),
                        "emp_date" => $dt,
                        "emp_checkin" => $timein,
                        "emp_checkout" => $timeout,
                        "emp_day"  =>  $day ,
                        "emp_labelin"  =>  $labelin,
                        "emp_labelout"  =>  $labelout,
                    );              

                }
            }else{
                $taskdata = 0;
            }
            $checkreview = DB::connection('mysql')->table('itticket')
			->where('created_by','=',session()->get('batchid'))
			->where('itticket_isreviewsubmited','=',0)
			->where('itticketstatus_id','>=',4)
			->where('status_id','=',2)
			->select('itticket_id')
			->first();
            // dd($checkreview);
				return view('main.maindashboard', ['data' => $empinfo,'attendancedata' => $taskdata, 'checkreview' => $checkreview]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	}
	public function empreminder(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('reminder')
					->where('elsemployees_batchid','=',session()->get('batchid'))
					->select('reminder.reminder_note','reminder.reminder_date')
					->get();
			return view('modal.empreminder', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addreminder(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
               'remindernote'=>'required',
               'reminderdate'=>'required',
            ]);
			$reminder[] = array(
				'reminder_note' => $request->remindernote,
				'reminder_date' => $request->reminderdate,
				'elsemployees_batchid' => session()->get('batchid'),
				'created_at' => date('Y-m-d h:i:s')
				);
			DB::connection('mysql')->table('reminder')->insert($reminder);
		if($reminder){
				return redirect('/maindashboard')->with('message','Reminder Added Successfully'); 
		}else{
              return redirect('/maindashboard')->with('message','Oops! Something Went Wrong');
        }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function trainingmanualvideo(){
		if(session()->get("email")){
			return view('trainingmanuals.video');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function trainingmanualaudio(){
		if(session()->get("email")){
			return view('trainingmanuals.audio');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function trainingmanualpdf(){
		if(session()->get("email")){
			return view('trainingmanuals.pdf');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function bizzlibrary(){
		if(session()->get("email")){
			return view('library.booklist');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function hrpolicy(){
		if(session()->get("email")){
			return view('policy.hrpolicy');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function myforms(){
		if(session()->get("email")){
			return view('myforms');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function games(){
		if(session()->get("email")){
			return view('games');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function websites(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('elsemployees')
				->where('elsemployees_batchid','=',session()->get('batchid'))
				->where('elsemployees_status','=',2)
				->select('elsemployees_departid')
				->first();
			return view('websites',['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitcomment($id, $value){
		// dd($value);
		if(session()->get("email")){
			DB::connection('mysql')->table('commentpost')->insert([
		    'commentpost_comment' 	=> $value,
		    'commentpost_status' 	=> "Pending",
		    'announcement_id'		=> $id,
		    'created_by'			=> session()->get('id'),
		    'created_at'			=> date('Y-m-d h:i:s'),
		   ]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
			}
	}
	public function selectannouncementforcomment(){
	if(session()->get("email")){
		$task = DB::connection('mysql')->table('announcement')
		->select('announcement_id','announcement_title')
		->orderBy('announcement_id', 'desc')
		->get();
		// dd($task);
		return view('postcomment.selectannouncementforcomment', ['data' => $task]);
	}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitselectannouncement(Request $request){
	if(session()->get("email")){
		$task = DB::connection('mysql')->table('commentpost')
		->join('elsemployees','elsemployees.elsemployees_empid', '=','commentpost.created_by')
		->where('commentpost.announcement_id','=',$request->title)
		->select('commentpost.commentpost_id','commentpost.commentpost_comment','commentpost.created_at','elsemployees.elsemployees_name','elsemployees.elsemployees_image','commentpost_status')
		->get();
		return view('postcomment.commentlist', ['data' => $task]);
	}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function approvedcomment($id){
		if(session()->get("email")){
			$dataa = array(
			'commentpost_status' => "Approved",
			'updated_by' => session()->get('id'),
			'updated_at' => date('Y-m-d h:i:s'),
			);
			DB::connection('mysql')->table('commentpost')
			->where('commentpost_id', $id)
			->update($dataa);
			return redirect('/attendancecorrectionlist')->with('message','Comment Approved Successfully!');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
	public function declinedcomment($id){
		if(session()->get("email")){
			$dataa = array(
			'commentpost_status' => "Declined",
			'updated_by' => session()->get('id'),
			'updated_at' => date('Y-m-d h:i:s'),
			);
			DB::connection('mysql')->table('commentpost')
			->where('commentpost_id', $id)
			->update($dataa);
			return redirect('/attendancecorrectionlist')->with('message','Comment Declined Successfully!');
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
		} 
	}
	public function viewdetails($id){
			$task = DB::connection('mysql')->table('announcement')
			->where('announcement_id','=',$id)
			->select('*')
			->first();
		return view('main.modal.viewdetails',['data' => $task]);
	}
	public function complain(){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('complain')
					->join ('complainstatus','complainstatus.complainstatus_id', '=','complain.complainstatus_id')
					->where('created_by','=',session()->get('batchid'))
					->orderBy('complain_id', 'DESC')
					->select('complain.*','complainstatus.complainstatus_name')
					->get();
			return view('modal.complain', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function addcomplain(Request $request){
		if(session()->get("email")){
			$this->validate($request, [
               'complain_note'=>'required',
            ]);
			$complain[] = array(
				'complain_note' 	=> $request->complain_note,
				'complain_date' 	=> date('Y-m-d'),
				'complainstatus_id' => 1,
				'created_by' 		=> session()->get('batchid'),
				'created_at' 		=> date('Y-m-d h:i:s')
				);
			DB::connection('mysql')->table('complain')->insert($complain);
		if($complain){
				return redirect('/maindashboard')->with('message','complain Added Successfully'); 
		}else{
              return redirect('/maindashboard')->with('message','Oops! Something Went Wrong');
        }
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function viewcomment($id){
		if(session()->get("email")){
			$task = DB::connection('mysql')->table('complaincomment')
					->join ('elsemployees','elsemployees.elsemployees_batchid', '=','complaincomment.created_by')
					->where('complain_id','=',$id)
					->orderBy('complaincomment_id', 'DESC')
					->select('complaincomment.*','elsemployees.elsemployees_name')
					->get();
			return view('modal.viewcomments', ['data' => $task]);
		}else{
			return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
	public function submitpostreply($id, $value){
		if(session()->get("email")){
			DB::connection('mysql')->table('replypost')->insert([
			    'replypost_reply' 	=> $value,
			    'replypost_status' 	=> "Pending",
			    'commentpost_id'	=> $id,
			    'created_by'		=> session()->get('id'),
			    'created_at'		=> date('Y-m-d h:i:s'),
			]);
			 $getreply = DB::connection('mysql')->table('replypost')
	        ->join('elsemployees','elsemployees.elsemployees_empid', '=','replypost.created_by')
	        ->where('replypost.commentpost_id','=',$id)
	        ->whereIn('replypost.replypost_status',["Pending","Approved"])
	        ->select('replypost.replypost_id','replypost.replypost_reply','replypost.created_at','elsemployees.elsemployees_name','elsemployees.elsemployees_image')
	        ->orderByDesc('replypost_id')
	        ->get();
			return view('main.modal.postreply', ['getreply' => $getreply]);
		}else{
				return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
		}
	}
}
