@extends('layouts.app')

@section('title', 'GiftNest · Register')

@section('content')
  <section class="section auth">
    <div class="auth__card card">
      <h1>Create your account</h1>
      <p class="muted">Register UI scaffold. Wire to Laravel auth in Phase 2.</p>

      <form class="auth__form">
        <label class="field">
          <span class="field__label">Name</span>
          <input class="input" type="text" placeholder="Your name" />
        </label>
        <label class="field">
          <span class="field__label">Email</span>
          <input class="input" type="email" placeholder="you@example.com" />
        </label>
        <label class="field">
          <span class="field__label">Password</span>
          <input class="input" type="password" placeholder="••••••••" />
        </label>
        <button class="btn btn--full" type="button">Create account</button>
      </form>

      <div class="auth__bottom">
        <span class="muted">Already have an account?</span>
        <a class="link" href="{{ route('login') }}">Login</a>
      </div>
    </div>
  </section>
@endsection

