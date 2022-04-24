<!-- Hero slider-->
<section class="tns-carousel tns-controls-lg">
    <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
      @foreach ($sliders as $slider)
      <!-- Item-->
      <div class="px-lg-5" style="background-color: {{ $slider->bgColor }};">
        <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="{{ asset('images').'/'.$slider->image }}" alt="Summer Collection">
          <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
            <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
              <h3 class="h2 text-light fw-light pb-1 from-start">{{ $slider->text1 }}</h3>
              <h2 class="text-light display-5 from-start delay-1">{{ $slider->text2 }}</h2>
              <p class="fs-lg text-light pb-3 from-start delay-2">{{ $slider->text3 }}</p>
              <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="{{ route('products') }}">Alışverişe Başla<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>