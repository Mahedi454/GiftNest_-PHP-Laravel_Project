@extends('layouts.admin')

@section('title', 'Admin - Dashboard')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <div class="kicker">Admin dashboard</div>
        <h1>Business overview</h1>
      </div>
      <div class="muted">Live totals are pulled from your MySQL-backed tables.</div>
    </div>

    <div class="grid grid--4">
      <article class="card kpi">
        <div class="kpi__label">Total users</div>
        <div class="kpi__value">{{ $stats['users'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Total products</div>
        <div class="kpi__value">{{ $stats['products'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Total orders</div>
        <div class="kpi__value">{{ $stats['orders'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Total revenue</div>
        <div class="kpi__value">Tk {{ number_format((float) $stats['revenue'], 2) }}</div>
      </article>
    </div>
  </section>

  <section class="section section--tight">
    <div class="grid grid--3">
      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">P</div>
        <h3>Product control</h3>
        <p>Manage catalog items, stock, visibility, and images from a cleaner admin product workflow.</p>
      </article>
      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">C</div>
        <h3>Category structure</h3>
        <p>Organize the storefront with dedicated categories so products stay easy to browse and maintain.</p>
      </article>
      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">U</div>
        <h3>User roles</h3>
        <p>Separate customers from administrators and control role changes safely from the users panel.</p>
      </article>
    </div>
  </section>
@endsection
