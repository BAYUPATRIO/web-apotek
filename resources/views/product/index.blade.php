@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Produk</h1>
    <form action="{{ route('produk.cari') }}" method="GET">
        <input type="text" name="q" placeholder="Cari produk..." class="form-control mb-3">
    </form>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'default.jpg' }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p>Status: {{ $product->status }}</p>
                    <a href="{{ route('produk.show', $product->id) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
