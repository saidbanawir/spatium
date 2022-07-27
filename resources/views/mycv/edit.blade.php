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
    <form method="POST" action="{{ route('mycv.update') }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3"> <h2 style="text-align: center;">Your CV</h2></div>
        <div class="mb-3">
            @if($mycv->foto)
            <img src="{{ asset('storage/' . $mycv->foto) }}" style="width: 100%;" class="rounded mx-auto d-block img-fluid img-thumbnail">
            @else
            <img src="{{ asset('/img/cv_not_available.png') }}" style="width:300px; height:auto;" class="rounded mx-auto d-block img-fluid img-thumbnail">
            <p class="text-muted" style="text-align: center;"><small><em>NB : You don't have CV, please <mark>Upload your CV</mark></em></small></p>
            @endif
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label @error('foto') is-invalid @enderror">Upload CV</label>
            <img src="" class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" onchange="previewImage()" id="foto" name="foto">
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mb-5" style="float: right; margin-left:10px;">Update</button>
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