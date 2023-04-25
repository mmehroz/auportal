@extends('layout.apptheme')
@section('hr-HRM')

<style>
  .redborder1{
    border-color:red;
  }
  .img-responsive
	{
		width: 24%;
	    margin-left: 1%;
	    margin-top: 1%;
	}
	.panel
	{
		text-align:left;
	}
	.bootstrap-select.btn-group .dropdown-menu
	{
		height:205px;
	}
	.account-box {
		width: 100%!important;
	}
	.account-box .account-btn {
		width: 30%!important;
	    margin-left: 35%!important;
	}
</style>	
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Employee Feedback</h3>
								@if ($errors->any())
			                    <div class="alert alert-danger">
			                        <ul>
			                            @foreach ($errors->all() as $error)
			                                <li>{{ $error }}</li>
			                            @endforeach
			                        </ul>
			                    </div>
			                	@endif
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Form</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="text-right form-inline">

					</div>
                    <div class="row">
                        <div class="col-lg-12">
							<div class="account-box">
								<div class="account-wrapper">
									@if(session('message'))
							            <div>   <div class="alert alert-info" >{!!session('message')!!}</div> </div>
							          @endif
									<h3 class="account-title">Upload Images/Video</h3>
									<!-- <p class="account-subtitle">Please fullfill the following requirements to change your password</p> -->
									
									<!-- Account Form -->
									<!-- <form action="{{URL::to('/passwordchange')}}" id="frmimage" method="post"> -->
									<form action="{{ URL::to('/savepictures')}}" method="post"  enctype="multipart/form-data">
										{{ csrf_field() }}

										<div class="form-group">
											<label for="activeStatus">Department Name</label>
											<input class="form-control" type="text"  name="deptid" value="{{$data->dept_name}}" readonly="">
										</div>
										<div class="form-group">
											<label for="activeStatus">Description</label>
											<textarea class="form-control" id="description" name="description"  rows="5" required></textarea>
										</div>
										<div class="form-group" id="divimg">
											<label for="activeStatus">Attach Images: (.png/.jpg/.jpeg)</label>
											<!-- <input type="password" name="connewpas"  class="form-control required_colom" required="required"  > -->
											<input type="file"  id="gallery-photo-add" title="Please Upload only one Department Image"  name="dept_picture[]" accept="image/x-png,image/gif,image/jpeg" id="file" class="form-control" multiple>
										</div>

										<div class="form-group">
											<label for="activeStatus">Attach Video: (.mp4/.wmv/.3gp4)</label>
											<!-- <input type="password" name="connewpas"  class="form-control required_colom" required="required"  > -->
											<input type="file" name="dept_video" title="Please Upload only one Department Video of size less than 3MB"  accept="video/mp4,video/wmv,video/3gp" class="form-control"/>
										</div>

										<label class="col-form-label" style="color:red" ><strong>Note: (Maximum Video size is 3MB).</strong></label></br>
										<label class="col-form-label" style="color:red" ><strong>Note: (You May Upload Multiple Image At Once).</strong></label></br>
										<div class="gallery"></div>
										
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
                <!-- <div id ='modal'></div>				 -->
            </div>
			<!-- Page Wrapper --><!-- 
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->
<script type="text/javascript">
	$(function() {
		// Multiple images preview in browser
		var imagesPreview = function(input, placeToInsertImagePreview) {

		    if (input.files) {
		        var filesAmount = input.files.length;

		        for (i = 0; i < filesAmount; i++) {
		            var reader = new FileReader();

		            reader.onload = function(event) {
		                $($.parseHTML('<img>')).addClass("img-responsive").attr('src', event.target.result).appendTo(placeToInsertImagePreview);
		            }

		            reader.readAsDataURL(input.files[i]);
		        }
		        document.getElementById("divimg").style.display = "none";
		    }

		};

		$('#gallery-photo-add').on('change', function() {
		    imagesPreview(this, 'div.gallery');
		});
	});




</script>


@endsection