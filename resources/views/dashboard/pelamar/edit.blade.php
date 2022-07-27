@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Proses Status</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/pelamar/{{ $pelamar->id }}" method="POST">
        @method('put')
        @csrf
        <div class="form-group mb-3">
            <select class="form-select" name="status">
                <option value="{{ $pelamar->status }}" selected>{{ $pelamar->status }}</option>
                <option value="Diterima">Diterima</option>
                <option value="Ditolak">Ditolak</option>
            </select>
        </div>
        <a href="/dashboard/pelamar" class="btn btn-primary" title="Back to user"><span data-feather="arrow-left-circle"></span> Back</a>
            <button type="submit" class="btn btn-primary" style="float: right">Save</button>
    </form>
</div>

@endsection