@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Payment Methods')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Payment Methods')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
            </div>
          </div>

        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">


                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link active" id="paypal-tab" data-toggle="tab" href="#paypalTab" role="tab" aria-controls="paypalTab" aria-selected="true">{{__('admin.Paypal')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="stripe-tab" data-toggle="tab" href="#stripeTab" role="tab" aria-controls="stripeTab" aria-selected="true">{{__('admin.Stripe')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="razorpay-tab" data-toggle="tab" href="#razorpayTab" role="tab" aria-controls="razorpayTab" aria-selected="true">{{__('admin.Razorpay')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="flutterwave-tab" data-toggle="tab" href="#flutterwaveTab" role="tab" aria-controls="flutterwaveTab" aria-selected="true">{{__('admin.Flutterwave')}}</a>
                                        </li>



                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="mollie-tab" data-toggle="tab" href="#mollieTab" role="tab" aria-controls="mollieTab" aria-selected="true">{{__('admin.Mollie')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="pay-stack-tab" data-toggle="tab" href="#payStackTab" role="tab" aria-controls="payStackTab" aria-selected="true">{{__('admin.PayStack')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="instamojo-tab" data-toggle="tab" href="#instamojoTab" role="tab" aria-controls="instamojoTab" aria-selected="true">{{__('admin.Instamojo')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="bank-account-tab" data-toggle="tab" href="#bankAccountTab" role="tab" aria-controls="bankAccountTab" aria-selected="true">{{__('admin.Bank Account')}}</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9">
                                    <div class="border rounded">
                                        <div class="tab-content no-padding" id="settingsContent">



                                            <div class="tab-pane fade" id="razorpayTab" role="tabpanel" aria-labelledby="razorpay-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-razorpay') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Razorpay Status')}}</label>
                                                                <div>
                                                                    @if ($razorpay->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('admin.Enable')}}" data-off="{{__('admin.Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('admin.Enable')}}" data-off="{{__('admin.Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Razorpay Key')}}</label>
                                                                <input type="text" class="form-control" name="razorpay_key" value="{{ $razorpay->key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Razorpay Secret Key')}}</label>
                                                                <input type="text" class="form-control" name="razorpay_secret" value="{{ $razorpay->secret_key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Name')}}</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $razorpay->name }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Description')}}</label>
                                                                <input type="text" class="form-control" name="description" value="{{ $razorpay->description }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Country Name')}}</label>
                                                                <select name="country_name" id="" class="form-control select2">
                                                                    <option value="">{{__('admin.Select Country')}}
                                                                  </option>
                                                                  <option {{ $razorpay->country_code == "BD" }}
                                                                  </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Currency Name')}}</label>
                                                                <select name="currency_name" id="" class="form-control select2">
                                                                    <option value="">{{__('admin.Select Currency')}}
                                                                  </option>
                                                                  <option {{ $razorpay->currency_code == "BDT" }}
                                                                  </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Currency Rate')}} ({{__('admin.per')}})</label>
                                                                <input type="text" class="form-control" name="currency_rate" value="{{ $razorpay->currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Current Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($razorpay->image) }}" width="200px" alt="">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.New Image')}}</label>
                                                                <input type="file" class="form-control-file" name="image">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Theme Color')}}</label>
                                                                <input type="color" value="{{ $razorpay->color }}" class="form-control" name="theme_color">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('admin.Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="tab-pane fade" id="bankAccountTab" role="tabpanel" aria-labelledby="bank-account-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-bank') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Bank Payment Status')}}</label>
                                                                <div>
                                                                    @if ($bank->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('admin.Enable')}}" data-off="{{__('admin.Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('admin.Enable')}}" data-off="{{__('admin.Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Account Information')}}</label>
                                                                <textarea name="account_info" id="" cols="30" rows="10" class="text-area-5 form-control">{{ $bank->account_info }}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Existing Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($bank->image) }}" alt="" class="w_200">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('admin.Existing Image')}}</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('admin.Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
      </div>

      <script>
        function changeCashOnDeliveryStatus(id){
            var isDemo = "{{ env('APP_MODE') }}"
            if(isDemo == 'DEMO'){
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }
            $.ajax({
                type:"put",
                data: { _token : '{{ csrf_token() }}' },
                url: "{{ route('admin.update-cash-on-delivery') }}",
                success:function(response){
                    toastr.success(response)
                },
                error:function(err){


                }
            })
        }
    </script>
@endsection
