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
					<h3 class="page-title text-center">AU Library</h3>
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
		
		<div class="row ">
			<div class="col-md-3 mb-3">
				<div class="bd">
					<div class="book">
					<img src="{{URL::to('public/library/book2.jpg')}}"  alt="">
					</div>
				<!-- <h4 class="mt-2">Heading....</h4> -->

			 <a href="{{URL::to('public/library/one.pdf')}}" target="_blank" class="btn btn-primary">Click To Read Book</a>
				</div>
			
			</div>
			<!-- 2 -->
			<div class="col-md-3 mb-3">
				<div class="bd">
					<div class="book">
					<img src="{{URL::to('public/library/book6.jpg')}}"  alt="">
					</div>
			<!-- <h4 class="mt-2">Heading....</h4> -->
			<a href="{{URL::to('public/library/two.pdf')}}" target="_blank" class="text-center btn btn-primary">Click To Read Book</a>
			</div>
			</div>
			<!-- 3 -->
			<div class="col-md-3 mb-3">
				<div class="bd">
					<div class="book">
					<img src="{{URL::to('public/library/book8.jpg')}}"  alt="">
					</div>
			<!-- <h4 class="mt-2">Heading..</h4> -->
			<a href="{{URL::to('public/library/three.pdf')}}" target="_blank" class="btn btn-primary">Click To Read Book</a>
			</div>
			</div>
			<!-- 4 -->
			<div class="col-md-3 mb-3">
				<div class="bd">
					<div class="book">
					<img src="{{URL::to('public/library/book4.jpg')}}"  alt="">
					</div>
			<!-- <h4 class="mt-2">Heading..</h4> -->
			<a href="{{URL::to('public/library/four.pdf')}}" target="_blank" class="btn btn-primary">Click To Read Book</a>
			</div>
			</div>
			<!-- 5 -->
			<div class="col-md-3 mb-3">
				<div class="bd">
					<div class="book">
					<img src="{{URL::to('public/library/book5.jpg')}}"  alt="">
					</div>
			<!-- <h4 class="mt-2">Heading..</h4> -->
			<a href="{{URL::to('public/library/five.pdf')}}" target="_blank" class="btn btn-primary">Click To Read Book</a>
			</div>
			</div>
			<!-- 6 -->
			<div class="col-md-3 mb-3">
				<div class="bd">
					<div class="book">
					<img src="{{URL::to('public/library/book7.jpg')}}"  alt="">
					</div>
			<!-- <h4 class="mt-2">Heading..</h4> -->
			<a href="{{URL::to('public/library/six.pdf')}}" target="_blank" class="btn btn-primary">Click To Read Book</a>
			</div>
			</div>
			<!-- 7 -->
			<div class="col-md-3 mb-3">
				<div class="bd">
					<div class="book">
					<img src="{{URL::to('public/library/book1.jpg')}}"  alt="">
					</div>
			<!-- <h4 class="mt-2">Heading..</h4> -->
			<a href="{{URL::to('public/library/seven.pdf')}}" target="_blank" class="btn btn-primary">Click To Read Book</a>
			</div>
			</div>
			<!-- 8 -->
			<div class="col-md-3">
				<div class="bd">
					<div class="book">
					<img src="{{URL::to('public/library/book3.jpg')}}"  alt="">
					</div>
			<!-- <h4 class="mt-2">Heading..</h4> -->
			<a href="{{URL::to('public/library/eight.pdf')}}" target="_blank" class=" btn btn-primary">Click To Read Book</a>
			</div>
			</div>
			<!-- 9 -->
			
			</div>
		</div>			
</div>
<style>
	.bd .btn{
 width: 160px;
    /*height: 20px !important;*/
    border: 1px solid ##5069e7;
    outline: none;
    background-color: ##5069e7;
    color: white;
    border-radius: 20px;
    padding-bottom: 30px !important;
    margin-bottom: 10px;

}
.bd .btn:hover{
    background-color: white;
    color: ##5069e7;
}
	

}
h4{
	margin-left: 0px !important;
	text-decoration: none !important;
	text-align: center;
}
.bd{
border: 1px solid Lightgray;
border-radius: 4px;
/*padding: 5px;*/
text-align: center;
overflow: hidden;
width: 100%;
/*height: 460px;*/
transition: 0.5s;

}
.bd .book{
	/*height: 400px;*/
	overflow: hidden;
	margin-bottom: 10px;
	transition: 0.5s;
}
.bd .book img{
max-width: 100%;
transition: 0.5s;

}
.bd .book img:hover{
transform: scale(0.9);
transition: 0.5s;
}
@media only screen and (max-width: 1024px){
	

</style>
@endsection