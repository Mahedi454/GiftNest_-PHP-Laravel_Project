@extends('layouts.app')

@section('title', 'GiftNest · Contact')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Contact</h1>
      <div class="muted">Basic contact form UI scaffold.</div>
    </div>

    <form class="card contact">
      <div class="formgrid">
        <label class="field">
          <span class="field__label">Name</span>
          <input class="input" type="text" placeholder="Your name" />
        </label>
        <label class="field">
          <span class="field__label">Email</span>
          <input class="input" type="email" placeholder="you@example.com" />
        </label>
        <label class="field field--full">
          <span class="field__label">Message</span>
          <textarea class="input" rows="5" placeholder="How can we help?"></textarea>
        </label>
      </div>
      <button class="btn" type="button">Send</button>
    </form>
  </section>
@endsection

