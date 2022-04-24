@extends('frontend.master')
@section('title', 'Sepet')
@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i
                                    class="ci-home"></i>Anasayfa</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="{{ route('products') }}">Alışveriş</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Alışveriş Sepeti</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Alışveriş Sepeti</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- List of items-->
            <section class="col-lg-{{ $productCart->isEmpty() ? '12' : '8' }}">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                    <h2 class="h6 text-light mb-0">Ürünler</h2><a class="btn btn-outline-primary btn-sm ps-2"
                        href="{{ route('products') }}"><i class="ci-arrow-left me-2"></i>Alışverişe devam et</a>
                </div>
                @if ($productCart->isEmpty())
                    <div class="text-center mt-3">
                        <h1 class="mb-5">Sepetinizde henüz bir ürün yok.</h1>
                        <a href="{{ route('products') }}" class="alert alert-info mt-5">Hadi alışverişe!</a>
                    </div>
                @endif
                <!-- Item-->
                @foreach ($productCart as $cart)
                    <div id="cart-{{ $cart->id }}"
                        class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                        <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
                                class="d-inline-block flex-shrink-0 mx-auto me-sm-4"
                                href="{{ route('product.show', $cart->product) }}"><img
                                    src="{{ Storage::url($cart->product->image) }}" width="160" alt="Product"></a>
                            <div class="pt-2">
                                <h3 class="product-title fs-base mb-2"><a
                                        href="{{ route('product.show', $cart->product) }}">{{ $cart->product->title }}</a>
                                </h3>
                                <div class="fs-sm"><span
                                        class="text-muted me-2">Kategori:</span>{{ $cart->product->category->title }}
                                </div>
                                <div class="fs-lg text-accent pt-2">@money($cart->totalPrice)</div>
                                @if ($cart->product->stock < $cart->quantity)
                                    <p class="text-danger">Bu üründen stokta {{ $cart->product->stock }} adet var.
                                        Lütfen fazla olan ürünleri çıkartınız.</p>
                                @endif
                            </div>
                        </div>
                        <div class="pt-2 pt-sm-0 mx-auto mx-sm-0 text-center text-sm-start">
                            <form action="{{ route('product-cart.update', $cart->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="cart_id" value={{ $cart->id }}>
                                <label class="form-label" for="quantity">Adet
                                    (Stok:{{ $cart->product->stock }})
                                </label>
                                <input class="form-control" type="number" name="quantity" min="1"
                                    max="{{ $cart->product->stock }}" value="{{ $cart->quantity }}">
                                <div class="d-flex mt-2">
                                    <button class="btn btn-outline-danger" onclick="deleteCart({{ $cart->id }})"
                                        type="button"><i class="ci-close fs-base me-2"></i>Sil</button>
                                    <button class="btn btn-outline-accent" type="submit" style="margin-left:3px"
                                        type="button"><i class="ci-loading fs-base me-2"></i>Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </section>
            <!-- Sidebar-->
            @if(!$productCart->isEmpty())
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4">
                    <div class="py-2 px-xl-2">
                        <div class="text-center mb-4 pb-3 border-bottom">
                            <h2 class="h6 mb-3 pb-1">Genel Toplam</h2>
                            <h3 class="fw-normal">@money($total)</h3>
                        </div>
                        <form action="{{ route('payment.store') }}" method="post">
                            @csrf
                            @foreach ($productCart as $cart)
                                <input type="hidden" name="carts[]" value="{{ $cart->id }}">
                            @endforeach
                            <div class="mb-3 mb-4">
                                <label class="form-label mb-3" for="order-comments">
                                    <span class="badge bg-info fs-xs me-2">Not</span>
                                    <span class="fw-medium">Satıcıya Not Bırak</span>
                                </label>
                                <textarea class="form-control" rows="6" id="order-comments" name="note"></textarea>
                            </div>
                            <button class="btn btn-primary btn-shadow d-block w-100 mt-4" type="submit"><i
                                    class="ci-card fs-lg me-2"></i>Ödeme Yap</button>
                        </form>
                    </div>
                </div>
            </aside>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script>
        function deleteCart(id) {
            $.ajax({
                url: "{{ route('product-cart.destroy', 1) }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "DELETE",
                    id: id
                },
                success: function(response) {
                    if (response == 'success') {
                        console.log(response);
                        window.location.reload();
                    }
                }
            });
        }
    </script>
@endsection
