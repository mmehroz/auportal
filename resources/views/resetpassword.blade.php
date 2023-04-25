<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/smarthr/maroon/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Mar 2020 18:49:56 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>BWC Login - HRMS</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/assets/img/favicon.png') !!}" />
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap.min.css') !!}" />
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/font-awesome.min.css') !!}" />
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{!! asset('public/assets/css/style.css') !!}" />
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
<style>
.account-box
{
	width:380px;
    background-color: rgba(0, 0, 0, 0.35);
    border: 1px solid #969292;
}
.account-subtitle
{
	color:#fff;
}
.account-box label
{
	color:#fff;
}
</style>

    <body class="account-page" style="color:#82b34f;background:url({{ url('public/images/hrm-bg.jpg') }});background-size: cover; background-repeat:no-repeat;background-position: center;background-attachment:fixed;position: static;">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<div class="account-content">
				<div class="container">
				
					<!-- Account Logo -->
					
					<!-- /Account Logo -->
					<div class="row">
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
							<div class="account-box">
							<div class="account-logo">
								<!-- <a href="{{url('/')}}"><img src="{!! asset('public/assets/img/final logo remakasde.png') !!}" alt="Dreamguy's Technologies"></a> -->
							
										<a href="{{url('/')}}"><img src="{!! asset('public/images/logo.png') !!}" alt="Dreamguy's Technologies" style="width: 170px;margin-bottom: px;"></a>
							</div>
								<div class="account-wrapper">
									@if(session('message'))
										<div>   <div class="alert alert-success" >{!!session('message')!!}</div> </div>
									  @endif
									<hr style="margin-top: 0px;margin-bottom: 12px;border-top:1px solid #969292;">
									<h3 class="account-title" style="margin-bottom: 2px;">Reset Password?</h3>
									<p class="account-subtitle">Enter your New Password</p>
									
									<!-- Account Form -->
									<form action="{{url('reset_submit')}}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="verify_token" value="{{$verify_token}}">
										<div class="form-group">
											<label>New Password</label>
											<!-- <input class="form-control" name="password" type="password"> -->
											<input type="password" name="password"  class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
										</div>
										<div class="form-group text-center">
											<button class="btn btn-primary account-btn" type="submit">Reset</button>
										</div>
									</form>
									<!-- /Account Form -->
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/popper.min.js"></script>
        <script src="https://dreamguys.co.in/smarthr/maroon/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="https://dreamguys.co.in/smarthr/maroon/assets/js/app.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/maroon/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Mar 2020 18:49:56 GMT -->
</html>