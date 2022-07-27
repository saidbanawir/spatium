@extends('layouts.main')
@section('container')

<div class="container col-lg-6 mb-5">
    @if(session()->has('success'))
    <div class="alert alert-success" id="alert" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="card border-dark">
        <div class="card-body">
    <form method="POST" action="{{ route('myprofiles.update') }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" required id="nama" name="nama" value="{{ old('nama', Auth::user()->nama) }}">
          @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <input type="hidden" readonly class="form-control" id="username" name="username" value="{{ old('username', Auth::user()->username) }}">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" required id="email" name="email" value="{{ old('email', Auth::user()->email) }}">
          @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label @error('foto') is-invalid @enderror">User Image</label>
            <input type="hidden" name="oldFoto" value="{{ Auth::user()->foto }}">
            @if (Auth::user()->foto)
            <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">    
            @else    
            <img src="{{ asset('img/default-user.png') }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @endif
            <input class="form-control" type="file" onchange="previewImage()" id="foto" name="foto">
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <select class="form-select" name="kota">
             @foreach($locations as $location)
             @if(old('kota', Auth::user()->kota) === $location->nama_kota)
              <option value="{{ $location->nama_kota }}" selected>{{ $location->nama_kota }}</option>
              @else
              <option value="{{ $location->nama_kota }}">{{ $location->nama_kota }}</option>
              @endif
              @endforeach
            </select>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', Auth::user()->alamat) }}</textarea>
          @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary mb-5" style="float: right">Edit</button>
      </form>
    </div>
    </div>
</div>

<script>

    function previewImage(){
    const image = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection