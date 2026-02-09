@extends('layouts.auth')
@section('content')
<div class="page page-center">
  <div class="container container-tight py-4">
    <div class="text-center mb-4">
      <a href="/" class="navbar-brand navbar-brand-autodark">
        <h1 style="font-size: 2.5rem; color: var(--v-brown);">Retema</h1>
      </a>
    </div>
    <div class="card card-md auth-card">
      <div class="card-body">
        <h2 class="h2 text-center mb-4">Create new account</h2>
        <form action="{{ route('register') }}" method="POST" autocomplete="off">
          @csrf
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="mb-3">
             <label class="form-label">Security Check: {{ session('captcha_q', '3 + 5') }} = ?</label>
             <input type="number" name="captcha" class="form-control" placeholder="Answer" required>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Create new account</button>
          </div>
        </form>
      </div>
    </div>
    <div class="text-center text-muted mt-3">
      Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
    </div>
  </div>
</div>
@endsection
