@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         <h1 class="h2">Create new company</h1>
    </div>
    
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/perusahaans" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Perusahaan</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" required id="nama" name="nama" value="{{ old('nama') }}">
              @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" required id="username" name="username" value="{{ old('username') }}">
              @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" required id="password" name="password" value="{{ old('password') }}">
              @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>              
              <input type="email" class="form-control @error('email') is-invalid @enderror"  required id="email" name="email" value="{{ old('email') }}">
              @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label @error('foto') is-invalid @enderror">User Image</label>
                <img src="" class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" type="file" onchange="previewImage()" id="foto" name="foto">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <select class="form-select" name="kota">
                 @foreach($locations as $location)
                 @if(old('kota') === $location->nama_kota)
                  <option value="{{ $location->nama_kota }}" selected>{{ $location->nama_kota }}</option>
                  @else
                  <option value="{{ $location->nama_kota }}">{{ $location->nama_kota }}</option>
                  @endif
                  @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
              @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-5">Create</button>
          </form>
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