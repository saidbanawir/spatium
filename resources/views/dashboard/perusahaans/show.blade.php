@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Read detail company</h1>
</div>
    <form class="col-lg-10">        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
            <a href="/dashboard/perusahaans/{{ $perusahaan->id }}/edit" title="Update" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        </div>

        <div></div>
        <table class="col-lg-10 mb-3 table table-borderless" style="text-align: justify">
            <tr>
                    @if ($perusahaan->foto)
                        <img src="{{ asset('storage/' . $perusahaan->foto) }}" style="width: 25%;" class="rounded mx-auto d-block img-fluid img-thumbnail">
                    @else
                        <img src="{{ asset('/img/default-user.png') }}" style="width: 25%;" class="rounded mx-auto d-block img-fluid img-thumbnail">
                    @endif
                
            </tr>
            <tr>
                <th>Id Perusahaan</th>
                <td>:</td>
                <td>{{ $perusahaan->id }}</td>
            </tr>
            <tr>
                <th>Nama Perusahaan</th>
                <td>:</td>
                <td>{{ $perusahaan->nama }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>:</td>
                <td>{{ $perusahaan->username }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $perusahaan->email }}</td>
            </tr>
            <tr>
                <th>Kota</th>
                <td>:</td>
                <td>{{ $perusahaan->kota }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ $perusahaan->alamat }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>:</td>
                <td>{{ $perusahaan->role }}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>:</td>
                <td>{{ $perusahaan->created_at }}</td>
            </tr>
            <tr>
                <th>Last Updated</th>
                <td>:</td>
                <td>{{ $perusahaan->updated_at }}</td>
            </tr>
        </table>
    </form>
    <a href="/dashboard/perusahaans" class="btn btn-primary  mb-5" title="Back to post"><span data-feather="arrow-left-circle"></span> Back</a>
@endsection