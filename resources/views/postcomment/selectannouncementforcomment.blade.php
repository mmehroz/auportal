@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Select Announcement Title</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/maindashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Comments</li>
					</ul>
				</div>
			</div>
		</div>
		<div>   <p class="alert alert-info" >Select Announcement For Comments</p> </div>
		<div class="text-right form-inline">

		</div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-lg-12">
					<form action="{{ URL::to('/submitselectannouncement')}}"  method="post">
						{{csrf_field()}}
						<div class="row">
				        	<div class="col-md-8">
						       <label for="attmonth">Select Announcement</label>
						       <select class="form-control " placeholder="Title" name="title"  required>
                                		<option selected="" disabled="" value="{{ old('title') }}">Select Title</option>
                           				@foreach($data as $title)
                                		<option value={{$title->announcement_id}}>{{$title->announcement_title}}</option>
                            			@endforeach 
                                </select>
					    	</div>
							<div class="col-md-4"><br><br>
				        		<button type="submit" style="margin-left: 45%;" class="btn btn-primary position-right">Proceed<i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					</form>
	            </div>
	        </div>
        </div>
    </div>				
</div>
<!-- Page Wrapper -->

@endsection