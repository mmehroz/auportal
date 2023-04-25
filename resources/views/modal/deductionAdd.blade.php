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

<!-- Add Department Modal -->
<div id="Adddeduction" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Deduction</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="{{ URL::to('/saveDeduction')}}" id="frmAdddeduction" method="POST"  enctype="multipart/form-data">
							{{ csrf_field() }} 
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name <span class="text-danger"></span></label>
										<input class="form-control" name="addname" id="addAdjustmentname" value="{{--$req->elsemployees_name--}}" type="text" readonly="">
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Batch ID <span class="text-danger"></span></label>
										<!-- <input class="form-control" name="addBatchId" id="addpayrollSalariesBatchId"   placeholder="Enter Batch Id" type="text"> -->
										<select name="addBatchId" id="addAdjustmentBatchId" class="form-control selectpicker" data-live-search="true" required>

											<option value="">Select Batch ID</option>
											@foreach ($result as $row)
											<option value="{{$row->elsemployees_batchid}}">{{$row->elsemployees_batchid}}-{{$row->elsemployees_name}}</option>
											@endforeach
										</select>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									
										<label>Bizz Fund <span class="text-danger"></span></label>
										<select name="bizzfund" id="bizzfund" class="form-control selectpicker" data-live-search="true" required>
											<option value="">Select</option>
											<option value="No">No</option>
											<option value="Yes">Yes</option>
										</select>
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Tax <span class="text-danger"></span></label>
										<input class="form-control" name="tax" id="tax"   placeholder="Tax" type="number">
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Loan Installment <span class="text-danger"></span></label>
										<input class="form-control" name="loan" id="loan"   placeholder="Loan Installment" type="number">
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Spiff Delivered <span class="text-danger"></span></label>
										<input class="form-control" name="spiff" id="spiff"   placeholder="Spiff Delivered" type="number">
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Advance Salary <span class="text-danger"></span></label>
										<input class="form-control" name="advance" id="advance"   placeholder="Advance Salary" type="number">
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Deduction Month <span class="text-danger"></span></label>
										<input class="form-control" name="month" id="month"   placeholder="Select Month" required type="month">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Comments: <span class="text-danger"></span></label>
										<textarea class="form-control" rows="3" name="addComment" id="addAdjustmentComment"></textarea>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note: You are allowed to submit employee deduction once in a month.  <span class="text-danger"></span></label>
									</div> 
								</div>
							</div>
									<div class="submit-section">
										<button id="submit" class="btn btn-primary submit-btn">Add Deduction</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Department Modal -->
<script type="text/javascript">
 	$(document).ready(function() {
		$('.selectpicker').selectpicker('refresh');
	});

 	$('#addAdjustmentBatchId').change(function(){
 		var batchid = $(this).val();
 		//alert('batchid '+ batchid);
 		var json = {};
 		json['batchid'] = batchid;
 		$.ajax({
 			url: "<?php echo url('/getemployeeDetail')?>",
 			data: json,
 			Type: "GET",
 			dataType: "json",
 			success: function(data){
 				//alert('Success '+data['elsemployees_email']);
 				if(data == null){
	 				$('#addAdjustmentname').val('');
 				} else{
 					$('#addAdjustmentname').val(data['elsemployees_name']);
 				}
 				
 			}
 		});
 	});
</script>