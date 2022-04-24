@extends('frontend.master') @section('title', 'Destek Talebi') @section('content')
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
            <h1 class="h3 text-light mb-0">Destek Talebi</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        @include('frontend.pages.user.components.sidebar')
        <!-- Content  -->
        <section class="col-lg-8">
            @include('frontend.pages.user.components.toolbar')
            <form method="post" action="{{ route('ticket.store') }}">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Başlık</label>
                  <input type="text" class="form-control" name="subject" id="exampleFormControlInput1">
                </div>
                <div class="form-group mt-3">
                  <label for="exampleFormControlTextarea1">Mesajınız</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Destek talebi oluştur</button>
              </form>
        </section>
    </div>
</div> @endsection
