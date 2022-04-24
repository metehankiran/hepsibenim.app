<!-- Toolbar-->
      <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
        <h6 class="fs-base text-light mb-0">Hesap bilgilerini güncelle:</h6>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-primary btn-sm"><i class="ci-sign-out me-2"></i>Çıkış yap </a></button>
        </form>
      </div>