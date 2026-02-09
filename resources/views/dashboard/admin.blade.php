@extends('layouts.tabler')
@section('title', 'Admin Dashboard')
@section('content')
<h1>Admin Workspace</h1>
<a href="{{ route('admin.proposals.index') }}" class="btn btn-primary">Review Proposals</a>
@endsection
