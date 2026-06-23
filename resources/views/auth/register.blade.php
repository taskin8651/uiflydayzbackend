@extends('layouts.app')
@section('title', 'Register')
@section('content')
<h2>Create your account</h2><p>Join {{ $websiteSettings->website_name }} and get started.</p>
<form method="POST" action="{{ route('register') }}">@csrf
  <div class="auth-field"><label for="name">Your name</label><div class="auth-input-wrap"><i class="bi bi-person"></i><input id="name" class="auth-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your full name"></div>@error('name')<p class="auth-error">{{ $message }}</p>@enderror</div>
  <div class="auth-field"><label for="email">Email address</label><div class="auth-input-wrap"><i class="bi bi-envelope"></i><input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="you@example.com"></div>@error('email')<p class="auth-error">{{ $message }}</p>@enderror</div>
  <div class="auth-field"><label for="password">Password</label><div class="auth-input-wrap"><i class="bi bi-lock"></i><input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password" placeholder="At least 8 characters"></div>@error('password')<p class="auth-error">{{ $message }}</p>@enderror</div>
  <div class="auth-field"><label for="password-confirm">Confirm password</label><div class="auth-input-wrap"><i class="bi bi-shield-lock"></i><input id="password-confirm" class="auth-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password"></div></div>
  <button class="auth-submit" type="submit">Create account <i class="bi bi-arrow-right"></i></button>
</form>
<p class="auth-switch">Already have an account? <a class="auth-link" href="{{ route('login') }}">Login</a></p>
@endsection
