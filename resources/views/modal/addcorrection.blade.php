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
		.bootstrap-select .dropdown-toggle{
			height: 40px;
			margin-left: 10px;
		}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<div id="addcorrection" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Attendance Correction</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{ URL::to('/submitcorrection')}}" id="submitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
					<div class="form-group">
						<?php $getresultanddate = explode("_",$data)?>
						<label>Title<span class="text-danger"></span></label>
						<input type="text" value="{{$getresultanddate[1]}}" class="form-control" id="title" name="title" required readonly>
					</div>
					<div class="form-group">
						<label>Description:<span class="text-danger"></span></label>
                        <textarea class="form-control" id="description" name="description"  rows="5" required></textarea>
					</div>
                    <div class="form-group">
						<label><span class="text-danger"></span></label>
						<input type="date" value="{{$getresultanddate[0]}}" class="form-control" id="affecteddate" name="affecteddate" required readonly>
					</div>
					<div class="form-group">
                    	<label>Image<span class="text-danger"></span></label>
						<input class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg,image/*" type="file">
					</div>
					<div class="submit-section">
						<button id="btnsubmit" type="submit" name="btnsubmitcorrection" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>
<script>
	// $('#modals').on('submit','#submitannou',function(e){
 //                    e.preventDefault();
 //                    $("#btnsubmit").attr("disabled", true);
 //                    var frmData = $(this).serialize();
                 
 //                    $.ajax({
 //                        url:'{{ URL::to("/submitcorrection")}}',
 //                        type:'POST',
 //                        data: frmData,
 //                        dataType: 'json',
 //                        success : function (data){
	// 						// console.log(data.no);
 //                            $("#loader").hide();
 //                            $(".modal-body").append('<p class="alert alert-success">'+(data.no)+ '</p>');
 //                         // $("#errors").addClass("alert-success").text('Task added successfully...!');
                            
 //                            setTimeout(function(){$("#addcorrection").modal('hide');
	// 						window.location = "{{ URL::to('/dailyattendance')}}";
	// 									  }, 1000);
        
 //                         },
 //                         error : function(error){
 //                            console.log(error);
 //                            // $("#loader").hide();
 //                            var error = error.responseJSON;
 //                            $("#modals #errors").empty();
 //                            $(".modal-body").append('<p class="alert alert-danger">Oops Somenthing went wrong</p>');
                            
 //                            setTimeout(function(){$("#addcorrection").modal('hide');
	// 						window.location = "{{ URL::to('/dailyattendance')}}";
 //                                             }, 1000);
 //                         }
 //                    })
 //                });
</script>