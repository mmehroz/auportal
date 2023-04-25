<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>Probationary Employee Form</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/assets/img/favicon.png') !!}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap.min.css') !!}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/font-awesome.min.css') !!}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/line-awesome.min.css') !!}">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/dataTables.bootstrap4.min.css') !!}">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/select2.min.css') !!}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap-datetimepicker.min.css') !!}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/style.css') !!}">
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>	
		<!-- Main Wrapper -->
        <div class="main-wrapper">		
			<!-- Header -->
            <div class="header">			
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{url('/')}}"class="logo">
						<img src="{!! asset('public/assets/img/final-logo.png') !!}" width="120" height="60" alt="">
					</a>
                </div>
				<!-- /Logo -->				
				<!-- Header Title -->
                <div class="page-title-box float-left">
					<h3>Human Resource Management</h3>
                </div>
				<!-- /Header Title -->				
				<!-- Header Menu -->
				
				<!-- /Mobile Menu -->				
            </div>
			<!-- /Header -->			
            <div class="content container-fluid">
            	<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title" style="padding-top: 70px; font-size: 36px; font-weight: 900; text-align: center;">AU Telecom</h3>
							
							@if(session('message'))
								<div class="alert alert-success" ><h4>{!!session('message')!!}</h4></div> 
							@endif
							
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<div><h4><li>{{ $error }}</li></h4> </div>
									@endforeach
								</ul>
							</div>
							@endif
						</div>
					</div>
				</div>
				<form action="{{ URL::to('/submitprobationaeryform')}}" method="POST" class="form-horizontal"enctype="multipart/form-data">
				@csrf


		<div class="page-menu">
			<div class="row">
				<div class="col-md-12">
				
					<ul class="nav nav-tabs nav-tabs-bottom">

						
						@if(session()->get("role") == 4)
						<li class="nav-item col-md-3">
							<a class="nav-link active" data-toggle="tab" href="#employee"><center>Employee</center></a>
						</li>
						@elseif(session()->get('email') == "salman.khairi@bizzworld.com")
						<li class="nav-item col-md-3">
							<a class="nav-link active" data-toggle="tab" href="#COO"><center>Chief Operations Officer</center></a>
						</li>
						@elseif(session()->get("role") == 2)
						<li class="nav-item col-md-3">
							<a class="nav-link active" data-toggle="tab" href="#HRM"><center>Human Resource Department</center></a>
						</li>
						@else()
						<li class="nav-item col-md-3">
							<a class="nav-link active" data-toggle="tab" href="#manager"><center>Manager</center></a>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>





	<!-- Tab Content -->
	<div class="tab-content">

	<!-- COO Tab Start -->
	@if(session()->get('email') == "salman.khairi@bizzworld.com")

			<div class="tab-pane active" id="COO">
				<div class="payroll-table card">
					<div class="table-responsive">
					<div class="card-header">
						<h3 class="card-title mb-0 text-center">Chief Operations Officer</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<input type="hidden" name="can_log_id" value="" />
							<div class="col-md-3">
								<div class="form-group">
									<label class="col-form-label">Chief Operations Officer Name </label>
									<input type="text" class="form-control" name="cooname" value="" />
								</div>	
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="col-form-label">Chief Operations Officer Date </label>
									<input type="date" class="form-control" name="coodate" value="" />
								</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Chief Operations Officer Remarks </label>
									<input type="text" class="form-control" name="coocom" value="" />
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			@endif

<!-- COO Tab End -->
	@if( session()->get("role") == 3 && session()->get('email') != "salman.khairi@bizzworld.com")
		<div class="tab-pane active" id="manager">
				
				<div class="payroll-table card">
					<div class="table-responsive">

							<div class="card-header">
								<h3 class="card-title mb-0 text-center">PROBATIONARY EMPLOYEE FORM</h3>
							</div>


							<div class="card-body">
							<div class="row">
										<input type="hidden" name="probationary_batchid" value="{{$data->elsemployees_batchid}}" />
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Employee Batch ID</label>
											<input type="text" class="form-control" name="batchid" value="{{$data->elsemployees_batchid}}" readonly required/>
											
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Employee Name</label>
											<input type="text" class="form-control" name="empname" value="{{$data->elsemployees_name}}" readonly required/>
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Designation</label>
											<input type="text" hidden="" class="form-control" name="desgid" value="{{$data->elsemployees_desgid}}" readonly>
											<input type="text" class="form-control" name="" value="{{$data->DESG_NAME}}" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Department</label>
											<input type="text" hidden="" class="form-control" name="deptid" value="{{$data->elsemployees_departid}}" readonly>
											<input type="text" class="form-control" name="" value="{{$data->dept_name}}" readonly >
											
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Evaluator</label>
											<input type="text" class="form-control" name="evname" value="{{ session()->get('name')}}" readonly="" /> 
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Date</label>
											<input type="date" class="form-control" name="date" value="" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<label class="col-form-label">Months Review</label>
										<select class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="mreview"  required >
											<option value="" selected="" disabled="" >Select the Following</option>
											<option value="3" >Three Months</option>
											<option value="6" >Six Months</option>
											<option value="12" >Twelve Months</option>
										</select> 
											
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Months Review Comment</label>
											<input type="text" class="form-control" name="mreviewc" value="" required />
										</div>
									</div>
								</div>
							

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Quality and accuracy of work</label>
											<select class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="qaacow"  required >
													<option value="" selected="" disabled="" >Select the Following</option>
													<option value="1" >Improvement required</option>
													<option value="2" >Satisfactory</option>
													<option value="3" >Good</option>
													<option value="4" >Excellent</option>
										</select> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Efficiency / Productivity</label>
											<select class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="effpro"  required >
												<option value="" selected="" disabled="" >Select the Following</option>
													<option value="1" >Improvement required</option>
													<option value="2" >Satisfactory</option>
													<option value="3" >Good</option>
													<option value="4" >Excellent</option>
										</select> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										<label class="col-form-label">Attendance / Punctuality</label>
										<select class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="attpun"  required >
										<option value="" selected="" disabled="" >Select the Following</option>
													<option value="1" >Improvement required</option>
													<option value="2" >Satisfactory</option>
													<option value="3" >Good</option>
													<option value="4" >Excellent</option>
										</select> 
									</div>
								</div>
							</div>

								<div class="row">
								<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Time Management </label>
											<select class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="tima"  required >
													<option value="" selected="" disabled="" >Select the Following</option>
													<option value="1" >Improvement required</option>
													<option value="2" >Satisfactory</option>
													<option value="3" >Good</option>
													<option value="4" >Excellent</option>
										</select> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Work Relationship & Team Management skills</label>
											<select class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="wrtm"  required >
													<option value="" selected="" disabled="" >Select the Following</option>
													<option value="1" >Improvement required</option>
													<option value="2" >Satisfactory</option>
													<option value="3" >Good</option>
													<option value="4" >Excellent</option>
										</select> 
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Competency in the Role</label>
											<select class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="citr"  required >
													<option value="" selected="" disabled="" >Select the Following</option>
													<option value="1" >Improvement required</option>
													<option value="2" >Satisfactory</option>
													<option value="3" >Good</option>
													<option value="4" >Excellent</option>
										</select> 
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label class="col-form-label">Have the objectives identified for the probationary period been met?</label>
										<select id="p1" class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="htoppbm"  required >
													<option value="" selected="" disabled="" >Select the Following</option>
													<option value="Yes" >Yes</option>
													<option value="No" >No</option>
										</select> 
											
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Have the training / development needs identified for the probationary period been addressed? </label>
											<select id="p2" class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="httppba"  required >
													<option value="" selected="" disabled="" >Select the Following</option>
													<option value="Yes" >Yes</option>
													<option value="No" >No</option>
											</select> 
										</div>
									</div>
									
								</div>

								<div class="row">
									<div id="p1v" class="col-md-6">
										<div class="form-group">
										<label class="col-form-label">If NO, please provide details</label>
										<input type="text" class="form-control" name="htoppbm_ifnoc" value="" />
										
											
										</div>
									</div>

									<div id="p2v" class="col-md-6">
										<div class="form-group">
										<label class="col-form-label">If NO, please provide details</label>
										<input type="text" class="form-control" name="httppba_ifnoc" value="" />
										</div>
									</div>
									
								</div>

								<div class="row">
									<input type="hidden" name="can_log_id" value="" />
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">Summarize the employee’s performance and progress over the period.</label>
											<input type="text" class="form-control" name="sepp" value="" required />
										</div>	
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">Has the employee successfully completed the probationary period?</label>
											<select id="p3" class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="successcom"  required >
													<option value="" selected="" disabled="" >Select the Following</option>
													<option value="Yes" >Yes</option>
													<option value="No" >No</option>
											</select> 
										</div>	
									</div>
								</div>

								<div class="row">
									<div id="p3v" class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">If NO, please provide reasons below and summarize the action (s) taken to address any difficulties that have arisen during the probationary period.</label>
											<input type="text" class="form-control" name="successcom_ifno" value="" />
										</div>	
									</div>
								</div>

								

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">Do you recommend that the employee’s probationary period be extended?</label>
											<select id="p4" class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="recommendext"  required >
													<option value="" selected="" disabled="" >Select the Following</option>
													<option value="Yes" >Yes</option>
													<option value="No" >No</option>
											</select> 
										</div>	
									</div>
								</div>

								<div class="row">
									<div id="p4v" class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">If YES, please provide reasons and, where appropriate, specify any areas of improvement required and how these will be monitored.</label>
											<input type="text" class="form-control" name="recommendext_ifyes" value="" />
										</div>	
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Length of the extension (max 3 months):</label>
											<input type="date" class="form-control" name="extensiondate" value="" required/>
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">New Probation Period completion date:</label>
											<input type="date" class="form-control" name="npropcd" value="" required/>
										</div>
									</div>
									<//?php echo date('d-m-Y'); ?>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-form-label">Manager’s Date:</label>
											<input type="date" class="form-control" name="empmdate" value="" />
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
				@endif



	

		<!-- Employee Tab -->
				
				@if( session()->get("role") == 4)
					<div class="tab-pane active" id="employee">
				
						<div class="payroll-table card">
							<div class="table-responsive">

							<div class="card-header">
								<h3 class="card-title mb-0 text-center">Employee</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<input type="hidden" name="can_log_id" value="" />
									<div class="col-md-3">
										<div class="form-group">
											<label class="col-form-label">Employee Name </label>
											<input type="text" class="form-control" name="empnamec" value="" />
										</div>	
									</div>

									<div class="col-md-9">
										<div class="form-group">
											<label class="col-form-label">The employee may provide any comments about their experience of the probationary process here.
											 Employee’s Comments: </label>
											<input type="text" class="form-control" name="empnamecom" value="" />
										</div>	
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
		
					@endif

<!-- Employee Tab End -->



<!-- HR Tab Start -->
@if( session()->get("role") == 2)			
	<div class="tab-pane active" id="HRM">
		<div class="payroll-table card">
			<div class="table-responsive">
				<div class="card-header">
								<h3 class="card-title mb-0 text-center">Human Resource Department</h3>
							</div>
							<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Confirmation letter to employee</label>
										<select id="p5" class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="cltm">
												<option value="" selected="" disabled="" >Select the Following</option>
												<option value="Issued" >Issued</option>
												<option value="Pending" >Pending</option>
										</select> 
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Employee Status</label>
										<select id="p5" class="form-control selectpicker form-control" placeholder="" data-live-search ="true"  name="empstatus">
												<option value="" selected="" disabled="" >Select the Following</option>
												<option value="Confirmation" >Confirmation</option>
												<option value="Termination" >Termination</option>
												<option value="Transfer" >Transfer</option>
										</select> 
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Extension in Probationary Period</label>
										<input type="text" class="form-control" name="extproper" value="" />
									</div>
								</div>
							</div>
							<div class="row">
								<div id="p5v" class="col-md-12">
									<div class="form-group">
										<label class="col-form-label">Reason if Pending.</label>
										<input type="text" class="form-control" name="rifp" value="" />
									</div>	
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Payroll Advised (where applicable)</label>
										<input type="text" class="form-control" name="pawa" value="" />
										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Senior Manager HR Date  </label>
										<input type="date" class="form-control" name="hrdate" value="" />
										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-form-label">Date</label>
										<input type="date" class="form-control" name="hrpartdate" value="" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif

<!-- HR Tab End -->
									@if( session()->get("role") == 3 && session()->get('email') != "salman.khairi@bizzworld.com")
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="margin-left: 700px;">Submit</button>
									</div>
									@endif
									@if( session()->get('email') == "salman.khairi@bizzworld.com")
									<div class="text-center">
										<button type="button" class="btn btn-primary" style="margin-left: 700px;">COO Submit</button>
									</div>
									@endif
									@if( session()->get("role") == 4)
									<div class="text-center">
										<button type="button"   class="btn btn-primary" style="margin-left: 700px;" onclick="employeesubmit({{'"'.$data->probationary_form_id.'"'}})">Employee Submit</button>
									</div>
									@endif
									@if( session()->get("role") == 2)
									<div class="text-center">
										<button type="button" class="btn btn-primary" style="margin-left: 700px;">HR Submit</button>
									</div>
									@endif




								</form>
								
								</div>
								</div>
								
						
	            <br>
		<!-- /Main Wrapper -->
		<!-- jQuery -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/popper.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/select2.min.js"></script>
		
		<!-- Datatable JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.dataTables.min.js"></script>
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/moment.min.js"></script>
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Custom JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>

		<!-- for add rows -->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
				$('#p1').on('change.states', function() {
					$("#p1v").toggle($(this).val() == 'No');
				}).trigger('change.states');
				});
		$(document).ready(function() {
				$('#p2').on('change.states', function() {
					$("#p2v").toggle($(this).val() == 'No');
				}).trigger('change.states');
				});
		$(document).ready(function() {
				$('#p3').on('change.states', function() {
					$("#p3v").toggle($(this).val() == 'No');
				}).trigger('change.states');
				});
		$(document).ready(function() {
				$('#p4').on('change.states', function() {
					$("#p4v").toggle($(this).val() == 'Yes');
				}).trigger('change.states');
				});
		$(document).ready(function() {
				$('#p5').on('change.states', function() {
					$("#p5v").toggle($(this).val() == 'Pending');
				}).trigger('change.states');
				});

	// 	function employeesubmit(){
	// 		// var a = documentByid('sdsds');
	// 	window.location.replace('{{ URL::to("/employeesubmit")}}/');
	// }
			
	</script>
    </body>
</html>