@extends('layouts.main')
@section('container')
  
<div class="d-flex justify-content-center">
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8 alert-dismissible fade show" id="alert" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  
  @endif
</div>

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search..." value="{{ request('search') }}" name="search">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
      </form>
    </div>
  </div>
@if($posts->count())
@foreach ($posts as $post)
<div class="d-flex justify-content-center">    
    <div class="card mb-3" style="max-width: 75%;">
        <div class="row g-0">
          <div class="col-md-3 d-flex justify-content-center">
            @if($post->foto_perusahaan == null)
            <img src="{{ asset('/img/default-user.png') }}" style="width: 220px; height:220px;" class="img-fluid rounded-start">
            @else
            <img src="{{ asset('storage/' . $post->foto_perusahaan) }}" style="width: 220px; height:220px;" class="img-fluid rounded-start">
            @endif
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h5 class="card-title"><a href="/posts/{{ $post->slug }}" style="color: black; text-decoration:none;">{{ $post->judul_post }}</a></h5>
              <p class="card-text"><small class="text-muted">{{ $post->nama_perusahaan }}, {{ $post->created_at->diffForHumans() }}</small></p>
              <p class="card-text">{{ $post->exerpt }}</p>
              <p class="card-text mt-2"><small class="text-muted"><i>Berakhir pada</i> {{ Carbon\Carbon::parse($post->expired_at)->isoFormat('dddd, D MMMM Y ') }}</small>
                <a href="/posts/{{ $post->slug }}" class="nav-link" style="float: right; color:#5800FF;">Tampilkan</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
    <div class="d-flex justify-content-center">
      {{ $posts->links() }}
    </div>

    @else
      <p class="text-center fs-4">No post found.</p>
    @endif

@endsection