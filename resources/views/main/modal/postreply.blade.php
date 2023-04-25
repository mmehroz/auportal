@foreach($getreply as $getreplys)
<?php
$replydate = explode(' ', $getreplys->created_at);
$formatedreplydate = date("d-F-Y", strtotime($replydate[0])); 
?>
<div class="main__rpSec">
<img src="{{URL::to('public/img/')}}/{{$getreplys->elsemployees_image}}" alt="" width="30px" height="30px" style="border-radius: 50%;">
<div class="replied__cmmnt">
<div class="row no-gutters">
    <div class="col-6"><p class="userName__here">{{$getreplys->elsemployees_name}}</p></div>
    <div class="col-6 text-right"><p class="show__replied">{{$formatedreplydate}}</p></div>
</div>
<p class="show__replied">{{$getreplys->replypost_reply}}</p>
</div>
</div>
@endforeach