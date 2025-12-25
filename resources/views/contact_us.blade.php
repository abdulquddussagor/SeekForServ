
@extends($active_theme)

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('title')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('frontend-content')

    <!--=========================
        CONTACT START
    ==========================-->
    <section class="wsus__contact mt_90 xs_mt_60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 mt_25">
                    <div class="wsus__review_input contact_input">
                        <h4>{{__('user.Feel Free to Get in Touch')}}</h4>
                        <form method="POST" action="{{ route('send-contact-message') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <fieldset>
                                        <legend>{{__('user.Name')}}*</legend>
                                        <input type="text" name="name">
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <fieldset>
                                        <legend>{{__('user.phone')}}</legend>
                                        <input type="text" name="phone">
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <fieldset>
                                        <legend>{{__('user.email')}}*</legend>
                                        <input type="email" name="email">
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <fieldset>
                                        <legend>{{__('user.subject')}}*</legend>
                                        <input type="text" name="subject">
                                    </fieldset>
                                </div>
                                <div class="col-xl-12">
                                    <fieldset>
                                        <legend>{{__('user.message')}}*</legend>
                                        <textarea name="message" rows="6"></textarea>
                                    </fieldset>
                                </div>

                                <div class="col-xl-12">
                                    <button type="submit" class="common_btn mt_20">{{__('user.Send message')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="wsus__contact_top">
                        <span><i class="fas fa-phone-alt"></i></span>
                        {!! clean(nl2br($contact->phone)) !!}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="wsus__contact_top">
                        <span><i class="fas fa-envelope"></i></span>
                        {!! clean(nl2br($contact->email)) !!}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="wsus__contact_top">
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        {!! clean(nl2br($contact->address)) !!}
                    </div>
                </div>
            </div>
        </div><br>
    </section>
    <!--=========================
        CONTACT END
    ==========================-->

@endsection
