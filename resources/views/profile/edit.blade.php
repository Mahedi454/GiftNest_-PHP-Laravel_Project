@extends('layouts.app')

@section('title', 'GiftNest - Profile')

@section('content')
  <section class="section auth">
    <div class="section__head">
      <div>
        <div class="kicker">My account</div>
        <h1>Manage your profile</h1>
      </div>
      <div class="muted">Update your personal details, delivery contact, and account password.</div>
    </div>

    <div class="profile-shell">
      <div class="card profile-panel">
        <div class="auth__cardHead">
          <h2>Profile information</h2>
          <p class="muted">Keep your account details current for orders and account access.</p>
        </div>

        @if (session('status') === 'profile-updated')
          <div class="chip chip--strong">Profile updated successfully.</div>
        @endif

        <form class="auth__form" method="POST" action="{{ route('profile.update') }}">
          @csrf
          @method('PATCH')

          <div class="formgrid">
            <label class="field">
              <span class="field__label">Full name</span>
              <input class="input" type="text" name="name" value="{{ old('name', $user->name) }}" required />
              @error('name') <span class="muted">{{ $message }}</span> @enderror
            </label>

            <label class="field">
              <span class="field__label">Email</span>
              <input class="input" type="email" name="email" value="{{ old('email', $user->email) }}" required />
              @error('email') <span class="muted">{{ $message }}</span> @enderror
            </label>

            <label class="field">
              <span class="field__label">Phone number</span>
              <input class="input" type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="+8801XXXXXXXXX" />
              @error('phone') <span class="muted">{{ $message }}</span> @enderror
            </label>
          </div>

          <label class="field">
            <span class="field__label">Address</span>
            <textarea class="input" name="address" rows="4" placeholder="Your delivery address">{{ old('address', $user->address) }}</textarea>
            @error('address') <span class="muted">{{ $message }}</span> @enderror
          </label>

          <button class="btn" type="submit">Save profile</button>
        </form>
      </div>

      <div class="card profile-panel">
        <div class="auth__cardHead">
          <h2>Change password</h2>
          <p class="muted">Choose a strong password to keep your account secure.</p>
        </div>

        @if (session('status') === 'password-updated')
          <div class="chip chip--strong">Password updated successfully.</div>
        @endif

        <form class="auth__form" method="POST" action="{{ route('password.update') }}">
          @csrf
          @method('PUT')

          <label class="field">
            <span class="field__label">Current password</span>
            <input class="input" type="password" name="current_password" autocomplete="current-password" />
            @error('current_password', 'updatePassword') <span class="muted">{{ $message }}</span> @enderror
          </label>

          <label class="field">
            <span class="field__label">New password</span>
            <input class="input" type="password" name="password" autocomplete="new-password" />
            @error('password', 'updatePassword') <span class="muted">{{ $message }}</span> @enderror
          </label>

          <label class="field">
            <span class="field__label">Confirm new password</span>
            <input class="input" type="password" name="password_confirmation" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword') <span class="muted">{{ $message }}</span> @enderror
          </label>

          <button class="btn" type="submit">Update password</button>
        </form>
      </div>
    </div>
  </section>
@endsection
