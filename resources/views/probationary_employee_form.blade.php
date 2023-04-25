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
				<form action="{{ URL::to('/submitprobationaeryempform')}}" method="POST" class="form-horizontal"enctype="multipart/form-data">
					@csrf
					<div class="page-menu">
						<div class="row">
							<div class="col-md-12">
							
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item col-md-3">
										<a class="nav-link active" data-toggle="tab" href="#employee"><center>Employee</center></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Tab Content -->
					<div class="tab-content">
						<!-- Employee Tab -->
						<div class="tab-pane active" id="employee">					
							<div class="payroll-table card">
								<div class="table-responsive">
								<div class="card-header">
									<h3 class="card-title mb-0 text-center">Employee</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<input type="hidden" name="probationary_batchid" value="{{$data['probdata']->probationary_form_empbatchid}}" />
										<input type="hidden" name="probationary_id" value="{{$data['probdata']->probationary_form_id}}" />
										<div class="col-md-3">
											<div class="form-group">
												<label class="col-form-label">Employee Name </label>
												<input type="text" readonly class="form-control" name="empnamec" value="{{$data['probdata']->probationary_form_empname}}" />
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
						<!-- Employee Tab End -->
						<div class="text-center">
							<button type="submit" class="btn btn-primary" style="margin-left: 700px;">Submit</button>
						</div>
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
				});

	// 	function employeesubmit(){
	// 		// var a = documentByid('sdsds');
	// 	window.location.replace('{{ URL::to("/employeesubmit")}}/');
	// }
			
	</script>
    </body>
</html>