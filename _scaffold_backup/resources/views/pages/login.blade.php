@extends('layouts.app')

@section('title', 'GiftNest · Login')

@section('content')
  <section class="section auth">
    <div class="auth__card card">
      <h1>Welcome back</h1>
      <p class="muted">Login UI scaffold. Wire to Laravel auth in Phase 2.</p>

      <form class="auth__form">
        <label class="field">
          <span class="field__label">Email</span>
          <input class="input" type="email" placeholder="you@example.com" />
        </label>
        <label class="field">
          <span class="field__label">Password</span>
          <input class="input" type="password" placeholder="••••••••" />
        </label>
        <button class="btn btn--full" type="button">Login</button>
      </form>

      <div class="auth__bottom">
        <span class="muted">New here?</span>
        <a class="link" href="{{ route('register') }}">Create an account</a>
      </div>
    </div>
  </section>
@endsection

