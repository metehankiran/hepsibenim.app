@extends('frontend.master')
@section('title', 'Anasayfa')
@section('content')
    <main class="page-wrapper">
        @include('frontend.components.hero')
        @include('frontend.components.popular-categories')
        @include('frontend.components.trending-products')
        @include('frontend.components.brands')
        @include('frontend.components.instagram-info')
    </main>
@endsection
@section('currency')
    <div class="topbar topbar-dark bg-dark">
        <div class="container">
            <div class="topbar-text text-nowrap d-none d-md-inline-block">
              <i class="ci-dollar"></i>
              <span class="text-muted me-1">Dolar Alış : {{ $currency['usd_buying'] }}</span>
              <span class="text-muted me-1">Dolar Satış : {{ $currency['usd_selling'] }}</span>
              <i class="ci-dollar"></i>
            </div>
            <div class="topbar-text text-nowrap d-none d-md-inline-block">
              <i class="ci-euro"></i>
              <span class="text-muted me-1">Euro Alış : {{ $currency['euro_buying'] }}</span>
              <span class="text-muted me-1">Euro Satış : {{ $currency['euro_selling'] }}</span>
              <i class="ci-euro"></i>
            </div>
        </div>
    </div>
@endsection
