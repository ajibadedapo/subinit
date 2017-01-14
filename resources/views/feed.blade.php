@extends('main')
@section('content')
    <div class="my_account">
        <section id="profile_content" class="box"><div class="AjaxContainer js-widget" data-use_html5_history="true" data-identifier="control-center" data-ajaxify_links="false"><div class="col-md-12 col-sm-12 col-xs-12"><h2>My Feed</h2><strong>Here you will see all upcoming news related to your subscriptions</strong></div></div></section><div class="clearfix"></div></div>

    @foreach($content as $contents)
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
    @endforeach
    {{$content->links()}}





    <style>
    .box {
    display: block;
    position: relative;
    border-radius: 10px;
    margin: 0px auto;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(215, 215, 215);
    border-image: initial;
    background: rgb(255, 255, 255);
    overflow: hidden;
    }
    .my_account #sidebar .header {
        font-size: 13px;
        border-bottom: 1px solid rgb(215, 215, 215);
        margin: 0px;
        padding: 15px;
    }
    .my_account section#profile_content, .my_account .content {
        float: left;
        width: 100%;
        min-height: 90px;
    }
</style>
@endsection
