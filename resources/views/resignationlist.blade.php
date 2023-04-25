@extends('layout.apptheme')
@section('hr-HRM')
			
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Resignations</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Resignation List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" onclick="addresignation()" data-toggle="modal" data-target="#add_resignation"><i class="fa fa-plus"></i> Add Resignation</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable dataTable no-footer" id="resignations" style="white-space: normal;">
						<thead>
							<tr>
                @if(session()->get("role") <= 2)
								<th class="text-right">Action</th>
                @endif
								<th>Batch Id</th>
								<th>Employee Name</th>
								<th>Department </th>
								<th>Designation</th>
								<th>Reporting To </th>
								<th>Last Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
                  @if(session()->get("role") <= 2)
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" onclick="editresignation({{$val->resignation_id}})"> <i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item" href="#" onclick="viewresignation({{$val->resignation_id}})"> <i class="fa fa-eye"></i> View</a>
											</div>
										</div>
									</td>
                  @endif
								<td style="width: 30px;">{{$val->resig_empid}}</td>
								<td>{{$val->elsemployees_name}}</td>
								<td>{{$val->dept_name}}</td>
								<td>{{$val->DESG_NAME}}</td>
								<td><?php 
									$reportemail = DB::connection('mysql')->table('elsemployees')
								->where('elsemployees.elsemployees_empid','=',$val->elsemployees_reportingto)
								->select('elsemployees.*')
								->first();
									?>{{$reportemail->elsemployees_name}}</td>
								<td>{{$val->resig_lastdate}}</td>
								<td>{{$val->resig_status}}</td>
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

function addresignation(){
	$.get('{{ URL::to("/addresignationmodal")}}',function(data){
	$('#modals').empty().append(data);
	$('#addresignation').modal('show');
	});
}
	$('#modals').on('submit','#submitresig',function(e){
           e.preventDefault();
		   $("#btnsubmit").attr("disabled", true);
           var frmData = $(this).serialize();
           console.log(frmData)
           //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
               //$('#todolist').empty().append(data);
           //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
           //});
           $.ajax({
               url:'{{ URL::to("/addresignation")}}',
               type:'POST',
               data: frmData,
               dataType: 'json',
               success : function (data){
                   $("#loader").hide();
                   $(".modal-body").append('<p class="alert alert-success">Resignation Added Successfully...! </p>');
                // $("#errors").addClass("alert-success").text('Task added successfully...!');
                   
                   setTimeout(function(){$("#addresignation").modal('hide')
                    window.location = "{{ URL::to('/resignationlist')}}";
                                    }, 2000);

                },
                error : function(error){
                   console.log("error");
                   // $("#loader").hide();
                   var error = error.responseJSON;
                   $("#modals #errors").empty();
                   $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
                   
                   setTimeout(function(){$("#addresignation").modal('hide')
					window.location = "{{ URL::to('/resignationlist')}}";
                                    }, 2000);
                }
           })
       });



function editresignation($id){
	$.get('{{ URL::to("/editresignationmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editresignation').modal('show');
	});
}

$('#modals').on('submit','#editsubmitresig',function(e){
           e.preventDefault();
		   $("#editbtnsubmit").attr("disabled", true);
           var frmData = $(this).serialize();
           console.log(frmData)
           //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
               //$('#todolist').empty().append(data);
           //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
           //});
           $.ajax({
               url:'{{ URL::to("/editsubmitresignation")}}',
               type:'POST',
               data: frmData,
               dataType: 'json',
               success : function (data){
                   $("#loader").hide();
                   $(".modal-body").append('<p class="alert alert-success">Resignation Edit Successfully...! </p>');
                // $("#errors").addClass("alert-success").text('Task added successfully...!');
                   
                   setTimeout(function(){$("#editresignation").modal('hide')
                    window.location = "{{ URL::to('/resignationlist')}}";
                                    }, 2000);

                },
                error : function(error){
                   console.log("error");
                   // $("#loader").hide();
                   var error = error.responseJSON;
                   $("#modals #errors").empty();
                   $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
                   
                   setTimeout(function(){$("#editresignation").modal('hide')
					window.location = "{{ URL::to('/resignationlist')}}";
                                    }, 2000);
                }
           })
       });


function viewresignation($id){
	$.get('{{ URL::to("/viewresignationmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#viewresignation').modal('show');
	});
}

$('#modals').on('submit','#viewsubmitresig',function(e){
   e.preventDefault();
   $("#viewbtnsubmit").attr("disabled", true);
   var frmData = $(this).serialize();
   console.log(frmData)
   //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
       //$('#todolist').empty().append(data);
   //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
   //});
   $.ajax({
       url:'{{ URL::to("/viewsubmitresignation")}}',
       type:'POST',
       data: frmData,
       dataType: 'json',
       success : function (data){
           $("#loader").hide();
           $(".modal-body").append('<p class="alert alert-success">Resignation Status Update Successfully...! </p>');
        // $("#errors").addClass("alert-success").text('Task added successfully...!');
           
           setTimeout(function(){$("#viewresignation").modal('hide')
            window.location = "{{ URL::to('/resignationlist')}}";
                            }, 2000);

        },
        error : function(error){
           console.log("error");
           // $("#loader").hide();
           var error = error.responseJSON;
           $("#modals #errors").empty();
           $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
           
           setTimeout(function(){$("#viewresignation").modal('hide')
			window.location = "{{ URL::to('/resignationlist')}}";
                            }, 2000);
        }
   })
});



</script>	
			
@endsection