@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         <h1 class="h2">Create new job vacancy</h1>
    </div>
    
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
              <label for="judul_post" class="form-label">Judul</label>
              <input type="text" autofocus class="form-control @error('judul_post') is-invalid @enderror" required id="judul_post" name="judul_post" value="{{ old('judul_post') }}">
              @error('judul_post')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" autofocus class="form-control @error('slug') is-invalid @enderror" required id="slug" name="slug" value="{{ old('slug') }}">
              @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" id="deskripsi" value="{{ old('deskripsi') }}" required name="deskripsi">
                <trix-editor input="deskripsi"></trix-editor>
              </div>
              <div class="mb-3">
                <label for="persyaratan" class="form-label">Persyaratan</label>
                @error('persyaratan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" id="persyaratan" value="{{ old('persyaratan') }}" required name="persyaratan">
                <trix-editor input="persyaratan"></trix-editor>
              </div>

            <button type="submit" class="btn btn-primary mb-5">Create</button>
          </form>
    </div>
<script>
  const title = document.querySelector('#judul_post');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title='+title.value)
      .then(response => response.json())
      .then(data=>slug.value = data.slug)
  });
</script>
<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
@endsection