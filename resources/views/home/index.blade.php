@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="/css/home.css" />
@endsection

@section('content')
<section id="banner" class="banner mt-5">
    <div class="container">
        <div class="row featurette align-items-center">
            <div class="col-md-5 order-md-2 mb-5 mb-md-0 d-flex justify-content-center">
                <img src="/img/banner.svg" width="100%" class="img-responsive"></img>
            </div>
            <div class="col-md-7 order-md-1">
                <h2 class="featurette-heading">Welcome To <span class="text-muted">Rekayasa Perangkat Lunak.</span></h2>
                <p class="lead fs-6">Jurusan yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas.</p>
            </div>
        </div>
    </div>
</section>
@endsection