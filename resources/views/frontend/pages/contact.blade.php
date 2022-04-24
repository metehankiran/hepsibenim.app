@extends('frontend.master')
@section('title', 'İletişim')
@section('content')
<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i class="ci-home"></i>Anasayfa</a></li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">İletişim</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 mb-0">İletişim</h1>
      </div>
    </div>
  </div>
  <section class="container-fluid pt-grid-gutter">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#map" data-scroll="">
          <div class="card-body text-center"><i class="ci-location h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h6 mb-2">Adres</h3>
            <p class="fs-sm text-muted">{{ $setting->address }}</p>
          </div></a></div>
      <div class="col-xl-3 col-sm-6 mb-grid-gutter">
        <div class="card h-100">
          <div class="card-body text-center"><i class="ci-time h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h6 mb-3">Çalışma Saatleri</h3>
            <ul class="list-unstyled fs-sm text-muted mb-0">
              @foreach (explode(',',$setting->working_hours)  as $item)
                  {{ $item }}@if($loop->first)<br>@endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-grid-gutter">
        <div class="card h-100">
          <div class="card-body text-center"><i class="ci-phone h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h6 mb-3">Telefon Numaraları</h3>
            <ul class="list-unstyled fs-sm mb-0">
              @foreach (explode(',',$setting->phone_numbers)  as $item)
                  {{ $item }}@if($loop->first)<br>@endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-grid-gutter">
        <div class="card h-100">
          <div class="card-body text-center"><i class="ci-mail h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h6 mb-3">Email Adresleri</h3>
            <ul class="list-unstyled fs-sm mb-0">
              @foreach (explode(',',$setting->emails)  as $item)
                  {{ $item }}@if($loop->first)<br>@endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container-fluid px-0" id="map">
    <div class="row g-0">
      <div class="col-lg-6 iframe-full-height-wrap">
        <iframe class="iframe-full-height" width="600" height="250" src="{{ $setting->map }}"></iframe>
      </div>
      <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
        <h2 class="h4 mb-4">Bize ulaşın</h2>
        <form class="needs-validation mb-3" method="post" action="{{ route('contact.store') }}">
          @csrf
            <div class="row g-3">
            <div class="col-sm-6">
              <label class="form-label" for="cf-name">İsim:&nbsp;<span class="text-danger">*</span></label>
              <input class="form-control" name="name" type="text" id="cf-name" placeholder="Ali Kaya" required="">
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="cf-email">Email adresi:&nbsp;<span class="text-danger">*</span></label>
              <input class="form-control" name="email" type="email" id="cf-email" placeholder="uye@hepsibenim.app" required="">
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="cf-phone">Telefon:&nbsp;<span class="text-danger">*</span></label>
              <input class="form-control" name="phone" type="text" id="cf-phone" placeholder="+90 (555) 44 333 222" required="">
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="cf-subject">Konu:&nbsp;<span class="text-danger">*</span></label>
              <input class="form-control" name="subject" type="text" id="cf-subject" placeholder="Konu">
            </div>
            <div class="col-12">
              <label class="form-label" for="cf-message">Mesaj:&nbsp;<span class="text-danger">*</span></label>
              <textarea class="form-control" name="message" id="cf-message" rows="6" placeholder="Mesajınızı yazınız." required=""></textarea>
              <button class="btn btn-primary mt-4" type="submit">Mesaj gönder</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection