<style>
 .leaveStyle{
	position : relative;
	left : 10px;
	margin-bottom : 12px;
 }
 #message {
   position :relative;
   font-size : 20px;
 }
  .redborder{border:1px solid red;}
   #loader-ajax2 {
			display:    none;
			position:   fixed;
			z-index:    1000;
			top:        0;
			left:       0;
			height:     100%;
			width:      100%;
			background: rgba( 255, 255, 255, .8 ) 
						url('http://zaradevelopment.com/els/assets/images/loading_bar.gif') 
						50% 50% 
						no-repeat;
		}
		.bootstrap-select .dropdown-toggle{
			height: 40px;
			margin-left: 10px;
		}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<div id="editcar" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Car</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submiteditcar')}}" id="submitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden" name="car_id" value="{{$data->car_id}}">
			<div class="row">
				<div class="col-md-6">
				  	 <div class="form-group">
				  	 	<label><span class="text-danger"></span>Enter Name</label>
						<input type="text" name="car_name" value="{{$data->car_name}}" required  class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
						<label><span class="text-danger"></span>Enter Model</label>
						<input type="number" class="form-control" id="car_model" required value="{{$data->car_model}}" name="car_model">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
				  	 	<label><span class="text-danger"></span>Enter Rent</label>
						<input type="number" name="car_rent" required value="{{$data->car_rent}}"  class="form-control">
					</div>
				</div>
				<div class="col-md-6">
			    	<div class="form-group">
						<label><span class="text-danger"></span>Select Vendor</label>
						<select class="form-control" name="vendor_id" value="{{$data->vendor_id}}"  required>
	            			<option selected="" disabled="" value="{{ old('vendor_id') }}">Select Vendor</option>
		       				@foreach($type as $types)
		            		<option @if ($types->vendor_id == $data->vendor_id ) {{"selected"}} @endif value={{$types->vendor_id}}>{{$types->vendor_name}}</option>
		        			@endforeach 
	            		</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label><span class="text-danger"></span>Enter Other Details</label>
						<textarea class="form-control" id="car_otherdetails" name="car_otherdetails" rows="4">{{$data->car_otherdetails}}</textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label><span class="text-danger"></span>Upload Car Picture</label>
						<input type="file" class="form-control" id="car_picture" name="car_picture">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="submit-section">
						<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</div>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>