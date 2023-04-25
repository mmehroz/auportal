
<div id="view_inprocess" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Process of {{ $data->jobapplicant_name }} 's Application </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ URL::to('/submicallfiorawait')}}" id="frmeditcand" method="post" >
								
								{{csrf_field()}}
								<input type="hidden" name="editempid" value="{{ $data->jobapplicant_id }}" />
								
								
								
								<div id="message"></div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="col-form-label">Manager Comment</label>
												<textarea rows="4" cols="5" class="form-control" name="managercomment"  readonly >{{ $data->jobapplicant_mngrComment }}</textarea>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label class="radio-inline">
													<input type="radio" name="optradio" value="callforinterview" >Call For Interview
												</label>&nbsp;&nbsp;&nbsp;&nbsp;
												<label class="radio-inline">
													<input type="radio" name="optradio" value="awaiting" checked>Awaiting
												</label>
												<!-- <label for="called_for_interview" > Choose Action</label>
												<select class="form-control selectpicker" data-live-search="true" id="called_for_interview" name=""  required >
													<option value="" selected="" disabled="">Select</option>
													<option value="Call For Interview">Call For Interview</option>
													<option value="Awaiting">Awaiting</option>
						                	    </select> -->
											</div>
										</div>
										
										<div class="col-sm-6 select_dt_div">
											<div class="form-group">
												<label class="col-form-label" for="datetimepicker-default">Interview Date & Time</label>
												<input class="form-control" type="text" name="interTime"  id="datetimepicker1" required  />
											</div>
										</div>
										<div class="col-sm-6">
										<ul id="errors" class="list-unstyled" style="display : none">

										</ul>
										</div>
										
										<div class="submit-section">
										    <button class="btn btn-primary submit-btn">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
		</div>



<script type="text/javascript">

	
	$('#datetimepicker1').datetimepicker();

</script>