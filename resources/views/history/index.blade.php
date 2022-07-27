@extends('layouts.main')
@section('container')
    <div class="row d-flex justify-container-center">
        <table class="table table-hover responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Perusahaan</th>
                    <th>Judul Post</th>
                    <th>Status</th>
                </tr>
            </thead>
                <tbody>
                    @if($pelamars->count())
                    @foreach($pelamars as $pelamar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pelamar->nama_perusahaan }}</td>
                        <td>{{ $pelamar->judul_post }}</td>
                        <td>
                            @if($pelamar->status === 'Diterima')
                            <p class="btn-success btn-sm" style="width: 70px;">{{ $pelamar->status }}</p>
                            @elseif($pelamar->status === 'Pending')
                            <p class="btn-warning btn-sm" style="width: 70px;">{{ $pelamar->status }}</p>
                            @else
                            <p class="btn-danger btn-sm" style="width: 70px;">{{ $pelamar->status }}</p>
                            @endif
                        </td>
                    </tr>
                </tbody>
                 @endforeach
                 @else
                <td colspan="5" class="text-center fs-4">Data not found.</td>
                @endif
        </table>
    </div>
@endsection