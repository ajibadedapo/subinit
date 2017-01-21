@extends('main')
@section('content')
    <div class="my_account">
        <section  class="box" style="padding: 10px;" id="subscription-form">
                @include('subscription.partial._card')
         </section>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
{{-- <script src="{{URL::asset('js/stripelibrary.js')}}"></script>--}}
<script src="{{URL::asset('js/thestripe.js')}}"></script>
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
