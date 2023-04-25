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
		body{
  background-color: #eee;
}
div.stars {
  width: 270px;
  display: inline-block;
}
 .mt-200{
     margin-top:200px;  
 }
input.star { display: none; }
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #4A148C;
  transition: all .2s;
}
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
input.star-1:checked ~ label.star:before { color: #F62; }  
label.star:hover { transform: rotate(-15deg) scale(1.3); }
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<div id="itticket" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				@if($checkreview == null)
				<h5 class="modal-title">Submit Ticket To IT</h5>
				@else
				<h5 class="modal-title">Submit Review</h5>
				@endif
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			@if($checkreview == null)
			<form action="{{ URL::to('/submititticket')}}" id="submitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			    <div class="form-group">
					<label><span class="text-danger"></span>Note</label>
					<textarea class="form-control" id="itticket_request" name="itticket_request" rows="4" required></textarea>
				</div>
				<div class="submit-section" style="text-align: right;">
					@if($checkpendingticket > 0)
					<span class='badge-danger'>Your Previous Ticket Is Still In Pending</span>
					@else
					<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
					@endif
				</div>
			</form>
			<br>
			<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="announcement">
					<thead>
						<tr>
            				<th>Ticket</th>
            				<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($data as $val)
						<tr>
							<td>{{$val->itticket_request}}</td>
							@if($val->itticketstatus_id == 1)
							<td><span class='badge-info'>{{$val->itticketstatus_name}}</span></td>
							@elseif($val->itticketstatus_id == 2)
							<td><span class='badge-warning'>{{$val->itticketstatus_name}}</span></td>
							@elseif($val->itticketstatus_id == 3)
							<td><span class='badge-danger'>{{$val->itticketstatus_name}}</span></td>
							@else
							<td><span class='badge-success'>{{$val->itticketstatus_name}}</span></td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			@else
			<form action="{{ URL::to('/submititreview')}}" id="submitannou" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }} 
			<input type="hidden" name="itticket_id" value="{{$checkreview->itticket_id}}">
				<label><span class="text-danger"></span>Rating</label>
				<div class="container d-flex">
					<div class="row">
						<div class="col-md-12">
							<div class="stars">
							    <input class="star star-5" id="star-5" type="radio" name="itreview_star" value="5" required/>
							    <label class="star star-5" for="star-5"></label>
							    <input class="star star-4" id="star-4" type="radio" name="itreview_star" value="4"/>
							    <label class="star star-4" for="star-4"></label>
							    <input class="star star-3" id="star-3" type="radio" name="itreview_star" value="3"/>
							    <label class="star star-3" for="star-3"></label>
							    <input class="star star-2" id="star-2" type="radio" name="itreview_star" value="2"/>
							    <label class="star star-2" for="star-2"></label>
							    <input class="star star-1" id="star-1" type="radio" name="itreview_star" value="1"/>
							    <label class="star star-1" for="star-1"></label>
							</div>				
						</div>
					</div>
				</div>
			    <div class="form-group">
					<label><span class="text-danger"></span>Remarks</label>
					<textarea class="form-control" id="itreview_remarks" name="itreview_remarks" rows="4" required></textarea>
				</div>
				<div class="submit-section" style="text-align: right;">
					<button id="btnsubmit" class="btn btn-primary submit-btn">Submit</button>
				</div>
			</form>
			@endif
			</div>
		</div>
	</div>
</div>