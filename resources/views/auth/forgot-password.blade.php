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
        <h2 class="h2 text-center mb-4">Forgot password</h2>
        <p class="text-muted text-center mb-4">Enter your email address and your password will be reset and emailed to you.</p>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" autocomplete="off">
          @csrf
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">
              <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
              Send me new password
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="text-center text-muted mt-3">
      Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
    </div>
  </div>
</div>
@endsection
