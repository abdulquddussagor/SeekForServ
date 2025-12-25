@extends('layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('title')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection
@section('frontend-content')

    @if ($intro_visibility)
    <!--=========================
        BANNER START
    ==========================-->
    <section class="wsus__banner">
        <div class="container" style="margin-top: -200px;">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-md-12 col-lg-7">
                    <div class="wsus__banner_text">
                        <h6>{{ $intro_section->title }}</h6>
                        <h1>{{ $intro_section->header_one }} <b>{{ $intro_section->header_two }}</b></h1>
                        <p>{{ $intro_section->description }}</p>
                        <form action="{{ route('services') }}">
                            <ul class="wsus__banner_search d-flex flex-wrap">
                                <li>
                                    <select name="service_area" class="select_2">
                                        <option value="">{{__('user.Select Location')}}</option>
                                        @foreach ($service_areas as $service_area)
                                        <option value="{{ $service_area->slug }}">{{ $service_area->name }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <select name="category" class="select_2">
                                        <option value="">{{__('user.Find Categories')}}</option>
                                        @foreach ($search_categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li><button type="submit" class="common_btn">{{__('user.search')}}</button> </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-md-7 col-lg-5 m-auto">
                    <div class="wsus__banner_img">
                        <div class="img">
                            <img src="{{ asset($intro_section->image) }}" alt="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        BANNER END
    ==========================-->
    @endif

    @if ($category_section->visibility)
    <!--=========================
        CATEGORIES START
    ==========================-->
    <section class="wsus__categories mt_90 xs_mt_60" style="margin-top: -70px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="wsus__section_heading text-center mb_45">
                        <h2>{{ $category_section->title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row category_slider">
                @foreach ($categories as $category)
                    <div class="col-xl-2">
                        <div class="wsus__single_categories">
                            <span>
                                <img src="{{ asset($category->icon) }}" alt="categories" class="img-fluid w-100">
                            </span>
                            <a href="{{ route('services',['category' => $category->slug]) }}">{{ $category->name }}</a>
                            <p>{{ $category->totalService }}+ {{__('user.Services')}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><br><br>
    <!--=========================
        CATEGORIES END
    ==========================-->

    @endif

@endsection
