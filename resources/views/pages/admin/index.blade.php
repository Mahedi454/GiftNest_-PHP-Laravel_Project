@extends('layouts.admin')

@section('title', 'Admin · Overview')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Admin Overview</h1>
      <div class="muted">Manage products, orders, and users.</div>
    </div>

    <div class="grid grid--3">
      <a class="card kpi" href="{{ route('admin.products') }}">
        <div class="kpi__label">Products</div>
        <div class="kpi__value">—</div>
        <div class="muted small">CRUD management</div>
      </a>
      <a class="card kpi" href="{{ route('admin.orders') }}">
        <div class="kpi__label">Orders</div>
        <div class="kpi__value">—</div>
        <div class="muted small">Status workflow</div>
      </a>
      <a class="card kpi" href="{{ route('admin.users') }}">
        <div class="kpi__label">Users</div>
        <div class="kpi__value">—</div>
        <div class="muted small">Roles (admin/user)</div>
      </a>
    </div>
  </section>
@endsection

