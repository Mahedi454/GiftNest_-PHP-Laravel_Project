@extends('layouts.app')

@section('title', 'GiftNest - Login')

@section('content')
  <section class="section auth">
    <div class="auth__shell">
      <div class="auth__intro">
        <div class="kicker">Account access</div>
        <h1>Welcome back</h1>
        <p class="lead">
          Sign in to manage your orders, wishlist, and saved gift ideas without losing your progress.
        </p>
        <div class="auth__highlights">
          <span class="chip">Quick checkout</span>
          <span class="chip">Wishlist sync</span>
          <span class="chip">Order updates</span>
        </div>
      </div>

      <div class="auth__card card">
        <div class="auth__cardHead">
          <h2>Login to your account</h2>
          <p class="muted">Use your email and password to continue.</p>
        </div>

        <form class="auth__form">
          <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" placeholder="you@example.com" />
          </label>
          <label class="field">
            <span class="field__label">Password</span>
            <input class="input" type="password" placeholder="Enter your password" />
          </label>
          <button class="btn btn--full" type="button">Login</button>
        </form>

        <div class="auth__bottom">
          <span class="muted">New here?</span>
          <a class="link" href="{{ route('register') }}">Create an account</a>
        </div>
      </div>
    </div>
  </section>
@endsection
