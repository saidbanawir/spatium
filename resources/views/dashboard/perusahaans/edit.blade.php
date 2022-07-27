@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         <h1 class="h2">Edit company</h1>
    </div>
    
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/perusahaans/{{ $perusahaan->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Perusahaan</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" required id="nama" name="nama" value="{{ old('nama',$perusahaan->nama) }}">
              @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" required id="username" name="username" value="{{ old('username', $perusahaan->username) }}">
              @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" required id="email" name="email" value="{{ old('email', $perusahaan->email) }}">
              @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label @error('foto') is-invalid @enderror">Image</label>
                <input type="hidden" name="oldFoto" value="{{ $perusahaan->foto }}">
                @if ($perusahaan->foto)
                <img src="{{ asset('storage/' . $perusahaan->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">    
                @else    
                <img class="img-preview img-fluid mb-3 col-sm-5">
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
                 @if(old('kota', $perusahaan->kota) === $location->nama_kota)
                  <option value="{{ $location->nama_kota }}" selected>{{ $location->nama_kota }}</option>
                  @else
                  <option value="{{ $location->nama_kota }}">{{ $location->nama_kota }}</option>
                  @endif
                  @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control @error('nama') is-invalid @enderror" required>{{ old('alamat', $perusahaan->alamat) }}</textarea>
              @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <select class="form-select" name="role">
                    <option disabled>--- Select Role ---</option>
                    <option {{ $perusahaan->role == 'Perusahaan' ? 'selected' : '' }} value="Perusahaan">Perusahaan</option>
                    <option {{ $perusahaan->role == 'Admin' ? 'selected' : '' }} value="Admin">Admin</option>

                </select>
            </div>
            <a href="/dashboard/perusahaans" class="btn btn-primary mb-5" title="Back"><span data-feather="arrow-left-circle"></span> Back</a>
            <button type="submit" class="btn btn-primary" style="float: right">Edit</button>
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