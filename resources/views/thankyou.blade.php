@extends('layout.logintheme')
@section('content')
<link href="https://www.day2daywholesale.com/_next/static/css/b71d463df487ea9c.css" rel="stylesheet" />
<link href="http://149.102.249.46/public/assets/css/login.css" rel="stylesheet" />
<body>
	<div class="w-screen h-screen overflow-y-scroll">
		<div class="w-full h-full flex">
			<div
				class="h-full w-1/2  hidden land:flex flex-col items-start p-10 justify-between" style="background-image: linear-gradient(to right bottom, #6416ec, #33e0e0);">
				<a href="/">
				<img src="{!! asset('public/img/arc-logo.gif') !!}" style="width: 24%;">
				</a>
				<div class="-mt-20 flex flex-col gap-5 w-[80%]">
					<!-- <div class="w-full flex gap-10 items-center">
						<div class="2xl:w-60 2xl:h-60 w-[40%] h-[100%] relative"><img alt="" sizes="100vw"
								
							src="{!! asset('public/img/logo.png') !!}"
								decoding="async" data-nimg="fill" class="object-cover" loading="lazy"
								style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
						</div>
						<div class="flex flex-col w-[54%] gap-4">
							<h2
								class="text-white font-bold w-full text-[24px] 2xl:text-[40px] font-primary mt-2 uppercase">
								Start your journey with us.</h2>
				
						</div>
					</div> -->
					<div class="row">
<div class="col-lg-12">
	<img alt="" sizes="100vw"
								
							src="{!! asset('public/img/hp.png') !!}"
								decoding="async" data-nimg="fill" class="object-cover" loading="lazy"
								style="margin-top:20px; margin-left:20% !important; width:90%; inset: 0px; color: transparent;">
</div>

					</div>
				</div>
				<div class="w-full flex">
					<p class="text-white">© Copyright 2023 Arc-Inventador. All rights reserved</p>
				</div>
			</div>
			<div
				class="w-full land:w-1/2 flex flex-col items-start px-10 py-10 pb-40 sm:pb-40 justify-between overflow-y-scroll">
				<div>
			
                    
					<h2 class="text-[26px] font-bold text-primaryText font-primary">Thank You For Submitting</h2><br>
					<h2 class=" text-primaryText font-primary" style="line-height:25px;">Dear <b>{{session()->get('can_name')}}</b>,

<br><br>We want to thank you for taking the time to submit your job application to <b>Arc inventador</b>. We appreciate your interest in our organization and the effort you put into completing the application process.

<br><br>We understand that waiting to hear back from potential employers can be challenging, but please know that we have received your application and will review it carefully. Our team of hiring managers will evaluate your qualifications, experience, and suitability for the role to determine if there is a fit for you at our organization.

<br><br>We encourage you to remain patient and positive during this waiting period. We will be in touch with you as soon as possible to inform you of the next steps in the hiring process. In the meantime, please feel free to explore our website to learn more about <b>Arc Inventador</b> and the work that we do. Here is your application step and it's future journey. 

<br><br>Again, thank you for considering <b>Arc Inventador</b> as your potential employer. We appreciate your interest in our organization and look forward to getting to know you better as we move forward in the hiring process.

<br><br><b>Best regards,<br>
Team Recruitment<br>
Arc Inventador</b>
</h2>
</i></div>

				
				<div class=" sm:w-[50%] 2xl:w-[40%] flex mt-10 justify-between items-center">				<a style="text-decoration:none;" href="https://arcinventador.com/"><button
							class="w-44 h-12 disabled:cursor-not-allowed submit disabled:shadow-none flex items-center justify-center rounded-md  transition duration-100  text-sx font-primary font-semibold hover:shadow-lg  select-none"
							style="color: white; transform: none;    background-image: linear-gradient(to right bottom, #6416ec, #33e0e0);" type="submit" ><span>Finish</span></button></a>
					
					
					</div>
				<div></div>
			</div>
		</div>
	</div>

</body>

<script type="text/javascript">
	function viewPassword() {
		var passwordInput = document.getElementById('password-field');
		var passStatus = document.getElementById('pass-status');

		if (passwordInput.type == 'password') {
			passwordInput.type = 'text';
			passStatus.className = 'fa fa-fw fa-eye-slash field-icon toggle-password';

		}
		else {
			passwordInput.type = 'password';
			passStatus.className = 'fa fa-fw fa-eye field-icon toggle-password';
		}
	}
</script>
@endsection