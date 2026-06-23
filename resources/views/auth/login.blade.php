@extends('layouts.app')
@section('title', 'Login')
@section('content')
<h2>Welcome back</h2><p>Sign in to manage your {{ $websiteSettings->website_name }} website.</p>
@if(session('message'))<div class="auth-alert">{{ session('message') }}</div>@endif
<form method="POST" action="{{ route('login') }}">@csrf
  <div class="auth-field"><label for="email">Email address</label><div class="auth-input-wrap"><i class="bi bi-envelope"></i><input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="you@example.com"></div>@error('email')<p class="auth-error">{{ $message }}</p>@enderror</div>
  <div class="auth-field"><label for="password">Password</label><div class="auth-input-wrap"><i class="bi bi-lock"></i><input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password"></div>@error('password')<p class="auth-error">{{ $message }}</p>@enderror</div>
  <div class="auth-row"><label class="auth-check"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me</label>@if(Route::has('password.request'))<a class="auth-link" href="{{ route('password.request') }}">Forgot password?</a>@endif</div>
  <button class="auth-submit" type="submit">Login to dashboard <i class="bi bi-arrow-right"></i></button>
</form>
@endsection
