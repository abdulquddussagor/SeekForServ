@extends($active_theme)

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('title')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('frontend-content')

    @if ($work_visbility)
    <!--=========================
        WORK START
    ==========================-->
    <div class="wsus__work mt_90 xs_mt_60">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 m-auto">
                    <div class="wsus__section_heading text-center mb_20">
                        <h2>Know about us.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=========================
        WORK END
    ==========================-->
    @endif


    @if ($why_choose_visibility)
    <!--=========================
        ABOUT REASONS START
    ==========================-->
    <section class="wsus__about_reasons mt_100 xs_mt_70 mb_80 xs_mb_50">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xxl-5 col-xl-6 col-lg-6">
                    <div class="wsus__about_reasons_text">
                        <p>{!! clean($why_choose_us->why_choose_desciption) !!}</p>
                        <ul>
                            <li>
                                <h6>{{ $why_choose_us->item_one }}</h6>
                                <p>{{ $why_choose_us->description_one }}</p>
                            </li>

                            <li>
                                <h6>{{ $why_choose_us->item_two }}</h6>
                                <p>{{ $why_choose_us->description_two }}</p>
                            </li>

                            <li>
                                <h6>{{ $why_choose_us->item_three }}</h6>
                                <p>{{ $why_choose_us->description_three }}</p>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-5 col-lg-6">
                    <div class="wsus__about_reasons_img">
                        <img src="{{ asset($why_choose_us->background_image) }}" alt="about reasons" class="img-fluid w-100 img_1">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        ABOUT REASONS END
    ==========================-->
    @endif

@endsection
