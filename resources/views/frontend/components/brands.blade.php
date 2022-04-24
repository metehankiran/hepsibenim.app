<!-- Shop by brand-->
<section class="container py-lg-4 mb-4">
    <h2 class="h3 text-center pb-4">Markalar</h2>
    <div class="row">
      @foreach ($brands as $brand)
      <div class="col-md-3 col-sm-4 col-6">
        <a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#">
          <img class="d-block mx-auto" src="{{ Storage::url($brand->image) }}" style="width: 150px;" alt="{{ $brand->title }}">
        </a>
      </div>
      @endforeach
    </div>
</section>