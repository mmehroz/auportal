@extends('layout.apptheme')
@section('hr-HRM')
<!-- <body>
	

<div class="row">
	<div class="col-md-12">
		<h1 >Preface</h1>0000
	</div>
</div>
</body> -->
<div class="page-wrapper ">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title text-center">Games</h3>
					<ul class="breadcrumb">
						<!-- <li class="breadcrumb-item active">Add Employee</li> -->
					</ul>
				</div>
			</div>
		</div>
				<!-- <ul id="" class="alert alert-info mt-3" style="display : none">
					<p>{{session('message')}}</p>
				</ul> -->
		@if(session('message'))
			<div><p class="alert alert-info mt-3" >{{session('message')}}</p> </div>
		@endif
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/game-img/hetrix.jpg') !!}" alt="">
                    </div>

                    <h4>Hextris</h4>   
                    <a href="{!! asset('public/Game/1/hextris-gh-pages/index.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			
			</div>
			<!-- 2 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">

                    <img src="{!! asset('public/game-img/clumsy.jpg') !!}" alt="">
                    </div>
                    <h4>Clumsy Bird</h4>
                    <a href="{!! asset('public/Game/6/Clumsy Bird/clumsy-bird-master/index.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			</div>
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <img src="{!! asset('public/game-img/tic tac.jpg') !!}" alt="">
					</div>
                    <h4>Tic Tac Toe</h4>
                    <a href="{!! asset('public/Game/3/tic tac toe/index.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			</div>
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <img src="{!! asset('public/game-img/sanke.jpg') !!}" alt="">
					</div>
                    <h4>Snake</h4>
                    <a href="{!! asset('public/Game/4/Snake/index.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			</div>
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <img src="{!! asset('public/game-img/car.jpg') !!}" alt="">
					</div>
                    <h4>Car Racing</h4>
                    <a href="{!! asset('public/Game/5/Car racing/javascript-racer-master/v4.final.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			</div>
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <img src="{!! asset('public/game-img/killthebird.jpg') !!}" alt="">
                    </div>
                    <h4>Kill the Bird</h4>
                    <a href="{!! asset('public/Game/2/kill the bird/index.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			</div>
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <img src="{!! asset('public/game-img/pac-man.jpg') !!}" alt="">
                    </div>
                    <h4>Pacman Master</h4>
                    <a href="{!! asset('public/Game/7/pacman-master/index.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			</div>
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <img src="{!! asset('public/game-img/mario.jpg') !!}" alt="">
                    </div>
                    <h4>Mario Master</h4>
                    <a href="{!! asset('public/Game/8/FullScreenMario-master/index.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			</div>
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <img src="{!! asset('public/game-img/bubble.jpg') !!}" alt="">
                    </div>
                    <h4>Bubble Shooter</h4>
                    <a href="{!! asset('public/Game/9/Bubble-Shooter-HTML5-master/bubble-shooter.html') !!}" target="_blank" class="click btn btn-primary">Play</a>
                </div>
			</div>
	
		</div>			
</div>

@endsection
