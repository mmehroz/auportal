@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
	.card {
	    padding: 1.25rem;
	    flex: 1 1 auto;
	}
</style>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Call For Interview Candidates List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Call For Interview</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Page Tab -->
		<div class="page-menu">
			<div class="row">
				<div class="col-sm-12">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#interview_candidates">Call For Interview</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#interview_attend">Attend Interview</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#interview_notattend">Not Attend Interview</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Tab -->
		
		<!-- Tab Content -->
		<div class="tab-content">
		
			<!--interview Candidates Tab -->
			<div class="tab-pane show active" id="interview_candidates">
				<!--interview Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="cfi">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Resume</th>
									<th>View</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Department</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['callforin'] as $datas)
									<tr style="text-align: center;">
										<td class="text-center">
											<select id="mySelect" onchange="getedit(this.value)">
												<!-- <option value="">New</option> -->
												<option value="callforinterview~{{$datas->jobapplicant_id}}">Call For Interview</option>
												<option value="attend~{{$datas->jobapplicant_id}}">Attend</option>
												<option value="notattend~{{$datas->jobapplicant_id}}">Not Attend</option>
											</select>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modalademployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="fa fa-ellipsis-v"></i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
											
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->jobapplicant_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->dept_name}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- interview List Table -->
				
			</div>
			<!--interview Candidates Tab -->

			<!--attene interview Candidates Tab -->
			<div class="tab-pane" id="interview_attend">
				<!--attene interview Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="cfia">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
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
							@foreach($data['attend'] as $datas)
									<tr style="text-align: center;">
										<td class="text-center">
											<select id="mySelect" onchange="getedit(this.value)">
												<!-- <option value="">New</option> -->
												<option value="callforinterview~{{$datas->jobapplicant_id}}">Call For Interview</option>
												<option value="notattend~{{$datas->jobapplicant_id}}">Not Attend</option>
											</select>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>Download</a></td>
										<td><a href="{{url('/interview_evalution_form/')}}/{{$datas->jobapplicant_id}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>Evalution</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modalademployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="fa fa-ellipsis-v"></i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
												</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->jobapplicant_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->dept_name}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!--attene interview List Table -->
				
			</div>
			<!--attene interview Candidates Tab -->

			<!--notattene interview Candidates Tab -->
			<div class="tab-pane" id="interview_notattend">
				<!--notattene interview Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="cfina">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Resume</th>
									<th>View</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Department</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['notattend'] as $datas)
									<tr style="text-align: center;">
									<td class="text-center">
											<select id="mySelect" onchange="getedit(this.value)">
												<!-- <option value="">New</option> -->
												<option value="callforinterview~{{$datas->jobapplicant_id}}">Call For Interview</option>
												<option value="attend~{{$datas->jobapplicant_id}}">Attend</option>
												<option value="notattend~{{$datas->jobapplicant_id}}">Not Attend</option>
											</select>
										</td>
										<td><a href="{{ URL::to('public/file/')}}/{{$datas->jobapplicant_cv}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>Download</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="{{ URL::to('/modalademployeeviewol/')}}/{{$datas->jobapplicant_id}}" target="_blank" ><i class="fa fa-ellipsis-v"></i></a>
												<!---<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="URL::to('/modalemployeeview/')}}/{{$datas->jobapplicant_id}}" data-toggle="modal" data-target="#view_screening"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
												</div>--->
											</div>
										</td>
										<td>{{$datas->jobapplicant_name}}</td>
										<td>{{$datas->jobapplicant_email}}</td>
										<td>{{$datas->jobapplicant_contact}}</td>
										<td>{{$datas->dept_name}}</td>
										<td>{{$datas->jobapplicant_postionapppliedform}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!--notattene interview List Table -->
				
			</div>
			<!--notattene interview Candidates Tab -->
			

			
		</div>
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	<!-- View Interview Modal -->
		<div id="view_interview" class="modal custom-modal fade" role="dialog">
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
		<!-- /View Interview Modal -->

		<!-- View attend Interview Modal -->
		<div id="view_attendinterview" class="modal custom-modal fade" role="dialog">
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
		<!-- /View attend Interview Modal -->	
	
	<!-- View notattend Interview Modal -->
		<div id="view_notattendinterview" class="modal custom-modal fade" role="dialog">
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
		<!-- /View notattend Interview Modal -->
		<!-- Delete notattend Interview Modal -->
		<div class="modal custom-modal fade" id="delete_notattendinterview" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-header">
							<h3>Delete Record</h3>
							<p>Are you sure want to delete?</p>
						</div>
						<div class="modal-btn delete-action">
							<div class="row">
								<div class="col-6">
									<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
								</div>
								<div class="col-6">
									<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete notattend Interview Modal -->	
	
</div>
<!-- /Page Wrapper -->	

<script>

function getedit($value){
		
		// console.log($value);
		swal({
                title: "Are you sure ?",
                text: "Once Approved, you will not be able to change the status of this request!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
					
			  $.get('{{ URL::to("/adattendaction")}}/'+$value,function(data){
						
					console.log("true");

				
				location.reload();
				 // $('#modals').empty();
				 // $('#modals').append(data)
			   // $('#Editemployee').modal('show');
			  });
			  
			  swal("Your request successfully approved!", {
                    icon: "success",
                  });


                } else {
                  swal("Your request is unchanged!");
                }
              });
}

</script>
			
@endsection