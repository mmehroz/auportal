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

<div id="addleaverequest" class="modal fade custom-modal" >
<div id="loader-ajax2"></div>
	<div class="modal-dialog modal-md">

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Request</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <div class="modal-body">
			 <form action="{{ URL::to('/submitrequest')}}" id="submitleaverequest" method="POST" >
			 
			 {{ csrf_field() }} 
			    <fieldset class="content-group">
			 		  <div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<input type="hidden"  name="empid" value="{{session()->get('id')}}" class="form-control" readonly >
									<label class="col-form-label">Batch Id:</label>
									<input type="number" id="batchid" name="batchid" value="{{$req->elsemployees_batchid}}" class="form-control" readonly>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Name:</label>
									<input type="text" id="name" name="name" value="{{$req->elsemployees_name}}" class="form-control" readonly>
								</div>
						    </div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Remaining Sick:</label>
											<div class="col-lg-14">
											<input type="text" name="sick" class="form-control"  id="sick" value="{{$req->elsemployees_sickleaves}}" readonly >
											</div>
									</div>
								 </div>
								<div class="col-sm-6">
									<div class="form-group">
									<label class="col-form-label">Remaining Annual:</label>
									<div class="col-lg-14">
										<input type="text" name="annual" class="form-control"  id="annual" value="{{$req->elsemployees_annualleaves}}"  readonly>
									</div>
									</div>
								</div>
						    </div>
						
						<input type="hidden"  name="dojoin" value="{{$req->elsemployees_dofjoining}}" class="form-control" readonly >
						<?php
							$exp = explode('~', $date);
						?>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-form-label">Start Date:</label>
											<div class="col-lg-14">
											<input type="date" id="datepicker_start" name="startDate" value="{{$exp[0]}}" class="form-control fromdate" required readonly>
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="col-form-label">End Date:</label>
									<div class="col-lg-14">
										<input type="date" id="datepicker_end" name="endDate" value="{{$exp[0]}}" class="form-control todate" required readonly>
									</div>
									</div>
								</div>
						    </div>

							<?php
							$date = $req->elsemployees_dofjoining;
							$date = strtotime(date("Y-m-d", strtotime($date)) . " +12 month");
							$date = date("Y-m-d",$date);
							?>
							
							<div class="row">
								<div class="col-md-6 leaveStyle form-horizontal">
									<p class="text-bold">Leave Type:</p>
										 	@if($exp[0] <  $date)
										 		<label class="btn btn-warning" style="width :260px; margin-left:-10px;">
													<input type="radio" id="mar_unpaidType" value="3"  class="mar_LType" name="leaveType" required >&nbsp;Correction Request
												</label>
											@else
								    			<label class="btn btn-primary" style="width :260px; margin-left:-10px;" >
													<input type="radio" id="mar_annualType" value="1" checked="checked" class="mar_LType" name="leaveType" required >&nbsp;Annual Leave
												</label>
												 <br />
												<label class="btn bg-success" style="width :260px; margin-left:-10px;">
													<input type="radio" id="mar_sickType"   value="2" class="mar_LType" name="leaveType" required >&nbsp;Sick Leave&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												</label>
												<br />
												@if($exp[1] <= 1)
												<label class="btn btn-warning" style="width :260px; margin-left:-10px;">
													<input type="radio" id="mar_unpaidType" value="3"  class="mar_LType" name="leaveType" required >&nbsp;Correction Request
												</label>
												@endif
											@endif
							    </div>
								
								
								<div class="col-lg-6">
									<div class="form-group">
									<label class="col-form-label">Total Days of leave:</label>
									<div class="col-lg-14">
												<input id="totaldays"  name="totalDays"  placeholder="Automatically Count days" value="1"  class="form-control" readonly >
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
							<button id="btnsubmit" type="submit" class="btn btn-primary submit-btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>

		</div>
	</div>	
</div>


<script type="text/javascript">
	 
$("#datepicker_end").on("change",function (){
	
var date1 = new Date($("#datepicker_start").val());
var date2 = new Date($(this).val());
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1 ; 

$('#totaldays').val(diffDays);

});
	
$("#datepicker_start").on("change",function (){
    var d = new Date($(this).val());
      var show = d.setDate(d.getDate() + 9);
      var dc = new Date(show);       
        var day = dc.getDate();
        var month = dc.getMonth() + 1;
        var year = dc.getFullYear();
    
        if (month < 10) {
            month = "0" + month;
        }
        if (day < 10) {
          day = "0" + day;
        }
        var bc = year + "-" + month  + "-" + day;
		
		$('#totaldays').val(10);
        $("#datepicker_end").attr('max', bc);
		$("#datepicker_end").attr('min', $(this).val());
        $("#datepicker_end").val(bc);
}); 
	
	// $('#modals').on('submit','#submitleaverequest',function(e){
 //                    e.preventDefault();
 //                    $("#btnsubmit").attr("disabled", true);
 //                    var frmData = $(this).serialize();
                 
 //                    $.ajax({
 //                        url:'{{ URL::to("/submitrequest")}}',
 //                        type:'POST',
 //                        data: frmData,
 //                        dataType: 'json',
 //                        success : function (data){
	// 						// console.log(data.no);
 //                            $("#loader").hide();
 //                            $(".modal-body").append('<p class="alert alert-success">'+(data.no)+ '</p>');
 //                         // $("#errors").addClass("alert-success").text('Task added successfully...!');
                            
 //                            setTimeout(function(){$("#addleaverequest").modal('hide');
	// 						window.location = "{{ URL::to('/dailyattendance')}}";
	// 									  }, 1000);
        
 //                         },
 //                         error : function(error){
 //                            console.log(error);
 //                            // $("#loader").hide();
 //                            var error = error.responseJSON;
 //                            $("#modals #errors").empty();
 //                            $(".modal-body").append('<p class="alert alert-danger">Oops Somenthing went wrong</p>');
                            
 //                            setTimeout(function(){$("#addleaverequest").modal('hide');
	// 						window.location = "{{ URL::to('/dailyattendance')}}";
 //                                             }, 1000);
 //                         }
 //                    })
 //                });
</script>