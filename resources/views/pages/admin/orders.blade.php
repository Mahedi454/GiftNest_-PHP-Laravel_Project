@extends('layouts.admin')

@section('title', 'Admin · Orders')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Orders</h1>
      <div class="muted">Update statuses: pending → shipped → delivered.</div>
    </div>

    <div class="card table">
      <div class="table__row table__head">
        <div>Order</div>
        <div>User</div>
        <div>Status</div>
        <div>Total</div>
        <div>Action</div>
      </div>
      @for ($i = 1; $i <= 6; $i++)
        <div class="table__row">
          <div>#GN-20{{ $i }}</div>
          <div class="muted">user{{ $i }}@mail.com</div>
          <div><span class="status status--pending">Pending</span></div>
          <div>৳ {{ number_format(799 + $i * 95) }}</div>
          <div class="table__actions">
            <button class="btn btn--ghost btn--small" type="button">Mark shipped</button>
            <button class="btn btn--small" type="button">Mark delivered</button>
          </div>
        </div>
      @endfor
    </div>
  </section>
@endsection

