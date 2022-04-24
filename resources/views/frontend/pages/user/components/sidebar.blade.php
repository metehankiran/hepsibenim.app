<!-- Sidebar-->
<aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
    <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
        <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
            <div class="d-md-flex align-items-center">
                <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0"
                    style="width: 6.375rem;">
                    <img class="rounded-circle" src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}">
                </div>
                <div class="ps-md-3">
                    <h3 class="fs-base mb-0">{{ $user->name }}</h3>
                    <span class="text-accent fs-sm">{{ $user->email }}</span>
                </div>
            </div>
            <a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse"
                aria-expanded="false">
                <i class="ci-menu me-2"></i>Account menu </a>
        </div>
        <div class="d-lg-block collapse" id="account-menu">
            <div class="bg-secondary px-4 py-3">
                <h3 class="fs-sm mb-0 text-muted">Üye Paneli</h3>
            </div>
            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ request()->routeIs('order.history') ? 'active' : '' }}" href="{{ route('order.history') }}">
                        <i class="ci-bag opacity-60 me-2"></i>Siparişlerim 
                    </a>
                </li>
                <li class="mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ route('ticket.index') }}">
                        <i class="ci-help opacity-60 me-2"></i>Destek biletleri
                    </a>
                </li>
            </ul>
            <div class="bg-secondary px-4 py-3">
                <h3 class="fs-sm mb-0 text-muted">Hesap ayarları</h3>
            </div>
            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ request()->routeIs('user.profile') ? 'active' : '' }}"
                        href="{{ route('user.profile') }}">
                        <i class="ci-user opacity-60 me-2"></i>Profil bilgileri </a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ request()->routeIs('user.address') ? 'active' : '' }}"
                        href="{{ route('user.address') }}">
                        <i class="ci-location opacity-60 me-2"></i>Adres bilgileri </a>
                </li>
                <li class="mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ request()->routeIs('user.payment-method') ? 'active' : '' }}"
                        href="{{ route('user.payment-method') }}">
                        <i class="ci-card opacity-60 me-2"></i>Ödeme bilgileri </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
