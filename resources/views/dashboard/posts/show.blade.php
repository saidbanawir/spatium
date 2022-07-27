@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Read job vacancy</h1>
</div>
    <form class="col-lg-10">
        <div>
            <h2>{{ $post->judul_post }}</h2>
        </div>
        <div class="mb-5">
           <small style="font-style: italic">
               Post at : {{ $post->created_at }}
            </small> 
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
            <a href="/dashboard/posts/{{ $post->id }}/edit" title="Update" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        </div>

        <div></div>
        <table class="col-lg-10 mb-3" style="text-align: justify">

            <tr>
                <td class="col-lg-5"><h4>Deskripsi</h4></td>
                <td></td>
                <td class="col-lg-5"><h4>Persyaratan</h4></td>
            </tr>
            <tr>
                <td><article>{!! $post->deskripsi !!}</article></td>
                <td></td>
                <td><article>{!! $post->persyaratan !!}</article></td>
            </tr>
        </table>
    </form>
    <a href="/dashboard/posts" class="btn btn-primary mb-5" title="Back to post"><span data-feather="arrow-left-circle"></span> Back</a>
@endsection