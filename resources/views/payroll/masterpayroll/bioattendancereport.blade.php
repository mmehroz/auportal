@extends('layout.apptheme')
@section('hr-HRM')
<!-- Page Wrapper -->
<style>
	.dataTables_filter {
		display: none;
	}
</style>
            <div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Monthly Payroll Salary Report</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Attendance</li>
								</ul>
							</div>
						</div>
					</div>
					@if(session('message'))
		            <div>   <p class="alert alert-danger" >{{session('message')}}</p> </div>
		        	@endif
					<div class="text-right form-inline">

					</div>
					<div class="panel-body">
					<div class="row">
						<div class="col-md-9">
							
						</div>
						<div class="col-md-3">
							<input style="width: 300px; height: 30px" id="myInput" type="text" placeholder="Search..">
						</div>
					</div>
	                    <div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped custom-table datatable table-fixed" id="payrolldata">
										<thead>
											<tr class="bg-teal-400" style="white-space : nowrap;" role="row">
										    <th>BatchId</th>
											<th>Name</th>
											<th>Designation</th>
											<th>Acc No.</th>
											<th>Days</th>
											<th>Basic Salary</th>
											<!-- <th>Increment</th> -->
											<th>Referral Bonus</th>
											<th>Target Incentive</th>
											<th>Total Spiff</th>
											<th>Car Allowance</th>
											<th>Other Allowance</th>
											<th>Last / Advance</th>
											<th>Gross Salary</th>
											<th>Tax</th>
											<th>Loan Installment</th>
											<th>Spiff Delivered</th>
											<th>Advance Salary</th>
											<th>Car Rent Deduction</th>
											<th>Allowance Deduction</th>
											<th>Employee Share AU</th>
											<th>Company Share AU</th>
											<th>Total AU/Month</th>
											<th>Net AU</th>
											<th>Per Day Salary</th>
											<th>Absent Days</th>
											<th>Attendance deduction</th>
											<th>Total Deduction</th>
											<th>Gross Aft Deduct</th>
											<th>Correction Amount</th>
											<th>Net Salary</th>
											<th>Payslip</th>
											<th>Acknowledged</th>
											<th style="display: none">Salary Slip</th>
										</tr>
										</thead>
										<tbody>
											@foreach ($data['maindata'] as $val)
											<tr>
												<td>{{$val->elsemployees_batchid}}</td>
												<td>{{$val->elsemployees_name}}</td>
												<td>{{$val->DESG_NAME}}</td>
												<?php
												$getearndeductmonth = $data['sendyear'].'-'.$data['sendmonth'];
												$allowancecomparedate = $getearndeductmonth."-01";
												$allowanceimplementationdate = "2022-04-01";
												$setallowancecomparedate = strtotime($allowancecomparedate);
												$setallowanceimplementationdate = strtotime($allowanceimplementationdate);
												$getsalary = DB::connection('mysql')->table('payrollsalaries')
												->where('EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->select('Salary','attendance_allowance','punctuality_allowance','transport_allowance','fuel_allowance')
												->first();
												$employeesalary;
												if (isset($getsalary->Salary)) {
													$employeesalary  = $getsalary->Salary;
												}else{
													$employeesalary = "0";
												}
												$getraferal = DB::connection('mysql')->table('adjustments')
												->where('adjustments.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('adjustments.AdjMonth','=',$getearndeductmonth)
												->select('adjustments.adjustment')
												->first();
												$raferal;
												if (isset($getraferal->adjustment)) {
													$raferal  = $getraferal->adjustment;
												}else{
													$raferal = "0";
												}
												$getincentive = DB::connection('mysql')->table('adjustments')
												->where('adjustments.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('adjustments.AdjMonth','=',$getearndeductmonth)
												->select('adjustments.incentiveamount')
												->first();
												$incentive;
												if (isset($getincentive->incentiveamount)) {
													$incentive  = $getincentive->incentiveamount;
												}else{
													$incentive = "0";
												}
												$getspiff = DB::connection('mysql')->table('adjustments')
												->where('adjustments.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('adjustments.AdjMonth','=',$getearndeductmonth)
												->select('adjustments.spiffamount')
												->first();
												$spiff;
												if (isset($getspiff->spiffamount)) {
													$spiff  = $getspiff->spiffamount;
												}else{
													$spiff = "0";
												}
												$getother = DB::connection('mysql')->table('adjustments')
												->where('adjustments.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('adjustments.AdjMonth','=',$getearndeductmonth)
												->select('adjustments.otheramount')
												->first();
												$other;
												if (isset($getother->otheramount)) {
													$other  = $getother->otheramount+$getsalary->attendance_allowance+$getsalary->punctuality_allowance+$getsalary->transport_allowance+$getsalary->fuel_allowance;
												}else{
													$other = "0"+$getsalary->attendance_allowance+$getsalary->punctuality_allowance+$getsalary->transport_allowance+$getsalary->fuel_allowance;
												}
												$getlast = DB::connection('mysql')->table('adjustments')
												->where('adjustments.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('adjustments.AdjMonth','=',$getearndeductmonth)
												->select('adjustments.lastamount')
												->first();
												$last;
												if (isset($getlast->lastamount)) {
													$last  = $getlast->lastamount;
												}else{
													$last = "0";
												}
												if ($val->elsemployees_careligibility == "Yes") {
													if ($val->elsemployees_assigncaroramount == "Assign") {
														$getcarassign = DB::connection('mysql')->table('carassign')
														->where('carassign_to','=',$val->elsemployees_batchid)
														->where('carassign_month','<=',$getearndeductmonth)
														->where('status_id','=',2)
														->orderBY('carassign_id','desc')
														->select('car_id')
														->first();
														if (isset($getcarassign->car_id)) {
															$getcaramount = DB::connection('mysql')->table('car')
															->where('car_id','=',$getcarassign->car_id)
															->where('status_id','=',2)
															->select('car_rent')
															->sum('car_rent');
															$getadditioncaramount = DB::connection('mysql')->table('caraddition')
															->where('car_id','=',$getcarassign->car_id)
															->where('status_id','=',2)
															->select('caraddition_rent')
															->sum('caraddition_rent');
															$sumcarrentdeduct = $getcaramount+$getadditioncaramount;
															$sumcarrent = $getcaramount+$getadditioncaramount;
														}else{
															$sumcarrentdeduct = 0;
															$sumcarrent = 0;
														}
													}else{
														$sumcarrentdeduct = 0;
														$sumcarrent = $val->elsemployees_caramount;
													}
												}else{
													$sumcarrentdeduct = 0;
													$sumcarrent = 0;
												}
												// dd($sumcarrent);
												$getincrementprevyear = DB::connection('mysql')->table('increment')
										        ->where('increment.elsemployees_batchid','=',$val->elsemployees_batchid)
										        ->where('increment.increment_year','<',$data['sendyear'])
										        ->where('increment.status_id','=',2)
										        ->select('increment.increment_amount')
										        ->sum('increment.increment_amount');
										        if ($getincrementprevyear>0) {
										        $previousyear = new DateTime($data['sendyear'].'-01');
												$formatedpreviousyear = $previousyear->modify('-1 year')->format('Y-m-d');
												$previousmonth = new DateTime($data['sendmonth'].'01');
												$formatedpreviousmonth = $previousmonth->modify('-1 month')->format('Y-m-d');
										        $getprevincrement = DB::connection('mysql')->table('increment')
										        ->where('increment.elsemployees_batchid','=',$val->elsemployees_batchid)
										        ->where('increment.increment_year','<',$data['sendyear'])
										        ->where('increment.status_id','=',2)
										        ->select('increment.increment_amount')
										        ->sum('increment.increment_amount');
										        $getcurrentincrement = DB::connection('mysql')->table('increment')
										        ->where('increment.elsemployees_batchid','=',$val->elsemployees_batchid)
										        ->where('increment.increment_year','<=',$data['sendyear'])
										        ->where('increment.increment_month','<=',$data['sendmonth'])
										        ->where('increment.increment_year','!=',$formatedpreviousyear)
										        ->where('increment.increment_month','!=',$formatedpreviousmonth)
										        ->where('increment.status_id','=',2)
										        ->select('increment.increment_amount')
										        ->sum('increment.increment_amount');
										        $getincrement = $getprevincrement+$getcurrentincrement;
										        }else{
										        $getincrement = DB::connection('mysql')->table('increment')
										        ->where('increment.elsemployees_batchid','=',$val->elsemployees_batchid)
										        ->where('increment.increment_year','<=',$data['sendyear'])
										        ->where('increment.increment_month','<=',$data['sendmonth'])
										        ->where('increment.status_id','=',2)
										        ->select('increment.increment_amount')
										        ->sum('increment.increment_amount');
										        }
												$increment;
												if (isset($getincrement)) {
													$increment  = $getincrement;
												}else{
													$increment = "0";
												}
												// decrement start
												$getdecrementprevyear = DB::connection('mysql')->table('decrement')
										        ->where('decrement.elsemployees_batchid','=',$val->elsemployees_batchid)
										        ->where('decrement.decrement_year','<',$data['sendyear'])
										        ->where('decrement.status_id','=',2)
										        ->select('decrement.decrement_amount')
										        ->sum('decrement.decrement_amount');
										        if ($getdecrementprevyear>0) {
										        $previousyear = new DateTime($data['sendyear'].'-01');
												$formatedpreviousyear = $previousyear->modify('-1 year')->format('Y-m-d');
												$previousmonth = new DateTime($data['sendmonth'].'01');
												$formatedpreviousmonth = $previousmonth->modify('-1 month')->format('Y-m-d');
										        $getprevdecrement = DB::connection('mysql')->table('decrement')
										        ->where('decrement.elsemployees_batchid','=',$val->elsemployees_batchid)
										        ->where('decrement.decrement_year','<',$data['sendyear'])
										        ->where('decrement.status_id','=',2)
										        ->select('decrement.decrement_amount')
										        ->sum('decrement.decrement_amount');
										        $getcurrentdecrement = DB::connection('mysql')->table('decrement')
										        ->where('decrement.elsemployees_batchid','=',$val->elsemployees_batchid)
										        ->where('decrement.decrement_year','<=',$data['sendyear'])
										        ->where('decrement.decrement_month','<=',$data['sendmonth'])
										        ->where('decrement.decrement_year','!=',$formatedpreviousyear)
										        ->where('decrement.decrement_month','!=',$formatedpreviousmonth)
										        ->where('decrement.status_id','=',2)
										        ->select('decrement.decrement_amount')
										        ->sum('decrement.decrement_amount');
										        $getdecrement = $getprevdecrement+$getcurrentdecrement;
										        }else{
										        $getdecrement = DB::connection('mysql')->table('decrement')
										        ->where('decrement.elsemployees_batchid','=',$val->elsemployees_batchid)
										        ->where('decrement.decrement_year','<=',$data['sendyear'])
										        ->where('decrement.decrement_month','<=',$data['sendmonth'])
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
												$getfund = DB::connection('mysql')->table('deductions')
												->where('deductions.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('deductions.deductions_month','=',$getearndeductmonth)
												->select('deductions.deductions_bizzfund')
												->first();
												$fund;
												if (isset($getfund->deductions_bizzfund)) {
													$fund  = $getfund->deductions_bizzfund;
												}else{
													$fund = "0";
												}
												$getloan = DB::connection('mysql')->table('deductions')
												->where('deductions.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('deductions.deductions_month','=',$getearndeductmonth)
												->select('deductions.deductions_loan')
												->first();
												$loan;
												if (isset($getloan->deductions_loan)) {
													$loan  = $getloan->deductions_loan;
												}else{
													$loan = "0";
												}
												$getspiffdeliver = DB::connection('mysql')->table('deductions')
												->where('deductions.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('deductions.deductions_month','=',$getearndeductmonth)
												->select('deductions.deductions_apiff')
												->first();
												$spiffdeliver;
												if (isset($getspiffdeliver->deductions_apiff)) {
													$spiffdeliver  = $getspiffdeliver->deductions_apiff;
												}else{
													$spiffdeliver = "0";
												}
												$getadvance = DB::connection('mysql')->table('deductions')
												->where('deductions.EMP_BADGE_ID','=',$val->elsemployees_batchid)
												->where('deductions.deductions_month','=',$getearndeductmonth)
												->select('deductions.deductions_advance')
												->first();
												$advance;
												if (isset($getadvance->deductions_advance)) {
													$advance  = $getadvance->deductions_advance;
												}else{
													$advance = "0";
												}
												$reportemail = DB::connection('mysql')->table('elsemployees')
												->where('elsemployees.elsemployees_empid','=',$val->elsemployees_reportingto)
												->select('elsemployees.*')
												->first();
												$reportingtoname;
												if (isset($reportemail->elsemployees_name)) {
													$reportingtoname  = $reportemail->elsemployees_name;
												}else{
													$reportingtoname = "-";
												}
												$totalworkingdays;
												if ($getearndeductmonth > "2021-12") {
													$totalworkingdays = 22;
												}else{
												if ($val->elsemployees_departid == 1) {
													$totalworkingdays = 24;
												}else{
													$totalworkingdays = 26;
												}
												}
												$empsalary = $employeesalary+$increment-$decrement;
												$yearsalary = $empsalary*12;
												$gettax = DB::connection('mysql')->table('tax')
												->where('tax_startdate','<=',$getearndeductmonth)
												->where('tax_enddate','>=',$getearndeductmonth)
												->where('tax_startamount','<=',$yearsalary)
												->where('tax_endamount','>=',$yearsalary)
												->orderBY('tax_id','desc')
												->select('tax_taxamount','tax_percent','tax_startamount')
												->first();
												$tax;
												if (isset($gettax->tax_taxamount)) {
													$basictax  = $gettax->tax_taxamount;
													$getyearlydeductamount = $yearsalary-$gettax->tax_startamount;
													// dd($getyearlydeductamount);
													$yearlydeductamount = $getyearlydeductamount/100*$gettax->tax_percent;
													$sumyeartax = $yearlydeductamount+$basictax;
													// $tax = $sumyeartax/12;
													$tax = "0";
												}else{
													$tax = "0";
												}
												$grosssalary = $empsalary+$raferal+$incentive+$spiff+$other+$last+$sumcarrent;
												$daydate = 1;
												$presentdays = 0;
												$absentdays = 0;
												$halfdays = 0;
												$latedays = 0;
												$offdays = 0;
												if ($data['sendmonth'] == '02') {
													$looplength = 28;
												}elseif ($data['sendmonth'] == '1' || $data['sendmonth'] == '3' || $data['sendmonth'] == '5' || $data['sendmonth'] == '7' || $data['sendmonth'] == '8' || $data['sendmonth'] == '10' || $data['sendmonth'] == '12') {
													$looplength = 31;
												}
												else{
													$looplength = 30;
												}
												$dateindex=1;
												?>
												@for($i=1;$i<=$looplength;$i++)  
												<?php
												if($i < 10) {
													$attendancestatus = DB::connection('mysql')->table('bioattendance')
													->where('bioattendance.elsemployees_empid','=',$val->elsemployees_batchid)
													->where('bioattendance.attendance_month','=',$data['sendmonth'])
													->where('bioattendance.attendance_date','LIKE',$data['sendyear'].'-'.'%'.'-'."0$daydate")
													->select('bioattendance.*')
													->first();
													$date = $data['sendyear'].'-'.$data['sendmonth'].'-0'.$daydate;
													$payrolldate = $data['sendyear'].'-'.$data['sendmonth'].'-0'.$daydate;
													$nameOfDay = date('D', strtotime($date));
												}
												else {
													$attendancestatus = DB::connection('mysql')->table('bioattendance')
													->where('bioattendance.elsemployees_empid','=',$val->elsemployees_batchid)
													->where('bioattendance.attendance_month','=',$data['sendmonth'])
													->where('bioattendance.attendance_date','LIKE',$data['sendyear'].'-'.'%'.'-'."$daydate")
													->select('bioattendance.*')
													->first();
													$date = $data['sendyear'].'-'.$data['sendmonth'].'-'.$daydate;
													$payrolldate = $data['sendyear'].'-'.$data['sendmonth'].'-'.$daydate;
													$nameOfDay = date('D', strtotime($date));
													$yearandmonth = $data['sendyear'].'-'.$data['sendmonth'];
												}
												$getdepartid = DB::connection('mysql')->table('elsemployees')
												->where('elsemployees_batchid','=',$val->elsemployees_batchid)
												->select('elsemployees_departid')
												->first();
												$getonday = DB::connection('mysql')->table('onday')
												->where('DEPT_ID','=',$getdepartid->elsemployees_departid)
												->where('onday_date','=',$date)
												->where('onday_type','=',"OFF")
												->select('onday_date')
												->first();
												if (isset($getonday->onday_date)) {
													if ($val->elsemployees_dofpayroll < $payrolldate) {
														$presentdays++;
													}else{
														$absentdays++;
													}
												}else{
												$getholidaydate = DB::connection('mysql')->table('holidays')
												->where('HOLI_DATE','=',$date)
												->select('HOLI_DATE')
												->first();
												if($getholidaydate != null) {
													if ($val->elsemployees_dofpayroll < $payrolldate) {
													$presentdays++;
													}else{
													$absentdays++;
													}
												}else{
												if ($nameOfDay == "Sat" || $nameOfDay == "Sun") {
													$getdepartid = DB::connection('mysql')->table('elsemployees')
													->where('elsemployees_batchid','=',$val->elsemployees_batchid)
													->select('elsemployees_departid')
													->first();
													$getonday = DB::connection('mysql')->table('onday')
													->where('DEPT_ID','=',$getdepartid->elsemployees_departid)
													->where('onday_date','=',$date)
													->where('onday_type','=',"ON")
													->select('onday_date')
													->first();
													if (isset($getonday->onday_date)) {
														if (isset($attendancestatus->attendance_mark)) {
															$presentdays++;
														}else{
															if ($getdepartid->elsemployees_departid == 8) {
																$presentdays++;
															}else{
																$absentdays++;
															}
													}
													}else{
														if ($val->elsemployees_dofpayroll < $payrolldate) {
															$offdays++;
														}else{
															$absentdays++;
															}
												}
												}else{
												if($attendancestatus != NULL){
													$arrivaltime;
													$halfdaytime;
													$dt = $attendancestatus->attendance_date;
													$emptimeinfo = DB::connection('mysql')->table('elsemployeestiming')
									                ->where('elsemployeestiming.emptime_batchid','=',$val->elsemployees_batchid)
									                ->select('elsemployeestiming.*')
									                ->get();
									                $todaytime = $emptimeinfo->where('emptime_startdate', '<=', $dt)->sortByDesc('emptime_id')->first();
									                if($todaytime){
				                    					if($dt >= $todaytime->emptime_startdate){
							                                $arrivaltime = date("h:i:sa",strtotime($todaytime->emptime_start));
							                            }else{
							                                $arrivaltime = "09:05:59pm";
							                            }
							                            if ($val->elsemployees_departid == 15) {
							                            if ($dateindex <= 9) {
							                            $checkdate = "2022-01-0".$dateindex;	
							                            }else{
							                            $checkdate = "2022-01-".$dateindex;
							                            }
							                            if ($date == $checkdate) {
							                            $halfdaytime = date('h:i:sa',strtotime('+1 minutes',strtotime($arrivaltime)));
							                            }else{
							                            $halfdaytime = date('h:i:sa',strtotime('+1 hour +26 minutes',strtotime($arrivaltime)));
							                        	}
							                            }else{
							                            $halfdaytime = date('h:i:sa',strtotime('+1 hour +26 minutes',strtotime($arrivaltime)));
							                        	}
							                        }else{
							                                $arrivaltime = "09:05:59pm";
							                                $halfdaytime = date('h:i:sa',strtotime('+1 hour +26 minutes',strtotime($arrivaltime)));
							                            }
												if($attendancestatus->attendance_mark >= $arrivaltime && $attendancestatus->attendance_mark <= $halfdaytime){
													$latedays++;
												}elseif($attendancestatus->attendance_mark >= $halfdaytime){
													$halfdays++;
												}
												else{
													$presentdays++;
												}
												}else{
													if ($getdepartid->elsemployees_departid == 8) {
														$presentdays++;
													}else if($getdepartid->elsemployees_departid == 5){
														if($getearndeductmonth == "2022-11"){
															$presentdays++;
														}else{
															$absentdays++;
														}
														
													}else{
														$absentdays++;
													}
												}}}}
												$daydate++;
												$dateindex++;
												?>
												@endfor
												<?php
												$providentfund = DB::connection('mysql')->table('payrollsalaries')
													->where('payrollsalaries.EMP_BADGE_ID','=',$val->elsemployees_batchid)
													->select('payrollsalaries.fund')
													->first();
												if (isset($providentfund->fund)) {
													$pf = $providentfund->fund;
												}else{
													$pf = 0;
												}
												$loandetails = DB::connection('mysql')->table('loan')
													->where('loan.elsemployees_empid','=',$val->elsemployees_batchid)
													->where('loan.loan_instalments','!=',0)
													->where('loan.status_id','=',2)
													->select('loan.loan_amount','loan.loan_paid','loan.loan_instalments')
													->first();
												if (isset($loandetails->loan_amount)) {
													$obtainloanamount = $loandetails->loan_amount;
													$paidloanamount = $loandetails->loan_paid;
													$loaninstalments = $loandetails->loan_instalments;
												}else{
													$obtainloanamount = 0;
													$paidloanamount = 0;
													$loaninstalments = 0;
												}
												$allowanededuction;
												if ($getdepartid->elsemployees_departid == 15 || $getdepartid->elsemployees_departid == 6) {
													if ($setallowancecomparedate >= $setallowanceimplementationdate) {
														$punctuality;
														$attendance;
														$transport;
														$fuel;
														if ($absentdays > 0) {
															$punctuality = $getsalary->punctuality_allowance;
														}else{
															$punctuality = 0;
														}
														if ($latedays > 1 || $halfdays > 0) {
															$attendance = $getsalary->attendance_allowance;
														}else{
															$attendance = 0;
														}
														$allowanededuction = $punctuality + $attendance;
													}else{
														$allowanededuction = 0;
													}
												}else{
													$allowanededuction = 0;
												}
												$getcorrection = DB::connection('mysql')->table('attendancecorrection')
												->where('attendancecorrection.created_by','=',$val->elsemployees_batchid)
												->where('attendancecorrection.attendancecorrection_affdate','like',"$getearndeductmonth".'%')
												->where('attendancecorrection.attendancecorrection_status','=',"Approved")
												->where('attendancecorrection.status_id','!=',1)
												->select('attendancecorrection.attendancecorrection_amount')
												->sum('attendancecorrection.attendancecorrection_amount');
												$nocorrection;
												if (isset($getcorrection)) {
													$nocorrection  = $getcorrection;
												}else{
													$nocorrection = "0";
												}
												$remainingloanamount = $obtainloanamount-$paidloanamount;
												$totalpf = $pf*2;
												$calculatesalary = $empsalary/$totalworkingdays;
												$calculatededuction =$fund+$tax+$loan+$spiffdeliver+$advance;
												$grosssalarydeduction = $grosssalary/$totalworkingdays;	
												$calculatelate = $latedays*0.25;
												$furthercalculatelate = $calculatelate*$calculatesalary;
												$calculatehalf = $halfdays/2;
												$finaldayscount = $totalworkingdays;
												$totaldaysoffs = $calculatehalf+$absentdays+$calculatelate;
												if ($totaldaysoffs > $totalworkingdays) {
													$totaldaysoffs = $totalworkingdays;
												}
												if($val->elsemployees_type == "Sales"){
													if ($getearndeductmonth > '2022-04-01') {
														$correction = $nocorrection*$grosssalarydeduction;
													}else{
														$correction = $nocorrection;
													}
													$attendancededuct = $totaldaysoffs*$grosssalarydeduction;
												}else{
													if ($getearndeductmonth > '2022-04-01') {
														$correction = $nocorrection*$calculatesalary;
													}else{
														$correction = $nocorrection;
													}
													$attendancededuct = $totaldaysoffs*$calculatesalary;
												}
												$calculateearning = $raferal+$incentive+$spiff+$other+$last+$correction;
												$attendancededuction = $attendancededuct;
												$payrollamount = $finaldayscount*$calculatesalary;
												$finalpayrollamount = $payrollamount+$calculateearning-$calculatededuction-$attendancededuction-$allowanededuction;
												if($finalpayrollamount < 0){
													$finalpayrollamountinword = 0;
												}else{
													$finalpayrollamountinword = $payrollamount+$calculateearning-$calculatededuction-$attendancededuction-$allowanededuction;
												}
												// dd($finalpayrollamountinword);
												$sumallearning = $empsalary+$raferal+$incentive+$spiff+$other+$last;
												$sumalldeduct = $fund+$tax+$loan+$spiffdeliver+$advance+$attendancededuction+$allowanededuction+$sumcarrentdeduct;
												$AUaccumulated = $fund*2;
												$grossafterdeduct = $grosssalary-$sumalldeduct;
												$amount_after_decimal = round($finalpayrollamountinword - ($num = floor($finalpayrollamountinword)), 2) * 100;
											   $amt_hundred = null;
											   $count_length = strlen($num);
											   $x = 0;
											   $string = array();
											   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
											     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
											     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
											     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
											     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
											     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
											     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
											     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
											     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
											  $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
											  while( $x < $count_length ) {
											       $get_divider = ($x == 2) ? 10 : 100;
											       $finalpayrollamountinword = floor($num % $get_divider);
											       $num = floor($num / $get_divider);
											       $x += $get_divider == 10 ? 1 : 2;
											       if ($finalpayrollamountinword) {
											         $add_plural = (($counter = count($string)) && $finalpayrollamountinword > 9) ? 's' : null;
											         $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
											         $string [] = ($finalpayrollamountinword < 21) ? $change_words[$finalpayrollamountinword].' '. $here_digits[$counter]. $add_plural.' 
											         '.$amt_hundred:$change_words[floor($finalpayrollamountinword / 10) * 10].' '.$change_words[$finalpayrollamountinword % 10]. ' 
											         '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
											         }else $string[] = null;
											       }
											   $implode_to_Rupees = implode('', array_reverse($string));
											   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
											   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
												$finalinword = $implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '' . $get_paise;
												$salaryinwords = $finalinword;
												?>
												<td>{{$val->account_no}}</td>
												<td>{{$totalworkingdays}}</td>
												<td>PKR <?php echo(number_format($empsalary))?></td>
												<!-- <td>PKR <?php echo(number_format($increment))?></td> -->
												<td style="background-color: #e2efda;">PKR <?php echo(number_format($raferal))?></td>
												<td style="background-color: #e2efda;">PKR <?php echo(number_format($incentive))?></td>
												<td style="background-color: #e2efda;">PKR <?php echo(number_format($spiff))?></td>
												<td style="background-color: #e2efda;">PKR <?php echo(number_format($sumcarrent))?></td>
												<td style="background-color: #e2efda;">PKR <?php echo(number_format($other))?></td>
												<td style="background-color: #e2efda;">PKR <?php echo(number_format($last))?></td>
												<td style="background-color: #c6e0b4;">PKR <?php echo(number_format($grosssalary))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($tax))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($loan))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($spiffdeliver))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($advance))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($sumcarrentdeduct))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($allowanededuction))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($fund))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($fund))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($AUaccumulated))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($totalpf))?></td>
												<td style="background-color: #f8cbad">PKR <?php echo(number_format($calculatesalary))?></td>
												<td style="background-color: #f8cbad">{{$totaldaysoffs}}</td>
												<td class="deduction" style="background-color: #f8cbad">PKR <?php echo(number_format(round($attendancededuction)))?></td>
												<td style="background-color: #f4b084">PKR <?php echo(number_format(round($sumalldeduct)))?></td>
												<td style="background-color: #d9e1f2">PKR <?php echo(number_format(round($grossafterdeduct)))?></td>
												<td class="correction" style="background-color: #d9e1f2">PKR <?php echo(number_format(round($correction)))?></td>
												<td  style="background-color: #b4c6e7">PKR <?php echo(number_format(round($finalpayrollamount)))?></td>
												<td>
													<i style="cursor: pointer;" onclick="printDiv('printableArea-{{$val->elsemployees_batchid}}')" title="Payslip" class="fa fa-print"></i>
												</td>
												<td>
													<?php
													$getacknowledgedpay = DB::connection('mysql')->table('acknowledgedpay')
													->where('created_by','=',$val->elsemployees_batchid)
													->where('acknowledgedpay_month','=',$yearandmonth)
													->where('status_id','=',2)
													->select('acknowledgedpay_status')
													->first();
													if($getacknowledgedpay != null) {
													?>
													{{$getacknowledgedpay->acknowledgedpay_status}}
													<?php
													}else{
													?>
													<i style="cursor: pointer;" id="{{$val->elsemployees_batchid}}~{{$yearandmonth}}" onclick="acknowledgedpay(this.id)" title="Acknowledged" class="fa fa-check-square-o"></i>
													<?php
													}
													?>
												</td>
												<td style="display: none"><div id="printableArea-{{$val->elsemployees_batchid}}" style="display: none;">
													

<style>
    table {
        width: 1000px;

    }

    table,
    th,
    td {
        border: 1px solid gray;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1px;
        text-align: left;
        width: 100px;
        height: 35px;
    }

    #t01 tr:nth-child(even) {
        background-color: ;
    }

    #t01 tr:nth-child(odd) {
        background-color: ;
    }

    #t01 th {
        color: black;
    }
    .tfoot tr td{
background-color: #40c4f1 !important;
color: black;
    }
    section{
    	margin-top: 50px;
    	font-size: 15px
    }
</style>
<section>

        <div style="width: 1050px; height: 100%; border: 2px solid black; ; padding: 20px; ">
           <div style="text-align: center; margin-bottom: 20px">
                <img src="{!! asset('public/images/Bizz World Logo-03.png') !!}" width="350px" alt="">
            </div>
            <h2 style="text-align: center; font-size: 40px; margin-bottom: -70px; margin-right: 15px;">Pay Slip</h2>
            <div style="margin-top: 60px;">
                <table id="t01">
                    <tr>
                        <th>Employee Detail</th>
                        <th colspan="2"
                            style="text-align:center; border-top: 1px solid white; font-size: 40px; background-color: white; color: black;">
                        </th>
                        <th>Attendance Report</th>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Employee Name</td>
                        <td>{{$val->elsemployees_name}}</td>
                        <td style="font-weight: 700;">Absent</td>
                        <td>{{$absentdays}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Designation</td>
                        <td>{{$val->DESG_NAME}}</td>
                        <td style="font-weight: 700;">Half Days</td>
                        <td>{{$halfdays}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Month: {{$data['sendmonth']}}</td>
                        <td>Year: {{$data['sendyear']}} </td>
                        <td style="font-weight: 700;">Total Day Offs</td>
                        <td>{{$totaldaysoffs}}</td>
                    </tr>
                </table>
			</div>
            <div style="margin-top: 25px;">
                <table id="t01">
                    <tr>
                        <th style="background: white; color: black;">Earnings</th>
                        <th style="background: white; color: black;">-</th>
                        <th style="background: white; color: black;">Deductions</th>
                        <th style="background: white; color: black;">-</th>
                    </tr>
                    <tr>
                        <td style=" font-weight: 700;">Basic Salary</td>
                        <td>PKR {{$empsalary}}</td>
                        <td style="font-weight: 700;">Attendance Deduction</td>
                        <td>PKR <?php echo(round($attendancededuction))?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Referral Bonus </td>
                        <td>PKR {{$raferal}}</td>
                     	<td style="font-weight: 700;">Correction Amount</td>
                        <td>PKR <?php echo(round($correction))?> </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Target Incentive</td>
                        <td>PKR {{$incentive}}</td>
                        <td style="font-weight: 700;">Bizz Fund </td>
                        <td>PKR {{$fund}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Total Spiff</td>
                        <td>PKR {{$spiff}}</td>
                        <td style="font-weight: 700;">Tax</td>
                        <td>{{$tax}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Other Allownce</td>
                        <td>PKR {{$other}}</td>
                           <td style="font-weight: 700;">Loan Installment</td>
                        <td>{{$loan}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Last Salary / Advance</td>
                        <td>PKR {{$last}}</td>
                          <td style="font-weight: 700;">Spiff Delivered
                        </td>
                        <td>PKR {{$spiffdeliver}}</td>
                       
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Car Allowance</td>
                        <td>PKR {{$sumcarrent}}</td>
                          <td style="font-weight: 700;">Car Rent Deduction
                        </td>
                        <td>PKR {{$sumcarrentdeduct}}</td>
                       
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Gross Salary</td>
                        <td>PKR {{$sumallearning}} </td>
                         <td style="font-weight: 700;">Advance Salary </td>
                        <td>{{$advance}}</td>
                    </tr>
                        <tr>
                        <td style="font-weight: 700;">Gross Salary Aft Deduct</td>
                        <td>PKR <?php echo(round($grossafterdeduct))?> </td>
                     <td style="font-weight: 700;">Total Deduction</td>
                        <td>PKR <?php echo(round($sumalldeduct))?></td>
                    </tr>
                         <tr>
                        <td style="font-weight: 700;">NET Salary</td>
                        <td colspan="3" style="text-align: center; font-weight: 700">PKR <?php echo(round($finalpayrollamount))?>
                        </td>

                    </tr>
                    <tr>
                        <td style="font-weight: 700;">In Words</td>
                        <td colspan="3" style="text-align: center;">{{$salaryinwords}} Only
                        </td>

                    </tr>
                </table>

                <p style="font-weight: 700; font-size: 20px; text-align: center;"></p>
                <h3
                    style="text-align: center; border: 2px solid black; width: 300px; margin-left: 350px; margin-bottom: -2px;">
                    Other details
                </h3>
            </div>
            <div>
                <table id="t01">
                    <tr>
                        <th colspan="2" style="text-align: center;">Annual Leaves Details</th>

                        <th colspan="2" style="text-align: center;">Provident Fund Details (This Month)</th>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Allocated Leaves</td>
                        <td>0.00</td>
                        <td style="font-weight: 700;">Your Contribution - 5% </td>
                        <td>PKR {{$fund}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Availed Leaves </td>
                        <td>0.00</td>
                        <td style="font-weight: 700;">BWC Contribution - 5%</td>
                        <td>PKR {{$fund}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Remaining Leaves </td>
                        <td>0.00 </td>
                        <td style="font-weight: 700;">B.F. Accumulated </td>
                        <td>PKR {{$AUaccumulated}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; font-weight: 700;">Personal Loan Details</td>

                        <td colspan="2" style="text-align: center; font-weight: 700;">Total P.F. Accumulated</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">No. Of Installments </td>
                        <td>{{$loaninstalments}}</td>
                        <td style="font-weight: 700;">Your Contribution </td>
                        <td>PKR {{$pf}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Obtained Loan Amount </td>
                        <td>PKR {{$obtainloanamount}}</td>
                        <td style="font-weight: 700;">BWC Contribution</td>
                        <td>PKR {{$pf}}
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Total Amount Paid </td>
                        <td>PKR {{$paidloanamount}}</td>
                        <td style="font-weight: 700;">B.F. Accumulated</td>
                        <td>PKR {{$totalpf}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Remaining Amount </td>
                        <td>PKR {{$remainingloanamount}}</td>
                        <td style="font-weight: 700;"></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div>
                <p style="font-weight: 700;">
                    <span style="margin-right: 40px;"> Cheque No: ___________________</span>  <span
                        style="margin-left: 180px;">Name Of Bank:
                        UBL</span> <span style="font-weight: 700; margin-left: 300px;"><?php echo(date('Y-m-d'))?>
                    </span>
                </p>
                <!-- <p style="margin-top: 50px; font-weight: 700;">
                    Signature of Director _____________________ <span style="margin-left: 300px;"> Signature of Employee
                        ___________________</span>
                </p> -->
                <!-- <p style="margin-top: 50px; font-weight: 700;margin-left: 50px">
                    System generated document (Signature & Stamp is not Necessary), to Verify Contact @ (hr@bizzworldcommunications.com)
                </p> -->
            </div>
            <footer style="font-size: 12px; margin-top: 50px; font-weight: 700; color: black; height: 30px;">
                <p>Email: Info@bizzworldcommunications.com <span
                        style="margin-right: 50px; margin-left: 100px;">Address: Building # 2, St
                        # 5, Block 6,
                        Gulshan-e-iqbal,75300.</span> <span style="margin-left: 100px">Num: 0213 4974592</span></p>
            </footer>
        </div>
</section>

</div>	
</td>
											</tr>
											@endforeach
										</tbody>
								<tfoot class="tfoot">
		<tr >
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Totals</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

		</tr>
	</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div id ='modal'></div>				
            </div>
            <div id ='modals'></div>
			<!-- Page Wrapper -->
<script>
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
$(document).ready(function() {
	// DataTable initialisation
	  $("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#payrolldata tbody tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	$('#payrolldata').DataTable(
		{
			 fixedHeader: true,
			"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api();
				nb_cols = api.columns().nodes().length;
				var j = 5;
				while(j <= nb_cols){
					var pageTotal = api
                .column( j )
                .data()
                .reduce( function (a, b) {
                	 if ( typeof a === 'string' ) {
			            a = a.replace(/[^\d.-]/g, '') * 1;
			        }
			        if ( typeof b === 'string' ) {
			            b = b.replace(/[^\d.-]/g, '') * 1;
			        }
                    return Number(a) + Number(b);
                }, 0 );
                var formatter = new Intl.NumberFormat('en-US', {
				  style: 'currency',
				  currency: 'PKR',
				});
          // Update footer
          $( api.column( j ).footer() ).html(formatter.format(pageTotal));
					j++;
				} 
			}
		}
	);
});
function acknowledgedpay($id){
	swal({
	  title: "Are you sure?",
	  text: "Once Acknowledged, you will not be able to request for a change",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	  	$.get('{{ URL::to("/acknowledgedpay")}}/'+$id);
		window.location.reload();
	    swal("Aww! Acknowledged Successfully!", {
	      icon: "success",
	    });
	  } else {
	    swal("Acknowledgement Cancel");
	  }
	});
}
	$("table tr").each(function() {
		const correctAmount = parseInt($(this).find(".correction").text().split(" ")[1]?.replace(/,/g, ''))
		const deductionAmount  = parseInt($(this).find(".deduction").text().split(" ")[1]?.replace(/,/g, ''))
		if(correctAmount > deductionAmount){
			$(this).addClass("addcolor")
		}
	});
</script>
<style >
	.addcolor {
		color: red;
	}
	.table {
		position: relative;
		display:block;
		width: 100% !important;
		overflow-x: scroll;
		overflow-y: scroll;
		height: 400px;
	}
	thead {
		position:sticky;
		top:0;
	}
</style>
@endsection