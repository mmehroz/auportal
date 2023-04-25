<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Login</title>
    <link rel="stylesheet" href="{!! asset('public/assets/css/bootstrap.min.css') !!}" />
    <script src="{!! asset('public/assets/js/jquery-3.2.1.min.js') !!}" ></script>
	<script src="{!! asset('public/assets/js/bootstrap.min.js') !!}"></script>
</head>
<style>
section {
        background: url('{{URL::to('public/bizzwelcome/bg.png')}}');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100vh;
        position: relative;
	    }
	      .box {
        box-shadow: 0px 0px 10px 0px rgba(165, 164, 164, 0.2);
        width: 350px;
        height: 400px;
        background-color: rgba(0, 0, 0, 0.35);
        border: 3px solid #969292;
        border-radius: 5px;
        margin-top: 50px;
        color: white;
        margin: 0 auto;
        padding-top: 100px;
        margin-top: 100px;
    }
    
    h3 {
        color: white;
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 40px;
        line-height: 49px;
        /* identical to box height */
        text-align: center;
        padding-top: 40px;
    }
    
    h4 {
        color: white;
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 40px;
        line-height: 49px;
        padding-top: 40px;
        /* identical to box height */
        text-align: center;
    }
    
    .img {
        width: 220px;
        height: 220px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;
        position: absolute;
        transform: translate(50%, 40%);
        background: #000000;
        border: 6px solid #000000;
        box-sizing: border-box;
        box-shadow: 0px 6px 16px rgba(0, 0, 0, 0.12);
    }
    
    .img img {
        width: 100%;
        margin: 0 auto;
    }
    
    strong {
        font-weight: 500;
    }
    .right-side{
    	width: 420px;
    	text-align: right; !important;
    }
    h5 {
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 27px;
        line-height: 49px;
        color: white;
        width: 100%;
        text-transform: uppercase;
        position: relative;
        white-space: nowrap;
        transform: translate(0%, 300%);
    }
    
    .list {
        position: relative;
        text-align: right;
        color: white;
        transform: translate(0%, 600%);
        white-space: nowrap;
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: 300;
    }
    
    
    
    .list1 {
        border-right: 1px solid white;
    }
    .left-side{
    	width: 300px;
    	text-align: left !important;
    	position: relative;
    	transform: translate(-20%, 450%);
    }
    
    .list2 {
        list-style: none;
        display: inline-flex;
        
        color: white;
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: 300;
    }
    
    .list2 li {
        margin-right: 30px;
    }
    .modal-backdrop {
    	background-color: transparent !important;
    }
</style>
<body>
<section>
<div id ='modals'></div>
</section>
</body>
</html>
<script>
window.setInterval('bizzwelcomemodal()', 500); 	
// $( document ).ready(function() {
// bizzwelcomemodal();
// });
function bizzwelcomemodal(){
  $('.modal-backdrop.show').remove();
  $.get('{{ URL::to("/bizzwelcomemodal")}}',function(data){
  $('#modals').empty().append(data);
  $('#bizzwelcomemodal').modal('show');
  });
}
</script>