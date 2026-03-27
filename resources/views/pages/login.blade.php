@extends('layouts.app')

@section('title', 'GiftNest - Admin Login')

@section('content')
  <section class="section auth">
    <div class="auth__shell">
      <div class="auth__intro">
        <div class="kicker">Authentication</div>
        <h1>Login to GiftNest</h1>
        <p class="lead">Admins are redirected to the dashboard after login. Customers go to their account area.</p>
        <div class="auth__highlights">
          <span class="chip">Role-based access</span>
          <span class="chip">Protected admin routes</span>
          <span class="chip">Session authentication</span>
        </div>
      </div>

      <div class="auth__card card">
        <div class="auth__cardHead">
          <h2>Sign in</h2>
          <p class="muted">Use your account email and password.</p>
        </div>

        <form class="auth__form" method="POST" action="{{ route('login.store') }}">
          @csrf
          <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required />
            @error('email') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field">
            <span class="field__label">Password</span>
            <input class="input" type="password" name="password" placeholder="Enter your password" required />
            @error('password') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field field--inline">
            <input type="checkbox" name="remember" value="1" />
            <span class="field__label">Remember me</span>
          </label>
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
