

@if(empty($data))
	
	<h2>No Data Found Of This Month</h2>
	
@else 

<!-- <style type="text/css">
	.dt-buttons{
		margin-top: 1%;
		margin-bottom: 0.5%;
	}
</style> -->
<!-- Candidates Tab -->

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable" id="pad">
						<thead>
							<tr class="bg-teal-400" style="white-space : nowrap; color:#fff;">
								<!-- <th>S.no</th> -->
							  	<th>Batch id</th>
								<th>Name</th>
								<th>Start time</th>
								<th>End time</th>
								<th>Date</th>
								<th>Day</th>
								<th>Arrival</th>
								<th>Departure</th>
								
								
							</tr>
						</thead>
						<tbody>
						@foreach ($data['data'] as $val)
							
							@foreach ($val[] as $val)
								
								<tr>
									<td>{{$val['s.no']}}</td>
									<td>{{$val['emp_batchid']}}</td>
									<td>{{$val['emp_name']}}</td>
									<td>{{$val['emp_checkin']}}</td>
									<td>{{$val['emp_checkout']}}</td>
									<td>{{$val['emp_date']}}</td>
									<td>{{$val['emp_day']}}</td>
									<td>
										@if($val['emp_labelin'] == 1 )
											<h4><span class='badge badge-success'>On Time</span></h4>
										@elseif($val['emp_labelin'] == 0) 
											<h4><span class='badge badge-danger'> Late Arrival</span></h4>
										@elseif($val['emp_labelout'] == 2)
											<h4><span class='badge badge-info'>Off Day</span></h4>
										@else
											<h4><span class='badge badge-warning'>Miss In</span></h4>
										@endif
											
										<!-- @if($val['emp_batchid'] == 11599 && $val['emp_date'] == "2020-10-19" )
											<h4><span class='badge badge-danger'> Late Arrival</span></h4>
										@else -->
										<!-- @endif -->
									</td>
									<td>
										@if($val['emp_labelout'] == 1 )
											<h4><span class='badge badge-success'>On Time</span></h4>
										@elseif($val['emp_labelout'] == 0) 
											<h4><span class='badge badge-danger'>Early Departure</span></h4>
										@elseif($val['emp_labelout'] == 2) 
											<h4><span class='badge badge-info'>Off Day</span></h4>
										@elseif($val['emp_labelout'] == 3) 
											<h4><span class='badge badge-warning'>Miss Out</span></h4>
										@endif
									</td>
									
									
								</tr>
								
							@endforeach
								
						@endforeach
						</tbody>
						
					</table>
				</div>
				<center>
						<div class="row">
							<div class="col-md-4">
								{{ $data->links() }}
							</div>
						</div>
						</center>
				
			</div>
		</div>

<script>

		var absentdays = {{ $absentday }} ; 
		$('#absdays').html(absentdays);
</script>

<script>

		var presentdays = {{ $presentday }} ; 
		$('#predays').html(presentdays);
</script>

<script>

		var leavesdays = {{ $empleavedays }} ; 
		$('#levdays').html(leavesdays);
</script>

<!-- <script type="text/javascript">
	$('document').ready(function(){
	
		$('#pad').DataTable( {
				
	        // dom: 'lBfrtip',
	        // buttons: [
	        //     'copy', 'csv', 'excel', 'pdf', 'print'
	        // ]
	        aLengthMenu: [
				[15,25, 50,100,500, 2800, -1],
				[15,25, 50,100,500, 2800 ,	"All"]
			],
			iDisplayLength: 31,
			dom: 'B',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
			responsive: {
				details: {
					type: 'column'
				}
			},
				order: [1, 'asc']
	    } );
    } );
</script> -->



@endif