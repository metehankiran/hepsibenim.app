@auth
<div class="navbar-tool dropdown ms-3">
  <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{ route('product-cart') }}">
    <span class="navbar-tool-label">{{ $productCart->count() }}</span><i class="navbar-tool-icon ci-cart"></i>
  </a>
  <a class="navbar-tool-text" href="{{ route('product-cart') }}"><small>Sepetim</small>@money($total)</a>
<!-- Cart dropdown-->
<div class="dropdown-menu dropdown-menu-end">
    <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
      <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
        @foreach ($productCart as $item)
        <div class="widget-cart-item pb-2 border-bottom">
          <div class="d-flex align-items-center"><a class="flex-shrink-0" href="{{ route('product.show',$item->product) }}"><img src="{{ Storage::url($item->product->image) }}" width="64" alt="Product"></a>
            <div class="ps-2">
              <h6 class="widget-product-title"><a href="{{ route('product.show',$item->product) }}">{{ $item->quantity }}x {{ $item->product->title }}</a></h6>
              <div class="widget-product-meta"><span class="text-accent me-2">@money($item->totalPrice)</span></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
        <div class="fs-sm me-2 py-2"><span class="text-muted">Toplam:</span><span class="text-accent fs-base ms-1">@money($total)</span></div>
      </div><a class="btn btn-primary btn-sm d-block w-100" href="{{ route('product-cart') }}"><i class="ci-card me-2 fs-base align-middle"></i>Sepete Git</a>
    </div>
  </div>
</div>
@endauth