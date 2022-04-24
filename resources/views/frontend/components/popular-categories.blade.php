 <!-- Popular categories-->
 <section class="container position-relative pt-3 pt-lg-0 pb-5 mt-lg-n10" style="z-index: 10;">
     <div class="row">
         <div class="col-xl-8 col-lg-9">
             <div class="card border-0 shadow-lg">
                 <div class="card-body px-3 pt-grid-gutter pb-0">
                     <div class="row g-0 ps-1">
                         @foreach ($categories as $category)
                         <div class="col-sm-4 px-2 mb-grid-gutter">
                            <a class="d-block text-center text-decoration-none me-1" href="{{ route('category', $category) }}">
                                <img class="d-block rounded mb-3" src="{{ Storage::url($category->image) }}" alt="{{ $category->title }}">
                                <h3 class="fs-base pt-1 mb-0">{{ $category->title }}</h3>
                            </a>
                        </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
