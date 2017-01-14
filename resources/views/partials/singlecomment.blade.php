<?php $r=0;  $comments=App\Comment::where('content_id', $contents->id)->orderBy('created_at','desc')->first() ?>
<ul class="comments-list " style="margin-bottom: 10px;">
    <li class="comment newonecommentcontain{{$contents->id}}" style="font-size: 80%;display: none;">
        <a class="pull-left">
            <img class="avatar img-circle" width="30px" height="30px" src="@if(Auth::user()->profile_photo){{url('uploads/'.Auth::user()->profile_photo)}}@else {{url('images/default_photo.png')}} @endif" alt="avatar">
        </a>
        <div class="comment-body">
            <div class="comment-heading">
                <h4 class="user" style="font-size: 100%">{{Auth::user()->name}}</h4>
                <h6 class="time" style="font-size: 100%">some moments ago</h6>
            </div>

            <h4 style="font-size: 100%" class="newonecomment{{$contents->id}}"></h4>

        </div>
    </li>
    @if($comments)
    <li class="comment oldonecommentcontain{{$contents->id}}" style="font-size: 80%;">
        <a class="pull-left">
            <img class="avatar img-circle" width="30px" height="30px" src="@if(App\User::find($comments->user_id)->profile_photo){{url('uploads/'.App\User::find($comments->user_id)->profile_photo)}}@else {{url('images/default_photo.png')}} @endif" alt="avatar">
        </a>
        <div class="comment-body">
            <div class="comment-heading">
                <h4 class="user" style="font-size: 100%">{{App\User::find($comments->user_id)->name}}</h4>
                <h6 class="time" style="font-size: 100%">{{$comments->created_at/*->diffForHumans(\Carbon\Carbon::now())*/}}</h6>
            </div>

            <h4 style="font-size: 100%">{{$comments->comment}}</h4>

        </div>
    </li>
        <a style="margin-top:4px;" href="/comment/{{$contents->id}}">View more comments</a>
    @endif

</ul>