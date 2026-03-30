@extends('layouts.app')

@section('title', 'GiftNest - Register')

@section('content')
  <section class="section auth">
    <div class="auth__shell">
      <div class="auth__intro">
        <div class="kicker">Create account</div>
        <h1>Register your GiftNest account</h1>
        <p class="lead">Create a customer account with Laravel Breeze so you can shop, manage orders, and continue to checkout.</p>
        <div class="auth__highlights">
          <span class="chip">Laravel Breeze</span>
          <span class="chip">Secure passwords</span>
          <span class="chip">Order-ready account</span>
        </div>
      </div>

      <div class="auth__card card">
        <div class="auth__cardHead">
          <h2>Create account</h2>
          <p class="muted">Enter your details to register.</p>
        </div>

        @if ($errors->any())
          <div class="auth__errors">
            <strong>Please fix these fields:</strong>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form class="auth__form" method="POST" action="{{ route('register') }}">
          @csrf
          <label class="field">
            <span class="field__label">Name</span>
            <input class="input" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" />
            @error('name') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            @error('email') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field">
            <span class="field__label">Password</span>
            <input class="input" type="password" name="password" required autocomplete="new-password" />
            @error('password') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field">
            <span class="field__label">Confirm password</span>
            <input class="input" type="password" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <button class="btn btn--full" type="submit">Create account</button>
        </form>

        <div class="auth__bottom">
          <span class="muted">Already registered?</span>
          <a class="link" href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </div>
  </section>
@endsection
