@extends('layouts.app')

@section('title', 'GiftNest - Order Success')

@section('content')
  <section class="section">
    <div class="card empty">
      <div class="kicker">Order Saved</div>
      <h1>Order placed successfully</h1>
      <div class="empty__subtitle">
        Your order #GN-{{ str_pad((string) $order->id, 4, '0', STR_PAD_LEFT) }} has been saved in the database.
      </div>
      <div class="product__highlights">
        <span class="chip">{{ $order->customer_name }}</span>
        <span class="chip">{{ $order->phone }}</span>
        <span class="chip">Tk {{ number_format((float) $order->total_price, 2) }}</span>
      </div>
      <div class="divider"></div>
      <div class="stack">
        @foreach ($order->items as $item)
          <div class="cart__summaryRow">
            <span class="muted">{{ $item->product->name }} x{{ $item->quantity }}</span>
            <span>Tk {{ number_format((float) ($item->price * $item->quantity), 2) }}</span>
          </div>
        @endforeach
      </div>
      <div class="hero__cta">
        <a class="btn" href="{{ route('orders') }}">View orders</a>
        <a class="btn btn--ghost" href="{{ route('shop') }}">Continue shopping</a>
      </div>
    </div>
  </section>
@endsection
