<div class="row col-md-10" style="margin-top: 30px;">
    <section id="feed_stream">
        <div class="PostsContainer  js-widget" >
            <div class="post resu box" style="">

                <div class="date"><span>{{$i}}. </span> {{--<a href="/profile/{{$searchresults->slug}}"><strong>{{$searchresults->name}}</strong></a>--}} </div>
                    <h3 class=""> <img class="img-responsive img-circle" style="max-width:34px; max-height: 34px; "  @if($searchresults->profile_photo) src="{{URL::asset('/uploads/'.$searchresults->profile_photo)}}"@else src="{{URL::asset('/images/default_photo.png')}}" @endif><strong><a href="/profile/{{$searchresults->slug}}">{{$searchresults->name}}</a></strong></h3>
                    <h5 class="">{{--{{$connects->description}}--}}</h5>
                <div class="message Emoji">
                    <?php $userjobs=DB::table('jobs_users')->where('user_id', $searchresults->id)->get() ?>
                    <a style="cursor: pointer">@foreach($userjobs as $userjob) {{str_replace('_', ' ', $userjob->job_slug)}}<span style="color: #999">|</span> @endforeach</a>
                </div>
                <div class="action_bar">
                    <i class="fa fa-like"></i>
                    <div class="users_liked pull-left"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<style>
    .resu{
        padding: 10px;
    }
</style>
