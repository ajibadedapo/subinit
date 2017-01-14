@extends('main')
@section('content')
    <div class="my_account">
        <section id="" class="box" style="text-align: center"><div class="AjaxContainer js-widget" data-use_html5_history="true" data-identifier="control-center" data-ajaxify_links="false">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if(count($searchresult)==0)
                        <strong class="wordofthedaytopic">NO MATCH FOUND WITH KEYWORD "<span style="color: #1a4a72">{{$searchquery}}</span>"<strong></strong></strong>
                    @else
                        <strong class="wordofthedaytopic"><strong>{{count($searchresult)}}</strong> MATCH FOUND </strong>
                    @endif
                </div>
            </div></section>
        <div class="clearfix"></div>
    </div>
    <?php $i=1;?>
    @foreach($searchresult as $searchresults)
        @include('partials.searchentity')
        <?php $i++?>
        @endforeach
        {{$searchresult->links()}}





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
