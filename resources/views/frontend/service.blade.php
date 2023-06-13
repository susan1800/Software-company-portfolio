@include('frontend.partials.head')
<body>
   @include('frontend.partials.header')

   <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated zoomIn">Service</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        @include('frontend.partials.searchfulpage')


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                    <h2 class="mt-2">What Solutions We Provide</h2>
                </div>
                <div class="row g-4">
                    @php
                        $i=1;
                    @endphp
                    @foreach ($services as $service)


                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded" >
                            <div class="service-icon flex-shrink-0" >
                                {{-- <i class="fa fa-home fa-2x"></i> --}}
                                <img src="{{ asset('storage/'.$service->icon) }}" alt="img" height="60" width="60"  style="border-radius: 50%;">
                            </div>
                            <h5 class="mb-3">{{$service->title}}</h5>
                            <div style="display: -webkit-box;
                            -webkit-box-orient: vertical;
                            -webkit-line-clamp: 3;
                            overflow: hidden; text-align: justify;">
                            {!! $service->details !!}</div>
                            <a class="btn px-3 mt-auto mx-auto" data-toggle="modal" data-target="#exampleModal{{$i}}">Read More</a>
                        </div>
                    </div>

                      <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$service->title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div style="text-align: center; padding:auto; margin:auto;">
            <img src="{{asset('storage/'.$service->icon)}}" style="height:110px; border-radius:10px;">
        </div>
        <p style="text-align: justify;">{!! $service->details !!}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @php
      $i++;
  @endphp

                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->



    <!-- Portfolio Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Our Projects</h6>
                <h2 class="mt-2">Recently Launched Projects</h2>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="btn px-3 pe-4 active" data-filter="*">All</li>
                        @foreach($categories as $category)
                        <li class="btn px-3 pe-4" data-filter=".{{$category->title}}">{{$category->title}}</li>
                        @endforeach
                        {{-- <li class="btn px-3 pe-4" data-filter=".second">Development</li> --}}
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                @foreach ($portfolios as $portfolio)


                <div class="col-lg-4 col-md-6 portfolio-item {{$portfolio->category->title}} wow zoomIn" data-wow-delay="0.1s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{asset('storage/'.$portfolio->image)}}" style="height: 350px !important;" alt="">
                        <div class="portfolio-overlay">
                            <a class="btn btn-light" href="{{asset('storage/'.$portfolio->image)}}"  data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                            <div class="mt-auto">
                                <small class="text-white"><i class="fa fa-folder me-2"></i>{{$portfolio->category->title}}</small>
                                <a class="h5 d-block text-white mt-1 mb-0" href="{{$portfolio->link}}">{{$portfolio->title}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Portfolio End -->


        @include('frontend/partials.footer')

   @include('frontend.partials.script')
</body>

</html>
