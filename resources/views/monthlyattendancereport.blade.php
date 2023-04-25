@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Monthly Attendance Report</h3>
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
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped custom-table datatable table-fixed" id="attrep">
										<thead >
											<tr class="bg-teal-400" style="white-space: nowrap;" role="row">
										    <th>BatchId</th>
											<th>Name</th>
											<th>Designation</th>
											<th>01</th>
											<th>02</th>
											<th>03</th>
											<th>04</th>
											<th>05</th>
											<th>06</th>
											<th>07</th>
											<th>08</th>
											<th>09</th>
											<th>10</th>
											<th>11</th>
											<th>12</th>
											<th>13</th>
											<th>14</th>
											<th>15</th>
											<th>16</th>
											<th>17</th>
											<th>18</th>
											<th>19</th>
											<th>20</th>
											<th>21</th>
											<th>22</th>
											<th>23</th>
											<th>24</th>
											<th>25</th>
											<th>26</th>
											<th>27</th>
											<th>28</th>
											<?php
											if ($data['sendmonth'] != '02') {
											?>
											<th>29</th>
											<th>30</th>
											<?php
											if ($data['sendmonth'] == '1' || $data['sendmonth'] == '3' || $data['sendmonth'] == '5' || $data['sendmonth'] == '7' || $data['sendmonth'] == '8' || $data['sendmonth'] == '10' || $data['sendmonth'] == '12') {
											?>
											<th>31</th>
											<?php
											}
											}
											?>
										</tr>
										</thead>
										<tbody style="">
											@foreach ($data['maindata'] as $val)
											<tr>
												<td>{{$val->elsemployees_batchid}}</td>
												<td>{{$val->elsemployees_name}}</td>
												<td>{{$val->DESG_NAME}}</td>
												<?php
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
												}
												// if (isset($attendancestatus)) {
												// $date = '2021-'.$$data['sendmonth'].'-'.$daydate;
												// dd($date);
												// $nameOfDay = date('D', strtotime($date));
												// echo $nameOfDay;
												// }
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
												?>
													<td style="color: ; background-color: #ffb07c; ">Holiday</td>	
												<?php
													$presentdays++;
												}else{
													?>	
													<td style="color: white; background-color: #a19a9a;">-</td>
												<?php		
												$absentdays++;
												}
												}else{
												$getholidaydate = DB::connection('mysql')->table('holidays')
												->where('HOLI_DATE','=',$date)
												->select('HOLI_DATE')
												->first();
												if($getholidaydate != null) {
													if ($val->elsemployees_dofpayroll < $payrolldate) {
												?>
													<td style="color: ; background-color: #ffb07c; ">Holiday</td>	
												<?php
													$presentdays++;
												}else{
													?>	
													<td style="color: white; background-color: #a19a9a;">-</td>
												<?php		
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
												?>
													<td style="color:; background-color: #b8e0b8;">{{$attendancestatus->attendance_mark}}</td>	
												<?php
															$presentdays++;
														}else{
															$absentdays++;
												?>
													<td style="color: ; background-color: #f8bfbf">Absent</td>	
												<?php
													}
													}else{
														if ($val->elsemployees_dofpayroll < $payrolldate) {
												?>	
													<td style="color:; background-color: #EBECF0;">OFF</td>
												<?php		
												$offdays++;
												}else{
													?>	
													<td style="color: white; background-color: #a19a9a;">-</td>
												<?php		
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
							                            // dd($checkintime);
								                    }else{
							                                $arrivaltime = "09:05:59pm";
							                                $halfdaytime = date('h:i:sa',strtotime('+1 hour +26 minutes',strtotime($arrivaltime)));
							                            }
													if($attendancestatus->attendance_mark >= $arrivaltime && $attendancestatus->attendance_mark <= $halfdaytime){
													$latedays++;
												?>
													<td style="background-color: #fde3b0;">Late</td>
												<?php
												}elseif($attendancestatus->attendance_mark >= $halfdaytime){
													$halfdays++;
												?>
													<td style="background-color: #b7cefa;">Half Day</td>
												<?php
												}
												else{
													$presentdays++;
												?>
													<td style="background-color: #b8e0b8;">Present</td>
												<?php
												}
												}else{
													$absentdays++;
													?>
												<td style="background-color: #f8bfbf;">Absent</td>
												<?php
												}}}}
												$daydate++;
												$dateindex++;
												?>

												@endfor
											</tr>
											@endforeach
										</tbody>
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
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
<script>
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<style >
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
