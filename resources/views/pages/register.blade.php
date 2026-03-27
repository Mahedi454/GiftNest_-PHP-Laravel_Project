@extends('layouts.app')

@section('title', 'GiftNest - Register')

@section('content')
  <section class="section auth">
    <div class="auth__shell">
      <div class="auth__intro">
        <div class="kicker">Create account</div>
        <h1>Register your GiftNest account</h1>
        <p class="lead">Customers can sign up and shop immediately. Admin roles are managed securely from the admin panel.</p>
        <div class="auth__highlights">
          <span class="chip">Secure passwords</span>
          <span class="chip">Customer dashboard</span>
          <span class="chip">Order-ready account</span>
        </div>
      </div>

      <div class="auth__card card">
        <div class="auth__cardHead">
          <h2>Create account</h2>
          <p class="muted">Enter your details to register.</p>
        </div>

        <form class="auth__form" method="POST" action="{{ route('register.store') }}">
          @csrf
          <label class="field">
            <span class="field__label">Name</span>
            <input class="input" type="text" name="name" value="{{ old('name') }}" required />
            @error('name') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" name="email" value="{{ old('email') }}" required />
            @error('email') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field">
            <span class="field__label">Password</span>
            <input class="input" type="password" name="password" required />
            @error('password') <span class="muted">{{ $message }}</span> @enderror
          </label>
          <label class="field">
            <span class="field__label">Confirm password</span>
            <input class="input" type="password" name="password_confirmation" required />
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
