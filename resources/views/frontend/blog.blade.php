@include('frontend.partials.head')
<body>
   @include('frontend.partials.header')

   <div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Blogs</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->

@include('frontend.partials.searchfulpage')




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
                        <div class="card-text" style="overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        text-overflow: ellipsis;
                        -o-text-overflow: ellipsis;">
                          {!! $blog->details !!}
                      </div>
                        <a href="{{route('blogdetails' , $blog->id)}}" class="btn btn-primary">Read More >></a>
                      </div>
                    </div>
                  </div>
                  @endforeach



                </div>

                {{-- <div class="row">
                  <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://mdbootstrap.com/img/new/standard/nature/002.jpg" class="img-fluid" />
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Post title</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title and make up the bulk of the
                          card's content.
                        </p>
                        <a href="#!" class="btn btn-primary">Read</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://mdbootstrap.com/img/new/standard/nature/022.jpg" class="img-fluid" />
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Post title</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title and make up the bulk of the
                          card's content.
                        </p>
                        <a href="#!" class="btn btn-primary">Read</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://mdbootstrap.com/img/new/standard/nature/035.jpg" class="img-fluid" />
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Post title</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title and make up the bulk of the
                          card's content.
                        </p>
                        <a href="#!" class="btn btn-primary">Read</a>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </section>
              <!--Section: Content-->

              <!-- Pagination -->

              <nav class="my-4" aria-label="...">
                @if ($blogs->lastPage() > 1)
                <ul class="pagination pagination-circle justify-content-center">
                    {{-- <li class="{{ ($blogs->currentPage() == 1) ? ' disabled' : '' }} page-item">
                        <a href="{{ $blogs->url(1) }}"><i class="flaticon-back"></i></a>
                    </li> --}}
                    {{-- <a class="page-link" href="{{ $blogs->url($i--) }}" tabindex="-1" aria-disabled="true">
                  <li class="page-item">
                    Previous
                  </li>
                </a> --}}
                  @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                  <a href="{{ $blogs->url($i) }}">
                    <li class=" page-link" style="{{ ($blogs->currentPage() == $i) ? ' background:blue; color:white; ' : '' }} margin:1px; border-radius:50%;">
                               {{ $i }}
                            </li></a>
                        @endfor

                {{-- <a class="page-link" href="{{ $blogs->url($i++) }}">
                  <li class="page-item">
                    Next
                  </li>
                </a> --}}
                </ul>
                @endif
              </nav>



        </div>
            </div>
          </section>


        @include('frontend.partials.footer')

    <!-- JavaScript Libraries -->
   @include('frontend.partials.script')
</body>

</html>
