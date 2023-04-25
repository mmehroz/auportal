
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
	<div class="payroll-table card " style="background-color: white; border: none">
		<div class="row">
			<div class="col-md-12">
			@foreach ($data as $val)
					<div class="row staff-grid-row ">
						
						<div class="col-md-4 col-sm-6 col-12 col-lg-3 col-xl-3" style="float: left;">
							<!-- <div class="profile-widget">
								<div class="profile-img">
									<a href="{{url('/gallerylist')}}/{{$val->album_id}}" target="_blank" class="avatar">
										<img src="{{URL::to('public/album/')}}/{{$val->album_image}}" alt="" title="Click To View Images">
									</a>
								</div>
								@if( session()->get("role") <=	 2)
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#" onclick="getedit({{'"'.$val->album_id.'"'}})" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
										<a class="dropdown-item" href="{{url('/deletealbum')}}/{{$val->album_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
									</div>
								</div>
								@endif
								<h4 class="user-name m-t-10 mb-0 text-ellipsis">{{$val->album_title}}</h4>
								<div class="small text-muted" style="font-style: normal!important;">{{$val->album_date}}</div>
							</div> -->
							
							<!-- <div class="alb">
								 @if( session()->get("role") <=	 2)
								<div class="dropdown profile-action ">
									<a href="#" class="action-icon dropdown-toggle pr-2" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#" onclick="getedit({{'"'.$val->album_id.'"'}})" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
										<a class="dropdown-item" href="{{url('/deletealbum')}}/{{$val->album_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
									</div>
								</div>
								@endif
                       			
                            	<div class="img text-center">
                                
                               

                                	<a href="{{url('/gallerylist')}}/{{$val->album_id}}" target="_blank" class="text-center" >
                                		<img src="{{URL::to('public/album/')}}/{{$val->album_image}}" alt="" title="Click To View Images">
                            		</a>
                            	</div>
                        <br>
                        		<div class="heading text-center ">
                            		<h5 >{{$val->album_title}}</h5>
                            		<a href="{{url('/gallerylist')}}/{{$val->album_id}}">View all images</a>
                        		</div>
                    		</div> -->
                    		<!-- new -->
                    		 <div class="alb">
                    <div class="image "> <a href="{{url('/gallerylist')}}/{{$val->album_id}}" target="_blank"> <img src="{{URL::to('public/album/')}}/{{$val->album_image}}"> </a></div>
                    <!-- <h5 class="text-center pt-1">{{$val->album_title}}</h5> -->
                     <a href="{{url('/gallerylist')}}/{{$val->album_id}}" class="btn btn-primary" >View All Images</a>
                    <div class="text-center">
                        <!-- <a href="#"> <i class="fa fa-ellipsis-h"></i></a> -->
                        @if( session()->get("role") <=	 2)
                        <div class="dropdown profile-action ">
							<a href="#" class="action-icon dropdown-toggle pr-2" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" onclick="getedit({{'"'.$val->album_id.'"'}})" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item" href="{{url('/deletealbum')}}/{{$val->album_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
						</div>
						@endif
                    </div>
                </div>
                    		
						</div>
						
					</div>
			@endforeach
			</div>
		</div>
	</div>
</div>


