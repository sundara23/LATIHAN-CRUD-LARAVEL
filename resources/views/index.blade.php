@extends('layouts.main')
@section('title', 'Latihan Laravel Home')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1 class="mt-3">Welcome to LARAVEL Testing</h1>
            <ol>
                <li>Menu Home Penjelasan Tentang Semua Menu</li>
                <li>Menu About Penjelasan Tentang Halaman About</li>
                <li>Menu Mahasiswa Menampilkan data mahasiswa dari database</li>
                <li>Menu Student Menampilkan data mahasiswa dengan Show Data di detail dan bisa di hapus/edit</li>
                <li>Menu Upload Files CRUD dengan Image</li>
            </ol>
        </div>
    </div>
</div>
@endsection