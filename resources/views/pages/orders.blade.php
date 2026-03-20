@extends('layouts.app')

@section('title', 'GiftNest - Orders')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Orders</h1>
      <div class="muted">Track your recent purchases and stay updated on delivery progress.</div>
    </div>

    <div class="card table">
      <div class="table__row table__head">
        <div>Order</div>
        <div>Status</div>
        <div>Total</div>
        <div>Date</div>
      </div>
      @for ($i = 1; $i <= 4; $i++)
        <div class="table__row">
          <div>#GN-10{{ $i }}</div>
          <div><span class="status {{ $i === 1 ? 'status--pending' : ($i === 2 ? 'status--shipped' : 'status--delivered') }}">
            {{ $i === 1 ? 'Pending' : ($i === 2 ? 'Shipped' : 'Delivered') }}
          </span></div>
          <div>৳ {{ number_format(499 + $i * 120) }}</div>
          <div class="muted">{{ now()->subDays($i * 3)->format('d M, Y') }}</div>
        </div>
      @endfor
    </div>
  </section>
@endsection
