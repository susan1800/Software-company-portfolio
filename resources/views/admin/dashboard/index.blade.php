@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <a href="{{route('admin.settings')}}">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-gear fa-3x"></i>
                <div class="info">
                    <h4>Settings</h4>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{route('admin.homes.index')}}">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-home fa-3x"></i>
                <div class="info">
                    <h4>Home page details</h4>

                </div>
            </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{route('admin.categories.index')}}">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-tags fa-3x"></i>
                <div class="info">
                    <h4>Categories</h4>

                </div>
            </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{route('admin.abouts.index')}}">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-address-book fa-3x"></i>
                <div class="info">
                    <h4>About</h4>

                </div>
            </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{route('admin.services.index')}}">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-server fa-3x"></i>
                <div class="info">
                    <h4>Service</h4>

                </div>
            </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{route('admin.team.index')}}">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Team</h4>

                </div>
            </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{route('admin.portfolio.index')}}">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-rss fa-3x"></i>
                <div class="info">
                    <h4>Portfolio</h4>

                </div>
            </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{route('admin.blogs.index')}}">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-book fa-3x"></i>
                <div class="info">
                    <h4>Blog</h4>

                </div>
            </div>
            </a>
        </div>



        {{-- <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Uploades</h4>
                    <p><b>10</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Stars</h4>
                    <p><b>500</b></p>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
