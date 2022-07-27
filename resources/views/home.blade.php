@extends('layouts.main')
@section('container')
    
<div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/banner1.jpg" style="max-width: 1280px;" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="/img/banner2.jpg" style="max-width: 1280px;" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="/img/banner3.jpg" style="max-width: 1280px;" class="d-block w-100">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="row mb-5 text-center">
  <h3 style="color:#3E497A;"><i class="bi bi-bricks"></i> PERUSAHAAN YANG SUDAH TERDAFTAR <i class="bi bi-building"></i></h3>
</div>

<div class="row mb-5"  style="margin-bottom: 1.5rem; text-align: center;">
  @foreach($users as $user)
  <div class="col-lg-4">
      @if ($user->foto)
       <img src="{{ asset('storage/' . $user->foto) }}" style="width:140px;; height:140px;;" class="rounded-circle mx-auto d-block img-fluid img-thumbnail">
      @else
       <img src="{{ asset('/img/default-user.png') }}" style="width:140px;; height:140px;;" class="rounded-circle mx-auto d-block img-fluid img-thumbnail">
      @endif
    <p><h6 class="text-muted">{{ $user->nama }}</h6></p>
  </div>
  @endforeach
</div>

@endsection