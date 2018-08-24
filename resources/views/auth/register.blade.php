@extends('layouts.app')

@section('content')
<div class="container">
    @guest
        <div class="row">
            <form class="col s12" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="row register">
            <div class="col s12 m8 offset-m2">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Register</span>
                
                <div class="row">
                    <div class="row">
                        <div class="input-field col s6">
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="validate" required>
                        <label for="name">Name</label>
                        <span class="helper">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="input-field col s6">
                        <input id="username" type="text" name="username" value="{{ old('username') }}" class="validate" required>
                        <label for="username">Username</label>
                        <span class="helper">{{ $errors->first('username') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate" required>
                        <label for="email">Email</label>
                        <span class="helper">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="validate" required>
                        <label for="password">Password</label>
                        <span class="helper">{{ $errors->first('password') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="password-confirm" type="password" name="password_confirmation" class="validate" required>
                        <label for="password-confirm">Confirm Password</label>
                        <span class="helper">{{ $errors->first('password-confirm') }}</span>
                        </div>
                    </div>
                </div>  
                </div>
                
                <div class="card-action teal">
                <input type="submit" class="btn green" value="Register"/>
                <br/>
                <br/>
                <a href="{{ route('login') }}">Want to Login?</a>
                </div>
            </div>
            </div>
            </form>
        </div>        
    </div>
    @endguest
</div>
@endsection