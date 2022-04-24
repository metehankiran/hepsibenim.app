@extends('frontend.master')
@section('title', 'Hakkımızda')
@section('content')
<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i class="ci-home"></i>Anasayfa</a></li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Hakkımızda</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 mb-0">Hakkımızda</h1>
      </div>
    </div>
  </div>
  <section class="container-fluid pt-grid-gutter">
    <div class="row">
      <div class="col-xl-12 col-sm-126 mb-grid-gutter"><a class="card h-100">
          <div class="card-body text-center">
            <p class="fs-sm text-muted">{{ $setting->about }}</p>
          </div></a></div>
    </div>
</section>
@endsection