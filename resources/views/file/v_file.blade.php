@extends('layouts.main')
@section('title', 'Upload Files')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1 class="mt-3">Upload Files / Image </h1>
            <a href="/files/create" class="btn btn-primary my-3"> Add</a>
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Files</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $img)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$img->nama_files}}</td>
                        <td><img src="{{$img->link_files}}" alt="{{$img->nama_files}}" width="100px"></td>
                        <td>
                            <a href="/files/{{$img->id}}/edit" class="btn btn-primary">Edit</a>
                            <form action="/files/{{$img->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection