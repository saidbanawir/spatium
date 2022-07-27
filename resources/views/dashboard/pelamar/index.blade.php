@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Pelamar</h1>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" id="alert" role="alert">
      {{ session('success') }}
  </div>
@endif
  <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul Post</th>
              <th scope="col">Nama Pelamar</th>
              <th scope="col">Email Pelamar</th>
              <th scope="col">CV</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @if($cvpelamar->count())
              @foreach($cvpelamar as $rcvpelamar)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ Str::limit($rcvpelamar->judul_post, 30, '...') }}</td>
                  <td>{{ $rcvpelamar->nama_pelamar }}</td>
                  <td>{{ $rcvpelamar->email_pelamar }}</td>
                  <td>
                  @if($rcvpelamar->foto)
                  <a href="{{ asset('storage/'.$rcvpelamar->foto) }}" target="_blank">
                  <img src="{{ asset('storage/' . $rcvpelamar->foto) }}" style="width:100px; height:100px;" class="rounded mx-auto d-block img-fluid img-thumbnail">
                  </a>
                  @else
                  <img src="{{ asset('/img/cv_not_available.png') }}" style="width:100px; height:100px;" class="rounded mx-auto d-block img-fluid img-thumbnail">
                  @endif                  
                  </td>
                  <td>
                    @if($rcvpelamar->status == 'Pending')
                    <a href="/dashboard/pelamar/{{ $rcvpelamar->id }}/edit" class="btn btn-warning btn-sm" style="width: 70px;">{{ $rcvpelamar->status }}</a>
                    @elseif($rcvpelamar->status == 'Diterima')
                    <a href="#" class="btn btn-success btn-sm disabled" style="width: 70px;">{{ $rcvpelamar->status }}</a>
                    @else
                    <a href="#" class="btn btn-danger btn-sm disabled" style="width: 70px;">{{ $rcvpelamar->status }}</a>
                    @endif
                  </td>
              </tr>
              @endforeach
              @else
                <td colspan="5" class="text-center fs-4">Data not found.</td>
              @endif
          </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center">
    {{ $cvpelamar->links() }}
  </div>
    
@endsection