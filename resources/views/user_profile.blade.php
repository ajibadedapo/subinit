@extends('main')
   @section('content')
       <div class="row" style="margin: 0 5px;">

           <div class="col-md-12 " id="coverarea" style="background: @if($user->cover_photo) url('/uploads/{{$user->cover_photo}}') @else url('/images/default_cover_photo.jpg') @endif no-repeat; background-size: cover ">
               <img class="col-md-12 img-responsive img-circle" style="max-height: 200px; max-width: 200px; display: block ;padding: 14px;" src="@if($user->profile_photo){{URL::asset('/uploads/'.$user->profile_photo)}} @else {{URL::asset('/images/default_photo.png')}} @endif"/>

           </div>
           <div class="col-md-12 wow fadeInDown animated" data-wow-delay=".5s">
               <h3 class="hdg profilename" style="text-align: left; margin-top: 15px;"><span class="newprofilename">
                       {{$user->name}}
                   </span>
               </h3>
               <div class="briefdesc">
                   <p class="writedescription"><a  style="text-align: left;margin-top: 15px;"><label for="select-tools" style=" color: #617481;">Job:</label><span id="joblist">@foreach($userjobs as $userjob) {{str_replace('_', ' ', $userjob->job_slug)}}<span style="color: #999">|</span> @endforeach</span></a></p>
               </div>
           </div>
           <div class="row">
               <a hidden style="margin-right: 30px;display: inline;" href="/subscription?recid={{$user->id}}"  class="btn subs hiddensub  btn-default subscribe">Subscribe</a>
               <script>
                   $('.hiddensub').hide();
               </script>
               <p>
              @if(($user->lpk)&&($user->lsk))
                  {{--{{$user->}}--}}
               @if(count($mysubscribing)<1)
                       <a style="margin-right: 30px;display: inline;" href="/subscription?recid={{$user->id}}"  class="btn subs  btn-default subscribe">Subscribe</a>
                     @else
                           <a style="margin-right: 30px;display: inline;" data-unsubscribe="{{$user->id}}"  class="btn subs  btn-primary unsubscribe">Cancel Subscription</a>
                   @endif
               @endif
               <div class="col-sm-4"> {{ count($subscriber)}} Subscribers</div>
{{--
                   <button style="/*margin-right: 19px;*/display: inline; float: right;" class="shareprofilebtn  btn-lg"> Message</button>
--}}
               {{--<br/>--}}
                   <p style="float: right" data-toggle="modal" data-target="#priceupdateModal" ><button style="/*margin: 19px;*/display: inline;  border-radius: 30px;" class="btn-primary  btn-lg" id="pricebtn"> <i class="fa fa-dollars"></i>@if(isset($user->price)) $ <span class="newprice">{{$user->price}}</span> @else <span class="newprice">???</span> @endif/<span style="font-size: 70%">month</span></button></p>

               </p>


            </div>

           <hr style="width:100%; margin-top:1%;">
           <div class="row">
               <div class="benefits_container own-role" ><div class="label btn sub-benefits">Subscriber Benefits</div><br/><br/><br/><div class="benefits-list">
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

                           @endif
                       </ul>
                       </div></div>

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

       <script>
           var token ='{{csrf_token()}}';
       </script>

       <script src="{{URL::asset('js/ajax/unsubscribe.js')}}"></script>
       @endsection
