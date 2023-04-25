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
	.row {
	    margin-top: -15px;
	}
</style>

<div id="requestedit" class="modal fade  custom-modal" >
	<div id="loader-ajax2"></div>
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{$data->elsemployees_name}} - {{$data->elsemployees_batchid}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <div class="modal-body">
				<form  action="{{ URL::to('/updateeditrequest')}}" id="submiteditleaverequest" method="POST" >
			 		{{ csrf_field() }} 
			    	<fieldset class="content-group">
			 			<div class="form-group">
							<input type="hidden"  name="empid" value="{{$data->elsleaverequests_empid}}" class="form-control" >
							<input type="hidden" name="elsreqid" id="elsreqid" value="{{$data->elsleaverequests_id}}" class="form-control"/>
							<div class="row" style="margin-top: -30px;">
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Remaining Sick:</label>
										<div class="col-lg-14">
											<input type="text" name="sick" class="form-control"  id="sick" value="{{$data->elsemployees_sickleaves}}" readonly >
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Remaining Annual:</label>
										<div class="col-lg-14">
											<input type="text" name="annual" class="form-control"  id="annual" value="{{$data->elsemployees_annualleaves}}"  readonly>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Date of Joining:</label>
										<div class="col-lg-14">
											<input type="Text"  name="dojoin" value="{{$data->elsemployees_dofjoining}}" class="form-control" readonly >
										</div>
									</div>
								</div>
						    </div>
							<div class="row">									
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Date of Submit:</label>
										<div class="col-lg-14">
											<input type="Text"  name="dosubmit" value="{{$data->elsleaverequests_leavesubmitdate}}" class="form-control" readonly >
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Start Date:</label>
										<div class="col-lg-14">
											<input type="date" id="datepicker_start" name="startDate"  pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" class="form-control" value="{{$data->elsleaverequests_leavestartdate}}">
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">End Date:</label>
										<div class="col-lg-14">
											<input type="date" id="datepicker_end" name="endDate"  pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" class="form-control" required  value="{{$data->elsleaverequests_leaveenddate}}">
										</div>
									</div>
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Total Days of leave:</label>
										<input id="totaldays"  name="totalDays"  placeholder="Automatically Count days" value="{{$data->elsleaverequests_totalleavedays}}"  name="totalDays"  class="form-control">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Leave Status</label>
										<input type="text" id="batchid"  name="leavestatus" style="font-size: 12px" value="{{$data->elsleaverequests_status}}" class="form-control" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Leave Type</label>
										<!-- @if($data->elsleaverequests_leavetypeid == 1)
										<input type="text" id="batchid" name="leaveType" value="Annual Leave" class="form-control">
										@elseif($data->elsleaverequests_leavetypeid == 2)
										<input type="text" id="batchid" name="leaveType"  value="Sick Leave" class="form-control">
										@else
										<input type="text" id="batchid" name="leaveType"  value="Unpaid Leave" class="form-control">
										@endif -->

										<select name="leaveType" id="leaveType" class="form-control" data-live-search="true">
											@if($data->elsleaverequests_leavetypeid == 1)
												<option value="1" selected="">Annual Leave</option>
												<option value="2">Sick Leave</option>
												<option value="3">Unpaid Leave</option>
											@elseif($data->elsleaverequests_leavetypeid == 2)
												<option value="2" selected="">Sick Leave</option>
												<option value="1">Annual Leave</option>
												<option value="3">Unpaid Leave</option>
											@else
												<option value="3" selected="">Unpaid Leave</option>
												<option value="1">Annual Leave</option>
												<option value="2">Sick Leave</option>
											@endif
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-form-label">User Reason</label>
										<div class="col-lg-14">
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Reason" id="comment"  name="comment" style="height: 55px"  readonly>{{$data->elsleaverequests_usercomment}}</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</fieldset>
					<div class="submit-section">
							<button type="submit" id="btnsubmit" class="btn btn-primary submit-btn"> Update <i class="icon-arrow-right14 position-right"></i></button>
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

        $("#datepicker_end").attr('max', bc);
		$("#datepicker_end").attr('min', $(this).val());
        $("#datepicker_end").val(bc);
}); 
	
	
</script>
