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
<div id="editexpense" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Expense</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submiteditrecuringexpense')}}" id="submitexpense" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
					<input type="hidden" name="expense_id" value="{{$data->expense_id}}">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Title<span class="text-danger"></span></label>
								<input class="form-control" name="expense_title" type="text" value="{{$data->expense_title}}" required>
							</div> 
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Amount<span class="text-danger"></span></label>
								<input class="form-control" name="expense_amount" type="number" value="{{$data->expense_amount}}" required>
							</div> 
						</div>
					</div>
					<input type="hidden" name="expense_yearandmonth" value="{{$data->expense_yearandmonth}}">
					<div class="form-group">
						<label>Comment<span class="text-danger"></span></label>
							<textarea name="expense_comment" class="form-control" type="text" rows="2">{{$data->expense_comment}}</textarea>
					</div>
					<div class="submit-section">
						<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.selectpicker').selectpicker('refresh');
	});		
</script>