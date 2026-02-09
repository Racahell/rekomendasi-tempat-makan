@extends('layouts.tabler')
@section('title', 'User Dashboard')
@section('content')
<h1>Welcome Back!</h1>
<a href="{{ route('places.create') }}" class="btn btn-primary">Propose New Place</a>
@endsection
