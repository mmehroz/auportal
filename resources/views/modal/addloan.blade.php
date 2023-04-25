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
<div id="addloan" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Loan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<br>
                <ul id="errors" class="list-unstyled" style="display : none">
				</ul>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submitloan')}}" id="frmAddSalaries" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<div class="form-group">
						<label>Name <span class="text-danger"></span></label>
						<input class="form-control" name="name" id="name" value="{{--$req->elsemployees_name--}}" type="text" readonly="">
					</div> 
					<div class="form-group">
						<label>Batch ID <span class="text-danger"></span></label>
						<!-- <input class="form-control" name="addBatchId" id="addpayrollSalariesBatchId"   placeholder="Enter Batch Id" type="text"> -->
						<select name="batchid" id="batchid" class="form-control selectpicker" data-live-search="true" required>

							<option value="">Select Batch ID</option>
							@foreach ($result as $row)
							<option value="{{$row->elsemployees_batchid}}">{{$row->elsemployees_batchid}}-{{$row->elsemployees_name}}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Loan Amount <span class="text-danger"></span></label>
						<input class="form-control" name="loanamount" id="loanamount" type="number" required>
					</div> 
					<div class="form-group">
						<label>No. Of Instalments <span class="text-danger"></span></label>
						<input class="form-control" name="installment" id="installment" type="number" required>
					</div>
					<div class="form-group">
						<label>Loan Reason <span class="text-danger"></span></label>
						<textarea class="form-control" rows="3" name="loanreason" id="loanreason" required></textarea>
					</div> 
					<div class="submit-section">
						<button id="submit" class="btn btn-primary submit-btn">Add Loan</button>
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