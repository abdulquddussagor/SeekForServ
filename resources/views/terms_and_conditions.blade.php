@extends($active_theme)
@section('title')
    <title>{{__('user.Terms And Conditions')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Terms And Conditions')}}">
@endsection

@section('frontend-content')

        <!--=========================
        PRIVACY POLICY START
    ==========================-->
    <section class="wsus__pricacy_policy mt_95 xs_mt_65 mb_75 xs_mb_50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pricacy_policy_text">
                        @if ($terms_conditions)
                            {!! clean($terms_conditions) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        PRIVACY POLICY END
    ==========================-->
@endsection
