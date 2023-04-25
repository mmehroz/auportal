<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>INTERVIEW ASSESSMENT FORM - HRMS</title>
		
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
		
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap-datetimepicker.min.css') !!}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/style.css') !!}">
		
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
                    <a href="{{url('/')}}" class="logo">
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
				<ul class="nav user-menu">				
					<!-- Search -->					
					<!-- /Search -->				
					<!-- Flag -->					
					<!-- /Flag -->					
					<li class="nav-item">
						<a class="nav-link" href="{{url('/')}}">LogOut</a>
					</li>
				</ul>
				<!-- /Header Menu -->
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{url('/')}}">LogOut</a>
					</div>
				</div>
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
				<div class="row">
					<div class="col-xl-12">
						<div class="card flex-fill">
							<div class="card-header">
								<h4 class="card-title mb-0 text-center"> MANAGER INTERVIEW ASSESSMENT & RECOMMENDATION FORM</h4>
							</div>
							<div class="card-body">
								<form class="user" action="{{ URL::to('/submitevaluatemng')}}" id="" enctype="multipart/form-data" method="post">
		                            {{csrf_field()}}
									
									<input type="hidden" name="can_job_id" value="{{ $data->jobapplicant_id }}" />
									<input type="hidden" name="can_evu_id" value="{{ $data->can_evu_id }}" />
									
									<h4 class="card-title mb-0 text-left" style="color: #000000; background-color: #bfbfbf; text-align: center !important;">Departmental Head Assessment</h4>
									<p style="color:#f90202;">Filled by Departmental Head</p>
									<div class="table-responsive">
							            <table class="table table-bordered">
												<p>Total Marks: Job Relevancy=3 Experience=5 Knowledge of Industry=5 Career Progression=5  Notable Achievement=2 Potential=2 <br> AVG Marks Obtained=3.67</p>
							                <thead>
							                  <tr>
							                    <th  style="white-space: nowrap;"></th>
							                    <th  style="white-space: nowrap;">Job Relevancy</th>
							                    <th  style="white-space: nowrap;">Experience : Yrs Local Foreign</th>
							                    <th  style="white-space: nowrap;">Knowledge of Industry</th>
							                    <th  style="white-space: nowrap;">Career Progression</th>
							                    <th  style="white-space: nowrap;">Notable Achievement</th>
							                    <th  style="white-space: nowrap;">Potential</th>
							                    <th  style="white-space: nowrap;">Obtained Marks</th>
							                  </tr>
							                  <tr>
							                  </tr>
							                </thead>
							                <tbody>
							                	<td>Personal</td>
							                	<td><select class="form-control" name="can_hod_job_rel" id="mySelect1"  required >
													<option value="0" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_job_rel',@$data->can_evu_hod_job_rel == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="form-control" name="can_hod_exp" id="mySelect2"  required >
													<option value="0" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_exp',@$data->can_evu_hod_exp == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="form-control" name="can_hod_know" id="mySelect3" required >
													<option value="0" @if(old('can_hod_know',@$data->can_evu_hod_know == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_know',@$data->can_evu_hod_know == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_know',@$data->can_evu_hod_know == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_know',@$data->can_evu_hod_know == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_know',@$data->can_evu_hod_know == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_know',@$data->can_evu_hod_know == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="form-control" name="can_hod_carpro" id="mySelect4" required >
													<option value="0" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_carpro',@$data->can_evu_hod_carpro == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="form-control" name="can_hod_noble" id="mySelect5"  required >
													<option value="0" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_noble',@$data->can_evu_hod_noble == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
							                	<td><select class="form-control" name="can_hod_pot" id="mySelect6" required >
													<option value="0" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 0 )) {{ "selected" }} @endif >Satisfactory</option>
													<option value="1" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 1 )) {{ "selected" }} @endif >1</option>
													<option value="2" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 2 )) {{ "selected" }} @endif >2</option>
													<option value="3" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 3 )) {{ "selected" }} @endif >3</option>
													<option value="4" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 4 )) {{ "selected" }} @endif >4</option>
													<option value="5" @if(old('can_hod_pot',@$data->can_evu_hod_pot == 5 )) {{ "selected" }} @endif >5</option>
												</select></td>
												<td><input class="form-control required_colom" type="number"  min='0' name="can_hod_obtain" id="total" value="{{old('can_hod_obtain', @$data->can_evu_hod_obtain ) }}" readonly /></td>
												
												
							              	</tbody>
							            </table>
										<p>Piont from 0 to 1.5 = Unsatisfactory, 1.6 to 2.5 = Average, 2.6 to 3.5 = Satisfactory, 3.6 to 4.5 = Good, 4.6 to 5 = Excellent</p>
						            </div>
						            <br>
									
									<div class="row">
									    <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">HOD Comments</label>
												<textarea rows="2" cols="5" class="form-control" placeholder="Enter Your Comment" name="can_hod_commets" required >{{old('can_hod_commets', @$data->can_evu_hod_comments ) }}</textarea>
											</div>
										</div>
									</div>
						            <div class="table-responsive">
							            <table class="table table-bordered">
												
							                <thead>
							                  <tr>
							                    <th  style="white-space: nowrap;"></th>
							                    <th  style="white-space: nowrap;">HR Department</th>
							                    <th  style="white-space: nowrap;">Departmental Head</th>
							                  </tr>
							                  <tr>
							                  </tr>
							                </thead>
							                <tbody>
							                	<td>Candidate Results</td>
							                	<td><input class="form-control required_colom" type="text" name="can_hr_cand" value="{{old('can_hr_cand', @$data->can_evu_hr_cand ) }}" readonly /></td>
							                	<td><input class="form-control required_colom" type="text" name="can_hod_cand" id="hrscore" value="{{old('can_hod_obtain', @$data->can_evu_hod_cand ) }}" readonly  /></td>
							              	</tbody>
							            </table>
						            </div>
									<br>
									
						            <br>
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>						
            </div>
              <!-- <div class="text-center">
                <div class="credits"> -->
                  <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                  -->
                  <!-- Designed by <a href="http://www.level3bos.com/">Level3BOS</a>
                </div>
              </div> -->
            <!--main content end-->
			<!-- /Page Wrapper -->
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/popper.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.slimscroll.min.js"></script>
		
		
		<!-- Datatable JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.dataTables.min.js"></script>
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/moment.min.js"></script>
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Mask JS -->
		<script type="text/javascript" src="{{ URL::asset('public/js/jquery.maskedinput.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/js/mask.js') }}"></script>


		<!-- <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery.maskedinput.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/mask.js"></script> -->
        
		<!-- Custom JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>


		<script type="text/javascript">
		
		setInterval( function () {
			
			
			//var arr = document.getElementsByName('DirecTVNow');
			var arr1 = parseInt(document.getElementById("mySelect1").value);
			
			var arr2 = parseInt(document.getElementById("mySelect2").value);
			
			var arr3 = parseInt(document.getElementById("mySelect3").value);
			
			var arr4 = parseInt(document.getElementById("mySelect4").value);
			
			var arr5 = parseInt(document.getElementById("mySelect5").value);
			
			var arr6 = parseInt(document.getElementById("mySelect6").value);
			
			

			
			var addtot = (arr1 + arr2  + arr3 + arr4 + arr5  + arr6 );
			
			var tot = addtot / 6;
			
			
			
			
			
			if( ( tot >= 4.6 ) ){
				
				var score = "Excellent";
				console.log(score);
				
				
			}else if( ( tot >= 3.6 ) ){
				
				
				var score = "Good";
				console.log(score);
				
				
				
			}else if(  ( tot >= 2.6 ) ){
				
				var score = "Satisfactory";
				console.log(score);
				
				
			}else if( (tot >= 1.6)  ){
				
				var score = "Average";
				console.log(score);
				
				
			}else if( ( tot >= 1 ) ){
				
				var score = "Unsatisfactory";
				console.log(score);
				
				
			}else{
				var score = "";
			}
			
			console.log(tot);
			
			document.getElementById('total').value = tot;
			document.getElementById('hrscore').value = score;
			
		
			}, 2000);
		
			$('#datetimepicker-default').datetimepicker();
    	</script>
		
    </body>

</html>