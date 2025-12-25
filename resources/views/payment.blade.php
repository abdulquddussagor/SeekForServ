@extends($active_theme)
@section('title')
    <title>{{ $service->name }}</title>
    <title>{{ $service->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $service->seo_description }}">
@endsection

@section('frontend-content')

    <!--=========================
        BOOKING CONFIRM START
    ==========================-->
    <section class="wsus__booking_confirm mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="wsus__booking_area">
                        <ul class="booking_bar d-flex flex-wrap">
                            <li class="active">1 <span>{{__('user.Service')}}</span></li>
                            <li class="active">2 <span>{{__('user.Information')}}</span></li>
                            <li class="active">3 <span>{{__('user.Confirmation')}}</span></li>
                        </ul>
                        <div class="wsus__booking_img">
                            <img src="{{ asset($service->image) }}" alt="booking images" class="img-fluid w-100">
                        </div>
                        <div class="wsus__service_booking">
                            <h3>{{__('user.Booking Information')}}</h3>
                            <p><span>{{__('user.Name')}}:</span> {{ html_decode($customer->name) }}</p>
                            <p><span>{{__('user.Email')}}:</span> {{ html_decode($customer->email) }}</p>
                            <p><span>{{__('user.Phone')}}:</span> {{ html_decode($customer->phone) }}</p>
                            <p><span>{{__('user.Address')}}:</span> {{ html_decode($customer->address) }}</p>
                            <p><span>{{__('user.Date')}}:</span> {{ $extra_services->date }}</p>
                            <p><span>{{__('user.Post Code')}}:</span> {{ html_decode($customer->post_code) }}</p>
                            <p><span>{{__('user.Order Note')}}:</span> {{ html_decode($customer->order_note) }}</p>
                        </div>
                    </div><br>

                    <div style="color:#ff9238;">Choose your payment method!</div>

                    <ul class="wsus__booking_payment d-flex flex-wrap">

                        @if ($razorpay->status == 1)
                            <li>
                                <a href="javascript:;" >
                                    <img id="razorpayBtn" src="{{ asset($razorpay->image) }}" alt="payment img" class="img-fluid w-100">
                                </a>
                            </li>

                            <form action="{{ route('pay-with-razorpay', $service->slug) }}" method="POST" class="d-none">
                                @csrf
                                
                                    <!-- $payable_amount = ($total_price - $coupon_discount) * $razorpay->currency_rate;
                                    $payable_amount = round($payable_amount, 2); -->
                                @php
                                    $payable_amount = $total_price;
                                @endphp
                                <script src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"
                                        data-key="{{ $razorpay->key }}"
                                        data-currency="{{ $razorpay->currency_code }}"
                                        data-amount= "{{ $payable_amount }}"
                                        data-buttontext="{{__('user.Pay')}} {{ $payable_amount }} {{ $razorpay->currency_code }}"
                                        data-name="{{ $razorpay->name }}"
                                        data-description="{{ $razorpay->description }}"
                                        data-image="{{ asset($razorpay->image) }}"
                                        data-prefill.name=""
                                        data-prefill.email=""
                                        data-theme.color="{{ $razorpay->color }}">
                                </script>
                            </form>
                        @endif

                        @if ($bankPayment->status == 1)
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#bankPayment">
                                    <img src="{{ asset($bankPayment->image) }}" alt="payment img" class="img-fluid w-100">
                                </a>
                            </li>
                        @endif


                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="wsus__sidebar" id="sticky_sidebar">
                        <div class="wsus__booking_summery m-0">
                            <h3>{{__('user.Booking Summery')}}</h3>
                            <div class="wsus__booking_cost">
                                <p>{{__('user.Package Fee')}} <span>{{ $currency_icon->icon }}{{ $service->price }}</span></p>
                                <ul>
                                    @if ($extra_services->ids)
                                        @foreach ($extra_services->ids as $index => $id)
                                            <li>
                                                <p>{{ $extra_services->names[$index] }} <b>x{{ $extra_services->quantities[$index] }}</b></p> <span>{{ $currency_icon->icon }}{{ $extra_services->prices[$index] }}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <h4>{{__('user.Extra Service')}} <span>{{ $currency_icon->icon }}{{ $extra_services->extra_total }}</span></h4>
                                <p>{{__('user.Subtotal')}} <span>{{ $currency_icon->icon }}{{ $extra_services->sub_total }}</span></p>
                                <h5>{{__('user.Total')}} <span>{{ $currency_icon->icon }}{{ $extra_services->total }}</span></h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        BOOKING CONFIRM END
    ==========================-->

    {{-- start COD payment modal --}}
    <div class="wsus__payment_modal modal fade" id="bankPayment" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="bankPaymentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bankPaymentLabel">Payment Methods</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('bank-payment', $service->slug) }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <textarea cols="3" rows="3" name="tnx_info"  placeholder="Enter your payment method. (Cash On Delivery)"></textarea>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('user.Close')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('user.Submit')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end COD payment --}}


    {{-- start Bkash payment --}}
    <script type="text/javascript" src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script>
<script>
    $(function() {

        $("#razorpayBtn").on("click", function(){
            $.ajax({
                type: 'get',
                url: "{{ url('check-schedule-during-payment') }}" + "/" + "{{ $service->slug }}",
                success: function (response) {
                    if(response.is_available){
                        $(".razorpay-payment-button").click();
                    }else{
                        toastr.error(response.message);
                        window.location.href = "{{ route('ready-to-booking', $service->slug) }}";
                    }
                },
                error: function(err) {}
            });
        })
    });
</script>
    {{-- end Bkash payment --}}

@endsection
