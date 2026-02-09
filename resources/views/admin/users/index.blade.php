@extends('layouts.tabler')
@section('title', 'User Management')
@section('content')
<div class="card">
  <div class="table-responsive">
    <table class="table table-vcenter card-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}<div class="text-muted">{{ $user->email }}</div></td>
          <td>{{ $user->role->name ?? 'None' }}</td>
          <td>
             @if($user->trashed())
               <span class="badge bg-red">Deleted</span>
             @else
               <span class="badge bg-green">Active</span>
             @endif
          </td>
          <td>
            @if($user->trashed())
              <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                 @csrf
                 <button class="btn btn-primary btn-sm">Restore</button>
              </form>
            @else
              <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?')">
                 @csrf
                 @method('DELETE')
                 <button class="btn btn-danger btn-sm">Delete</button>
              </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
