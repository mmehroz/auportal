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
<div id="addproduct" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Product</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submitaddproduct')}}" id="submitproduct" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<input type="hidden" name="restaurantid" value="{{$data->restaurant_id}}">
					<div class="form-group">
						<label>Restaurant Name<span class="text-danger"></span></label>
						<input class="form-control" name="restaurantname" value="{{$data->restaurant_name}}" type="text" required readonly>
					</div>
					<div class="form-group">
						<label>Name<span class="text-danger"></span></label>
						<input class="form-control" name="name" type="text" required>
					</div>
					<div class="form-group">
						<label>Amount<span class="text-danger"></span></label>
						<input class="form-control" name="amount" type="number" required>
                    </div>
                    <div class="form-group">
						<label>Unit<span class="text-danger"></span></label>
						<select class="form-control" name="unit" required>
							<option value="">Select Unit</option>
							<option value="Kg">Kg</option>
							<option value="piece">Piece</option>
						</select>
					</div>
					<div class="form-group">
						<label>Quantity<span class="text-danger"></span></label>
						<input class="form-control" name="quantity" type="quantity" required>
                    </div>
                    	<label>Image<span class="text-danger"></span></label>
						<input class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg,image/*" type="file" required><br>
					<div class="submit-section">
						<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>