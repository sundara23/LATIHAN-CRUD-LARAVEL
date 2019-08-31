@extends('layouts.main')
@section('title', 'Upload Files')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Form Update Files </h1>
            <form method="post" action="/files/{{$file->id}}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class=" form-group">
                    <label for="nama_files">Nama Files</label>
                    <input type="text" class="form-control @error('nama_files') is-invalid @enderror" id="nama_files" name="nama_files" value=" {{$file->nama_files}} ">
                    @error('nama_files')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_files">Update Files</label>
                    <input type="file" class="form-control @error('link_files') is-invalid @enderror" id="link_files" name="link_files">
                    @error('link_files')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
</div>
@endsection