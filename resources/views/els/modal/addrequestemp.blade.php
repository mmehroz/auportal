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

<div id="addleaverequest" class="modal fade  custom-modal" >
<div id="loader-ajax2"></div>
	<div class="modal-dialog modal-md">

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Employee Request</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <div class="modal-body">
			 <form action="{{ URL::to('/submitrequestemp')}}" id="submitleaverequest_emp" method="POST" >
			 
			 {{ csrf_field() }} 
			    <fieldset class="content-group">
			 		  <div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<input type="hidden"  name="empid" id="empid" value="" class="form-control" readonly >
									<label class="col-form-label">Batch Id:</label>
									<!-- <input type="number" id="batchid" name="batchid" value="{{--$req->elsemployees_batchid--}}" class="form-control" readonly> -->
									<select name="batchid" id="batchid" class="form-control selectpicker" data-live-search="true">

										<option value="">Select Batch ID</option>
										@foreach ($result as $row)
										<option value="{{$row->elsemployees_batchid}}">{{$row->elsemployees_batchid}}-{{$row->elsemployees_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-lg-6">
									<label class="col-form-label">Name:</label>
									<input type="text" id="name" name="name" value="{{--$req->elsemployees_name--}}" class="form-control" readonly>
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-form-label">Remaining Sick:</label>
											<div class="col-lg-14">
											<input type="text" name="sick" class="form-control"  id="sick" value="{{--$req->elsemployees_sickleaves--}}" readonly >
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="col-form-label">Remaining Annual:</label>
									<div class="col-lg-14">
										<input type="text" name="annual" class="form-control"  id="annual" value="{{--$req->elsemployees_annualleaves--}}"  readonly>
									</div>
									</div>
								</div>
						    </div>
						
						<input type="hidden"  name="dojoin" id="dojoin" value="{{--$req->elsemployees_dofjoining--}}" class="form-control" readonly >
						
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-form-label">Start Date:</label>
											<div class="col-lg-14">
											<input type="date" id="datepicker_start" name="startDate"  pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" class="form-control fromdate" required>
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="col-form-label">End Date:</label>
									<div class="col-lg-14">
										<!-- <input type="date" id="datepicker_end" name="endDate"  pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" class="form-control todate" required  min=<?php //echo date('Y-m-d',strtotime("-10 days")); ?>  max=""> -->
												<input type="date" id="datepicker_end" name="endDate"  pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" class="form-control todate" required>
									</div>
									</div>
								</div>
						    </div>

							
							
							<div class="row">
								<div class="col-md-6 leaveStyle form-horizontal">
									<p class="text-bold">Leave Type:</p>
										 
								    			<label class="btn btn-primary" style="width :260px; margin-left:-10px;" >
													<input type="radio" id="mar_annualType" value="1" checked="checked" class="mar_LType" name="leaveType" >&nbsp;Annual Leave
												</label>
												 <br />
												<label class="btn bg-success" style="width :260px; margin-left:-10px;">
													<input type="radio" id="mar_sickType"   value="2" class="mar_LType" name="leaveType" >&nbsp;Sick Leave&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												</label>
												 <br />
												<label class="btn btn-info" style="width :260px; margin-left:-10px;">
													<input type="radio" id="mar_unpaidType" value="3"  class="mar_LType" name="leaveType" >&nbsp;Unpaid Leave
												</label>

							    </div>
								
								
								<div class="col-lg-6">
									<div class="form-group">
									<label class="col-form-label">Total Days of leave:</label>
									<div class="col-lg-14">
												<input id="totaldays"  name="totalDays"  placeholder="Automatically Count days"  class="form-control" readonly >
									</div>
									</div>
								</div>
								
								
								<div class="col-lg-12">
								
								<div class="form-group">
										<label class="col-form-label">Reason</label>
											<div class="col-lg-14">
												<textarea rows="3" cols="3" class="form-control" placeholder="Enter Reason" id="comment"  name="comment" style="height: 125px" required ></textarea>
											</div>
										</div>
								</div>
						    </div>
					</div>
					</fieldset>
					<div class="submit-section">
							<button type="submit" id="btnsubmit" class="btn btn-primary submit-btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>

		</div>
	</div>	
</div>


<script>
 	
 	//New Script

 	//Load SelectPicker
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
 					$('#empid').val('');
	 				$('#name').val('');
	 				$('#sick').val('');
	 				$('#annual').val('');
	 				$('#dojoin').val('');
 				} else{
 					$('#empid').val(data['elsemployees_empid']);
 					$('#name').val(data['elsemployees_name']);
 					$('#sick').val(data['elsemployees_sickleaves']);
 					$('#annual').val(data['elsemployees_annualleaves']);
 					$('#dojoin').val(data['elsemployees_dofjoining']);
 				}
 				
 			}
 		});
 	});
 	//End Script
	 
	$("#datepicker_end").on("change",function (){
		
    var date1 = new Date($("#datepicker_start").val());
	var date2 = new Date($(this).val());
	var timeDiff = Math.abs(date2.getTime() - date1.getTime());
	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1 ; 
	
	
	$('#totaldays').val(diffDays);
	
	});
	
	
	
	
	// $("#datepicker_start").on("change",function (){


 //        var d = new Date($(this).val());

 //          var show = d.setDate(d.getDate() + 9);

 //          var dc = new Date(show);
            
 //            var day = dc.getDate();
 //            var month = dc.getMonth() + 1;
 //            var year = dc.getFullYear();
        
 //            if (month < 10) {
 //                month = "0" + month;
 //            }

 //            if (day < 10) {
 //              day = "0" + day;
 //            }
 //            var bc = year + "-" + month  + "-" + day;
            
 //            $("#datepicker_end").attr('max', bc);
	// 		$("#datepicker_end").attr('min', $(this).val());

 //            $("#datepicker_end").val(bc);
						

 //          }); 
	
	
	
	
</script>