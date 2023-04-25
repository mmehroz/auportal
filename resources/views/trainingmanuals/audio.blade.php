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
					<h3 class="page-title text-center">Training Manual Audios</h3>
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
		
		<!-- <div class="row">
			<div class="col-md-4">
			<div class="bd">
			<h4>Heading....</h4>
			<audio controls>
 				<source src="{{URL::to('public/mp3/1.mp3')}}" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
            </div>
			</div>
			
			<div class="col-md-4">
			<div class="bd">
			<h4>Heading....</h4>
			<audio controls>
 				<source src="{{URL::to('public/mp3/1.mp3')}}" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
            </div>
			</div>
			
			<div class="col-md-4">
			<div class="bd">
			<h4>Heading....</h4>
			<audio controls>
 				<source src="{{URL::to('public/mp3/1.mp3')}}" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
            </div>
			</div>
		</div>		 -->	
</div>
<style>
.bd{
/*border: 1px solid Lightgray;*/
border-radius: 4px;
padding: 5px;
text-align: center;

}
.bd h4{
	text-decoration: none;
}

</style>
@endsection