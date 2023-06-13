@include('frontend.partials.head')
<body>
   @include('frontend.partials.header')


   <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated zoomIn">About</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Home</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        @include('frontend.partials.searchfulpage')


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-4 pb-2">
                            <h6 class="position-relative text-primary ps-4">About Us</h6>
                            <h2 class="mt-2">{{$about->title}}</h2>
                        </div>
                        <p class="mb-4" style="text-align: justify;">{!!$about->details!!}</p>
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
                    <div class="col-lg-5">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset('storage/'.$about->image)}}">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Newsletter Start -->
        <div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">Ready to get started</h3>
                        <small class="text-white">Diam elitr est dolore at sanctus nonumy.</small>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
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
                    {{-- <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('frontend/img/testimonial-2.jpg')}}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('frontend/img/testimonial-3.jpg')}}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('frontend/img/testimonial-4.jpg')}}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Testimonial End -->







    @include('frontend.partials.footer')
   @include('frontend.partials.script')
</body>

</html>
