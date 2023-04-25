<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \App\Payroll;
use \App\Adjustment;
use \App\Payrollhistorie;
use \App\Employee_timing;
use Mail;
use DB;
use Input;
use Excel;
use Carbon\Carbon;
use App\Http\Controllers\DateInterval;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class welcomeController extends Controller
{
    public function bizzwelcome(){
        return view('bizzwelcome.bizzwelcome');
    }
    public function bizzwelcomemodal(){
        $year = date('Y');
        $month = date('m');
        
        $getattendance = DB::connection('sqlsrv')->table('Checkinout')
        ->where('Checkinout.CheckType','!=','2')
        // ->where('Checkinout.CheckType','!=','1')
        ->whereYear('Checkinout.CheckTime', $year)
        ->whereMonth('Checkinout.CheckTime', $month)
        ->select('Checkinout.*')
        ->orderBy('Checkinout.CheckTime', 'DESC')
        ->first();

        $explodetime = explode(' ', $getattendance->CheckTime);
        $gettime = date('h:i:s A', strtotime($explodetime[1]));
        
        $standby = date('h:i:s',strtotime('+5 minutes',strtotime($gettime)));
        // dd($standby);
        $gettype = $getattendance->CheckType;

        $employeedata = DB::connection('mysql')->table('elsemployees')
        ->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
        ->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
        ->where('elsemployees.elsemployees_batchid','=',$getattendance->Userid)
        ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name','elsemployees.elsemployees_image','designation.DESG_NAME','hrm_Department.dept_name')
        ->first();

        if (date('h:i:s')>$standby) {
        return view('bizzwelcome.bizzwelcomestandbymodal');    
        }else{
        return view('bizzwelcome.bizzwelcomemodal', ['info' => $employeedata, 'time' => $gettime, 'type' => $gettype]);
        }
    }
}