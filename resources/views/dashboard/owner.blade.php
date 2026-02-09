@extends('layouts.tabler')
@section('title', 'Owner Dashboard')
@section('content')
<div class="page-header d-print-none">
  <div class="row align-items-center">
    <div class="col">
      <h2 class="page-title">Executive Dashboard</h2>
    </div>
  </div>
</div>
<div class="row row-cards">
  <div class="col-md-4">
    <div class="card card-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="bg-primary text-white avatar">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
            </span>
          </div>
          <div class="col">
            <div class="font-weight-medium">
              {{ $totalUsers }} Users
            </div>
            <div class="text-muted">
              +12% vs last month
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-sm">
       <div class="card-body">
         <div class="row align-items-center">
            <div class="col-auto">
               <span class="bg-green text-white avatar">
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21h18" /><path d="M9 8l1 0" /><path d="M9 12l1 0" /><path d="M9 16l1 0" /><path d="M14 8l1 0" /><path d="M14 12l1 0" /><path d="M14 16l1 0" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
               </span>
            </div>
            <div class="col">
               <div class="font-weight-medium">{{ $totalPlaces }} Resto</div>
               <div class="text-muted">+5 new</div>
            </div>
         </div>
       </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-sm">
       <div class="card-body">
         <div class="row align-items-center">
            <div class="col-auto">
               <span class="bg-yellow text-white avatar">
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
               </span>
            </div>
            <div class="col">
               <div class="font-weight-medium">{{ $revenue }}</div>
               <div class="text-muted">Revenue</div>
            </div>
         </div>
       </div>
    </div>
  </div>
</div>
@endsection
