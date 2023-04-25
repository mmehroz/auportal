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
<div id="editSalaries" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Record - {{$task->S_id}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/SalariesUpdate')}}" id="frmEditSalaries" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="id" value="{{$task->S_id}}" class="form-control">
					<div class="form-group">
						<label>Name <span class="text-danger"></span></label>
						<input class="form-control" id="editname" name=Name value="{{$task->Name}}" type="text">
					</div>
					<div class="form-group">
						<label>Batch ID <span class="text-danger"></span></label>
						<input class="form-control" id="editBatchid" name="Batchid" value="{{$task->EMP_BADGE_ID}}" type="text" >
					</div>
					<div class="form-group">
						<label>Bank Account no <span class="text-danger"></span></label>
						<input class="form-control" id="editBankAccountNo" name="BankAccountNo" value="{{$task->BankAccountNo}}" type="text">
					</div>
					<div class="form-group">
						<label>Salary <span class="text-danger"></span></label>
						<input class="form-control" id="editSalary" name="Salary" value="{{$task->Salary}}" type="number">
					</div>
					<div class="form-group">
						<label>Provident Fund <span class="text-danger"></span></label>
						<input class="form-control" id="editFund" name="Fund" value="{{$task->fund}}" type="number">
					</div>
					<div class="form-group">
						<label>Salary Comment <span class="text-danger"></span></label>
						<input class="form-control" id="editSalaryComment" name="SalaryComment" value="{{$task->Salary_Comment}}" type="text">
					</div>
					<div class="form-group">
						<label>Date <span class="text-danger"></span></label>
						<input class="form-control" id="editDate" name="Date" value="{{$task->Date}}" type="date">
					</div>
					<div class="submit-section">
						<!-- <button type="button" data-task="{{$task->S_id}}" id="btnDelete"  data-dismiss="modal"
						aria-hidden="true"  class="btn btn-danger submit-btn">Close</button> -->
						<button type="submit" class="btn btn-primary submit-btn">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Department Modal -->