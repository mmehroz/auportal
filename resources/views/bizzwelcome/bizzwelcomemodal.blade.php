<div id="bizzwelcomemodal">
	    <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                	@if($type == 0)
                    <h3 class="pt-4">Welcome To</h3>
                    @endif
                    <h4 class=""><strong>Bizz World</strong> Communications</h4>
                </div>
                <div class="col-4 text-right">
                	<div class="right-side">
	                    <h5>{{$info->elsemployees_name}}</h5>
	                    <!-- <ul class="list pt-1 ml-auto">
	                        <li class="list1">
	                        	{{$info->DESG_NAME}}
	                        </li>
	                        <li class=" ml-2">
	                            {{$info->dept_name}}
	                        </li>
	                    </ul> -->
	                   <p class="list">
                            <span>{{$info->DESG_NAME}} </span><span class="divider">|</span><span> {{$info->dept_name}}</span>
                        </p>
                    </div>
                </div>
                <div class="col-4 text-left">
                    <div class="img text-center mt-4">
                        <img src="{{URL::to('public/img/')}}/{{$info->elsemployees_image}}" alt="">

                    </div>
                    <div class="img2">
                        <img src="{{URL::to('public/bizzwelcome/center.png')}}" alt="" width="438.78px" height="425.72px">
                    </div>
                </div>
                <div class="col-4 text-">
                	<div class="left-side">
	                    <ul class="list2 mr-auto">
	                        <li>
	                            ID <br>
	                            <div class="pt-1"> <strong class="pt-1">{{$info->elsemployees_batchid}}</strong></div>
	                        </li>
	                        <li>
	                            Time <br>
	                            <div class="pt-1"> <strong class="pt-1">{{$time}}</strong></div>
	                        </li>

	                    </ul>
                    </div>
                </div>
                <div class="col-12">
                	@if($type == 1)
                    <h3>Take Care</h3>
                    @endif
                </div>
            </div>
        </div>
</div>