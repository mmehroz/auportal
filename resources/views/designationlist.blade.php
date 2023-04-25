@extends('layout.apptheme')
@section('hr-HRM')

<style type="text/css">
  input, button, a {
      color: #4a4a4a;
  }
  a:hover, a:active, a:focus {
      color: #678c40;
  }
</style>
			
<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
  <div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Designations List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Designations List</li>
					</ul>
				</div>
        @if(session()->get("role") <= 2)
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" onclick="adddesignation()" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
				</div>
        @endif
			</div>
		</div>
		<!-- /Page Header -->	
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable" id="desl">
						<thead>
							<tr>
                @if(session()->get("role") <= 2)
			 		       <th class="text-right">Action</th>
                @endif
								<th style="width: 30px;">Designation ID</th>
								<th>Designation Name</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
								<tr>
                @if(session()->get("role") <= 2)
								<td class="text-center" >
              <a href="#" onclick="editdesignation({{$val->DESG_ID}})"> <i class="fa fa-pencil"></i></a>
                </td>
                @endif
									<td class="text-center">{{$val->DESG_ID}}</td>
									<td>{{$val->DESG_NAME}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
  </div>
	<!-- /Page Content -->			
</div>
<!-- /Page Wrapper -->
<div id ='modals'></div>

<script type="text/javascript">
function adddesignation(){
	$.get('{{ URL::to("/adddesignationmodal")}}',function(data){
	$('#modals').empty().append(data);
	$('#adddesignation').modal('show');
	});
}
	$('#modals').on('submit','#submitdesig',function(e){
           e.preventDefault();
		   $("#btnsubmit").attr("disabled", true);
           var frmData = $(this).serialize();
           console.log(frmData)
           //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
               //$('#todolist').empty().append(data);
           //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
           //});
           $.ajax({
               url:'{{ URL::to("/adddesignation")}}',
               type:'POST',
               data: frmData,
               dataType: 'json',
               success : function (data){
                   $("#loader").hide();
                   $(".modal-body").append('<p class="alert alert-success">Designation Added Successfully...! </p>');
                // $("#errors").addClass("alert-success").text('Task added successfully...!');
                   
                   setTimeout(function(){$("#adddesignation").modal('hide')
                    window.location = "{{ URL::to('/designationlist')}}";
                                    }, 2000);

                },
                error : function(error){
                   console.log("error");
                   // $("#loader").hide();
                   var error = error.responseJSON;
                   $("#modals #errors").empty();
                   $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
                   
                   setTimeout(function(){$("#adddesignation").modal('hide')
					window.location = "{{ URL::to('/designationlist')}}";
                                    }, 2000);
                }
           })
       });



function editdesignation($id){
	$.get('{{ URL::to("/editdesignationmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editdesignation').modal('show');
	});
}

$('#modals').on('submit','#editsubmitdesig',function(e){
           e.preventDefault();
		   $("#editbtnsubmit").attr("disabled", true);
           var frmData = $(this).serialize();
           console.log(frmData)
           //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
               //$('#todolist').empty().append(data);
           //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
           //});
           $.ajax({
               url:'{{ URL::to("/editsubmitdesignation")}}',
               type:'POST',
               data: frmData,
               dataType: 'json',
               success : function (data){
                   $("#loader").hide();
                   $(".modal-body").append('<p class="alert alert-success">Designation Edit Successfully...! </p>');
                // $("#errors").addClass("alert-success").text('Task added successfully...!');
                   
                   setTimeout(function(){$("#editdesignation").modal('hide')
                    window.location = "{{ URL::to('/designationlist')}}";
                                    }, 2000);

                },
                error : function(error){
                   console.log("error");
                   // $("#loader").hide();
                   var error = error.responseJSON;
                   $("#modals #errors").empty();
                   $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
                   
                   setTimeout(function(){$("#editdesignation").modal('hide')
					window.location = "{{ URL::to('/designationlist')}}";
                                    }, 2000);
                }
           })
       });



</script>		
			
@endsection