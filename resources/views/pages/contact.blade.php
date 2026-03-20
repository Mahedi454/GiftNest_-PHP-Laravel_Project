@extends('layouts.app')

@section('title', 'GiftNest - Contact')

@section('content')
  <section class="section contact-page">
    <div class="contact-page__head section__head">
      <div>
        <div class="kicker">Get in touch</div>
        <h1>Contact GiftNest</h1>
      </div>
      <div class="muted">Questions about orders, gifting, or support? Send us a message.</div>
    </div>

    <div class="contact-page__grid">
      <aside class="card contact-page__info">
        <h2>We usually reply quickly</h2>
        <p class="lead">Share what you need and we will help with product suggestions, order issues, or delivery questions.</p>
        <div class="contact-page__points">
          <div class="contact-point">
            <div class="contact-point__title">Support hours</div>
            <div class="contact-point__text">Saturday to Thursday, 10 AM to 8 PM</div>
          </div>
          <div class="contact-point">
            <div class="contact-point__title">Best for</div>
            <div class="contact-point__text">Order help, product questions, and gift recommendations</div>
          </div>
          <div class="contact-point">
            <div class="contact-point__title">Response style</div>
            <div class="contact-point__text">Short, helpful replies with clear next steps</div>
          </div>
        </div>
      </aside>

      <form class="card contact">
        <div class="contact__head">
          <h2>Send a message</h2>
          <p class="muted">Tell us a little about what you need and we will get back to you.</p>
        </div>
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
            <span class="field__label">Subject</span>
            <input class="input" type="text" placeholder="What do you need help with?" />
          </label>
          <label class="field field--full">
            <span class="field__label">Message</span>
            <textarea class="input contact__textarea" rows="6" placeholder="How can we help?"></textarea>
          </label>
        </div>
        <button class="btn" type="button">Send message</button>
      </form>
    </div>
  </section>
@endsection
