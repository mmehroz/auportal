@extends('layout.logintheme')
@section('content')
<style>
.account-box
{
	width:384.8px;
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
    <body class="account-page" style="color:white;background:url({{ url('public/images/hrm-bg.jpg') }});background-size: cover; background-repeat:no-repeat;background-position: center;background-attachment:fixed;position: static;">
	
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
									<hr style="margin-top: 0px;margin-bottom: 12px;border-top:1px solid #969292;">
									<h3 class="account-title" style="margin-bottom: 2px;">Forgot Password?</h3>
									<p class="account-subtitle">Enter your email to get a password reset link</p>
									
									<!-- Account Form -->
									<form  action="{{url('forget_submit')}}" method="post">
										{{ csrf_field() }}
										<div class="form-group"  data-validate = "Username is reauired">
											<label>Email Address</label>
											<input class="form-control" type="email" name="email"  required="email">
										</div>
										<div class="form-group text-center">
											<button class="btn btn-primary account-btn" type="submit">Submit</button>
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
    </body>
	@endsection