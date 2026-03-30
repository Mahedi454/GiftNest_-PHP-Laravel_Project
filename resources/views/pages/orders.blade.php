@extends('layouts.app')

@section('title', 'GiftNest - Orders')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Orders</h1>
      <div class="muted">Track the orders you have placed through the simple GiftNest checkout flow.</div>
    </div>

    <div class="card table">
      <div class="table__row table__head">
        <div>Order</div>
        <div>Status</div>
        <div>Total</div>
        <div>Date</div>
      </div>

      @forelse ($orders as $order)
        <div class="table__row">
          <div>#GN-{{ str_pad((string) $order->id, 4, '0', STR_PAD_LEFT) }}</div>
          <div><span class="status status--pending">{{ ucfirst($order->status) }}</span></div>
          <div>Tk {{ number_format((float) $order->total_price, 2) }}</div>
          <div class="muted">{{ $order->created_at->format('d M, Y') }}</div>
        </div>
      @empty
        <div class="empty">
          <div class="empty__title">No orders yet</div>
          <div class="empty__subtitle">Complete checkout from your cart to save your first order.</div>
          <a class="btn" href="{{ route('shop') }}">Go to shop</a>
        </div>
      @endforelse
    </div>
  </section>
@endsection
