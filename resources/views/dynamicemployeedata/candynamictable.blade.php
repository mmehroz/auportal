
<center>
<div class="row">
	<div class="col-md-4">
		{{ $data->links() }}
	</div>
</div>
</center>
		
<!-- Candidates Tab -->
<div class="tab-pane show active">
	<!-- Candidates List Table -->
	<div class="payroll-table card">
		<div class="row">
			<div class="col-md-12">
			@foreach ($data as $val)
					<div class="row staff-grid-row">
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-6" style="float: left;">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="{{ URL::to('/modalemployeeview/')}}/{{$val->jobapplicant_id}}" title="Click To View Application Form" target="_blank" " class="avatar">
										<img src="{{URL::to('public/img/')}}/{{$val->jobapplicant_picture}}">
									</a>
								</div>
								<!-- <div class="dropdown profile-action">
									<a href="#" class="fa fa-ellipsis-v dropdown-toggle" title="View Details" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">
											<select class="form-control" id="mySelect" onchange="getedit(this.value)">
												<option selected="" disabled=""  value="">New</option>
												<option value="candidatelist~{{$val->jobapplicant_id}}">Candidate List</option>
												<option value="Screening~{{$val->jobapplicant_id}}">Screening</option>
												<option value="inexperience~{{$val->jobapplicant_id}}">Inexperience</option>
												<option value="Irrelevent~{{$val->jobapplicant_id}}">Irrelevant</option>
											</select>
									</div>
								</div> -->
								<h3 class="user-name m-t-10 mb-0 text-ellipsis" style="margin-bottom:2%!important;">{{$val->jobapplicant_name}}</h3>

                                <div class="row" style="display: flex!important; margin-top: 4%; margin-left: -2%">
                                	<div class="col-md-8 col-sm-8 col-8 col-lg-8 col-xl-8">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>Position Applied For:</b> {{$val->jobapplicant_postionapppliedform}}
										</div>
									</div>
	                            	<div class="col-md-4 col-sm-4 col-4 col-lg-4 col-xl-4">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											 <b>Gender:</b> {{$val->jobapplicant_gender}}
										</div>
									</div>
								</div>

								<div class="row" style="display: flex!important; margin-left: -2%">
                                	<div class="col-md-8 col-sm-8 col-8 col-lg-8 col-xl-8">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>Department:</b> -
										</div>
									</div>
	                            	<div class="col-md-4 col-sm-4 col-4 col-lg-4 col-xl-4">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>Current Salary:</b> {{$val->jobapplicant_currentsalary}}
										</div>
									</div>
								</div>

								<div class="row" style="display: flex!important; margin-left: -2%">
                                	<div class="col-md-8 col-sm-8 col-8 col-lg-8 col-xl-8">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>Comfortable in Night?:</b> {{$val->jobapplicant_nightshift}}
										</div>
									</div>
	                            	<div class="col-md-4 col-sm-4 col-4 col-lg-4 col-xl-4">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>Expected Salary:</b> {{$val->jobapplicant_monthlyexpectedsalary}}
										</div>
									</div>
								</div>

								<div class="row" style="display: flex!important; margin-left: -2%">
                                	<div class="col-md-8 col-sm-8 col-8 col-lg-8 col-xl-8">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>Career Level:</b> @if($val->jobapplicant_careerlevel == "stusclcol" ) Student (School/College)
		                                                            @elseif( $val->jobapplicant_careerlevel == "undgra" ) Student (Undergrad./Grad.)
		                                                            @elseif( $val->jobapplicant_careerlevel == "entlev" ) Entry Level
		                                                            @elseif( $val->jobapplicant_careerlevel == "expnomana" ) Experienced (Non-Managerial)
		                                                            @elseif( $val->jobapplicant_careerlevel == "manasup" ) Manager/Supervisor
		                                                            @elseif( $val->jobapplicant_careerlevel == "hod" ) Head of Department
		                                                            @elseif( $val->jobapplicant_careerlevel == "srexe" ) Sr. Executive (CEO/President)  
		                                                            @endif
		                                </div>
		                            </div>
	                            	<div class="col-md-4 col-sm-4 col-4 col-lg-4 col-xl-4">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>Contact#:</b> {{$val->jobapplicant_contact}}
										</div>
									</div>
								</div>

								<div class="row" style="display: flex!important; margin-left: -2%">
                                	<div class="col-md-12 col-sm-12 col-12 col-lg-12 col-xl-12">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>Education:</b> {{$val->jobapplicant_edu_cerdeg}}
										</div>
									</div>
								</div>
								<div class="row" style="display: flex!important; margin-left: -2%">
                                	<div class="col-md-12 col-sm-12 col-12 col-lg-12 col-xl-12">
										<div class="small text-muted" style="font-style: normal!important;font-size: 11px;text-align:left!important;">
											<b>HR Comment:</b> {{$val->jobapplicant_hrcomment}}
										</div>
									</div>
								</div>
                                <div class="row" style="display: flex!important; margin-top: 4%;">
                                	<div class="col-md-2 col-sm-2 col-2 col-lg-2 col-xl-2">
                                	</div>
                                	<div class="col-md-4 col-sm-4 col-4 col-lg-4 col-xl-4">
                                		<a href="{{ URL::to('public/file/')}}/{{$val->jobapplicant_cv}}" title="Click To Download Resume" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a>
                                	</div>
                                	<div class="col-md-4 col-sm-4 col-4 col-lg-4 col-xl-4">
                                		<a href="{{ URL::to('/preemployementpdf')}}/{{$val->jobapplicant_id}}" title="Click To View PDF" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> PDF</a>
                                	</div>
                                	<div class="col-md-2 col-sm-2 col-2 col-lg-2 col-xl-2">
                                	</div>
								</div>
							</div>
						</div>
					</div>
			@endforeach
			</div>
		</div>
	</div>
</div>

