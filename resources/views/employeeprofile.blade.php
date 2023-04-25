@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Employee Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">View Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<img alt="" src="{{URL::to('public/img/')}}/{{$data['user']->elsemployees_image}}">
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0">
														{{$data['user']->elsemployees_name}}	
														</h3>
														<h6 class="text-muted">{{$data['user']->dept_name}}</h6>
														<small class="text-muted">{{$data['user']->DESG_NAME}}</small>
														<div class="staff-id">Batch ID : {{$data['user']->elsemployees_batchid}}</div>
														<div class="small doj text-muted">Date of Joining : {{$data['user']->elsemployees_dofjoining}}</div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Role</div>
															<div class="text">{{$data['user']->rolename}}</div>
														</li>
														<li>
															<div class="title">Email</div>
															<div class="text">{{$data['user']->elsemployees_email}}</div>
														</li>
														<li>
															<div class="title">Annual Leaves</div>
															<div class="text">{{ $data["user"]->elsemployees_annualleaves }}</div>
														</li>
														<li>
															<div class="title">Sick Leaves</div>
															<div class="text">{{ $data["user"]->elsemployees_sickleaves }}</div>
														</li>
														<li>
															<div class="title">Status</div>
															<div class="text">{{$data['user']->status_name}}</div>
														</li>
														<!-- <li>
															<div class="title">Reports to:</div>
															<div class="text">
															   <div class="avatar-box">
																  <div class="avatar avatar-xs">
																	 <img src="{{URL::to('public/img/')}}/{{$data['user']->elsemployees_image}}" alt="">
																  </div>
															   </div>
															   <a href="{{url('/employeeprofile')}}">
																
																</a>
															</div>
														</li> -->
													</ul>
												</div>
											</div>
										</div>
									</div>
									<!-- <div class="card card-user text-center" style="margin-top: 15px; width: 150px; ">
                                  		<a class="btn btn-success btn-sm" href="{{URL::to('/getimage') }}"  > Select Image</a>
                        			</div> -->
								</div>
							</div>
						</div>
					</div>
									
					<div class="tab-content">
					
						<!-- Profile Info Tab -->
						<div id="emp_profile" class="pro-overview tab-pane fade show active">
							<div class="row">
								<div class="col-md-6">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<div class="card-header">
												<h3 class="card-title mb-0">Personal Informations</h3>
											</div>
											<ul class="personal-info">
												<li>
													<div class="title">Contact No:</div>
													<div class="text">{{$data['user']->elsemployees_cno}}</div>
												</li>
												<li>
													<div class="title">Fathert Name:</div>
													<div class="text">{{$data['user']->elsemployees_fname}}</div>
												</li>
												<li>
													<div class="title">CNIC:</div>
													<div class="text">{{$data['user']->elsemployees_cnic}}</div>
												</li>
												<li>
													<div class="title">Date of Birth:</div>
													<div class="text">{{$data['user']->elsemployees_dofbirth}}</div>
												</li>
												<li>
													<div class="title">Address:</div>
													<div class="text">{{$data['user']->elsemployees_address}}</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<div class="card-header">
												<h3 class="card-title mb-0">Bank Account Details</h3>
											</div>
											<ul class="personal-info">
												<li>
													<div class="title">Bank name:</div>
													<div class="text">
														{{ $data["user"]->bank_name }}
													</div>
												</li>
												<li>
													<div class="title">Account No:</div>
													<div class="text">
														{{$data['user']->account_no}}
													</div>
												</li>
												<li>
													<div class="title">Account Title:</div>
													<div class="text">
														{{$data['user']->account_title}}
													</div>
												</li>
												<li>
													<div class="title">IBAN No:</div>
													<div class="text">
														{{$data['user']->iban_no}}
													</div>
												</li>
												<li>
													<div class="title">Bank Branch:</div>
													<div class="text">
														{{$data['user']->bank_branch}}
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Profile Info Tab -->						
					</div>
                </div>
				<!-- /Page Content -->
            </div>
			<!-- /Page Wrapper -->
			
@endsection