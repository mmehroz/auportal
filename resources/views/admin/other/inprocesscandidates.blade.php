@extends('layout.apptheme')
@section('hr-HRM')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css?0925" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://www.jqueryscript.net/demo/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css">
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">In Process Candidates List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">In Process Candidates</li>
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
										<table class="table table-striped custom-table datatable" id="ic">
											<thead>
												<tr style="text-align: center;">
													<th>Resume</th>
													<th>First Name</th>
													<th>Email</th>
													<th>Contact No</th>
													<th>Experience</th>
													<th>Department</th>
													<th>Designation</th>
													<th>View</th>
												</tr>
											</thead>
											<tbody>
												<tr style="text-align: center;">
													<td><a href="#" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>
													<td>Test</td>
													<td>test@gmail.com</td>
													<td>03001234567</td>
													<td>1 Year</td>
													<td>Web Department</td>
													<td>Senior</td>
													<td class="text-right">
														<div class="dropdown dropdown-action">
															<a href="#" class="fa fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#"  data-toggle="modal" data-target="#view_employee"><i class="fa fa-clock-o m-r-5"></i> View Details</a>
															</div>
														</div>
													</td>
												</tr>
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
										<div class="col-sm-12">
											<div class="form-group">
												<label class="col-form-label">Manager Comment</label>
												<textarea rows="4" cols="5" class="form-control" name="managercomment" placeholder="XYZ" readonly=""></textarea>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label class="radio-inline">
													<input type="radio" name="optradio">Call For Interview
												</label>
												<label class="radio-inline">
													<input type="radio" name="optradio">Awaiting
												</label>
												<!-- <label for="called_for_interview" > Choose Action</label>
												<select class="form-control selectpicker" data-live-search="true" id="called_for_interview" name=""  required >
													<option value="" selected="" disabled="">Select</option>
													<option value="Call For Interview">Call For Interview</option>
													<option value="Awaiting">Awaiting</option>
						                	    </select> -->
											</div>
										</div>
										<div class="col-sm-6 select_dt_div">
											<div class="form-group">
												<label class="col-form-label" for="datetimepicker-default">Interview Date & Time</label>
												<input class="form-control" type="text" id="datetimepicker1" />
											</div>
										</div>
										<div class="col-sm-6">
										</div>
										<div class="submit-section">
										    <button class="btn btn-primary submit-btn">Save</button>
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
			  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="https://www.jqueryscript.net/demo/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">

	// $(document).ready(function(){
	//     $('#called_for_interview').on('change', function() { 
	//     	var selected = $(this).val();
	// 		var value = $(this).val();
	// 		var test = "Call For Interview";
		

	// 		 if(value != test){
			  
	// 		    $(".select_dt_div").hide();
	// 		  }else{
	// 		  	$(".select_dt_div").show();
	// 		  }



	// 	});
 //    });

	$('#datetimepicker1').datetimepicker();
</script>		
		
@endsection