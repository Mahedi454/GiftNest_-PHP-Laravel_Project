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

  <section class="section">
    <div class="section__head">
      <div>
        <h2>Latest orders</h2>
        <div class="muted">Recent customer activity from the orders table.</div>
      </div>
      <a class="link" href="{{ route('admin.orders') }}">View all orders</a>
    </div>

    <div class="card table">
      <div class="table__row table__head">
        <div>Order ID</div>
        <div>Customer</div>
        <div>Status</div>
        <div>Total</div>
      </div>
      @forelse ($latestOrders as $order)
        <div class="table__row">
          <div>#{{ $order->id }}</div>
          <div>{{ $order->user->name }}</div>
          <div><span class="chip">{{ ucfirst($order->status) }}</span></div>
          <div>Tk {{ number_format((float) $order->total_price, 2) }}</div>
        </div>
      @empty
        <div class="table__row">
          <div>No orders yet.</div>
          <div>-</div>
          <div>-</div>
          <div>-</div>
        </div>
      @endforelse
    </div>
  </section>
@endsection
