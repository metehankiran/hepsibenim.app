<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Hepsibenim.com')</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords" content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend') }}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend') }}/favicon-16x16.png">
    <link rel="mask-icon" color="#fe6a6a" href="{{ asset('frontend') }}/safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontend') }}/vendor/simplebar/dist/simplebar.min.css" />
    <link rel="stylesheet" media="screen" href="{{ asset('frontend') }}/vendor/tiny-slider/dist/tiny-slider.css" />
    <link rel="stylesheet" media="screen" href="{{ asset('frontend') }}/vendor/drift-zoom/dist/drift-basic.min.css" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontend') }}/css/theme.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true">
                  <i class="ci-unlocked me-2 mt-n1"></i>Giriş Yap </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false">
                  <i class="ci-user me-2 mt-n1"></i>Kayıt Ol </a>
              </li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">
            <form action="{{ route('login') }}" method="post" class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="signin-tab"> @csrf <div class="mb-3">
                <label class="form-label" for="si-email">Email adresi</label>
                <input class="form-control" type="email" name="email" id="si-email" placeholder="kullanici@hepsibenim-app.com" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="si-password">Şifre</label>
                <div class="password-toggle">
                  <input class="form-control" name="password" type="password" id="si-password" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Giriş yap</button>
            </form>
            <form action="{{ route('register') }}" method="post" class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab"> @csrf <div class="mb-3">
                <label class="form-label" for="su-name">İsim</label>
                <input class="form-control" name="name" type="text" id="su-name" placeholder="Ali Kaya" required>
              </div>
              <div class="mb-3">
                <label for="su-email">Email adresi</label>
                <input class="form-control" type="email" name="email" id="su-email" placeholder="kullanici@hepsibenim-app.com" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="su-password">Şifre</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" name="password" id="su-password" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="su-password-confirm">Tekrar şifre</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" name="password_confirmation" id="su-password-confirm" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Kayıt ol</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @yield('currency')
    <!-- Navbar 3 Level (Light)-->
    <header class="shadow-sm">
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="{{ route('home') }}">
              hepsibenim.app
            </a>
            <a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="{{ route('home') }}">
              hepsibenim.app
            </a> @include('frontend.components.navbar') <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
              </button> @auth <div class="dropdown">
                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('user.profile') }}" data-toggle="dropdown" aria-expanded="false">
                  <div class="navbar-tool-icon-box">
                    <i class="navbar-tool-icon ci-user"></i>
                  </div>
                  <div class="navbar-tool-text ms-n3">Hesabım</div>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('user.profile') }}">Profil</a>
                  <form method="post" action="{{ route('logout') }}"> @csrf <button class="dropdown-item" href="#">Çıkış Yap</button>
                  </form>
                </div>
              </div> @else <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
                <div class="navbar-tool-icon-box">
                  <i class="navbar-tool-icon ci-user"></i>
                </div>
                <div class="navbar-tool-text ms-n3">
                  <small>Giriş Yap</small> Hesabım
                </div>
              </a> @endauth @include('frontend.components.cart-dropdown')
            </div>
          </div>
        </div>
    </header> @yield('content')
    <!-- Footer-->
    <footer class="footer bg-dark">
      <div class="pt-5 bg-darker">
        <div class="container">
          <div class="row pb-3">
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="ci-rocket text-primary" style="font-size: 2.25rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">Hızlı ve ücretsiz teslimat</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">200 TL üzeri tüm siparişlerde ücretsiz teslimat</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="ci-currency-exchange text-primary" style="font-size: 2.25rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">Para iade garantisi</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">30 gün içinde parayı iade ediyoruz</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="ci-support text-primary" style="font-size: 2.25rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">7/24 müşteri desteği</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">Dost canlısı 7/24 müşteri desteği</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="ci-card text-primary" style="font-size: 2.25rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">Güvenli çevrimiçi ödeme</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">SSL / Güvenli sertifikasına sahibiz</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="hr-light mb-5">
          <div class="row pb-2">
            <div class="col-md-6 text-center text-md-start mb-4">
              <div class="widget widget-links widget-light">
                <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                  <li class="widget-list-item me-4">
                    <a class="widget-list-link" href="{{ route('home') }}">Anasayfa</a>
                  </li>
                  <li class="widget-list-item me-4">
                    <a class="widget-list-link" href="{{ route('products') }}">Alışveriş</a>
                  </li>
                  <li class="widget-list-item me-4">
                    <a class="widget-list-link" href="{{ route('about') }}">Hakkımızda</a>
                  </li>
                  <li class="widget-list-item me-4">
                    <a class="widget-list-link" href="{{ route('contact') }}">İletişim</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 text-center text-md-end mb-4">
              <div class="mb-3">
                <a class="btn-social bs-light bs-instagram ms-2 mb-2" href="https://www.instagram.com/hepsebenim.app">
                  <i class="ci-instagram"></i>
                </a>
              </div>
              <img class="d-inline-block" src="{{ asset('frontend') }}/img/cards-alt.png" width="187" alt="Payment methods">
            </div>
          </div>
          <div class="pb-4 fs-xs text-light opacity-50 text-center">Tüm hakları saklıdır. © {{ now()->year }}</a>
          </div>
        </div>
      </div>
    </footer>
    <!-- Back To Top Button-->
    <a class="btn-scroll-top" href="#top" data-scroll>
      <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
      <i class="btn-scroll-top-icon ci-arrow-up"></i>
    </a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="{{ asset('frontend') }}/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/drift-zoom/dist/Drift.min.js"></script>
    <!-- Main theme script-->
    <script src="{{ asset('frontend') }}/js/theme.min.js"></script> @yield('script') @if($errors->any()) <script>
      Swal.fire({
        title: 'Hata!',
        html: '<ul>@foreach($errors->all() as $message)<li>{{ $message }}</li>@endforeach</ul>',
        icon: 'error',
        confirmButtonText: 'Tamam'
      })
    </script> @endif @if(Session::has('success')) <script>
      Swal.fire({
        title: 'Başarılı!',
        text: '{{ Session::get('success') }}',
        icon: 'success',
        confirmButtonText: 'Tamam'
      })
    </script> @endif
  </body>
</html>