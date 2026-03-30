@extends('layouts.admin')

@section('title', 'Admin - Create Product')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>{{ $pageTitle }}</h1>
        <div class="muted">Add a new product with clean, readable catalog information.</div>
      </div>
    </div>

    @include('admin.products._form')
  </section>
@endsection
