@extends('layout.apptheme')
@section('hr-HRM')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Payroll Items</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Payroll Items</li>
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
							<a class="nav-link active" data-toggle="tab" href="#tab_adjustment">Adjustment</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tab_deductions">Deductions</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Tab -->
		
		<!-- Tab Content -->
		<div class="tab-content">
		
			<!-- Adjustment Tab -->
			<div class="tab-pane show active" id="tab_adjustment">
			
				<!-- Add Adjustment Button -->
				<div class="text-right mb-4 clearfix">
					<button class="btn btn-primary add-btn" type="button" data-toggle="modal" data-target="#add_adjustment"><i class="fa fa-plus"></i> Add Adjustment</button>
				</div>
				<!-- /Add Adjustment Button -->

				<!-- Payroll Adjustment Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover table-radius">
							<thead>
								<tr>
									<th>Batch id</th>
									<th>Name</th>
									<th>Adjustment Amount</th>
									<th>Adjustment Date</th>
									<th>Comment</th>
									<th class="text-right">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>11001</td>
									<td>M. Yaseen</td>
									<td>300</td>
									<td>2019-11-28</td>
									<td>Test</td>
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_adjustment"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_adjustment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>11001</td>
									<td>M. Yaseen</td>
									<td>300</td>
									<td>2019-11-28</td>
									<td>Test</td>
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_adjustment"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_adjustment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>11001</td>
									<td>M. Yaseen</td>
									<td>300</td>
									<td>2019-11-28</td>
									<td>Test</td>
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_adjustment"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_adjustment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Payroll Adjustment Table -->
				
			</div>
			<!-- Adjustment Tab -->
			
			<!-- Deductions Tab -->
			<div class="tab-pane" id="tab_deductions">
			
				<!-- Add Deductions Button -->
				<div class="text-right mb-4 clearfix">
					<button class="btn btn-primary add-btn" type="button" data-toggle="modal" data-target="#add_deduction"><i class="fa fa-plus"></i> Add Deduction</button>
				</div>
				<!-- /Add Deductions Button -->

				<!-- Payroll Deduction Table -->
				<div class="payroll-table card">
					<div class="table-responsive">
						<table class="table table-hover table-radius">
							<thead>
								<tr>
									<th>Batch id</th>
									<th>Name</th>
									<th>Deduction Amount</th>
									<th>Deduction Date</th>
									<th>Comment</th>
									<th class="text-right">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>11001</td>
									<td>M. Yaseen</td>
									<td>100</td>
									<td>2019-11-28</td>
									<td>Test</td>
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_deduction"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_deduction"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>11001</td>
									<td>M. Yaseen</td>
									<td>100</td>
									<td>2019-11-28</td>
									<td>Test</td>
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_deduction"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_deduction"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>11001</td>
									<td>M. Yaseen</td>
									<td>100</td>
									<td>2019-11-28</td>
									<td>Test</td>
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_deduction"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_deduction"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Payroll Deduction Table -->
				
			</div>
			<!-- /Deductions Tab -->
			
		</div>
		<!-- Tab Content -->
		
    </div>
	<!-- /Page Content -->
	
	<!-- Add Adjustment Modal -->
	<div id="add_adjustment" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Adjustment</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Batch id<span class="text-danger"></span></label>
							<input class="form-control" type="number">
						</div>
						<div class="form-group">
							<label>Name <span class="text-danger"></span></label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group">
							<label>Adjustment Amount <span class="text-danger"></span></label>
							<input class="form-control" type="text" >
						</div>
						<div class="form-group">
							<label>Adjustment Date <span class="text-danger"></span></label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group">
							<label>Comment <span class="text-danger"></span></label>
							<div class="col-lg-14">
								<textarea rows="3" cols="3" class="form-control" id=""  name="" style="height: 125px" ></textarea>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Adjustment Modal -->
	
	<!-- Edit Adjustment Modal -->
	<div id="edit_adjustment" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Adjustment</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Batch id<span class="text-danger"></span></label>
							<input class="form-control" type="number" value="11001">
						</div>
						<div class="form-group">
							<label>Name <span class="text-danger"></span></label>
							<input class="form-control" type="text" value="M. Yaseen">
						</div>
						<div class="form-group">
							<label>Adjustment Amount <span class="text-danger"></span></label>
							<input class="form-control" type="text" value="300">
						</div>
						<div class="form-group">
							<label>Adjustment Date <span class="text-danger"></span></label>
							<input class="form-control" type="text" value="2019-11-28">
						</div>
						<div class="form-group">
							<label>Comment <span class="text-danger"></span></label>
							<div class="col-lg-14">
								<textarea rows="3" cols="3" class="form-control" id=""  name="" style="height: 125px" >Test</textarea>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Adjustment Modal -->
	
	<!-- Delete Adjustment Modal -->
	<div class="modal custom-modal fade" id="delete_adjustment" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Adjustment</h3>
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
	<!-- /Delete Addition Modal -->
	
	<!-- Add Deduction Modal -->
	<div id="add_deduction" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Deduction</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Batch id<span class="text-danger"></span></label>
							<input class="form-control" type="number">
						</div>
						<div class="form-group">
							<label>Name <span class="text-danger"></span></label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group">
							<label>Deduction Amount <span class="text-danger"></span></label>
							<input class="form-control" type="text" >
						</div>
						<div class="form-group">
							<label>Deduction Date <span class="text-danger"></span></label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group">
							<label>Comment <span class="text-danger"></span></label>
							<div class="col-lg-14">
								<textarea rows="3" cols="3" class="form-control" id=""  name="" style="height: 125px" ></textarea>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Deduction Modal -->
	
	<!-- Edit Deduction Modal -->
	<div id="edit_deduction" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Deduction</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Batch id<span class="text-danger"></span></label>
							<input class="form-control" type="number" value="11001">
						</div>
						<div class="form-group">
							<label>Name <span class="text-danger"></span></label>
							<input class="form-control" type="text" value="M. Yaseen">
						</div>
						<div class="form-group">
							<label>Deduction Amount <span class="text-danger"></span></label>
							<input class="form-control" type="text" value="100">
						</div>
						<div class="form-group">
							<label>Deduction Date <span class="text-danger"></span></label>
							<input class="form-control" type="text" value="2019-11-28">
						</div>
						<div class="form-group">
							<label>Comment <span class="text-danger"></span></label>
							<div class="col-lg-14">
								<textarea rows="3" cols="3" class="form-control" id=""  name="" style="height: 125px" >Test</textarea>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Deduction Modal -->
	
	<!-- Delete Deduction Modal -->
	<div class="modal custom-modal fade" id="delete_deduction" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Deduction</h3>
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
	<!-- /Delete Deduction Modal -->
	
</div>
<!-- /Page Wrapper -->			
			
@endsection