<style>
	.modal-dialog{

	}
.custom-modal .modal-content {
    border: 0;
    border-radius: 10px;
    width: 1048px;
}
.titleinput,.amountinput{
	width: 143px;
    height: 35px;
}
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<div id="addmorebalance" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" style="display: flex;
    justify-content: center;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add More Balance</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submitaddmorebalance')}}" id="submitbalance" method="POST"  enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="expenseopening_month" value="{{$yearandmonth}}">
				<input type="hidden" name="expense_id" value="{{$expense_id}}">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<label>Enter Title</label>
								<input class="form-control" name="expenseopening_moretitle" type="text" required>
								<label>Enter Amount</label>
								<input class="form-control" name="expenseopening_morebalance" type="number" required>
								<div class="submit-section">
									<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</div>
						</div>
					</div>
			</form>
			</div>
		</div>
	</div>
</div>