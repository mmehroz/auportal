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
<div id="addtarget" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Target</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="{{ URL::to('/submitaddtarget')}}" id="frmAdddeduction" method="POST"  enctype="multipart/form-data">
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
										<select name="batchid" id="addAdjustmentBatchId" class="form-control selectpicker" data-live-search="true" required>

											<option value="">Select Batch ID</option>
											@foreach ($result as $row)
											<option value="{{$row->elsemployees_batchid}}">{{$row->elsemployees_batchid}}-{{$row->elsemployees_name}}</option>
											@endforeach
										</select>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Type <span class="text-danger"></span></label>
										<select class="form-control" name="type" id="type" required>
											<option value="">Select Type</option>
											<option value="Revenue">Revenue</option>
											<option value="Sales">Sales</option>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Month <span class="text-danger"></span></label>
										<input class="form-control" name="month" id="month"   placeholder="Select Month" type="month" required>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Target <span class="text-danger"></span></label>
										<input class="form-control" name="target" id="target"   placeholder="Target" type="number" required>
									</div> 
								</div>
							</div>
							<div class="submit-section">
								<button id="submit" class="btn btn-primary submit-btn">Add Target</button>
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