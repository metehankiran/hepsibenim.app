@extends('frontend.master')
@section('title', 'Anasayfa')
@section('content')
<!-- Custom page title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i class="ci-home"></i>Anasayfa</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="{{ route('products') }}">Ürünler</a>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ $product->title }}</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-2">{{ $product->title }}</h1>
        <div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="bg-light shadow-lg rounded-3">
      <!-- Tabs-->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab" role="tab">Ürün <span class='d-none d-sm-inline'>Bilgileri</span></a></li>
      </ul>
      @if(Session::has('success') || Session::has('error'))
      <div class="p-2">
          @if(Session::has('success'))
          <div class="alert alert-success">
            <strong>Başarılı!</strong> {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">
            <strong>Hata!</strong> {{ Session::get('error') }}
        </div>
        @endif
      </div>
      @endif
      <div class="px-4 pt-lg-3 pb-3 mb-5">
        <div class="tab-content px-lg-3">
          <!-- General info tab-->
          <div class="tab-pane fade show active" id="general" role="tabpanel">
            <div class="row">
              <!-- Product gallery-->
              <div class="col-lg-7 pe-lg-0">
                <div class="product-gallery">
                  <div class="product-gallery-preview order-sm-2">
                    <div class="product-gallery-preview-item active" id="first">
                        <img class="image-zoom" src="{{ Storage::url($product->image) }}" data-zoom="{{ Storage::url($product->image) }}" alt="{{ $product->title }}">
                        <div class="image-zoom-pane"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Product details-->
              <div class="col-lg-5 pt-4 pt-lg-0">
                <div class="product-details ms-auto pb-3">
                  <div class="h3 fw-normal text-accent mb-3 me-1">@money($product->price)</div>
                  <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Kategori:</span><span class="text-muted" id="colorOption">{{ $product->category->title }}</span></div>
                  <div class="position-relative me-n4 mb-5">
                    <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Stokta {{ $product->stock }} ürün var</div>
                  </div>
                  <form action="{{ route('product-cart.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="d-flex align-items-center pt-2 pb-4">
                        <select class="form-select me-3" name="quantity" style="width: 5rem;">
                          @for ($i = 1; $i <= $product->stock  && $i<=5; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i class="ci-cart fs-lg me-2"></i>Sepete Ekle</button>
                      </div>
                  </form>
                  <!-- Product panels-->
                  <div class="accordion mb-4" id="productPanels">
                    <div class="accordion-item">
                      <h3 class="accordion-header"><a class="accordion-button" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Ürün Detayları</a></h3>
                      <div class="accordion-collapse collapse show" id="shippingOptions" data-bs-parent="#productPanels">
                        <div class="accordion-body fs-sm">
                          <div class="d-flex justify-content-between pt-1">
                            <div>
                              <div class="fw-semibold text-dark">{{ $product->title }} - @money($product->price)</div>
                              <div class="fs-sm text-muted p-2">{{ $product->category->title }}</div>
                              <p class="">{{ $product->description }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Sharing-->
                  <label class="form-label d-inline-block align-middle my-2 me-3">Paylaş:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection