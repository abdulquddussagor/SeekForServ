@php
    $setting = App\Models\Setting::select('logo','favicon','topbar_phone','topbar_email','opening_time','selected_theme','text_direction')->first();

    $menus = App\Models\MenuVisibility::all();

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">
    @yield('title')
    @yield('meta')

    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dev.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    @if ($setting->text_direction == 'rtl')
    <link rel="stylesheet" href="{{ asset('frontend/css/rtl.css') }}">
    @endif

    @include('theme_color_css')
    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('frontend/js/flatpickr.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/flatpickr.min.css') }}">

</head>

<body>

    <div id="app">
    <!--=========================
        MENU START
    ==========================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset($setting->logo) }}" alt="logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars open_m_menu"></i>
                <i class="far fa-times close_m_menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    @php
                        $menu = $menus->where('id', 1)->first();
                    @endphp

                    @if ($menu->status == 1)
                        @if ($setting->selected_theme == 0)
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ $menu->custom_name }} <i
                                        class="far fa-angle-down"></i></a>

                                <ul class="wsus__droap_menu">
                                    <li><a class="active" href="{{ route('home',['theme' => 1]) }}">{{__('user.home page 1')}}</a></li>

                                    <li><a href="{{ route('home',['theme' => 2]) }}">{{__('user.home page 2')}}</a></li>

                                    <li><a href="{{ route('home',['theme' => 3]) }}">{{__('user.home page 3')}}</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ $menu->custom_name }}</a>
                            </li>
                        @endif
                    @endif

                    @php
                        $menu = $menus->where('id', 3)->first();
                    @endphp

                    @if ($menu->status == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">{{ $menu->custom_name }}</a>
                    </li>
                    @endif

                    @php
                        $menu = $menus->where('id', 2)->first();
                    @endphp

                    
                    @if ($menu->status == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}">{{ $menu->custom_name }}</a>
                    </li>
                    @endif

                    @php
                        $menu = $menus->where('id', 4)->first();
                    @endphp

                    @if ($menu->status == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">{{ $menu->custom_name }} <i class="far fa-angle-down"></i></a>
                            <ul class="wsus__droap_menu">

                                @php
                                    $menu = $menus->where('id', 5)->first();
                                @endphp

                                @if ($menu->status == 1)
                                <li><a href="{{ route('faq') }}">{{ $menu->custom_name }}</a></li>
                                @endif

                                @php
                                    $menu = $menus->where('id', 6)->first();
                                @endphp

                                @if ($menu->status == 1)
                                <li><a href="{{ route('terms-and-conditions') }}">{{ $menu->custom_name }}</a></li>
                                @endif

                                @php
                                    $menu = $menus->where('id', 7)->first();
                                @endphp

                                @if ($menu->status == 1)
                                <li><a href="{{ route('privacy-policy') }}">{{ $menu->custom_name }}</a></li>
                                @endif

                                @php
                                    $menu = $menus->where('id', 8)->first();
                                @endphp
                                @if ($menu->status == 1)
                                    @foreach ($custom_pages as $custom_page)
                                    <li><a href="{{ route('page', $custom_page->slug) }}">{{ $custom_page->page_name }}</a></li>
                                    @endforeach
                                @endif

                            </ul>
                        </li>
                    @endif

                    @php
                        $menu = $menus->where('id', 9)->first();
                    @endphp

                    @if ($menu->status == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs') }}">{{ $menu->custom_name }}</a>
                    </li>
                    @endif

                    @php
                        $menu = $menus->where('id', 10)->first();
                    @endphp

                    @if ($menu->status == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-us') }}">{{ $menu->custom_name }}</a>
                    </li>
                    @endif
                </ul>
                <ul class="wsus__right_menu d-flex flex-wrap">
                    <li></li>
                    <li><a href="{{ route('join-as-a-provider') }}">Become a Provider</a></li>
                    <li><a href="{{ route('dashboard') }}"><i class="fas fa-user"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--=========================
        MENU END
    ==========================-->

    @yield('frontend-content')


    <!--=========================
        FOOTER START
    ==========================-->

@php
    $setting = App\Models\Setting::select('logo','footer_logo','default_avatar')->first();
    $footer_informations = App\Models\Footer::select('email','phone','address','copyright','payment_image','about_us','first_column','second_column')->first();
    
@endphp
    <footer style="margin-bottom: 0;">
        <br>
        <div class="container pt_100 xs_pt_70">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-md-6">
                    <div class="wsus__footer_content">
                        <a class="footer_logo" href="{{ route('home') }}">
                            <img src="{{ asset($setting->footer_logo) }}" alt="logo" class="img-fluid w-100">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                <div class="wsus__footer_content m-0 p-0 border-0">
                        <ul class="footer_contact">
                            <li>
                                    <a href="callto:{{ $footer_informations->phone }}"><i class="fas fa-phone-alt"></i> {{ $footer_informations->phone }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                <div class="wsus__footer_content m-0 p-0 border-0">
                        <ul class="footer_contact">
                            <li>
                                <a href="mailto:{{ $footer_informations->email }}"><i class="fas fa-envelope"></i>
                                    {{ $footer_informations->email }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="wsus__footer_content m-0 p-0 border-0">
                        <ul class="footer_contact">
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i> {{ $footer_informations->address }}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="wsus__footer_bottom mt_100 xs_mt_70">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wsus__footer_bottom_content d-flex justify-content-center align-items-center">
                            <p>{{ $footer_informations->copyright }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--=========================
        FOOTER END
    ==========================-->


</div>

    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!-- select js -->
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <!-- counter up js -->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!-- calender js -->
    <script src="{{ asset('frontend/js/jquery.calendar.js') }}"></script>
    <!-- sticky sidebar -->
    <script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap-datepicker.min.js') }}"></script>
    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="{{ asset('toastr/toastr.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
    @endif

</body>

</html>

