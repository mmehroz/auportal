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
<div id="AddSalaries" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Salaries</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<br>
                <ul id="errors" class="list-unstyled" style="display : none">


                </ul>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/savepayrollSalaries')}}" id="frmAddSalaries" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<div class="form-group">
						<label>Name <span class="text-danger"></span></label>
						<input class="form-control" name="addname" id="name" value="{{--$req->elsemployees_name--}}" type="text" readonly="">
					</div> 
					<div class="form-group">
						<label>Batch ID <span class="text-danger"></span></label>
						<!-- <input class="form-control" name="addBatchId" id="addpayrollSalariesBatchId"   placeholder="Enter Batch Id" type="text"> -->
						<select name="addBatchId" id="batchid" class="form-control selectpicker" data-live-search="true">

							<option value="">Select Batch ID</option>
							@foreach ($result as $row)
							<option value="{{$row->elsemployees_batchid}}">{{$row->elsemployees_batchid}}-{{$row->elsemployees_name}}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Bank Account No <span class="text-danger"></span></label>
						<input class="form-control" name="addAccountno" id="addpayrollBankAccountNo" placeholder="Enter Bank Account No" type="text">
					</div> 
					<div class="form-group">
						<label>Salary <span class="text-danger"></span></label>
						<input class="form-control" name="addSalary" id="addpayrollSalaries" required   placeholder="Enter Salary" type="number">
					</div>
					<div class="form-group">
						<label>Provident Fund <span class="text-danger"></span></label>
						<input class="form-control" name="addFund" id="addpayrollFund"   placeholder="Enter Fund" type="number">
					</div>
					<div class="form-group">
						<label>Date <span class="text-danger"></span></label>
                    	<input type="date" id="addpayrollSalariesDate" name="addDate" class="form-control" placeholder="Enter Date" value="" required  />
					</div>
					<div class="form-group">
						<label>Salary Comments <span class="text-danger"></span></label>
						<textarea class="form-control" rows="3" name="addComment" required id="addpayrollSalariesComment"></textarea>
					</div> 
					<div class="submit-section">
						<button id="submit" class="btn btn-primary submit-btn">Add Salary</button>
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

 	$('#batchid').change(function(){
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
	 				$('#name').val('');
 				} else{
 					$('#name').val(data['elsemployees_name']);
 				}
 				
 			}
 		});
 	});
</script>