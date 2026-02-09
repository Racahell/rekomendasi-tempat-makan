@extends('layouts.tabler')
@section('title', 'Add New Place')
@section('page-header')
  <div class="row align-items-center">
    <div class="col">
      <h2 class="page-title">Propose a New Dining Place</h2>
    </div>
  </div>
@endsection
@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('places.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Place Name</label>
        <input type="text" name="name" class="form-control" placeholder="e.g. Warung Nasi Goreng" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="2" required></textarea>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Min Price</label>
          <input type="number" name="price_min" class="form-control" placeholder="10000">
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Max Price</label>
          <input type="number" name="price_max" class="form-control" placeholder="50000">
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" placeholder="0812...">
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary">Submit Proposal</button>
      </div>
    </form>
  </div>
</div>
@endsection
