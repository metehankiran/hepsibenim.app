@extends('frontend.master') @section('title', 'Profilim') @section('content')
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i class="ci-home"></i>Anasayfa</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="{{ route('products') }}">Alışveriş</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Sipariş Detayları</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Sipariş Detayları</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2">
    <div class="row">
      <section class="col-lg-8">
        <!-- Steps-->
        <p class="text-light">
            Sipariş durumu : 
            @if($payment->status == 'pending')
            <span class="badge bg-info m-0">Bekleniyor</span>
            @elseif($payment->status == 'paid')
            <span class="badge bg-success m-0">Onaylandı</span>
            @elseif($payment->status == 'cancelled')
            <span class="badge bg-dangr m-0">İptal edildi</span>
            @endif
        </p>
        <p class="text-light">Notunuz : {{ $payment->note }}</p>
        <!-- Order details-->
        <h2 class="h6 pt-1 pb-3 mb-3 border-bottom mt-5">Ürünler</h2>
        @foreach ($payment->productCarts as $cart)
            <!-- Item-->
        <div class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">
            <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="{{ route('product.show',$cart->product) }}"><img src="{{ Storage::url($cart->product->image) }}" width="160" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="{{ route('product.show',$cart->product->id) }}">{{ $cart->product->title }}</a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Kategori:</span>{{ $cart->product->category->title }}</div>
                <div class="fs-lg text-accent pt-2">@money($cart->product->price)</div>
              </div>
            </div>
            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-end" style="max-width: 9rem;">
              <p class="mb-0"><span class="fs-sm">Adet:</span><span>&nbsp;{{ $cart->quantity }}</span></p>
            </div>
          </div>
        @endforeach
        <!-- Client details-->
        <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
          <div class="row">
            <div class="col-sm-6">
              <h4 class="h6">Nakliye:</h4>
              <ul class="list-unstyled fs-sm">
                <li><span class="text-muted">Alıcı:&nbsp;</span>{{ $payment->user->name }}</li>
                <li><span class="text-muted">Adres:&nbsp;</span>{{ $payment->address->address }}</li>
                <li><span class="text-muted">Telefon:&nbsp;</span>{{ $payment->user->phone }}</li>
              </ul>
            </div>
            <div class="col-sm-6">
              <h4 class="h6">Ödeme:</h4>
              <ul class="list-unstyled fs-sm">
                <li><span class="text-muted">
                    @if($payment->paymentMethod->method == 'paypal') Paypal @else Debit kart @endif:&nbsp;</span>{{ $payment->paymentMethod->card_number }}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- Sidebar-->
      <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
        <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
          <div class="py-2 px-xl-2">
            <h2 class="h6 text-center mb-4">Sipariş Toplamı</h2>
            <ul class="list-unstyled fs-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Toplam:</span><span class="text-end">@money($payment->total())</span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Vergi:</span><span class="text-end">@money($payment->total()*0.18)</span></li>
            </ul>
            <h3 class="fw-normal text-center my-4">@money($payment->total()+ $payment->total()*0.18)</h3>
          </div>
        </div>
      </aside>
    </div>
  </div>
@endsection