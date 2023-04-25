@foreach ($data as $val)
        <div class="row pt-4">
        <div class="col-4">
            <h6 id="cartname" class="">{{$val->product_name}}</h6>

        </div>
        <div class="col-4 text-xl-center ">
             <span>
                <?php 
                    $concatvar = $val->restaurant_id.'.'.$val->order_id.'.'.$val->product_price.'.'.$val->product_quantity.'.'.$val->product_id.'.'.$val->order_productquantity;
                ?>
                <a onclick="deletefromcart({{'"'.$concatvar.'"'}})"><i class="fa fa-trash"></i></a>
                {{$val->order_productquantity}}
                <a  onclick="addmoretocart({{'"'.$concatvar.'"'}})"><i class="fa fa-plus"></i></a>
            </span>
        </div>
        <div class="col-4 text-right pr-4">
            <h6 id="cartprice" style="color: black;">{{$val->order_productprice}}</h6>
           
        </div>
        
      
        </div>
@endforeach
        <div class="col-12">
            <button type="button" onclick="userorderlist()">
                CHECKOUT
            </button>
        </div>
        <!--  -->
        <style type="text/css">
            #cartname, #cartprice{
                /*white-space: nowrap;*/
                
            }
           
        </style>