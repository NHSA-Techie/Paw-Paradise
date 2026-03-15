<div class="gallery">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="titlepage">
          <h2 class="section-title">Our Lovely Gallery</h2>
          <p class="section-subtitle">A glimpse of happy moments at Paws Paradise</p>
        </div>
      </div>
    </div>

    {{-- start images --}}
    <div class="row gallery-grid">
      @foreach ($gallary as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="gallery_img">
            <figure>
              <img src="{{ asset('gallary/'.$item->image) }}" alt="Gallery image" loading="lazy">
              <div class="overlay"></div>
            </figure>
          </div>
        </div>
      @endforeach
    </div>
    {{-- end images --}}
  </div>
</div>
