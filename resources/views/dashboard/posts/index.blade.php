@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post</h1>
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
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create job vacancy</a>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Tanggal Post</th>
          <th scope="col">Tanggal Berakhir</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($posts->count())
          @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ Str::limit($post->judul_post, 50, '...') }}</td>
          <td>{{ $post->created_at->format('d M Y') }}</td>
          <td>{{ Carbon\Carbon::parse($post->expired_at)->format('d M Y') }}</td>
          <td>
            <a href="/dashboard/posts/{{ $post->id }}" title="Read" class="badge bg-info"><i class="bi bi-eye-fill" style="font-size: 20px;"></i></a>
            <a href="/dashboard/posts/{{ $post->id }}/edit" title="Update" class="badge bg-warning"><i class="bi bi-pencil-square" style="font-size: 20px;"></i></a>
            <form action="/dashboard/posts/{{ $post->id }}" method="POST" class="d-inline">
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
    {{ $posts->links() }}
  </div>
 
@endsection