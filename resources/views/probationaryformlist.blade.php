@extends('layout.apptheme')
@section('hr-HRM')

<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Probationary Form List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Probationary Candidate</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<!-- <div class="card-header">
									<h4 class="card-title mb-0">Default Datatable</h4>
									<p class="card-text">
										This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
									</p>
								</div> -->
								<div class="card-body">
							
									@if(session('message'))
										<div class="alert alert-success" ><h4>{!!session('message')!!}</h4></div> 
									@endif

									<div class="table-responsive">
										<table class="table table-striped custom-table datatable" id="mec">
											<thead>
												<tr style="text-align: center;">
												@if( session()->get("role") >= 2 || session()->get("email") == "salman.khairi@bizzworld.com" )
													<th>Action</th>
												@endif
												@if( session()->get("role")== 1)
													<th>Action</th>
												@endif
													<th>Batch ID</th>
													<th>Employee Name</th>
													<th>Department</th>
													<th>Desigantion</th>
													<th>Manager Name</th>
												@if( session()->get("role") == 1)
													<th>Status</th>
												@endif
												</tr>
											</thead>
											<tbody>
											@foreach($data as $datas)
											<?php
											$pdate = $datas->elsemployees_dofjoining;
											$probationdate =  date('Y-m-d', strtotime($pdate. ' + 92 days'));
											?>
											<?php
											$probationenddate = date('Y-m-d', strtotime($probationdate. ' + 20 days'));
											?>
												<tr style="text-align: center;">
												@if( session()->get("role") >= 2 || session()->get("email") == "salman.khairi@bizzworld.com" )
													<td><a href="{{url('/probationemployee/')}}/{{$datas->elsemployees_batchid}}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-pencil"></i>Probation</a></td>
												@endif
												@if( session()->get("role") == 1 )
												<?php
												if($pdate == "" ){
													?>	
													<td>Empty</td>	
													<?php
												}elseif($probationdate <= date('Y-m-d') && $probationenddate >= date('Y-m-d')) {
												?>
													<td><a href="{{url('/probation_manageremail/')}}/{{$datas->elsemployees_batchid}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Send</a></td>
													<?php
													}elseif($probationdate >= date('Y-m-d') ){
													?>	
													<td>Pending</td>	
													<?php
													}else{
													?>	
													<td>Done</td>	
													<?php
													}
													?>
												@endif
													<td>{{$datas->elsemployees_batchid}}</td>
													<td>{{$datas->elsemployees_name}}</td>
													<td>{{$datas->dept_name}}</td>
													<td>{{$datas->DESG_NAME}}</td>
													<td><?php
														$reportemail = DB::connection('mysql')->table('elsemployees')
														->where('elsemployees.elsemployees_empid','=',$datas->elsemployees_reportingto)
														->select('elsemployees.*')
														->first();
														$reportingtoname;
														if (isset($reportemail->elsemployees_name)) {
															$reportingtoname = $reportemail->elsemployees_name;
														}else{
															$reportingtoname = "-";
														}
														?>{{$reportingtoname}}</td>
												@if( session()->get("role") == 1)
													<td>{{$datas->probiation_status}}</td>
												@endif
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
					
		
@endsection