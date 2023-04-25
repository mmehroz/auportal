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
<div id="editinventory" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Inventory</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submiteditinventory')}}" id="submitinventory" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden" name="itinventory_id" value="{{$data->itinventory_id}}">
			<div class="row">
				<div class="col-md-6">
			    	<div class="form-group">
						<label><span class="text-danger"></span>Select Vendor</label>
						<select class="form-control" name="vendor_id"  required>
	            			@foreach($vendor as $vendors)
		            		<option @if($data->vendor_id == $vendors->vendor_id) {{"selected"}} @endif value={{$vendors->vendor_id}}>{{$vendors->vendor_name}}</option>
		        			@endforeach 
	            		</select>
					</div>
				</div>
				<div class="col-md-6">
			    	<div class="form-group">
						<label><span class="text-danger"></span>Select Inventory Type</label>
						<select class="form-control" name="itinventory_type"  required>
	            			<option @if($data->itinventory_type == "New") {{"selected"}} @endif value="New">New</option>
	            			<option @if($data->itinventory_type == "Use") {{"selected"}} @endif value="Use">Use</option>
		       			</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				  	 <div class="form-group">
				  	 	<label><span class="text-danger"></span>Enter Product Name</label>
						<input type="text" name="itinventory_name" value="{{$data->itinventory_name}}" required  class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
						<label><span class="text-danger"></span>Enter Quantity</label>
						<input type="number" class="form-control" id="itinventory_qty" name="itinventory_qty" value="{{$data->itinventory_qty}}" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				    <div class="form-group">
						<label><span class="text-danger"></span>Enter Description</label>
						<textarea class="form-control" id="itinventory_description" name="itinventory_description" required rows="4">{{$data->itinventory_description}}</textarea>
					</div>
				</div>
			</div>
			<div class="submit-section">
				<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>