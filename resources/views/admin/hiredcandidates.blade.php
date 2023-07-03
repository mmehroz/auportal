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
		@if(session('message'))
			<!-- <div class="account-title">{{session('message')}}</div> -->
			<div class="account-title">   <p class="alert alert-success" >{{session('message')}}</p>
			
			</div>
		@endif
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Hired Candidates List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Hired Candidates</li>
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
							<a class="nav-link active" data-toggle="tab" href="#hired_candidates">Hired Candidates</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#joined_candidates">Joined</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#notintrested_candidates">Not Intrested</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Tab -->
		
		<!-- Tab Content -->
		<div class="tab-content">
		
			<!--Hired Candidates Tab -->
			<div class="tab-pane show active" id="hired_candidates">
				<!--Hired Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="hc">
							<thead>
								<tr style="text-align: center;">
									<th>Action</th>
									<th>Pre Employeement</th>
									<th>Offer Letter</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['hired'] as $datas)
								<tr style="text-align: center;">
									<td class="text-center">
											<select class="form-control" id="mySelect" onchange="getedit(this.value)">
												<!-- <option value="">New</option>-->
												<option value="" @if(@$datas->jobapplicant_status == "nothired" ) {{ "selected" }} @endif >Not Hired</option>
												<option value="hired~{{$datas->jobapplicant_id}}" @if(@$datas->jobapplicant_status == "hired" ) {{ "selected" }} @endif >Hired</option>
												<option value="joined~{{$datas->jobapplicant_id}}" @if(@$datas->jobapplicant_status == "joined" ) {{ "selected" }} @endif >Joined</option>
												<option value="notinterested~{{$datas->jobapplicant_id}}" @if(@$datas->jobapplicant_status == "notinterested" ) {{ "selected" }} @endif >Not Intrested</option>
											</select>
									</td>
									<td><a href="{{ URL::to('/modalademployeeviewol')}}/{{$datas->jobapplicant_id}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
									<!-- <td><a href="{{ URL::to('/coo_interview_evalution_form')}}/{{$datas->jobapplicant_id}}" target="_blank"  class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Evaluation</a></td> -->
									<td><a href="{{ URL::to('/generatepdf/')}}/{{$datas->can_email}}" target="_blank"  class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
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
				<!-- Hired List Table -->
				
			</div>
			<!--Hired Candidates Tab -->

			<!--joined Candidates Tab -->
			<div class="tab-pane" id="joined_candidates">
				<!--Joined Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="jc">
							<thead>
								<tr style="text-align: center;">
									<th>Pre Employeement</th>
									<!-- <th>Evaluation</th> -->
									<th>Offer Letter</th>
									<th>Add Employee</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
							@foreach($data['join'] as $datas)
								<tr style="text-align: center;">
									<td><a href="{{ URL::to('/modalademployeeviewol')}}/{{$datas->jobapplicant_id}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
									<!-- <td><a href="{{ URL::to('/evalution_formpdf')}}/{{$datas->jobapplicant_id}}" target="_blank"  class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td> -->
									<td><a href="{{ URL::to('/generatepdf/')}}/{{$datas->can_email}}" target="_blank"  class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
									<td><a href="{{ URL::to('/addtoemployee/')}}/{{$datas->jobapplicant_id}}" target="_blank"  class="btn btn-sm btn-primary"><i class="fa fa-add"></i> Add</a></td>
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
				<!--Joined List Table -->
				
			</div>
			<!--Joined Candidates Tab -->

			<!--notIntrested Candidates Tab -->
			<div class="tab-pane" id="notintrested_candidates">
				<!--notIntrested Candidates List Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover custom-table datatable" id="ni">
							<thead>
								<tr style="text-align: center;">
									<th>Pre Employeement</th>
									<!-- <th>Evaluation</th> -->
									<th>Offer Letter</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No</th>
									<th>Postion Appplied for</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['notinterested'] as $datas)
								<tr style="text-align: center;">
									<td><a href="{{ URL::to('/modalademployeeviewol')}}/{{$datas->jobapplicant_id}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
									<!-- <td><a href="{{ URL::to('/evalution_formpdf')}}/{{$datas->jobapplicant_id}}" target="_blank"  class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td> -->
									<td><a href="{{ URL::to('/generatepdf/')}}/{{$datas->can_email}}" target="_blank"  class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
									<td>{{$datas->jobapplicant_name}}</td>
									<td>{{$datas->can_email}}</td>
									<td>{{$datas->jobapplicant_contact}}</td>
									<td>{{$datas->jobapplicant_postionapppliedform}}</td>
								</tr>
								@endforeach
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!--notintrested List Table -->
				
			</div>
			<!--notintrested Candidates Tab -->
			

			
		</div>
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	<!-- View Hired Modal -->
		<div id="view_hired" class="modal custom-modal fade" role="dialog">
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
										<label class="col-form-label">Manager Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XYZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label">COO Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XXYYZZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label">Add Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XXXYYYZZZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Salary <span class="text-danger">*</span></label>
										<input class="form-control" value="20000" type="number" readonly="">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Designation <span class="text-danger">*</span></label>
										<input class="form-control" value="Officer" type="text" readonly="">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /View Hired Modal -->

		<!-- View Joined Modal -->
		<div id="view_joined" class="modal custom-modal fade" role="dialog">
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
										<label class="col-form-label">Manager Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XYZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label">COO Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XXYYZZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label">Add Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XXXYYYZZZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Salary <span class="text-danger">*</span></label>
										<input class="form-control" value="20000" type="number" readonly="">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Designation <span class="text-danger">*</span></label>
										<input class="form-control" value="Officer" type="text" readonly="">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /View Joined Modal -->
		<!-- Delete Joined Modal -->
		<div class="modal custom-modal fade" id="delete_joined" role="dialog">
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
		<!-- /Delete joined Modal -->	
	
	<!-- View not Intrested Modal -->
		<div id="view_notintrested" class="modal custom-modal fade" role="dialog">
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
										<label class="col-form-label">Manager Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XYZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label">COO Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XXYYZZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-form-label">Add Comment <span class="text-danger">*</span></label>
										<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XXXYYYZZZ" readonly=""></textarea>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Salary <span class="text-danger">*</span></label>
										<input class="form-control" value="20000" type="number" readonly="">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Designation <span class="text-danger">*</span></label>
										<input class="form-control" value="Officer" type="text" readonly="">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /View notintrested Modal -->
		<!-- Delete notintrested Modal -->
		<div class="modal custom-modal fade" id="delete_notintrested" role="dialog">
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
		<!-- /Delete notintrested Modal -->	
	
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
		
		
		  $.get('{{ URL::to("/hirejoiin")}}/'+$value,function(data){
				
				console.log("true");
				
				location.reload();
				// $('#cl').DataTable().ajax.reload();
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