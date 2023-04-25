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

<div id="editattendancerequest" class="modal fade" >
<div id="loader-ajax2"></div>
	<div class="modal-dialog modal-md">

		<div class="modal-content">
						
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

            <div class="modal-body">
				<h3 class="modal-title" align="center">Edit Attendance</h3><br>
			 <form action="{{ URL::to('/submitrequest')}}" id="submitattendancerequest" method="POST" >
			 
			 {{ csrf_field() }} 
			    <fieldset class="content-group">
			 		  <div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<input type="hidden"  name="hdnattid" value="{{$data->attendance_id}}" class="form-control" readonly >
									<label class="col-lg-6 text-bold">Batch Id:</label>
									<input type="number" id="batchid" name="batchid" value="{{$data->elsemployees_empid}}" class="form-control" readonly>
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Attendance:</label>
									<select id="attendacestatus" name="attendacestatus" class="form-control" required >
							<option value="" selected="" disabled="">Select</option>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                            <option value="OFF">OFF</option>
                            <option value="AL">AL</option>
                            <option value="SL">SL</option>
                             <option value="HD">Half Day</option>
                            </select>
								</div>
						    </div>
					
							
					</div>
					</fieldset>
					<div class="text-right">
							<button type="submit" id="btnsubmit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>

		</div>
	</div>	
</div>