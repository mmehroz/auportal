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
use DateTime;

class payrollController extends Controller
{
    
    private function generateDateRange(Carbon $start_date, Carbon $end_date){

        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay()) {

            $dates[] = $date->format('Y-m-d');

        }

        return $dates;

    }

    public function index(){

        $yearmin =date('Y');
        $previousmonth = date('n');

        if($previousmonth == 1 ){
            $yearmin =date('Y')-1;
            $previousmonth = 12;
           }else{
            $previousmonth = date('n');
          }

           $TMpresent = 0;
            $a=1;
            $c=0;
            if(!empty(session()->get('name'))){
            
            $batchId = session()->get("batchId");
            $lastMonth = Payroll::on('mysql')->where('EMP_BADGE_ID','=',$batchId)->get();
            $leavesArray = array();
            $users = DB::connection('mysql')->table('employee')
            ->join('leave_request','leave_request.LREQ_EMP_ID', '=', 'employee.EMP_ID' )
            ->where('employee.EMP_BADGE_ID','=',$batchId)
            ->where('leave_request.LREQ_STATUS_ID','=',4)
            ->select('leave_request.LREQ_START','leave_request.LREQ_END')
            ->get();

            
            if($users){

               
                
                foreach($users as $key=>$days){
                    $LeaveStartDate = explode("-",$days->LREQ_START); 
                    $LeaveEndDate = explode("-",$days->LREQ_END); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $dates = $this->generateDateRange($to, $from);
                        foreach( $dates as $key => $ab){
                           $leavemonth = explode("-",$ab);
                           if($leavemonth[1] == $LeaveStartDate[1] ){
                            $c++;
    
                           }else{
                            $c;
                           }
                        }
                    }
                    
                }
            }
            
            $data = Payroll::on('mysql')->where('EMP_BADGE_ID','=',$batchId)->get();
            
            if($data){
                
            $present = array();
                for($b = 1; $b <= 12; $b++){
                    
                    $g=0;
                    foreach ($data as $key => $employee) {
                        $Cmonth = explode("-",$employee->Date);
                        $Cmonthdate = $Cmonth[1];
                        // $intmonth = intval($Cmonthdate);
                        // dd($intmonth);
                            if(($b == $Cmonthdate) && ( $Cmonth[0] == $yearmin )){
                                $present[$b] =+ ++$g;
                            }
                            if(($b == 1) && ( $Cmonth[0] == 2020)){
                                $present[$b] = 0;
                            }
                            if(($b == 2) && ( $Cmonth[0] == 2020)){
                                $present[$b] = 0;
                            }
                            if(($b == 3) && ( $Cmonth[0] == 2020)){
                                $present[$b] = 0;
                            }
                    }
                } 
        
            }


            $datab = Payroll::on('mysql')->where('EMP_BADGE_ID','=',$batchId)->get();
            
            if($datab){
            foreach ($datab as $key => $employeeb) {
                $month = explode("-",$employeeb->Date);
                $monthdate = $month[1];
                $Gmonth = $previousmonth ;
                
                    if(($Gmonth == $monthdate) && ( $month[0]== $yearmin ) ){
                        $TMpresent =+  $a++ ;   
                    }else{

                        $TMpresent = 0;
                    }
                }
            }
        

         
            
            $weekenddays = array();
            $workdayss = array();
                $type = CAL_GREGORIAN;
                $month = date('n'); // Month ID, 1 through to 12.
                $year = date('Y'); // Year in 4 digit 2009 format.
                $day_count = cal_days_in_month($type, $month, $year); // Get the amount of days

                //loop through all days
                for ($i = 1; $i <= $day_count; $i++) {

                        $date = $year.'/'.$month.'/'.$i; //format date
                        $get_name = date('l', strtotime($date)); //get week day
                        $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars

                        //if not a weekend add day to array
                        if($day_name != 'Sun' && $day_name != 'Sat'){$workdayss[] = $i;}
                        if($day_name == 'Sun' || $day_name == 'Sat'){ $weekenddayss[] = $i; }

                }

         

            for($b = 1; $b <= $previousmonth ; $b++){

             if(count($present) >= $b ){

              $weekenddays = array();
              $workdays = array();
                $type = CAL_GREGORIAN;
                $month = date('n'); // Month ID, 1 through to 12.
                $year = date('Y'); // Year in 4 digit 2009 format.
                $day_count = cal_days_in_month($type, $b, $year); // Get the amount of days

                //loop through all days
                for ($i = 1; $i <= $day_count; $i++) {

                        $date = $year.'/'.$b.'/'.$i; //format date
                        $get_name = date('l', strtotime($date)); //get week day
                        $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars

                        //if not a weekend add day to array
                        if($day_name != 'Sun' && $day_name != 'Sat'){$workdays[] = $i;}
                        if($day_name == 'Sun' || $day_name == 'Sat'){ $weekenddays[] = $i; }

                }
            
                $present[$b] =  $present[$b] + count($weekenddays);
            }else{
                $present[$b] = 0;
            }
            
        } 

            
            $WOP = count($workdayss) - $TMpresent - $c;
            
            if($TMpresent){
            $finalPresentDays = $TMpresent+count($weekenddayss);
            }else{
                $finalPresentDays = 0;
            }
            
            
            $yearmin =date('Y');
        $previousmonth = date('n');

       if($previousmonth == 1 ){
        $yearmin =date('Y')-1;
        $previousmonth = 12;
       }else{
        $previousmonth = date('n');
       }
       
        $batchId = session()->get("batchId");
        $data_t =array();
        $data_b = array();
        $result = array('data' => array());
        if(session()->get('roleId') == 4){
            $data_t = DB::connection('mysql')->table('payrolls')
                 ->whereMonth('payrolls.Date' , '=' , $previousmonth)
                 ->whereYear('payrolls.Date' , '=' ,  $yearmin)
                 ->orderBy('payrolls.EMP_BADGE_ID')
                 ->select('payrolls.*')
                 ->get();
        }
        else if(session()->get('roleId') == 3){
            $data_t = DB::connection('mysql')->table('payrolls')
                ->join('employee','employee.EMP_BADGE_ID', '=', 'payrolls.EMP_BADGE_ID' )
                ->whereMonth('payrolls.Date' , '=' , $previousmonth  )
                ->whereYear('payrolls.Date' , '=' ,  $yearmin)
                ->where('employee.EMP_DEPT_ID' ,'=', session()->get('DEPT_ID'))
                ->select('payrolls.*')
                ->get();
        }
        // else if((session()->get('batchId') == 10868) && (session()->get('roleId') == 2)){
        //     $data_t = DB::table('payrolls')
        //         ->join('employee','employee.EMP_BADGE_ID', '=', 'payrolls.EMP_BADGE_ID' )
        //         ->whereMonth('payrolls.Date' , '=' , $previousmonth )
        //         ->whereYear('payrolls.Date' , '=' ,  $yearmin)
        //         ->where('employee.EMP_DEPT_ID' ,'=', 13 )
        //         ->orwhere('employee.EMP_DEPT_ID' ,'=', 5 )
        //         ->orwhere('employee.EMP_DEPT_ID' ,'=', 6 )
        //         ->orwhere('employee.EMP_DEPT_ID' ,'=', 9 )
        //         ->orwhere('employee.EMP_DEPT_ID' ,'=', 10 )
        //         ->select('payrolls.*')
        //         ->get();
        // }
        // (session()->get('batchId') != 10868) &&
        else if(session()->get('roleId') == 2){
            $data_t = DB::connection('mysql')->table('payrolls')
                ->join('employee','employee.EMP_BADGE_ID', '=', 'payrolls.EMP_BADGE_ID' )
                ->whereMonth('payrolls.Date' , '=' , $previousmonth )
                ->whereYear('payrolls.Date' , '=' ,  $yearmin)
                ->where('employee.EMP_DEPT_ID' ,'=', session()->get('DEPT_ID'))
                ->select('payrolls.*')
                ->get();

        }else{
            $data_t = Payroll::on('mysql')->where('EMP_BADGE_ID','=',$batchId)
            ->whereMonth('payrolls.Date' , '=' , $previousmonth )
            ->whereYear('payrolls.Date' , '=' ,  $yearmin)
            ->orderByRaw('payrolls.Date ASC')->get();
        }
        // $L = 0;
        // $no = 0;
        // if($data_t){
        // foreach ($data_t as $key => $employee) {
         // $no++;
         // $id= $employee->id;
         // $sNo = "<span>".$no."</span>";
         // $account_no = '<span>'.$employee->EMP_BADGE_ID.'</span>';
         // $name = '<span>'.$employee->name.'</span>';
         // $start_time = '<span>'.$employee->Start_time.'</span>';
         // $end_time = '<span>'.$employee->End_time.'</span>';
         // $department = '<span>'.$employee->Department.'</span>';
         // $time_long = '<span>'.$employee->Time_long.'</span>';
         // $date = '<span>'.$employee->Date.'</span>';
         // $starttime = DB::table('payrolls')
         // ->join('employee_timings','employee_timings.EMP_BADGE_ID', '=', 'payrolls.EMP_BADGE_ID' )
         // ->select('employee_timings.arrival_time,employee_timings.EMP_BADGE_ID')
         // ->get();

     

        // $starttime = DB::table('employee_timings')
        // ->where('EMP_BADGE_ID',"=", $employee->EMP_BADGE_ID)
        // ->whereDate('change_date', '<=', $employee->Date)
        // ->orderBy('T_Id', 'DESC')->first();

        // if(count($starttime) > 0 && date("h:i",strtotime($starttime->arrival_time)) >= date("h:i",strtotime($employee->Start_time))){
            // $at = "<span><label class='label label-success'>On Time</label></span>";
        // }else if(count($starttime) > 0 && date("h:i",strtotime($starttime->arrival_time)) < date("h:i",strtotime($employee->Start_time))){
            // $at = "<span><label class='label label-warning'>Late Comming</label></span>";
        // }else{
            // $at = "<span><label class='label label-danger'>Time not available</label></span>";
        // }


        // $endtime = DB::table('employee_timings')
        // ->where('EMP_BADGE_ID',"=", $employee->EMP_BADGE_ID)
        // ->whereDate('change_date', '<=', $employee->Date)
        // ->orderBy('T_Id', 'DESC')->first();

        // if(count($endtime) > 0 && date("h:i",strtotime($endtime->departure_time)) > date("h:i",strtotime($employee->End_time))){
            // $dpt= "<span><label class='label label-warning'>Early Departure</label></span>";
        // }else if(count($endtime) > 0 && date("h:i",strtotime($endtime->departure_time)) <= date("h:i",strtotime($employee->End_time))){
            // $dpt= "<span><label class='label label-success'>On Time</label></span>";
        // }else{
            // $dpt= "<span><label class='label label-danger'>Time not available</label></span>";
        // }
         // if(session()->get('roleId') == 4){
            // $edit_button = '<span><button type="button" onclick="getedit('.$id.')" class="btn btn-info btn-xs btnManage"><i class="fa fa-pencil "></i></button></span>';  
            // $data_b[] = array('sNo'=>$sNo,'account_no'=>$account_no,'name'=>$name,'start_time'=>$start_time,'end_time'=>$end_time,'department'=>$department,'time_long'=>$time_long,'date'=>$date,'at'=>$at,'dpt'=>$dpt,'edit_button'=>$edit_button);
            // }else{
                // $data_b[] = array('sNo'=>$sNo,'account_no'=>$account_no,'name'=>$name,'start_time'=>$start_time,'end_time'=>$end_time,'department'=>$department,'time_long'=>$time_long,'date'=>$date,'at'=>$at,'dpt'=>$dpt);
            // }
        
         // }
     // }else{
         // $result = array('data' => array());
     // }
        
            $allData = array("presentDays"=>$finalPresentDays,"WOP"=>$WOP, "Leaves" => $c ,"Cpresent" =>$present,'data_t' => $data_t);
            // dd($allData['data_t']);
            return view('dashboard',['falldata'=>$allData ] );
            //return view('welcome',compact('allData'));

            }else{
                session()->flush();
               return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }

    }

      // This is the controller for Alldata page


    public function allDataShow(){
        
        $batchId = session()->get("batchid");
        // dd($batchId);
        
        $data = DB::connection('mysql')->table('deductions')
        ->where('deductions_month','=',date('Y-m'))
        ->select('*')
        ->get();
  

        // $result = array('dataa' => array());
        
        $dataa = DB::connection('mysql')->table('adjustments')
        ->where('AdjMonth','=',date('Y-m'))
        ->select('*')
        ->get();
        // dd($result);

        $all=['dataa'=>$data,'task'=>$dataa]; 
                  
        // dd($all['result'][1]);
        
        // return view('payroll.payrollitems',['data'=>$data]);
        return view('payroll.payrollitems',['data'=>$all]);
    }
    public function monthwisepayrollitems(Request $request){
        
        $batchId = session()->get("batchid");
        // dd($batchId);
        
        $data = DB::connection('mysql')->table('deductions')
        ->where('deductions_month','=',$request->payrollmonth)
        ->select('*')
        ->get();
  

        // $result = array('dataa' => array());
        
        $dataa = DB::connection('mysql')->table('adjustments')
        ->where('AdjMonth','=',$request->payrollmonth)
        ->select('*')
        ->get();
        // dd($result);

        $all=['dataa'=>$data,'task'=>$dataa]; 
                  
        // dd($all['result'][1]);
        
        // return view('payroll.payrollitems',['data'=>$data]);
        return view('payroll.payrollitems',['data'=>$all]);
    }

     
     // This is the controller for Upload page
    public function UploadSheet(){
       
            if(session()->get('name')){
                
            return view('payroll.uploadsheet',compact('allData'));

            }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }


    }

    public function create(){
        return view('payroll.add');
    }

    public function save(Request $request){
        $this->validate($request,[
            'file'=>'required|mimes:csv,txt',
        ]);

     if(($handle = fopen($_FILES['file']['tmp_name'],"r")) !==FALSE){
      fgetcsv($handle);

                while(($data = fgetcsv($handle,1000,",")) !==FALSE){

                    $insert[] = [

                        'EMP_BADGE_ID'=>(int)$data[0],
                        'Name'=>$data[1],
                        'Start_time'=>$data[2],
                        'End_time'=>$data[3],
                        'Department'=>$data[4],
                        'Time_long'=>$data[5],
                        'Date'=>date('Y-m-d',strtotime($data[6])),

                        ];
                    }

                $created = DB::connection('mysql')->table('payrolls')->insert($insert);
                // dd("web");
            }
            if($created){
                
                $dataemail = DB::connection('mysql')->table('employee')
                    ->where('employee.EMP_ROLE_ID','=',2)
                    ->select('employee.EMP_EMAIL','employee.EMP_NAME')
                    ->get();
                    
                    foreach($dataemail as $mailpersons)
                    {
                     
                        Mail::send('mail', ['mailpersons' => $mailpersons], function ($m) use ($mailpersons) { 
                            $m->from('muhammad.mehroz@bizzworld.com','Web');
                            $m->to($mailpersons->EMP_EMAIL, $mailpersons->EMP_NAME)->bcc('muhammad.mehroz@bizzworld.com')->subject(' Daily Attendance & Late Arrival Reports');
                         });
                    }
                    
                    // Mail::send('mail', ['mailpersons' => $mailpersons], function ($m) use ($mailpersons) { 
                    //         $m->from('web@mobilelinkusa.com','Web');
                    //         $m->to($mailpersons->EMP_EMAIL, $mailpersons->EMP_NAME)->cc('hamza_ahmed@mobilelinkusa.com')->subject(' Daily Attendance & Late Arrival Reports');
                    //      });
                    
                echo json_encode(true);
            }
            else{
                echo json_encode(false);
            }
    }

    public function mainPayroll(){

        $paymonth= date("Y-m-d");
        // dd($paymonth);

        $pdate= strtotime(date("Y-m-d", strtotime($paymonth)) . " -1 month");
        $pdate= date("Y-m-d",$pdate);

        $paydate = explode("-",$pdate);
        
        // dd($paydate);
        
        $yearmin = $paydate[0];
        $previousmonth = $paydate[1];

        // dd($previousmonth);

        if($previousmonth == 1 ){
            $yearmin = date('Y')-1;
            // dd($yearmin);
            $previousmonth = 12;
        }else{
            $previousmonth = $paydate[1];
        } 
        // dd($previousmonth);
        // dd($yearmin);

       $data_employee = array();

            $employee_data = DB::connection('mysql')->table('elsemployeestiming')
              ->select('elsemployeestiming.emptime_batchid','payrollsalaries.Salary')
              ->join('payrollsalaries','payrollsalaries.EMP_BADGE_ID', '=', 'elsemployeestiming.emptime_batchid')
              ->groupBy('elsemployeestiming.emptime_batchid')
              ->get();
            
            // dd($employee_data);
            // dd($employee_data['0']->emptime_batchid);
             
            $index = 0;
            // dd($index);
        foreach ($employee_data as $key1 => $employee){
           
           $payroll_data = DB::connection('mysql')->table('payrolls')
           ->where('payrolls.EMP_BADGE_ID' , '=' , $employee->emptime_batchid)
           ->whereMonth('payrolls.Date' , '=' , $previousmonth)
           ->whereYear('payrolls.Date' , '=' , $yearmin)
           ->select('payrolls.*')
          ->orderBy('payrolls.EMP_BADGE_ID')
           ->get();

            // dd($payroll_data);

           $employee_late = 0;

           foreach ($payroll_data as $key2 => $starttime) {
             $employeetiming = DB::connection('mysql')->table('elsemployeestiming')
            ->where('emptime_batchid',"=", $employee->emptime_batchid)
            ->whereDate('change_date', '<=', $starttime->Date)
            ->orderBy('emptime_id', 'DESC')->first();
               if(!empty($employeetiming) > 0 && date("h:i",strtotime($employeetiming->emptime_start)) < date("h:i",strtotime($starttime->Start_time))){
                $employee_late++;
               }       
           }
           
        //    dd($employee_late);

           $datab = Payroll::on('mysql')->where('EMP_BADGE_ID','=',$employee->emptime_batchid)->get();
        //    dd($datab);
           
            $a=1;
           $TMpresent = 0;
           if($datab){
                foreach ($datab as $key => $employeeb){
                   $month = explode("-",$employeeb->Date);
                   $monthdate = $month[1];
                   $Gmonth = $previousmonth ;
                   
                       if(($Gmonth == $monthdate) && ( $month[0]== $yearmin ) ){
                           $TMpresent =+  $a++ ;   
                       }else{
                           $TMpresent = 0;
                       }
                }
           }

 
            $leavesArray = array();
            $annualLeaveDays = DB::connection('mysql')->table('elsemployees')
            ->join('elsleaverequests','elsleaverequests.elsleaverequests_empid', '=', 'elsemployees.elsemployees_empid' )
            ->where('elsemployees.elsemployees_batchid','=',$employee->emptime_batchid)
            ->where('elsleaverequests.elsleaverequests_status','=','Done' )
            ->select('elsleaverequests.elsleaverequests_leavestartdate','elsleaverequests.elsleaverequests_leaveenddate')
            ->get();

            $c=0;

            // dd($annualLeaveDays);
            
            if(count($annualLeaveDays) > 0){
               
                foreach($annualLeaveDays as $key=>$days){
                    //    dd($days);
                    $LeaveStartDate = explode("-",$days->elsleaverequests_leavestartdate); 
                    $LeaveEndDate = explode("-",$days->elsleaverequests_leaveenddate);
                    //    dd($LeaveEndDate);
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        // $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $from = ("$LeaveEndDate[0]".'-'."$LeaveEndDate[1]".'-'."$LeaveEndDate[2]");
                        // $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $to = ("$LeaveStartDate[0]".'-'."$LeaveStartDate[1]".'-'."$LeaveStartDate[2]");
                        // $dates = $this->generateDateRange($to, $from);
                        $dates = $LeaveEndDate[2]-$LeaveStartDate[2];
                        // dd($dates);
                        // foreach( $dates as $key => $ab){
                        //    $leavemonth = explode("-",$ab);
                        //    dd($leavemonth);

                            // if($leavemonth[1] == $LeaveStartDate[1] ){
                            if($dates > 0 ){
                                $dates++;
                                $c = $c+$dates;
                                // dd($c);
                            
                            }else{
                                $c++;
                                // dd($c);
                            }
                        // }
                    }
                    
                }
                
                // dd($c);
            }               
            // dd($c);

            $leavesArray = array();
            $sickLeaveDays = DB::connection('mysql')->table('elsemployees')
            ->join('elsleaverequests','elsleaverequests.elsleaverequests_empid', '=', 'elsemployees.elsemployees_empid' )
            ->where('elsemployees.elsemployees_batchid','=',$employee->emptime_batchid)
            ->where('elsleaverequests.elsleaverequests_status','=','Done')
            ->where('elsleaverequests.elsleaverequests_leavetypeid','=',2)
            ->select('elsleaverequests.elsleaverequests_leavestartdate','elsleaverequests.elsleaverequests_leaveenddate')
            ->get();

            $sickleave=0;
            
            if(count($sickLeaveDays) > 0){

               
                foreach($sickLeaveDays as $key=>$days){
                    $LeaveStartDate = explode("-",$days->elsleaverequests_leavestartdate); 
                    $LeaveEndDate = explode("-",$days->elsleaverequests_leaveenddate); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        // $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $from = ("$LeaveEndDate[0]".'-'."$LeaveEndDate[1]".'-'."$LeaveEndDate[2]");
                        // $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $to = ("$LeaveStartDate[0]".'-'."$LeaveStartDate[1]".'-'."$LeaveStartDate[2]");
                        // $dates = $this->generateDateRange($to, $from);
                        $dates = $LeaveEndDate[2]-$LeaveStartDate[2];
                        // foreach( $dates as $key => $ab){
                        //    $leavemonth = explode("-",$ab);
                        //    if($leavemonth[1] == $LeaveStartDate[1] ){
                            if($dates > 0 ){
                            $dates++;
                            $sickleave = $sickleave+$dates;
    
                           }else{
                            $sickleave++;
                           }
                        // }
                    }
                    
                }
            }

            $leavesArray = array();
            $WOPLeaveDays = DB::connection('mysql')->table('elsemployees')
            ->join('elsleaverequests','elsleaverequests.elsleaverequests_empid', '=', 'elsemployees.elsemployees_empid' )
            ->where('elsemployees.elsemployees_batchid','=',$employee->emptime_batchid)
            ->where('elsleaverequests.elsleaverequests_status','=','Done')
            ->where('elsleaverequests.elsleaverequests_leavetypeid','=',3)
            ->select('elsleaverequests.elsleaverequests_leavestartdate','elsleaverequests.elsleaverequests_leaveenddate')
            ->get();

            $WOPleave=0;
            
            if(count($WOPLeaveDays) > 0){

               
                foreach($WOPLeaveDays as $key=>$days){
                    $LeaveStartDate = explode("-",$days->elsleaverequests_leavestartdate); 
                    $LeaveEndDate = explode("-",$days->elsleaverequests_leaveenddate); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        // $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $from = ("$LeaveEndDate[0]".'-'."$LeaveEndDate[1]".'-'."$LeaveEndDate[2]");
                        // $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $to = ("$LeaveStartDate[0]".'-'."$LeaveStartDate[1]".'-'."$LeaveStartDate[2]");
                        // $dates = $this->generateDateRange($to, $from);
                        $dates = $LeaveEndDate[2]-$LeaveStartDate[2];
                        // foreach( $dates as $key => $ab){
                           $leavemonth = explode("-",$ab);
                        //    if($leavemonth[1] == $LeaveStartDate[1] ){
                            if($dates > 0 ){
                            $dates++;
                            $WOPleave = $WOPleave+$dates;
    
                           }else{
                            $WOPleave++;
                           }
                        // }
                    }
                    
                }
            }
            

           
            $saturday_array = array();
           $weekenddays = array();
           $workdays = array(); $type = CAL_GREGORIAN;
           $month = $previousmonth; 
           // Month ID, 1 through to 12.
            $year = date('Y'); 
           // Year in 4 digit 2009 format.
            $day_count = cal_days_in_month($type, $month, $year); 
           // Get the amount of days 
           //loop through all days
            for ($i = 1; $i <= $day_count; $i++) { $date = $year.'/'.$month.'/'.$i;
           //format date 
           $get_name = date('l', strtotime($date));
           //get week day 
           $day_name = substr($get_name, 0, 3); 
           // Trim day name to 3 chars 
           //if not a weekend add day to array
           if($day_name != 'Sun' && $day_name != 'Sat'){ $workdays[] = $i; }
           if($day_name == 'Sun' || $day_name == 'Sat'){ $weekenddays[] = $i; }
           if($day_name == 'Sat'){ $saturday_array[] = $i; }
            }
            $totalDays = count($workdays) + count($weekenddays);

            $current2Month = date('F');
               
            $monthName =  date('F', strtotime($current2Month . " last month"));
            // dd($monthName);
            
        
            $pay = $employee->Salary;   //Total Salary
            // dd($pay);

            //Calculate Present and absents and leaves of Employee.-----------------------------------
            $infloatlates = $employee_late/3;
            // dd($infloatlates);
            $lates = floor($infloatlates);
            // dd($lates);
            $WOP = count($workdays) - $TMpresent - $c;
            
            $annualLeaves = $c - $sickleave - $WOPleave ;
            

            // dd($WOP);

            if($WOP < 0 ){
                $WOP = 0;
            }

            // dd($WOP);

            $finalPresentDays = $TMpresent+count($weekenddays);
            // dd($finalPresentDays);

            if($finalPresentDays  >= $totalDays ){
                $finalPresentDays = $totalDays;
            }
            //Calculate Salary.-----------------------------------

            $totalDays = count($workdays) + count($weekenddays) ;
            $perDayPay = $pay/ $totalDays;

            
            $cutDays = $WOP + $lates + $WOPleave;
            
            $salaryPresent = $totalDays - $cutDays;

            $latesAmount = $lates * $perDayPay ;


            if($salaryPresent < 0 ){

                $salaryPresent = $finalPresentDays;
            }
            //$salaryCut = $perDayPay * $cutDays;
            
            
            // $Salary = $salaryPresent -  $salaryCut ; 


            $SalaryCAL = $salaryPresent * $perDayPay;


            $adjustmentP = DB::connection('mysql')->table('adjustments')
            ->where('EMP_BADGE_ID','=',$employee->emptime_batchid)
            ->whereMonth('AdjMonth' , '=' , $previousmonth)
            ->whereYear('AdjMonth' , '=' ,  $yearmin)
            ->select(DB::connection('mysql')->raw('SUM(adjustment) as totalAdjustment'))
            ->get();
        
            $adjustments = 0;

             if(count($adjustmentP)){
                $adjustments = $adjustmentP[0]->totalAdjustment;
                $Salary = $SalaryCAL + $adjustments; 
               
             }

             if(count($adjustmentP) == 0 ){
                $adjustments = 0;
                $Salary = $SalaryCAL + 0; 
             }
            
            //Showing data
           $data_employee_new = DB::connection('mysql')->table('payrolls')
              ->where('payrolls.EMP_BADGE_ID' , '=' , $employee->emptime_batchid)
              ->select('payrolls.*')
             ->orderBy('payrolls.EMP_BADGE_ID')
              ->get();

            //   dd($data_employee_new);
              
              if(count($data_employee_new) > 0){

               $data_employee[$index]["EMP_BADGE_ID"] = $data_employee_new[0]->EMP_BADGE_ID;
              
               $data_employee[$index]["NAME"] = $data_employee_new[0]->name;
               
               $data_employee[$index]["Department"] = $data_employee_new[0]->Department;
               
               $data_employee[$index]["lateArrival"] = $lates;

               $data_employee[$index]["latesAmount"] =Round($latesAmount);

            //    $data_employee[$index]["Presents"] = ($data_employee_new[0]->Department == "Shift A" ||$data_employee_new[0]->Department == "Shift B" ||$data_employee_new[0]->Department == "Shift C" ) ? $finalPresentDays - count($saturday_array) : $finalPresentDays ;

               $data_employee[$index]["Presents"] =$finalPresentDays;

               $data_employee[$index]["Leaves"] = $annualLeaves;

               $data_employee[$index]["SickLeaves"] = $sickleave;

               $data_employee[$index]["WOPleave"] = $WOPleave;

            //    $data_employee[$index]["WOP"] = ($data_employee_new[0]->Department == "Shift A" ||$data_employee_new[0]->Department == "Shift B" ||$data_employee_new[0]->Department == "Shift C" ) ? $WOP + count($saturday_array) : $WOP ;
               $data_employee[$index]["WOP"] = $WOP ;

               $data_employee[$index]["monthName"] = $monthName ;

               $data_employee[$index]["adjustmentP"] = $adjustments;

               $data_employee[$index]["Salary"] =round($Salary);

               $index++;        
           }
           $TMpresent = 0 ; 
           $employee_late = 0;
        }


            $result1 = array('data' => array());
     
            if($data_employee){
                $no1 = 0;
                $index2=0;
                foreach ($data_employee as $key3 => $employee1) {
                    $no1++;
                    $sNo1 = $no1;
                    $account_no1 = $employee1["EMP_BADGE_ID"];
                    $name1 = $employee1["NAME"];
                    $depart1 = $employee1["Department"];
                    $totallate1 = $employee1["lateArrival"];
                    $Present1 = $employee1["Presents"];
                    $Leaves1 = $employee1["Leaves"];
                    $lates1 = "Rs ".$employee1["latesAmount"];
                    $WOP1 = $employee1["WOP"];
                    $Salary1 = "Rs ".$employee1["Salary"];
                    $SickLeaves1 = $employee1["SickLeaves"];
                    $adjustmentP1 = "Rs ".$employee1["adjustmentP"];
                    $monthName1 = $employee1["monthName"];
                    $WOPleave1 = $employee1["WOPleave"];

                    $result1['data'][$index2] = array($sNo1,$account_no1,$monthName1,$name1,$depart1,$Present1,$Leaves1,$SickLeaves1,$WOPleave1,$WOP1,$totallate1,$lates1,$adjustmentP1,$Salary1);  
                    $index2++;
                }
        }else{
            $result1 = array('data' => array());
        }

        // dd($result1);
        // dd($result1['data']);
        // dd($result1['data'][0]);
        $result1 = $result1['data'];

        // dd($result1);

        return view('payroll.payroll', ['data' => $result1]);
    }

    public function mainPayrollData(){
        
        $yearmin = date('Y');
        $previousmonth = date('n');

        if($previousmonth == 1 ){
            $yearmin = date('Y')-1;
            $previousmonth = 12;
        }else{
            $previousmonth = date('n');
        } 

       $data_employee = array();
    //    $employee_data = DB::table('employee_timings')
    //   ->select('employee_timings.EMP_BADGE_ID')
    //   ->groupBy('employee_timings.EMP_BADGE_ID')
    //   ->get();

            $employee_data = DB::connection('mysql')->table('employee_timings')
              ->select('employee_timings.EMP_BADGE_ID','payrollsalaries.Salary')
              ->join('payrollsalaries','payrollsalaries.EMP_BADGE_ID', '=', 'employee_timings.EMP_BADGE_ID')
              ->groupBy('employee_timings.EMP_BADGE_ID')
              ->get();
             
              $index = 0;
        foreach ($employee_data as $key1 => $employee){
           
           $payroll_data = DB::connection('mysql')->table('payrolls')
           ->where('payrolls.EMP_BADGE_ID' , '=' , $employee->EMP_BADGE_ID)
           ->whereMonth('payrolls.Date' , '=' , $previousmonth)
           ->whereYear('payrolls.Date' , '=' , $yearmin)
           ->select('payrolls.*')
          ->orderBy('payrolls.EMP_BADGE_ID')
           ->get();

           $employee_late = 0;

           foreach ($payroll_data as $key2 => $starttime) {
             $employeetiming = DB::connection('mysql')->table('employee_timings')
            ->where('EMP_BADGE_ID',"=", $employee->EMP_BADGE_ID)
            ->whereDate('change_date', '<=', $starttime->Date)
            ->orderBy('T_Id', 'DESC')->first();
               if(!empty($employeetiming) > 0 && date("h:i",strtotime($employeetiming->arrival_time)) < date("h:i",strtotime($starttime->Start_time))){
                $employee_late++;
               }       
           }
           
          

           $datab = Payroll::on('mysql')->where('EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)->get();
            $a=1;
           $TMpresent = 0;
           if($datab){
                foreach ($datab as $key => $employeeb){
                   $month = explode("-",$employeeb->Date);
                   $monthdate = $month[1];
                   $Gmonth = $previousmonth ;
                   
                       if(($Gmonth == $monthdate) && ( $month[0]== $yearmin ) ){
                           $TMpresent =+  $a++ ;   
                       }else{
                           $TMpresent = 0;
                       }
                }
           }

 
            $leavesArray = array();
            $annualLeaveDays = DB::connection('mysql')->table('employee')
            ->join('leave_request','leave_request.LREQ_EMP_ID', '=', 'employee.EMP_ID' )
            ->where('employee.EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)
            ->where('leave_request.LREQ_STATUS_ID','=',4)
            ->select('leave_request.LREQ_START','leave_request.LREQ_END')
            ->get();

            $c=0;
            
            if(count($annualLeaveDays) > 0){

               
                foreach($annualLeaveDays as $key=>$days){
                    $LeaveStartDate = explode("-",$days->LREQ_START); 
                    $LeaveEndDate = explode("-",$days->LREQ_END); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $dates = $this->generateDateRange($to, $from);
                        foreach( $dates as $key => $ab){
                           $leavemonth = explode("-",$ab);
                           if($leavemonth[1] == $LeaveStartDate[1] ){
                            $c++;
    
                           }else{
                            $c;
                           }
                        }
                    }
                    
                }
            }

            $leavesArray = array();
            $sickLeaveDays = DB::connection('mysql')->table('employee')
            ->join('leave_request','leave_request.LREQ_EMP_ID', '=', 'employee.EMP_ID' )
            ->where('employee.EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)
            ->where('leave_request.LREQ_STATUS_ID','=',4)
            ->where('leave_request.LREQ_LTYPE_ID','=',2)
            ->select('leave_request.LREQ_START','leave_request.LREQ_END')
            ->get();

            $sickleave=0;
            
            if(count($sickLeaveDays) > 0){

               
                foreach($sickLeaveDays as $key=>$days){
                    $LeaveStartDate = explode("-",$days->LREQ_START); 
                    $LeaveEndDate = explode("-",$days->LREQ_END); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $dates = $this->generateDateRange($to, $from);
                        foreach( $dates as $key => $ab){
                           $leavemonth = explode("-",$ab);
                           if($leavemonth[1] == $LeaveStartDate[1] ){
                            $sickleave++;
    
                           }else{
                            $sickleave;
                           }
                        }
                    }
                    
                }
            }

            $leavesArray = array();
            $WOPLeaveDays = DB::connection('mysql')->table('employee')
            ->join('leave_request','leave_request.LREQ_EMP_ID', '=', 'employee.EMP_ID' )
            ->where('employee.EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)
            ->where('leave_request.LREQ_STATUS_ID','=',4)
            ->where('leave_request.LREQ_LTYPE_ID','=',3)
            ->select('leave_request.LREQ_START','leave_request.LREQ_END')
            ->get();

            $WOPleave=0;
            
            if(count($WOPLeaveDays) > 0){

               
                foreach($WOPLeaveDays as $key=>$days){
                    $LeaveStartDate = explode("-",$days->LREQ_START); 
                    $LeaveEndDate = explode("-",$days->LREQ_END); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $dates = $this->generateDateRange($to, $from);
                        foreach( $dates as $key => $ab){
                           $leavemonth = explode("-",$ab);
                           if($leavemonth[1] == $LeaveStartDate[1] ){
                            $WOPleave++;
    
                           }else{
                            $WOPleave;
                           }
                        }
                    }
                    
                }
            }
            

           
            $saturday_array = array();
           $weekenddays = array();
           $workdays = array(); $type = CAL_GREGORIAN;
           $month = $previousmonth; 
           // Month ID, 1 through to 12.
            $year = date('Y'); 
           // Year in 4 digit 2009 format.
            $day_count = cal_days_in_month($type, $month, $year); 
           // Get the amount of days 
           //loop through all days
            for ($i = 1; $i <= $day_count; $i++) { $date = $year.'/'.$month.'/'.$i;
           //format date 
           $get_name = date('l', strtotime($date));
           //get week day 
           $day_name = substr($get_name, 0, 3); 
           // Trim day name to 3 chars 
           //if not a weekend add day to array
           if($day_name != 'Sun' && $day_name != 'Sat'){ $workdays[] = $i; }
           if($day_name == 'Sun' || $day_name == 'Sat'){ $weekenddays[] = $i; }
           if($day_name == 'Sat'){ $saturday_array[] = $i; }
            }
            $totalDays = count($workdays) + count($weekenddays);

            $current2Month = date('F');
               
            $monthName =  date('F', strtotime($current2Month . " last month"));
            
        
            $pay = $employee->Salary;   //Total Salary

            //Calculate Present and absents and leaves of Employee.-----------------------------------
            $infloatlates = $employee_late/4;
            $lates = floor($infloatlates);
            $WOP = count($workdays) - $TMpresent - $c;
            $annualLeaves = $c - $sickleave - $WOPleave ;

            if($WOP < 0 ){
                $WOP = 0;
            }


            $finalPresentDays = $TMpresent+count($weekenddays);

            if($finalPresentDays  >= $totalDays ){
                $finalPresentDays = $totalDays;
            }
            //Calculate Salary.-----------------------------------

            $totalDays = count($workdays) + count($weekenddays) ;
            $perDayPay = $pay/ $totalDays;

            
            $cutDays = $WOP + $lates + $WOPleave;
            
            $salaryPresent = $totalDays - $cutDays;

            $latesAmount = $lates * $perDayPay ;


            if($salaryPresent < 0 ){

                $salaryPresent = $finalPresentDays;
            }
            //$salaryCut = $perDayPay * $cutDays;
            
            
            // $Salary = $salaryPresent -  $salaryCut ; 


            $SalaryCAL = $salaryPresent * $perDayPay;


            $adjustmentP = DB::connection('mysql')->table('adjustments')
            ->where('EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)
            ->whereMonth('AdjMonth' , '=' , $previousmonth)
            ->whereYear('AdjMonth' , '=' ,  $yearmin)
            ->select(DB::connection('mysql')->raw('SUM(adjustment) as totalAdjustment'))
            ->get();
        
            $adjustments = 0;

             if(count($adjustmentP)){
                $adjustments = $adjustmentP[0]->totalAdjustment;
                $Salary = $SalaryCAL + $adjustments; 
               
             }

             if(count($adjustmentP) == 0 ){
                $adjustments = 0;
                $Salary = $SalaryCAL + 0; 
             }
            
            //Showing data
           $data_employee_new = DB::connection('mysql')->table('payrolls')
              ->where('payrolls.EMP_BADGE_ID' , '=' , $employee->EMP_BADGE_ID)
              ->select('payrolls.*')
             ->orderBy('payrolls.EMP_BADGE_ID')
              ->get();
              if(count($data_employee_new) > 0){

               $data_employee[$index]["EMP_BADGE_ID"] = $data_employee_new[0]->EMP_BADGE_ID;
              
               $data_employee[$index]["NAME"] = $data_employee_new[0]->name;
               
               $data_employee[$index]["Department"] = $data_employee_new[0]->Department;
               
               $data_employee[$index]["lateArrival"] = $lates;

               $data_employee[$index]["latesAmount"] =Round($latesAmount);

            //    $data_employee[$index]["Presents"] = ($data_employee_new[0]->Department == "Shift A" ||$data_employee_new[0]->Department == "Shift B" ||$data_employee_new[0]->Department == "Shift C" ) ? $finalPresentDays - count($saturday_array) : $finalPresentDays ;

               $data_employee[$index]["Presents"] =$finalPresentDays;

               $data_employee[$index]["Leaves"] = $annualLeaves;

               $data_employee[$index]["SickLeaves"] = $sickleave;

               $data_employee[$index]["WOPleave"] = $WOPleave;

            //    $data_employee[$index]["WOP"] = ($data_employee_new[0]->Department == "Shift A" ||$data_employee_new[0]->Department == "Shift B" ||$data_employee_new[0]->Department == "Shift C" ) ? $WOP + count($saturday_array) : $WOP ;
               $data_employee[$index]["WOP"] = $WOP ;

               $data_employee[$index]["monthName"] = $monthName ;

               $data_employee[$index]["adjustmentP"] = $adjustments;

               $data_employee[$index]["Salary"] =round($Salary);

               $index++;        
           }
           $TMpresent = 0 ; 
           $employee_late = 0;
        }


            $result1 = array('data' => array());
     
            if($data_employee){
                $no1 = 0;
                $index2=0;
                foreach ($data_employee as $key3 => $employee1) {
                    $no1++;
                    $sNo1 = "<span>".$no1."</span>";
                    $account_no1 = '<span>'.$employee1["EMP_BADGE_ID"].'</span>';
                    $name1 = '<span>'.$employee1["NAME"].'</span>';
                    $depart1 = '<span>'.$employee1["Department"].'</span>';
                    $totallate1 = '<span>'.$employee1["lateArrival"].'</span>';
                    $Present1 = '<span>'.$employee1["Presents"].'</span>';
                    $Leaves1 = '<span>'.$employee1["Leaves"].'</span>';
                    $lates1 = '<span>'."Rs ".$employee1["latesAmount"].'</span>';
                    $WOP1 = '<span>'.$employee1["WOP"].'</span>';
                    $Salary1 = '<span>'."Rs ".$employee1["Salary"].'</span>';
                    $SickLeaves1 = '<span>'.$employee1["SickLeaves"].'</span>';
                    $adjustmentP1 = '<span>'."Rs ".$employee1["adjustmentP"].'</span>';
                    $monthName1 = '<span>'.$employee1["monthName"].'</span>';
                    $WOPleave1 = '<span>'.$employee1["WOPleave"].'</span>';

                    $result1['data'][$index2] = array($sNo1,$account_no1,$monthName1,$name1,$depart1,$Present1,$Leaves1,$SickLeaves1,$WOPleave1,$WOP1,$totallate1,$lates1,$adjustmentP1,$Salary1);  
                    $index2++;
                }
        }else{
            $result1 = array('data' => array());
        }
    
        echo json_encode($result1);
        
    }


    // Copy Function 
    public function mainPayrollData_copy(){

       
        $yearmin = date('Y');
        $previousmonth = date('n');

       if($previousmonth == 1 ){
        $yearmin = date('Y')-1;
        $previousmonth = 12;
       }else{
        $previousmonth = date('n');
       }

       $data_employee = array();
       $employee_data = DB::connection('mysql')->table('employee_timings')
      ->select('employee_timings.EMP_BADGE_ID')
      ->groupBy('employee_timings.EMP_BADGE_ID')
      ->get();
     
      $index = 0;
       foreach ($employee_data as $key1 => $employee) {
           
           $payroll_data = DB::connection('mysql')->table('payrolls')
           ->where('payrolls.EMP_BADGE_ID' , '=' , $employee->EMP_BADGE_ID)
           ->whereMonth('payrolls.Date' , '=' , $previousmonth)
           ->whereYear('payrolls.Date' , '=' , $yearmin)
           ->select('payrolls.*')
          ->orderBy('payrolls.EMP_BADGE_ID')
           ->get();

           $employee_late = 0;

           foreach ($payroll_data as $key2 => $starttime) {
             $employeetiming = DB::connection('mysql')->table('employee_timings')
            ->where('EMP_BADGE_ID',"=", $employee->EMP_BADGE_ID)
            ->whereDate('change_date', '<=', $starttime->Date)
            ->orderBy('T_Id', 'DESC')->first();
               if(count($employeetiming) > 0 && date("h:i",strtotime($employeetiming->arrival_time)) < date("h:i",strtotime($starttime->Start_time))){
                $employee_late++;
               }       
           }
           
          

           $datab = Payroll::on('mysql')->where('EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)->get();
            $a=1;
           $TMpresent = 0;
           if($datab){
           foreach ($datab as $key => $employeeb) {
               $month = explode("-",$employeeb->Date);
               $monthdate = $month[1];
               $Gmonth = $previousmonth ;
               
                   if(($Gmonth == $monthdate) && ( $month[0]== $yearmin ) ){
                       $TMpresent =+  $a++ ;   
                   }else{
                       $TMpresent = 0;
                   }
               }
           }

 
            $leavesArray = array();
            $annualLeaveDays = DB::connection('mysql')->table('employee')
            ->join('leave_request','leave_request.LREQ_EMP_ID', '=', 'employee.EMP_ID' )
            ->where('employee.EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)
            ->where('leave_request.LREQ_STATUS_ID','=',4)
            ->select('leave_request.LREQ_START','leave_request.LREQ_END')
            ->get();

            $c=0;
            
            if(count($annualLeaveDays) > 0){

               
                foreach($annualLeaveDays as $key=>$days){
                    $LeaveStartDate = explode("-",$days->LREQ_START); 
                    $LeaveEndDate = explode("-",$days->LREQ_END); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $dates = $this->generateDateRange($to, $from);
                        foreach( $dates as $key => $ab){
                           $leavemonth = explode("-",$ab);
                           if($leavemonth[1] == $LeaveStartDate[1] ){
                            $c++;
    
                           }else{
                            $c;
                           }
                        }
                    }
                    
                }
            }

            $leavesArray = array();
            $sickLeaveDays = DB::connection('mysql')->table('employee')
            ->join('leave_request','leave_request.LREQ_EMP_ID', '=', 'employee.EMP_ID' )
            ->where('employee.EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)
            ->where('leave_request.LREQ_STATUS_ID','=',4)
            ->where('leave_request.LREQ_LTYPE_ID','=',2)
            ->select('leave_request.LREQ_START','leave_request.LREQ_END')
            ->get();

            $sickleave=0;
            
            if(count($sickLeaveDays) > 0){

               
                foreach($sickLeaveDays as $key=>$days){
                    $LeaveStartDate = explode("-",$days->LREQ_START); 
                    $LeaveEndDate = explode("-",$days->LREQ_END); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $dates = $this->generateDateRange($to, $from);
                        foreach( $dates as $key => $ab){
                           $leavemonth = explode("-",$ab);
                           if($leavemonth[1] == $LeaveStartDate[1] ){
                            $sickleave++;
    
                           }else{
                            $sickleave;
                           }
                        }
                    }
                    
                }
            }

            $leavesArray = array();
            $WOPLeaveDays = DB::connection('mysql')->table('employee')
            ->join('leave_request','leave_request.LREQ_EMP_ID', '=', 'employee.EMP_ID' )
            ->where('employee.EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)
            ->where('leave_request.LREQ_STATUS_ID','=',4)
            ->where('leave_request.LREQ_LTYPE_ID','=',3)
            ->select('leave_request.LREQ_START','leave_request.LREQ_END')
            ->get();

            $WOPleave=0;
            
            if(count($WOPLeaveDays) > 0){

               
                foreach($WOPLeaveDays as $key=>$days){
                    $LeaveStartDate = explode("-",$days->LREQ_START); 
                    $LeaveEndDate = explode("-",$days->LREQ_END); 
                    
                    
                    
                    if( ($LeaveStartDate[0] == $yearmin ) && ($LeaveStartDate[1] == $previousmonth)){
                      
                        $from = Carbon::createFromDate($LeaveEndDate[0],$LeaveEndDate[1],$LeaveEndDate[2]);
                        $to = Carbon::createFromDate($LeaveStartDate[0],$LeaveStartDate[1],$LeaveStartDate[2]);
                        $dates = $this->generateDateRange($to, $from);
                        foreach( $dates as $key => $ab){
                           $leavemonth = explode("-",$ab);
                           if($leavemonth[1] == $LeaveStartDate[1] ){
                            $WOPleave++;
    
                           }else{
                            $WOPleave;
                           }
                        }
                    }
                    
                }
            }
            

           
            $saturday_array = array();
           $weekenddays = array();
           $workdays = array(); $type = CAL_GREGORIAN;
           $month = $previousmonth; 
           // Month ID, 1 through to 12.
            $year = date('Y'); 
           // Year in 4 digit 2009 format.
            $day_count = cal_days_in_month($type, $month, $year); 
           // Get the amount of days 
           //loop through all days
            for ($i = 1; $i <= $day_count; $i++) { $date = $year.'/'.$month.'/'.$i;
           //format date 
           $get_name = date('l', strtotime($date));
           //get week day 
           $day_name = substr($get_name, 0, 3); 
           // Trim day name to 3 chars 
           //if not a weekend add day to array
           if($day_name != 'Sun' && $day_name != 'Sat'){ $workdays[] = $i; }
           if($day_name == 'Sun' || $day_name == 'Sat'){ $weekenddays[] = $i; }
           if($day_name == 'Sat'){ $saturday_array[] = $i; }
        }
        $totalDays = count($workdays) + count($weekenddays);

        $current2Month = date('F');
           
        $monthName =  date('F', strtotime($current2Month . " last month"));
        
        
        $pay = 50000;   //Total Salary

        //Calculate Present and absents and leaves of Employee.-----------------------------------
        $infloatlates = $employee_late/4;
        $lates = floor($infloatlates);
        $WOP = count($workdays) - $TMpresent - $c;
        $annualLeaves = $c - $sickleave - $WOPleave ;

        if($WOP < 0 ){
            $WOP = 0;
        }


        $finalPresentDays = $TMpresent+count($weekenddays);

        if($finalPresentDays  >= $totalDays ){
            $finalPresentDays = $totalDays;
        }
        //Calculate Salary.-----------------------------------

        $totalDays = count($workdays) + count($weekenddays) ;
        $perDayPay = $pay/ $totalDays;

        
        $cutDays = $WOP + $lates + $WOPleave;
        
        $salaryPresent = $totalDays - $cutDays;

        $latesAmount = $lates * $perDayPay ;


        if($salaryPresent < 0 ){

            $salaryPresent = $finalPresentDays;
        }
        //$salaryCut = $perDayPay * $cutDays;
        
        
        // $Salary = $salaryPresent -  $salaryCut ; 


        $SalaryCAL = $salaryPresent * $perDayPay;


        $adjustmentP = DB::connection('mysql')->table('adjustments')
        ->where('EMP_BADGE_ID','=',$employee->EMP_BADGE_ID)
        ->whereMonth('AdjMonth' , '=' , $previousmonth)
        ->whereYear('AdjMonth' , '=' ,  $yearmin)
        ->select(DB::connection('mysql')->raw('SUM(adjustment) as totalAdjustment'))
        ->get();
        
        $adjustments = 0;

         if(count($adjustmentP)){
            $adjustments = $adjustmentP[0]->totalAdjustment;
            $Salary = $SalaryCAL + $adjustments; 
           
         }

         if(count($adjustmentP) == 0 ){
            $adjustments = 0;
            $Salary = $SalaryCAL + 0; 
         }
        
        //Showing data
           $data_employee_new = DB::connection('mysql')->table('payrolls')
              ->where('payrolls.EMP_BADGE_ID' , '=' , $employee->EMP_BADGE_ID)
              ->select('payrolls.*')
             ->orderBy('payrolls.EMP_BADGE_ID')
              ->get();
              if(count($data_employee_new) > 0){

               $data_employee[$index]["EMP_BADGE_ID"] = $data_employee_new[0]->EMP_BADGE_ID;
              
               $data_employee[$index]["NAME"] = $data_employee_new[0]->name;
               
               $data_employee[$index]["Department"] = $data_employee_new[0]->Department;
               
               $data_employee[$index]["lateArrival"] = $lates;

               $data_employee[$index]["latesAmount"] =Round($latesAmount);

            //    $data_employee[$index]["Presents"] = ($data_employee_new[0]->Department == "Shift A" ||$data_employee_new[0]->Department == "Shift B" ||$data_employee_new[0]->Department == "Shift C" ) ? $finalPresentDays - count($saturday_array) : $finalPresentDays ;

               $data_employee[$index]["Presents"] =$finalPresentDays;

               $data_employee[$index]["Leaves"] = $annualLeaves;

               $data_employee[$index]["SickLeaves"] = $sickleave;

               $data_employee[$index]["WOPleave"] = $WOPleave;

            //    $data_employee[$index]["WOP"] = ($data_employee_new[0]->Department == "Shift A" ||$data_employee_new[0]->Department == "Shift B" ||$data_employee_new[0]->Department == "Shift C" ) ? $WOP + count($saturday_array) : $WOP ;
               $data_employee[$index]["WOP"] = $WOP ;

               $data_employee[$index]["monthName"] = $monthName ;

               $data_employee[$index]["adjustmentP"] = $adjustments;

               $data_employee[$index]["Salary"] =round($Salary);

               $index++;        
           }
           $TMpresent = 0 ; 
           $employee_late = 0;
        }


        $result1 = array('data' => array());
     
        if($data_employee){
            $no1 = 0;
            $index2=0;
            foreach ($data_employee as $key3 => $employee1) {
                $no1++;
                $sNo1 = "<span>".$no1."</span>";
                $account_no1 = '<span>'.$employee1["EMP_BADGE_ID"].'</span>';
                $name1 = '<span>'.$employee1["NAME"].'</span>';
                $depart1 = '<span>'.$employee1["Department"].'</span>';
                $totallate1 = '<span>'.$employee1["lateArrival"].'</span>';
                $Present1 = '<span>'.$employee1["Presents"].'</span>';
                $Leaves1 = '<span>'.$employee1["Leaves"].'</span>';
                $lates1 = '<span>'."Rs ".$employee1["latesAmount"].'</span>';
                $WOP1 = '<span>'.$employee1["WOP"].'</span>';
                $Salary1 = '<span>'."Rs ".$employee1["Salary"].'</span>';
                $SickLeaves1 = '<span>'.$employee1["SickLeaves"].'</span>';
                $adjustmentP1 = '<span>'."Rs ".$employee1["adjustmentP"].'</span>';
                $monthName1 = '<span>'.$employee1["monthName"].'</span>';
                $WOPleave1 = '<span>'.$employee1["WOPleave"].'</span>';

                $result1['data'][$index2] = array($sNo1,$account_no1,$monthName1,$name1,$depart1,$Present1,$Leaves1,$SickLeaves1,$WOPleave1,$WOP1,$totallate1,$lates1,$adjustmentP1,$Salary1);  
                $index2++;
            }
        }else{
            $result1 = array('data' => array());
        }
    
     echo json_encode($result1);
    }
    // End Function
   /*  public function show_employeeData(){

        $yearmin =date('Y');
        $previousmonth = date('n');

       if($previousmonth == 1 ){
        $yearmin =date('Y')-1;
        $previousmonth = 12;
       }else{
        $previousmonth = date('n') -1;
       }
       
        $batchId = session()->get("batchId");

        $result = array('data' => array());
        if(session()->get('roleId') == 4){
            $data = DB::table('payrolls')
                 ->whereMonth('payrolls.Date' , '=' , $previousmonth)
                 ->whereYear('payrolls.Date' , '=' ,  $yearmin)
                 ->orderBy('payrolls.EMP_BADGE_ID')
                 ->select('payrolls.*')
                 ->get();
        }
        else if(session()->get('roleId') == 3){
            $data = DB::table('payrolls')
                ->join('employee','employee.EMP_BADGE_ID', '=', 'payrolls.EMP_BADGE_ID' )
                ->whereMonth('payrolls.Date' , '=' , $previousmonth  )
                ->whereYear('payrolls.Date' , '=' ,  $yearmin)
                ->where('employee.EMP_DEPT_ID' ,'=', session()->get('DEPT_ID'))
                ->select('payrolls.*')
                ->get();
        }
        else if(session()->get('roleId') == 2){
            $data = DB::table('payrolls')
                ->join('employee','employee.EMP_BADGE_ID', '=', 'payrolls.EMP_BADGE_ID' )
                ->whereMonth('payrolls.Date' , '=' , $previousmonth )
                ->whereYear('payrolls.Date' , '=' ,  $yearmin)
                ->where('employee.EMP_DEPT_ID' ,'=', session()->get('DEPT_ID'))
                ->select('payrolls.*')
                ->get();

        }else{
            $data = Payroll::where('EMP_BADGE_ID','=',$batchId)
            ->whereMonth('payrolls.Date' , '=' , $previousmonth )
            ->whereYear('payrolls.Date' , '=' ,  $yearmin)
            ->orderByRaw('payrolls.Date ASC')->get();
        }
        $L = 0;
        $no = 0;
        if($data){
        foreach ($data as $key => $employee) {
         $no++;
         $id= $employee->id;
         $sNo = "<span>".$no."</span>";
         $account_no = '<span>'.$employee->EMP_BADGE_ID.'</span>';
         $name = '<span>'.$employee->name.'</span>';
         $start_time = '<span>'.$employee->Start_time.'</span>';
         $end_time = '<span>'.$employee->End_time.'</span>';
         $department = '<span>'.$employee->Department.'</span>';
         $time_long = '<span>'.$employee->Time_long.'</span>';
         $date = '<span>'.$employee->Date.'</span>';
        //  $starttime = DB::table('payrolls')
        //  ->join('employee_timings','employee_timings.EMP_BADGE_ID', '=', 'payrolls.EMP_BADGE_ID' )
        //  ->select('employee_timings.arrival_time,employee_timings.EMP_BADGE_ID')
        //  ->get();

     

        $starttime = DB::table('employee_timings')
        ->where('EMP_BADGE_ID',"=", $employee->EMP_BADGE_ID)
        ->whereDate('change_date', '<=', $employee->Date)
        ->orderBy('T_Id', 'DESC')->first();

        if(count($starttime) > 0 && date("h:i",strtotime($starttime->arrival_time)) >= date("h:i",strtotime($employee->Start_time))){
            $at = "<span><label class='label label-success'>On Time</label></span>";
        }else if(count($starttime) > 0 && date("h:i",strtotime($starttime->arrival_time)) < date("h:i",strtotime($employee->Start_time))){
            $at = "<span><label class='label label-warning'>Late Comming</label></span>";
        }else{
            $at = "<span><label class='label label-danger'>Time not available</label></span>";
        }


        $endtime = DB::table('employee_timings')
        ->where('EMP_BADGE_ID',"=", $employee->EMP_BADGE_ID)
        ->whereDate('change_date', '<=', $employee->Date)
        ->orderBy('T_Id', 'DESC')->first();

        if(count($endtime) > 0 && date("h:i",strtotime($endtime->departure_time)) > date("h:i",strtotime($employee->End_time))){
            $dpt= "<span><label class='label label-warning'>Early Departure</label></span>";
        }else if(count($endtime) > 0 && date("h:i",strtotime($endtime->departure_time)) <= date("h:i",strtotime($employee->End_time))){
            $dpt= "<span><label class='label label-success'>On Time</label></span>";
        }else{
            $dpt= "<span><label class='label label-danger'>Time not available</label></span>";
        }
         if(session()->get('roleId') == 4){
            $edit_button = '<span><button type="button" onclick="getedit('.$id.')" class="btn btn-info btn-xs btnManage"><i class="fa fa-pencil "></i></button></span>';  
            $result['data'][$key] = array($sNo,$account_no,$name,$start_time,$end_time,$department,$time_long,$date,$at,$dpt,$edit_button);
            } else{
                $result['data'][$key] = array($sNo,$account_no,$name,$start_time,$end_time,$department,$time_long,$date,$at,$dpt);
            }
        
         }
         
         echo json_encode($result);
     }else{
         $result = array('data' => array());
         echo json_encode($result);
     }

    } */


    public function employee_lateCounts(){

        $yearmin =date('Y');
        $previousmonth = date('n');

       if($previousmonth == 1 ){
        $yearmin =date('Y')-1;
        $previousmonth = 12;
       }else{
        $previousmonth = date('n');
       }



       $data_employee = array();
       $employee_data = DB::connection('mysql')->table('employee_timings')
      ->select('employee_timings.EMP_BADGE_ID')
      ->groupBy('employee_timings.EMP_BADGE_ID')
      ->get();

      $index = 0;
       foreach ($employee_data as $key1 => $employee) {
           $employee_late = 0;
           $payroll_data = DB::connection('mysql')->table('payrolls')
           ->where('payrolls.EMP_BADGE_ID' , '=' , $employee->EMP_BADGE_ID)
           ->whereMonth('payrolls.Date' , '=' , $previousmonth)
           ->whereYear('payrolls.Date' , '=' , $yearmin)
           ->select('payrolls.*')
          ->orderBy('payrolls.EMP_BADGE_ID')
           ->get();

           foreach ($payroll_data as $key2 => $starttime) {
             $employeetiming = DB::connection('mysql')->table('employee_timings')
            ->where('EMP_BADGE_ID',"=", $employee->EMP_BADGE_ID)
            ->whereDate('change_date', '<=', $starttime->Date)
            ->orderBy('T_Id', 'DESC')->first();
               if(!empty($employeetiming) > 0 && date("h:i",strtotime($employeetiming->arrival_time)) < date("h:i",strtotime($starttime->Start_time))){
                $employee_late++;
               }       
           }
            
            $data_employee_new = DB::connection('mysql')->table('payrolls')
               ->where('payrolls.EMP_BADGE_ID' , '=' , $employee->EMP_BADGE_ID)
               ->select('payrolls.*')
              ->orderBy('payrolls.EMP_BADGE_ID')
               ->get();
               if(count($data_employee_new) > 0){

                $data_employee[$key1]["EMP_BADGE_ID"] = $data_employee_new[0]->EMP_BADGE_ID;
               
                $data_employee[$key1]["NAME"] = $data_employee_new[0]->name;
                
                $data_employee[$key1]["Department"] = $data_employee_new[0]->Department;
                
                $data_employee[$key1]["lateArrival"] = $employee_late;
               
            }

            $employee_late = 0;
        }  

        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=employee_lateArrival.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('S.NO', 'BADGE ID', 'NAME', 'DEPARTMENT' , 'LATE ARRIVAL'));
        if($data_employee){
            $check = false;
            $i = 0;
            foreach ($data_employee as $key => $employee) {

                    $employee["S_NO"] = $i+1;
                    array_unshift($data_employee[$key],$employee["S_NO"]);

                    $i++;
                    if($i == count($data_employee)){
                         $check = true;
                    }
            }

            if($check){
                foreach ($data_employee as $value) {
                fputcsv($output, $value); 
                }
                fclose($output);
            }
            
        
        }
        else{
            fputcsv($output, array('Not Found', 'Not Found', 'Not Found','Not Found','Not Found'));
            fclose($output);  
        }
        
    }
    

    public function editpaydata($id){
        $task = DB::connection('mysql')->table('deductions')
          ->where('deductions.deductions_id' , '=' ,$id)
          ->select('deductions.*')
          ->first();
        return view('modal.editpaydata',compact('task'));
    }

    public function update(Request $request){

        $created  = DB::connection('mysql')->table('deductions')
        ->where('deductions_id',$request->id)
        ->update(['name' => $request->addname ,
                'EMP_BADGE_ID' => $request->addBatchId,
                'deductions_bizzfund'=> $request->bizzfund,
                'deductions_tax'=> $request->tax,
                'deductions_loan'=> $request->loan,
                'deductions_apiff'=> $request->spiff,
                'deductions_advance'=> $request->advance,
                'deductions_month'=> $request->month,
                'deductions_comment'=> $request->addComment,
                'updated_at'=> date('Y-m-d')]);
        if($created){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }


    }

    public function destroy($id){

        $task = Payroll::on('mysql')->findOrFail($id);
        $Deleted =$task->delete();

        if($Deleted){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
        
    }


    public function uploadPayroll(){
        return view('uploadpayroll');   
    }

    public function createHistory(){
        return view('payroll.addPayroll');
    }

    public function historysave(Request $request){

        $this->validate($request,[
            'file'=>'required|mimes:csv,txt',
        ]);

     if(($handle = fopen($_FILES['file']['tmp_name'],"r")) !==FALSE){
      fgetcsv($handle);

                while(($data = fgetcsv($handle,1000,",")) !==FALSE){

                    $insert[] = [

                        'S_no'=>(int)$data[0],
                        'EMP_BADGE_ID'=>(int)$data[1],
                        'Month_name'=>$data[2],
                        'Name'=>$data[3],
                        'Department'=>$data[4],
                        'Presents'=>$data[5],
                        'Annual_Leaves'=>$data[6],
                        'Sick_Leaves'=>$data[7],
                        'WOP_Leaves'=>$data[8],
                        'WOP_Days'=>$data[9],
                        'Lates'=>$data[10],
                        'Lates_Deduction'=>$data[11],
                        'Adjustments'=>$data[12],
                        'Salary'=>$data[13],
                        ];
                    }

               $created = DB::connection('mysql')->table('payrollhistories')->insert($insert);
            }

            if($created){
                echo json_encode(true);
            }else{
                echo json_encode(false);
            }
    }

    public function payrollhistory(){
        return view('PayrollHistory');
    }
    //laravel has the way those data which is come in mysql

    public function payrollhistorydata(){
        $batchId = session()->get("batchId");

        $result = array('data' => array());
        if(session()->get('roleId') == 4){

        // $data_employee = DB::table('payrollhistories')
        // ->select('payrollhistories.*')
        // ->get();

        $data_employee = Payrollhistorie::on('mysql')->all();
        }
        else if(session()->get('roleId') == 3){
            $data_employee = DB::connection('mysql')->table('payrollhistories')
                ->join('employee','employee.EMP_BADGE_ID', '=', 'payrollhistories.EMP_BADGE_ID' )
                ->where('employee.EMP_DEPT_ID' ,'=', session()->get('DEPT_ID'))
                ->select('payrollhistories.*')
                ->get();
        }
        else if(session()->get('roleId') == 2){
            $data_employee= DB::connection('mysql')->table('payrollhistories')
                ->join('employee','employee.EMP_BADGE_ID', '=', 'payrollhistories.EMP_BADGE_ID' )
                ->where('employee.EMP_DEPT_ID' ,'=', session()->get('DEPT_ID'))
                ->select('payrollhistories.*')
                ->get();

        }else{

            $data_employee = DB::connection('mysql')->table('payrollhistories')
            ->where('payrollhistories.EMP_BADGE_ID' ,'=', $batchId)
            ->select('payrollhistories.*')
            ->get();
            
        }

        $no = 0;
        if($data_employee){
        foreach ($data_employee as $key => $employeeH) {
         $no++;
         $id= $employeeH->id;
         $sNo = "<span>".$no."</span>";
         $account_no = '<span>'.$employeeH->EMP_BADGE_ID.'</span>';
         $monthname = '<span>'.$employeeH->Month_name.'</span>';
         $name = '<span>'.$employeeH->Name.'</span>';
         $department = '<span>'.$employeeH->Department.'</span>';
         $present = '<span>'.$employeeH->Presents.'</span>';
         $annual_leave = '<span>'.$employeeH->Annual_Leaves.'</span>';
         $sick_leave = '<span>'.$employeeH->Sick_Leaves.'</span>';
         $wop_leave = '<span>'.$employeeH->WOP_Leaves.'</span>';
        $wop_days = '<span>'.$employeeH->WOP_Days.'</span>';
         $lates = '<span>'.$employeeH->Lates.'</span>';
         $lates_deduction = '<span>'.$employeeH->Lates_Deduction.'</span>';
         $adjustment = '<span>'.$employeeH->Adjustments.'</span>';
         $salary = '<span>'.$employeeH->Salary.'</span>';
       
         if(session()->get('roleId') == 4){
            $edit_button = '<span><button type="button" onclick="getedit('.$id.')" class="btn btn-info btn-xs btnManage"><i class="fa fa-pencil "></i></button></span>';  
            $result['data'][$key] = array($sNo,$account_no,$monthname,$name,$department,$present,$annual_leave,$sick_leave,$wop_leave,$wop_days,$lates,$lates_deduction,$adjustment,$salary,$edit_button);
            } else{
                $result['data'][$key] = array($sNo,$account_no,$monthname,$name,$department,$present,$annual_leave,$sick_leave,$wop_leave,$wop_days,$lates,$lates_deduction,$adjustment,$salary);
            }
            
         }
         echo json_encode($result); 
    }
    }

    public function editpayrollhistory($id){
       
        $task= Payrollhistorie::on('mysql')->findOrFail($id);
        return view('payroll.editpayrollhistory',compact('task'));

    }

    public function updatepayrollhistory(Request $request){

        $task = Payrollhistorie::on('mysql')->findOrFail($request->id);
        $task->EMP_BADGE_ID = $request->BadgeID;
        $task->Name = $request->Name;
        $task->Month_name = $request->MonthName;
        $task->Department = $request->Department;
        $task->Presents = $request->Presents;
        $task->Annual_Leaves = $request->AnnualLeaves;
        $task->Sick_Leaves = $request->SickLeaves;
        $task->WOP_Leaves = $request->WOPLeaves;
        $task->WOP_Days = $request->WOPDays;
        $task->Lates = $request->Lates;
        $task->Lates_Deduction = $request->LatesDeduction;
        $task->Adjustments = $request->Adjustment;
        $task->Salary = $request->Salary;
        $created =$task->save();

        if($created){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }


    }

    public function Adjustmentshow(){
        return view('Adjustments');
    }

    public function Adjustmentdata(){
        
        $result = array('data' => array());
        
            $data = DB::connection('mysql')->table('adjustments')
            ->select('adjustments.*')
            ->get();    
    

        $no = 0;
        if($data){
        foreach ($data as $key => $employeeb) {
            $no++;
            $id= $employeeb->id;
            $sNo = "<span>".$no."</span>";
            $account_no = '<span>'.$employeeb->EMP_BADGE_ID.'</span>';
            $name = '<span>'.$employeeb->name.'</span>';
            $adjustment = '<span>'.$employeeb->adjustment.'</span>';
            $AdjMonth = '<span>'.$employeeb->AdjMonth.'</span>';
            $AdjComment = '<span>'.$employeeb->AdjComment.'</span>';
            $edit_button = '<span><button type="button" onclick="getedit('.$id.')" class="btn btn-info btn-xs btnManage"><i class="fa fa-pencil "></i></button></span>';  

                $result['data'][$key] = array($sNo,$account_no,$name,$adjustment,$AdjMonth,$AdjComment,$edit_button);
               // $result['data'][$key] = array(0,0,0,0,0,0);
         }
         
         echo json_encode($result);
     }else{ 
         $result = array('data' => array());
         echo json_encode($result);
     }

       
    }

    public function Adjustmentcreate(){
        if(session()->get('role') == 1){
            $result = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees_status','=',2)
            ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
            ->get();
            $data['result'] = $result;
            return view('modal.adjustmentAdd', $data);
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function saveAdjustment(Request $request){
        $insert[] = array(
            'name' => $request->addname,
            'EMP_BADGE_ID' => $request->addBatchId,
            'adjustment' => $request->rfamount,
            'incentiveamount' => $request->incamount,
            'spiffamount' => $request->spiffamount,
            'otheramount' => $request->otheramount,
            'lastamount' => $request->lastamount,
            'AdjMonth'=> $request->addDate, 
            'AdjComment'=> $request->addComment,
        );
        $created = DB::connection('mysql')->table('adjustments')->insert($insert);

            if($created){
                echo json_encode(true);
            }else{
                echo json_encode(false);
            }
    }

    public function editAdjustment($id){
        // $task= Adjustment::findOrFail($id); 

        $task =  DB::connection('mysql')->table('adjustments')
        ->where('adjustments.id','=',$id)
        ->select('adjustments.*')
        ->get()[0];

        return view('modal.editAdjustment',compact('task'));

    }

    public function updateAdjustment(Request $request){

        $task = Adjustment::on('mysql')->findOrFail($request->id);
        $task->name = $request->editname;
        $task->EMP_BADGE_ID= $request->editBatchId;
        $task->adjustment = $request->editAdjustmentAmount;
        $task->incentiveamount = $request->incamount;
        $task->spiffamount = $request->spiffamount;
        $task->otheramount = $request->otheramount;
        $task->lastamount = $request->lastamount;
        $task->AdjMonth = $request->editDate;
        $task->AdjComment = $request->editComment;
        $created =$task->save();

        if($created){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }

    public function destroyAdjustment($id){

        $task = Adjustment::on('mysql')->findOrFail($id);
        $Deleted =$task->delete();

        if($Deleted){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }

    }

    public function EmployeeTimings(){
        return view('EmployeeTimmings');
    }

    public function EmployeeTimingsdata(){
        
        $result = array('data' => array());
        
            $data = Employee_timing::on('mysql')->all();   
    

        $no = 0;
        if($data){
        foreach ($data as $key => $employeeb) {
            $no++;
            $id= $employeeb->T_Id;
            $sNo = "<span>".$no."</span>";
            $account_no = '<span>'.$employeeb->EMP_BADGE_ID.'</span>';
            $arrival_time = '<span>'.$employeeb->arrival_time.'</span>';
            $departure_time = '<span>'.$employeeb->departure_time.'</span>';
            $date = '<span>'.$employeeb->change_date.'</span>';
            $edit_button = '<span><button type="button" onclick="getedit('.$id.')" class="btn btn-info btn-xs btnManage"><i class="fa fa-pencil "></i></button></span>';  

                $result['data'][$key] = array($sNo,$account_no,$arrival_time,$departure_time,$date,$edit_button);
               // $result['data'][$key] = array(0,0,0,0,0,0);
         }
         
         echo json_encode($result);
     }else{ 
         $result = array('data' => array());
         echo json_encode($result);
        } 
    }

    public function EmployeeTimingcreate(){
        return view('payroll.addemployeetimings');
    }

    public function saveEmployeeTiming(Request $request){


        $validate = $this->validate($request,[
            'EmployeeTimingBadgeID' =>'required|min:0|integer'
        ]);
         
            $insert[] = array(
                'EMP_BADGE_ID' => $request->EmployeeTimingBadgeID,
                'arrival_time' => $request->EmployeeTimingArrival,
                'departure_time'=> $request->EmployeeTimingDeparture,
                'change_date'=> $request->EmployeeTimingDate,
            );
            $created = DB::connection('mysql')->table('employee_timings')->insert($insert);
    
                if($created){
                    echo json_encode(true);
                }else{
                    echo json_encode(false);
                }       

    }

    public function editEmployeeTimings($id){

        $task =  DB::connection('mysql')->table('employee_timings')
        ->where('employee_timings.T_Id','=',$id)
        ->select('employee_timings.*')
        ->get()[0];

        return view('payroll.editemployeetimings',compact('task'));

    }

    public function updateEmployeeTimings(Request $request){

         $update  = DB::connection('mysql')->table('employee_timings')
            ->where('T_Id',$request->editid)
            ->update([ 'EMP_BADGE_ID' => $request->editBatchId ,'arrival_time' => $request->editarrivaltime, 'departure_time'=> $request->editdeparturetime, 'change_date'=> $request->editDate]);
        
        if($update){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
        
    }

    public function destroyEmployeeTimings($id){

        // $task = Employee_timing::findOrFail($id);
        // $Deleted = $task->delete();

        $Deleted =  DB::connection('mysql')->table('employee_timings')->where('T_Id','=',$id)->delete();

        if($Deleted){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }

    }

    public function mail(){
        Mail::send('mail', ['name','Badar'], function ($m){ 
                            $m->from('muhammad.mehroz@bizzworld.com','Muhammad Mehroz');
                            $m->to('muhammad.mehroz@bizzworld.com', 'Muhammad Mehroz')->subject('IGNORE THIS TEST MAIL BY HR AND WEB DEPARTMENT');
                         });
                         echo "Email Sent with attachment. Check your inbox.";
    }

    public function payrollSalaries(){
        if(session()->get('role') <= 2){
            return view('payroll.employeesalaries');
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }

    public function payrollSalariesData(){
        $result = array('data' => array());
        
        $data = DB::connection('mysql')->table('payrollsalaries')
        ->where('delete_status','=',2)
        ->select('payrollsalaries.*')
        ->get();

        // $datagroup = $data->groupBy('EMP_BADGE_ID');


        $no = 0;
        if($data){
        foreach ($data as $key => $employeeb) {
            $no++;
            $id= $employeeb->S_id;
            $sNo = "<span>".$no."</span>";
            $batch_no = '<span>'.$employeeb->EMP_BADGE_ID.'</span>';
            $name = '<span>'.$employeeb->Name.'</span>';
            $account_no = '<span>'.$employeeb->BankAccountNo.'</span>';
            $salary = '<span>'.$employeeb->Salary.'</span>';
            $fund = '<span>'.$employeeb->fund.'</span>';
            $salary_comment = '<span>'.$employeeb->Salary_Comment   .'</span>';
            $date = '<span>'.$employeeb->Date.'</span>';
            $edit_button = '<span><button type="button" onclick="getdata('.$employeeb->EMP_BADGE_ID.')" class="fa fa-pencil"></button></span>';  
            $delete_button = '<span><i style="cursor: pointer;" class="fa fa-trash" onclick="deletesalary('.$employeeb->EMP_BADGE_ID.')" ></i>&nbsp;</span>';

            $result['data'][$key] = array($sNo,$batch_no,$name,$account_no,$salary,$fund,$salary_comment,$date,$edit_button,$delete_button);
        }
        echo json_encode($result);
        }else{ 
        $result = array('data' => array());
        echo json_encode($result);
        } 
    }
    public function deleteemployeesalary($id){
        DB::connection('mysql')->table('payrollsalaries')
            ->where('EMP_BADGE_ID',$id)
            ->update([ 
            'delete_status'=> 1,
            ]);
        // DB::connection('mysql')->table('payrollsalaries')->where('EMP_BADGE_ID', $id)->delete();
    }
    public function payrollSalariescreate(){
        if(session()->get("role") <= 2){
            
            $result = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees_status','=',2)
            ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
            ->get();

            $data['result'] = $result;

            return view('modal.addSalaries', $data);
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }

    public function savepayrollSalaries(Request $request){
        $validate = $this->validate($request,[
            'addBatchId' =>'required|min:0|integer'
        ]);
         
            $insert[] = array(
                'Name' => $request->addname,
                'EMP_BADGE_ID' => $request->addBatchId,
                'BankAccountNo' => $request->addAccountno,
                'Salary'=> $request->addSalary,
                'fund'=> $request->addFund,
                'fund_month'=> date('m'),
                'fund_year'=> date('Y'),
                'Date'=> $request->addDate, 
                'Salary_Comment'=> $request->addComment,
            );
            $created = DB::connection('mysql')->table('payrollsalaries')->insert($insert);
    
                if($created){
                    echo json_encode(true);
                }else{
                    echo json_encode(false);
                } 
    }

    public function payrollSalarieshistory($batchId){
        
        $task =  DB::connection('mysql')->table('payrollsalaries')
        ->where('payrollsalaries.EMP_BADGE_ID','=',$batchId)
        ->select('payrollsalaries.*')
        ->get();
        return view('modal.SalaryHistory',['task'=>$task]);

    }
    
    public function editSalaries($id){

        $task =  DB::connection('mysql')->table('payrollsalaries')
        ->where('payrollsalaries.S_Id','=',$id)
        ->select('payrollsalaries.*')
        ->get()[0];

        return view('modal.editpayrollSalaries',compact('task'));
    }
    
    public function SalariesUpdate(Request $request){

        $update  = DB::connection('mysql')->table('payrollsalaries')
            ->where('S_Id',$request->id)
            ->update([ 
            'EMP_BADGE_ID' => $request->Batchid,
            'Name' => $request->Name,
            'BankAccountNo' => $request->BankAccountNo,
            'Salary'=> $request->Salary,
            'fund'=> $request->Fund,
            'Date'=> $request->Date,
            'Salary_Comment'=> $request->SalaryComment,
            'Update_By'=> session()->get("name"),
            ]);
        
        if($update){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
        
    }

    public function payrolldashboard(){
        
        if(session()->get('name')){
            
            return view('payrolldashboard');
            
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    
    public function paginate($items, $perPage = 31, $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        
        
        return  new  LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        
    
        
    }
    

    //HRM All Employee Payroll Attendance
    
    public function payrollbuttonshow(){
        
        // dd(session()->get('name'));
        if(session()->get('name')){
            
            $totalemp = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_status','=','2')
            ->select('elsemployees.elsemployees_departid')
            ->count();
            
            $totalcountempdivid  = round($totalemp/40); 
            
            $totalcountemp = $totalcountempdivid + 1; 
            
            // dd($totalcountemp);
             
            return view('payrollbutton',['datacount'=>$totalcountemp]);
            
            
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    
    public function payrolldatumsetter(){
        
             
        // $taskdata = 0;
        
        // $punchlast = DB::connection('mysql')->table('punchingdata')
        // ->select('punchingdata.punch_totaltime')
        // ->latest('punch_totaltime')
        // ->first();
        
         $firsttime = "2020-11-01 17:00:00.000";
        
        $buttontime = date("Y-m-d G:i:s");
        
        // $buttontime = date("2020-12-01 12:00:00.000");
        
        // $buttontime = "2020-07-09 00:15:00.000";
        
        $batchid = DB::connection('mysql')->table('elsemployees')
        ->where('elsemployees.elsemployees_status','=','2')
        ->orderBy('elsemployees.elsemployees_batchid','DESC')
        ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name','elsemployees.elsemployees_departid')
        ->paginate(40);
        
        // dd($batchid);
                
        $taskalldata = DB::connection('sqlsrv')->table('CHECKINOUT')
        ->where('CHECKINOUT.CHECKTYPE','!=','1')
        ->where('CHECKINOUT.CHECKTYPE','!=','0')
        // ->where('CHECKINOUT.CHECKTYPE','!=','O')
        ->whereBetween('CHECKINOUT.CHECKTIME', [$firsttime, $buttontime])
        ->select('CHECKINOUT.*')
        ->get();

        foreach($batchid as $batchiddata ){
            

                    
            $userinfo = DB::connection('sqlsrv')->table('USERINFO')
            ->where('USERINFO.BADGENUMBER','=',$batchiddata->elsemployees_batchid)
            ->select('USERINFO.USERID')
            ->first();
        
            // dd($userinfo);
                
            if(isset($userinfo->USERID)){
                    

                        
                $taskin = $taskalldata->where('CHECKTYPE','!=','O')->where('USERID','=',$userinfo->USERID);
                
                $taskout = $taskalldata->where('CHECKTYPE','!=','I')->where('USERID','=',$userinfo->USERID);
        
                // dd($taskin);

                // $taskin = DB::connection('sqlsrv')->table('CHECKINOUT')
                // ->where('CHECKINOUT.USERID','=',$userinfo->USERID)
                // ->where('CHECKINOUT.CHECKTYPE','!=','1')
                // ->where('CHECKINOUT.CHECKTYPE','!=','0')
                // ->where('CHECKINOUT.CHECKTYPE','!=','O')
                // ->whereBetween('CHECKINOUT.CHECKTIME', [$firsttime, $buttontime])
                // ->select('CHECKINOUT.*')
                // ->get();
                
                
                
                // $taskout = DB::connection('sqlsrv')->table('CHECKINOUT')
                // ->where('CHECKINOUT.USERID','=',$userinfo->USERID)
                // ->where('CHECKINOUT.CHECKTYPE','!=','1')
                // ->where('CHECKINOUT.CHECKTYPE','!=','0')
                // ->where('CHECKINOUT.CHECKTYPE','!=','I')
                // ->whereBetween('CHECKINOUT.CHECKTIME', [$firsttime, $buttontime])
                // ->select('CHECKINOUT.*')
                // ->get();
                
            
            
                
                
                // if(isset($taskin->CHECKTIME) && isset($taskout->CHECKTIME) ){
                    
                $alldata[$batchiddata->elsemployees_batchid] = $taskin;

                $split_outtime = null;
        
                // dd($alldata);

                foreach($taskin as $payrolldata){
        
                    // dd($payrolldata);
                    
                    $split_time = explode(" ",$payrolldata->CHECKTIME);
        
                    // dd($split_time);
                    
                    if((isset($split_lasttime) == NULL) && ($payrolldata->CHECKTYPE == 'I' )){
                        
                        $emp_checkin[$split_time[0]] = $split_time[1];
                        
                        $split_lasttime = $split_time[0];
                        
                        // dd($emp_checkin[$split_time[0]]);
                        
                        
                    }else if(($split_time[0] != $split_lasttime) && ($payrolldata->CHECKTYPE == 'I' )){
                        
                        $emp_checkin[$split_time[0]] = $split_time[1];
                        
                        $split_lasttime = $split_time[0];
                        
                        
                    }else{
                        
                        // $emp_checkin[$split_time[0]] = "MissIn";
                        
                        // $split_lasttime = $split_time[0];
                        
                        // dd($emp_checkin[$split_time[0]]);

                    }
                        
                
                }   
                
                // dd($taskout);
                foreach($taskout as $payrolldataout){
                    
                    $split_outtime = explode(" ",$payrolldataout->CHECKTIME);
                    
                    if((isset($split_outlasttime) == NULL) && ($payrolldataout->CHECKTYPE == 'O' )){
                        
                        $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                        
                        $split_outlasttime = $split_outtime[0];
                        
                        // dd($split_lasttime);
                        
                        
                    }else if(($split_outtime[0] == $split_outlasttime) && ($payrolldataout->CHECKTYPE == 'O' )){
                        
                        
                        
                        $emp_checkout[$split_outlasttime] = $split_outtime[1];
                        
                        $split_outlasttime = $split_outtime[0];
                        
                        
                    }else{
                        
                        // dd($split_outtime[1]);
                                
                        $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                        
                        $split_outlasttime = $split_outtime[0];
                        
                        // dd($emp_checkin[$split_time[0]]);
                    }
                        
                
                }
                        
                                        
                                
                // $taskCHECK = DB::connection('sqlsrv')->table('CHECKINOUT')
                // ->where('CHECKINOUT.USERID','=',$userinfo->USERID)
                // ->where('CHECKINOUT.CHECKTYPE','!=','1')
                // ->where('CHECKINOUT.CHECKTYPE','!=','0')
                // ->whereBetween('CHECKINOUT.CHECKTIME', [$firsttime, $buttontime])
                // ->select('CHECKINOUT.*')
                // ->first();
                                
            
                $begin = explode(" ",$firsttime);
                $begin = explode("-",$begin[0]);
                
                // dd($begin);

                $end = explode(" ",$buttontime);
                $end = explode("-",$end[0]);
                
                // dd($ends);

                $from = Carbon::createFromDate($end[0],$end[1],$end[2]+1);
                // $from = ("$end[0]".'-'."$end[1]".'-'."$ends");
                // dd($from);

                $to = Carbon::createFromDate($begin[0],$begin[1],$begin[2]);
                // $to = ("$begin[0]".'-'."$begin[1]".'-'."$begin[2]");
                // dd($to);

                $dates = $this->generateDateRange($to, $from);
                // dd($dates);

                foreach ($dates as $key => $dt) {
                    
                    if(isset($emp_checkin[$dt])){
                        
                        $timeformin = strtotime($emp_checkin[$dt]); 

                        $timein = date("h:i:sa",$timeformin); 
                        
                    }else{ 
                    
                        $timein = "NO Data" ;
                        
                    }
                    
                    
                    if(isset($dates[$key + 1])){
                        
                        $a = $key + 1 ; 
                        // dd($key);
                    }else{ 
                        
                        // $a = $key + 1 ;
                        
                        $dates[$a] = "No Data";
                        // dd($dates[$a]);
                        
                    }
                    
                    if(isset($emp_checkout[$dates[$a]])){
                        
                        $timeformout = strtotime($emp_checkout[$dates[$a]]);
                        $timeout = date("h:i:sa",$timeformout);
                        
                    }else{
                        
                        $timeout = "NO Data" ;
                        
                    }
                    
                    $day = date("l", strtotime($dt));
                    // dd($day);
                    
                    $taskdata[$dt] = array(
                        "punch_emp_batchid" => $batchiddata->elsemployees_batchid,
                        "punch_emp_name" => $batchiddata->elsemployees_name,
                        "punch_emp_date" => $dt,
                        "punch_emp_dept" => $batchiddata->elsemployees_departid,
                        "punch_emp_checkin" => $timein,
                        "punch_emp_checkout" => $timeout,
                        "punch_emp_day"  =>  $day ,
                        "punch_totaltime"  => $buttontime,
                    );
                    // dd($taskdata[$dt]);
                }
                    
                // dd($taskdata);
                
                // $created = DB::connection('mysql')->table('punchingdata')->insert($taskdata);
                    
                    
                    
                $alldata[$batchiddata->elsemployees_batchid] = $taskdata;
                // dd($taskdata);

                // }else{
                    
                    // $alldata[$punchbatchid->elsemployees_batchid] = 0;
                    
                // }
            }else{
                $alldata[$batchiddata->elsemployees_batchid] = 0;
                // dd($alldata);
            }
                
                
        } //END OF FOREACH  
            
             // dd($alldata);
        
        return $alldata;
        
    }
    //HRM All Employee Payroll Attendance



    //Daily Attendance Emloyee
    
    public function dailyattendancesearch(){
        if(session()->get('name')){
             
            $batchid = session()->get("batchid");


                
            // dd($batchid);
            
            $userinfo = DB::connection('sqlsrv')->table('Userinfo')
            ->where('Userinfo.Userid','=',$batchid)
            ->select('Userinfo.Userid')
            ->first();
            
            if(isset($userinfo->Userid)){
                
            $userinfo =  $userinfo->Userid;
            
            session()->put([
            
            'userinfo' => $userinfo,
            
            ]);
            
            }else{
                
                $userinfo = null;
            
                session()->put([
                
                'userinfo' => $userinfo,
                
                ]);
                
                
            }
            
            $year = date("Y");
            $month = date("m");
            
            $userinfo = session()->get("userinfo");
            
            
            $taskCHECK = DB::connection('sqlsrv')->table('Checkinout')
            ->where('Checkinout.Userid','=',$userinfo)
            ->where('Checkinout.CheckType','!=','2')
            ->whereYear('Checkinout.CheckTime', $year)
            ->whereMonth('Checkinout.CheckTime', $month)
            ->select('Checkinout.*')
            ->first();
            
            // dd($userinfo);
            
            if(isset($taskCHECK->CHECKTIME)){
                
                $checktimefirst = $taskCHECK->CHECKTIME ;
            
                session()->put([
                
                'chktime' => $checktimefirst,
                
                ]);
                
            }else{
                
                $checktimefirst = 0;
            
                session()->put([
                
                'chktime' => $checktimefirst,
                
                ]);
                
            }

            // dd($checktimefirst);

            return view('attendancewithsearch');
            
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
        
    public function attendancedatumdashboard(){
        
        if(session()->get("name")){
            $preday = 0 ;
            $absday = 0 ;
            $year = date("Y");
            $month = date("m");
        
            // dd($batchid);
            
            $name = session()->get("name");
            
            $batch_idemp = session()->get("batchid");
            
            // dd(session()->get("name"));
            
            $checktime = session()->get("chktime");

            // dd($checktime);
            
            if($checktime != 0){
        
                $userinfo = session()->get("userinfo");

                // dd(date('Y-m-d'));
                
                // dd($userinfo);
                
                
                $emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
                ->where('elsemployeestiming.emptime_batchid','=',$batch_idemp)
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
                // dd($taskin);
                
                $taskout = DB::connection('sqlsrv')->table('Checkinout')
                ->where('Checkinout.Userid','=',$userinfo)
                ->where('Checkinout.CheckType','!=','2')
                ->where('Checkinout.CheckType','!=','0')
                ->whereYear('Checkinout.CheckTime', $year)
                ->whereMonth('Checkinout.CheckTime', $month)
                ->select('Checkinout.*')
                ->get();

                // dd($taskout);
                foreach($taskin as $payrolldata){
                
                    $split_time = explode(" ",$payrolldata->CHECKTIME);
                
                    // if((isset($split_lasttime) == NULL) && ($payrolldata->CHECKTYPE == 'I' )){
                    
                    $emp_checkin[$split_time[0]] = $split_time[1];
                    
                    // $split_lasttime = $split_time[0];
                    
                    // dd($split_lasttime);
                    
                    
                    // }else if(($split_time[0] != $split_lasttime) && ($payrolldata->CHECKTYPE == 'I' )){
                        
                        // $emp_checkin[$split_time[0]] = $split_time[1];
                        
                        // $split_lasttime = $split_time[0];
                        
                        
                    // }else{
                        
                    // }
                    
            
                }   
                // dd($taskout);
                foreach($taskout as $payrolldataout){
                
                    $split_outtime = explode(" ",$payrolldataout->CHECKTIME);
                
                    // if((isset($split_outlasttime) == NULL) && ($payrolldataout->CHECKTYPE == 'O' )){
                        
                        $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                        
                        // $split_outlasttime = $split_outtime[0];
                        
                        // dd($split_lasttime);
                        
                        
                    // }else if(($split_outtime[0] == $split_outlasttime) && ($payrolldataout->CHECKTYPE == 'O' )){
                        
                        // $emp_checkout[$split_outlasttime] = $split_outtime[1];
                        
                        // $split_outlasttime = $split_outtime[0];
                        
                        
                    // }else{
                        
                        // dd($split_outtime[1]);
                        
                        // $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                        
                        // $split_outlasttime = $split_outtime[0];
                    // }
                    
            
                }
            
                // dd($emp_checkin['2020-07-15']); 
                
        
                // dd($checktime);
        
                $begin = explode(" ",$checktime);
                $begin = explode("-",$begin[0]);



                $end = date('Y-m-d');
                $end = explode("-",$end);



                $from = Carbon::createFromDate($end[0],$end[1],$end[2]+1);
                $to = Carbon::createFromDate($begin[0],$begin[1],$begin[2]);
                $dates = $this->generateDateRange($to, $from);


                // dd($dates);
        
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
                
                
                
                    if(($timein != "MissIn") && ($timeout != "MissOut")){
                        
                        $preday++ ;
                        
                    }else if(($timein != "MissIn") || ($timeout != "MissOut") ){
                        
                        $preday++ ;
                        
                    }else{
                        $absday++ ;
                    }       
                            
                    $todaytime = $emptimeinfo->where('emptime_startdate', '<=', $dt)->sortByDesc('emptime_id')->first();
                        
                    if($todaytime){
                        
                            if($dt >= $todaytime->emptime_startdate ){
                                
                                
                                
                                $checkintime = date("h:i:sa",strtotime($todaytime->emptime_start));
                                $checkouttime = date("h:i:sa",strtotime($todaytime->emptime_end));
                                
                                // dd($checkouttime);
                                
                                
                            }else{
                                
                                $checkintime = "09:05:59pm";
                                $checkouttime = "05:00:00am";
                                
                            }
                        
                    }
                    
                    // dd($timeincon);
                    
                    if( $timein == "MissIn" ){
                        
                        $labelin = 3;
                        
                    }elseif( $timein > $checkintime ){
                        
                        $labelin = 0;
                        
                    }elseif( $timein < $checkintime ){
                        // dd($labelin);
                        $labelin = 1;
                        
                    }
                
                
                    if( $timeout == "MissOut" ){
                        
                        $labelout = 3;
                        
                    }elseif( $timeout > $checkouttime ){
                        
                        $labelout = 1;
                        
                    }elseif( $timeout <= $checkouttime){
                        // dd($labelout);
                        $labelout = 0;
                    }
                
                    if(($timein == "MissIn") && ($timeout == "MissOut") ){
                        
                        $labelin = 2;
                        $labelout = 2;
                        
                        
                    }else{
                        
                    }

                     // dd($dt);
                    $taskdata[$dt] = array(
                        "s.no" => $key+1 ,
                        "emp_id" => session()->get("id"),
                        "emp_batchid" => session()->get("batchid"),
                        "emp_name" => session()->get("name"),
                        "emp_date" => $dt,
                        "emp_checkin" => $timein,
                        "emp_checkout" => $timeout,
                        "emp_day"  =>  $day ,
                        "emp_labelin"  =>  $labelin,
                        "emp_labelout"  =>  $labelout,
                        "emp_departid" => session()->get("dptid"),
                    );              

                }
        
        
        
                $taskdata = $this->paginate($taskdata);



                $currentmonth = date('m');
                $currentyear = date('Y');
                
                $empleaves = DB::connection('mysql')->table('elsleaverequests')
                ->where('elsleaverequests.elsleaverequests_empid','=',session()->get("id"))
                ->where('elsleaverequests.elsleaverequests_leavestartdate','Like',$currentyear.'-'.$currentmonth.'-'.'%')
                ->where('elsleaverequests.elsleaverequests_status','!=','Decline')
                ->select('elsleaverequests.elsleaverequests_totalleavedays')
                // ->count();
                ->sum('elsleaverequests.elsleaverequests_totalleavedays');
                
        
                $taskdata = $taskdata->setPath('http://localhost:401/hrm/attendancedashboarddata');
                // dd($taskdata);
         
         
                return view('dynamicemployeedata.dynamicattendancetable', ['data' => $taskdata,'presentday' => $preday, 'empleavedays'=> $empleaves,'absentday' => $absday, 'cmonth' => $month]);
         
            }else{
                $taskdata = 0;
             
                $preday= 0;

                $absday= 0;
                // dd($taskdata);
                return view('dynamicemployeedata.dynamicattendancetable', ['data' => $taskdata,'presentday' => $preday,'absentday' => $absday, 'cmonth' => $month]);
             
            }
        
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
        
    }
    
    public function attendancesearchmondatumdashboard($year,$month,$name){
        // dd($year);
        if(session()->get('name')){
            if(session()->get('role') == 4 && $name != session()->get('batchid')){
                 return redirect('/')->with('message','We report your id on HR');
            }
            $empinfo = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_batchid','=',$name)
            ->select('elsemployees.elsemployees_empid','elsemployees.elsemployees_batchid','elsemployees.elsemployees_name','elsemployees.elsemployees_departid')
            ->first();


            $currentyear = date('Y');

            $empleaves = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_batchid','=',$name)
            ->join('elsleaverequests','elsleaverequests.elsleaverequests_empid','elsemployees.elsemployees_empid')
            ->where('elsleaverequests.elsleaverequests_leavestartdate','Like',$currentyear.'-'.$month.'-'.'%')
            ->where('elsleaverequests.elsleaverequests_status','=','Done')
            ->select('elsleaverequests.elsleaverequests_totalleavedays')
            // ->count();
            ->sum('elsleaverequests.elsleaverequests_totalleavedays');

            $emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
            ->where('elsemployeestiming.emptime_batchid','=',$name)
            ->select('elsemployeestiming.*')
            ->get();
            
            // dd($emptimeinfo);

            $userinfo = DB::connection('sqlsrv')->table('Userinfo')
            ->where('Userinfo.Userid','=',$name)
            ->select('Userinfo.Userid')
            ->first();

            $userinfo = $userinfo->Userid;
            
            if($month <= 12){
                    // dd(session()->get('badar'));
                    $preday = 0 ;
                    $absday = 0 ;
                    // $year = date("Y");
                    // $month = date("m");
                    
                    // dd($batchid);
                    
                    $name = session()->get("name");
                    
                    // dd(session()->get("name"));
                    
                    $checktime = session()->get("chktime");
                    
                    // dd($checktime);

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
                                  
                        
                        // dd($taskin);
                        
                        
                        foreach($taskin as $payrolldata){
                            
                            $split_time = explode(" ",$payrolldata->CHECKTIME);
                            // dd($split_time);
                            // $split_lasttime=0;
                            
                            // if((isset($split_lasttime) == NULL) && ($payrolldata->CheckType == '1' )){
                                // dd($split_lasttime);
                            if ($split_time[1]) {
                                # code...
                            }
                                
                                $emp_checkin[$split_time[0]] = $split_time[1];
                                
                                // $split_lasttime = $split_time[0];
                                
                                
                                
                            // }else if(($split_time[0] != $split_lasttime) && ($payrolldata->CheckType == '1' )){
                                
                                // $emp_checkin[$split_time[0]] = $split_time[1];
                                
                                // $split_lasttime = $split_time[1];
                                
                                
                            // }else{
                                
                            // }
                                
                        
                        }   
                        
                        // dd($emp_checkin);
                        foreach($taskout as $payrolldataout){
                            
                            $split_outtime = explode(" ",$payrolldataout->CHECKTIME);
                            // $split_outlasttime=0;
                            
                            // if((isset($split_outlasttime) == NULL) && ($payrolldataout->CheckType == '0' )){
                                
                                $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                                
                                // $split_outlasttime = $split_outtime[0];
                                
                                // dd($split_lasttime);
                                
                                
                            // }else if(($split_outtime[0] == $split_outlasttime) && ($payrolldataout->CheckType == '0' )){
                                
                                // $emp_checkout[$split_outlasttime] = $split_outtime[1];
                                
                                // $split_outlasttime = $split_outtime[0];
                                
                                
                            // }else{
                                
                                
                                
                                // $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                                
                                // $split_outlasttime = $split_outtime[1];
                            // }
                                
                        
                        }
                        
                        
                    
                    if($month == 4 || $month == 6 || $month == 9 || $month == 11){
                        $from = Carbon::createFromDate($year,$month,31);
                    }
                    elseif($month == 2){
                        $from = Carbon::createFromDate($year,$month,29);
                    }else{
                        $from = Carbon::createFromDate($year,$month,32);
                    }
                    
                    $to = Carbon::createFromDate($year,$month,1);
                    $dates = $this->generateDateRange($to, $from);
                    
                    
                    
                    
                    foreach ($dates as $key => $dt) {
                        
                        if(isset($emp_checkin[$dt])){
                            
                            $timeformin = strtotime($emp_checkin[$dt]); 
                            $timein = date("h:i:sa",$timeformin); 
                            
                        }else{ 
                        
                            $timein = "MissIn" ;
                            
                        }
                        
                        
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
                        
                        
                        
                        if(($timein != "MissIn") && ($timeout != "MissOut")){
                            
                            $preday++ ;
                            
                        }else if(($timein != "MissIn") || ($timeout != "MissOut") ){
                            
                            $preday++ ;
                            
                        }else{
                            
                            $absday++ ;
                            
                        }
                            
                        $todaytime = $emptimeinfo->where('emptime_startdate', '<=', $dt)->sortByDesc('emptime_id')->first();
                            
                        if($todaytime){
                            
                                if($dt >= $todaytime->emptime_startdate ){
                                    
                                    
                                    
                                    $checkintime = date("h:i:sa",strtotime($todaytime->emptime_start));
                                    $checkouttime = date("h:i:sa",strtotime($todaytime->emptime_end));
                                    
                                    // dd($checkouttime);
                                    
                                    
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
                            // dd($labelin);
                            $labelin = 1;
                            
                        }
                        
                        
                        if( $timeout == "MissOut" ){
                            
                            $labelout = 3;
                            
                        }elseif( $timeout > $checkouttime ){
                            
                            $labelout = 1;
                            
                        }elseif( $timeout <= $checkouttime){
                            // dd($labelout);
                            $labelout = 0;
                        }
                        
                        if(($timein == "MissIn") && ($timeout == "MissOut") ){
                            
                            $labelin = 2;
                            $labelout = 2;
                            
                            
                        }else{
                            
                        }
                        
                        $taskdata[$dt] = array(
                            "s.no" => $key+1 ,
                            "emp_id" => $empinfo->elsemployees_empid,
                            "emp_batchid" => $empinfo->elsemployees_batchid,
                            "emp_name" => $empinfo->elsemployees_name,
                            "emp_date" => $dt,
                            "emp_checkin" => $timein,
                            "emp_checkout" => $timeout,
                            "emp_day"  =>  $day,
                            "emp_labelin"  =>  $labelin,
                            "emp_labelout"  =>  $labelout,
                            "emp_departid" => $empinfo->elsemployees_departid,
                        );
                        

                    }
                    
                    
                    
                    $taskdata = $this->paginate($taskdata);
                    
                    
                     $taskdata = $taskdata->setPath('http://localhost:401/hrm/attendancedashboarddata');
                     
                     
                     return view('dynamicemployeedata.dynamicattendancetable', ['data' => $taskdata,'presentday' => $preday,'absentday' => $absday, 'empleavedays'=> $empleaves,'year' => $year, 'month' => $month]);
                     }else{
                         return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
                     }

         
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }

    //End Daily Attendance Employee

    //HRM Payroll Attendance
    
    public function payrolldashboardsearch(){
        
        if(session()->get('name')){
            
            $totalemp = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_status','=','2')
            ->select('elsemployees.elsemployees_departid')
            ->count();
            
            $totalcountempdivid  = round($totalemp/16); 
            
            $totalcountemp = $totalcountempdivid + 1;

            // dd($totalcountemp);

            return view('payrollwithsearch',['datacount'=>$totalcountemp]);
            
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
        
    public function payrolldatumdashboard(){
        
        // $task = DB::connection('mysql')->table('elsemployees')
        // ->join('role','role.roleid', '=','elsemployees.elsemployees_roleid')
        // ->join('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
        // ->join('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
        // ->join ('empstatus','empstatus.status_id', '=','elsemployees.elsemployees_status')
        // ->where('elsemployees.elsemployees_batchid','=',session()->get("batchid"))
        // ->select('elsemployees.*','role.*','designation.*','hrm_Department.*','empstatus.*')
        // ->first(); 
        
        if(session()->get("name")){
            $preday = 0 ;
            $absday = 0 ;
            $year = date("Y");
            $month = date("m");
        
            // dd($batchid);
            $batchid = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_status','=','2')
            ->orderBy('elsemployees.elsemployees_batchid','DESC')
            ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
            ->paginate(15);
                
            // dd($batchid);

            foreach($batchid as $batchiddata ){
            
                $name = $batchiddata->elsemployees_name;
                
                $batch_idemp = $batchiddata->elsemployees_batchid;
                
                // dd($batch_idemp);
                
                // $checktime = session()->get("chktime");
                $userinfo = DB::connection('sqlsrv')->table('USERINFO')
                ->where('USERINFO.BADGENUMBER','=',$batch_idemp)
                ->select('USERINFO.USERID')
                ->first();
                
                // dd($userinfo);
                
                if(isset($userinfo->USERID)){
                    
                    $userinfo =  $userinfo->USERID;
                    // dd($userinfo);
                
                }else{
                    
                    $userinfo = null;                    
                    
                }
                // dd($userinfo);
                
                $userinfos = $userinfo;
                
                
                $taskCHECK = DB::connection('sqlsrv')->table('CHECKINOUT')
                ->where('CHECKINOUT.USERID','=',$userinfos)
                ->where('CHECKINOUT.CHECKTYPE','!=','1')
                ->where('CHECKINOUT.CHECKTYPE','!=','0')
                ->whereYear('CHECKINOUT.CHECKTIME', $year)
                ->whereMonth('CHECKINOUT.CHECKTIME', $month)
                ->select('CHECKINOUT.*')
                ->first();
                
                // dd($taskCHECK);
                
                if(isset($taskCHECK->CHECKTIME)){
                    
                    $checktimefirst = $taskCHECK->CHECKTIME ;
                    
                    $chktimes = $checktimefirst;
                    // dd($checktimefirst);
                    
                }else{
                    
                    $checktimefirst = 0;
                    
                    $chktimes = $checktimefirst;
                    // dd($chktimes);
                    
                }
                
                // if((session()->get("userinfo") != null ) && (session()->get("userinfo") == 0)){
                // dd($checktime);
                
                if($chktimes != 0){
            
                    $userinfo = $userinfos;

                    // dd(date('Y-m-d'));
                    
                    // dd($chktimes);
                    
                    
                    $taskin = DB::connection('sqlsrv')->table('CHECKINOUT')
                    ->where('CHECKINOUT.USERID','=',$userinfo)
                    ->where('CHECKINOUT.CHECKTYPE','!=','1')
                    ->where('CHECKINOUT.CHECKTYPE','!=','0')
                    ->where('CHECKINOUT.CHECKTYPE','!=','O')
                    ->whereYear('CHECKINOUT.CHECKTIME', $year)
                    ->whereMonth('CHECKINOUT.CHECKTIME', $month)
                    ->select('CHECKINOUT.*')
                    ->get();
                    // dd($taskin);
                    
                    $emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
                    ->where('elsemployeestiming.emptime_batchid','=',$batch_idemp)
                    ->select('elsemployeestiming.*')
                    ->get();

                    // dd($emptimeinfo[0]->emptime_id);
                    // dd($emptimeinfo[]);

                    if($emptimeinfo = null){
                        
                        $emptimeinfo = 1;

                        // dd($emptimeinfo);
                    }                    
                    
                    $taskout = DB::connection('sqlsrv')->table('CHECKINOUT')
                    ->where('CHECKINOUT.USERID','=',$userinfo)
                    ->where('CHECKINOUT.CHECKTYPE','!=','1')
                    ->where('CHECKINOUT.CHECKTYPE','!=','0')
                    ->where('CHECKINOUT.CHECKTYPE','!=','I')
                    ->whereYear('CHECKINOUT.CHECKTIME', $year)
                    ->whereMonth('CHECKINOUT.CHECKTIME', $month)
                    ->select('CHECKINOUT.*')
                    ->get();
                    // dd($taskout);
                    
                    foreach($taskin as $payrolldata){
                    
                        $split_time = explode(" ",$payrolldata->CHECKTIME);
                    
                        if((isset($split_lasttime) == NULL) && ($payrolldata->CHECKTYPE == 'I' )){
                        
                        $emp_checkin[$split_time[0]] = $split_time[1];
                        
                        $split_lasttime = $split_time[0];
                        
                        // dd($split_lasttime);
                        
                        
                        }else if(($split_time[0] != $split_lasttime) && ($payrolldata->CHECKTYPE == 'I' )){
                            
                            $emp_checkin[$split_time[0]] = $split_time[1];
                            
                            $split_lasttime = $split_time[0];
                            
                            
                        }else{
                            
                        }
                        
                
                    }   
                    // dd($taskout);
                    foreach($taskout as $payrolldataout){
                    
                        $split_outtime = explode(" ",$payrolldataout->CHECKTIME);
                    
                        if((isset($split_outlasttime) == NULL) && ($payrolldataout->CHECKTYPE == 'O' )){
                            
                            $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                            
                            $split_outlasttime = $split_outtime[0];
                            
                            // dd($split_lasttime);
                            
                            
                        }else if(($split_outtime[0] == $split_outlasttime) && ($payrolldataout->CHECKTYPE == 'O' )){
                            
                            $emp_checkout[$split_outlasttime] = $split_outtime[1];
                            
                            $split_outlasttime = $split_outtime[0];
                            
                            
                        }else{
                            
                            // dd($split_outtime[1]);
                            
                            $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                            
                            $split_outlasttime = $split_outtime[0];
                        }
                        
                
                    }
                
                    // dd($emp_checkin['2020-07-15']); 
                    
            
                    // dd($checktime);
            
                    $begin = explode(" ",$chktimes);
                    $begin = explode("-",$begin[0]);



                    $end = date('Y-m-d');
                    $end = explode("-",$end);



                    $from = Carbon::createFromDate($end[0],$end[1],$end[2]+1);
                    $to = Carbon::createFromDate($begin[0],$begin[1],$begin[2]);
                    $dates = $this->generateDateRange($to, $from);


                    // dd($dates);
            
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
                    
                    
                    
                        if(($timein != "MissIn") && ($timeout != "MissOut")){
                            
                            $preday++ ;
                            
                        }else if(($timein != "MissIn") || ($timeout != "MissOut") ){
                            
                            $preday++ ;
                            
                        }else{
                            $absday++ ;
                        }
                    
                        // if($dt >= "2020-07-27" ){
                            
                            // $checkintime = "07:10:59pm";
                            // $checkouttime = "04:00:00am";
                            
                        // }else{
                            
                            // $checkintime = "08:10:59pm";
                            // $checkouttime = "05:00:00am";
                            
                        // }
                        
                        
                        // if($empinfo->elsemployees_batchid == "11897" || $empinfo->elsemployees_batchid == "11340" || $empinfo->elsemployees_batchid == "11599" ){
                                
                                
                    
                               // $todaytime = $emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
                               //  ->where('elsemployeestiming.emptime_batchid','=',$batch_idemp)
                               //  ->where('emptime_startdate', '<=', $dt)
                               //  ->sortByDesc('emptime_id')
                               //  ->first();
                                
                                $todaytime = $emptimeinfo->where('emptime_startdate', '<=', $dt)->sortByDesc('emptime_id')->first();
                                // dd($todaytime);

                                if($todaytime){
                                    
                                        if($dt >= $todaytime->emptime_startdate ){
                                            
                                            
                                            
                                            $checkintime = date("h:i:sa",strtotime($todaytime->emptime_start));
                                            $checkouttime = date("h:i:sa",strtotime($todaytime->emptime_end));
                                            
                                            // dd($checkintime);
                                            
                                            
                                        }else{
                                            
                                            $checkintime = "08:10:59pm";
                                            $checkouttime = "05:00:00am";
                                            
                                        }
                                    
                                }
                                // else{
                                    
                                    // $checkintime = "08:10:59pm";
                                    // $checkouttime = "05:00:00am";
                                    
                                // }
                                
                                
                                        
                            // }else{
                            
                                // if($dt >= "2020-07-27" ){
                                    
                                    // $checkintime = "07:10:59pm";
                                    // $checkouttime = "04:00:00am";
                                    
                                // }else{
                                    
                                    // $checkintime = "08:10:59pm";
                                    // $checkouttime = "05:00:00am";
                                    
                                // }
                            
                            
                            // }
                    
                        // dd($timein);
                    
                        // $timeincon = date("h:i",strtotime($timein));
                        // $timeoutcon = date("h:i",strtotime($timeout));
                        
                        // dd($timeincon);
                        // dd($checkintime);
                        
                        if( $timein == "MissIn" ){
                            
                            $labelin = 3;
                            
                        }elseif( $timein > $checkintime ){
                            
                            $labelin = 0;
                            
                        }elseif( $timein < $checkintime ){
                            // dd($labelin);
                            $labelin = 1;
                            
                        }
                    
                    
                        if( $timeout == "MissOut" ){
                            
                            $labelout = 3;
                            
                        }elseif( $timeout > $checkouttime ){
                            
                            $labelout = 1;
                            
                        }elseif( $timeout <= $checkouttime){
                            // dd($labelout);
                            $labelout = 0;
                        }
                    
                        if(($timein == "MissIn") && ($timeout == "MissOut") ){
                            
                            $labelin = 2;
                            $labelout = 2;
                            
                            
                        }


                        // if(session()->get("batchid") == 11599 && $dt  ==  2020-10-19){
                        //     $labelin == 0;
                        // }
                         // dd($dt);
                        $taskdata[$dt] = array(
                            "emp_batchid" => $batch_idemp,
                            "emp_name" => $name,
                            "emp_date" => $dt,
                            "emp_checkin" => $timein,
                            "emp_checkout" => $timeout,
                            "emp_day"  =>  $day ,
                            "emp_labelin"  =>  $labelin,
                            "emp_labelout"  =>  $labelout,
                        );              

                    }
                         // dd($taskdata[$dt]);
            
            
            
                    // $taskdata = $this->paginate($taskdata);



                    $currentmonth = date('m');
                    $currentyear = date('Y');
                    
                    $empleaves = DB::connection('mysql')->table('elsleaverequests')
                    ->where('elsleaverequests.elsleaverequests_empid','=',$userinfo)
                    ->where('elsleaverequests.elsleaverequests_leavestartdate','Like',$currentyear.'-'.$currentmonth.'-'.'%')
                    ->where('elsleaverequests.elsleaverequests_status','!=','Decline')
                    ->select('elsleaverequests.elsleaverequests_totalleavedays')
                    // ->count();
                    ->sum('elsleaverequests.elsleaverequests_totalleavedays');
                    
            
            
                    // $taskdata = $taskdata->setPath('http://www.level3bos.com/hrm/payrolldashboarddata');
                    
             
                    // $all = (['data' => $taskdata,'presentday' => $preday, 'empleavedays'=> $empleaves,'absentday' => $absday]);
                    $alldata[$batchiddata->elsemployees_batchid] = $taskdata;
                    // dd($alldata);
             
                }else{
                    $taskdata = 0;
                 
                    $preday= 0;

                    $absday= 0;
                 
                    // $all = (['data' => $taskdata,'presentday' => $preday,'absentday' => $absday]);
                    $alldata[$batchiddata->elsemployees_batchid] = 0;
                    
                }

            }
            // dd($all['data']);
            // return view('dynamicemployeedata.dynamicpaytable', ['data' => $all]);
            return $alldata;
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
        
    }
    
    public function payrollsearchmondatumdashboard($month,$name){
        
        if(session()->get('name')){
            if(session()->get('role') == 4 && $name != session()->get('batchid')){
                 return redirect('/')->with('message','We report your id on HR');
            }
            $empinfo = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_batchid','=',$name)
            ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name','elsemployees.elsemployees_departid')
            ->first();


            $currentyear = date('Y');

            $empleaves = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_batchid','=',$name)
            ->join('elsleaverequests','elsleaverequests.elsleaverequests_empid','elsemployees.elsemployees_empid')
            ->where('elsleaverequests.elsleaverequests_leavestartdate','Like',$currentyear.'-'.$month.'-'.'%')
            ->where('elsleaverequests.elsleaverequests_status','=','Done')
            ->select('elsleaverequests.elsleaverequests_totalleavedays')
            // ->count();
            ->sum('elsleaverequests.elsleaverequests_totalleavedays');

            $emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
            ->where('elsemployeestiming.emptime_batchid','=',$name)
            ->select('elsemployeestiming.*')
            ->get();
            
            // dd($emptimeinfo);

            $userinfo = DB::connection('sqlsrv')->table('USERINFO')
            ->where('USERINFO.BADGENUMBER','=',$name)
            ->select('USERINFO.USERID')
            ->first();

            $userinfo = $userinfo->USERID;
            
            if($month <= 12){
                    // session()->put([badar => "ponka"]);
                    
                    // dd(session()->get('badar'));
                    // if(session()->get("name")){
                    $preday = 0 ;
                    $absday = 0 ;
                    $year = date("Y");
                    // $month = date("m");
                    
                    // dd($batchid);
                    
                    $name = session()->get("name");
                    
                    // dd(session()->get("name"));
                    
                    $checktime = session()->get("chktime");
                    
                    // if((session()->get("userinfo") != null ) && (session()->get("userinfo") == 0)){
                    // dd($checktime);
                    
                    // if($checktime != 0){
                    
                    
                    
                    
                    $taskin = DB::connection('sqlsrv')->table('CHECKINOUT')
                    ->where('CHECKINOUT.USERID','=',$userinfo)
                    ->where('CHECKINOUT.CHECKTYPE','!=','1')
                    ->where('CHECKINOUT.CHECKTYPE','!=','0')
                    ->where('CHECKINOUT.CHECKTYPE','!=','O')
                    ->whereYear('CHECKINOUT.CHECKTIME', $year)
                    ->whereMonth('CHECKINOUT.CHECKTIME', $month)
                    ->select('CHECKINOUT.*')
                    ->get();
                    
                    
                    $taskout = DB::connection('sqlsrv')->table('CHECKINOUT')
                    ->where('CHECKINOUT.USERID','=',$userinfo)
                    ->where('CHECKINOUT.CHECKTYPE','!=','1')
                    ->where('CHECKINOUT.CHECKTYPE','!=','0')
                    ->where('CHECKINOUT.CHECKTYPE','!=','I')
                    ->whereYear('CHECKINOUT.CHECKTIME', $year)
                    ->whereMonth('CHECKINOUT.CHECKTIME', $month)
                    ->select('CHECKINOUT.*')
                    ->get();
                                  
                        
                        
                        
                        
                        foreach($taskin as $payrolldata){
                            
                            $split_time = explode(" ",$payrolldata->CHECKTIME);
                            
                            if((isset($split_lasttime) == NULL) && ($payrolldata->CHECKTYPE == 'I' )){
                                
                                $emp_checkin[$split_time[0]] = $split_time[1];
                                
                                $split_lasttime = $split_time[0];
                                
                                
                                
                                
                            }else if(($split_time[0] != $split_lasttime) && ($payrolldata->CHECKTYPE == 'I' )){
                                
                                $emp_checkin[$split_time[0]] = $split_time[1];
                                
                                $split_lasttime = $split_time[0];
                                
                                
                            }else{
                                
                            }
                                
                        
                        }   
                        
                        
                        foreach($taskout as $payrolldataout){
                            
                            $split_outtime = explode(" ",$payrolldataout->CHECKTIME);
                            
                            if((isset($split_outlasttime) == NULL) && ($payrolldataout->CHECKTYPE == 'O' )){
                                
                                $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                                
                                $split_outlasttime = $split_outtime[0];
                                
                                // dd($split_lasttime);
                                
                                
                            }else if(($split_outtime[0] == $split_outlasttime) && ($payrolldataout->CHECKTYPE == 'O' )){
                                
                                $emp_checkout[$split_outlasttime] = $split_outtime[1];
                                
                                $split_outlasttime = $split_outtime[0];
                                
                                
                            }else{
                                
                                
                                
                                $emp_checkout[$split_outtime[0]] = $split_outtime[1];
                                
                                $split_outlasttime = $split_outtime[0];
                            }
                                
                        
                        }
                        
                        
                    
                    if($month == 4 || $month == 6 || $month == 9 || $month == 11){
                        $from = Carbon::createFromDate($year,$month,31);
                    }
                    elseif($month == 2){
                        $from = Carbon::createFromDate($year,$month,30);
                    }else{
                        $from = Carbon::createFromDate($year,$month,32);
                    }
                    
                    $to = Carbon::createFromDate($year,$month,1);
                    $dates = $this->generateDateRange($to, $from);
                    
                    
                    
                    
                    foreach ($dates as $key => $dt) {
                        
                        if(isset($emp_checkin[$dt])){
                            
                            $timeformin = strtotime($emp_checkin[$dt]); 
                            $timein = date("h:i:sa",$timeformin); 
                            
                        }else{ 
                        
                            $timein = "MissIn" ;
                            
                        }
                        
                        
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
                        
                        
                        
                        if(($timein != "MissIn") && ($timeout != "MissOut")){
                            
                            $preday++ ;
                            
                        }else if(($timein != "MissIn") || ($timeout != "MissOut") ){
                            
                            $preday++ ;
                            
                        }else{
                            
                            $absday++ ;
                            
                        }
                        
                        // if($empinfo->elsemployees_batchid == "11897" || $empinfo->elsemployees_batchid == "11340" || $empinfo->elsemployees_batchid == "11599" ){
                            
                            
                            
                            $todaytime = $emptimeinfo->where('emptime_startdate', '<=', $dt)->sortByDesc('emptime_id')->first();
                                
                            if($todaytime){
                                
                                    if($dt >= $todaytime->emptime_startdate ){
                                        
                                        
                                        
                                        $checkintime = date("h:i:sa",strtotime($todaytime->emptime_start));
                                        $checkouttime = date("h:i:sa",strtotime($todaytime->emptime_end));
                                        
                                        // dd($checkouttime);
                                        
                                        
                                    }else{
                                        
                                        $checkintime = "08:10:59pm";
                                        $checkouttime = "05:00:00am";
                                        
                                    }
                                
                            }
                            // else{
                                
                                // $checkintime = "08:10:59pm";
                                // $checkouttime = "05:00:00am";
                                
                            // }
                            
                            
                                    
                        // }else{
                        
                            // if($dt >= "2020-07-27" ){
                                
                                // $checkintime = "07:10:59pm";
                                // $checkouttime = "04:00:00am";
                                
                            // }else{
                                
                                // $checkintime = "08:10:59pm";
                                // $checkouttime = "05:00:00am";
                                
                            // }
                        
                        
                        // }
                        
                        
                        
                            
                        if( $timein == "MissIn" ){
                            
                            $labelin = 3;
                            
                        }elseif( $timein > $checkintime ){
                            
                            $labelin = 0;
                            
                        }elseif( $timein < $checkintime ){
                            // dd($labelin);
                            $labelin = 1;
                            
                        }
                        
                        
                        if( $timeout == "MissOut" ){
                            
                            $labelout = 3;
                            
                        }elseif( $timeout > $checkouttime ){
                            
                            $labelout = 1;
                            
                        }elseif( $timeout <= $checkouttime){
                            // dd($labelout);
                            $labelout = 0;
                        }
                        
                        if(($timein == "MissIn") && ($timeout == "MissOut") ){
                            
                            $labelin = 2;
                            $labelout = 2;
                            
                            
                        }else{
                            
                        }
                        
                        $taskdata[$dt] = array(
                            "s.no" => $key+1 ,
                            "emp_batchid" => $empinfo->elsemployees_batchid,
                            "emp_name" => $empinfo->elsemployees_name,
                            "emp_date" => $dt,
                            "emp_checkin" => $timein,
                            "emp_checkout" => $timeout,
                            "emp_day"  =>  $day ,
                            "emp_labelin"  =>  $labelin,
                            "emp_labelout"  =>  $labelout,
                        );
                        

                    }
                    
                    
                    
                    $taskdata = $this->paginate($taskdata);
                    
                    
                     $taskdata = $taskdata->setPath('http://www.level3bos.com/hrm/payrolldashboarddata');
                     
                     
                     return view('dynamicemployeedata.dynamicpaytable', ['data' => $taskdata,'presentday' => $preday,'absentday' => $absday, 'empleavedays'=> $empleaves]);
                     
                     // }else{
                         // $taskdata = 0;
                         
                         // $preday= 0; 
                         
                         // return view('dynamicemployeedata.dynamicpaytable', ['data' => $taskdata,'presentday' => $preday]);
                         
                     // }

                     
                     }else{
                         return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
                     }

         
         }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
         
         // }else{
             
            // $taskdata = 0; 
            
             // return view('dynamicemployeedata.dynamicpaytable', ['data' => $taskdata]);
             
         // }
        
        
    }
    //End HRM Payroll Attendance
    public function monthlydepartbiomatric(){
        $emp = DB::connection('mysql')->table('elsemployees')
                ->where('elsemployees.elsemployees_status','=',2)
                ->select('elsemployees.*')
                ->get();
        return view('monthlydepartbiomatric',['employee'=>$emp]);
    }
    public function submitmonthdepartattendance(Request $request){
        // dd($request);
        if(session()->get('name')){
            if(session()->get('role') == 4){
                 return redirect('/')->with('message','We report your id on HR');
            }
            $departemp = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_departid','=',$request->attendancedepart)
            ->where('elsemployees.elsemployees_status','=',2)
            ->select('elsemployees.elsemployees_batchid')
            ->get();
            // dd($departemp); 
            // $departindex=0;
            // foreach ($departemp as $departemps) {
            // dd($departemps->elsemployees_batchid);
            $empinfo = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_batchid','=',$request->attendancedepart)
            ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name','elsemployees.elsemployees_departid')
            ->first();
            $currentyear = date('Y');
            $empleaves = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees.elsemployees_batchid','=',$request->attendancedepart)
            ->join('elsleaverequests','elsleaverequests.elsleaverequests_empid','elsemployees.elsemployees_empid')
            ->where('elsleaverequests.elsleaverequests_leavestartdate','Like',$currentyear.'-'.$request->attendancemonth.'-'.'%')
            ->where('elsleaverequests.elsleaverequests_status','=','Done')
            ->select('elsleaverequests.elsleaverequests_totalleavedays')
            ->sum('elsleaverequests.elsleaverequests_totalleavedays');
            $emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
            ->where('elsemployeestiming.emptime_batchid','=',$request->attendancedepart)
            ->select('elsemployeestiming.*')
            ->get();
            $userinfo = DB::connection('sqlsrv')->table('Userinfo')
            ->where('Userinfo.Userid','=',$request->attendancedepart)
            ->select('Userinfo.Userid')
            ->first();
            $userinfo = $userinfo->Userid;
            if($request->attendancemonth <= 12){
                    $preday = 0 ;
                    $absday = 0 ;
                    $year = date("Y");
                    $name = session()->get("name");
                    $checktime = session()->get("chktime");
                    $taskin = DB::connection('sqlsrv')->table('Checkinout')
                    ->where('Checkinout.Userid','=',$request->attendancedepart)
                    ->where('Checkinout.CheckType','!=','2')
                    ->where('Checkinout.CheckType','!=','1')
                    ->whereYear('Checkinout.CheckTime', $year)
                    ->whereMonth('Checkinout.CheckTime', $request->attendancemonth)
                    ->select('Checkinout.*')
                    ->orderBy('Checkinout.CheckTime', 'DESC')
                    ->get();
                    // dd($taskin);
                    $taskout = DB::connection('sqlsrv')->table('Checkinout')
                    ->where('Checkinout.Userid','=',$userinfo)
                    ->where('Checkinout.CheckType','!=','2')
                    ->where('Checkinout.CheckType','!=','0')
                    ->whereYear('Checkinout.CheckTime', $year)
                    ->whereMonth('Checkinout.CheckTime', $request->attendancemonth)
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
                    if($request->attendancemonth == 4 || $request->attendancemonth == 6 || $request->attendancemonth == 9 || $request->attendancemonth == 11){
                        $from = Carbon::createFromDate($year,$request->attendancemonth,31);
                    }
                    elseif($request->attendancemonth == 2){
                        $from = Carbon::createFromDate($year,$request->attendancemonth,30);
                    }else{
                        $from = Carbon::createFromDate($year,$request->attendancemonth,32);
                    }
                    $to = Carbon::createFromDate($year,$request->attendancemonth,1);
                    $dates = $this->generateDateRange($to, $from);
                    // dd($emp_checkin);    
                    foreach ($dates as $key => $dt) {
                        if(isset($emp_checkin[$dt])){
                            $timeformin = strtotime($emp_checkin[$dt]); 
                            $timein = date("h:i:sa",$timeformin); 
                        }else{ 
                            $timein = "MissIn" ;
                        }
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
                        if(($timein != "MissIn") && ($timeout != "MissOut")){
                            $preday++ ;
                        }else if(($timein != "MissIn") || ($timeout != "MissOut") ){
                            $preday++ ;
                        }else{
                            $absday++ ;
                        }
                        // $todaytime = $emptimeinfo->where('emptime_startdate', '<=', $dt)->sortByDesc('emptime_id')->first();
                        // if($todaytime){
                        //         if($dt >= $todaytime->emptime_startdate ){
                        //             $checkintime = date("h:i:sa",strtotime($todaytime->emptime_start));
                        //             $checkouttime = date("h:i:sa",strtotime($todaytime->emptime_end));
                        //         }else{
                                    
                        //             $checkintime = "09:05:59pm";
                        //             $checkouttime = "05:00:00am";
                        //         }
                        // }
                        // if( $timein == "MissIn" ){
                        // $labelin = 3;
                        // }elseif( $timein > $checkintime ){
                        //     $labelin = 0;
                        // }elseif( $timein < $checkintime ){
                        //     $labelin = 1;
                        // }
                        // if( $timeout == "MissOut" ){
                        //     $labelout = 3;
                        // }elseif( $timeout > $checkouttime ){
                        //     $labelout = 1;
                        // }elseif( $timeout <= $checkouttime){
                        //     $labelout = 0;
                        // }
                        // if(($timein == "MissIn") && ($timeout == "MissOut") ){
                        //     $labelin = 2;
                        //     $labelout = 2;
                        // }else{
                            
                        // }
                        $taskdata[$dt] = array(
                            "s.no" => $key+1 ,
                            "emp_batchid" => $empinfo->elsemployees_batchid,
                            "emp_name" => $empinfo->elsemployees_name,
                            "emp_date" => $dt,
                            "emp_checkin" => $timein,
                            "emp_checkout" => $timeout,
                            "emp_day"  =>  $day ,
                            // "emp_labelin"  =>  $labelin,
                            // "emp_labelout"  =>  $labelout,
                        );
                        $getalldata = array($taskdata);
                    }
                    // dd($getalldata);
                }
                // $departindex++;
            // }
            // dd($getalldata);
            // foreach($getalldata as $getalldatas){
            //     dd($getalldatas);
            //     $alldata = $getalldatas[$departindex];
            // }
                        $department  = $request->attendancedepart;
                        // dd($getalldata); 
                if (isset($getalldata)) {
                    return view('biomatricattendancereport', ['data' => $getalldata, 'depart' => $department]); 
                }else{
                     return redirect('/monthlydepartbiomatric')->with('message','No Employee Found');
                }
                }else{
                    return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
                }
       }
        public function selectbioattendancemonth(){
            $depart = DB::connection('mysql')->table('hrm_Department')
            ->select('hrm_Department.*')
            ->get();
            return view('payroll.masterpayroll.selectbioattendancemonth',['depart' => $depart]);
        }   
        public function submitselectbioattendance(Request $request){
            if(session()->get("email")){
                
                if(session()->get("role") <= 2){
                    if($request->depart == "All"){
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    ->where('elsemployees.elsemployees_status','=',2)
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();    
                }else{
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    ->where('elsemployees.elsemployees_departid','=',$request->depart)
                    ->where('elsemployees.elsemployees_status','=',2)
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();
                }
                    // dd($task);
                    
                }elseif(session()->get("role") == 4){
                    
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    ->where('elsemployees.elsemployees_status','=',2)
                    ->where('elsemployees.elsemployees_empid','=',session()->get("id"))
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
                    ->orwhere('elsemployees.elsemployees_empid','=',session()->get("id"))
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();
                
                }
                $sendyear = $request->attendanceyear;
                $setmonth = $request->attendancemonth;
                // dd($sendyear);
                    $allData = array("maindata" => $task, "sendmonth" => $setmonth, "sendyear" => $sendyear);
                        return view('payroll.masterpayroll.bioattendancereport',['data'=>$allData]);
            }else{
                    return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }
    
        }
    public function Deductioncreate(){
        if(session()->get('role') != 4){
            $result = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees_status','=',2)
            ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
            ->get();
            $data['result'] = $result;
            return view('modal.deductionAdd', $data);
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function saveDeduction(Request $request){
        if(session()->get("email")){
        $this->validate($request,[
            'addBatchId'    =>'required',
            'month'         =>'required',
            'bizzfund'         =>'required',
            ]);
        $splitfunddate = explode('-', $request->month);
        $getsalary = DB::connection('mysql')->table('payrollsalaries')
        ->where('payrollsalaries.EMP_BADGE_ID','=',$request->addBatchId)
        ->select('payrollsalaries.*')
        ->first();
        $getincrementprevyear = DB::connection('mysql')->table('increment')
        ->where('increment.elsemployees_batchid','=',$request->addBatchId)
        ->where('increment.increment_year','<',$splitfunddate[0])
        ->where('increment.status_id','=',2)
        ->select('increment.increment_amount')
        ->sum('increment.increment_amount');
        if ($getincrementprevyear>0) {
        $previousyear = new DateTime($splitfunddate[0].'-01');
        $formatedpreviousyear = $previousyear->modify('-1 year')->format('Y-m-d');
        $previousmonth = new DateTime($splitfunddate[1].'01');
        $formatedpreviousmonth = $previousmonth->modify('-1 month')->format('Y-m-d');
        $getprevincrement = DB::connection('mysql')->table('increment')
        ->where('increment.elsemployees_batchid','=',$request->addBatchId)
        ->where('increment.increment_year','<',$splitfunddate[0])
        // ->where('increment.increment_month','<=',$splitfunddate[1])
        // ->where('increment.increment_year','!=',$formatedpreviousyear)
        // ->where('increment.increment_month','!=',$formatedpreviousmonth)
        ->where('increment.status_id','=',2)
        ->select('increment.increment_amount')
        ->sum('increment.increment_amount');
        $getcurrentincrement = DB::connection('mysql')->table('increment')
        ->where('increment.elsemployees_batchid','=',$request->addBatchId)
        ->where('increment.increment_year','<=',$splitfunddate[0])
        ->where('increment.increment_month','<=',$splitfunddate[1])
        ->where('increment.increment_year','!=',$formatedpreviousyear)
		->where('increment.increment_month','!=',$formatedpreviousmonth)
        ->where('increment.status_id','=',2)
        ->select('increment.increment_amount')
        ->sum('increment.increment_amount');
        $getincrement = $getprevincrement+$getcurrentincrement;
        }else{
        $getincrement = DB::connection('mysql')->table('increment')
        ->where('increment.elsemployees_batchid','=',$request->addBatchId)
        ->where('increment.increment_year','<=',$splitfunddate[0])
        ->where('increment.increment_month','<=',$splitfunddate[1])
        ->where('increment.status_id','=',2)
        ->select('increment.increment_amount')
        ->sum('increment.increment_amount');
        }
        // decrement start
		$getdecrementprevyear = DB::connection('mysql')->table('decrement')
        ->where('decrement.elsemployees_batchid','=',$request->addBatchId)
        ->where('decrement.decrement_year','<',$splitfunddate[0])
        ->where('decrement.status_id','=',2)
        ->select('decrement.decrement_amount')
        ->sum('decrement.decrement_amount');
        if ($getdecrementprevyear>0) {
        $previousyear = new DateTime($splitfunddate[0].'-01');
		$formatedpreviousyear = $previousyear->modify('-1 year')->format('Y-m-d');
		$previousmonth = new DateTime($splitfunddate[1].'01');
		$formatedpreviousmonth = $previousmonth->modify('-1 month')->format('Y-m-d');
        $getprevdecrement = DB::connection('mysql')->table('decrement')
        ->where('decrement.elsemployees_batchid','=',$request->addBatchId)
        ->where('decrement.decrement_year','<',$splitfunddate[0])
        ->where('decrement.status_id','=',2)
        ->select('decrement.decrement_amount')
        ->sum('decrement.decrement_amount');
        $getcurrentdecrement = DB::connection('mysql')->table('decrement')
        ->where('decrement.elsemployees_batchid','=',$request->addBatchId)
        ->where('decrement.decrement_year','<=',$splitfunddate[0])
        ->where('decrement.decrement_month','<=',$splitfunddate[1])
        ->where('decrement.decrement_year','!=',$formatedpreviousyear)
        ->where('decrement.decrement_month','!=',$formatedpreviousmonth)
        ->where('decrement.status_id','=',2)
        ->select('decrement.decrement_amount')
        ->sum('decrement.decrement_amount');
        $getdecrement = $getprevdecrement+$getcurrentdecrement;
        }else{
        $getdecrement = DB::connection('mysql')->table('decrement')
        ->where('decrement.elsemployees_batchid','=',$request->addBatchId)
        ->where('decrement.decrement_year','<=',$splitfunddate[0])
        ->where('decrement.decrement_month','<=',$splitfunddate[1])
        ->where('decrement.status_id','=',2)
        ->select('decrement.decrement_amount')
        ->sum('decrement.decrement_amount');
        }
		$decrement;
		if (isset($getdecrement)) {
			$decrement  = $getdecrement;
		}else{
			$decrement = "0";
		}
		// decrement end
        $totalsalary = $getsalary->Salary+$getincrement-$decrement;
        if ($splitfunddate[1] == 12) {
         $task = DB::connection('mysql')->table('payrollsalaries')
        ->where('payrollsalaries.EMP_BADGE_ID','=',$request->addBatchId)
        ->where('payrollsalaries.fund_year','>=',$splitfunddate[0])
        ->where('payrollsalaries.fund_month','>=',$splitfunddate[1])
        ->select('payrollsalaries.*')
        ->first();
        $getfund = DB::connection('mysql')->table('payrollsalaries')
        ->where('payrollsalaries.EMP_BADGE_ID','=',$request->addBatchId)
        ->select('payrollsalaries.fund')
        ->first();
        if ($request->bizzfund == "Yes") {
                $fundtodeduct = $totalsalary/100*5;
            }else{
                $fundtodeduct =0;
        }
            if (empty($task)) {
            $insert[] = array(
            'EMP_BADGE_ID' => $request->addBatchId,
            'name' => $request->addname,
            'deductions_bizzfund' => $fundtodeduct,
            'deductions_tax' => $request->tax,
            'deductions_loan' => $request->loan,
            'deductions_apiff' => $request->spiff,
            'deductions_advance' => $request->advance,
            'deductions_month'=> $request->month, 
            'deductions_comment'=> $request->addComment,
            'created_at'=> date('Y-m-d'),
            );
            $created = DB::connection('mysql')->table('deductions')->insert($insert);
            $sumallfund = $getfund->fund+$fundtodeduct;
            // dd($sumallfund);
                DB::connection('mysql')->table('payrollsalaries')
                ->where('EMP_BADGE_ID',$request->addBatchId)
                ->update(['fund' => $sumallfund,
                        'fund_month' => $splitfunddate[1],
                        'fund_year'=> $splitfunddate[0]
                        ]);

                $getloanpaid = DB::connection('mysql')->table('loan')
                ->where('loan.elsemployees_empid','=',$request->addBatchId)
                ->where('loan.loan_instalments','!=',0)
                ->select('loan.*')
                ->first();
                if ($getloanpaid) {
                    $remainingloanamount = $getloanpaid->loan_paid+$request->loan;
                    $remaininginstallmentmonth =  $getloanpaid->loan_instalments-1;
                    DB::connection('mysql')->table('loan')
                    ->where('elsemployees_empid',$getloanpaid->elsemployees_empid)
                    ->update(['loan_paid' => $remainingloanamount,
                        'loan_instalments' => $remaininginstallmentmonth,
                        'updated_by'=> session()->get('batchid'),
                        'updated_at'=> date('Y-m-d')
                    ]);
                }
            }
        }else{
        if ($splitfunddate[0] >= date('Y')) {
        $task = DB::connection('mysql')->table('payrollsalaries')
        ->where('payrollsalaries.EMP_BADGE_ID','=',$request->addBatchId)
        ->where('payrollsalaries.fund_year','>=',$splitfunddate[0])
        ->where('payrollsalaries.fund_month','>=',$splitfunddate[1])
        ->select('payrollsalaries.*')
        ->first();
        $getfund = DB::connection('mysql')->table('payrollsalaries')
        ->where('payrollsalaries.EMP_BADGE_ID','=',$request->addBatchId)
        ->select('payrollsalaries.fund')
        ->first();
        if ($request->bizzfund == "Yes") {
                $fundtodeduct = $totalsalary/100*5;
            }else{
                $fundtodeduct =0;
        }
            if (empty($task)) {
            $insert[] = array(
            'EMP_BADGE_ID' => $request->addBatchId,
            'name' => $request->addname,
            'deductions_bizzfund' => $fundtodeduct,
            'deductions_tax' => $request->tax,
            'deductions_loan' => $request->loan,
            'deductions_apiff' => $request->spiff,
            'deductions_advance' => $request->advance,
            'deductions_month'=> $request->month, 
            'deductions_comment'=> $request->addComment,
            'created_at'=> date('Y-m-d'),
            );
            $created = DB::connection('mysql')->table('deductions')->insert($insert);
            $sumallfund = $getfund->fund+$fundtodeduct;
            // dd($sumallfund);
                DB::connection('mysql')->table('payrollsalaries')
                ->where('EMP_BADGE_ID',$request->addBatchId)
                ->update(['fund' => $sumallfund,
                        'fund_month' => $splitfunddate[1],
                        'fund_year'=> $splitfunddate[0]
                        ]);

                $getloanpaid = DB::connection('mysql')->table('loan')
                ->where('loan.elsemployees_empid','=',$request->addBatchId)
                ->where('loan.loan_instalments','!=',0)
                ->select('loan.*')
                ->first();
                if ($getloanpaid) {
                    $remainingloanamount = $getloanpaid->loan_paid+$request->loan;
                    $remaininginstallmentmonth =  $getloanpaid->loan_instalments-1;
                    DB::connection('mysql')->table('loan')
                    ->where('elsemployees_empid',$getloanpaid->elsemployees_empid)
                    ->update(['loan_paid' => $remainingloanamount,
                        'loan_instalments' => $remaininginstallmentmonth,
                        'updated_by'=> session()->get('batchid'),
                        'updated_at'=> date('Y-m-d')
                    ]);
                }
            }
            }
            }
            if(isset($created)){
                echo json_encode(true);
            }else{
                echo json_encode(false);
            }
          }else{
                    return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
          }
    }
    public function loanlist(){
        if(session()->get("email")){
        $task = DB::connection('mysql')->table('loan')
        ->join ('elsemployees','elsemployees.elsemployees_batchid', '=','loan.elsemployees_empid')
        ->where('loan.status_id','=',2)
        ->select('elsemployees.*','loan.*')
        ->get();
        return view('loanlist',['data'=>$task]);
    }
    else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }   
    }
    public function addloan(){
        if(session()->get("role") <= 2){
            $result = DB::connection('mysql')->table('elsemployees')
            ->where('elsemployees_status','=',2)
            ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
            ->get();
            $data['result'] = $result;
            return view('modal.addloan', $data);
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function submitloan(Request $request) {
        if (session()->get("email")){
            $this->validate($request,[
            'batchid'       =>'required',
            'loanamount'    =>'required',
            'installment'   =>'required',
            'loanreason'    =>'required',
            ]);
            $created = DB::connection('mysql')->table('loan')->insert([
            'loan_amount'           => $request->loanamount,
            'loan_instalments'      => $request->installment,
            'loan_reason'           => $request->loanreason,
            'elsemployees_empid'    => $request->batchid,
            'status_id'             => 2,
            'created_at'            => date('Y-m-d h:i:s'),
            'created_by'            => $request->batchid,
            ]);
            if ($created) {
                return redirect('/loanlist')->with('message','Loan Added Successfully');    
            }else{
                return redirect('/loanlist')->with('message','Oops! something went wrog');  
            }
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function editloan($id){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
                $task = DB::connection('mysql')->table('loan')
                    ->where('loan_id','=',$id)
                    ->select('*')
                    ->first();
            }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }
                return view('modal.editloan',['data' => $task]);
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function submiteditloan(Request $request){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
            $edit = DB::connection('mysql')->table('loan')
            ->where('loan_id', '=', $request->hdn_loan_id)
            ->update(['loan_amount' => $request->loan_amount,
                'loan_paid' => $request->loan_paid,
                'loan_instalments' => $request->loan_instalments,
                'updated_at' => date('Y-m-d h:i:s'),
                'updated_by' => session()->get('id')]);
            
            if($edit){
                    return redirect('/loanlist')->with('message','Loan Updated Successfully');;
            }else{
                    return redirect('/loanlist')->with('message','Oops! Something went wrong');;
                }
            }else{
                    return redirect('/')->with('message','Reach HR For Access');
            }
        }else{
                    return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            } 
    }
    public function ondaylist() {
        if (session()->get("email")){
            $task = DB::connection('mysql')->table('onday')
            ->join ('elsemployees','elsemployees.elsemployees_empid', '=','onday.created_by')
            ->join ('hrm_department','hrm_department.DEPT_ID', '=','onday.DEPT_ID')
            ->where('onday.status_id','=',2)
            ->select('onday.onday_date','onday.onday_type','elsemployees.elsemployees_name','hrm_department.DEPT_NAME')
            ->get();
            return view('ondaylist',['data'=>$task]);
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function addonday(){
        if(session()->get("role") <= 3){
            $result = DB::connection('mysql')->table('hrm_department')
            ->select('hrm_department.DEPT_ID','hrm_department.DEPT_NAME')
            ->where('hrm_department.DEPT_ID','=',session()->get('dptid'))
            ->first();
            return view('modal.addonday', ['data'=>$result]);
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function submitonday(Request $request) {
        if (session()->get("email")){
            $this->validate($request,[
            'date'  =>'required'
            ]);
            $created = DB::connection('mysql')->table('onday')->insert([
            'onday_date'    => $request->date,
            'onday_type'    => $request->type,
            'DEPT_ID'       => $request->departid,
            'status_id'     => 2,
            'created_at'    => date('Y-m-d h:i:s'),
            'created_by'    => session()->get('id'),
            ]);
            if ($created) {
                return redirect('/ondaylist')->with('message','Day Added Successfully');    
            }else{
                return redirect('/ondaylist')->with('message','Oops! something went wrog'); 
            }
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function incrementlist(){
        if(session()->get("email")){
            $task = DB::connection('mysql')->table('increment')
            ->join ('elsemployees','elsemployees.elsemployees_batchid', '=','increment.elsemployees_batchid')
            ->where('increment.status_id','=',2)
            ->select('increment.*','elsemployees.elsemployees_name')
            ->get();
            // dd($task);
            return view('payroll.incrementlist',['data'=>$task]);
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function addincrementmodal(){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
                $result = DB::connection('mysql')->table('elsemployees')
                ->where('elsemployees_status','=',2)
                ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
                ->get();
                $data['result'] = $result;
                return view('modal.addincrement', $data);
            }else{
                return redirect('/incrementlist')->with('message','You Are Not Allowed To Add Increment');
            }
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }

    public function addincrement(Request $request){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
            $this->validate($request, [
                'amount'=>'required',
                'month'=>'required',
                'batchid'=>'required',
            ]);
            $addincre[] = array(
                'increment_amount' => $request->amount,
                'increment_year' => date('Y'),
                'increment_month' => $request->month,
                'elsemployees_batchid' => $request->batchid,
                'status_id' => 2,
                'created_by' => session()->get('id'),
                'created_at' => date('Y-m-d h:i:s')
                );
            DB::connection('mysql')->table('increment')->insert($addincre);
            if($addincre){
                    return redirect('/incrementlist')->with('message','Increment Added Successfully');;
            }
            else{
                return redirect('/incrementlist')->with('message','Oops! Something went wrong');;
            }
            }
            else{
                return redirect('/')->with('message','Reach HR For Access');
                }
            }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
            } 
    }

    public function editincrementmodal($id){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
                $task = DB::connection('mysql')->table('increment')
                    ->where('increment.increment_id','=',$id)
                    ->select('increment.*')
                    ->first();
                return view('modal.editincrement',['data' => $task ]);
            }else{
                return redirect('/incrementlist')->with('message','You Are Not Allowed To Edit Increment');
            }
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function editsubmitincrement(Request $request){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
                $this->validate($request, [
                'amount'=>'required',
                'month'=>'required',
                'hdnincrementid'=>'required',
                ]);
                $editincrement = DB::connection('mysql')->table('increment')
                ->where('increment.increment_id', '=', $request->hdnincrementid)
                ->update(['increment_amount' => $request->amount,
                    'increment_month' => $request->month,
                    'updated_at' => date('Y-m-d h:i:s'),
                    'updated_by' => session()->get('id')]);
                
                if($editincrement){
                        return redirect('/incrementlist')->with('message','Increment Updated Successfully');;
                            }
                else{
                        return redirect('/incrementlist')->with('message','Oops! Something went wrong');;
                    }
                    }else{
                        return redirect('/')->with('message','Reach HR For Access');
                        }
            }else{
                        return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
                } 
        }
        public function deleteincrement($id){
            if(session()->get("email")){
                DB::connection('mysql')->table('increment')
                ->where('increment.increment_id', '=', $id)
                ->update(['status_id' => 1]);
                    return redirect('/incrementlist')->with('message','Increment Successfully Deleted!');
            }else{
                    return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
                } 
        }
        // complete month attendance start
        public function selectmonthforattendance(){
            return view('selectmonthforattendance');
        }   
        public function submitselectmonthforattendance(Request $request){
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
                    
                }elseif(session()->get("role") == 4){
                    
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    ->where('elsemployees.elsemployees_status','=',2)
                    ->where('elsemployees.elsemployees_empid','=',session()->get("id"))
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
                    ->orwhere('elsemployees.elsemployees_empid','=',session()->get("id"))
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();
                
                }
                $sendyear = $request->attendanceyear;
                $setmonth = $request->attendancemonth;
                    $allData = array("maindata" => $task, "sendyear" => $sendyear, "sendmonth" => $setmonth);
                        return view('monthlyattendancereport',['data'=>$allData]);
            }else{
                    return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }
    
        }
        // complete month attendance end
        // mis report start
        public function misreportmonth(){
            $depart = DB::connection('mysql')->table('hrm_Department')
            ->select('hrm_Department.*')
            ->get();
            return view('payroll.masterpayroll.misreportmonth', ['data'=>$depart]);
        }   
        public function submitmisreportmonth(Request $request){
            if(session()->get("email")){
                // dd($request);
                if(session()->get("role") <= 2){
                    $year = $request->attendanceyear;
                    $day = "01";
                    $yearandmonth = $year.'-'.$request->attendancemonth;
                    $monthplusone = $request->attendancemonth+1;
                    if ($request->attendancemonth < 9) {
                        $doj = $year.'-'.'0'.$monthplusone.'-'.$day;
                    }else{
                        $doj = $year.'-'.$monthplusone.'-'.$day;
                    }
                    // dd($doj);
                    $acknowledgedemployee = DB::connection('mysql')->table('acknowledgedpay')
                    ->where('acknowledgedpay_month','=',$yearandmonth)
                    ->where('status_id','=',2)
                    ->select('created_by')
                    ->get();
                    $employeesformis = array();
                    foreach ($acknowledgedemployee as $acknowledgedemployees) {
                        $employeesformis[] = $acknowledgedemployees->created_by;
                    }
                    $holdemployee = DB::connection('mysql')->table('holdsalary')
                    ->where('holdsalary_month','=',$yearandmonth)
                    ->where('status_id','=',2)
                    ->select('holdsalary_empbatchid')
                    ->get();
                    $employeesforhold = array();
                    foreach ($holdemployee as $holdemployees) {
                        $employeesforhold[] = $holdemployees->holdsalary_empbatchid;
                    }
                    $sendyear = $request->attendanceyear;
                    $setmonth = $request->attendancemonth;
                    if ($request->misstatus == "Active") {
                    if ($request->emp_dept == "all") {
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    ->where('elsemployees.elsemployees_status','=',2)
                    ->where('elsemployees.elsemployees_dofjoining','<',$doj)
                    ->whereIn('elsemployees.elsemployees_batchid',$employeesformis)
                    ->whereNotIn('elsemployees.elsemployees_batchid',$employeesforhold)
                    // ->where('elsemployees.account_no','!=',null)
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();    
                    }else{
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    ->where('elsemployees.elsemployees_status','=',2)
                    ->where('elsemployees.elsemployees_dofjoining','<',$doj)
                    ->where('elsemployees.elsemployees_departid','=',$request->emp_dept)
                    ->whereIn('elsemployees.elsemployees_batchid',$employeesformis)
                    ->whereNotIn('elsemployees.elsemployees_batchid',$employeesforhold)
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();
                    }
                    } else if($request->misstatus == "Print") {
                    if ($request->emp_dept == "all") {
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    ->where('elsemployees.elsemployees_status','=',2)
                    ->where('elsemployees.elsemployees_dofjoining','<',$doj)
                    ->whereIn('elsemployees.elsemployees_batchid',$employeesformis)
                    ->whereNotIn('elsemployees.elsemployees_batchid',$employeesforhold)
                    // ->where('elsemployees.account_no','!=',null)
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();    
                    }else{
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    ->where('elsemployees.elsemployees_status','=',2)
                    ->where('elsemployees.elsemployees_dofjoining','<',$doj)
                    ->where('elsemployees.elsemployees_departid','=',$request->emp_dept)
                    ->whereIn('elsemployees.elsemployees_batchid',$employeesformis)
                    ->whereNotIn('elsemployees.elsemployees_batchid',$employeesforhold)
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();
                    }
                    $allData = array("maindata" => $task, "sendyear" => $sendyear, "sendmonth" => $setmonth);
                        return view('payroll.masterpayroll.printmisreport',['data'=>$allData]);
                    }else{
                     if ($request->emp_dept == "all") {
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    // ->where('elsemployees.elsemployees_status','=',2)
                    ->where('elsemployees.elsemployees_dofjoining','<',$doj)
                    ->whereIn('elsemployees.elsemployees_batchid',$employeesformis)
                    ->whereIn('elsemployees.elsemployees_batchid',$employeesforhold)
                    // ->where('elsemployees.account_no','!=',null)
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();    
                    }else{
                    $task = DB::connection('mysql')->table('elsemployees')
                    ->join ('hrm_Department','hrm_Department.dept_id', '=','elsemployees.elsemployees_departid')
                    ->join ('designation','designation.DESG_ID', '=','elsemployees.elsemployees_desgid')
                    ->join ('role','role.roleid', '=','elsemployees.elsemployees_roleid')
                    // ->where('elsemployees.elsemployees_status','=',2)
                    ->where('elsemployees.elsemployees_dofjoining','<',$doj)
                    ->where('elsemployees.elsemployees_departid','=',$request->emp_dept)
                    ->whereIn('elsemployees.elsemployees_batchid',$employeesformis)
                    ->whereIn('elsemployees.elsemployees_batchid',$employeesforhold)
                    ->select('elsemployees.*','hrm_Department.dept_name','designation.DESG_NAME','role.rolename')
                    ->get();
                    }   
                    }
                }else{
                    return redirect('/')->with('message','You Are Not Allowed To View Report');
                }
                $allData = array("maindata" => $task, "sendyear" => $sendyear, "sendmonth" => $setmonth);
                    return view('payroll.masterpayroll.misreport',['data'=>$allData]);
            }else{
                    return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }
    
        }
        // mis report end
        public function monthlylistattendance(Request $request){
            if(session()->get("email") && session()->get("role") <= 2){
            $taskin = DB::connection('sqlsrv')->table('Checkinout')
            ->where('Checkinout.CheckType','!=','2')
            ->where('Checkinout.CheckType','!=','1')
            ->whereYear('Checkinout.CheckTime', $request->attendanceyear)
            ->whereMonth('Checkinout.CheckTime', $request->attendancemonth)
            ->select('Checkinout.CheckTime','Checkinout.Userid')
            ->get();
            $taskin->month = $request->attendancemonth;
            // dd($taskin);
            return view('biomatricattendancereport', ['data' => $taskin]); 
             }else{
                    return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            }
        }
        public function acknowledgedpay($id){
        if(session()->get("email")){
               $splitbatchidandmonth = explode('~', $id);
               $insert[] = array(
                    'acknowledgedpay_status' => "Acknowledged",
                    'acknowledgedpay_month'  => $splitbatchidandmonth[1],
                    'created_by'             => $splitbatchidandmonth[0],
                    'status_id'              => 2,
                    'created_at'             => date('Y-m-d h:i:s'),
                );
                $created = DB::connection('mysql')->table('acknowledgedpay')->insert($insert);
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function deliveredpay($id,$amount){
        if(session()->get("email")){
            $splitbatchidandmonth = explode('~', $id);
               $insert[] = array(
                    'deliveredpay_amount' => $amount,
                    'deliveredpay_status' => "Delivered",
                    'deliveredpay_month'  => $splitbatchidandmonth[1],
                    'status_id'           => 2,
                    'created_by'          => $splitbatchidandmonth[0],
                    'created_at'          => date('Y-m-d h:i:s'),
                );
                DB::connection('mysql')->table('deliveredpay')->insert($insert);
                $deliverd_id = DB::connection('mysql')->getPdo()->lastInsertId();
                $insertlog[] = array(
                    'deliveredpaylog_amount' => $amount,
                    'deliveredpay_id'        => $deliverd_id,
                    'created_by'             => session()->get('id'),
                    'status_id'              => 2,
                    'created_by'             => session()->get('id'),
                    'created_at'             => date('Y-m-d h:i:s'),
                );
                $created = DB::connection('mysql')->table('deliveredpaylog')->insert($insertlog);
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function deliverreamining($id,$amount){
        if(session()->get("email")){
            $getpreviousamount = DB::connection('mysql')->table('deliveredpay')
            ->where('deliveredpay_id','=',$id)
            ->select('deliveredpay_amount')
            ->first();
            $sumdeliveramount = $getpreviousamount->deliveredpay_amount+$amount;
            $update = DB::connection('mysql')->table('deliveredpay')
            ->where('deliveredpay_id', '=', $id)
            ->update(['deliveredpay_amount' => $sumdeliveramount]);
            $insertlog[] = array(
                'deliveredpaylog_amount' => $amount,
                'deliveredpay_id'        => $id,
                'created_by'             => session()->get('id'),
                'status_id'              => 2,
                'created_by'             => session()->get('id'),
                'created_at'             => date('Y-m-d h:i:s'),
            );
            $created = DB::connection('mysql')->table('deliveredpaylog')->insert($insertlog);
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function viewdeliversalarylog($id){
        if(session()->get("email")){
            $task = DB::connection('mysql')->table('deliveredpaylog')
            ->join ('elsemployees','elsemployees.elsemployees_empid', '=','deliveredpaylog.created_by')
            ->where('deliveredpay_id','=',$id)
            ->select('deliveredpaylog.*','elsemployees.elsemployees_name')
            ->get();
            return view('payroll.modal.deliversalarylog',['data' => $task]);
        }else{
            return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function holdsalary($id){
        if(session()->get("email")){
            $splitbatchidandmonth = explode('~', $id);
               $insert[] = array(
                    'holdsalary_month'      => $splitbatchidandmonth[1],
                    'holdsalary_empbatchid' => $splitbatchidandmonth[0],
                    'status_id'             => 2,
                    'created_by'            => session()->get('batchid'),
                    'created_at'            => date('Y-m-d h:i:s'),
                );
                $created = DB::connection('mysql')->table('holdsalary')->insert($insert);
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function activeholdsalary($id){
        if(session()->get("email")){
            $update = DB::connection('mysql')->table('holdsalary')
            ->where('holdsalary_id', '=', $id)
            ->update(['status_id' => 1]);
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    // Decrement
    public function decrementlist(){
        if(session()->get("email")){
            $task = DB::connection('mysql')->table('decrement')
            ->join ('elsemployees','elsemployees.elsemployees_batchid', '=','decrement.elsemployees_batchid')
            ->where('decrement.status_id','=',2)
            ->select('decrement.*','elsemployees.elsemployees_name')
            ->get();
            // dd($task);
            return view('decrement.decrementlist',['data'=>$task]);
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function adddecrementmodal(){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
                $result = DB::connection('mysql')->table('elsemployees')
                ->where('elsemployees_status','=',2)
                ->select('elsemployees.elsemployees_batchid','elsemployees.elsemployees_name')
                ->get();
                $data['result'] = $result;
                return view('decrement.modal.adddecrement', $data);
            }else{
                return redirect('/decrementlist')->with('message','You Are Not Allowed To Add Decrement');
            }
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }

    public function adddecrement(Request $request){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
            $this->validate($request, [
                'amount'=>'required',
                'month'=>'required',
                'batchid'=>'required',
            ]);
            $adddecre[] = array(
                'decrement_amount' => $request->amount,
                'decrement_year' => date('Y'),
                'decrement_month' => $request->month,
                'elsemployees_batchid' => $request->batchid,
                'status_id' => 2,
                'created_by' => session()->get('id'),
                'created_at' => date('Y-m-d h:i:s')
                );
            DB::connection('mysql')->table('decrement')->insert($adddecre);
            if($adddecre){
                    return redirect('/decrementlist')->with('message','Decrement Added Successfully');;
            }
            else{
                return redirect('/decrementlist')->with('message','Oops! Something went wrong');;
            }
            }
            else{
                return redirect('/')->with('message','Reach HR For Access');
                }
            }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');;
            } 
    }
    public function editdecrementmodal($id){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
                $task = DB::connection('mysql')->table('decrement')
                    ->where('decrement.decrement_id','=',$id)
                    ->select('decrement.*')
                    ->first();
                return view('decrement.modal.editdecrement',['data' => $task]);
            }else{
                return redirect('/decrementlist')->with('message','You Are Not Allowed To Edit Decrement');
            }
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        }
    }
    public function editsubmitdecrement(Request $request){
        if(session()->get("email")){
            if(session()->get("role") <= 2){
                $this->validate($request, [
                'amount'=>'required',
                'month'=>'required',
                'hdndecrementid'=>'required',
                ]);
                $editdecrement = DB::connection('mysql')->table('decrement')
                ->where('decrement.decrement_id', '=', $request->hdndecrementid)
                ->update(['decrement_amount' => $request->amount,
                    'decrement_month' => $request->month,
                    'updated_at' => date('Y-m-d h:i:s'),
                    'updated_by' => session()->get('id')]);
                
                if($editdecrement){
                        return redirect('/decrementlist')->with('message','Decrement Updated Successfully');;
                            }
                else{
                        return redirect('/decrementlist')->with('message','Oops! Something went wrong');;
                    }
                    }else{
                        return redirect('/')->with('message','Reach HR For Access');
                        }
        }else{
              return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
        } 
    }
    public function deletedecrement($id){
        if(session()->get("email")){
            DB::connection('mysql')->table('decrement')
            ->where('decrement.decrement_id', '=', $id)
            ->update(['status_id' => 1]);
                return redirect('/decrementlist')->with('message','Decrement Successfully Deleted!');
        }else{
                return redirect('/')->with('message','You Are Not Allowed To Visit Portal Without login');
            } 
    }
}