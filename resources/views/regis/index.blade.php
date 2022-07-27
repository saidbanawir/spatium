<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/spatium.png" type="image/png">
    <title>Spatium | Registraion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="/css/regis_css.css">
</head>
<body>
    <div class="registration-form">
        <form action="/regis" method="POST">
            @csrf
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item @error('nama') is-invalid @enderror " name="nama" id="nama" placeholder="Nama" required value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" required value="{{ old('username') }}">
                    @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control item @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control item @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="form-group">
                <select class="form-control" name="kota">
                 @foreach($locations as $location)
                 @if(old('kota') === $location->nama_kota)
                  <option value="{{ $location->nama_kota }}" selected>{{ $location->nama_kota }}</option>
                  @else
                  <option value="{{ $location->nama_kota }}">{{ $location->nama_kota }}</option>
                  @endif
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control item @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Create Account</button>
            </div>
            <span class="form-group d-block text-center">Already registered ? <a href="/login">Sign In</a></span>
        </form>
        <div class="info-regis">
            <h5>Form Registration</h5>
       </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
