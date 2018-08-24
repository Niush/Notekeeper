<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>NoteKeeper</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
	
	<ul id="slide-out" class="sidenav">
		<a class="sidenav-close" href="#!"><i class="material-icons">&#xe5cd</i></a>
		<li><div class="user-view">
		  <div class="background">
			<img src="{{ asset('images/material_bg.jpg') }}" style="width:100%">
          </div>
          @guest
            <a href="#"><img class="circle" src="{{ asset('images/material_user.png') }}"></a>
            <a href="#"><span class="white-text name">Note Keeper</span></a>
            <a href="#"><span class="white-text email">Where You Store Your Notes</span></a>
          @else
            <a href="#user"><img class="circle" src="{{ asset('images/material_user.png') }}"></a>
            <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
            <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
          @endguest
        </div></li>
        
        @guest
            <li><a class="waves-effect modal-trigger" href="{{ route('login') }}">Login</a></li>
            <li><a class="waves-effect" href="{{ route('register') }}">Want to Register?</a></li>
            <li><a class="subheader">Links</a></li>
            <li><a class="waves-effect" href="#!">About</a></li>
            <li><a class="waves-effect" href="#!">Contact</a></li>
            <li><a class="waves-effect" href="#!">Terms</a></li>
            <li><a class="waves-effect" href="#!">FAQ</a></li>
        @else
            <li><div class="divider"></div></li>
            <li><a class="subheader">Links</a></li>
            <li><a class="waves-effect" href="{{ route('trash') }}">Trash</a></li>
            <li><a class="waves-effect" href="{{ route('home') }}">Dashboard</a></li>
            <li><a class="waves-effect" href="#!">Account</a></li>
            <li><a class="waves-effect" href="#!">Messages</a></li>
            
            <li><div class="divider"></div></li>
            <li><a class="subheader">Links</a></li>
            <li><a class="waves-effect" href="#!">About</a></li>
            <li><a class="waves-effect" href="#!">Contact</a></li>
            <li><a class="waves-effect" href="#!">Terms</a></li>
            <li><a class="waves-effect" href="#!">FAQ</a></li>
		@endguest
	</ul>
  
	<main>
	
	<div class="navbar-fixed">
		<nav>
		<div class="nav-wrapper">		  
		  <ul id="nav-mobile" class="left">
			<li><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">&#xe5d2;</i></a></li>
			<a href="{{ route('index') }}" class="brand-logo">Note Keeper</a>
		  </ul>
		  
		  <ul id="nav-mobile" class="right result-container hide-on-med-and-down">
      
	  @guest
		
	  @else
      <li>
        <div class="input-field">
          <input id="search" type="search" id="search" required/>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </li>
	  @endguest

      <li>
        <div class="result">
          <!--RESULT HERE-->
        </div>
      </li>

			<li><a class="waves-effect waves-light" href="#">About</a></li>
			<li><a class="waves-effect waves-light" href="#">Contact</a></li>
            <!--Model Trigger-->
            @guest
                <li><a class="waves-effect waves-light modal-trigger" href="{{ route('login') }}">Login</a></li>
                <li><a class="waves-effect waves-light modal-trigger" href="{{ route('register') }}">Register</a></li>
			@else
			<a class='dropdown-trigger btn' href='#' data-target='dropdown1' hover="true">Me</a>
			  <ul id='dropdown1' class='dropdown-content'>
				<li><a href="#" class="teal white-text">{{ Auth::user()->name }}</a></li>
				<li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('trash') }}">Trash</a></li>
				<li class="divider" tabindex="-1"></li>
				<li><a href="#!">Account</a></li>
        <li><a href="#!">Messages</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="{{ route('logout') }}" class="red white-text">Logout</a></li>
			  </ul>
			@endguest
		  </ul>
		</div>
	  </nav>
	 </div>
     
     @yield('content')
	
    </main>
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>