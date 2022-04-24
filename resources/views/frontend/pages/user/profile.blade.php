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
      <form action="{{ route('user.update', $user) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="bg-secondary rounded-3 p-4 mb-4">
          <div class="d-flex align-items-center">
            <img class="rounded" src="{{ Storage::url($user->image) }}" width="90" alt="{{ $user->name }}">
            <div class="ps-3">
              <input type="file" name="image" class="btn btn-light btn-shadow btn-sm mb-2" type="button">
              <div class="p mb-0 fs-ms text-muted">Upload JPG, GIF or PNG image. 300 x 300 required.</div>
            </div>
          </div>
        </div>
        <div class="row gx-4 gy-3">
          <div class="col-sm-12">
            <label class="form-label" for="account-fn">İsim Soyisim</label>
            <input class="form-control" name="name" type="text" id="account-fn" value="{{ $user->name }}">
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="account-email">Email Adresi</label>
            <input class="form-control" type="email" name="email" id="account-email" value="{{ $user->email }}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="account-phone">Telefon Numarası</label>
            <input class="form-control" type="text" name="phone" id="account-phone" value="{{ $user->phone }}" required>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="account-pass">Şifre</label>
            <div class="password-toggle">
              <input class="form-control" type="password" name="password" id="account-pass">
              <label class="password-toggle-btn" aria-label="Show/hide password">
                <input class="password-toggle-check" type="checkbox">
                <span class="password-toggle-indicator"></span>
              </label>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="account-confirm-pass">Şifreyi Onaylayın</label>
            <div class="password-toggle">
              <input class="form-control" type="password" name="password_confirmation" id="account-confirm-pass">
              <label class="password-toggle-btn" aria-label="Show/hide password">
                <input class="password-toggle-check" type="checkbox">
                <span class="password-toggle-indicator"></span>
              </label>
            </div>
          </div>
          <div class="col-12">
            <hr class="mt-2 mb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
              <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Profilimi Güncelle</button>
              <a class="btn btn-primary mt-3 mt-sm-0" href="{{ route('user.suspend') }}">Üyeliği Devredışı Bırak</a>
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
</div> @endsection