<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>EXIT CHECKLIST FORM - HRMS</title>
		
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
		<style type="text/css">
			.form-control1 {
			    border-color: #ffffff;
			    color: #797979ad;
			    border-bottom-color: #797979ad;
			    box-shadow: none;
			    font-size: 15px;
			    height: 44px;
			}
			.form-horizontal .control-label[class*=col-md-] {
				padding-top: 19px;
   				font-size: 12.7px;
			}
			.form-horizontal .control-label:not(.text-right) {
			    text-align: left;
			}
			.col-md-2 {
			    width: 16.6666667%;
			    float: left;
			}
			.col-md-1 {
			    width: 8.33333333%;
			    float: left;
			}
			.col-md-1.5{
			    width: 12.5%;
			    float: left;
			}
			.col-md-4 {
			    width: 32.3333334%;
			    float: left;
			}

		</style>
    </head>
    <body>	
		<!-- Main Wrapper -->
        <div class="main-wrapper">		
			<!-- Header -->
            <div class="header">			
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{url('/canLogin')}}"class="logo">
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
				<!-- <ul class="nav user-menu">					
					<li class="nav-item">
						<a class="nav-link" href="{{url('/canLogin')}}">Logout</a>
					</li>
				</ul> -->
				<!-- /Header Menu -->
				<!-- Mobile Menu -->
				<!-- <div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{url('/canLogin')}}">Logout</a>
					</div>
				</div> -->
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
				<form action="{{ URL::to('/submitjobapplicant')}}" method="POST" class="form-horizontal"enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-12">
						<div class="card flex-fill">
							<div class="card-header">
								<h3 class="card-title mb-0 text-center">EXIT CHECKLIST -L3 BOS Pvt Ltd</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<label class="control-label col-md-1">Employee Name :</label>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control form-control1" name="can_postionapppliedform" value="" />
										</div>
									</div>
									<div class="col-md-2">
									</div>
									<label class="control-label col-md-1">Employee No :</label>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control form-control1" name="can_postionapppliedform" value="" />
										</div>
									</div>
								</div>
								<div class="row">
									<label class="control-label col-md-2" style="width: 11.666667%; flex: 0 0 9.666667%;">Date of resignation :</label>
									<div class="col-md-4">
										<div class="form-group">
											<input type="date" class="form-control form-control1" name="can_postionapppliedform" value="" />
										</div>
									</div>
									<div class="col-md-2" style="flex: 0 0 11.666667%;">
									</div>
									<label class="control-label col-md-2" style="width: 11.666667%; flex: 0 0 11.666667%;">Last day of employment :</label>
									<div class="col-md-4">
										<div class="form-group">
											<input type="date" class="form-control form-control1" name="can_postionapppliedform" value="" />
										</div>
									</div>
								</div>
								<div class="row">
									<label class="control-label col-md-1">Manager Name :</label>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control form-control1" name="can_postionapppliedform" value="" />
										</div>
									</div>
									<label class="control-label col-md-1">Dept Name :</label>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control form-control1" name="can_postionapppliedform" value="" />
										</div>
									</div>
									<label class="control-label col-md-1">Location :</label>
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-lg-9">
												<div class="form-check form-check-inline" style="margin-top: 9%;">
													<input class="form-check-input" type="radio" name="can_negotiablesalary" id="KHI" value="KHI" checked=""  required />
													<label class="form-check-label" for="KHI">
													KHI
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_negotiablesalary" id="LHR" value="LHR" checked=""  required />
													<label class="form-check-label" for="LHR">
													LHR
													</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="can_negotiablesalary" id="ISL" value="ISL"  required />
													<label class="form-check-label" for="ISL">
													ISL
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
			        	</div>
			    	</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">IT DEPT</h4>
							</div>
							<div class="card-body">
								<!-- <div id="msg5">
					                   <p class="msg4 alert"></p>
					            </div> 
					            <div class="text-right" style="margin-bottom : 2%">
					                <button type="button" onclick="addedudetails()" class="btn btn-primary">+ Add Education Record</button>
					             <br />
					            </div> -->
								<div class="table-responsive">
						            <table class="table table-bordered" id="preempform">
						                <thead>
				            			<!-- <p>EDUCATIONAL / PROFESSIONAL QUALIFICATIONS: (LIST THE LAST ONE FIRST)</p> -->
						                  <tr>
						                    <th  style="white-space: nowrap;">S.NO.</th>
						                    <th  style="white-space: nowrap;">DESCRIPTION OF ITEMS</th>
						                    <th  style="white-space: nowrap;">Owner</th>
						                    <th  style="white-space: nowrap;">Signature</th>
						                    <th  style="white-space: nowrap;">Date</th>
						                    <th  style="white-space: nowrap;">COMMENT</th>
						                  </tr>
						                  <tr>
						                  </tr>
						                </thead>
						                <tbody>
						                	<?php $cnt=1; ?>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="{{$cnt}}" readonly /></td>
												<td><input type='text' class='form-control required_colom' value='I took over the Laptop' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required'></td>
											</tr>
											<?php $cnt1=2; ?>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="{{$cnt1}}" readonly /></td>
												<td style="width: 23%;"><input type='text' class='form-control required_colom' value='I received other L3 Boss assets & accessories' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required'></td>
											</tr>
						              	</tbody>
						            </table>
					            </div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">PAYROLL</h4>
							</div>
							<div class="card-body">
								<!-- <div id="msg5">
					                   <p class="msg4 alert"></p>
					            </div> 
					            <div class="text-right" style="margin-bottom : 2%">
					                <button type="button" onclick="addedudetails()" class="btn btn-primary">+ Add Education Record</button>
					             <br />
					            </div> -->
								<div class="table-responsive">
						            <table class="table table-bordered" id="preempform">
						                <thead>
				            			<!-- <p>EDUCATIONAL / PROFESSIONAL QUALIFICATIONS: (LIST THE LAST ONE FIRST)</p> -->
						                  <tr>
						                    <th  style="white-space: nowrap;">S.NO.</th>
						                    <th  style="white-space: nowrap;">DESCRIPTION OF ITEMS</th>
						                    <th  style="white-space: nowrap;">Owner</th>
						                    <th  style="white-space: nowrap;">Signature</th>
						                    <th  style="white-space: nowrap;">Date</th>
						                    <th  style="white-space: nowrap;">COMMENT</th>
						                  </tr>
						                  <tr>
						                  </tr>
						                </thead>
						                <tbody>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="3" readonly /></td>
												<td style="width: 20%;"><input type='text' class='form-control required_colom' value='There are no Pending Expense Claims' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required'></td>
											</tr>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="4" readonly /></td>
												<td><input type='text' class='form-control required_colom' value='IGI Medical card returned' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required'></td>
											</tr>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="5" readonly /></td>
												<td><input type='text' class='form-control required_colom' value='There are no advances outstanding' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required'></td>
											</tr>
						              	</tbody>
						            </table>
					            </div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">ADMIN & SECURITY</h4>
							</div>
							<div class="card-body">
								<!-- <div id="msg5">
					                   <p class="msg4 alert"></p>
					            </div> 
					            <div class="text-right" style="margin-bottom : 2%">
					                <button type="button" onclick="addedudetails()" class="btn btn-primary">+ Add Education Record</button>
					             <br />
					            </div> -->
								<div class="table-responsive">
						            <table class="table table-bordered" id="preempform">
						                <thead>
				            			<!-- <p>EDUCATIONAL / PROFESSIONAL QUALIFICATIONS: (LIST THE LAST ONE FIRST)</p> -->
						                  <tr>
						                    <th  style="white-space: nowrap;">S.NO.</th>
						                    <th  style="white-space: nowrap;">DESCRIPTION OF ITEMS</th>
						                    <th  style="white-space: nowrap;">Owner</th>
						                    <th  style="white-space: nowrap;">Signature</th>
						                    <th  style="white-space: nowrap;">Date</th>
						                    <th  style="white-space: nowrap;">COMMENT</th>
						                  </tr>
						                  <tr>
						                  </tr>
						                </thead>
						                <tbody>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="6" readonly /></td>
												<td style="width: 23%;"><input type='text' class='form-control required_colom' value='Office Access cards (Badge) returned' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required'></td>
											</tr>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="7" readonly /></td>
												<td><input type='text' class='form-control required_colom' value='Furniture & office and mailbox keys returned' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required'></td>
											</tr>
						              	</tbody>
						            </table>
					            </div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">MANAGER</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
						            <table class="table table-bordered" id="preempform">
						                <thead>
				            			<p>I confirm cancellation of  person’s accesses to L3 BOS systems within 24 hours</p>
						                  <tr>
						                    <th  style="white-space: nowrap;">S.NO.</th>
						                    <th  style="white-space: nowrap;">DESCRIPTION OF ITEMS</th>
						                    <th  style="white-space: nowrap;">Owner</th>
						                    <th  style="white-space: nowrap;">Signature</th>
						                    <th  style="white-space: nowrap;">Date</th>
						                    <th  style="white-space: nowrap;">Tick the appropriate</th>
						                  </tr>
						                  <tr>
						                  </tr>
						                </thead>
						                <tbody>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="8" readonly /></td>
												<td><input type='text' class='form-control required_colom' value='Rackspace ID' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required' value='Deleted / Not Assigned / Mapped'></td>
											</tr>
											<tr>
												<td style="width: 5%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="9" readonly /></td>
												<td><input type='text' class='form-control required_colom' value='VPN' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required' value='Deleted / Not Assigned / Mapped'></td>
											</tr>
											<tr>
												<td style="width: 6%;"><input type='number' step='any' class='form-control required_colom' required='required' placeholder='' value="10" readonly /></td>
												<td><input type='text' class='form-control required_colom' value='Record deletion from System' required='required'></td>
												<td><input type='text' class='form-control required_colom' required='required'></td>
												<td><input type='text' class='form-control form-control1 required_colom' required='required'></td>
												<td><input type='date' class='form-control required_colom'  required='required'></td>
												<td><input type='text' class='form-control required_colom'  required='required' value='Deleted / Not Assigned / Mapped'></td>
											</tr>
						              	</tbody>
						            </table>
					            </div>	
								<div class="text-center">
									<button type="submit" class="btn btn-primary" style="margin-left: 700px;">Submit</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<br>
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
    </body>
</html>