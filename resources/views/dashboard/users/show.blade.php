@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Read detail user</h1>
</div>
    <form class="col-lg-10">        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
            <a href="/dashboard/users/{{ $user->id }}/edit" title="Update" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        </div>

        <div></div>
        <table class="col-lg-10 mb-3 table table-borderless" style="text-align: justify">
            <tr>
                    @if ($user->foto)
                        <img src="{{ asset('storage/' . $user->foto) }}" style="width: 25%;" class="rounded mx-auto d-block img-fluid img-thumbnail">
                    @else
                        <img src="{{ asset('/img/default-user.png') }}" style="width: 25%;" class="rounded mx-auto d-block img-fluid img-thumbnail">
                    @endif
                
            </tr>
            <tr>
                <th>Id User</th>
                <td>:</td>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{ $user->nama }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>:</td>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Kota</th>
                <td>:</td>
                <td>{{ $user->kota }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ $user->alamat }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>:</td>
                <td>{{ $user->role }}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>:</td>
                <td>{{ $user->created_at }}</td>
            </tr>
            <tr>
                <th>Last Updated</th>
                <td>:</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
        </table>
    </form>
    <a href="/dashboard/users" class="btn btn-primary  mb-5" title="Back to post"><span data-feather="arrow-left-circle"></span> Back</a>
@endsection