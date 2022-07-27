@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cek CV Pelamar</h1>
</div>
<table class="col-lg-10 mb-3 table table-borderless" style="text-align: justify">
    <tr>
        <th>Id User</th>
        <td>:</td>
        <td>{{ $pelamar->user_id }}</td>
    </tr>
</table>
@endsection