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
								<h3 class="page-title">Upload Sheet</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Upload Sheet</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<!-- Cards -->
					<section class="comp-section comp-cards" id="comp_cards">
							<div class="col-12">
								<div class="card flex-fill">
									<div class="card-header">
										<h3 class="panel-title text-center" style="color: #ffffff">File Import</h3>
									</div>
									<div class="card-body">
										<center>
										<button type="button" class=" btn btn-primary btn-md" data-toggle="modal" data-target="#btnAddTask" style="margin: 5%;">Click Here to Upload Sheet</button>
										</center>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="card flex-fill">
									<div class="card-header"  style="color: #ffffff">
										Instructions to Upload Attendence Sheet
									</div>
									<div class="card-body">
										<h5 class="card-title">Special title treatment</h5>
										<p class="card-text"  style="color: #000000">
											•	It must be in CSV format.<br>
											•	No extra row of headings only 1 row of heading is allowed.<br>
											•	Only 7 columns file is valid.<br>
											•	Date format must be like dd-mm-yyyy Example(01-12-2017).</p>
									</div>
								</div>
							</div>
					</section>
					<!-- /Cards -->					
                </div>
				<!-- /Page Content -->
				<!-- Add Designation Modal -->
				<div id="btnAddTask" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Record</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label>File input<span class="text-danger"></span></label>
										<input class="form-control" type="file" accept=".csv">
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Designation Modal -->
				
            </div>
			<!-- /Page Wrapper -->

@endsection