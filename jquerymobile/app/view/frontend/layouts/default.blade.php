<!-- Traduction Laravel-france  -->
<!-- Maj:2/05/2013 - frontend/form.php -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title') ::
			{{Lang::get('commons.site-title')}}
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
		<link href="{{ asset('assets/jquerymobile/css/jquery.mobile-1.3.1.min.css') }}" rel="stylesheet">
		

		<style>
		@section('styles')
		
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		
		<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
	</head>

	<body>
		<!-- Container -->
		<div data-role="page" data-theme="b" id="demo-page"> 
			<!-- Navbar -->
			<div data-role="header" data-theme="b">
				<h1>@section('title')
				@show
				</h1>
				<a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Menu</a>
			</div>

			<div data-role="content">
			<!-- Notifications -->
			@include('notifications')

			<!-- Content -->
			@yield('content')

			</div>
			

			<!-- Footer -->
			<hr />
			<div data-role="footer">
			<footer>
				<p>{{Lang::get('commons.copyright')}}</p>
			</footer>
			</div>
			
		
			
		<div data-role="panel" id="left-panel" data-theme="c">
		
			<ul data-role="listview" data-theme="d">
				<li data-icon="delete"><a href="#" data-rel="close">Fermer</a></li>
				<li data-role="list-divider">Menu</li>
				<li data-icon="home"><a href="{{ route('home') }}" rel="external">{{Lang::get('frontend/menu.home')}}</a></li>
				<li><a href="{{ URL::to('about-us') }}" rel="external">{{Lang::get('frontend/menu.about-us')}}</a></li>
				<li><a href="{{ route('contact-us') }}" rel="external">{{Lang::get('frontend/menu.contact-us')}}</a></li>
			</ul>
				
			@if (Sentry::check())
				
			<div data-role="collapsible" data-inset="false" data-iconpos="right" data-theme="b" data-content-theme="d">

				<h3>{{Sentry::getUser()->first_name}}</h3>
		
				<ul data-role="listview">
				@if(Sentry::getUser()->hasAccess('admin'))
				  <li><a href="{{ route('admin') }}" rel="external">{{Lang::get('frontend/menu.user.submenus.admin')}}</a></li>
				@endif
				  <li><a href="{{ route('profile') }}" rel="external" {{ (Request::is('account/profile') ? ' data-theme="e""' : '') }}>{{Lang::get('frontend/menu.user.submenus.profile')}}</a></li>
				  <li><a href="{{ route('logout') }}" rel="external">{{Lang::get('frontend/menu.user.submenus.logout')}}</a></li>
				</ul>

			</div><!-- /collapsible -->
			
			@else
			
			<div data-role="collapsible" data-inset="false" data-iconpos="right" data-theme="b" data-content-theme="d">

				<h3>utilisateur</h3>
		
				<ul data-role="listview">
				  <li><a href="{{ route('signin') }}" rel="external">{{Lang::get('frontend/menu.signin')}}</a></li>
				  <li><a href="{{ route('signup') }}" rel="external">{{Lang::get('frontend/menu.signup')}}</a></li>
				</ul>

			</div><!-- /collapsible -->			

			@endif



		</div><!-- /panel -->

  	
		</div>
		
				
		

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('assets/jquerymobile/js/jquery.js') }}"></script>
		<script src="{{ asset('assets/jquerymobile/js/jquery.mobile-1.3.1.min.js') }}"></script>
	</body>
</html>
