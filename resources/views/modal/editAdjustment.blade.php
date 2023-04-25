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
<div id="editAdjustment" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Earning - {{$task->id}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/updateAdjustment')}}" id="frmEditAdjustment" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="id" value="{{$task->id}}" class="form-control">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Name <span class="text-danger"></span></label>
						<input class="form-control" id="editname" name=editname value="{{$task->name}}" type="text" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Badge Id <span class="text-danger"></span></label>
						<input class="form-control" id="editStart_time" name="editBatchId" value="{{$task->EMP_BADGE_ID}}" type="text" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Referral Bonus <span class="text-danger"></span></label>
						<input class="form-control" id="editAdjustment" name="editAdjustmentAmount" value="{{$task->adjustment}}" type="text" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Target Incentive <span class="text-danger"></span></label>
						<input class="form-control" id="incamount" name="incamount" value="{{$task->incentiveamount}}" type="text" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Total Spiff <span class="text-danger"></span></label>
						<input class="form-control" id="spiffamount" name="spiffamount" value="{{$task->spiffamount}}" type="text" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Other Allowance <span class="text-danger"></span></label>
						<input class="form-control" id="otheramount" name="otheramount" value="{{$task->otheramount}}" type="text" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Last / Advance <span class="text-danger"></span></label>
						<input class="form-control" id="lastamount" name="lastamount" value="{{$task->lastamount}}" type="text" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Earning Month <span class="text-danger"></span></label>
						<input class="form-control" id="editAdjustmentDate" name="editDate" value="{{$task->AdjMonth}}" type="Month" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Commment <span class="text-danger"></span></label>
                    	<textarea class="form-control" rows="3" name="editComment" id="editAdjustmentComment">{{$task->AdjComment}}</textarea required>
					</div>
				</div>
			</div>
					<div class="submit-section">
						<!-- <button type="button" data-task="{{$task->id}}" id="btnDelete"  data-dismiss="modal"
						aria-hidden="true"  class="btn btn-danger submit-btn">Delete</button> -->
						<button type="submit" class="btn btn-primary submit-btn">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Department Modal -->