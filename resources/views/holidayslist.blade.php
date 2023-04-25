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
					<h3 class="page-title">Holidays</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Holidays List</li>
					</ul>
				</div>
        @if(session()->get("role") <= 2)
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" onclick="addholidays()" data-toggle="modal" data-target="#add_holidays"><i class="fa fa-plus"></i> Add Holiday</a>
				</div>
        @endif
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable" id="holidays">
						<thead>
							<tr>
                				@if(session()->get("role") <= 2)
								  <th class="text-right" style="width: 10%!important;padding-left: 4%!important;">Action</th>
                				@endif
								<th style="width: 30px;">Holiday Title </th>
								<th>Holiday Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $val)
							<tr>
              					@if(session()->get("role") <= 2)
			 			    	<td class="text-center" >
                  <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#" onclick="editholidays({{$val->HOLI_ID}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                      <a class="dropdown-item" href="#" onclick="deleteholidays({{$val->HOLI_ID}})"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                      <!-- <a class="dropdown-item" href="{{url('/delete_holiday')}}/{{$val->HOLI_ID}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a> -->
                    </div>
                  </div>
			 			    		<!-- <a href="#" onclick="editholidays({{$val->HOLI_ID}})"> <i class="fa fa-pencil"></i></a> -->
			 			    	</td>
            					@endif
								<td class="text-center">{{$val->HOLI_TITLE}}</td>
								<td>{{$val->HOLI_DATE}}</td>
								<!-- <td class="text-right">
                        		<div class="dropdown dropdown-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            	<div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_department"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        		</div>
								</div>
								</td> -->
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

function deleteholidays($id){
  $.get('{{ URL::to("/deleteholidaysmodal")}}/'+$id,function(data){
  $('#modals').empty().append(data);
  $('#deleteholidays').modal('show');
  });
}

function addholidays(){
	$.get('{{ URL::to("/addholidaysmodal")}}',function(data){
	$('#modals').empty().append(data);
	$('#addholidays').modal('show');
	});
}
	$('#modals').on('submit','#submitholi',function(e){
           e.preventDefault();
		   $("#btnsubmit").attr("disabled", true);
           var frmData = $(this).serialize();
           console.log(frmData)
           //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
               //$('#todolist').empty().append(data);
           //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
           //});
           $.ajax({
               url:'{{ URL::to("/addholidays")}}',
               type:'POST',
               data: frmData,
               dataType: 'json',
               success : function (data){
                   $("#loader").hide();
                   $(".modal-body").append('<p class="alert alert-success">holidays Added Successfully...! </p>');
                // $("#errors").addClass("alert-success").text('Task added successfully...!');
                   
                   setTimeout(function(){$("#addholidays").modal('hide')
                    window.location = "{{ URL::to('/holidayslist')}}";
                                    }, 2000);

                },
                error : function(error){
                   console.log("error");
                   // $("#loader").hide();
                   var error = error.responseJSON;
                   $("#modals #errors").empty();
                   $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
                   
                   setTimeout(function(){$("#addholidays").modal('hide')
					window.location = "{{ URL::to('/holidayslist')}}";
                                    }, 2000);
                }
           })
       });



function editholidays($id){
	$.get('{{ URL::to("/editholidaysmodal")}}/'+$id,function(data){
	$('#modals').empty().append(data);
	$('#editholidays').modal('show');
	});
}

$('#modals').on('submit','#editsubmitholi',function(e){
           e.preventDefault();
		   $("#editbtnsubmit").attr("disabled", true);
           var frmData = $(this).serialize();
           console.log(frmData)
           //$.post('{{ URL::to("/update")}}',frmData,function(data,xhrStatus,xhr){
               //$('#todolist').empty().append(data);
           //  $(".modal-body").append('<p class="alert alert-success">Task added successfully...! </p>');
           //});
           $.ajax({
               url:'{{ URL::to("/editsubmitholidays")}}',
               type:'POST',
               data: frmData,
               dataType: 'json',
               success : function (data){
                   $("#loader").hide();
                   $(".modal-body").append('<p class="alert alert-success">holidays Edit Successfully...! </p>');
                // $("#errors").addClass("alert-success").text('Task added successfully...!');
                   
                   setTimeout(function(){$("#editholidays").modal('hide')
                    window.location = "{{ URL::to('/holidayslist')}}";
                                    }, 2000);

                },
                error : function(error){
                   console.log("error");
                   // $("#loader").hide();
                   var error = error.responseJSON;
                   $("#modals #errors").empty();
                   $(".modal-body").append('<p class="alert alert-danger">Oops Something wrong...!</p>');
                   
                   setTimeout(function(){$("#editholidays").modal('hide')
					window.location = "{{ URL::to('/holidayslist')}}";
                                    }, 2000);
                }
           })
       });

  $('#modals').on('click','#btnDelete',function(e){
          var id = $(this).data('val');                        
          $.get('{{ URL::to("/destroyHolidays")}}/'+id,function(data){
            $('#editholidays').empty().append(data);
            
          });
        });



</script>	
@endsection