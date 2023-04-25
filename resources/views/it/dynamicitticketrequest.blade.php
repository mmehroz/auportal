@foreach ($data as $val)
<tr>
	@if($ticketstatus_id <= 2)
	@if($val->itticketstatus_id == 1)
	<td class="text-right" style="width: 20px">
      <div class="dropdown dropdown-action">
        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#" onclick="inprogressitticket({{$val->itticket_id}})"><i class="fa fa-spinner m-r-5"></i>In Progress</a>
        </div>
      </div>
    </td>
    @elseif($val->itticketstatus_id == 2)
	<td class="text-right" style="width: 20px">
      <div class="dropdown dropdown-action">
        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#" onclick="troubleshoottoresolveitticket({{$val->itticket_id}})"><i class="fa fa-check m-r-5"></i>Troubleshoot And Resolve</a>
          <a class="dropdown-item" href="#" onclick="useinventorytoresolveitticket({{$val->itticket_id}})"><i class="fa fa-check m-r-5"></i>Use Inventory To Resolve</a>
          <a class="dropdown-item" href="#" onclick="rejectitticket({{$val->itticket_id}})"><i class="fa fa-close m-r-5"></i> Reject</a>
        </div>
      </div>
    </td>
    @else
    <td class="text-right" style="width: 20px">-</td>
    @endif
    @endif
	<td>{{$val->itticket_request}}</td>
	<td>{{$val->dept_name}}</td>
	<td>{{$val->elsemployees_name}}</td>
	<td>{{$val->created_at}}</td>
	@if($ticketstatus_id >= 3)
	<td>{{$val->itticket_comment}}</td>
	@endif
	@if($ticketstatus_id >= 4)
	<td>{{$val->itinventory_name}}</td>
	@endif
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