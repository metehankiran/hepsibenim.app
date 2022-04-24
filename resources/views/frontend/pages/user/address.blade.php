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
                    <h5 class="modal-title">Adres Bilgisi</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.address.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row gx-4 gy-3">
                            <div class="col-sm-12">
                                <label class="form-label" for="address-fn">First name</label>
                                <input class="form-control" type="text" id="address-fn" value="{{ $user->name }}"
                                    disabled>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-country">Ülke</label>
                                <input type="text" class="form-control" name="country"
                                    value="{{ $user->address->country }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-company">İl</label>
                                <input class="form-control" type="text" name="state" id="address-company"
                                    value="{{ $user->address->state }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-city">İlçe</label>
                                <input class="form-control" type="text" id="address-city" name="city" required=""
                                    value="{{ $user->address->city }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-zip">Posta Kodu</label>
                                <input class="form-control" type="text" id="address-zip" name="zip" required=""
                                    value="{{ $user->address->zip }}">
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="address-line1">Adres</label>
                                <input class="form-control" type="text" id="address-line1" name="address" required=""
                                    value="{{ $user->address->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-shadow" type="submit">Adres bilgisini güncelle</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div> @endsection
