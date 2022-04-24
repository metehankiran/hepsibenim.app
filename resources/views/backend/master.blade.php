<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="{{ asset('backend') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('backend') }}/css/sb-admin-2.min.css" rel="stylesheet">
    @yield('css')
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('backend.admin.home') }}">
                <div class="sidebar-brand-text mx-3">hepsibenim.app</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('backend.admin.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Arayüz</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Arayüz
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.user.edit',Auth::user()) }}"><i class="fas fa-fw fa-user"></i>
                    <span>Profil Ayarları</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.product.index') }}"><i class="fas fa-fw fa-barcode"></i>
                    <span>Ürünler</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.category.index') }}"><i class="fas fa-fw fa-clone"></i>
                    <span>Kategoriler</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.slider.index') }}"><i class="fas fa-fw fa-align-center"></i>
                    <span>Slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.brand.index') }}"><i class="fas fa-fw fa-chart-line"></i>
                    <span>Markalar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.payment.index') }}"><i class="fas fa-fw fa-network-wired"></i>
                    <span>Siparişler</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.ticket.index') }}"><i class="fas fa-fw fa-envelope-open"></i>
                    <span>Destek Talepleri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.contact.index') }}"><i class="fas fa-fw fa-thumbtack"></i>
                    <span>İletişim</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.setting.index') }}"><i class="fas fa-fw fa-cog"></i>
                    <span>Ayarlar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('backend.user.index') }}"><i class="fas fa-fw fa-user"></i>
                    <span>Üyeler</span>
                </a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ Storage::url(Auth()->user()->image) }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('backend.user.edit',Auth::user()) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Çıkış Yap
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                    </div>
                </div>
                @yield('content')
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Tüm Hakları Saklıdır &copy; {{ env('APP_NAME') }} {{ now()->year }}</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="{{ asset('backend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('backend') }}/js/sb-admin-2.min.js"></script>
    @yield('script')
</body>
</html>