<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AU Telecom</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('public/favicon/favicon.png') !!}" />
     <style>
#container {
  height: 458px;
  border-radius: 6px;
}
#container1 {
  height: 458px;
  border-radius: 6px;
}
#container2 {
  height: 458px;
  border-radius: 6px;
}
.desb {
  width: 100%;
}
.officeoptionheadingpara{
    text-decoration: none;
    font-size: 12px;
    font-weight: bold;
    color: #000;
    font-family: 'Raleway', sans-serif; 
}
 input {width:400px; height:30px;}
input,textarea,button {padding:5px 10px; font-family:"Helvetica Neue", "Helvetica", "Arial", sans-serif; font-size:24px; font-weight:300; outline:none; border:none;}
#emojiPickerWrap {margin:10px 0 0 0;}
.field { padding: 20px 0; }
textarea { width: 400px; height: 200px; }
*{
    box-sizing: border-box;
}
.cp{
    width: 100%;
}

.carousel-indicators li{
background-color:#000 !important;
}
.carousel-indicators{
    top:100% !important;
}
.dark-mode .navbar-expand-lg .navbar-nav .nav-link {
    color:#fff;
}
.dark-mode .scroll .vc {
    color: white !important;
    position: relative !important;
    top: 0 !important;
    left:0px !important;
}
.dark-mode .scroll .emojiPickerIconWrap input{
    background-color: #fff !important;
}
.dark-mode .scroll .emojiPickerIconWrap input {
    width: 100% !important;
    background-color: #fff !important;
    color: white !important;
    border: #232428 !important;
    outline: #232428 !important;
    margin-left: 0px !important;
}
.dark-mode .scroll2 .emojiPickerIconWrap input{
    left: 0px !important;
}
.dark-mode .scroll {
    background-color: #fff !important;
    color: black !important;
}
.dark-mode .bio {
    background-color: #fff !important;
    color: black !important;
}

/* REPLY COMMENT */
.reply__box{
    /* display: none; */
    width: 300px;
    padding: 0px 5px;
    height: 40px;
    outline: none;
    background-color: #fff;
    border-radius: 5px;
    resize:none;
    padding-top: 5px;
}

.reply__text{
    cursor: pointer;
    color: #40c4f1;
    font-size: 11px;
    font-weight: bold;
    font-size: 13px;
    transition: all 0.3s;
}

.reply__text:hover{
    text-decoration: underline;
}

.view__reply{
    cursor: pointer;
    color: #40c4f1;
    font-size: 11px;
    font-weight: bold;
    display: block;
    text-align: right;
    transition: all 0.3s;
}
.view__reply:hover{
    text-decoration: underline;
}

.reply__btn{
    cursor: pointer;
    background-color: #40c4f1;
    color: white;
    font-size: 10px;
    padding: 10px 15px;
    border-radius: 5px;
}

.reply__section{
    display: none;
    align-items: center;
}

.replied__cmmnt{
    background-color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    width: 100%;
    margin-bottom: 10px;
    margin-left: 5px;
}

.userName__here{
    font-weight: bold;
    font-size: 12px;
    margin-bottom: 5px;
}

.main__rpSec{
    display: flex;
    margin-left: 10px;
}

.show__replied{
    margin-bottom: 5px;
}






@media screen and (max-width: 1900px) {
  .modal{
      left: 470px !important;
      width:50% !important;
  }
}
@media screen and (max-width: 1800px) {
  .modal{
      left: 450px !important;
      width:50% !important;
  }
}
@media screen and (max-width: 1700px) {
  .modal{
      left: 420px !important;
      width:50% !important;
  }
}
@media screen and (max-width: 1600px) {
  .modal{
      left: 395px !important;
      width:50% !important;
  }
}
@media screen and (max-width: 1500px) {
  .modal{
      left: 375px !important;
      width:50% !important;
    }
}
@media screen and (max-width: 1400px) {
  .modal{
      left: 350px !important;
      width:50% !important;
    }
}
@media only screen and (max-width: 1345px){
    .modal{
        width: 50% !important;
        left: 320px !important;
    }
}
@media screen and (max-width: 1300px){
    .modal{
        width: 50% !important;
        left: 320px !important;

    }
}
</style>
</head>
<!-- Css -->
<link rel="stylesheet" href="{!! asset('public/assets/css/bizzstyle.css') !!}">
<link rel="stylesheet" href="{!! asset('public/assets/css/main.css') !!}">
<!-- bootstrap -->
<link rel="stylesheet" href="{!! asset('public/bizzmain/cdns/bootstrap.min.css') !!}">
<link rel="stylesheet" href="{!! asset('public/bizzmain/fontawsm/fontawesome-free-5.15.3-web/css/all.css') !!}">
<link rel="stylesheet" href="{!! asset('public/bizzmain/fontawsm/fontawesome-free-5.15.3-web/css/all.min.css') !!}">
<link rel="stylesheet" href="{!! asset('public/bizzmain/fontawsm/fontawesome-free-5.15.3-web/css/fontawesome.css') !!}">
<link rel="stylesheet" href="{!! asset('public/bizzmain/fontawsm/fontawesome-free-5.15.3-web/css/fontawesome.min.css') !!}">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
<!-- jwquerry -->
<script src="{!! asset('public/bizzmain/cdns/jquery.min.js') !!}"></script>
<script src="{!! asset('public/bizzmain/cdns/popper.min.js') !!}"></script>
<script src="{!! asset('public/bizzmain/cdns/bootstrap.min.js') !!}"></script>

<script src="{!! asset('public/bizzmain/cdns/sweetalert.min.js') !!}"></script>
<link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/jquery.emojipicker.css') !!}">
<script type="text/javascript" src="{!! asset('public/assets/js/jquery.emojipicker.js') !!}"></script>
<link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/jquery.emojipicker.tw.css') !!}">
<script type="text/javascript" src="{!! asset('public/assets/js/jquery.emojis.js') !!}"></script>
<style>
    body {
        background-color: #f6fbfd;
        font-size: 12px;
    }
    
    .dark-mode {
        background-color: black;
    }
    #upload{
        display: none;
    }
     .comment{
       width: 15%;
       height: 40px;
       outline: none;
       border: none;
       margin-left: 0px !important;
       margin-bottom: 20px;
       margin-right: 8px;


   }
    .comment1{
background-color:#f3f3f3;
padding: 10px;
border-radius: 5px;
width: 99%;
    }
    .comment:hover{
        background-color: white;
        color: #40c4f1;
        border: 1px solid #40c4f1;
        font-weight: 700;
    }
    .aqua51{
        background-color: rgba(100, 13, 29, 1);
    background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from (rgba(56, 0, 0, 1)), to (rgba(100, 13, 29, 1)));
    border-top-color: #963d44;
    border-right-color: #40c4f1;
    border-bottom-color: #30080881;
    border-left-color: #40c4f1;
    }
    .time51{
        /* width: 85px; */
    height: 31px;
    /* padding-bottom: 35px; */
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    /* border: 1px solid #ccc; */
    position: relative;
    line-height: 32px;
    /* padding-left: 16px; */
    font-family: Lucida Sans, Helvetica, sans-serif;
    font-weight: 800;
    color: white;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    
    }
    .time51 .glare51 {
    position: absolute;
    opacity: 0.9;
    top: 0;
    left: 0px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    height: 2px;
    width: 100%;
    padding: 9px;
    background-color: rgba(255, 255, 255, 0.22);
    background-image: -webkit-gradient(linear, 0% 0%, 0% 95%, from(rgba(255, 255, 255, 0.6)), to(rgba(255, 255, 255, 0)));
}
.emojiPickerIcon{
    position: relative;
}
.scroll2 .emojiPickerIconWrap input {
    position: relative !important;
    background-color: rgb(238, 238, 238) !important;
    color: black !important;
}

.dark-mode .nav1 .has-arrow .dropdown-toggle:after {
    border-bottom: 2px solid #fff;
    border-right: 2px solid #fff;
}
.dark-mode .navdata {
    padding-left: 6px;
    padding-right: 6px;
}

.scroll2 .BA  button{
    position: absolute !important;
    top: -112px !important;
    left: 263px !important;
    height: 38px !important;
    background-color: #40c4f1!important;
    color: white !important;
    border-radius: 5px;
}

    .BA .emojiPickerIcon {
    height: 38px;
    width: 38px;
    background-color: rgb(238, 238, 238);
    position: relative;
    right: -218px;
    top: -74px;
    }
    @media screen and (min-width: 1201px){
        .cp .emojiPickerIconWrap input{
        position: relative;
    left: 64px !important;
    background: rgb(238, 238, 238) !important;
    border: 1px solid rgb(238, 238, 238) !important;
    width: 108% !important;
    }
    .scroll .cp button {
    background-color: #40c4f1!important;
    color: white !important;
   
}
.scroll2 .emojiPickerIconWrap input {
    position: relative !important;

    background-color: rgb(238, 238, 238) !important;
    color: black !important;
}
.scroll .vc2 {
    color: #40c4f1!important;
    position: absolute;
    top: -8px;
    left: 43px;
}
.scroll2 .BA button {
    position: absolute !important;
    top: -112px !important;
    left: 234px !important;
    height: 38px !important;
    background-color: #40c4f1!important;
    color: white !important;
    border-radius: 5px;
    width: 44px;
}
.BA .emojiPickerIcon{
    right: -191px !important; 
}
    }
@media screen and (min-width: 1260px) {
.rounded-circle{
    width: 40px;
    height: 40px;
    position: relative;
  
}
    .cp .emojiPickerIconWrap input{
        position: relative;
    left: 59px;
    background: rgb(238, 238, 238) !important;
    border: 1px solid rgb(238, 238, 238) !important;
    width: 108% !important;
    }
    .emojiPickerIcon{
        height: 38px;
    width: 38px;
    background-color: rgb(238, 238, 238);
    position: relative;
    }
    .cp button {
    top: -2px;
    width: 55px;
    background-color: #40c4f1;
    color: white;
    height: 40px;
    border-radius: 6px;
    position: relative;
    right: 13px;
}

}
.cp .emojiPickerIconWrap input {

    color: black !important;
}
@media screen and (max-width: 1259px){
    .cp button {
    width: 51px;
    background-color: #40c4f1;
    color: white;
    height: 40px;
    border-radius: 6px;
    position: relative;
    right: 9px;
    top: -2px;
            }
            .cp .emojiPickerIconWrap input {
    /* width: 100%; */
    outline: none;
    border: 1px solid #f3f3f3;
    border-radius: 4px;
    background-color: #f3f3f3;
    position: relative;
    left: 16px;
                }
                .rounded-circle{
                    width: 40px;
                    height: 40px;
                    position: absolute;
                    left: 23px;
                }

}
@media screen and (max-width: 1200px){
    .cp .emojiPickerIconWrap input{
        position: relative;
    left: 59px;
    background: rgb(238, 238, 238) !important;
    border: 1px solid rgb(238, 238, 238) !important;
    width: 108% !important;
    }
    .scroll .cp button {
    background-color: #40c4f1!important;
    color: white !important;

}
.scroll2 .rounded-circle {
    width: 40px !important;
    height: 40px !important;
    position: absolute !important;
    left: 23px !important;
}
}
@media screen and (max-width: 1000px){
.scroll .cp button {
    background-color: #40c4f1!important;
    color: white !important;

}
}
@media screen and (min-width: 1300px){
    .cp .emojiPickerIconWrap input{
        position: relative;
    left: 64px;
    background: rgb(238, 238, 238) !important;
    border: 1px solid rgb(238, 238, 238) !important;
    width: 108% !important;
    }
    .scroll .cp button {
    background-color: #40c4f1!important;
    color: white !important;

}.scroll .vc2 {
    color: #40c4f1!important;
    position: absolute;
    top: -8px;
    left: 43px;
}

}
@media screen and (min-width: 1400px){

  

    .scroll .vc2 {
        color: #40c4f1!important;
        position: absolute;
        top: -8px;
        left: 52px;
                }
 
    
}

@media screen and (min-width: 1500px){

    .scroll .cp button {
    background-color: #40c4f1!important;
    color: white !important;
 
}

.scroll .vc2 {
    color: #40c4f1!important;
    position: absolute;
    top: -8px;
    left: 52px;
}



}
/* @media screen and (min-width: 1500px){
    .scroll .cp button {
    background-color: #40c4f1!important;
    color: white !important;
    width: 65%;
    position: absolute;
    right: 0px;
    top: -38px;
    
}
} */
/* .BA .emojiPickerIconWrap input{
    position: relative !important;
    top: -36px !important;
    left: 72px !important;
    width: 110% !important;
    background-color: rgb(238, 238, 238) !important;
    color: black !important;
}
.BA .emojiPickerIcon {
    height: 38px;
    width: 38px;
    background-color: rgb(238, 238, 238);
    position: relative;
    right: -222px;
    top: -73px;
}
.BA button{
    position: absolute !important;
    top: -110px;
    left: 263px;
    height: 38px;
    background-color: #40c4f1!important;
    color: white !important;
    border-radius: 5px;
} */
.scroll .vc {
    cursor: pointer;
    color: #40c4f1!important;
    font-weight: bold !important;
    
}
.persondetailcolhead{
    font-size: 13px;
    color: #000;
    font-weight: 600;
    margin-bottom: 0 !important;
    padding-left: 10px;
    font-family: 'Raleway', sans-serif;
}
.officeoptionsheading{
    font-size: 13px;
    color: #000;
    font-weight: 600;
    margin-bottom: 0 !important;
    padding-left: 15px;
    padding-top: 7px;
    font-family: 'Raleway', sans-serif;
}
.dropdown-menu{
    position: absolute;
    transform: translate3d(-59px, 60px, 0px);
    top: 0px !important;
    left: 0px;
    will-change: transform;
}
.dropdown-item{
    font-size: 12px !important;
    color: #212529 !important;
    font-weight: 200;
    font-family: 'Open Sans', sans-serif !important;
}
.navbar ul li a i {
    font-size: 13px !important;
    margin-top: 2px;
}

@media screen and (min-width: 1600px){


hr{
    width: 81%;
    margin-left: 50px;margin-top: 10px !important;margin-bottom: 0 !important;
}
table {
        border-collapse: separate;
        border-spacing: 0 1px;
      }
      th {
        background-color: #FAF9F6;
        color: #121212;
        font-weight: bold;
      }
      th,
      td {
        text-align: center;
      }
      .table td, .table th {
    padding: 0.5rem !important;
    vertical-align: top;
}
.table thead th {
    vertical-align: bottom;
    border: none !important;
}
.carousel-indicators li{
    background-color: #000;

}
.carousel-indicators{
position: absolute;
top: 99% !important;
}


}
</style>
<script>
 $(function() {
    $("#upload_link ").on('click', function(e) {
     e.preventDefault();
     $("#upload:hidden ").trigger('click');
     });
});
</script>



<body>
    <!-- nav bar -->
    <section class="nav1 ">
        <!-- Nav tabs -->
        <div class="time12 aqua12">
            <div class="glare12"></div>
            <nav class="navbar navbar-expand-lg">
                @if($data->roleid <= 2)
                <a href="{{URL::to('adminDashboard')}}">
                <img src="{!! asset('public/bizzmain/logo-nav.png') !!}"  class="headerlogo" alt="">
                @elseif($data->roleid == 3)
                <a href="{{URL::to('managerDashboard')}}">
                <img src="{!! asset('public/bizzmain/logo-nav.png') !!}" class="headerlogo" alt="">
                @else
                <img src="{!! asset('public/bizzmain/logo-nav.png') !!}" class="headerlogo" alt="">
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0 text-center">
                        <li class="nav-item active">
                            <a class="nav-link active d-flex" href="index.html" style="">Time&nbsp;:<span class="ctime navdata"></span><span
                            class="sr-only">(current)</span></a>
                        </li>
                        <li class="vl"></li>

                        <li class="nav-item">
                            <a  class="nav-link d-flex" href="./Contact/contact.html" style="">Date <span class="navdata"><?php echo(date('d-F-Y'))?></span></a>
                        </li>
                        
                        <li class="vl"></li>
                        <!-- <li class="nav-item">
                            <a id="toggle_btn" onclick="mydark()" class="nav-link d-flex" style="">Mode <span class="pl-2"><i class="fa fa-adjust" aria-hidden="true"></i></span></a>
                        </li> -->
                        @if(session()->get("dptid") == 4 AND session()->get("role") == 4)
                        <li class="nav-item">
                            <a href="{{url('/itticketrequest')}}" target="_blank" class="nav-link d-flex">IT Support <p><i class="fa fa-bell" aria-hidden="true"></i></p></a>
                        </li>
                        @endif
                        
                        <li class="nav-item dropdown has-arrow main-drop">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <!-- <img src="{!! asset('public/assets/img/profiles/avatar-00.jpg') !!}" alt=""> -->
                                    <img src="{{URL::to('public/img/')}}/{{session()->get("image")}}" alt="">
                                <span class="status online"></span></span>
                                <span>{{session()->get("name")}}</span>
                            </a>
                            <div class="dropdown-menu">
                                <!--<a class="dropdown-item" href="{{url('/employeeprofile')}}">My Profile</a>-->
                                <a class="dropdown-item" href="#" onclick="return viewprofile({{session()->get("id")}});" ><i class="fa fa-user" style="padding-right: 7px;"></i>My Profile</a>
                                @if(session()->get('batchid') == 1406)
                                <a class="dropdown-item" href="{{url('/addemployeenos')}}"><i class="fa fa-plus" style="padding-right: 7px;"></i>Add Employee</a>
                                <a class="dropdown-item" href="{{url('/candidate_list')}}"><i class="fa fa-list" style="padding-right: 7px;"></i>Recruitment</a>
                                @endif
                                <a class="dropdown-item" href="{{url('/chapass')}}"><i class="fa fa-key" style="padding-right: 7px;"></i>Change Password</a>
                                <a class="dropdown-item" href="{{url('/')}}"><i class="fa fa-power-off" style="padding-right: 7px;"></i>Logout</a>
                                <!-- <a class="dropdown-item" href="{{url('/getimage')}}">Select Image</a> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>


    <!-- banner section
     -->
     <section class="personaldetailsection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">

                    <div class="personaldetails">
                        <h3 class="text-center personaldetailsheading1">Personal Details</h3>
                        <div class="d-flex mt-4 personaldetailsinnerdiv">
                            <div class="col-lg-5"><p class="persondetailcolhead">Batch ID:</p></div>
                            <div class="col-lg-7"><span class="font-weight-bold text-black">{{$data->elsemployees_batchid}}</span></div>        
                        </div>
                        <hr>
                    
                        <div class="d-flex mt-1" style="padding-top: 5px;">
                            <div class="col-lg-5"><p class="persondetailcolhead">CNIC:</p></div>
                            <div class="col-lg-7"><span class="font-weight-bold text-black">{{$data->elsemployees_cnic}}</span></div>
                        </div>
                        <hr>
                        <div class="d-flex mt-1" style="padding-top: 5px;">
                            <div class="col-lg-5"> <p class="persondetailcolhead">Cell:</p></div>
                            <div class="col-lg-7"><span class="font-weight-bold text-black">{{$data->elsemployees_cno}}</span></div>
                        </div>
                        
                       
                        <hr>
                        <div class="d-flex  mt-1" style="padding-top: 5px;">
                            <div class="col-lg-5"><p class="persondetailcolhead">Department:</p></div>
                            <div class="col-lg-7"><span class="font-weight-bold text-black">{{$data->dept_name}}</span></div>
                        </div>

                         <hr>
                         <div class="d-flex  mt-1" style="padding-top: 5px;">
                            <div class="col-lg-5"> <p class="persondetailcolhead">Designation:</p></div>
                           <div class="col-lg-7"><span class="font-weight-bold text-black">{{$data->DESG_NAME}}</span></div>
                        </div>
                         <hr>
                         <div class="d-flex  mt-1" style="padding-top: 5px;">
                            <div class="col-lg-5"><p class="persondetailcolhead">Reporting To:</p></div>
                            <div class="col-lg-7"><span class="font-weight-bold text-black">{{$data->reportingto}}</span></div>
                        </div>
						<hr>
                         <div class="d-flex mt-1" style="padding-top: 5px;">
                            <div class="col-lg-5"><p class="persondetailcolhead">Joining Date:</p></div>
                            <div class="col-lg-7"><span class="font-weight-bold text-black">{{$data->elsemployees_dofjoining}}</span></div>
                        </div>
                         <hr>
                         <div class="d-flex  mt-1 pb-3" style="padding-top: 5px;">
                            <div class="col-lg-5"><p class="persondetailcolhead">Date Of Birth:</p></div>
                            <div class="col-lg-7"><span class="font-weight-bold text-black">{{$data->elsemployees_dofbirth}}</span></div>
                            
                            
                        </div>
                        </div>
                        
                            <div class="mess">
<div class="col-lg-12"> 
    <button class="w-100 mt-3 messbtn1" type="button" name="rd" id="rd" value="1" checked>Mission</button>
    </div>

                                   
<div class="col-lg-12 col-md-12 col-sm-12 desc" id="div1">
                                        <br>
<p style="text-align: justify;">At AU Telecom, Every person in our company is a member of the team and a team player with the expectation and need that they perform their duties to their fullest capacity and potential.Our objective is a commitment to the highest quality customer service. The client satisfaction is our main focus, reached through innovative and cost effective services. We focus on creating the economic and social values for your business on global scale by providing a trustable workplace where you can connect, collaborate and attain the success.</span></p>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <button class="w-100 messbtn2" type="button" name="rd" id="rd" value="2"> Vision</button>
                                    </div>
                                    <div class="col-lg-12 desc" id="div2" style="display: none;">
                                        <br>
                                        <p style="text-align: justify;">AU Telecom is an extremely innovative company that is always open to unique ideas. We are always looking at new ways to improve our operations and the process of customer services.AU Telecom difference is in the details. We take the time to understand the challenges that our clients are facing and then we assist them in developing a solution program that works for their unique needs that fits in their budget.</span></p>
                   
                                  
                                        
                                    </div>
                                    <div class="col-lg-12 mt-2 pb-2"><button class="w-100 messbtn3" type="button" name="rd" id="rd" value="3">Value</button></div>
                                    <div class="col-lg-12 desc" id="div3" style="display: none;">
                                        <br>
                                        <p style="text-align: justify;"><li>Honesty, Integrity & Fairness in all dealings 'Be passionate & determined</li>
                                            <li>Following the Highest Standard of Professionalism.</li>
                                            <li>Contributing to society and demonstrating corporate responsibility.</li>
                                            <li>Relentlessly strive to get better.</li>
                                            <li>Deliver 100% client satisfaction.</li></span></p>
                                   
                                        
                                    </div>
                                
                            </div>
                       
                        <div class="birthdaysection">
                            <h3 class="text-center birthdaysectionheading1">Birthday & Anniversary</h3>
                            <div class="birthdaysectioninnerdiv">
                                <div class="col-lg-12 col-md-12 col-sm-12 m-0 p-0">
                            <div class="ann">
                            <div class="time11 aqua11">
                                <div class="glare11"></div>
                                <!-- <h5>Employee Birthday & Anniversary..</h5> -->
                            
                            </div>
                            <div class="pt2" style="background-color: white; width: 100%; ; height: 35px; margin-bottom: -20px;"></div>
                            </div>
                             <div class="scroll" style="height: 1374px;">
                                @if(isset($data->bdannouncementtitle))
                                <?php
                                $indexannbd=0;
                                ?>
                                @foreach($data->bdannouncementtitle as $val)
                                    <div class="scroll1 scroll2">
                                        <div class="row py-1">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                               
                                                
                                            </div>
                                            <div class="col-6 text-right">
                                          

                                            </div>
                                                 <div class="col-lg-12 col-md-12 col-sm-12 py-2">
                                                <h4>
                                                   {{$data->bdannouncementtitle[$indexannbd]}}
                                                </h4>    
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <p class="para">
                                                   {!!$data->bdannouncementdesc[$indexannbd]!!}
                                                </p>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="sec">
                                                    <img src="{{URL::to('public/announcement/')}}/{{$data->bdannouncementimage[$indexannbd]}}" alt="" class="w-100">
                                                </div>
                                            </div>
                                           <!--  <div class="col-12 text-right">
                                                <button class="time51 aqua51 comment" onclick="submitcomment({{$data->bdannouncementid[$indexannbd]}})">
                                                    <div class="glare51"></div>
                                                    <i class="fas fa-comments"> Comment</i>
                                                </button>
                                            </div> -->
                                            
                                                
                                            <div class="col-2 mt-5">
                                                <img class="rounded-circle" src="{{URL::to('public/img/')}}/{{session()->get("image")}}" alt="">
                                            </div>
                                            <div class="col-8 mt-5">
                                                <input type="text" class="form-control" name="" id="input-default{{$data->bdannouncementid[$indexannbd]}}" class="" placeholder="Type Comment" >
                                                </div>
                                            <div class="col-1 mt-5" style="padding-left: 0;">
                                                <button style="background: #40c4f1; color: #fff; height: 38px; width: 40px;" onclick="submitcomment({{$data->bdannouncementid[$indexannbd]}})"><span><i class="fas fa-paper-plane"></i></span></button>
                                            </div>
                                            
                                                <script>
                                                    $(document).ready(function () {
                                                    $('#input-default'+<?php echo ($data->bdannouncementid[$indexannbd]);?>).emojiPicker();
                                                    });
                                                </script>
                                            
                                            <?php
                                            $getcommentall = DB::connection('mysql')->table('commentpost')
                                            ->join('elsemployees','elsemployees.elsemployees_empid', '=','commentpost.created_by')
                                            ->where('commentpost.announcement_id','=',$data->bdannouncementid[$indexannbd])
                                            ->whereIn('commentpost.commentpost_status',["Pending","Approved"])
                                            ->select('commentpost.commentpost_id','commentpost.commentpost_comment','commentpost.created_at','elsemployees.elsemployees_name','elsemployees.elsemployees_image')
                                            ->orderByDesc('commentpost_id')
                                            ->limit(0)
                                            ->get();
                                            ?>
                                            @foreach($getcommentall as $getcommentsalls)
                                            <?php
                                            $commentdate = explode(' ', $getcommentsalls->created_at);
                                            $formatedcommentdate = date("d-F-Y", strtotime($commentdate[0]));  
                                            ?>
                                            
                                            
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-lg-1">
            
                                                        <img src="{{URL::to('public/img/')}}/{{$getcommentsalls->elsemployees_image}}" class="rounded-circle" alt="" style="width: 40px; height: 40px;">
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="comment1">
                                                            <div class="row no-gutters">
                                                                <div class="col-6"><h6>{{$getcommentsalls->elsemployees_name}}</h6></div>
                                                                <div class="col-6 text-right"><p>{{$formatedcommentdate}}</p></div>
                                                            </div>
                                                            <p style="padding-left: 0px !important;">
                                                                {{$getcommentsalls->commentpost_comment}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><div style="color: white">.</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                    <a class="vc" style="cursor: pointer; color: #40c4f1; font-weight: bold;display: flex;justify-content: center;" onclick="viewdetails({{$data->bdannouncementid[$indexannbd]}})">Click To View Comments</a>
                                    </div>
                                    
                                    <br>
                                    <div class="hor ml-auto mr-auto mb-3" style="width: 95%; border-bottom: 2px solid #40c4f1; margin-top: px;"></div>
                                <?php
                                $indexannbd++;
                                ?>
                                @endforeach
                                @endif
                                    </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div style="background: #fff; box-shadow: 0px 6px 16px rgb(0 0 0 / 20%); border-radius: 10px;">
                        <div class="banner">
                            @if($data->elsemployees_coverimage == null)
                            <img src="{{URL::to('public/img/defaultcover.png')}}" alt=" ">
                            @else
                            <img src="{{URL::to('public/coverimage/')}}/{{$data->elsemployees_coverimage}}" alt=" ">
                            @endif
                            <i class="fa fa-camera" style="top: 1%;
    position: absolute;
    left: 5%;
    color: white;" onclick="getcover()"></i>

                        </div>
                        <div class="left-side">
                            <div class="profile">
                                @if($data->elsemployees_image == null)
                                <img src="{{URL::to('public/img/no_image.jpg')}}" alt=" ">
                                @else
                                <img src="{{URL::to('public/img/')}}/{{$data->elsemployees_image}}" alt=" ">
                                @endif
                             
                                </div>
                                <div class="w-100" style="position: absolute;top:34%;">
                                    <h6 style="color: #40c4f1; font-weight: 700;text-align: center;padding-top: 20px;">{{$data->elsemployees_name}}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6 class="mt-1" style="font-weight: bold;">{{$data->DESG_NAME}}</h6>
                                      <h6 class="pro" style="font-weight: bold;">{{$data->dept_name}}</h6>
                                      <h6 class="pro" style="font-weight: bold;">{{$data->elsemployees_email}}</h6>
                                      
                                    </div>
                                </div>
                        </div>
                    </div>
                  
                    <div style="background: #fff;box-shadow: 0px 6px 16px rgb(0 0 0 / 20%); border-radius: 10px; padding-bottom: 25px;margin-top: 15px; padding-left: 15px; padding-right: 15px;height: 1710px;">
                        <h3 style="padding-top: 30px;font-weight: bold;color: #000;" class="text-center">Announcement Feed</h3>
                        <div class="bio bio1" style="height: 1560px !important; overflow-y: scroll !important; background-color: white; margin-top: 15px; border-radius: 4px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 m-0 p-0">
                        <div class="ann">
                        <div class="time11 aqua11">
                            <div class="glare11"></div>
                            <h5></h5>
                        
                        </div>
                        <div class="pt2" style="background-color: white; width: 100%; ; height: 35px; margin-bottom: -20px;"></div>
                        </div>
                         <div class="scroll" style="height: 1374px;">
                                @if(isset($data->allannouncementtitle))
                                <?php
                                $indexannall=0;
                                ?>
                                @foreach($data->allannouncementtitle as $val)
                                    <div class="scroll1 scroll3">
                                        <div class="row py-3">
                                        <div class="col-lg-6">
                                               
                                                <script>
                                                    $(document).ready(function() {
                                                        $("#toggle_btn").click(function() {
                                                            $(".imgtog").toggle();
                                                            
                                                        });
                                                    });
                                                </script>
                                            </div>
                                            <div class="col-6 text-right">
                                            

                                            </div>
                                                 <div class="col-lg-12 col-md-12 col-sm-12 py-2">
                                                <h4 class="font-weight-bold text-black">
                                                   {{$data->allannouncementtitle[$indexannall]}}
                                                </h4>    
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <p class="para font-weight-bold text-black">
                                                   {!!$data->allannouncementdesc[$indexannall]!!}
                                                </p>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="sec">
                                                    <?php
                                                    $getexplode = explode(".", $data->allannouncementimage[$indexannall]);
                                                    $getextension = end($getexplode);
                                                    $allowedimageext = array('jpeg','bmp','png','jpg','gif');
                                                    if (in_array($getextension, $allowedimageext)) {
                                                    ?>
                                                    @if($data->allannouncementimage[$indexannall] != "no_image.jpg")
                                                    <img src="{{URL::to('public/announcement/')}}/{{$data->allannouncementimage[$indexannall]}}" class="w-100" alt="">
                                                    @endif
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <video width="100%" autoplay muted loop>
                                                    <source src="{{URL::to('public/announcement/')}}/{{$data->allannouncementimage[$indexannall]}}" class="w-100" type="video/mp4" />
                                                    </video>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                    
                             
                                <script>
                                                    $(document).ready(function () {
                                                    $('#input-default'+<?php echo ($data->allannouncementid[$indexannall]);?>).emojiPicker();
                                                    });
                                                </script>
                                            
                                            <?php
                                            $getcommentall = DB::connection('mysql')->table('commentpost')
                                            ->join('elsemployees','elsemployees.elsemployees_empid', '=','commentpost.created_by')
                                            ->where('commentpost.announcement_id','=',$data->allannouncementid[$indexannall])
                                            ->whereIn('commentpost.commentpost_status',["Pending","Approved"])
                                            ->select('commentpost.commentpost_id','commentpost.commentpost_comment','commentpost.created_at','elsemployees.elsemployees_name','elsemployees.elsemployees_image')
                                            ->orderByDesc('commentpost_id')
                                            ->limit(0)
                                            ->get();
                                            ?>
                                            @foreach($getcommentall as $getcommentsalls)
                                            <?php
                                            $commentdate = explode(' ', $getcommentsalls->created_at);
                                            $formatedcommentdate = date("d-F-Y", strtotime($commentdate[0]));  
                                            ?>
                                            
                                            
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-xl-1 col-lg-2 col-md-1 col-1 pt-3">
            
                                                        <img src="{{URL::to('public/img/')}}/{{$getcommentsalls->elsemployees_image}}" class="rounded-circle" alt="" style="width: 40px; height: 40px;">
                                                    </div>
                                                    <div class="col-xl-11 col-lg-10 col-md-11 col-11">
                                                        <div class="comment1">
                                                            <div class="row no-gutters">
                                                                <div class="col-6"><h6>{{$getcommentsalls->elsemployees_name}}</h6></div>
                                                                <div class="col-6 text-right"><p>{{$formatedcommentdate}}</p></div>
                                                            </div>
                                                            <p style="padding-left: 0px !important;">
                                                                {{$getcommentsalls->commentpost_comment}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><div style="color: white">.</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">        
                                <div class="col-lg-2"><img class="rounded-circle" style="width: 40px; height: 40px" src="{{URL::to('public/img/')}}/{{session()->get("image")}}" alt=""></div>
                                <div class="col-lg-8" style=" background-color: #f9f9f9 !important;border-radius:26px"><input type="text" class="form-control contr2" name="" id="input-default{{$data->allannouncementid[$indexannall]}}" class="" placeholder="Type Comment" ></div>
                                <div class="col-lg-2" style=""><button style="background: #40c4f1; color: #fff; height: 38px; width: 40px;" onclick="submitcomment({{$data->allannouncementid[$indexannall]}})"><span><i class="fas fa-paper-plane"></i></span></button></div>
                            </div> 
                                    <div class="col-12 mt-2">
                                    <a class="" style="cursor: pointer; color: #40c4f1; font-weight: bold;text-align: center;display: flex;justify-content: center;" onclick="viewdetails({{$data->allannouncementid[$indexannall]}})">Click To View Comments</a>
                                    </div>
                                  
                                    <br>
                                    <div class="hor ml-auto mr-auto" style="width: 95%; border-bottom: 2px solid #40c4f1; margin-top: 10px;"></div>
                                <?php
                                $indexannall++;
                                ?>
                                @endforeach
                                @endif
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="statusection">
                    <h3 class="text-center statusectionheading1">Status</h3>
                    <div class="row mt-4">
                        <div class="col-lg-4"> 
                            <p class="officeoptionsheading">Check In :</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="statussectioninnerdiv">
                                    <a class="abc officeoptionheadingpara" href="#"><span class="statussectionpara"><i class=" abc fa fa-fingerprint"></i></span> <?php $year = date("Y");
                                    $month = date("m"); $timein = DB::connection('sqlsrv')->table('Checkinout')
                                    ->where('Checkinout.Userid','=',$data->elsemployees_batchid)
                                    ->where('Checkinout.CheckType','!=','2')
                                    ->where('Checkinout.CheckType','!=','1')
                                    ->whereYear('Checkinout.CheckTime', $year)
                                    ->whereMonth('Checkinout.CheckTime', $month)
                                    ->select('Checkinout.*')
                                    ->orderBy('Checkinout.CheckTime', 'DESC')
                                    ->first();
                                    if(isset($timein->CheckTime)){
                                    $explodetime = explode(' ', $timein->CheckTime);
                                    $fingertimein = date('h:i:s A', strtotime($explodetime[1]));
                                    }else{
                                    $fingertimein = "-";
                                    }
                                     echo($fingertimein)?></a></div>
                            </div>
                    </div>
                    <hr class="statussectionhr">
                    <div class="row" style="padding-top: 7px;">
                        <div class="col-lg-4"> 
                            <p class="officeoptionsheading">Portal In :</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="statussectioninnerdiv">
                                    <a class="abc officeoptionheadingpara" href="#"><span class="statussectionpara"><i class=" abc fa fa-fingerprint"></i></span><?php $year = date("Y"); $month = date("m"); $portalattendance = DB::connection('mysql')->table('attendance')
                                                ->where('attendance.elsemployees_empid','=',$data->elsemployees_batchid)
                                                ->where('attendance.attendance_month','=',$month)
                                                ->where('attendance.attendance_date','=',date('Y-m-d'))
                                                ->select('attendance.attendance_mark','attendance.attendance_date')
                                                ->first(); 
                                                if(isset($portalattendance->attendance_date)){
                                                if($portalattendance->attendance_date == date('Y-m-d')){
                                                $portaltime = date('h:i:s A', strtotime($portalattendance->attendance_mark));
                                                }}else{
                                                $portaltime = "-";
                                                }
                                                echo($portaltime)?></a></div>
                            </div>
                    </div>
                    <hr class="statussectionhr">
                    <div class="row" style="padding-top: 7px;">
                        <div class="col-lg-4"> 
                            <p class="officeoptionsheading">Add Remind :</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="statussectioninnerdiv" onclick="empreminder()">
                                    <a class="abc officeoptionheadingpara" href="#"><span class="statussectionpara"><i class="abc msgs fa fa-bell"></i></span>Add Reminder</a></div>
                            </div>
                    </div>
                    <hr class="statussectionhr">
                    <div class="row" style="padding-top: 7px;">
                        <div class="col-lg-4"> 
                            <p class="officeoptionsheading">Complain :</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="statussectioninnerdiv" onclick="complain()">
                                    <a class="abc officeoptionheadingpara" href="#"><span class="statussectionpara"><i class="abc msgs fas fa-mail-bulk "></i></span>Complain To Hr</a></div>
                            </div>
                    </div>
                    <hr class="statussectionhr">
                    <div class="row" style="padding-top: 7px;">
                        <div class="col-lg-4"> 
                            <p class="officeoptionsheading">Ticket :</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="statussectioninnerdiv" onclick="itticket()">
                                    <a class="abc officeoptionheadingpara" href="#"><span class="statussectionpara"><i class="abc msgs fas fa-mail-bulk "></i></span>Ticket To IT</a></div>
                            </div>
                    </div>
                    <hr class="statussectionhr">
                    <div class="row" style="padding-top: 7px;">
                        <div class="col-lg-4"> 
                            <p class="officeoptionsheading">Compose :</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="statussectioninnerdiv" onclick="itticket()">
                                    <a class="abc officeoptionheadingpara" href="{{url('/composeemail')}}"><span class="statussectionpara"><i class="abc msgs fas fa-mail-bulk "></i></span>Compose Email</a></div>
                            </div>
                    </div>
                    <hr class="statussectionhr">
</div>
<div>
                        <div class="col-lg-12 mt-3" style="padding-left: 0px; padding-right: 0px;"><a class="mainbtns" id="upload_link" onclick="commingsoon()" href="#"><span><i class="mainbtnsspan fa fa-envelope-open-text"></i></span>Email</a></div>
                        <div class="col-lg-12 mt-3" style="padding-left: 0px; padding-right: 0px;"><a class="mainbtns" id="upload_link" onclick="commingsoon()" href="#"><span><i class="mainbtnsspan  fas fa-comment"></i></span>Chat</a></div>
                        <div class="col-lg-12 mt-3" style="padding-left: 0px; padding-right: 0px;"><a class="mainbtns" id="upload_link" onclick="commingsoon()" href="#"><span><i  class="mainbtnsspan fa fa fa-users"></i></span>CRM</a></div>
                    </div>
                    <div class="activitiesection">
                    <h3 class="font-weight-bold text-black text-center pt-4 pb-4">My Acitivities</h3>
                   <div class="row">
                    <div class="col-lg-4"> 
                        <div class="activitiesectiondivleft">

<a href="{{URL::to('myforms')}}" target="_blank" class="activitiesectionanchor"><span> <i class="abc msgs fa fa-file-signature" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>My Forms</a>
</div>
                </div>
                    <div class="col-lg-4">
                        <div class="activitiesectiondivcenter">

<a href="{{URL::to('selectbioattendancemonth')}}" target="_blank" class="activitiesectionanchor"><span>
 <i class="abc msgs fa fa-file-invoice-dollar" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>Pay Slips</a>
</div>
                    </div>
                    <div class="col-lg-4">
                        <div class="activitiesectiondivright">

<!-- <a href="{{URL::to('restaurantlist')}}" target="_blank" class="activitiesectionanchor"><span>  -->
<a href="#"  class="activitiesectionanchor"><span> 
<i class="abc msgs fa fa-drumstick-bite" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>Food Portal</a>
</div>
                    </div>
                   </div>
                   <div class="row mt-2">
                    <div class="col-lg-4">
                        
                        <div class="activitiesectiondivleft">

<a href="{{URL::to('games')}}" target="_blank" class="activitiesectionanchor"><span> 
<i class="abc msgs fa fa-gamepad" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>Game</a>
</div>
                    </div>
                    <div class="col-lg-4">
                        <div class="activitiesectiondivcenter">

<a href="{{URL::to('bizzlibrary')}}" target="_blank" class="activitiesectionanchor"><span>
<i class="abc msgs fa fa-book-reader" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>Library</a>
</div>
</div>
<div class="col-lg-4">
    
    <div class="activitiesectiondivright">

<a href="{{URL::to('websites')}}" target="_blank" class="activitiesectionanchor"><span>
<i class="abc msgs fa fa-globe" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>Websites</a>
</div>
</div>
                   </div>
                   <div class="row mt-2">
                    <div class="col-lg-4">
                        <div class="activitiesectiondivleft">

<a href="{{URL::to('employee_list')}}" target="_blank" class="activitiesectionanchor"><span>
<i class="abc msgs fa fa-address-book" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>AU Directory</a>
</div>
                        </div>
                    </div>
                </div>
            <div style="background: #fff; box-shadow: 0px 6px 16px rgb(0 0 0 / 20%); border-radius: 10px;  padding-bottom: 10px;margin-top: 15px;">
                        <h3 class="font-weight-bold text-black text-center" style="padding-top: 20px;">My Attendance</h3>
                      <div style="height: 362px; overflow-x: scroll;">
                        <table class="table" style="width: 95%;margin-left:5px;">
                            <thead>
                              <tr style="border: 1px solid #d3d3d3;">
                                <th scope="col" style="border-top-left-radius: 5px;border-top-right-radius: 5px;">Date</th>
                                <th scope="col">Time-In</th>
                                <th scope="col">Time-Out</th>
                                <th scope="col" style="border-top-left-radius: 5px;border-top-right-radius: 5px;">Result</th>
                              </tr>
                            </thead>
                            <tbody style="white-space: nowrap;">
                                @if($attendancedata != null)
                                @foreach($attendancedata as $attdata)
                                <tr style="border: 1px solid #d3d3d3;">
                                    <?php $splitattendancedate = explode("-",$attdata['emp_date']);?>
                                   <td >{{$splitattendancedate[1]}}-{{$splitattendancedate[2]}}</td>
                                   <td>{{$attdata['emp_checkin']}}</td>
                                   <td>{{$attdata['emp_checkout']}}</td>
                                   <?php
                                    $cout_date = date('Y-m-d', strtotime($attdata['emp_date'] . ' +1 day'));
                                    if($data->elsemployees_batchid == 1218 && $attdata['emp_checkin'] != "MissIn" && $attdata['emp_checkout'] != "MissOut"){
                                    $time1 = strtotime($attdata['emp_date'].' '.$attdata['emp_checkin']);
                                    $time2 = strtotime($cout_date.' '.$attdata['emp_checkout']);
                                    $gettime = sprintf($hour = abs($time1 - $time2)/(60*60));
                                    }else{
                                    $time1 = strtotime($attdata['emp_date'].' '.$attdata['emp_checkin']);
                                    $time2 = strtotime($attdata['emp_date'].' '.$attdata['emp_checkout']);
                                    $gettime = sprintf(round($hour = abs($time1 - $time2)/(60*60)));
                                    }
                                    ?>
                                   @if($attdata['emp_checkin'] == "MissIn" || $attdata['emp_checkout'] == "MissOut")
                                   <?php $attresult = "Absent"?>
                                   <td class="attt" style="background-color: #FFE4E1;color: #db7093;font-weight: bold;">Absent</td>
                                    @elseif($gettime < 7.56)
                                    <?php $attresult = "Late"?>
                                    <td class="attt" style="background-color: #FAFAD2;color: orange;font-weight: bold;">Late</td>
                                    @elseif($gettime < 4)
                                    <?php $attresult = "Half Day"?>
                                    <td class="attt" style="background-color: #b7cefa;">Half Day</td>
                                    @else
                                    <?php $attresult = "Present"?>
                                    <td class="attt" style="background-color: #e5ffe5;color: #4ee44e;font-weight: bold;">Present</td>
                                   @endif
                                <!--    @if($attdata['emp_checkin'] == "MissIn" || $attdata['emp_checkout'] == "MissOut")
                                   <td>0</td>
                                   @else
                                   <td>{{$gettime}}</td>
                                   @endif -->
                                   <!-- <td><a href="#" title="Add Correction Request" id="{{$attdata['emp_date']}}~{{$attresult}}" onclick="addcorrection(this.id)" data-toggle="modal" data-target="#add_correction"><i class="fa fa-plus"></i></a></td> -->
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                          </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{URL::to('dailyattendance')}}" class="attendancebtn">View All Attendance</a>
                            </div>
                            </div>
                       
                        
                    </div>
                    <div style="background: #fff;box-shadow: 0px 6px 16px rgb(0 0 0 / 20%); border-radius: 10px; padding-bottom: 25px;margin-top: 15px;">
                    <h3 class="font-weight-bold text-black text-center" style="padding-top: 20px;">Training Manual</h3>
                   <div class="row mt-3">
                    <div class="col-lg-4"> 
                        <div style="background: #f9f9f9;display: flex;justify-content: center;margin-left: 10px;">

<a href="{{URL::to('trainingmanualpdf')}}" target="_blank"style="color: #000;font-size: 11px;padding-top: 10px;font-weight: 600;"><span> <i class="abc msgs fa fa-file-pdf" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>PDF</a>
</div>
                        
                
                </div>
                    <div class="col-lg-4">
                        <div style="background: #f9f9f9;display: flex;justify-content: center;margin-left: 10px;margin-right: 10px;">

<a href="{{URL::to('trainingmanualvideo')}}" target="_blank"style="color: #000;font-size: 11px;padding-top: 10px;font-weight: 600;"><span> <i class="abc msgs fa fa-video" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>Video</a>
</div>      
                    
                    </div>
                    <div class="col-lg-4">
                        <div style="background: #f9f9f9;display: flex;justify-content: center;margin-right: 10px;">

<a href="{{URL::to('trainingmanualaudio')}}" target="_blank"style="color: #000;font-size: 11px;padding-top: 10px;font-weight: 600;"><span> <i class="abc msgs fa fa-volume-up" style="    color: #40c4f1;
                font-size: 20px;padding-bottom: 10px;"></i></span><br>Audio</a>
</div> 


                    </div>
                   </div>
              
                </div>
                <div class="" style="background: #fff;box-shadow: 0px 6px 16px rgb(0 0 0 / 20%); border-radius: 10px; margin-top: 15px;padding-bottom: 25px;margin-bottom: 20px;">
                    <h3 class="font-weight-bold text-black text-center" style="padding-top: 20px;">My Gallery</h3>
                            
                    <div id="demo" class="carousel slide" data-ride="carousel">
                
                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                </ul>
                
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    @if(isset($data->albumid))
                                    <?php
                                    $indexalbum=0;
                                    ?>
                                    @foreach($data->albumid as $val)
                                        @if($indexalbum==0)  
                                            <div class="carousel-item active">
                                        @else
                                        <div class="carousel-item">
                                        @endif
                                        <a href="{{URL::to('gallerylist/')}}/{{$val}}" target="_blank" class="avatar">
                                            <img src="{{URL::to('public/album/')}}/{{$data->albumimage[$indexalbum]}}" alt="Los Angeles" width="100%" >
                                        </a>
                                        </div>
                                    <?php
                                    $indexalbum++;
                                    ?>
                                    @endforeach
                                    @endif
                                </div>
                
                                 <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                            <a href="{{URL::to('albumlist')}}" class="gallerybtn">View Gallery</a>
                        </div>
                        
           
                        

                </div>
                </div>
        
            
   
            

     
        
        
     
     </section>

     <!-- Footer -->
<footer class="text-center" style="background: #0f1431;">
<h5 class="font-weight-bold text-white">© 2023 Copyright&nbsp;:&nbsp;AU Telecom</h5>

</footer>
<!-- Footer -->

<div id="modals">
</body>
<script>
function itticket() {
    $.get('{{ URL::to("/itticket")}}',function(data){
    $('#modals').empty().append(data);
    $('#itticket').modal('show');
    });
}
function viewdetails($id){
    $.get('{{ URL::to("/viewdetails")}}/'+$id,function(data){
    $('#modals').empty().append(data);
    $('#view').modal('show');
    /* console.log("test"); */
    });
}
function empreminder(){
    $.get('{{ URL::to("/empreminder")}}',function(data){
    $('#modals').empty().append(data);
    $('#empreminder').modal('show');
    });
}
function complain(){
    $.get('{{ URL::to("/complain")}}',function(data){
    $('#modals').empty().append(data);
    $('#complain').modal('show');
    });
}
function getimage(){
    $.get('{{ URL::to("/getimage")}}',function(data){
    $('#modals').empty().append(data);
    $('#getimage').modal('show');
    });
}
function getcover(){
    $.get('{{ URL::to("/getcover")}}',function(data){
    $('#modals').empty().append(data);
    $('#getcover').modal('show');
    });
}
function commingsoon(){
swal("AU Launching", "...Coming Soon");
}
function bizzcall($id){
let newWindow = window.open("https://chat.bizzworld.local/dialpad?number="+$id, "mywindow","menubar=0,location=0,status=0,titlebar=0,toolbar=0,resizable=0,width=320,height=650");
console.log(newWindow);
}
function addcorrection($date){
    $.get('{{ URL::to("/addcorrectionmodal")}}/'+$date,function(data){
    $('#modals').empty().append(data);
    $('#addcorrection').modal('show');
    });
}
function viewprofile($id) {
    window.location.replace('{{ URL::to("/employeeprofile")}}/'+$id);
}
function addachieved($id){
    $.get('{{ URL::to("/addachievedmodal")}}/'+$id,function(data){
    $('#modals').empty().append(data);
    $('#addachieved').modal('show');
    });
}
function mydark() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}
function submitcomment($id){
      $comment = $("#input-default"+$id).val();
      $.get('{{ URL::to("/submitcomment")}}/'+$id+'/'+$comment);
      swal("Published", "Comment Submited Successfully!", "success");
      $("#input-default"+$id).val('');
}
$(document).ready(function () {
    currenttime();
    function currenttime() {
        var date = new Date
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;

        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";

        var day = weekday[date.getDay()];
        strTime += ' ' + day;

        $('.ctime').html(strTime);
    }
    $(function () {
        setInterval(currenttime, 1000);
    });
        $("button[name$='rd']").click(function() {
            var test = $(this).val();

            $("div.desc").hide();
            $("#div" + test).show();
        });
        $("button[name$='sb']").click(function() {
            var test = $(this).val();

            $("div.desb").hide();
            $("#divsb" + test).show();
            $("section.score").hide();
            $("#divscore" + test).show();
            $("figure.highchart").hide();
            $("#high" + test).show();
        });
        <?php
        //portal timein start
            $gettodaysattendance = DB::connection('mysql')->table('attendance')
            ->where('attendance.elsemployees_empid','=', session()->get('batchid')) 
            ->where('attendance.attendance_date','=', date('Y-m-d')) 
            ->select('attendance.*')
            ->first();
            // dd($gettodaysattendance);
           
            if (isset($gettodaysattendance) == null && date('h:i:s A') < "12:01:00 AM" && date('h:i:s A') > "07:00:00 PM") {
            ?>
                    swal({
                  title: "Time In?",
                  text: "Once Time In, you will not be able to change!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: false,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.get('{{ URL::to("/usertimein")}}');
                    swal("Time In Successfully", {
                      icon: "success",
                    });
                    window.location.reload();
                  } else {
                    swal("No action applied");
                  }
                });
                <?php
                }
                //portal timein end
                ?>
});
</script>
</html>