<!-- Products grid (Trending products)-->
    <section class="container pt-md-3 pb-5 mb-md-3">
      <h2 class="h3 text-center">Son Eklenen Ürünler</h2>
      <div class="row pt-4 mx-n2">
        <!-- Product-->
        @foreach ($lastProducts as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <a class="card-img-top d-block overflow-hidden" href="{{ route('product.show', $product) }}"><img src="{{ Storage::url($product->image) }}" alt="{{ $product->description }}"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{ route('product.show', $product) }}">{{ $product->category->title }}</a>
              <h3 class="product-title fs-sm"><a href="{{ route('product.show', $product) }}">{{ $product->title }}</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">₺{{ $product->price }}</span></div>
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
      <div class="text-center pt-3"><a class="btn btn-outline-accent" href="{{ route('products') }}">Tüm Ürünler<i class="ci-arrow-right ms-1"></i></a></div>
    </section>