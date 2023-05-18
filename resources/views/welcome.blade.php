@extends('layout.logintheme')
@section('content')
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
								
							src="{!! asset('public/img/loho.png') !!}"
								decoding="async" data-nimg="fill" class="object-cover" loading="lazy"
								style=" height: 100%; width: 100%; inset: 0px; color: transparent;">
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
					<h2 class="text-[26px] font-bold text-primaryText font-primary">Login</h2>
					<h2 class="font-semibold text-primaryText font-primary">Enter Your Credentials</h2>
				</div>
				@if(session('message'))
					<!-- <div class="account-title">{{session('message')}}</div> -->
					<div class="account-title">   <p class="alert alert-success" >{{session('message')}}</p>
					
					</div>
				@endif
				<div class="w-full flex gap-5 mt-10">
				
				
				</div>
				<form method="Post" action="{{url('/mylogin')}}" class="w-[100%] flex flex-col gap-4 mt-10">
					{{ csrf_field() }}
					<h2 class="font-bold text-primaryText/80 font-primary text-sx">Email *</h2>
					<div
						class="w-[100%] flex items-center undefined bg-white rounded-lg h-8 p-6 border gap-2 px-3 -mt-2 false">
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
							class="text-primaryText/60" height="22" width="22" xmlns="http://www.w3.org/2000/svg">
							<path fill="none" d="M0 0h24v24H0z"></path>
							<path
								d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z">
							</path>
						</svg><input placeholder="Enter your email" type="email" name="username"
							class="w-[100%] outline-none bg-white font-semibold font-primary text-primaryText text-sx"
							value="">
					</div>

					<h2 class="font-bold text-primaryText/80 font-primary text-sx">Password</h2>
					<div
						class="w-[100%] flex items-center undefined bg-white rounded-lg h-8 p-6 border gap-2 px-3 -mt-2 false">
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
							class="text-primaryText/60" height="22" width="22" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M20.005 5.995h-1v2h1v8h-1v2h1c1.103 0 2-.897 2-2v-8c0-1.102-.898-2-2-2zm-14 4H15v4H6.005z">
							</path>
							<path
								d="M17.005 17.995V4H20V2h-8v2h3.005v1.995h-11c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h11V20H12v2h8v-2h-2.995v-2.005zm-13-2v-8h11v8h-11z">
							</path>
						</svg><input name="pass" placeholder="Enter Password" id="password-field" type="password"
							class="w-[100%] outline-none bg-white font-semibold font-primary text-primaryText text-sx"
							value="">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"  id="pass-status" onclick="viewPassword()"></span>
					</div>

					<div class=" sm:w-[50%] 2xl:w-[40%] flex mt-10 justify-between items-center"><button
							class="w-44 h-12 disabled:cursor-not-allowed submit disabled:shadow-none flex items-center justify-center rounded-md  transition duration-100  text-sx font-primary font-semibold hover:shadow-lg  select-none"
							style="color: white; transform: none;    background-image: linear-gradient(to right bottom, #6416ec, #33e0e0);" type="submit" ><span>Login</span></button>
					
					
					</div>
				
				</form>
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