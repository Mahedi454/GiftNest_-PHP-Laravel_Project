@extends('layouts.admin')

@section('title', 'Admin - Users')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>Manage users</h1>
        <div class="muted">View registered users and update their roles.</div>
      </div>
    </div>

    @if (session('status'))
      <div class="card" style="margin-bottom: 1rem; padding: 1rem;">{{ session('status') }}</div>
    @endif

    <div class="card table">
      <div class="table__row table__head">
        <div>Name</div>
        <div>Email</div>
        <div>Role</div>
        <div>Created</div>
        <div>Action</div>
      </div>
      @foreach ($users as $user)
        <div class="table__row">
          <div>{{ $user->name }}</div>
          <div>{{ $user->email }}</div>
          <div><span class="chip">{{ ucfirst($user->role) }}</span></div>
          <div>{{ $user->created_at->format('d M Y') }}</div>
          <div>
            <form method="POST" action="{{ route('admin.users.role', $user) }}">
              @csrf
              @method('PATCH')
              <select class="input" name="role">
                <option value="user" @selected($user->role === 'user')>User</option>
                <option value="admin" @selected($user->role === 'admin')>Admin</option>
              </select>
              <button class="btn btn--small" type="submit" style="margin-top: 0.5rem;">Update</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
