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
            <div class="table-responsive fs-md mb-4">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>Siparis #</th>
                    <th>Tarih</th>
                    <th>Statü</th>
                    <th>Toplam</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($payments as $payment)
                  <tr>
                    <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="{{ route('payment.show',$payment) }}">PAYMENT-ID-{{ $payment->id }}</a></td>
                    <td class="py-3">{{ $payment->created_at }}</td>
                    <td class="py-3">
                      @if ($payment->status == 'pending')<span class="badge bg-info m-0">Bekleniyor</span>
                      @elseif ($payment->status == 'paid')
                      <span class="badge bg-success m-0">Onaylandı</span>
                      @elseif ($payment->status == 'cancelled')
                      <span class="badge bg-danger m-0">Reddedildi</span>
                      @endif
                    </td>
                    <td class="py-3">@money($payment->total())</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $payments->links('pagination::default') }}
        </section>
    </div>
</div> @endsection
