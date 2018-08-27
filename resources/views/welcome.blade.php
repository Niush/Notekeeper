@extends('layouts.app')

@section('content')

@if(Session::has('msgE'))
    <span class="helper">
        {{ Session::get('msgE') }}
    </span>
@endif

@if(Session::has('msgS'))
    <span class="helper_success">
        {{ Session::get('msgS') }}
    </span>
@endif

<div class="row center">
    <div class="card col s12 m8 offset-m2">
        <h4>Keep All Your Notes Safe</h4>
        <hr/>
        <h5>Access Anytime</h5>
        <h5>Edit Delete and Add As Many Notes for Free</h5>
        <hr style="margin-left:20%;margin-right:20%;"/>
        @guest
            <h5>Let's Get Started</h5>
            <a class="btn success" href="{{ route('register') }}">Register Now</a>
            <br/>
            <br/>
            <a href="{{ route('login') }}">Already a User? Login</a>
            <br/>
            <br/>
        @else
            <h5>Make More Notes</h5>
            <br/>
            <a class="btn success" href="{{ route('home') }}">Go To Dashboard</a>
            <br/>
            <br/>
        @endguest
        <h6 style="color:red;font-width:700;">!! Not Much of a Encryption. It's Just me Playing With Laravel. !!</h6>
    </div>
</div>

@endsection
