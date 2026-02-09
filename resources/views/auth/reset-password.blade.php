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
        <h2 class="h2 text-center mb-4">Reset Password</h2>
        
        <form action="{{ route('password.update') }}" method="POST" autocomplete="off">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">

          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
          </div>

          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
