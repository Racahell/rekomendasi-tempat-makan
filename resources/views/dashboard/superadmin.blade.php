@extends('layouts.tabler')
@section('title', 'Superadmin Dashboard')
@section('content')
<h1>Superadmin Panel</h1>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>User Management</h3>
                <p>Manage users, roles, and restore deleted accounts.</p>
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage Users</a>
            </div>
        </div>
    </div>
    <!-- Add other cards for Settings, Logs, etc. -->
</div>
@endsection
