<!-- Primary menu-->
<ul class="navbar-nav">
    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}">Anasayfa</a></li>
    <li class="nav-item {{ request()->routeIs('products') || request()->routeIs('category') || request()->routeIs('product.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('products') }}">Alışveriş</a></li>
    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('about') }}">Hakkımızda</a></li>
    <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">İletişim</a></li>
</ul>