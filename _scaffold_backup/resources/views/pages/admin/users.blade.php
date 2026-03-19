@extends('layouts.admin')

@section('title', 'Admin · Users')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Users</h1>
      <div class="muted">Roles: user/admin (wire to database later).</div>
    </div>

    <div class="card table">
      <div class="table__row table__head">
        <div>Name</div>
        <div>Email</div>
        <div>Role</div>
        <div>Action</div>
      </div>
      @for ($i = 1; $i <= 6; $i++)
        <div class="table__row">
          <div>User {{ $i }}</div>
          <div class="muted">user{{ $i }}@mail.com</div>
          <div><span class="chip">{{ $i === 1 ? 'admin' : 'user' }}</span></div>
          <div class="table__actions">
            <button class="btn btn--ghost btn--small" type="button">Edit</button>
          </div>
        </div>
      @endfor
    </div>
  </section>
@endsection

