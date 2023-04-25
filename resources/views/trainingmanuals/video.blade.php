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
					<h3 class="page-title text-center">Training Manual Videos</h3>
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
			<!-- <div class="col-md-6 ">
				<div class="bd">
				<h4>Bizzworld Communications</h4>
      			<video width="400" controls>
                   <source src="{{URL::to('public/video/1.mp4')}}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
				</div> -->
            </div>
			<!-- 2 -->
			<!-- <div class="col-md-6">
				<div class="bd">
				<h4>Heading....</h4>
      			<video width="400" controls>
                   <source src="{{URL::to('public/video/train1.mp4')}}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
				</div>
            </div> -->
		</div>			
</div>
<style>
video {
  width: 100%;
  height: 300px;
  border-radius: 6px;
}
.bd{
border: 1px solid Lightgray;
border-radius: 4px;
padding: 5px;
text-align: center;
padding: 5px;

}
.bd h4{
	text-decoration: none;
}
</style>
@endsection