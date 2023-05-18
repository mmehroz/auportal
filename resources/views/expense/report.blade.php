@extends('layout.apptheme')
@section('hr-HRM')
<style type="text/css">
	.creditcol{
		    text-align: left;
	}
	.creditcolclosing{
		    text-align: right;
	}
	.creditcoltitle{
		    text-align: left;
	}
</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-8">
					<h3 class="page-title">Monthly Petty Cash Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Expense</li>
					</ul>
				</div>
				<div class="col-sm-4" style="height: 10px;"><?php $ym = $yearandmonth;?>
					<a href="#" class="btn add-btn m-1" onclick="addexpense({{'"'.$yearandmonth.'"'}})" data-toggle="modal" data-target="#add_expense"><i class="fa fa-plus"></i> Add Expense</a>
				<!-- </div>
				<div class="col-sm-2 "> -->
					<?php $ym = $yearandmonth;
						$lastexpenseid = DB::connection('mysql')->table('expense')
						->where('expense_yearandmonth','=',$yearandmonth)
						->where('status_id','=',2)
						->orderBy('expense_id','Desc')
						->select('expense_id')
						->first();
						if (isset($lastexpenseid->expense_id)) {
							$expense_id = $lastexpenseid->expense_id;
						}else{
							$expense_id = 0;
						}
						$mergeboth = $yearandmonth.'~'.$expense_id;
					?>
					<a href="#" class="btn add-btn m-1" onclick="addmorebalance({{'"'.$mergeboth.'"'}})" data-toggle="modal" data-target="#add_morebalaance"><i class="fa fa-plus"></i> Add More Balance</a>
				</div>
			</div>
		</div>
		@if(session('message'))
      		<div><p class="alert alert-success" >{{session('message')}}</p> </div>
    	@endif
		<div class="panel-body">
		    <div class="row">
	            <div class="col-lg-12">
	            	<div class="table-responsive">
						<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" style="transform: translateY(17px);">
							<thead>	
								<tr>
									<?php
									$yearmonth = explode('-', $yearandmonth);
									$monthNum  = $yearmonth[1];
									$dateObj   = DateTime::createFromFormat('!m', $monthNum);
									$month = $dateObj->format('F');
									$year = $yearmonth[0];
									?>
	                				<th style="font-size: 18px;text-align: center;color: #fff;background: #5069e7;border: 1px solid lightgray;font-weight: bold;padding: 10px 8px;">{{$month}} {{$year}}</th>
									<th style="font-size: 18px;text-align: center;color: #fff;background: #5069e7;border: 1px solid lightgray;font-weight: bold;padding: 10px 8px;">Opening Balance</th>
									<th style="font-size: 18px;text-align: center;color: #fff;background: #5069e7;border-top:1px solid #5069e7;border-bottom:1px solid #5069e7;border-left:none;border-right:none;font-weight: bold;padding: 10px 8px;">PKR {{$openingbalance}}</th>
									<th style="    background: #5069e7; border: 1px solid #5069e7;"></th>
								</tr>
							</thead>
						</table>
						<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="sreq">
		
							
							<tbody style="">
								<?php 
									$index=0;
									$debit=0;
									$closing=$openingbalance;
									$credit=0;
								?>
								@foreach ($data as $val)
								<tr>
		        					<?php
									if($index == 0){
										$debit = $val->expense_amount;
									}else{
										$debit  = $debit + $val->expense_amount;
									}
									$closing = $openingbalance+$credit-$debit;
									?>
				                	<td style="text-transform: capitalize;font-size: 15px;text-align: left;border-left: 1px solid lightgray !important;border-right: 1px solid #fff;border-top: 1px solid lightgray;border-bottom: 1px solid lightgray;">{{$val->expense_title}}</td>
									<td style="text-transform: capitalize;font-size: 15px;text-align: right;border-left: 1px solid lightgray !important;border-right: 1px solid #fff;border-top: 1px solid lightgray;border-bottom: 1px solid lightgray;"><span>PKR </span><span>{{$val->expense_amount}}</span></td>
								
								  <td style="text-transform: capitalize;font-size: 15px;text-align: right;border-left: 1px solid lightgray !important;border-right: 1px solid #fff;border-top: 1px solid lightgray;border-bottom: 1px solid lightgray;"><span>PKR </span><span>{{$closing}}</span></td>
								  <td class="text-right d-flex justify-content-end" style="text-transform: capitalize;font-size: 18px;text-align: right;border-left: 1px solid lightgray !important;border-right: 1px solid #fff;border-top: 1px solid lightgray;border-bottom: 1px solid lightgray !important;">
									<div class="dropdown dropdown-action">
								  <a href="#" class="fa fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v">more_vert</i></a>
								  <div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#" onclick="editexpense({{$val->expense_id}})"><i class="fa fa-pencil"></i> Edit</a>
								  </div>
									</div>
							  </td>

									
								</tr>
								<?php
									$morebalance = DB::connection('mysql')->table('expenseopening')
									->where('expenseopening_month','=',$yearandmonth)
									->where('expense_id','=',$val->expense_id)
									->where('status_id','=',2)
									->select('expenseopening_moretitle','expenseopening_morebalance')
									->first();
									$summorebalance = DB::connection('mysql')->table('expenseopening')
									->where('expenseopening_month','=',$yearandmonth)
									->where('expense_id','=',$val->expense_id)
									->where('status_id','=',2)
									->select('expenseopening_morebalance')
									->sum('expenseopening_morebalance');
									if ($summorebalance != 0) {
										$credit = $summorebalance;
									}
									
									// $closing = $closing+$summorebalan	ce;
								?>
								@if(isset($morebalance->expenseopening_moretitle))
								<tr class="creditrow">
									<td class="creditcoltitle">{{$morebalance->expenseopening_moretitle}}</td>
									<td class="creditcol">PKR {{$morebalance->expenseopening_morebalance}}</td>
									<?php $sumclosing = $closing+$credit;?>
									<td class="creditcolclosing">PKR {{$sumclosing}}</td>
									<td class="creditcol" style="width: 20px;"></td>
									
								</tr>
								@endif
								<?php $index++;?>
								@endforeach
							</tbody>
							
						</table>
						<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" style="transform: translateY(-17px);">
							<thead style="">	
								<tr>
	                				<th style="font-size: 18px;text-align: center;color: #fff;background: #5069e7;border: 1px solid lightgray;font-weight: bold;padding: 10px 8px;">Total Expenses</th>
	                				<th style="font-size: 18px;text-align: center;color: #fff;background: #5069e7;border: 1px solid lightgray;font-weight: bold;">PKR {{$debit}}</th>
									<th style="font-size: 18px;text-align: center;color: #fff;background: #5069e7;border: 1px solid lightgray;font-weight: bold;">Closing Balance</th>
									<th style="font-size: 18px;text-align: center;color: #fff;background: #5069e7;border: 1px solid lightgray;font-weight: bold;">PKR {{$closing}}</th>
								</tr>
							</thead>
						</table>
					</div>
	            </div>
	        </div>
        </div>
    </div>				
</div>
<div id ='modals'></div>
<script type="text/javascript">
function addexpense($id){
	$.get('{{ URL::to("/addexpense")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#addexpense').modal('show');
	});
}
function addmorebalance($id){
	$.get('{{ URL::to("/addmorebalance")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#addmorebalance').modal('show');
	});
}
function editexpense($id){
	$.get('{{ URL::to("/editexpense")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editexpense').modal('show');
	});
}
</script>
@endsection