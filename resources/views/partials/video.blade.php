<div class="row col-md-10 contentdiv{{$contents->id}}" style="margin-top: 30px;">
    <section id="feed_stream">
        <div class="PostsContainer recent_posts js-widget" >
            <div class="post box"style="">
                @if(Route::is('profile'))
                <i class="edit_post pull-right  js-widget">
                    <div class="edit_container">
                        <ul class="control_menu" style="display: inline-flex;">
                            <li ><a class="cb AjaxFormLink js-widget deletepostbtn" data-contentid="{{$contents->id}}" ><i class="control_delete fa fa-trash" data-contentid="{{$contents->id}}">Delete </i></a></li>
                        </ul>
                    </div>
                </i>
                    @endif
                    <div class="date">Posted 6 days ago by <a href="/profile/{{$contents->user->slug}}"><strong>{{$contents->user->name}}</strong></a> </div>
                <h3 class=""><strong>{{$contents->title}}</strong></h3>
                <div class="message Emoji">
                    <video width="640" height="360" style="width: 100%; height: 100%;" src="{{url('videocontent/'.$contents->video)}}" type="video/mp4"
                           id="player1" {{--poster="{{url('images/echo-hereweare.jpg')}}"--}}
                           controls="controls" preload="none"></video>                </div>
                <div class="action_bar">
                    @include('partials.like')
                    <i class="fa fa-like"></i>
                    <div class="users_liked pull-left"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="comment_container">
                    @if(Route::is('feed')||Route::is('profile')||Route::is('userprofile'))
                        @include('partials.singlecomment')

                        <form class="Commenter comment_row js-widget" action="" method="POST">
                            <div class="photo ">
                                <div class="comment_section col-md-12">
                                    <textarea class="col-md-11 transparent  singlecommentinput form-control reply_input pull-left" id="commentinput"  data-comment=""  data-contentid="{{$contents->id}}"  name="comment" placeholder="Write your comment..." style="height: 52px; "></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
