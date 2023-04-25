<div id="view" class="modal custom-modal fade" style="width: 100% !important; left: 24px !important" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Publish On <?php echo (date("d-F-Y", strtotime($data->created_at)))?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row" style="margin-left: 5px; margin-right: 5px;">
            <div class="col-lg-8 col-md-8 m-0 p-0 col-sm-12">
            <div class="scroll">
                    <div class="scroll1" style="height: 90.5vh; overflow: scroll;">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4>
                                   {{$data->announcement_title}}
                                </h4>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="para">
                                   {!!$data->announcement_desc!!}
                                </p>
                            </div>
                            <?php
                            $getexplode = explode(".", $data->announcement_image);
                            $getextension = end($getexplode);
                            $allowedimageext = array('jpeg','bmp','png','jpg','gif');
                            if (in_array($getextension, $allowedimageext)) {
                            ?>
                            @if($data->announcement_image != "no_image.jpg")
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="sec">
                                    <img style="width: 100% !important" src="{{URL::to('public/announcement/')}}/{{$data->announcement_image}}" alt="">
                                </div>
                            </div>
                            @endif
                            <?php
                            }else{
                            ?>
                            <video width="100%" autoplay muted loop>
                            <source src="{{URL::to('public/announcement/')}}/{{$data->announcement_image}}" class="w-100" type="video/mp4" />
                            </video>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 m-0 p-0 col-sm-12 mt-md-0 mt-2">
                <div class="scroll1" style="height: 90.5vh; overflow: scroll;">
                    <div class="row" style="margin-left: 5px; margin-right: 5px;">
                  <?php
                $getcommentall = DB::connection('mysql')->table('commentpost')
                ->join('elsemployees','elsemployees.elsemployees_empid', '=','commentpost.created_by')
                ->where('commentpost.announcement_id','=',$data->announcement_id)
                ->whereIn('commentpost.commentpost_status',["Pending","Approved"])
                ->select('commentpost.commentpost_id','commentpost.commentpost_comment','commentpost.created_at','elsemployees.elsemployees_name','elsemployees.elsemployees_image')
                ->orderByDesc('commentpost_id')
                ->get();
                ?>
                @foreach($getcommentall as $getcommentsalls)
                <?php
                $commentdate = explode(' ', $getcommentsalls->created_at);
                $formatedcommentdate = date("d-F-Y", strtotime($commentdate[0]));  
                $getreply = DB::connection('mysql')->table('replypost')
                ->join('elsemployees','elsemployees.elsemployees_empid', '=','replypost.created_by')
                ->where('replypost.commentpost_id','=',$getcommentsalls->commentpost_id)
                ->whereIn('replypost.replypost_status',["Pending","Approved"])
                ->select('replypost.replypost_id','replypost.replypost_reply','replypost.created_at','elsemployees.elsemployees_name','elsemployees.elsemployees_image')
                ->orderByDesc('replypost_id')
                ->get();
                ?>
                
                
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-1 col-lg-2 col-md-1 col-1 pt-3">
                            
                            <img src="{{URL::to('public/img/')}}/{{$getcommentsalls->elsemployees_image}}" class="rounded-circle" alt="" style="width: 40px; height: 40px; position: absolute;left: 0;">
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
                                <div id="replypostdiv-{{$getcommentsalls->commentpost_id}}">
                                    @include('main.modal.postreply')
                                </div>
                                <div>
                                    <p onclick="onReply({{$getcommentsalls->commentpost_id}})" class="reply__text">
                                         Reply
                                    </p>
                                     <div class="reply__section" id="reply__section-{{$getcommentsalls->commentpost_id}}">
                                        <textarea name="text" id="reply__box-{{$getcommentsalls->commentpost_id}}" cols="30" rows="10" placeholder="Type Reply" class="reply__box"></textarea>
                                        <i class="fas fa-paper-plane reply__btn" onclick="submitpostreply({{$getcommentsalls->commentpost_id}})"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div style="color: transparent;">.</div>
                @endforeach
            </div>
            </div>
        </div>
        </div>
            </div>
        </div>
    </div>
</div>

<script>
function onReply($id){
    // const replyBox = document.getElementById('reply__section-'$id);
    const replyBox = document.getElementById("reply__section-"+$id);
    replyBox.style.display = "flex";
}
function submitpostreply($id){
      $comment = $("#reply__box-"+$id).val();
      $("#reply__box-"+$id).val('');
        $.get('{{ URL::to("/submitpostreply")}}/'+$id+'/'+$comment,function(data){
            $('#replypostdiv-'+$id).empty().append(data);
            swal("Reply", "Send Successfully!", "success");
        });
}
</script>