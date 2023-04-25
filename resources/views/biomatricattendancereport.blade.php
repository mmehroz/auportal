@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Biomatric Attendance Report</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Attendance Report</li>
								</ul>
							</div>
						</div>
					</div>
					@if(session('message'))
		            <div>   <p class="alert alert-danger" >{{session('message')}}</p> </div>
		        	  @endif
					<div class="text-right form-inline">

					</div>
					<div class="panel-body">
	                    <div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped custom-table datatable" id="attrep">
										<thead>
											<tr class="bg-teal-400" style="white-space : nowrap;">
										    <th>Date</th>
											<th>Month</th>
											<th>Time In</th>
										    <th>BatchId</th>
										    <th>Name</th>
										</tr>
										</thead>
										<tbody>
											<?php $index=0;?>
											@foreach ($data as $val)
											<tr>
											<?php  $explodechktime = explode(' ', $data[$index]->CheckTime);
											   $explodetime = explode('.', $explodechktime[1]);
											   $getname = DB::connection('mysql')->table('elsemployees')
								                ->where('elsemployees.elsemployees_status','=',2)
								                ->where('elsemployees.elsemployees_batchid','=',$data[$index]->Userid)
								                ->select('elsemployees_name')
								                ->first();
								                if (isset($getname)) {
								                	$empname = $getname->elsemployees_name;
								                }else{
								                	$empname = "Name Not Avilable";
								                }
											?>	
											<td>{{$explodechktime[0]}}</td>
											<td>{{$data->month}}</td>
											<td>{{$explodetime[0]}}</td>
											<td>{{$data[$index]->Userid}}</td>
											<td>{{$empname}}</td>
											</tr>
											<?php $index++;?>
											@endforeach
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                </div>
                <div id ='modal'></div>				
            </div>
			<!-- Page Wrapper -->
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
@endsection