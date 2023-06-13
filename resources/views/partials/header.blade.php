<header class="site-header header-two header_trans-fixed" data-top="992">
    <div class="container">
        <div class="header-inner">
            <div class="site-mobile-logo"><a href="{{'/'}}" class="logo"><img src="{{url('assets/img/logo-two.png')}}" alt="site logo" class="main-logo"> <img src="{{url('assets/img/logo-two.png')}}" alt="site logo" class="sticky-logo"></a></div>
            <div class="toggle-menu"><span class="bar"></span> <span class="bar"></span> <span class="bar"></span></div>
            <nav class="site-nav nav-two">
                <div class="close-menu"><span>Close</span> <i class="ei ei-icon_close"></i></div>
                <div class="site-logo"><a href="{{'/'}}" class="logo"><img src="{{url('assets/img/logo-two.png')}}" alt="site logo" class="main-logo"> <img src="{{url('assets/img/logo-two.png')}}" alt="site logo" class="sticky-logo"></a></div>
                <div class="menu-wrapper" data-top="992">
                    <ul class="site-main-menu">
                        <li ><a href="{{'/'}}">Home</a></li>
                        <li><a href="{{route('about')}}">About</a></li>
                        <li><a href="{{route('blog.index')}}">Blog</a></li>

                        <li class="menu-item-has-children"><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('blog.index')}}">Blog</a></li>
                            <li><a href="{{route('contact.index')}}">Contact</a></li>
                            <li><a href="{{route('portfolio.index')}}">portfolio</a></li>
                            <li><a href="{{route('signup')}}">signup</a></li>
                            <li><a href="{{route('signin')}}">signin</a></li>
                        </ul>
                            
                        </li>
                        <li><a href="{{route('portfolio.index')}}">portfolio</a></li>
                        <li><a href="{{route('contact.index')}}">Contact</a></li>
                       
                    </ul>
                    <div class="nav-right"><a href="signup" class="nav-btn">Free Sign Up</a></div>
                </div>
            </nav>
        </div>
    </div>
</header>
