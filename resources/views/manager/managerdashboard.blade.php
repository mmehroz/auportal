@extends('layout.apptheme')
@section('hr-HRM')
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<div class="welcome-box">
									<div class="welcome-img" onclick="getimage()">
										<script>
										function getimage(){
											$.get('{{ URL::to("/getimage")}}',function(data){
										    $('#modals').empty().append(data);
										    $('#getimage').modal('show');
										    });
										}
										</script>
										<img alt="" title="Click To Change Image" src="{{URL::to('public/img/')}}/{{$data['empdata']->elsemployees_image}}">
									</div>
									<div class="welcome-det">
										<h3 class="page-title">Welcome @if($data['empdata']->elsemployees_name == 'Salman Khairi' ) COO! @else Manager! @endif</h3>
										<ul class="breadcrumb">
											<li class="breadcrumb-item active">{{$data['empdata']->elsemployees_name}}</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
									<div class="dash-widget-info">
										<h4>{{$data['emptota']}}</h4>
										<span>No Of Reporting Employees</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
									<div class="dash-widget-info">
										<h4>{{$data['empdata']->dept_name}}</h4>
										<span>Name Of Departments</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
									<div class="dash-widget-info">
										<h4>{{$data['empdata']->DESG_NAME}}</h4>
										<span>Name Of Designations</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<div class="card">
										<div class="card-body">
											
										
                                <!-- <form> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="AU Telecom">
                                            </div>
                                        </div>
                                   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" disabled placeholder="email" value="{{$data['empdata']->elsemployees_email}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label>User Id</label>
                                                <input type="text" class="form-control" disabled placeholder="Username" value="{{$data['empdata']->elsemployees_batchid}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                       <div class="form-group">
                                                <label>Employee Name</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="{{$data['empdata']->elsemployees_name}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Role</label>
                                                <input type="text" class="form-control" disabled placeholder="HomeAddress" value ="@if($data['empdata']->elsemployees_name == 'Salman Khairi' ) COO @else {{$data['empdata']->rolename}} @endif" >
                                            </div>
                                        </div>
                                             <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" class="form-control" disabled placeholder="Home Address" value="Active"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                              <!--   </form> -->
                            </div>
                        </div>
										
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="card-body">
										<ul class="breadcrumb">
											<li class="breadcrumb-item active" style="color: #85152d">Up Comming Employee Birthday</li>
										</ul>
											<div class="table-responsive" style="height: auto !important;">
					<table class="table table-striped custom-table datatable" id="bd">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap; color: white">
							 	<th>Name</th>
								<th>Department</th>
								<th>Reporting To</th>
								<th>DOB</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data['bddata'] as $val)
							@if(isset($val->elsemployees_empid))
								<tr>
								 	<td>
										<h2 class="table-avatar">
											<a href="{{url('/employeeprofile')}}/{{$val->elsemployees_empid}}" target="_blank">
												<img  style="cursor: pointer;" alt="" title="Click To View Profile" class="avatar" src="{{URL::to('public/img/')}}/{{$val->elsemployees_image}}">
											</a>
											<!-- <a href="{{url('/employeeprofile')}}"> -->
											{{$val->elsemployees_name}}
											<!-- <span></span></a> -->
										</h2>
										</td>
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
									<td>{{$val->elsemployees_dofbirth}}</td>
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
				
										</div>

										<div class="card-body">
										<ul class="breadcrumb">
											<li class="breadcrumb-item active" style="color: #85152d">Up Comming Employee Anniversary</li>
										</ul>
											<div class="table-responsive" style="height: auto !important;">
					<table class="table table-striped custom-table datatable" id="bd">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap; color: white">
							 	<th>Name</th>
								<th>Department</th>
								<th>Reporting To</th>
								<th>DOJ</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data['jdata'] as $val)
							@if(isset($val->elsemployees_empid))
								<tr>
								 	<td>
										<h2 class="table-avatar">
											<a href="{{url('/employeeprofile')}}/{{$val->elsemployees_empid}}" target="_blank">
												<img  style="cursor: pointer;" alt="" title="Click To View Profile" class="avatar" src="{{URL::to('public/img/')}}/{{$val->elsemployees_image}}">
											</a>
											<!-- <a href="{{url('/employeeprofile')}}"> -->
											{{$val->elsemployees_name}}
											<!-- <span></span></a> -->
										</h2>
										</td>
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
									<td>{{$val->elsemployees_dofjoining}}</td>
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
									</div>
								</div>
							</div>
						</div>
					</div>				
				</div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->
			
        </div>
        <div id ='modals'></div>
		<!-- /Main Wrapper -->
		<script>
			<?php
			$gettodaysattendance = DB::connection('mysql')->table('attendance')
			->where('attendance.elsemployees_empid','=', session()->get('batchid')) 
			->where('attendance.attendance_date','=', date('Y-m-d')) 
			->select('attendance.*')
			->first();
			// dd($gettodaysattendance);
			if (isset($gettodaysattendance) == null) {
			?>
			// $( document ).ready(function() {
			// 	    swal({
			// 	  title: "Time In?",
			// 	  text: "Once Time In, you will not be able to change!",
			// 	  icon: "warning",
			// 	  buttons: true,
			// 	  dangerMode: false,
			// 	})
			// 	.then((willDelete) => {
			// 	  if (willDelete) {
			// 	    $.get('{{ URL::to("/usertimein")}}');
			// 	    swal("Time In Successfully", {
			// 	      icon: "success",
			// 	    });
			// 	  } else {
			// 	    swal("No action applied");
			// 	  }
			// 	});
			// });
		</script>
		<?php
		}
		?>
@endsection