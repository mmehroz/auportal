@extends('layout.apptheme')
@section('hr-HRM')
<div class="page-wrapper">
    <div class="content container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Attendance Uploader</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Bio Matric Attendance</li>
					</ul>
				</div>
			</div>
		</div>
		@if(session('message'))
			<div><p class="alert alert-success" >{{session('message')}}</p> </div>
		@endif
		<form action="{{ URL::to('/uploadeattendance')}}"  method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
			    <div class="col-md-10">
					<div class="form-group">
						<input type="file" name="attendancefile" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<input type="submit" name="submit" value="Upload" class="btn btn-info">
					</div>
				</div>
			</div>
			<div class="row">
			    <div class="col-md-10">
					<div class="form-group">
						<p class="alert alert-danger">Important Instructions</p>
						<ul>
							<li>File Format Should Be <span style="color: red">.csv</span></li>
							<li>File Size Not More Than <span style="color: red">2 MB</span></li>
							<li>Data Will Remain Same, No Need To Change</li>
							<li>1st Date Column Format Should Be <span style="color: red">yyyy-mm-dd</span></li>
							<li>2nd Month Column Format Should Be In String e.g: <span style="color: red">'01</span></li>
							<li>3rd Time Column Format Should Be In <span style="color: red">hh:mm:ss AM/PM</span></li>
							<li>4th & Last 5th Column Format Should Remain Same</li>
						</ul>
						<a href="{{url('monthlydepartbiomatric')}}">
							<p class="alert alert-info">Click To Download Attendance</p>
						</a>
					</div>
				</div>
			</div>
		</form>
    </div>				
</div>

@endsection