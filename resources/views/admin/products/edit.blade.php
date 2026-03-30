@extends('layouts.admin')

@section('title', 'Admin - Edit Product')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>{{ $pageTitle }}</h1>
        <div class="muted">Update the selected product and keep the storefront catalog in sync.</div>
      </div>
    </div>

    @include('admin.products._form')
  </section>
@endsection
