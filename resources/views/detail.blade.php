@extends('layouts.header')
@section('title', $product->name)



@section('content')

<body>
  @include('partials.topbar')

  <!-- Navbar Start -->
  <div class="container-fluid">
    <div class="row border-top px-xl-5">
      <div class="col-lg-3 d-none d-lg-block">
        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
          data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
          <h6 class="m-0">Categories</h6>
          <i class="fa fa-angle-down text-dark"></i>
        </a>
        <nav id="navbar-vertical"
          class="collapse navbar navbar-vertical navbar-light bg-light position-absolute w-100 border">
          @include('partials.navbar')
        </nav>
      </div>
      @include('partials.navbar2')
    </div>
  </div>
  <!-- Navbar End -->

  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="">Home</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">Shop Detail</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Shop Detail Start -->
  <div class="container-fluid py-5">
    <div class="row px-xl-5">
      <div class="col-lg-5 pb-5">
        <div id="product-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner border">
            @if ($product && $product->images->count() > 0)
        @foreach ($product->images as $index => $image)
      <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
        <img class="w-100 h-100" src="{{ asset('img/' . $image->image_path . '.jpg') }}" alt="Image">
      </div>
    @endforeach
      @else
    <p>No images available.</p>
  @endif

            <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
              <i class="fa fa-2x fa-angle-left text-dark"></i>
            </a>
            <a class="carousel-control-next" href="#product-carousel" data-slide="next">
              <i class="fa fa-2x fa-angle-right text-dark"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-7 pb-5">
        <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
        <div class="d-flex mb-3">
          <div class="text-primary mr-2">
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star-half-alt"></small>
            <small class="far fa-star"></small>
          </div>
          <small class="pt-1">{{ $reviews }}</small>
        </div>
        <h3 class="font-weight-semi-bold mb-4">${{$product->price}}</h3>
        <p class="mb-4">
          {{$product->description}}.
        </p>

        <div class="d-flex mb-3">
          <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
          @csrf
          <form action="/cart" method="post">
            @csrf

            @if ($sizes->count() == 0)
        <p class="s" style="color: red">This product has no sizes available.</p>
      @else
    @foreach($sizes as $size)
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="size-{{ $loop->index }}" name="size"
      value="{{ $size->size }}">
      <label class="custom-control-label" for="size-{{ $loop->index }}">{{ $size->size }}</label>
    </div>
  @endforeach
  @endif

            <div class="d-flex mb-3">
              <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
              @foreach(['Black', 'White', 'Red', 'Blue', 'Green'] as $color)
          <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="color-{{ $loop->index }}" name="color"
            value="{{ $color }}">
          <label class="custom-control-label" for="color-{{ $loop->index }}">{{ $color }}</label>
          </div>
        @endforeach
            </div>

        </div>

        <div class="d-flex align-items-center mb-4 pt-2">
          <div class="input-group quantity mr-3" style="width: 130px;">
            <div class="input-group-btn">
              <button class="btn btn-primary btn-minus"><i class="fa fa-minus"></i></button>
            </div>
            <input type="text" class="form-control bg-secondary text-center" value="1">
            <div class="input-group-btn">
              <button class="btn btn-primary btn-plus"><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
        </div>
        </form>

        <div class="d-flex pt-2">
          <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
          <div class="d-inline-flex">
            @foreach(['facebook-f', 'twitter', 'linkedin-in', 'pinterest'] as $social)
        <a class="text-dark px-2" href=""><i class="fab fa-{{ $social }}"></i></a>
      @endforeach
          </div>
        </div>
      </div>
    </div>


    <!-- Product Tabs -->
    <div class="row px-xl-5">
      <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
          <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
          <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
          <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
        </div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-pane-1">
            <h4 class="mb-3">{{$product->description}}.</p>
          </div>
          <div class="tab-pane fade" id="tab-pane-2">
            <h4 class="mb-3">Additional Information</h4>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Sit erat duo lorem duo ea consetetur, et eirmod takimata.</li>
              <li class="list-group-item">Amet kasd gubergren sit sanctus et lorem eos sadipscing at.</li>
              <li class="list-group-item">Duo amet accusam eirmod nonumy stet et et stet eirmod.</li>
              <li class="list-group-item">Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.</li>
            </ul>
          </div>
          <div class="tab-pane fade" id="tab-pane-3">
            <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
            <div class="media mb-4">
              <img src="img/user.jpg" alt="User" class="img-fluid mr-3 mt-1" style="width: 45px;">
              <div class="media-body">
                <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                <div class="text-primary mb-2">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                  <i class="far fa-star"></i>
                </div>
                <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at...</p>
              </div>
            </div>

            <!-- Review Form -->
            <h4 class="mb-4">Leave a review</h4>
            <form>
              <div class="form-group">
                <label for="message">Your Review *</label>
                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="name">Your Name *</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="form-group">
                <label for="email">Your Email *</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="rating">Your Rating</label>
                <select class="custom-select" id="rating">
                  <option value="1">1 Star</option>
                  <option value="2">2 Stars</option>
                  <option value="3">3 Stars</option>
                  <option value="4">4 Stars</option>
                  <option value="5">5 Stars</option>
                </select>
              </div>
              <button class="btn btn-primary" type="submit">Submit Review</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Related Products -->
    <div class="row px-xl-5">
      <div class="col">
        @if ($related_products->count() > 1)


      <h4 class="text-center py-4">You May Also Like</h4>
      <div class="d-flex flex-wrap justify-content-center">
        @foreach($related_products as $related_product)
      @if ($related_product->name == $product->name)
      @continue
    @endif
      <div class="product-item m-2" style="width: 200px;">
      <div class="product-img position-relative overflow-hidden">
        <img class="img-fluid w-100" src="{{ asset('img/' . $related_product->img . '.jpg') }}" alt="">
      </div>
      <div class="product-action text-center mt-2">
        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-heart"></i></a>
      </div>
      <div class="text-center py-2">
        <h6 class="font-weight-semi-bold m-0">{{  $related_product->name }}</h6>
        <div class="d-flex align-items-center justify-content-center mt-2">
        <h6>{{ $related_product->price }}</h6>
        </div>
      </div>
      </div>
    @endforeach
      </div>
    @endif
      </div>
    </div>

  </div>



  </div>
</body>
<!-- Shop Detail End -->

@include('layouts.footer')
@endsection