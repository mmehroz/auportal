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
<div id="editalbum" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Album</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submiteditalbum')}}" id="editsubmitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden"  name="hdnalbumid" value="{{$data->album_id}}" class="form-control">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Title <span class="text-danger"></span></label>
								<input class="form-control" name="title" value="{{$data->album_title}}" required type="text">
                      		</div>
                      	</div>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Event Date <span class="text-danger"></span></label>
                      			 <input class="form-control" name="eventdate" value="{{$data->album_date}}" required type="date">
                      		</div>
                      	</div>
                    </div>
                    <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Image <span class="text-danger"></span></label>
								<input class="form-control" name="input" id="input" placeholder="Upload Album Image" accept="image/x-png,image/gif,image/jpeg" type="file">
							</div> 
						</div>
					</div>
                    <div class="submit-section">
						<button id="editbtnsubmit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>