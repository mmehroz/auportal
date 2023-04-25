<style>
	.avatar > video {
    border-radius: 50%;
    display: block;
    overflow: hidden;
    width: 100%;
    height: 100%;
}	
.thumbnail {
        width: 100%;
        height: 350px;
        overflow: hidden;
        margin: 0 auto;
        border: 1px solid white;
        border-radius: 6px;
        transition: 0.5s;
    }
    
    .thumbnail img {
        width: 100%;
        max-height: auto;
        overflow: hidden;
        border: 1px solid white;
        border-radius: 6px;
        margin: 0 auto;
        transition: 0.5s;
    }
    
    .thumbnail img:hover {
        box-shadow: 8px 8px 15px rgb(233, 229, 229);
        border-radius: 6px;
        border: 1px solid white;
        transform: scale(0.95);
        transition: 0.5s;
        opacity: 0.8;
    }
</style>
<center>
<div class="row">
	<div class="col-md-4">
		{{ $data->links() }}
	</div>
</div>
</center>
<div class="tab-pane show active">
	<div class="payroll-table card" style="background-color: white; border:none">
		<div class="row">
			
			
					<div class="row staff-grid-row no-gutters">
						@foreach ($data as $val)
						<div class="col-md-3 col-sm-6 col-12 col-lg-3 col-xl-3" style="float: left;">
							<!-- <div class="profile-widget">
								<div class="profile-img">
									<a href="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" target="_blank" class="avatar">
										<?php
										$getextension = explode("_", $val->gallery_image);
										if ($getextension[3] == ".mp4" || $getextension[3] == ".x-m4v") {
										?>
										<video controls>
  										<source src="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" type="video/mp4">
  										</video>
										<?php
										}else{
										?>
										<img src="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" alt="">
										<?php
										}
										?>
									</a>
								</div>
								
							</div> -->
							<!-- <div class="alb1">
                       			
                            	<div class="img">
                                
                                	
                            	</div>
                        
                        		
                    		</div> -->
                    		<!-- <div class="card1">
                    <div class="image ">
                      <a href="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" target="_blank" class="">
										<?php
										$getextension = explode("_", $val->gallery_image);
										if ($getextension[3] == ".mp4" || $getextension[3] == ".x-m4v") {
										?>
										<video controls>
  										<source src="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" type="video/mp4">
  										</video>
										<?php
										}else{
										?>
										<img src="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" alt="">
										<?php
										}
										?>
									</a>
                    </div>

                </div> -->
                <div class="thumbnail">
                   
                   <a href="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" target="_blank" class="">
										<?php
										$getextension = explode("_", $val->gallery_image);
										if ($getextension[3] == ".mp4" || $getextension[3] == ".x-m4v") {
										?>
										<video controls>
  										<source src="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" type="video/mp4">
  										</video>
										<?php
										}else{
										?>
										<img src="{{URL::to('public/gallery/')}}/{{$val->gallery_image}}" width="100%" alt="">
										<?php
										}
										?>
									</a><br>
									@if( session()->get("role") <=	 2)
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{{url('/deletegallery')}}/{{$val->gallery_id}}/{{$data->albumid}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
									</div>
								</div>
								@endif
                </div>
						</div>
						@endforeach
					</div>
			
			
		
	</div>
</div>