@extends('layout.apptheme')
@section('hr-HRM')
<style type="text/css">
    .form-control {
        color: #000000fc!important;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Compose Email</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Compose</li>
                    </ul>
                </div>
            </div>
        </div>
        @if(session('message'))
            <div><p class="alert alert-info mt-3" >{{session('message')}}</p> </div>
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
    <div class="row">
        <div class="col-12">
            <form action="{{ URL::to('/sendcomposeemail')}}" method="POST" id="emial-form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }} 
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>From Name</label>
                            <input type="text" name="fromname" id="fromname" class="form-control" placeholder="Enter From Name" required>
                        </div>
                        <div class="col-6">
                            <label>From Email</label>
                            <input type="email" name="fromemail" id="fromemail" class="form-control" placeholder="Enter From Email" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="emailsubject" id="email-subject" class="form-control" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>To Email <span style="color: red"> Enter Multiple By Line Break. Maximium Number Of Sending Emails Are 200</span></label><br><label>Example<span style="color: red"> recipient1@abc.com</span><br><span style="color: red"> recipient2@abc.com</span></label>
                            <textarea class="form-control" id="email-box" name="toemail" rows="4" style="height: 200px" required placeholder="Enter Recipient Email" required></textarea>
                        </div>
                        <div class="col-6">
                            <div class="check mt-4" id="check"></div>
                            <div class="progress-area mt-4 d-none" id="progress">
                                <div class="progress-message" id="progress-message">
                                    <div>avidhaus.ahmer@gmail.com</div>
                                    <div class="loading-container" id="loading-container">
                                        <img src="images/loading.gif" alt="loading">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Select Type</label><br>
                    <input type="radio" name="istemplateortext" checked="true" value="template" required>&nbsp&nbsp<label>Template</label>
                    <input type="radio" name="istemplateortext" value="compose" required>&nbsp&nbsp<label>Compose</label>
                    <div class="row" id="templatediv">
                        <div class="col-6">
                            <input type="file" class="form-control" id="upload-email-template" name="template">
                        </div>
                        <div class="col-6">
                            <input id="show-email-template" type="button" class="btn btn-primary form-control" value="Show Template"/>
                        </div>
                    </div>
                    <div class="row" id="composediv" style="display: none;">
                        <div class="col-12">
                            <label>Compose Email</label>
                            <textarea class="form-control" id="compose" name="compose" rows="4" style="height: 200px"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" id="send-email-button" class="btn btn-primary mt-3 form-control" value="Send Email" />
                        </div>
                    </div>
            </form>
        </div>
        <div class="col-6">
            <div class="check mt-4" id="check"></div>
                <div class="progress-area mt-4 d-none" id="progress">
                    <div class="progress-message" id="progress-message">
                        <div>avidhaus.ahmer@gmail.com</div>
                        <div class="loading-container" id="loading-container">
                            <img src="images/loading.gif" alt="loading">
                        </div>
                    </div>
                </div>
        </div>
    </div>
        <section id="template">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="close" id="close">X</div>
                        <div>
                            <iframe id="template-iframe" src="" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>          
</div>
<script src="{!! asset('public/assets/js/main.js') !!}"></script>
<script >
$(document).ready(function() {
    $("input[name$='istemplateortext']").click(function() {
         var test = $(this).val();
         console.log(test);
         if (test == "template") {
            $("#templatediv").show();
            $("#composediv").hide();    
         }else{
            $("#composediv").show();
            $("#templatediv").hide();
         }
    });
});
</script>
@endsection