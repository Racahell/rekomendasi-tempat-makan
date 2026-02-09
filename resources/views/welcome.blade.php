@extends('layouts.tabler')
@section('title', 'Retema - Vintage Dining')

@section('content')
<div class="page-header d-print-none text-center">
  <div class="container-xl">
    <div class="row g-2 align-items-center justify-content-center">
      <div class="col-12">
        <h1 class="display-4" style="font-family: var(--v-font-head); color: var(--v-brown);">
          Discover Vintage Dining
        </h1>
        <p class="text-muted">Find the best classic spots in town</p>
      </div>
    </div>
  </div>
</div>

<div class="row row-cards">
  @forelse($places as $place)
  <div class="col-md-6 col-lg-4">
    <div class="card">
      <div class="card-img-top img-responsive img-responsive-21x9" style="background-image: url('{{ $place->image_url ?? 'https://via.placeholder.com/300x150?text=Retema' }}'); height: 150px; background-size: cover;"></div>
      <div class="card-body">
        <h3 class="card-title">{{ $place->name }}</h3>
        <p class="text-muted">{{ Str::limit($place->description, 50) }}</p>
        <div class="d-flex align-items-center mb-2">
           <span class="text-warning me-1">
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
           </span>
           <span>{{ $place->rating_google }} / 5.0</span>
        </div>
        <div class="mt-3">
           <a href="{{ route('places.show', $place->id) }}" class="btn btn-primary w-100">View Details</a>
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12 text-center py-5">
      <h3>No places found yet. Be the first to propose one!</h3>
      @auth
      <a href="{{ route('places.create') }}" class="btn btn-primary">Add Place</a>
      @endauth
  </div>
  @endforelse
</div>
@endsection
