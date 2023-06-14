@include('frontend.partials.head')
<body>
   @include('frontend.partials.header')

   <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">{!!$home->title!!}</h1>
                            <p class="text-white mb-4 animated zoomIn" style="color:white !important;">{!!$home->details!!}</p>
                            {{-- <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Free Quote</a> --}}
                            <a href="{{route('contact')}}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                        </div>
                        <div class="col-lg-4 text-center text-lg-start">
                            <img class="img-fluid" src="{{asset('storage/'.$home->image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

       @include('frontend.partials.searchfulpage')


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-4 pb-2">
                            <h6 class="position-relative text-primary ps-4">About Us</h6>
                            <h2 class="mt-2">{{$about->title}}</h2>
                        </div>
                        {{-- <p class="mb-4">{!!$about->details!!}</p> --}}
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>On-Time Delivery</h6>
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Quality Assurance and Testing</h6>
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Security and Data Privacy</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Fair Prices</h6>
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Custom Software Development</h6>
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Focus on User Experience</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <a class="btn btn-primary rounded-pill px-4 me-3" href="{{route('about')}}">Read More</a>
                            @if($about->facebook != null)
                            <a class="btn btn-outline-primary btn-square me-3" href="{{$about->facebook}}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($about->twitter != null)
                            <a class="btn btn-outline-primary btn-square me-3" href="{{$about->twitter}}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($about->github != null)
                            <a class="btn btn-outline-primary btn-square me-3" href="{{$about->github}}"><i class="fab fa-github"></i></a>
                            @endif
                            @if($about->linkedin != null)
                            <a class="btn btn-outline-primary btn-square" href="{{$about->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset('storage/'.$about->image)}}">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->



        {{-- start company icon --}}
        <div class="brands">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Trusted Over {{$companyiconcount}}+ Companies</h6>

            </div>
            <div class="section-small text-center wow pixFadeUp">

            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="">
                            <div class="owl-carousel owl-theme brands_slider">
                                @foreach($companyicons as $companyicon)
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center">
                                        <img src="{{asset('storage/'.$companyicon->icon)}}" alt="" style="height:80px;">
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter Start -->
        <div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">Ready to get started</h3>
                        <small class="text-white">Diam elitr est dolore at sanctus nonumy.</small>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" id="subscriptionemail" type="text" placeholder="Enter Your Email" style="height: 48px;">
                            <button id="subscriptionbutton" onclick="subscription()" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid mt-5" style="height: 250px;" src="{{asset('frontend/img/newsletter.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->


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
                            <li class="btn px-3 pe-4" data-filter=".{{$category->slug}}">{{$category->title}}</li>
                            @endforeach
                            {{-- <li class="btn px-3 pe-4" data-filter=".second">Development</li> --}}
                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container">
                    @foreach ($portfolios as $portfolio)


                    <div class="col-lg-4 col-md-6 portfolio-item {{$portfolio->category->slug}} wow zoomIn" data-wow-delay="0.1s">
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


        <!-- Testimonial Start -->
        <div class="container-xxl bg-primary testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="owl-carousel testimonial-carousel">
                    @foreach ($testimonials as $testimonial)


                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p>{!! $testimonial->details !!}</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('storage/'.$testimonial->image) }}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1"> {{$testimonial->name}}</h6>
                                <small>{{$testimonial->title}}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Team Start -->
    <div class="container">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Team</h6>
            <h2 class="mt-2">Meet Our Team Members</h2>
        </div>
        <div class="row">
            @foreach($teams as $team)
            <div class="col-md-4 col-sm-6 wow fadeInUp "data-wow-delay="0.1s" style="margin-bottom: 5px;">
                <div class="our-team">
                    <div class="pic">
                        <img style="height:350px;" src="{{asset('storage/'.$team->image)}}">
                    </div>
                    <h5>{{$team->name}}</h5>
                    <span class="post">{{$team->title}}</span>
                    <ul class="social">
                        @if($team->facebook)
                        <li><a href="{{$team->facebook}}" class="fab fa-facebook-f"></a></li>
                        @endif
                        @if($team->github)
                        <li><a href="{{$team->github}}" class="fab fa-github"></a></li>
                        @endif
                        @if($team->linkedin)
                        <li><a href="{{$team->linkedin}}" class="fab fa-linkedin"></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            @endforeach



        </div>
    </div>
    {{--  team end --}}


        <section class="my-5">
            <div class="container">
              <!--Section: Content-->
              <section class="text-center">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">our Blogs</h6>
                    <h2 class="mt-2">Latest Blogs</h2>
                </div>

                <div class="row">
                    @foreach($blogs as $blog)
                  <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <div class="card-text" style="display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden; ">
                          {!! $blog->details !!}
                      </div>
                        <a href="{{route('blogdetails' , $blog->id)}}" class="btn btn-primary">Read More >></a>
                      </div>
                    </div>
                  </div>
                  @endforeach



                </div>


                </div>
              </section>
              <!--Section: Content-->

              <!-- Pagination -->
              {{-- <nav class="my-4" aria-label="...">
                <ul class="pagination pagination-circle justify-content-center">
                  <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav> --}}
            </div>
          </section>


        @include('frontend.partials.footer')

    <!-- JavaScript Libraries -->
   @include('frontend.partials.script')

   <script>
    $(document).ready(function(){

if($('.brands_slider').length)
{
 var brandsSlider = $('.brands_slider');

 brandsSlider.owlCarousel(
 {
     loop:true,
     autoplay:true,
     autoplayTimeout:3000,
     nav:false,
     dots:false,
     autoWidth:true,
     items:10,
     margin:42
 });

 if($('.brands_prev').length)
 {
     var prev = $('.brands_prev');
     prev.on('click', function()
     {
         brandsSlider.trigger('prev.owl.carousel');
     });
 }

 if($('.brands_next').length)
 {
     var next = $('.brands_next');
     next.on('click', function()
     {
         brandsSlider.trigger('next.owl.carousel');
     });
 }
}


});
</script>
</body>

</html>
