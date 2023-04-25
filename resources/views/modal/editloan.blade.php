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
<div id="editloan" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Loan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<br>
                <ul id="errors" class="list-unstyled" style="display : none">
				</ul>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submiteditloan')}}" id="frmAddSalaries" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden" name="hdn_loan_id" value="{{$data->loan_id}}">
					<div class="form-group">
						<label>Total Amount <span class="text-danger"></span></label>
						<input class="form-control" name="loan_amount" id="loan_amount" type="number" value="{{$data->loan_amount}}" required>
					</div>
					<div class="form-group">
						<label>Paid Amount <span class="text-danger"></span></label>
						<input class="form-control" name="loan_paid" id="loan_paid" type="number" value="{{$data->loan_paid}}" required>
					</div> 
					<div class="form-group">
						<label>Remaining Instalments <span class="text-danger"></span></label>
						<input class="form-control" name="loan_instalments" id="loan_instalments" type="number" value="{{$data->loan_instalments}}" required>
					</div>
					<div class="submit-section">
						<button id="submit" class="btn btn-primary submit-btn">Update</button>
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