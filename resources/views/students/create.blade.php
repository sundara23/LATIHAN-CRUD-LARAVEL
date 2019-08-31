@extends('layouts.main')
@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Form Add Mahasiswa </h1>
            <form method="post" action="/students">
                @csrf
                <div class=" form-group">
                    <label for="nama">Nama mahasiswa</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Mahasiswa" name="nama" value=" {{old('nama')}} ">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nrp">nrp mahasiswa</label>
                    <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp" placeholder="nrp Mahasiswa" name="nrp" value=" {{old('nrp')}} " >
                    @error('nrp')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">email mahasiswa</label>
                    <input type="text" class="form-control" id="email" placeholder="email Mahasiswa" name="email" value=" {{old('email')}} ">
                </div>
                <div class="form-group">
                    <label for="jurusan">jurusan mahasiswa</label>
                    <input type="text" class="form-control" id="jurusan" placeholder="jurusan Mahasiswa" name="jurusan" value=" {{old('jurusan')}} ">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection