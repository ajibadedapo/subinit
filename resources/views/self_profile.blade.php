@extends('main')
   @section('content')
       @include('priceupdatemodal')
       @include('subscriberbenefitmodal')
       <link rel="stylesheet" href="{{URL::asset('css/jquery.html5_editor.css')}}">
       <link rel="stylesheet" href="{{URL::asset('css/jquery.Jcrop.css')}}">
       <script src="{{URL::asset('js/selectize.min.js')}}" type="text/javascript"></script>
       <script src="{{URL::asset('js/selectindex.js')}}" type="text/javascript"></script>

       <div class="row" style="margin: 0 5px;">
           @if(Session::has('registerforpayment'))
           <div class="alert alert-warning fade in" style="margin-bottom: 5px; text-align: center">
                 Your Payment settings has been updated
               </div>
               @endif
           <div class="col-md-12 " id="coverarea" style="background: @if(Auth::user()->cover_photo) url('/uploads/{{Auth::user()->cover_photo}}') @else url('/images/default_cover_photo.jpg') @endif   no-repeat; background-size: cover ">
               <img class="col-md-12 img-responsive img-circle" style="max-height: 200px; max-width: 200px; display: block ;padding: 14px;"  src="@if($user->profile_photo){{URL::asset('/uploads/'.$user->profile_photo)}} @else {{URL::asset('/images/default_photo.png')}} @endif"/>
               <div id="dpcpbtn"{{-- style="display: none"--}}>    ,,,,,,,,
               <button class="col-md-3 btn btn-primary coverphotobtn" style="float: right;">Change Cover Photo</button>
               <button class="col-md-3 btn btn-primary displayphotobtn">Change Avatar</button>
               </div>
           </div>
           <div class="col-md-12 wow fadeInDown animated" data-wow-delay=".5s">
               <div class="loadprofilename"></div>
               <div class="input-group inputprofilename" style="display: none;">
                   <input class="form-control" id="profilename" value="{{Auth::user()->name}}" name="profile_name">
                <span class="input-group-btn">
                    <button id="updatename" class="btn btn-primary close_inputprofilename" >Update</button><button class="close_inputprofilename btn btn-clear">close</button>
                </span>
               </div>
               <h3 class="hdg profilename" style="text-align: left; margin-top: 15px;"><span class="newprofilename">
                       {{$user->name}}
                   </span><span style="/*display: none; */color: #999; font-size: 50%;cursor: pointer"  class="editname">  Edit <i class="fa fa-edit"></i></span></h3>
               <div class="briefdesc">
                   <p class="writedescription"><a  style="text-align: left;margin-top: 15px;"><label for="select-tools" style=" color: #617481;">Job:</label><span id="joblist">@foreach($myjobs as $myjob) {{str_replace('_', ' ', $myjob->job_slug)}}<span style="color: #999">|</span> @endforeach</span></a><span style=" color: #999; font-size: 70%;cursor: pointer"  class="editdesc">  Edit <i class="fa fa-edit"></i></span></p>
               </div>

               <form class="desc_editor_div" id="jobform">
                   {{csrf_field()}}
                   <select id="select-tools" id="mydescription" class="jobvalue" multiple  name="job[]" placeholder="Your Job..."></select>
                   <button class="btn btn-primary close_editor updatejobbtn" type="button" id="submitdesc">Submit</button>
                   <buttton class="close_editor btn btn-clear">close</buttton>
               </form>
           </div>
           <div class="row">
               <p>
                   <button style="margin-right: 30px;display: inline;" class="subs  btn-clear btn-lg"> {{\App\Subscriber::where('subscribee',Auth::id())->count()}} SUBSCRIBERS{{--{{ count($following)}}--}}</button>
                   <button style="/*margin-right: 19px;*/display: inline; float: right;" class="shareprofilebtn  btn-lg"> Message
                   </button>
               {{--<br/>--}}
                   <p style="float: right" data-toggle="modal" data-target="#priceupdateModal" ><a  style="color: #999; font-size: 90%;cursor: pointer"  class="editprice">  Edit <i class="fa fa-edit"></i></a><button style="/*margin: 19px;*/display: inline;  border-radius: 30px;" class="btn-primary  btn-lg" id="pricebtn"> <i class="fa fa-dollars"></i>@if(isset($user->price)) $ <span class="newprice">{{$user->price}}</span> @else <span class="newprice">???</span> @endif/<span style="font-size: 70%">month</span></button></p>

               </p>


            </div>

           <hr style="width:100%; margin-top:1%;">
           <div class="row">
               <div class="benefits_container own-role" >
                   <div class="label btn sub-benefits">Subscriber Benefits</div>
                   <div class="fa fa-gear edit-gear editbenefits">
                       <button style="margin-top: 4px" class="btn btn-clear edit-text edit-benefitbtn">Edit</button>
                   </div><br/><br/>
                   <form class="benefit-form" style="display: none">
                       <div class="cost_input ">
                           <div id="2">
                               @if($benefits)
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 1</span>
                                   <input type="text" value="{{$benefits->benefit1}}" id="benefitvalue1" name="benefitvalue1" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 2</span>
                                   <input type="text" value="{{$benefits->benefit2}}" id="benefitvalue2"  name="benefitvalue2" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                               {{csrf_field()}}
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 3</span>
                                   <input type="text" value="{{$benefits->benefit3}}" id="benefitvalue3"  name="benefitvalue3" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 4</span>
                                   <input type="text" value="{{$benefits->benefit4}}" id="benefitvalue4"  name="benefitvalue4" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 5</span>
                                   <input type="text" value="{{$benefits->benefit5}}"  id="benefitvalue5"  name="benefitvalue5" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                           </div>
                           @else
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 1</span>
                                   <input type="text"  id="benefitvalue1" name="benefitvalue1" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 2</span>
                                   <input type="text"  id="benefitvalue2"  name="benefitvalue2" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                               {{csrf_field()}}
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 3</span>
                                   <input type="text"  id="benefitvalue3"  name="benefitvalue3" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 4</span>
                                   <input type="text"  id="benefitvalue4"  name="benefitvalue4" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Benefit 5</span>
                                   <input type="text"   id="benefitvalue5"  name="benefitvalue5" class="form-control"  aria-describedby="basic-addon1">
                               </div>
                       </div>
                           @endif
                           <input class="btn btn-primary pink submitbenefitbtn" id=""  type="button" value="Submit">
                           <input class="btn pink cancel-benefitbtn"  type="button" value="Cancel">
                       </div>
                   </form>
                   <div class="benefits-list" >
                       <ul class="fa-ul">
                           @if($benefits)
                           <li><div id="benefit1">
                           @if($benefits->benefit1)<i class="fa-li fa fa-check"></i><span >{{$benefits->benefit1}}</span></div>@endif
                           </li>
                           <li><div id="benefit2">
                           @if($benefits->benefit2)<i class="fa-li fa fa-check"></i><span >{{$benefits->benefit2}}</span></div>@endif
                           </li>
                           <li><div id="benefit3">
                           @if($benefits->benefit3)<i class="fa-li fa fa-check"></i><span >{{$benefits->benefit3}}</span></div>@endif
                           </li>
                           <li><div id="benefit4">
                           @if($benefits->benefit4)<i class="fa-li fa fa-check"></i><span >{{$benefits->benefit4}}</span></div>@endif
                           </li>
                           <li><div id="benefit5">
                           @if($benefits->benefit5)<i class="fa-li fa fa-check"></i><span >{{$benefits->benefit5}}</span></div>@endif
                               @else
                                   <li><div id="benefit1"></div></li>
                                   <li><div id="benefit2"></div></li>
                                   <li><div id="benefit3"></div></li>
                                   <li><div id="benefit4"></div></li>
                                   <li><div id="benefit5"></div> </li>
                                       @endif
                          </ul>
                   </div>
               </div>

               <div id="create_post_container"  role="tabpanel" data-example-id="togglable-tabs">
                   <ul id="create_post_nav {{--myTab--}}" class="nav nav-tabs" role="tablist" style="margin: 5px 0">
                               <li role="presentation" class="active"><a class="fa fa-pencil" href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Post Status</a></li>
                               <li role="presentation"><a class="fa fa-music" href="#audio" role="tab" id="rest-tab" data-toggle="tab" aria-controls="rest">Add Audio</a></li>
                               <li role="presentation"><a class="fa fa-video-camera" href="#video"role="tab" id="Shopping-tab" data-toggle="tab" aria-controls="Shopping">Add Video</a></li>
                               <li role="presentation"><a class="fa fa-photo" href="#photos"  role="tab" id="Flights-tab" data-toggle="tab" aria-controls="Flights">Add Photos</a></li>
                               <li role="presentation"><a class="fa fa-file"  href="#document" role="tab" id="EventCentres-tab" data-toggle="tab" aria-controls="EventCentres">Add Document</a></li>
                           </ul>
                   </ul>
                   <div class="clearfix"></div>
                   <div id="create_post" class="box">
                       <div id="post">
                           <div id="myTabContent" class="tab-content search_tabs">
                               <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                   @include('postTabs.status')
                               </div>
                               <div role="tabpanel" class="tab-pane fade" id="audio" aria-labelledby="rest-tab">
                                   @include('postTabs.audio')
                               </div>
                               <div role="tabpanel" class="tab-pane fade" id="video" aria-labelledby="Shopping-tab">
                                   @include('postTabs.video')
                               </div>
                               <div role="tabpanel" class="tab-pane fade" id="photos" aria-labelledby="Flights-tab">
                                   @include('postTabs.photo')
                               </div>
                               <div role="tabpanel" class="tab-pane fade" id="document" aria-labelledby="EventCentres-tab">
                                   @include('postTabs.document')
                               </div>
                           </div>

                       </div>
                   </div>
               </div>

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
           </div>
       </div>
       <div class="clearfix"> </div>
   {{-- Profile picture and Cover photo update invisible form  --}}
       <form action="{{url('/savecover')}}" method="post" id="savecover" enctype="multipart/form-data">
           <input class="coverinput" type="file" accept=".jpg, .jpeg, .png" name="image" style="visibility: hidden;">
           {{ csrf_field() }}
           <input type="submit" id="savecoverbtn" value="Crop Image"  hidden>
       </form>
       <form action="{{url('/savedp')}}" method="post" id="savedp" enctype="multipart/form-data">

           <input class="dpinput" type="file" accept=".jpg, .jpeg, .png" name="image" style="visibility: hidden;">
           {{ csrf_field() }}
           <input type="submit" id="savedpbtn" value="Crop Image"  hidden>
       </form>
       <script>
           $('.coverinput').change(function () {
               $('#savecoverbtn').click();
           })
           $('.dpinput').change(function () {
               $('#savedpbtn').click();
           })
       </script>
       {{-- Profile picture and Cover photo update form  --}}
       <script src="{{URL::asset('js/jquery.minortext_editor.js')}}" type="text/javascript" charset="utf-8"></script>
       <script src="{{URL::asset('js/jquery.Jcrop.js')}}"></script>
       <script src="{{URL::asset('js/writedescriptiontoggle.js')}}"></script>
       <script type="text/javascript">
           $(function(){
               $('.editor').html5_editor();
           });
       </script>
       <script>
           var token ='{{csrf_token()}}';
       </script>

       <script>
           $('.coverphotobtn').on('click', function () {
                   $('.coverinput').click();
               });
           $('.displayphotobtn').on('click', function () {
                   $('.dpinput').click();
               });
       </script>
       <script>
           // <select id="select-tools"></select>
           $('#select-tools').selectize({
               maxItems: null,
               valueField: 'id',
               labelField: 'title',
               searchField: 'title',
               options: [
                       @foreach($jobs as $job)
                      {id: '{{$job->job}}', title: '{{$job->job}}', url: ''},
                       @endforeach
                   {id: '...', title: '...', url: ''}
               ],
               create: true
           });
       </script>
       <script src="{{URL::asset('js/ajax/deletecontent.js')}}"></script>
       <script src="{{URL::asset('js/ajax/profileeditajax.js')}}"></script>
       <script src="{{URL::asset('js/ajax/addcontent.js')}}"></script>
         <style>

         </style>
       @endsection
