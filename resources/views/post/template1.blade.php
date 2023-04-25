@extends('layout.apptheme')
@section('hr-HRM')
<link rel="stylesheet" href="{!! asset('public/assets/css/poststyle.css') !!}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<div class="page-wrapper">
    <div class=" container-fluid" style="padding: 0px 100px;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="html-content-holder">
                       <section class="main pt-3">
                            <div class="container">

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="{!! asset('public/BDPost/5.png') !!}" alt="" width="250px">
                                    </div>
                                    <div class="col-6 ">
                                        <div class="heading">
                                            <h1> Happy <span class="yellow"> Birthday</span></h1>
                                        </div>
                                        <div class="para">
                                            <p>
                                                Birthday is the biggest festival of someone’s life. It is the day when a person comes to the world and celebrates it each year by thanking God and giving them another beautiful year of life. To wish on this auspicious occasion on someone’s birthday we
                                                always look up for some beautiful birthday wishes to congratulate them.
                                            </p>
                                        </div>
                                        <div class="head">
                                            <h2>"HAMDAN KHAIRI"</h2>
                                        </div>
                                    </div>
                                    <div class="col-6 pb-5">
                                        <div class="main-img text-right">
                                            <img src="{!! asset('public/BDPost/4.png') !!}" alt="" width="88%">

                                        </div>
                                        <div class="sec-img">
                                            <img src="{!! asset('public/BDPost/3.png') !!}" alt="" width="180px">
                                        </div>
                                        <div class="thr-img">
                                            <img src="{!! asset('public/BDPost/2.png') !!}" alt="" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input id="btn-Preview-Image" type="button" value="Preview"/>
                <a id="btn-Convert-Html2Image" href="#">Download</a>
                <br/>
            </div>
        </div><br/>
        <div class="row">
            <div class="col-md-12">
                <div id="previewImage">
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    
var element = $("#html-content-holder"); // global variable
var getCanvas; // global variable
 
    $("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
             }
         });
    });

    $("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
    });

});

</script>
@endsection