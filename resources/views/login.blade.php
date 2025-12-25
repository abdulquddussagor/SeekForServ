@extends($active_theme)
@section('title')
    <title>{{__('user.Login')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Login')}}">
@endsection

@section('frontend-content')

    <!--=========================
        SIGN IN START
    ==========================-->
    <section class="wsus__sign_in mt_90 xs_mt_60 mb_100 xs_mb_70">
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-10 col-xxl-10 m-auto">
                    <div class="wsus__sign_in_area">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="wsus__review_input wsus__sign_in_text">
                                    <h2>Log In to SeekForServ</h2>
                                    <p>Welcome back!</p>
                                    <form action="{{ route('store-login') }}" method="POST">
                                        @csrf
                                        <div class="row">
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
                                                <div class="wsus__login_check d-flex flex-wrap mt_20">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="remember" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            {{__('user.Remeber Me')}}
                                                        </label>
                                                    </div>
                                                    <a href="{{ route('forget-password') }}">{{__('user.Forget Password ?')}}</a>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <button type="submit" class="common_btn mt_20 w-100">{{__('user.log in')}}</button>
                                            </div>
                                        </div>
                                    </form>

                                    <p class="create_account">
                                        {{__('user.Dont’t have an account ?')}}
                                        <a href="{{ route('register') }}">{{__('user.Create Account')}}</a>
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

    <!--=========================
        2FA ENABLE/DISABLE FORM
    ==========================-->
    @if (Auth::check()) <!-- Check if user is authenticated -->
    <section class="wsus__2fa-form">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-10 col-xxl-10 m-auto">
                    <div class="wsus__2fa-form-area">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="wsus__review_input">
                                    <h2>{{__('user.Two-Factor Authentication')}}</h2>
                                    @if (Auth::user()->google2fa_secret)
                                        <p>{{__('user.2FA is enabled for your account.')}}</p>
                                        <form action="{{ route('disable-2fa') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="common_btn mt_20">{{__('user.Disable 2FA')}}</button>
                                        </form>
                                    @else
                                        <p>{{__('user.2FA is not enabled for your account.')}}</p>
                                        <form action="{{ route('enable-2fa') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="common_btn mt_20">{{__('user.Enable 2FA')}}</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif <!-- End authentication check -->
    <!--=========================
        2FA ENABLE/DISABLE FORM END
    ==========================-->
@endsection
