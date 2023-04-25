@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Attendance Report</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Time In</li>
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
									<table class="table table-striped custom-table datatable" id="attrep">
										<thead>
											<tr class="bg-teal-400" style="white-space : nowrap;">
										    <th>BatchId</th>
											<th>Name</th>
											<!-- <th>Father Name</th> -->
											<th>Department</th>
											<th>Reporting To</th>
											<th>Month</th>
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
											<th>29</th>
											<th>30</th>
											<th>31</th>
										</tr>
										</thead>
										<tbody>
											@foreach ($data['maindata'] as $val)
											<tr>
												<td>{{$val->elsemployees_batchid}}</td>
												<td>{{$val->elsemployees_name}}</td>
												<!-- <td>{{$val->elsemployees_fname}}</td> -->
												<td>{{$val->dept_name}}</td>
												<td>
												<?php
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
												?>{{$reportingtoname}}</td>
										
												<td>{{$data['sendmonth']}}</td>
											
													<?php


												$daydate = 1;
												?>

												@for($i=1;$i<=31;$i++)  
												<?php
											if($i < 10) {
												$attendancestatus = DB::connection('mysql')->table('attendance')
												->where('attendance.elsemployees_empid','=',$val->elsemployees_batchid)
												->where('attendance.attendance_month','=',$data['sendmonth'])
												->where('attendance.attendance_date','LIKE',$data['sendyear'].'-'.'%'.'-'."0$daydate")
												->select('attendance.*')
												->first();
											}
											else {
												$attendancestatus = DB::connection('mysql')->table('attendance')
												->where('attendance.elsemployees_empid','=',$val->elsemployees_batchid)
												->where('attendance.attendance_month','=',$data['sendmonth'])
												->where('attendance.attendance_date','LIKE',$data['sendyear'].'-'.'%'.'-'."$daydate")
												->select('attendance.*')
												->first();
											}
												
												if($attendancestatus != NULL){
												?>
													<td>{{$attendancestatus->attendance_mark}}</td>
												<?php
												}else{
													?>
												<td>-</td>
												<?php
											}
											$daydate++;
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
			<!-- Page Wrapper -->
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
@endsection