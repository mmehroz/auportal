<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="robots" content="noindex, nofollow">
	<title>MANAGER INTERVIEW ASSESSMENT & RECOMMENDATION FORM</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;family=Raleway&amp;family=Roboto:wght@500&amp;display=swap" rel="stylesheet">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/favicon/favicon.png') !!}">

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

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
		rel="stylesheet" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.card{
				box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px !important;
				margin: 35px 72px;
    border-radius: 15px !important;
	border: none;
			}
			select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 2px);
    height: 55px;
    font-family: 'Raleway', sans-serif;
	
}
.card-body{
	background: #edf2f5;
}
.card-header {
    background-color: #ebebeb;
    text-align: center;
    border-radius: 5px !important;
 
}
.card-header h4{
	font-family: 'Raleway', sans-serif;
    color: #000;
    font-weight: 800;
    font-size: 25px;
    text-align: center;
	letter-spacing: 2px;
}
			.form-control {
    /* border-color: #0f1431; */
    border: none;
    border-radius: 5px;
    color: black;
    background-color: white;
    box-shadow: none;
    font-size: 14px;
    font-weight: 700;
    height: 55px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.col-form-label {
    padding-top: calc(0.375rem + 1px);
    padding-bottom: calc(0.375rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 1.5;
    color: #4c4c4c;
    font-size: 15px;
    
    font-family: 'Raleway', sans-serif;
    /* font-family: poppins; */
    /* font-weight: 500; */
}
.form-check-label{
	font-size: 16px;
    color: #121212;
    font-weight: 600;
    font-family: 'Raleway', sans-serif;
}
button.btn.mybtn {
    background: #5069e7;
    COLOR: #FFF;
    font-family: 'Raleway', sans-serif;
    font-size: 16px;
    font-weight: bold;
}
input[type="file"] {
    height: 65px;
    padding-top: 18px;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #fff;
    opacity: 1;
}
.submitbtn{
	background-color: #5069e7;
    color: #fff;
    width: 15%;
    height: 50px;
    margin-top: 25px;
}
.table {
    color: #4c4c4c;
    text-transform: capitalize;
	font-family: 'Raleway', sans-serif;
}
.tablep{
	color: #121212;
    text-transform: capitalize;
    font-family: 'Raleway', sans-serif;
    font-size: 18px;
    font-weight: 600;
}
.page-title-box {
 text-align: center !important;
 float: none !important;
}
.headerheading{
	text-align: center !important;
	color: #fff;
	font-family: 'Raleway', sans-serif;
	padding-top:5px
}
.mainheader{
	background-image: linear-gradient(to right bottom, #6416ec, #33e0e0) !important;
	padding-top: 10px;
	padding-bottom: 10px;
	position: sticky;
    position: -webkit-sticky;
    top: 0;
	z-index: 999;
}
.maincontainer{
	margin-top: 20px;
}
.logo img{
	width:35%
}
.logouttext{
	font-size: 17px;
						
						font-family: 'Raleway', sans-serif;
}
@media only screen and (max-width: 720px) {
	.maincontainer{
	margin-top: 0px;
}
.card{
				
				margin: 5px 2px;
	
}
.headerheading{
	font-size: 14px;
	margin-top: 15px;
	text-align: left !important;
    font-weight: bold;
}
.logo img{
	width:30%
}
.logouttext{
	font-size: 15px;
	font-weight: bold;
}
.logoutcolum{
	margin-top: 12px;
}
.submitbtn {
    width: 100%;
}
.tablep{
	font-size: 12px;
}
}
			</style>
</head>
    <body>	
		<!-- Main Wrapper -->
        <div class="main-wrapper">		
			<!-- Header -->
			<div class="mainheader">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-12">
							<a href="#" class="logo">
								<img src="{!! asset('public/images/logo.svg') !!}">
							</a>
						</div>
						<div class="col-lg-6 col-9 pt-1">
							<h3 class="headerheading">Human Resource Management</h3>
						</div>
						<!-- <div class="col-lg-3 text-right col-3 pt-1 logoutcolum">
							<a class="text-white logouttext" href="#">Logout</a>
						</div> -->
					</div>
					
				</div>
				<!-- Logo -->
			
				<!-- /Logo -->
				<!-- Header Title -->
		
			
				<!-- /Header Title -->
				<!-- Header Menu -->
				
				<!-- /Header Menu -->
				<!-- Mobile Menu -->
		
				<!-- /Mobile Menu -->
			</div>
			<!-- /Header -->			
            <div class="content container-fluid">
            	<div class="page-header">
					<div class="row">
						<div class="col">
							
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
								<h4 class="card-title mb-0 text-center"> Departmental Head Assessment</h4>
							</div>
							<div class="card-body">
								<form class="user" action="{{ URL::to('/submitevaluatemng')}}" id="" enctype="multipart/form-data" method="post">
		                            {{csrf_field()}}
									
									<input type="hidden" name="can_job_id" value="{{ $data->jobapplicant_id }}" />
									<input type="hidden" name="can_evu_id" value="{{ $data->can_evu_id }}" />
									
									
									<p style="color:#f90202;">Filled by Departmental Head</p>
									<div class="table-responsive">
							            <table class="table table-bordered mt-4">
												<p class="tablep">Total Marks: Job Relevancy=3 Experience=5 Knowledge of Industry=5 Career Progression=5  Notable Achievement=2 Potential=2 <br> AVG Marks Obtained=3.67</p>
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
										
						            </div>

						
									<div class="row">
									    <div class="col-md-12">
											<div class="form-group">
												<label class="col-form-label">HOD Comments</label>
												<textarea rows="2" cols="5" class="form-control" placeholder="Enter Your Comment" name="can_hod_commets" required >{{old('can_hod_commets', @$data->can_evu_hod_comments ) }}</textarea>
											</div>
										</div>
									</div>
						            <div class="table-responsive mt-5">
							            <table class="table table-bordered">
											<p class="tablep">Piont from 0 to 1.5 = Unsatisfactory, 1.6 to 2.5 = Average, 2.6 to 3.5 = Satisfactory, 3.6 to 4.5 = Good, 4.6 to 5 = Excellent</p>
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
									<div class="">
										<button type="submit" class="btn submitbtn">Submit</button>
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