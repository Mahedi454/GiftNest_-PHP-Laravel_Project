@extends('layouts.admin')

@section('title', 'Admin - Orders')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>Manage orders</h1>
        <div class="muted">View customer purchases and update order status.</div>
      </div>
    </div>

    @if (session('status'))
      <div class="card" style="margin-bottom: 1rem; padding: 1rem;">{{ session('status') }}</div>
    @endif

    <div class="card table">
      <div class="table__row table__head">
        <div>Order</div>
        <div>Customer</div>
        <div>Items</div>
        <div>Total</div>
        <div>Status</div>
        <div>Action</div>
      </div>
      @foreach ($orders as $order)
        <div class="table__row">
          <div>#{{ $order->id }}</div>
          <div>{{ $order->user->name }}<div class="muted small">{{ $order->user->email }}</div></div>
          <div>
            @foreach ($order->items as $item)
              <div class="muted small">{{ $item->product->name }} x {{ $item->quantity }}</div>
            @endforeach
          </div>
          <div>Tk {{ number_format((float) $order->total_price, 2) }}</div>
          <div><span class="chip">{{ ucfirst($order->status) }}</span></div>
          <div>
            <form method="POST" action="{{ route('admin.orders.status', $order) }}">
              @csrf
              @method('PATCH')
              <select class="input" name="status">
                <option value="pending" @selected($order->status === 'pending')>Pending</option>
                <option value="completed" @selected($order->status === 'completed')>Completed</option>
              </select>
              <button class="btn btn--small" type="submit" style="margin-top: 0.5rem;">Update</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
