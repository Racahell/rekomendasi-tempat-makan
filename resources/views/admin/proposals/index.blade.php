@extends('layouts.tabler')
@section('title', 'Manage Proposals')
@section('page-header')
  <div class="row align-items-center">
    <div class="col">
      <h2 class="page-title">Incoming Proposals</h2>
    </div>
  </div>
@endsection
@section('content')
<div class="card">
  <div class="table-responsive">
    <table class="table table-vcenter card-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Proposer</th>
          <th>Date</th>
          <th class="w-1">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($proposals as $proposal)
        <tr>
          <td>{{ $proposal->name }}<br><div class="text-muted">{{ Str::limit($proposal->address, 30) }}</div></td>
          <td>{{ $proposal->proposer->name ?? 'Unknown' }}</td>
          <td>{{ $proposal->created_at->diffForHumans() }}</td>
          <td>
            <div class="btn-list flex-nowrap">
              <a href="{{ route('admin.proposals.edit', $proposal->id) }}" class="btn btn-white btn-sm">Edit</a>
              <form action="{{ route('admin.proposals.approve', $proposal->id) }}" method="POST" onsubmit="return confirm('Approve this place?')">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Approve</button>
              </form>
              <button type="button" class="btn btn-danger btn-sm" onclick="promptReject({{ $proposal->id }})">Reject</button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script>
function promptReject(id) {
    let reason = prompt("Reason for rejection:");
    if (reason) {
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/proposals/' + id + '/reject';
        form.innerHTML = '<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="reason" value="' + reason + '">';
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endsection
