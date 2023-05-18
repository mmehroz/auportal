@extends('layout.apptheme')
@section('hr-HRM')

<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Evalution Candidates List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Evalution Candidate</li>
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
										<table class="table table-striped custom-table datatable" id="mec">
											<thead>
												<tr style="text-align: center;">
													<th>Resume</th>
													<th>Evalution Form</th>
													<th>View</th>
													<th>Name</th>
													<th>Email</th>
													<th>Contact No</th>
													<th>Postion Appplied for</th>
												</tr>
											</thead>
											<tbody>
											@foreach($data['maevucandidate'] as $datas)
												<tr style="text-align: center;">
													<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>Download</a></td>
													<td><a href="{{url('/interview_assessment_form/')}}/{{$datas->jobapplicant_id}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>Evalution</a></td>
													<td class="text-right">
														<div class="dropdown dropdown-action">
															<a href="{{ URL::to('/modalemployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="fa fa-ellipsis-v"></i></a>
															<!---<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
															</div>--->
														</div>
													</td>
													<td>{{$datas->jobapplicant_name}}</td>
													<td>{{$datas->can_email}}</td>
													<td>{{$datas->jobapplicant_contact}}</td>
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
				<div id="view_comment" class="modal custom-modal fade" role="dialog">
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
										<div class="col-sm-12">
											<div class="form-group">
												<label class="col-form-label">Manager Comment</label>
												<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XYZ" readonly=""></textarea>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label" for="datetimepicker-default">Interview Date & Time</label>
												<input class="form-control" type="text" value="04/21/2020 4:39 AM" readonly="" />
											</div>
										</div>
										<div class="col-sm-6">
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