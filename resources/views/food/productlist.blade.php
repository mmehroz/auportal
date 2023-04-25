<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Portal</title>
    <link rel="icon" href="https://bizzworldcommunications.com/public/images/favicon.png" type="image/gif" sizes="16x16">
    <!-- <link rel="stylesheet" href="{!! asset('public/assets/css/food.css') !!}" /> -->
    <link rel="stylesheet" href="{!! asset('public/bizzmain/cdns/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/bizzmain/fontawsm/fontawesome-free-5.15.3-web/css/fontawesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/bizzmain/fontawsm/fontawesome-free-5.15.3-web/css/all.min.css') !!}">
    <script src="{!! asset('public/bizzmain/cdns/jquery.min.js') !!}"></script>
    <script src="{!! asset('public/bizzmain/cdns/bootstrap.min.js') !!}"></script>
</head>
<style>
    .navbar .fa-cart-arrow-down {
        font-size: 1.5rem;
        color: #ffffff;
    }
    
    nav {
        text-shadow: 0 10px 15px 0 rgb(0 0 0 / 20%), 0 10px 20px 0 rgb(0 0 0 / 19%);
        background-color: rgb(93, 184, 111);
    }
    
    nav a {
        color: #ffffff;
        font-weight: 600;
    }
    
    nav a:hover {
        color: #ffffff;
    }
    .main-drop .user-img img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-top: -10px;
    }
    
    .footer {
        color: white;
        background-color: #57be6b;
        font-size: 1.1rem;
        font-weight: 600;
        width: 100%;
    }
    
    .pl {
        margin-top: 77px;
    }
    
    .pl .pl-head {
        font-weight: 700;
    }
    
    .pl p {
        color: gray;
        padding-top: 5px;
        font-size: 15px;
    }
    
    .pl .ed {
        font-size: 23px;
        font-weight: 700;
        /* text-transform: uppercase; */
    }
    
    .pl .pr-img {
        border-radius: 30px;
    }
    
    .pr-p {
        font-size: 14px !important;
    }
    
    .fa-plus,
    .fa-trash {
        color: #57be6b;
        font-size: 1rem;
    }
    
    .scroll {
        overflow-x: hidden;
        width: 100%;
        height: 86vh;
        scroll-behavior: smooth;
    }
    
    .scroll::-webkit-scrollbar {
        display: none;
    }
    /* check */
    
    .pro-check {
        width: 100%;
        height: auto;
        border: 2px solid white;
        border-radius: 4px;
        padding: 10px;
        box-shadow: 5px 5px 25px 5px lightgrey;
    }
    
    .pro-check button {
        width: 100%;
        height: 45px;
        background-color: #57be6b;
        color: white;
        border: 1px solid #57be6b;
        border-radius: 4px;
        text-transform: uppercase;
        margin-top: 50px;
        outline: none;
    }
    .pro-check a{
        cursor: pointer;
    }
    
    .check-head {
        font-size: 1.1rem;
    }
    
    .h-6 {
        font-size: 15px;
    }
    .as {
        font-size: 1.5rem;
        font-weight: 600;
        color: #57be6b;
        text-decoration: none;
    }
    
    .as:hover {
        color: #57be6b;
        text-decoration: none;
    }
    .fa-pencil-alt{
        color: #57be6b;
    }
    
    @media only screen and (max-width: 1165px) {
        h6 {
            font-size: 15px;
        }
        .pr-p {
            font-size: 13px !important;
        }
        .fa-plus {
            color: #57be6b;
            font-size: 1rem;
        }
    }
    
    @media only screen and (max-width: 1000px) {
        h6 {
            font-size: 13px;
        }
        .rate {
            font-size: 15px;
        }
        .check-head {
            font-size: 1rem;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll > 100) {
                $(".navbar").css("background", "#57be6b");
            } else {
                $(".navbar").css("background", "");
            }
        })
    })
</script>
<body>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg fixed-top">
                        <a class="navbar-brand" href="{{URL::to('restaurantlist')}}"><img src="{{URL::to('public/restaurant/food-logo.png')}}" alt="" width="250px"></a>
                        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="my-nav" class="collapse navbar-collapse">
                            <ul class="navbar-nav ml-auto  text-right">
                <li class="nav-item">
                    <a class="nav-link " href="#" onclick="userorderlist()"><i class="fa fa-shopping-cart" style="color: #ffffff;"></i></a>
                </li>
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                        <img src="{{URL::to('public/img/')}}/{{session()->get("image")}}" alt="">
                        <span class="status online"></span></span>
                        <span>{{session()->get("name")}}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" style="color: black;" href="#" onclick="return viewprofile({{session()->get(" id ")}});"><i class="fa fa-user" style="padding-right: 7px; font-size: 12px; color: #D0202E;"></i>My Profile</a>
                        <a class="dropdown-item" style="color: black;" href="{{url('/')}}"><i class="fa fa-power-off" style="padding-right: 7px;  font-size: 12px; color: #D0202E;"></i>Logout</a>
                        <a class="dropdown-item" style="color: black;" href="{{url('/chapass')}}"><i class="fa fa-key" style="padding-right: 7px; font-size: 12px; color: #D0202E;"></i>Change Password</a>
                    </div>
                </li>
            </ul>
                        </div>
                    </nav>
                </div>
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
    </section>
    <!-- Product list -->
    <section class="pl">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="scroll">
                        <div class="bg1" style="background: url('{{URL::to('public/restaurant/')}}/{{$datares->restaurant_picture}}'); background-size: cover; height: 40vh;">

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h5 class="pl-head pt-2">{{$datares->restaurant_name}}</h5>
                                <p>
                                    {{$datares->restaurant_otherdetails}}
                                </p>
                                <h5 class="ed pt-3">Exclusive Deals</h5>
                            </div>
                            <div class="col-6 text-right pt-2">
                                @if(session()->get("role") <= 2)
                                <a href="#" onclick="addproduct({{$id}})" class="as">
                                    <i class="fas fa-plus-circle"></i> Add Products
                                </a>
                                @endif
                            </div>
                            @foreach ($data as $val)
                            <!-- Products -->
                            <div class="col-4 pt-4">
                                <img class="pr-img" src="{{URL::to('public/product/')}}/{{$val->product_picture}}" alt="" width="100%">
                                <div class="row p-1 mt-2">
                                    <div class="col-6">
                                        <input type="text" readonly id="name-{{$val->product_id}}" value="{{$val->product_name}}" style="font-weight: 700; border: none;" />

                                    </div>
                                    <div class="col-6 text-right">
                                        @if(session()->get("role") <= 2)
                                        <a  href="{{url('/deleteproduct')}}/{{$val->product_id}}" style="font-size: small;" ><i class="fa fa-trash"></i></a> <strong>/</strong> <a href="#" onclick="editproduct({{$val->product_id}})" style="font-size: small;"><i class="fa fa-pencil-alt"></i></a>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <p class="pr-p">
                                            Payson crunchos zinger & burger regular Tucson Fries
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" readonly id="price-{{$val->product_id}}" value="RS.{{$val->product_price}}" style="font-weight: 700; border: none;" />
                                    </div>
                                    <div class="col-6 text-right">
                                        <?php
                                        $task = DB::connection('mysql')->table('order')
                                       ->where('order.order_status','!=',"Deliver")
                                       ->where('order.product_id','=',$val->product_id)
                                       ->where('order.restaurant_id','=',$datares->restaurant_id)
                                       ->where('order.status_id','=',2)
                                       ->where('order.created_by','=',session()->get('id'))
                                       ->select('order.order_id')
                                       ->first();
                                   ?>
                                       @if($task)
                                       <th>Order Pending</th>
                                       @else
                                        <a type="button" id="btn-moresdsd-{{$val->product_id}}" onclick="addtocart({{$val->restaurant_id}}.{{$val->product_id}})"> <i class="fas fa-plus"></i></a>
                                        @endif
                                    </div>

                                </div>


                            </div>
                            @endforeach
                            

                        </div>
                    </div>
                </div>
                <!-- col-3 -->
                <div class="col-3">
                    <div class="pro-check">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h5 class="check-head">Your order from {{$datares->restaurant_name}}</h5>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                        <div class="col-12">
                                        <div class="test">

                                        </div>
                                        </div>
                                </div>
                            </div>
                               
                            
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="footer ">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pb-1 pt-1">
                    © 2021 Copyright: <a href="http://80.240.16.149/auhrm/maindashboard" target="_blank" style="color: white; text-decoration: none;">Bizz Portal</a> All Rights Reserved
                </div>
            </div>
        </div>

    </section>
    <div id ='modals'></div>
    <script type="text/javascript">
        $( document ).ready(function() {
           const restauranttId = <?php echo($datares->restaurant_id);?>;
           $.ajax(
                {
                    url: '{{ URL::to("/usercartlist")}}/'+parseInt(restauranttId),
                    type: 'GET',
                }).done( 
                    function(data) 
                    {
                    $('.test').text("");
    
                      $('.test').append(data);
                    }
                ); 
              });
        function addproduct($id){
            $.get('{{ URL::to("/addproductmodal")}}/'+$id,function(data){
            $('#modals').empty().append(data);
            $('#addproduct').modal('show');
            });
        }
        function editproduct($id){
            $.get('{{ URL::to("/editproductmodal")}}/'+$id,function(data){
            $('#modals').empty().append(data);
            $('#editproduct').modal('show');
            });
        }
        function addtocart($id){
            $.get('{{ URL::to("/addtocart")}}/'+$id);
            let idTostring = $id.toString();
            const restauranttId = idTostring.split(".")[0];
            const productId = idTostring.split(".")[1];
            $(`#btn-moresdsd-${productId}`).hide();
            // let cp = document.getElementById('cartprice');
            // let productprice = document.getElementById(`price-${productId}`).value;
            // cp.innerText = productprice;
            // let cn = document.getElementById('cartname');
            // let productname = document.getElementById(`name-${productId}`).value;
            // cn.innerText = productname;
            setTimeout(() => {      $.ajax(
                {
                    url: '{{ URL::to("/usercartlist")}}/'+parseInt(restauranttId),
                    type: 'GET',
                }).done( 
                    function(data) 
                    {
                    $('.test').text("");
    
                      $('.test').append(data);
                    }
                ); }, 1000);
           
        }
        function addmoretocart($id){
            $.get('{{ URL::to("/addmoretocart")}}/'+$id);
            let idTostring = $id.toString();
            const restauranttId = idTostring.split(".")[0];
            // const productId = idTostring.split(".")[1];
            // $(`#btn-moresdsd-${productId}`).hide();
            // let cp = document.getElementById('cartprice');
            // let productprice = document.getElementById(`price-${productId}`).value;
            // cp.innerText = productprice;
            // let cn = document.getElementById('cartname');
            // let productname = document.getElementById(`name-${productId}`).value;
            // cn.innerText = productname;
            setTimeout(() => {      $.ajax(
                {
                    url: '{{ URL::to("/usercartlist")}}/'+parseInt(restauranttId),
                    type: 'GET',
                }).done( 
                    function(data) 
                    {
                    $('.test').text("");
    
                      $('.test').append(data);
                    }
                ); }, 1000);
           
        }
        function deletefromcart($id){
            $.get('{{ URL::to("/deletefromcart")}}/'+$id);
            let idTostring = $id.toString();
            const restauranttId = idTostring.split(".")[0];
            const productId = idTostring.split(".")[4];
            const productQty = idTostring.split(".")[3];
            const orderQty = idTostring.split(".")[5];
            if (orderQty <= productQty) {
            $(`#btn-moresdsd-${productId}`).show();
            }
            // let cp = document.getElementById('cartprice');
            // let productprice = document.getElementById(`price-${productId}`).value;
            // cp.innerText = productprice;
            // let cn = document.getElementById('cartname');
            // let productname = document.getElementById(`name-${productId}`).value;
            // cn.innerText = productname;
            setTimeout(() => {      $.ajax(
                {
                    url: '{{ URL::to("/usercartlist")}}/'+parseInt(restauranttId),
                    type: 'GET',
                }).done( 
                    function(data) 
                    {
                    $('.test').text("");
    
                      $('.test').append(data);
                    }
                ); }, 1000);
           
        }
        function userorderlist($id){
            $.get('{{ URL::to("/userorderlist")}}',function(data){
            $('#modals').empty().append(data);
            $('#userorderlist').modal('show');
            });
        }
        </script>
</body>
</html>