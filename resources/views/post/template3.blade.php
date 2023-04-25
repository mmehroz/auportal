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
                     
                        <section class="start">
                        <div class="img">
                           <img src="{!! asset('public/BDPost/template2.png') !!}" style="width: 1000px">
                           <input type="text" class="trasn" name="text" placeholder="Type Name">
                        </div>
                        <div class="move">
                        <input type="file" name="input" id="files" accept=".jpg, .jpeg, .png" required="required" style="background-color: transparent; color: transparent;">
                        <img  class="img-fluid img-thumbnail-user" id="image" />
                        </div>
                        </section>
                        <style>
                            .start{
                                position: relative;
                            }
                            .img{
                                width: 100%;
                                height: auto;
                                padding-top: 50px
                                
                            }
                            .move{
                               width: 380px;
                                height: 380px;
                                position: absolute;
                                transform: translate(0%, -100%);
                            }
                            .img-thumbnail-user{
                                clip-path: polygon(63% 0, 97% 38%, 72% 66%, 102% 102%, 0% 100%, 0% 47%, 0% 0%);
                                width: 100%;
                                height: 100%;
                            }
                            .trasn{
                                position: absolute;
                                transform: translate(-152.5%, 40%);
                                border: 1px solid transparent;
                                background: transparent;
                                height: 60px;
                                width: 50%;
                                color: white;
                                font-size:30px;
                                padding-top: 5px;
                                font-style: italic;
                            }
                            .trasn::placeholder{
                                font-size: 20px;
                                color: white
                            }
                        </style>
                    </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <!-- <input id="btn-Preview-Image" type="button" value="Preview"/> -->
                <a id="btn-Convert-Html2Image" href="#">Download</a>
                <br/>
            </div>
        </div><br/>
     <!--    <div class="row">
            <div class="col-md-12">
                <div id="previewImage">
                </div>
            </div>
        </div> -->
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
    document.getElementById("files").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
            document.getElementById("image").src = e.target.result;
          };
            reader.readAsDataURL(this.files[0]);
            $('#files').remove();
    };
</script>
@endsection