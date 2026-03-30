@extends('layouts.app')

@section('title', 'GiftNest - Login')

@section('content')
  <section class="section auth">
    <div class="auth__shell">
      <div class="auth__intro">
        <div class="kicker">Authentication</div>
        <h1>Login to GiftNest</h1>
        <p class="lead">Use the standard GiftNest sign-in flow to access your orders or admin panel.</p>
        <div class="auth__highlights">
          <span class="chip">Laravel Breeze</span>
          <span class="chip">Session authentication</span>
          <span class="chip">Role-based redirect</span>
        </div>
      </div>

      <div class="auth__card card">
        <div class="auth__cardHead">
          <h2>Sign in</h2>
          <p class="muted">Use your account email and password.</p>
        </div>

        @if (session('status'))
          <p class="muted">{{ session('status') }}</p>
        @endif

        <form class="auth__form" method="POST" action="{{ route('login') }}">
          @csrf
          <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus autocomplete="username" />
            @error('email') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field">
            <span class="field__label">Password</span>
            <input class="input" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password" />
            @error('password') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field field--inline">
            <input type="checkbox" name="remember" value="1" @checked(old('remember')) />
            <span class="field__label">Remember me</span>
          </label>
          @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">Forgot your password?</a>
          @endif
          <button class="btn btn--full" type="submit">Login</button>
        </form>

        <div class="auth__bottom">
          <span class="muted">Need an account?</span>
          <a class="link" href="{{ route('register') }}">Create one</a>
        </div>
      </div>
    </div>
  </section>
@endsection
