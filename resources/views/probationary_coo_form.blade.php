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
            </div>
			<!-- /Header -->			
            <div class="content container-fluid">
            	<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title" style="padding-top: 70px; font-size: 36px; font-weight: 900; text-align: center;">LEVEL 3 BOS PVT LTD</h3>
							
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
				<form action="{{ URL::to('/submitprobationaeryCOOform')}}" method="POST" class="form-horizontal"enctype="multipart/form-data">
					@csrf
					<div class="page-menu">
						<div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item col-md-3">
										<a class="nav-link navtest active" data-toggle="tab" href="#COO"><center>Chief Operations Officer</center></a>
									</li>
									<li class="nav-item navtest1 col-md-3">
										<a class="nav-link" data-toggle="tab" href="#manager"><center>Manager</center></a>
									</li>									
									<li class="nav-item navtest1 col-md-3">
										<a class="nav-link" data-toggle="tab" href="#employee"><center>Employee</center></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Tab Content -->
					<div class="tab-content">

					<!-- COO Tab Start -->
					<div class="tab-pane active" id="COO">
						<div class="payroll-table card">
							<div class="table-responsive">
								<div class="card-header">
									<h3 class="card-title mb-0 text-center">Chief Operations Officer</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<input type="hidden" name="probationary_batchid" value="{{$data['probdata']->probationary_form_empbatchid}}" />
										<input type="hidden" name="probationary_id" value="{{$data['probdata']->probationary_form_id}}" />
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Chief Operations Officer Name </label>
												<input type="text" readonly class="form-control" name="cooname" value="{{session()->get('name')}}" />
											</div>	
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Chief Operations Officer Date </label>
												<input type="date" readonly class="form-control" name="coodate" value="<?php echo date('Y-m-d'); ?>">
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
					<!-- COO Tab End -->
					<div class="tab-pane" id="manager">							
						<div class="payroll-table card">
							<div class="table-responsive">
								<div class="card-header">
									<h3 class="card-title mb-0 text-center">PROBATIONARY EMPLOYEE FORM</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Employee Batch ID</label>
												<input type="text" class="form-control" name="batchid" value="{{$data['probdata']->probationary_form_empbatchid}}" readonly required/>
												
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Employee Name</label>
												<input type="text" class="form-control" name="empname" value="{{$data['probdata']->probationary_form_empname}}" readonly required/>
											</div>
										</div>											
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Designation</label>
												<input type="text" class="form-control" name="desgid" value="{{$data['empdata']->DESG_NAME}}" readonly required/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Department</label>
												<input type="text" class="form-control" name="deptid" value="{{$data['empdata']->dept_name}}" readonly required/>
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Evaluator</label>
												<input type="text" class="form-control" name="evname" value="{{$data['probdata']->probationary_form_empevaluator}}" readonly required />
											</div>
										</div>											
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Date</label>
												<input type="date" class="form-control" name="date" value="{{$data['probdata']->probationary_form_date}}" readonly required />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Months Review</label>
												<input type="text" class="form-control" name="mreview" readonly="" @if($data['probdata']->probationary_form_empmonthsreview == "3" )  value = "Three Months"
																					@elseif($data['probdata']->probationary_form_empmonthsreview == "6" ) value = "Six Months"
																					@elseif($data['probdata']->probationary_form_empmonthsreview == "12" )  value = "Twelve Months"
																					@endif >													
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Months Review Comment</label>
												<input type="text" class="form-control" name="mreviewc" value="{{$data['probdata']->probationary_form_empmonthsreviewcomment}}" readonly required />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Quality and accuracy of work</label>
												<input type="text" class="form-control"  name="qaacow" readonly @if($data['probdata']->probationary_form_empqualitywork == "1" )  value = "Improvement required"
																					@elseif($data['probdata']->probationary_form_empqualitywork == "2" ) value = "Satisfactory"
																					@elseif($data['probdata']->probationary_form_empqualitywork == "3" )  value = "Good"
																					@elseif($data['probdata']->probationary_form_empqualitywork == "4" )  value = "Excellent"
																					@endif >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Efficiency / Productivity</label>
												<input type="text" class="form-control"  name="effpro" readonly @if($data['probdata']->probationary_form_empefficiency == "1" )  value = "Improvement required"
																					@elseif($data['probdata']->probationary_form_empefficiency == "2" ) value = "Satisfactory"
																					@elseif($data['probdata']->probationary_form_empefficiency == "3" )  value = "Good"
																					@elseif($data['probdata']->probationary_form_empefficiency == "4" )  value = "Excellent"
																					@endif >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Attendance / Punctuality</label>
												<input type="text" class="form-control"  name="attpun" readonly @if($data['probdata']->probationary_form_empattenpunctuality == "1" )  value = "Improvement required"
																					@elseif($data['probdata']->probationary_form_empattenpunctuality == "2" ) value = "Satisfactory"
																					@elseif($data['probdata']->probationary_form_empattenpunctuality == "3" )  value = "Good"
																					@elseif($data['probdata']->probationary_form_empattenpunctuality == "4" )  value = "Excellent"
																					@endif >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Time Management </label>
												<input type="text" class="form-control"  name="tima" readonly @if($data['probdata']->probationary_form_emptimemang == "1" )  value = "Improvement required"
																					@elseif($data['probdata']->probationary_form_emptimemang == "2" ) value = "Satisfactory"
																					@elseif($data['probdata']->probationary_form_emptimemang == "3" )  value = "Good"
																					@elseif($data['probdata']->probationary_form_emptimemang == "4" )  value = "Excellent"
																					@endif >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Work Relationship & Team Management skills</label>
												<input type="text" class="form-control"  name="wrtm" readonly @if($data['probdata']->probationary_form_empworkskills == "1" )  value = "Improvement required"
																					@elseif($data['probdata']->probationary_form_empworkskills == "2" ) value = "Satisfactory"
																					@elseif($data['probdata']->probationary_form_empworkskills == "3" )  value = "Good"
																					@elseif($data['probdata']->probationary_form_empworkskills == "4" )  value = "Excellent"
																					@endif >
											</div>
										</div>											
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Competency in the Role</label>
												<input type="text" class="form-control"  name="citr" readonly @if($data['probdata']->probationary_form_empcompetency == "1" )  value = "Improvement required"
																					@elseif($data['probdata']->probationary_form_empcompetency == "2" ) value = "Satisfactory"
																					@elseif($data['probdata']->probationary_form_empcompetency == "3" )  value = "Good"
																					@elseif($data['probdata']->probationary_form_empcompetency == "4" )  value = "Excellent"
																					@endif >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Have the objectives identified for the probationary period been met?</label>
												<input id="p1" type="text" class="form-control"  name="htoppbm" value="{{$data['probdata']->probationary_form_empobjectives}}" readonly>												
											</div>
										</div>											
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Have the training / development needs identified for the probationary period been addressed? </label>
												<input id="p2" type="text" class="form-control"  name="httppba" value="{{$data['probdata']->probationary_form_emptraining}}" readonly>
											</div>
										</div>											
									</div>
									<div class="row">
										<div id="p1v" class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">If NO, please provide details</label>
												<input type="text" class="form-control" name="htoppbm_ifnoc" value="{{$data['probdata']->probationary_form_empnoobjectivescomment}}" readonly />
											</div>
										</div>
										<div id="p2v" class="col-md-6">
											<div class="form-group">
											<label class="col-form-label">If NO, please provide details</label>
											<input type="text" class="form-control" name="httppba_ifnoc" value="{{$data['probdata']->probationary_form_empnotrainingcomment}}" readonly />
											</div>
										</div>											
									</div>
									<div class="row">
										<input type="hidden" name="can_log_id" value="" />
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">Summarize the employee’s performance and progress over the period.</label>
												<input type="text" class="form-control" name="sepp" value="{{$data['probdata']->probationary_form_empsummarizeperformance}}" readonly>
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">Has the employee successfully completed the probationary period?</label>
												<input id="p3" type="text" class="form-control"  name="successcom" value="{{$data['probdata']->probationary_form_empsuccesscompleted}}" readonly>
											</div>	
										</div>
									</div>
									<div class="row">
										<div id="p3v" class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">If NO, please provide reasons below and summarize the action (s) taken to address any difficulties that have arisen during the probationary period.</label>
												<input type="text" class="form-control" name="successcom_ifno" value="{{$data['probdata']->probationary_form_empsuccesscompletedcomment}}" readonly />
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">Do you recommend that the employee’s probationary period be extended?</label>
												<input id="p4" type="text" class="form-control"  name="recommendext" value="{{$data['probdata']->probationary_form_emprecommendextended}}" readonly>
											</div>	
										</div>
									</div>
									<div class="row">
										<div id="p4v" class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">If YES, please provide reasons and, where appropriate, specify any areas of improvement required and how these will be monitored.</label>
												<input type="text" class="form-control" name="recommendext_ifyes" value="{{$data['probdata']->probationary_form_empyesrecommendextendedcomment}}" readonly />
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Length of the extension (max 3 months):</label>
												<input type="date" class="form-control" name="extensiondate" value="{{$data['probdata']->probationary_form_empextentiondate}}" readonly required/>
												
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">New Probation Period completion date:</label>
												<input type="date" class="form-control" name="npropcd" value="{{$data['probdata']->probationary_form_empnewprobcompdate}}" readonly required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-form-label">Manager’s Date:</label>
												<input type="date" class="form-control" name="empmdate" value="{{$data['probdata']->probationary_form_empmangerdate}}" readonly />
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Employee Tab -->
					<div class="tab-pane" id="employee">				
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
												<input type="text" class="form-control" name="empnamec" value="{{$data['probdata']->probationary_form_empname}}" readonly />
											</div>	
										</div>
										<div class="col-md-9">
											<div class="form-group">
												<label class="col-form-label">The employee may provide any comments about their experience of the probationary process here.
												 Employee’s Comments: </label>
												<input type="text" class="form-control" name="empnamecom" value="{{$data['probdata']->probationary_form_empnamecomment}}" readonly />
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Employee Tab End -->
					<div class="text-center" id="btnsubmit" style="display: none;">
						<button type="submit" class="btn btn-primary" style="margin-left: 700px;">Submit</button>
					</div>
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


				 $(".navtest").click(function(event) {
			        event.preventDefault();
			        // $(".navtest1").hide();
			        $("#btnsubmit").show();
			    });

				 $(".navtest1").click(function(event) {
			        event.preventDefault();
			        // $(".navtest1").hide();
			        $("#btnsubmit").hide();
			    });

				});

	// 	function employeesubmit(){
	// 		// var a = documentByid('sdsds');
	// 	window.location.replace('{{ URL::to("/employeesubmit")}}/');
	// }
			
	</script>
    </body>
</html>