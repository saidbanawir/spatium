@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Company</h1>
  </div>
  @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" id="alert" role="alert">
        {{ session('success') }}
    </div>
  @endif
  @if(session()->has('delete'))
    <div class="alert alert-danger col-lg-8" id="alert" role="alert">
        {{ session('delete') }}
    </div>
  @endif


  <div class="table-responsive">
    <a href="/dashboard/perusahaans/create" class="btn btn-primary mb-3">Add Company</a>
    
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($rows->count())
          @foreach ($rows as $perusahaan)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $perusahaan->nama }}</td>
          <td>{{ $perusahaan->username }}</td>
          <td>{{ $perusahaan->email }}</td>
          <td>
            
            <a href="/dashboard/perusahaans/{{ $perusahaan->id }}" title="Read" class="badge bg-info"><i class="bi bi-eye-fill" style="font-size: 20px;"></i></a>
            <a href="/dashboard/perusahaans/{{ $perusahaan->id }}/edit" title="Update" class="badge bg-warning"><i class="bi bi-pencil-square" style="font-size: 20px;"></i></a>
            <form action="/dashboard/perusahaans/{{ $perusahaan->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button title="Delete" onclick="return confirm('Are you sure ?')" class="badge bg-danger border-0"><i class="bi bi-trash3-fill" style="font-size: 20px;"></i></button>
            </form>
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
    {{ $rows->links() }}
  </div>

  @endsection