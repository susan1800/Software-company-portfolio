@include('frontend.partials.head')

<body>
   @include('frontend.partials.header')
   <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated zoomIn">Team</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Home</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Team</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        @include('frontend.partials.searchfulpage')



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


        @include('frontend.partials.footer')

    @include('frontend.partials.script')
</body>

</html>
