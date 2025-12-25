@extends($active_theme)
@section('title')
    <title>{{__('user.Register')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Register')}}">
@endsection

@section('frontend-content')

    <!--=========================
        SIGN IN START
    ==========================-->
    <section class="wsus__sign_in mt_90 xs_mt_60 mb_100 xs_mb_70">
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-10 col-xxl-10 m-auto">
                    <div class="wsus__sign_in_area">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="wsus__review_input wsus__sign_in_text">
                                    <h2>Sign In To SeekForServ</h2>
                                    <p>Register with your valid data for successfully registration.</p>
                                    <form method="POST" action="{{ route('store-register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <fieldset>
                                                    <legend>{{__('user.Name')}}*</legend>
                                                    <input type="text" name="name">
                                                </fieldset>
                                            </div>
                                            <div class="col-xl-12">
                                                <fieldset>
                                                    <legend>{{__('user.Email')}}*</legend>
                                                    <input type="email" name="email">
                                                </fieldset>
                                            </div>

                                            <div class="col-xl-12">
                                                <fieldset>
                                                    <legend>{{__('user.password')}}*</legend>
                                                    <input type="password" name="password">
                                                </fieldset>
                                            </div>

                                            <div class="col-xl-12">
                                                <button type="submit" class="common_btn mt_20 w-100">{{__('user.Create Account')}}</button>
                                            </div>
                                        </div>
                                    </form>

                                    <p class="create_account">
                                        {{__('user.Already have an account ?')}}
                                        <a href="{{ route('login') }}">{{__('user.Login')}}</a>
                                    </p>

                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                                <div class="wsus__sign_in_img">
                                    <img src="{{ asset($login_page->image) }}" alt="login" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGN IN END
    ==========================-->
@endsection
