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
<div id="viewcomment" class="modal custom-modal " role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="letter-spacing: 2px; font-size: 26px">HR Comments</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="announcement">
						<thead>
							<tr>
                				<th>Comment</th>
                				<th>Name</th>
                			</tr>
						</thead>
						<tbody>
						@foreach ($data as $val)
						<tr>
							<td>{{$val->complaincomment_comment}}</td>
							<td>{{$val->elsemployees_name}}</td>
						</tr>
						@endforeach
						</tbody>
					</table>
			</div>
		</div>
	</div>
</div>