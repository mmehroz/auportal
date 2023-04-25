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
</style>
<div id="editproduct" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Product</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submiteditproduct')}}" id="editsubmitproduct" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="hdnproductid" value="{{$data->product_id}}" class="form-control">
			<input type="hidden"  name="hdnrestaurantid" value="{{$data->restaurant_id}}" class="form-control">
					<div class="form-group">
						<label>Name<span class="text-danger"></span></label>
						<input class="form-control" name="name" value="{{$data->product_name}}" required type="text">
					</div>
					<div class="form-group">
					<label>Amount<span class="text-danger"></span></label>
                        <input class="form-control" name="amount" value="{{$data->product_price}}" required type="text">
                    </div>
                    <div class="form-group">
						<label>Unit<span class="text-danger"></span></label>
						<input class="form-control" name="unit" value="{{$data->product_unit}}" required type="text">
					</div>
					<div class="form-group">
					<label>Quantity<span class="text-danger"></span></label>
                        <input class="form-control" name="quantity" value="{{$data->product_quantity}}" required type="text">
                    </div>
                     <div class="form-group">
						<label>Image<span class="text-danger"></span></label>
						<input class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg,image/*" type="file">
					</div>
					<div class="submit-section">
						<button id="editbtnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>