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
<div id="viewlog" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Deliverd Salary Log</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-striped" id="ele">
					<thead>
						<tr>
            				<th> Delivered Amount</th>
            				<th> Delivered By</th>
            				<th> Delivered At</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($data as $val)
						<tr>
							<td>PKR {{$val->deliveredpaylog_amount}}</td>
							<td> {{$val->elsemployees_name}}</td>
							<td> {{$val->created_at}}</td>
						</tr>
						@endforeach
					</tbody>
					</table>
			</div>
		</div>
	</div> 
</div>