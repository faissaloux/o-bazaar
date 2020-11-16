@extends('theme2/layout') 
@section('title') 
    {{ __('add shipping ') }}
@endsection 

@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-lg-last dashboard-content">
                <h2>{{ __('Add new adress') }}  </h2>

                <form action="{{ route('shipping.update',['id' => $address->id , 'store' => $store]) }}" method='post'>
                    @csrf
                    <div class="form-group required-field">
                        <label>{{ __('Full Name ') }}</label>
                        <input type="text" class="form-control" name="given_name" value="{{ $address->given_name }}" required>
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('Street Address') }} </label>
                        <input type="text" class="form-control" name="street" value="{{ $address->street }}" required>
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('City') }} </label>
                        <input type="text" class="form-control" name="city"  value="{{ $address->city }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('Country') }}</label>
                                <div class="select-custom">
                                    <select class="form-control" name="country_code">
                                        <option value="USA">United States</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="China">China</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('State/Province') }}</label>
                                <input type="text" class="form-control" name="state"  value="{{ $address->state }}"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group required-field">
                                <label>{{ __('Zip/Postal Code ') }}</label>
                                <input type="text" class="form-control" name="postal_code" value="{{ $address->postal_code }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('Phone Number') }} </label>
                        <div class="form-control-tooltip">
                            <input type="tel" class="form-control" name="phone"  value="{{ $address->phone }}"  required>
                        </div>
                    </div>
                    <div class="checkout-steps-action">
                        <input type="submit" class="ps-btn" value="{{ __('Save Changes') }}" style="display: block; height: 50px;" />
                    </div>
                </form>

            </div>

            @include('theme2.elements.sidebar')
        </div>
    </div>

</main>

@endsection