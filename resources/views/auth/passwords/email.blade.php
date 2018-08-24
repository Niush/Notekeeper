@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	<form class="col s12" method="POST" action="{{ route('password.email') }}">
	{{ csrf_field() }}
	<div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card">
				<div class="card-content">
				<div class="row">
					<span class="card-title">Reset Password</span>
					<div class="input-field col s8">
						@if (session('status'))
							<div class="msgE">
								{{ session('status') }}
							</div>
						@endif

							<i class="material-icons prefix">&#xe853</i>
							<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
							<label for="email">E-Mail Address</label>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
					</div>
				</div>
				</div>
				
				<div class="card-action teal">
					<div>
						<button type="submit" class="btn green">
							Send Password Reset Link
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	</div>
</div>
@endsection
