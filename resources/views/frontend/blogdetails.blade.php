@include('frontend.partials.head')
<body>
   @include('frontend.partials.header')

   <div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Blog Details</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('blog')}}">Blog</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Blog details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->



 <!-- Page content-->
 <div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h5 class="fw-bolder mb-1">{{$blog->title}}</h5>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on <b>{{$blog->created_at->format('jS F Y')}}</b></div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="{{route('blogbycategory' , $blog->category_id)}}">{{$blog->category->title}}</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('storage/'.$blog->image)}}" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{!! $blog->details !!}</p>
                </section>
            </article>


        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->

            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-unstyled mb-0">
                                @foreach($blogcategories as $blogcategory)
                                <li><a href="{{route('blogbycategory' , $blogcategory->category_id)}}">{{$blogcategory->category->title}} ({{$blogcategory->total}})</a></li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="header">
                    <div class="card-header">Latest Blogs</div>
                </div>
                <div class="body widget popular-post">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($blogs as $blog)

                            <div class="single_post" style="padding: auto; margin:auto; text-align:center; display:flex;">
                                <div class="img-post" style="padding:10px; text-align:left">
                                    <a href="{{route('blogdetails' , $blog->id)}}"><img src="{{asset('storage/'.$blog->image)}}" alt="Awesome Image" height="100" width="100"></a>
                                </div>
                                <div class="m-b-0" style="padding-top:10px; padding-bottom:0px; text-align:left;"> <p> <a href="{{route('blogdetails' , $blog->id)}}" style="color:black;"><b>{{$blog->title}}</b> </a><br> <span>{{$blog->created_at->format('jS F Y')}}</span></p>



                            </div>

                            <hr>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            {{-- <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div> --}}
        </div>
    </div>
</div>


        @include('frontend.partials.footer')

    <!-- JavaScript Libraries -->
   @include('frontend.partials.script')
</body>

</html>
