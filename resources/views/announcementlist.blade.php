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
          <h3 class="page-title">Announcement List</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Announcement</li>
          </ul>
        </div>
        @if(session()->get("role") <= 2)
        <div class="col-auto float-right ml-auto">
          <a href="#" class="btn add-btn" onclick="addannouncement()" data-toggle="modal" data-target="#add_announcement"><i class="fa fa-plus"></i> Add Announcement</a>
        </div>
        @endif
      </div>
    </div>
    @if(session('message'))
      <div><p class="alert alert-success" >{{session('message')}}</p> </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <div><h4><li>{{ $error }}</li></h4> </div>
            @endforeach
          </ul>
        </div>
    @endif
    <!-- /Page Header -->
    
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="announcement">
            <thead>
              <tr>
                        @if(session()->get("role") <= 2)
                        <th class="text-right;" style="width: 10%!important;padding-left: 4%!important;">Action</th>
                        @endif
                <th>Image</th>
                <th style="width: 30px;">Announcement Title </th>
                <th>Description</th>
                <th>Announcement For</th>
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
                      <a class="dropdown-item" href="#" onclick="editannouncement({{$val->announcement_id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                      <a class="dropdown-item" href="{{url('/delete_announcement')}}/{{$val->announcement_id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                    </div>
                  </div>
                </td>
                  @endif
                <td style="width: 20px">
                <?php
                $getexplode = explode(".", $val->announcement_image);
                $getextension = end($getexplode);
                $allowedimageext = array('jpeg','bmp','png','jpg','gif');
                if (in_array($getextension, $allowedimageext)) {
                ?>
                <img  alt=""  class="avatar" src="{{URL::to('public/announcement/')}}/{{$val->announcement_image}}">
                <?php
                }else{
                ?>
                <video width="100%">
                <source src="{{URL::to('public/announcement/')}}/{{$val->announcement_image}}" type="video/mp4" />
                </video>
                <?php
                }
                ?>
                </td>
                <td class="text-center">{{$val->announcement_title}}</td>
                <td>{!!$val->announcement_desc!!}</td>
                <td>{{$val->announcement_for}}</td>
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

function addannouncement(){
  $.get('{{ URL::to("/addannouncementmodal")}}',function(data){
  $('#modals').empty().append(data);
  $('#addannouncement').modal('show');
  });
}
  
function editannouncement($id){
  $.get('{{ URL::to("/editannouncementmodal")}}/'+$id,function(data){
  $('#modals').empty().append(data);
  $('#editannouncement').modal('show');
  });
}

</script> 
          
@endsection