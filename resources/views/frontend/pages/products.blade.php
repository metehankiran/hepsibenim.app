@extends('frontend.master')
@section('title', 'Ürünler')
@section('content')
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i
                                    class="ci-home"></i>Anasayfa</a></li>
                        <li class="breadcrumb-item text-nowrap active">Alışveriş</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Tüm ürünler</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-4">
                <!-- Sidebar-->
                <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar"
                    style="max-width: 22rem;">
                    <div class="offcanvas-header align-items-center shadow-sm">
                        <h2 class="h5 mb-0">Filters</h2>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
                        <!-- Categories-->
                        <div class="widget widget-categories mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Kategoriler</h3>
                            <div class="accordion mt-n1" id="shop-categories">
                                @foreach ($categories as $category)
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a style="font-size:1rem;letter-space:1rem;font-weight:{{ (request()->segment(2) == $category->slug) ? '600' : '200' }}" class="active" href="{{ route('category',$category) }}">{{ $category->title }} - ({{ $category->products->where('is_active')->count() }} ürün)</a></h3>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="d-flex flex-wrap">
                        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block"
                                for="sorting">Keyifli alışverişler!</label>
                        </div>
                    </div>
                </div>
                <!-- Products grid-->
                <div class="row mx-n2">
                @foreach ($products->where('is_active', true) as $product)
                    <!-- Product-->
                    <div class="col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <a
                                class="card-img-top d-block overflow-hidden" href="{{ route('product.show', $product) }}"><img
                                    src="{{ Storage::url($product->image) }}" alt="{{ $product->title }}"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{ route('category', $product->category) }}">{{ $product->category->title }}</a>
                                <h3 class="product-title fs-sm"><a href="{{ route('product.show', $product) }}">{{ $product->title }}</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span class="text-accent">@money($product->price)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <a class="btn btn-primary btn-sm d-block w-100 mb-2" href="{{ route('product.show',$product) }}"><i class="ci-eye align-middle me-1"></i>Ürünü Görüntüle</a>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    @endforeach
                </div>
                <hr class="my-3">
                <!-- Pagination-->
                {{ $products->links('vendor.pagination.default') }}
            </section>
        </div>
    </div>
@endsection
