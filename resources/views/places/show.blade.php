@extends('layouts.tabler')
@section('title', $place->name)
@section('content')
<div class="row row-cards">
  <div class="col-lg-8">
    <div class="card">
       <div class="card-body">
          <h1>{{ $place->name }}</h1>
          <p class="text-muted">{{ $place->address }}</p>
          <div class="mb-3">
             <span class="badge bg-yellow text-white">Rating: {{ $place->rating_google }}</span>
             <span class="badge bg-green text-white">Price: {{ $place->price_min }} - {{ $place->price_max }}</span>
          </div>
          <p>{{ $place->description }}</p>
          
          <hr>
          <h3>Map Location</h3>
          <!-- Google Maps Placeholder -->
          <div id="map" style="height: 400px; width: 100%; background: #eee; border-radius: 8px;"></div>
       </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card">
       <div class="card-body">
          <h3>Menu</h3>
          <ul class="list-unstyled">
             <li>Nasi Goreng - 25k</li>
             <li>Es Teh - 5k</li>
          </ul>
       </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  function initMap() {
    // This is where you would put the Google Maps logic
    // const place = { lat: {{ $place->latitude ?? -6.200 }}, lng: {{ $place->longitude ?? 106.816 }} };
    // const map = new google.maps.Map(document.getElementById("map"), { zoom: 15, center: place });
    // const marker = new google.maps.Marker({ position: place, map: map });
    document.getElementById('map').innerHTML = '<div class="d-flex justify-content-center align-items-center h-100">Map Preview (API Key Required)</div>';
  }
  // Load map script dynamically or call initMap if script is loaded
  initMap();
</script>
@endpush
@endsection
