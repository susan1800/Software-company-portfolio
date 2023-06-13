<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings.index' ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                <i class="app-menu__icon fa fa-gear "></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.homes.index' ? 'active' : '' }}" href="{{ route('admin.homes.index') }}">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Home</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}"
               href="{{ route('admin.categories.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.abouts.index' ? 'active' : '' }}" href="{{ route('admin.abouts.index') }}">
                <i class="app-menu__icon fa fa-address-book"></i>
                <span class="app-menu__label">About Us</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.services.index' ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                <i class="app-menu__icon fa fa-server"></i>
                <span class="app-menu__label">Services</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.testimonial.index' ? 'active' : '' }}" href="{{ route('admin.testimonial.index') }}">
                <i class="app-menu__icon fa fa-android"></i>
                <span class="app-menu__label">Testimonials</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.team.index' ? 'active' : '' }}" href="{{ route('admin.team.index') }}">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Our Teams</span>
            </a>
        </li>



        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.blogs.index' ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">Blogs</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.portfolio.index' ? 'active' : '' }}" href="{{ route('admin.portfolio.index') }}">
                <i class="app-menu__icon fa fa-rss"></i>
                <span class="app-menu__label">Portfolio</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.subscription.index' ? 'active' : '' }}" href="{{ route('admin.subscription.index') }}">
                <i class="app-menu__icon fa fa-list"></i>
                <span class="app-menu__label">subscription</span>
            </a>
        </li>
        {{-- <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">user</span>
            </a>
        </li> --}}
        {{-- <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.companyicons.index' ? 'active' : '' }}" href="{{ route('admin.companyicons.index') }}">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">CompanyIcon</span>
            </a>
        </li> --}}
        {{-- <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.companyfacts.index' ? 'active' : '' }}" href="{{ route('admin.companyfacts.index') }}">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">CompanyFact</span>
            </a>
        </li> --}}
        {{-- <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.screens.index' ? 'active' : '' }}" href="{{ route('admin.screens.index') }}">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">Screen</span>
            </a>
        </li> --}}
        {{-- <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.generalinformations.index' ? 'active' : '' }}" href="{{ route('admin.generalinformations.index') }}">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">GeneralInformation</span>
            </a>
        </li> --}}

    </ul>
</aside>
