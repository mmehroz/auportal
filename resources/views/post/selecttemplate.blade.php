@extends('layout.apptheme')
@section('hr-HRM')
<style type="text/css">
    .page-wrapper>.content {
    padding: 20px !important; 
}
    .form-control {
        color: #000000fc!important;
   }
   input[type="radio"][id^="cb"] {
        display: none;
    }
    
    label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        margin: 20px;
        cursor: pointer;
    }
    
    label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }
    
    label img {
        height: auto;
        width: 100%;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }
    
     :checked+label {
        border-color: ##40c4f1;
        border-radius: 3px;
        /* border: 2px solid #333; */
    }
    
     :checked+label:before {
        content: "✓";
        background-color: white;
        transform: scale(1.5);
        color: rgb(13, 236, 13);
        font-weight: 900;
        /*padding-bottom: 25px;*/
        border: 1px solid ##40c4f1;
    }
    
     :checked+label img {
        transform: scale(0.9);
        box-shadow: 0 0 5px #333;
        z-index: -1;
    }
    
    .divider {
        border-bottom: 1px solid ##40c4f1;
        width: 100%;
        margin-bottom: 50px;
        margin-top: 50px;
    }
    
    .border {
        border: 1px solid transparent !important;
        border-bottom: 1px solid #333 !important;
        width: 100%;
        height: 45px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Select Post Template</h3>
                </div>
            </div>
        </div>
        @if(session('message'))
            <div><p class="alert alert-info mt-3" >{{session('message')}}</p> </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card flex-fill">
                            <form action="{{ URL::to('/posteditor')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }} 
                                <div class="row">
                                    <div class="col-6">
                                        <input type="radio" name="template" value="1" id="cb1" />
                                        <label for="cb1"><img src="{!! asset('public/posttemplate/template1.jpg') !!}" width="100%" /></label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="template" value="2" id="cb2" />
                                        <label for="cb2"><img src="{!! asset('public/posttemplate/template2.jpg') !!}" width="100%" /></label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="template" value="3" id="cb3" />
                                        <label for="cb3"><img src="{!! asset('public/posttemplate/template3.png') !!}" width="100%" /></label>
                                    </div>
                                    <div class="col-12">
                                        <div class="divider"></div>
                                    </div>

                                 </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="">
            
        </form>        
    </div>
@endsection