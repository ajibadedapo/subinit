<p class="post_controls" data-contentid="{{$contents->id}}" style="margin-top: 5px;">
        <button class="btn btn-default {{--like{{(str_replace('.','',str_replace('=','',(str_replace('/','',(str_replace(':','',url($content->currentPage()))))))))}}--}} like like{{$contents->id}}">{{\App\Like_User::where('content_id', $contents->id)->where('user_id', Auth::id())->first()?'Liked':'Like'}} </button>
<span style="color: grey; font-size: 85%;"> <span> {!!\App\Like_User::where('content_id', $contents->id)->count()!!} Likes</span></span>

                                   