@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->nama }}</h1>
</div>

<div class="row d-flex">
  <div class="col-sm-4 text-center">
  <div class="card text-white bg-secondary mb-3" style="max-width: 270px;">
    <div class="card-header"><h5>Total User</h5></div>
    <div class="card-body">
      <div class="card-text">
        <b class="total">{{ $userCount }}</b>
        <i class="bi bi-person-fill" style="font-size: 48px;"></i>
      </div>
    </div>
  </div>
  </div>

  <div class="col-sm-4 text-center">
  <div class="card text-white bg-secondary mb-3" style="max-width: 270px;">
    <div class="card-header"><h5>Total Perusahaan</h5></div>
    <div class="card-body">
      <div class="card-text">
        <b class="total">{{ $perusahaanCount }}</b>
        <i class="bi bi-building" style="font-size: 48px;"></i>
      </div>
    </div>
  </div>
  </div>

  <div class="col-sm-4 text-center">
  <div class="card text-white bg-secondary mb-3" style="max-width: 270px;">
    <div class="card-header"><h5>Total Pelamar</h5></div>
    <div class="card-body">
      <div class="card-text">
        <b class="total">{{ $pelamarCount }}</b>
        <i class="bi bi-clipboard-fill" style="font-size: 48px;"></i>
      </div>
    </div>
  </div>
  </div>
  
  <div id="chart-container"></div>

</div>
@endsection