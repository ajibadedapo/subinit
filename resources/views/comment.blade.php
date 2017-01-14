@extends('main')
@section('content')

    <div class="col-md-11 thebody">
        <?php $i=0;$j=0;?>
        <?php $i++; ?>
        <div class="row" style="margin: 0 5px;">
                @if($contents->type=='status')
                    @include('partials.status')
                @endif
                @if($contents->type=='audio')
                    @include('partials.audio')
                @endif
                @if($contents->type=='video')
                    @include('partials.video')
                @endif
                @if($contents->type=='document')
                    @include('partials.document')
                @endif

                @if($contents->type=='photo')
                    @include('partials.photo')
                @endif
            <div class="contents" style="font-size: 50%;">
                <div class="post-footer comments{{$i}} comments-top-top" style="border-top: none; width: 100%;">
                        <div class="">
                            <input  style="visibility: hidden; margin: 0"  type="text">
                            <div class="comment_container">
                                <form class="Commenter comment_row js-widget">
                                    <div class="photo ">
                                        <div class="comment_section col-md-12">
                                            <textarea class="col-md-12 transparent comment{{$i}} commentinput form-control reply_input pull-left" id="commentinput"  data-comment="comment{{$i}}"  data-contentid="{{$content_id}}"  name="comment" placeholder="Write your comment..." style="height: 52px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    <ul class="comments-list " >
                        <div class="cappend_comment"></div>
                        <?php $r=0;  $comment=App\Comment::where('content_id', $content_id)->orderBy('created_at','desc')->get() ?>
                        @foreach($comment as $comments)
                            <?php $r++ ?>
                            <li class="comment box" style="/*font-size: 60%;*/ padding: 10px;margin-top: 8px;">
                                <a class="pull-left">
                                    <img class="avatar img-circle" width="30px" height="30px" src="@if(App\User::find($comments->user_id)->profile_photo){{url('uploads/'.App\User::find($comments->user_id)->profile_photo)}}@else {{url('images/default_photo.png')}} @endif" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="user">{{App\User::find($comments->user_id)->name}}</h4>
                                        <h6 class="time">{{$comments->created_at/*->diffForHumans(\Carbon\Carbon::now())*/}}</h6>
                                    </div>

                                    <h4>{{$comments->comment}}</h4>

                                    <?php  $reply=App\ReplyComment::where('comment_id', $comments->id)->orderBy('created_at','desc')->get() ?>
                                    <?php $j++ ?>
                                    <script>
                                        $(document).ready(function(){
                                            $(".replybutton{{$j}}").click(function(){
                                                $(".replys{{$j}}").slideToggle();
                                            });
                                        });
                                    </script>
                                    <button class="btn btn-default  replybutton{{$j}}"><i class="fa fa-reply"></i></button>
                                </div>
                                <ul class="comments-list replys{{$j}}" data-commentid="{{$content_id}}" style="margin: 0 25px; display: none;">
                                        <input placeholder="Reply" data-reply="reply{{$r}}" data-commentid="{{$comments->id}}" id="reply" class="form-control reply {{$comments->id.'reply'.$r}}">
                                    <div class="rappend_reply{{$r}}{{$comments->id}}"></div>
                                    @foreach($reply as $replys)
                                        <li class="comment " style="font-size: 70%; margin-top: 10px;">
                                            <a class="pull-left" href="#">
                                                <img class="avatar img-circle" width="30px" height="30px" src="{{url('uploads/'.App\User::find($replys->user_id)->profile_photo)}}" alt="avatar">
                                            </a>
                                            <div class="comment-body">
                                                <div class="comment-heading">
                                                    <h4 class="user">{{App\User::find($replys->user_id)->name}}</h4>
                                                    <h6 class="time">{{$replys->created_at/*->diffForHumans(\Carbon\Carbon::now())*/}}</h6>
                                                </div>

                                                <h4 class="">{{$replys->reply}}</h4>

                                            </div>
                                        </li>

                                        <!--   endforeach-->
                                    @endforeach
                                </ul>
                            </li>
                            <!--   endforeach-->
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <hr class="col-md-12" style=" margin-top:5%;">
        <script>
            $(document).ready(function(){
                $(".commentbutton{{$i}}").click(function(){
                    $(".comments{{$i}}").slideToggle();
                });
            });
        </script>


    </div>

    @if(Auth::check())

            <!--asynchronous comment-->
    <div class="newcommenthtml" style="display: none;">
        <li class="commen box"  style="padding: 10px; font-size: 100%; margin-top: 10px;">
            <a class="pull-left" href="#">
                <img class="avatar img-circle" width="30px" height="30px" src="@if(Auth::user()->profile_photo){{url('uploads/'.Auth::user()->profile_photo)}}@else {{url('images/default_photo.png')}} @endif" alt="avatar">
            </a>
            <div class="comment-body">
                <div class="comment-heading">
                    <h4 class="newuser">{{Auth::user()->name}}</h4>
                    <h6 class="time">1 sec before</h6>
                </div>

                <h4 class="newcomment"></h4>

            </div>
        </li>
    </div>

    <!--asynchronous reply-->
    <div class="newreplyhtml" style="display: none;">
        <li class="comment" style="/*font-size: 50%;*/margin-top: 10px;">
            <a class="pull-left" href="#">
                <img class="avatar img-circle" width="30px" height="30px" src="@if(Auth::user()->profile_photo){{url('uploads/'.Auth::user()->profile_photo)}}@else {{url('images/default_photo.png')}} @endif" alt="avatar">
            </a>
            <div class="comment-body">
                <div class="comment-heading">
                    <h4 class="user">{{Auth::user()->name}}</h4>
                    <h6 class="time">1 sec before</h6>
                </div>

                <h4 class="newreply"></h4>

            </div>
        </li>
    </div>
    @endif
    <style>
        span.input-group-addon {
            background-color: navajowhite;
        }
    </style>
    <script src="{{URL::asset('js/ajax/addReply.js')}}"></script>
@endsection