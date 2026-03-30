@extends('layouts.admin')

@section('title', 'Admin - Users')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>Manage users</h1>
        <div class="muted">Separate admins from customers and control permissions from one secure screen.</div>
      </div>
    </div>

    @if (session('status'))
      <div class="card admin-feedback">{{ session('status') }}</div>
    @endif

    <div class="grid grid--3">
      <article class="card kpi">
        <div class="kpi__label">Total users</div>
        <div class="kpi__value">{{ $userStats['total'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Administrators</div>
        <div class="kpi__value">{{ $userStats['admins'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Customers</div>
        <div class="kpi__value">{{ $userStats['customers'] }}</div>
      </article>
    </div>
  </section>

  <section class="section section--tight">
    <div class="card table">
      <div class="table__row table__head table__row--users">
        <div>User</div>
        <div>Email</div>
        <div>Role</div>
        <div>Joined</div>
        <div>Actions</div>
      </div>

      @forelse ($users as $user)
        <div class="table__row table__row--users">
          <div>
            <strong>{{ $user->name }}</strong>
          </div>
          <div>{{ $user->email }}</div>
          <div>
            <span class="status {{ $user->role === 'admin' ? 'status--delivered' : 'status--shipped' }}">
              {{ $user->role === 'admin' ? 'Administrator' : 'Customer' }}
            </span>
          </div>
          <div>{{ $user->created_at->format('d M Y') }}</div>
          <div>
            <form class="admin-inline-form admin-inline-form--role" method="POST" action="{{ route('admin.users.role', $user) }}">
              @csrf
              @method('PATCH')
              <select class="input" name="role">
                <option value="user" @selected($user->role === 'user')>User</option>
                <option value="admin" @selected($user->role === 'admin')>Admin</option>
              </select>
              <button class="btn admin-inline-form__button" type="submit">Update role</button>
            </form>
          </div>
        </div>
      @empty
        <div class="empty">
          <div class="empty__title">No users yet</div>
          <div class="empty__subtitle">Registered accounts will appear here for admin role management.</div>
        </div>
      @endforelse
    </div>

    <div class="pagination">
      {{ $users->links() }}
    </div>
  </section>
@endsection
