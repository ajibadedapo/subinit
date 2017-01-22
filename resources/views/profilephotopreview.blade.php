@extends('main')
@section('content')
    @include('priceupdatemodal')
    @include('subscriberbenefitmodal')
    <link rel="stylesheet" href="{{URL::asset('css/jquery.html5_editor.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/jquery.Jcrop.css')}}">
    <div class="row" style="margin: 0 auto; display: block;">
        <div class="col-md-12">
            <p><h2>Crop Profile Photos</h2></p>
            <div class="">
                <button class="btn btn-block btn-primary save" style="padding: 7px 40px; text-align: center;">Save <i class="fa fa-save"></i></button>
            </div>s
         <div style="margin: 0 auto; display: block">
        <img src="{{URL::asset($image)}} " id="cropimage">
        <form action="{{url('/jcrop')}}" enctype="multipart/form-data" method="post" >
            {{ csrf_field() }}
            <input type="hidden"  name="image" value="{{$image}}"/>
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <input type="submit" value="Crop Image" id="submitcroppedbtn" hidden>
        </form>
        </div>
        </div>
    </div>
    <div class="clearfix"> </div>
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <script src="{{URL::asset('js/jquery.Jcrop.js')}}"></script>

    <script type="text/javascript">
        $(function() {
            $('#cropimage').Jcrop({
                onSelect: updateCoords,
                setSelect: [0,0,150,100],
                aspectRatio: 1
            });
        });
        function updateCoords(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };
    </script>
    <script>
        $('.save').on('click', function () {
            $.confirm({
                title: 'Are you sure ?',
                content: 'url:form.html',
                buttons: {
                    sayMyName: {
                        text: 'Yes',
                        btnClass: 'btn-success',
                        action: function () {
                          $('#submitcroppedbtn').click();
                        }
                    },
                    later:  {
                        text: 'No',
                                btnClass: '',
                                action: function () {
                                    window.location="{{URL::to('profile/'.Auth::user()->slug)}}";
                        }
                    }
                }
            });           });
    </script>
    <style>
        img{
            max-width: 80vw;
        }
    </style>
@endsection
