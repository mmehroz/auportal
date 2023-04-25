@extends('layout.apptheme')
@section('hr-HRM')
<!-- <body>
	

<div class="row">
	<div class="col-md-12">
		<h1 >Preface</h1>0000
	</div>
</div>
</body> -->
<div class="page-wrapper policy">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title text-center">My Forms</h3>
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
			<div class="col-md-6">
				<div class="bd">
				<h4>Leave Form</h4>
			<a href="{{URL::to('selfrequest')}}">Click Me!</a>
				</div>
			
			</div>
			<!-- 2 -->
			<div class="col-md-6">
				<div class="bd">
			<h4>Feedback Form</h4>
			<a href="{{URL::to('hrmform')}}" class="text-center">Click Me!</a>
			</div>
			</div>
	
		</div>	
		@if(session()->get('batchid') == 1223)
			<div class="row">
				<div class="col-md-12">
					<div class="bd">
				<h4>Add Employee</h4>
				<a href="{{URL::to('addemployeenos')}}" class="text-center">Click Me!</a>
				</div>
				</div>
			</div>
		@endif
</div>
<style>
.bd a{
	font-size: 15px;
	color: black;
	text-align: right !important;
	

}
h4{
	margin-left: 0px !important;
	text-decoration: none !important;
	text-align: center;
}
.bd{
border: 1px solid Lightgray;
border-radius: 4px;
padding: 5px;
text-align: center;

}

</style>
@endsection