<div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    {{-- <h1 class="m-0"><i class="fa fa-search me-2"></i>SEO<span class="fs-5">Master</span></h1> --}}
                     <img src="{{asset('storage/'.$setting->logo)}}" style="border-radius: 50%; height:80px; width:80px;" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{route('index')}}" class="nav-item nav-link @if( Route::currentRouteName() == 'index')active @endif" >Home</a>
                        <a href="{{route('about')}}" class="nav-item nav-link @if( Route::currentRouteName() == 'about')active @endif">About</a>
                        <a href="{{route('service')}}" class="nav-item nav-link @if( Route::currentRouteName() == 'service')active @endif">Service</a>
                        <a href="{{route('project')}}" class="nav-item nav-link @if( Route::currentRouteName() == 'project')active @endif">Project</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle @if((Route::currentRouteName() == 'team')||(Route::currentRouteName() == 'testimonial')||(Route::currentRouteName() == 'blog'))active @endif" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{route('team')}}" class="dropdown-item " style="@if(Route::currentRouteName() == 'team') color:blue; @endif">Our Team</a>
                                <a href="{{route('testimonial')}}" class="dropdown-item" style="@if(Route::currentRouteName() == 'testimonial') color:blue; @endif">Testimonial</a>
                                <a href="{{route('blog')}}" class="dropdown-item" style="@if(Route::currentRouteName() == 'blog') color:blue; @endif">Blog's</a>
                                {{-- <a href="{{route('404')}}" class="dropdown-item">404 Page</a> --}}
                            </div>
                        </div>
                        <a href="{{route('contact')}}" class="nav-item nav-link @if( Route::currentRouteName() == 'contact')active @endif">Contact</a>
                    </div>
                    {{-- <button type="button" class="btn text-secondary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button> --}}
                    {{-- <a href="https://htmlcodex.com/startup-company-website-template" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Pro Version</a> --}}
                </div>
            </nav>


        <!-- Navbar & Hero End -->
