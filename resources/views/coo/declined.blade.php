@extends('layout.apptheme')
@section('hr-HRM')

<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Declined Candidates List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Declined Candidates List</li>
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

									<div class="table-responsive">
										<table class="table table-striped custom-table datatable" id="cood">
											<thead>
												<tr style="text-align: center; white-space: nowrap;">
													<th>Resume</th>
													<th>Evalution Form</th>
													<th>View</th>
													<th>Name</th>
													<th>Email</th>
													<th>Contact No</th>
													<th>Department</th>
													<th>Postion Appplied for</th>
												</tr>
											</thead>
											<tbody>
												@foreach($data as $datas)
													<tr style="text-align: center;">
														<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>Download</a></td>
														<td><a href="{{url('/coo_interview_evalution_form/')}}/{{$datas->jobapplicant_id}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>Evalution</a></td>
														<td class="text-right">
															<div class="dropdown dropdown-action">
																<a href="{{ URL::to('/modalemployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="material-icons">more</i></a>
																<!---<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
																</div>--->
															</div>
														</td>
														<td>{{$datas->jobapplicant_name}}</td>
														<td>{{$datas->log_email}}</td>
														<td>{{$datas->jobapplicant_contact}}</td>
														<td>{{$datas->DEPT_NAME}}</td>
														<td>{{$datas->jobapplicant_postionapppliedform}}</td>
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
				<!-- View Employee Modal -->
				<div id="view_employee" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">View Details</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label"> Name</label>
												<input class="form-control" value="M.Ali" type="text" readonly="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label"> Father Name</label>
												<input class="form-control" value="M.Abbas" type="text" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Email Address</label>
												<input class="form-control" value="@bizzworld.com" type="email" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Contact No</label>
												<input class="form-control" value="03001234567" type="number" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Department</label>
												<input class="form-control" value="Web Development" type="text" readonly="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Designation</label>
												<input class="form-control" value="Web Designer" type="text" readonly="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Qualification</label>
												<input class="form-control" value="Diploma" type="text" readonly="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Experience</label>
												<input class="form-control" value="2 years" type="text" readonly="">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label class="col-form-label">Employee Address</label>
												<textarea rows="4" cols="5" class="form-control" placeholder="A-125 North-karachi" readonly></textarea>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /View Employee Modal -->			
			</div>
			<!-- /Page Wrapper -->	
		
@endsection