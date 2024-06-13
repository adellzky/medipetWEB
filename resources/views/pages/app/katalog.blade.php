@extends('layouts.app')

@section('title', 'List Produk')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Produk</h1>
        </div>
        <div class="section-body">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image"
                                style="background-image: url('{{ asset($product->image) }}')">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title">
                                <h2>{{ $product->nama }}</h2>
                            </div>
                            <p>{{ $product->deskripsi }}</p>
                            <div class="article-cta">
                                <a href="#" class="btn btn-primary">IDR {{ $product->harga }}</a>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
