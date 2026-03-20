@extends('layouts.app')

@section('title', 'GiftNest - Register')

@section('content')
  <section class="section auth">
    <div class="auth__shell">
      <div class="auth__intro">
        <div class="kicker">Create account</div>
        <h1>Start shopping with a cleaner account setup</h1>
        <p class="lead">
          Create your GiftNest account to save favorites, move through checkout faster, and keep delivery details ready.
        </p>
        <div class="auth__highlights">
          <span class="chip">Faster checkout</span>
          <span class="chip">Saved favorites</span>
          <span class="chip">Order history</span>
        </div>
      </div>

      <div class="auth__card card">
        <div class="auth__cardHead">
          <h2>Create your account</h2>
          <p class="muted">A few details now for a faster gifting experience.</p>
        </div>

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
            <input class="input" type="password" placeholder="Create a password" />
          </label>
          <button class="btn btn--full" type="button">Create account</button>
        </form>

        <div class="auth__bottom">
          <span class="muted">Already have an account?</span>
          <a class="link" href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </div>
  </section>
@endsection
