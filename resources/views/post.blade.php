@extends('layouts.main')
@section('container')
    
<div class="container col-lg-8 mb-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="/posts">Posts</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->judul_post, 50) }}</li>
        </ol>
      </nav>
        <form action="/posts" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="card-header bg-transparent">
                        <h5>{{ $post["judul_post"] }}</h5>
                        <small><a class="text-muted">{{ $post->nama_perusahaan }}</a> <i class="bi bi-geo-alt-fill"></i>{{ $post->kota_perusahaan }}</small>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-briefcase-fill"></i> Deskripsi</h5>
                        <p class="card-text">
                            {!! $post->deskripsi !!}
                        </p>

                        <h5 class="card-title"><i class="bi bi-file-text-fill"></i> Persyaratan</h5>
                        <p class="card-text">
                            {!! $post->persyaratan !!}
                        </p>
                    </div>
                    <div class="card-text">
                        <span>Dipublish pada <i>{{ $post->created_at->isoFormat('D MMMM Y ') }}</i></span>
                        <span style="float: right;">Ditutup pada <i>{{ Carbon\Carbon::parse($post->expired_at)->isoFormat('D MMMM Y ') }}</i></span>
                    </div>
                    <div class="card-footer bg-transparent mt-3">
                        @auth
                        @if (auth()->user()->role =='Pelamar')
                        <div class="card-text mb-3 col-5">
                            <input type="hidden" class="form-control" value="{{ $post->id }}" id="post_id" name="post_id">
                        </div>
                        <div class="card-text mb-3 col-5">
                            <input type="hidden" class="form-control" value="{{ $post->judul_post }}" id="judul_post" name="judul_post">
                        </div>
                        <div class="card-text mb-3 col-5">
                            <input type="hidden" class="form-control" value="{{ $post->slug }}" id="slug" name="slug">
                        </div>
                        <div class="card-text mb-3 col-5">
                            <input type="hidden" class="form-control" value="{{ $post->user_id }}" id="id_perusahaan" name="id_perusahaan">
                        </div>
                        <div style="float: right;">
                            <input type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-success" value="Apply">
                        </div>
                        @endif
                        @else
                        <div style="float: right;">
                            <a href="/login" class="btn btn-success">Login</a>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </form>
</div>
@endsection