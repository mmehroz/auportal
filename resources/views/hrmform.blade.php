@extends('layout.apptheme')
@section('hr-HRM')

<style>
  .redborder1{
    border-color:red;
  }
  .account-box .form-control{
	border-radius:5px;
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
	button.btn.dropdown-toggle.btn-light.bs-placeholder{
		height:44px !important;
	}
</style>	
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">My Document</h3>
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
									<!-- <h3 class="account-title">Upload Documents</h3> -->
									<!-- <p class="account-subtitle">Please fullfill the following requirements to change your password</p> -->
									
									<!-- Account Form -->
									<!-- <form action="{{URL::to('/passwordchange')}}" id="frmimage" method="post"> -->
									<form action="{{ URL::to('/savepictures')}}" method="post"  enctype="multipart/form-data">
										{{ csrf_field() }}
										<div class="row">
											@if(session()->get("role") <= 2)
											<div class="col-md-3">
												<label>Seelct Employee</label>
												<select name="empbatch_id" class="form-control selectpicker" data-live-search="true" required>
													<option selected="" value="">Select Employee</option>
													@foreach($emp as $emps)
													<option value="{{$emps->elsemployees_batchid }}">{{$emps->elsemployees_name}} - {{$emps->elsemployees_batchid }}</option>
													@endforeach
												</select>
											</div>
											@else
											<div class="col-md-3">
												<div class="form-group">
													<label>Batch Id</label>
													<input type="text" name="empbatch_id"  readonly class="form-control" value="{{session()->get('batchid')}}">
												</div>
											</div>
											@endif
						    				<div class="col-md-3">
												<div class="form-group">
													<label for="activeStatus">Title</label>
													<textarea class="form-control" id="description" name="description"  rows="1" required></textarea>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="activeStatus">Upload Documents</label>
													<!-- <input type="password" name="connewpas"  class="form-control required_colom" required="required"  > -->
													<input type="file"     name="dept_picture[]"  id="file" class="form-control" multiple>
													<label class="col-form-label" style="color:red" ><strong>Note: (Maximum File size is 3MB).</strong></label></br>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label for="activeStatus" style="color: white">.</label>
													<br>
													<button class="btn btn-primary" type="submit">Submit</button>
												</div>
											</div>
										</div>
										<!-- <div class="form-group">
											<label for="activeStatus">Attach Video: (.mp4/.wmv/.3gp4)</label>
											 <input type="password" name="connewpas"  class="form-control required_colom" required="required"  > -->
											<!-- <input type="file" name="dept_video" title="Please Upload only one Department Video of size less than 3MB"  accept="video/mp4,video/wmv,video/3gp" class="form-control"/> -->
										<!-- </div> --> 

										
										<!-- <label class="col-form-label" style="color:red" ><strong>Note: (You May Upload Multiple Image At Once).</strong></label></br> -->
										<div class="gallery"></div>
									</form>
									<!-- /Account Form -->
									
								</div>
							</div>
                        </div>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="ele">
								<thead>
								<tr>
									<th style="color: #121212; font-weight: 600; font-size: 18px; padding-top: 12px; padding-bottom: 12px;">Title</th>
									<th style="color: #121212; font-weight: 600; font-size: 18px; padding-top: 12px; padding-bottom: 12px;">Employee Name</th>
									<th style="color: #121212; font-weight: 600; font-size: 18px; padding-top: 12px; padding-bottom: 12px;">Employee Batch Id</th>
									<th style="color: #121212; font-weight: 600; font-size: 18px; padding-top: 12px; padding-bottom: 12px;">Download Attachment </th>
								</tr>
								</thead>
								<tbody>
								@foreach ($data as $val)
								<tr>
									<td style="padding-top: 9px;"><h5 style="color: #121212;font-weight: 600;font-size: 16px;">{{$val->dept_description}}</h5></td>
									<td style="padding-top: 9px;"><h5 style="color: #121212;font-weight: 600;font-size: 16px;">{{$val->name}}</h5></td>
									<td style="padding-top: 9px;"><h5 style="color: #121212;font-weight: 600;font-size: 16px;">{{$val->elsemployees_name}}</h5></td>
									<td style="padding-top: 9px;"><a href="{{URL::to('public/mydocuments/')}}/{{$val->dept_picture}}" class="btn btn-primary mt-1 mb-1" download><i class="fa fa-arrow-down pr-2"></i>Download</a></td>
								</tr>
								@endforeach
								</tbody>
							</table>
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