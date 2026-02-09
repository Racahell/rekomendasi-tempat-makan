@extends('layouts.tabler')
@section('title', 'Edit Proposal')
@section('page-header')
  <div class="row align-items-center">
    <div class="col">
      <h2 class="page-title">Edit Proposal: {{ $proposal->name }}</h2>
    </div>
  </div>
@endsection
@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.proposals.update', $proposal->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="form-label">Place Name</label>
        <input type="text" name="name" class="form-control" value="{{ $proposal->name }}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ $proposal->description }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="2" required>{{ $proposal->address }}</textarea>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Min Price</label>
          <input type="number" name="price_min" class="form-control" value="{{ $proposal->price_min }}">
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Max Price</label>
          <input type="number" name="price_max" class="form-control" value="{{ $proposal->price_max }}">
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $proposal->phone }}">
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary">Update Proposal</button>
        <a href="{{ route('admin.proposals.index') }}" class="btn btn-link">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
