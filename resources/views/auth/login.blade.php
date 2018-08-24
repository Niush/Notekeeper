@extends('layouts.app')

@section('content')
<div class="container">
    @guest
        <div class="row">
            <form class="col s12" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                        <div class="row">
                            <span class="card-title">Login</span>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">&#xe853</i>
                                <input id="username" value="{{ old('username') }}" type="text" name="username" class="validate" required>
                                <label for="username">Username</label>
                                <span class="helper">{{ $errors->first('username') }}</span>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">&#xe8e8</i>
                                <input id="password" type="password" name="password" class="validate" required>
                                <label for="password">Password</label>
                                <span class="helper">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="input-field col s6">
                                <p>
                                    <label>
                                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                        <span>Remember Me</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        </div>

                        <div class="card-action teal">
                            <input type="submit" class="btn green" value="Login">
                            <br/>
                            <br/>
                            <a href="{{ route('password.request') }}">Forget Password :(</a>
                            <br/>
                            <a href="{{ route('register') }}">Want to Register? </a>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    @endguest
</div>
@endsection