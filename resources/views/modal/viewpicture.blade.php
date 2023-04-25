<style>
	#loader{
        display:none;
        position: fixed;
        height: 100%;
        width: 100%;
        top: 0px;
        left: 0px;
        background: url(http://www.nvidia.com/docs/IO/151309/loader.gif);
        z-index: 1;
        background-color: #ffffff5c;
        background-repeat: no-repeat;
        background-position: 45% 45%;
    }

 .zoom {
        display:inline-block;
        position: relative;
    }
    
    /* magnifying glass icon */
    .zoom:after {
        content:'';
        display:block; 
        width:50px; 
        height:50px;
        position:absolute; 
        top:0;
        right:0;
        /*background:url(public/newtheme/images7/icon.png);*/
    }

    .zoom img {
        display: block;
    }

    .zoom img::selection { background-color: transparent; } 
</style>

<!-- View Pictures Modal -->
<div id="getmeImage" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div id="loader"></div>
			<div class="modal-header">
				<h5 class="modal-title">ImageId - {{$data->deptpic_id}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<center><h4>Images</h4></center>
				<center><h3>Click Image to Download</h3></center>
                <?php
                 $img = explode("|",$data->dept_picture);        
                 ?>
                @foreach($img as $myimg)
                <span class='zoom' id='ex2'>
				<a target="_blank" href="{{ URL::to('public/img/')}}/{{$myimg}}" download>
                    <img class="img-fluid img-thumbnail" src="{{ URL::to('public/img/')}}/{{$myimg}}" style="height: 225px;width: 225px"  />
                </a>
				</span>
                @endforeach
			</div>
			<div class="modal-footer">
            </div> 
		</div>
	</div>
</div>
<!-- End View Pictures Modal -->