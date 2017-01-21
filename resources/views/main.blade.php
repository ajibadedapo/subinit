
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Serif:400,700' rel='stylesheet' type='text/css'>
<!--google fonts-->
<link rel="stylesheet" href="{{URL::asset('css/flexslider.css')}}" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--//tab-->
	<script src="{{URL::asset('js/jquery-1.11.0.min.js')}}"></script>

	<script src="{{URL::asset('js/mediaelement-and-player.min.js')}}"></script>
	<link href="{{URL::asset('css/mediaelementplayer.min.css')}}" rel="stylesheet" type="text/css" media="all"/>

	<!--tab js-->
<script src="{{URL::asset('js/paccordion.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.js')}}"></script>
<script src="{{URL::asset('js/moreinputfield.js')}}"></script>

	<link rel="stylesheet"
		  type="text/css"
		  href="{{URL::asset('css/jquery-confirm.css')}}"/>
	<script type="text/javascript"
			src="{{URL::asset('js/jquery-confirm.js')}}"></script>
</head>
<body>
<!--banner start here-->
<div class="banner">
   <div class="header">
		   <div class="header-main">
		   	 <div class="container">
			 <div class="logo">
			 	<h1><a href="/"> Edifices</a></h1>
			 </div>
			 <div class="top-nav">
			    	 <span class="menu"> <img src="{{URL::asset('images/icon.png')}}" alt=""></span>
			      <nav class="cl-effect-11" id="cl-effect-11">
					 <ul class="res">
						 @include('searchmodal')
						<li><a class="@if(Route::is('feed'))active @endif" href="/" data-hover="Feed">Feed</a></li>
						<li><a class="searchlink" style="cursor: pointer;" data-toggle="modal" data-target="#searchModal" data-hover="Search">Search</a></li>
						{{--<li><a href="service.html" data-hover="Services">Services</a></li>
						<li><a href="shortcodes.html" data-hover="Codes">Codes</a></li>
c						<li><a href="gallery.html" data-hover="Gallery">Gallery</a></li>--}}
						<li><a class="@if(Route::is('profile')) active @endif" href="/profile" data-hover="Profile">Profile</a></li>
						 <li><a href="/logout" data-hover="Logout">Logout</a></li>
						 <li><a href="/registerforpayment" data-hover="Payment">Payment</a></li>
					 </ul>
				 </nav>
					<!-- script-for-menu -->
								 <script>
								   $( "span.menu" ).click(function() {
									 $( "ul.res" ).slideToggle( 300, function() {
									 // Animation complete.
									  });
									 });

									 $(".searchlink").on('click', function(){

									 });
								</script>
				<!-- /script-for-menu -->
			</div>	
			 <div class="clearfix"> </div>
		   </div>
		   </div>
	   </div>
        <div class="container content-container">
             @yield('content')
		</div>
</div>

<script src="{{URL::asset('js/tinymce.min.js')}}"></script>
<script>
	$().ready(function () {
		tinymce.init({
			selector: '.mceeditor',
			height: 300,
			theme: 'modern',
			plugins: [
				'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				'searchreplace wordcount visualblocks visualchars code fullscreen',
				'insertdatetime media nonbreaking save table contextmenu directionality',
				'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc',
				'image imagetools'
			],
			toolbar1: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			relative_urls: false,
			menubar: false,
			file_browser_callback: function(field_name, url, type, win) {
				// trigger file upload form
				if (type == 'image') $('#formUpload input').click();
			}
		});

	});
</script>
<script>

	$('audio,video').mediaelementplayer({
		//mode: 'shim',
		success: function(player, node) {
			$('#' + node.id + '-mode').html('mode: ' + player.pluginType);
		}
	});

</script>
<style>
/*	.modal {
		position: fixed;
		top: 0;
		right: auto;
		bottom: 0;
		left: auto;
		z-index: 1050;
	}*/
	.Popup.popup.compact.header_edit.modal-content.js-widget {
		margin: 0 auto;
		display: inherit;
		max-width: 60vw;
		max-height: 70vh;
	}
</style>
<script src="{{URL::asset('js/ajax/download.js')}}"></script>
<script src="{{URL::asset('js/ajax/like.js')}}"></script>
<script src="{{URL::asset('js/ajax/addComment.js')}}"></script>

<script>
	var token ='{{csrf_token()}}';
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
<!-- RERO's custom jQuery-UI theme -->
<link rel="stylesheet" href="http://demo.multivio.org/css/rero-theme/jquery-ui-1.8.16.custom.css" type="text/css" />
<!-- Multivio preview's custom CSS and JS -->
<link rel="stylesheet" href="http://demo.multivio.org/css/1.0/multivio-min.css" type="text/css" />
<script src="http://demo.multivio.org/js/1.0/multivio-dev.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery.browser = {};
	(function () {
		jQuery.browser.msie = false;
		jQuery.browser.version = 0;
		if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
			jQuery.browser.msie = true;
			jQuery.browser.version = RegExp.$1;
		}
	})();
	$(document).ready(function () {
		$('a.multivio-preview').enableMultivio({
			method: 'overlay',
			downloadButton: true,
			quickViewButton: true,
			previewAttr: 'href'
		});
	});
</script>

</body>
</html>
