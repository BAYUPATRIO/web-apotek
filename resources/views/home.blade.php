@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Selamat Datang di Toko Online Fashion</h1>
    <p>Temukan produk fashion terbaik untuk Anda!</p>
    <a href="{{ route('produk') }}" class="btn btn-primary">Lihat Produk</a>
</div>
@endsection
