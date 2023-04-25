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

<!-- Add Designation Modal -->
<div id="editachieved" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Target Achieved</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submiteditachieved')}}" id="editsubmitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="hdnachivedid" value="{{$data->employeeachieved_id}}" class="form-control">
			<input type="hidden"  name="hdnredirecturl" value="{{$data->elsemployees_batchid}}~{{$data->employeeachieved_month}}" class="form-control">
					<div class="form-group">
						<label>Target Achieved<span class="text-danger"></span></label>
						<input class="form-control" name="achieved" value="{{$data->employeeachieved_achieved}}" required type="number">
					</div>
					<div class="submit-section">
						<button id="editbtnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>