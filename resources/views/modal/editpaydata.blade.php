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
<div id="editTask" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Deduction - {{$task->deductions_id}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/updatepaydata')}}" id="frmEditTask" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="id" value="{{$task->deductions_id}}" class="form-control">
					<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name <span class="text-danger"></span></label>
										<input class="form-control" name="addname" id="addAdjustmentname" value="{{$task->name}}"   placeholder="Enter Name" type="text">
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Batch ID <span class="text-danger"></span></label>
										<input class="form-control" name="addBatchId" id="addAdjustmentBatchId" value="{{$task->EMP_BADGE_ID}}"  placeholder="Enter Batch Id" type="text">
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Bizz Fund <span class="text-danger"></span></label>
										<input class="form-control" name="bizzfund" id="bizzfund" value="{{$task->deductions_bizzfund}}"  placeholder="Bizz Fund" type="number">
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Tax <span class="text-danger"></span></label>
										<input class="form-control" name="tax" id="tax" value="{{$task->deductions_tax}}"  placeholder="Tax" type="number">
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Loan Installment <span class="text-danger"></span></label>
										<input class="form-control" name="loan" id="loan" value="{{$task->deductions_loan}}"  placeholder="Loan Installment" type="number">
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Spiff Delivered <span class="text-danger"></span></label>
										<input class="form-control" name="spiff" id="spiff" value="{{$task->deductions_apiff}}"  placeholder="Spiff Delivered" type="number">
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Advance Salary <span class="text-danger"></span></label>
										<input class="form-control" name="advance" id="advance" value="{{$task->deductions_advance}}"  placeholder="Advance Salary" type="number">
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Deduction Month <span class="text-danger"></span></label>
										<input class="form-control" name="month" id="month" value="{{$task->deductions_month}}"  placeholder="Select Month" type="Month">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Comments: <span class="text-danger"></span></label>
										<textarea class="form-control" rows="3" name="addComment" id="addAdjustmentComment">{{$task->deductions_comment}}</textarea>
									</div> 
								</div>
							</div>
					<div class="submit-section">
						<!-- <button type="button" data-task="{{$task->deductions_id}}" id="btnDelete"  data-dismiss="modal"
						aria-hidden="true"  class="btn btn-danger submit-btn">Delete</button> -->
						<button type="submit" class="btn btn-primary submit-btn">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Department Modal -->