@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">View Attendance</h3>
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
			<!-- 		<form method="get">
						<div class="row">
					        	<div class="col-md-5">
								<div class="form-group">
							        <label for="start">To</label>
							        <input type="date" class="form-control" id="start" name="trip"/>
						    	</div>
								</div>
							    <div class="col-md-5">
								<div class="form-group">
							        <label for="end">From</label>
							        <input type="date" class="form-control" id="end" name="trip"/>
							    </div>
								</div>
							<div class="col-md-2">
							<div class="form-group">
				            	<button type="button" style="margin-top: 30px; padding:9px 20px;" class="btn btn-success pull-right" onClick="jump(start,end)"  id="btnProceed">Proceed</button>
							</div>
							</div>
						</div>
					<form> -->
                    <div class="row">
                        <div class="col-lg-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table table-nowrap mb-0" id="vatt">
									<thead>
										<tr class="bg-teal-400" style="white-space : nowrap;">
											<th>Action</th>
											<th>BatchId</th>
											<th>Name</th>
											<!-- <th>Father Name</th> -->
											<th>Department</th>
											<th>Reporting To</th>
											<th>Timein Days</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($data as $val)
										<tr>
											<td >
												<span>&nbsp;<i onclick="viewempattendance({{'"'.$val->elsemployees_batchid.'"'}})" class="fa fa-eye" ></i></span>
											</td>
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
												$reportingtoname = $reportemail->elsemployees_name;
											}else{
												$reportingtoname = "-";
											}
											?>{{$reportingtoname}}</td>
											<td><?php 
												$present = DB::connection('mysql')->table('attendance')
												->where('attendance.elsemployees_empid','=',$val->elsemployees_batchid)
												->select('attendance.*')
												->count();
												?>{{$present}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                </div>
                <div id ='modal'></div>				
            </div>
			<!-- Page Wrapper -->
<script>

   function viewempattendance($id){
		window.location.replace('{{ URL::to("/viewempattendance")}}/'+$id);

	}

	function jump(start,end){
      if ($("#start").val() == "" & $("#end").val() == "")
	{
	alert("Please Select Date")
	  }
	   else if($("#start").val() == ""){
	    alert("Please Select Start Date")
	 }
	  else if($("#end").val() == ""){
	    alert("Please Select end Date")
	 }

	 else{
	    var to = $("#start").val();
	    var from = $("#end").val();

	     window.location.replace('{{ URL::to("/viewattendancedw") }}/'+ to + '/' + from);
	 }
	}

</script>
@endsection