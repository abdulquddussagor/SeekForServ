@extends($active_theme)
@section('title')
    <title>{{__('user.Forget Password')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Forget Password')}}">
@endsection

@section('frontend-content')

        <!--=========================
        SIGN IN START
    ==========================-->
    <section class="wsus__sign_in mt_90 xs_mt_60 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6 m-auto">
                    <div class="wsus__sign_in_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="wsus__review_input wsus__sign_in_text">
                                    <h2>{{__('user.Forget Your Password ?')}}</h2>
                                    <p>Did you forget your password ?</p>
                                    <form method="POST" action="{{ route('send-forget-password') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <fieldset>
                                                    <legend>{{__('user.Email')}}*</legend>
                                                    <input type="email" name="email">
                                                </fieldset>
                                            </div>
                                            
                                            <div class="col-xl-12">
                                                <button type="submit" class="common_btn mt_20 w-100">{{__('user.Send Reset Link')}}</button>
                                            </div>
                                        </div>
                                    </form>

                                    <p class="create_account">
                                        {{__('user.Already have an account ?')}}
                                        <a href="{{ route('login') }}">{{__('user.Login')}}</a>
                                    </p>

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
