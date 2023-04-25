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

<div id="requestview" class="modal fade  custom-modal" >
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
				<form  id="submitleaverequest" method="POST" >
			 		{{ csrf_field() }} 
			    	<fieldset class="content-group">
			 			<div class="form-group">
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
											<input type="Text"  name="dojoin" value="{{$data->elsleaverequests_leavesubmitdate}}" class="form-control" readonly >
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Start Date:</label>
										<div class="col-lg-14">
											<input type="Text" id="datepicker_start"   pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" class="form-control" value="{{$data->elsleaverequests_leavestartdate}}" readonly>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">End Date:</label>
										<div class="col-lg-14">
											<input type="Text" id="datepicker_end"   pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" class="form-control" required  value="{{$data->elsleaverequests_leaveenddate}}" readonly>
										</div>
									</div>
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Total Days of leave:</label>
										<input id="totaldays"  name="totalDays"  placeholder="Automatically Count days" value="{{$data->elsleaverequests_totalleavedays}}"  class="form-control" readonly >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Leave Status</label>
										<input type="text" id="batchid" style="font-size: 12px" value="{{$data->elsleaverequests_status}}" class="form-control" readonly>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-form-label">Leave Type</label>
										@if($data->elsleaverequests_leavetypeid == 1)
										<input type="text" id="batchid"  value="Annual Leave" class="form-control" readonly>@elseif($data->elsleaverequests_leavetypeid == 2)
										<input type="text" id="batchid"  value="Sick Leave" class="form-control" readonly>
										@else
										<input type="text" id="batchid"  value="Unpaid Leave" class="form-control" readonly>
										@endif
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
							<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
										<label class="col-form-label">Approver Name</label>
										<div class="col-lg-14">
										<?php
										$approvername = DB::connection('mysql')->table('elsemployees')
										->where('elsemployees.elsemployees_empid','=',$data->elsleaverequests_approverempid)
										->select('elsemployees.elsemployees_name')
										->first();
										
										$getappname;
										if($approvername != null){
											$getappname = $approvername->elsemployees_name;
										}else{
											$getappname = "Not Available";
										}
										//dd($getappname);
										?>
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Reason" id="comment"  name="comment" style="height: 55px" readonly ><?php print_r($getappname)?></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label class="col-form-label">Approver Status</label>
										<div class="col-lg-14">
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Status" id="comment"  name="comment" style="height: 55px" readonly >{{$data->elsleaverequests_managerstatus}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-form-label">Approver Comment</label>
										<div class="col-lg-14">
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Reason" id="comment"  name="comment" style="height: 55px" readonly >{{$data->elsleaverequests_approvercomment}}</textarea>
										</div>
									</div>
								</div>
					    	</div>
					    	<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
										<label class="col-form-label">COO Name</label>
										<div class="col-lg-14">
										<?php
										$Cooname = DB::connection('mysql')->table('elsemployees')
										->where('elsemployees.elsemployees_empid','=',$data->elsleaverequests_cooempid)
										->select('elsemployees.elsemployees_name')
										->first();
										
										$getcooname;
										if($Cooname != null){
											$getcooname = $Cooname->elsemployees_name;
										}else{
											$getcooname = "Not Available";
										}
										//dd($getappname);
										?>
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Reason" id="comment"  name="comment" style="height: 55px" readonly ><?php print_r($getcooname)?></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label class="col-form-label">COO Status</label>
										<div class="col-lg-14">
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Status" id="comment"  name="comment" style="height: 55px" readonly >{{$data->elsleaverequests_coostatus}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-form-label">COO Comment</label>
										<div class="col-lg-14">
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Reason" id="comment"  name="comment" style="height: 55px" readonly >{{$data->elsleaverequests_coocomment}}</textarea>
										</div>
									</div>
								</div>
					    	</div>
							<div class="row" style="margin-bottom: -40px;">
									<div class="col-lg-3">
									<div class="form-group">
										<label class="col-form-label">HR Name</label>
										<div class="col-lg-14">
											<?php
										$hrname = DB::connection('mysql')->table('elsemployees')
										->where('elsemployees.elsemployees_empid','=',$data->elsleaverequests_hrempid)
										->select('elsemployees.elsemployees_name')
										->first();
												$gethrname;
										if($hrname != null){
											$gethrname = $hrname->elsemployees_name;
										}else{
											$gethrname = "Not Available";
										}
										//dd($gethrname);
										?>
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Reason" id="comment"  name="comment" style="height: 55px" readonly ><?php print_r($gethrname)?></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label class="col-form-label">HR Status</label>
										<div class="col-lg-14">
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Status" id="comment"  name="comment" style="height: 55px" readonly >{{$data->elsleaverequests_hrstatus}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-form-label">HR Comment</label>
										<div class="col-lg-14">
											<textarea rows="1" cols="1" class="form-control" placeholder="Enter Reason" id="comment"  name="comment" style="height: 55px" readonly >{{$data->elsleaverequests_hrcomment}}</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</fieldset>
					<div class="text-right">		
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>
