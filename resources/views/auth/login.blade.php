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
        <h2 class="h2 text-center mb-4">Login to your account</h2>
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
          @csrf
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
              <span class="form-label-description">
                <a href="{{ route('password.request') }}">I forgot password</a>
              </span>
            </label>
            <input type="password" name="password" class="form-control" placeholder="Your password" autocomplete="off" required>
          </div>
          <!-- Simple Math Captcha -->
          <div class="mb-2">
             <label class="form-label">Security Check: {{ session('captcha_q', '3 + 5') }} = ?</label>
             <input type="number" name="captcha" class="form-control" placeholder="Answer" required>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        </form>
      </div>
    </div>
    <div class="text-center text-muted mt-3">
      Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
    </div>
  </div>
</div>
@endsection
