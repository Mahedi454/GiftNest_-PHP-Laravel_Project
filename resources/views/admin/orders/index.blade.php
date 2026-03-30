@extends('layouts.admin')

@section('title', 'Admin - Orders')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>Manage orders</h1>
        <div class="muted">Track customer purchases, delivery details, and order progress from one place.</div>
      </div>
    </div>

    @if (session('status'))
      <div class="card admin-feedback">{{ session('status') }}</div>
    @endif

    <div class="grid grid--4">
      <article class="card kpi">
        <div class="kpi__label">Total orders</div>
        <div class="kpi__value">{{ $orderStats['total'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Pending</div>
        <div class="kpi__value">{{ $orderStats['pending'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Completed</div>
        <div class="kpi__value">{{ $orderStats['completed'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Revenue</div>
        <div class="kpi__value">Tk {{ number_format((float) $orderStats['revenue'], 2) }}</div>
      </article>
    </div>
  </section>

  <section class="section section--tight">
    <div class="admin-order-list">
      @forelse ($orders as $order)
        <article class="card admin-order-card">
          <div class="admin-order-card__top">
            <div>
              <div class="kicker">Order #{{ $order->id }}</div>
              <h3>{{ $order->customer_name }}</h3>
              <div class="muted small">{{ optional($order->user)->email ?? 'Guest checkout' }}</div>
            </div>
            <span class="status {{ $order->status === 'completed' ? 'status--delivered' : 'status--pending' }}">
              {{ ucfirst($order->status) }}
            </span>
          </div>

          <div class="admin-order-card__grid">
            <div>
              <div class="admin-order-card__label">Contact</div>
              <div>{{ $order->phone }}</div>
              <div class="muted small">{{ $order->address }}</div>
            </div>
            <div>
              <div class="admin-order-card__label">Items</div>
              @foreach ($order->items as $item)
                <div class="muted small">{{ optional($item->product)->name ?? 'Removed product' }} x {{ $item->quantity }}</div>
              @endforeach
            </div>
            <div>
              <div class="admin-order-card__label">Total</div>
              <div class="admin-order-card__amount">Tk {{ number_format((float) $order->total_price, 2) }}</div>
            </div>
            <div>
              <div class="admin-order-card__label">Update status</div>
              <form class="admin-order-card__form" method="POST" action="{{ route('admin.orders.status', $order) }}">
                @csrf
                @method('PATCH')
                <select class="input" name="status">
                  <option value="pending" @selected($order->status === 'pending')>Pending</option>
                  <option value="completed" @selected($order->status === 'completed')>Completed</option>
                </select>
                <button class="btn admin-inline-form__button" type="submit">Update status</button>
              </form>
            </div>
          </div>
        </article>
      @empty
        <div class="card empty">
          <div class="empty__title">No orders yet</div>
          <div class="empty__subtitle">Placed orders will appear here for admin review.</div>
        </div>
      @endforelse
    </div>

    <div class="pagination">
      {{ $orders->links() }}
    </div>
  </section>
@endsection
