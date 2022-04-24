@extends('frontend.master') @section('title', 'Profilim') @section('content')
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item">
            <a class="text-nowrap" href="{{ route('home') }}">
              <i class="ci-home"></i>Anasayfa </a>
          </li>
          <li class="breadcrumb-item text-nowrap">
            <a href="{{ route('user.profile') }}">Hesap</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Hesap bilgileri</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Profile info</h1>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
    @include('frontend.pages.user.components.sidebar')
    <!-- Content  -->
    <section class="col-lg-8">
      @include('frontend.pages.user.components.toolbar')
      <!-- Profile form-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ödeme bilgileriniz</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{ route('user.payment.update') }}">
          @csrf
        <div class="modal-body">
          <div class="form-check mb-4">
            <input class="form-check-input" type="radio" id="paypal" name="method" @checked($user->paymentMethod->method ==  'paypal') value="paypal">
            <label class="form-check-label" for="paypal">PayPal<img class="d-inline-block align-middle ms-2" src="{{ asset('frontend') }}/img/card-paypal.png" width="39" alt="PayPal"></label>
          </div>
          <div class="form-check mb-4">
            <input class="form-check-input" type="radio" id="card" name="method" @checked($user->paymentMethod->method == 'debit_card') value="debit_card">
            <label class="form-check-label" for="card">Kredi / Debit kart<img class="d-inline-block align-middle ms-2" src="{{ asset('frontend') }}/img/cards.png" width="187" alt="Credit card"></label>
          </div>
          <div class="row g-3 mb-2">
            <div class="col-sm-6">
              <input class="form-control" type="text" name="card_number" placeholder="Kart Numarası" required="" value="{{ $user->paymentMethod->card_number }}">
            </div>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="name" placeholder="İsim Soyisim" required="" value="{{ $user->paymentMethod->name }}">
            </div>
            <div class="col-sm-3">
              <input class="form-control" type="text" name="expiration_date" placeholder="AA/YY" required="" value="{{ $user->paymentMethod->expiration_date }}">
            </div>
            <div class="col-sm-3">
              <input class="form-control" type="text" name="cvc" placeholder="CVC" required="" value="{{ $user->paymentMethod->cvv }}">
            </div>
            <div class="col-sm-6">
              <button class="btn btn-primary d-block w-100" type="submit">Kart bilgilerimi güncelle</button>
            </div>
          </div>
        </div>
      </form>
      </div>
    </section>
  </div>
</div> @endsection