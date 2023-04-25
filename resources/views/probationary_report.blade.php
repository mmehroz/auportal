@extends('layout.apptheme')
@section('hr-HRM')

<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Probationary Report</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Probationary Report</li>
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
													@if( session()->get("role") <= 3 || session()->get("email") == "salman.khairi@bizzworld.com" )
													<th>Action</th>
													@endif
													<th>Confirmation Letter</th>
													@if( session()->get("role") <= 2 || session()->get("email") == "salman.khairi@bizzworld.com" )
													<th>PDF</th>
													@endif
													<th>Batch ID</th>
													<th>Employee Name</th>
													<th>Department</th>
													<th>Desigantion</th>
													<th>Manager Name</th>
												</tr>
											</thead>
											<tbody>
											@foreach($data as $datas)
												<tr style="text-align: center;">
													@if( session()->get("role") <= 3 || session()->get("email") == "salman.khairi@bizzworld.com" )
													<td><a href="{{url('/probationaryreportview/')}}/{{$datas->elsemployees_batchid}}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i> Report</a></td>
													@endif
													<td class="text-right">
														<a href="{{url('/confirmationletterpdf/')}}/{{$datas->elsemployees_batchid}}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i> Confirmation Letter</a>
													</td>
													@if( session()->get("role") <= 2 || session()->get("email") == "salman.khairi@bizzworld.com" )
													<td class="text-right">
														<div class="dropdown dropdown-action">
															<a href="{{ URL::to('/probationaryemppdf')}}/{{$datas->elsemployees_batchid}}" target="_blank" ><i class="material-icons">more</i></a>
														</div>
													</td>
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
														?>{{$reportemail->elsemployees_name}}</td>
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