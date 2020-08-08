@extends('layouts.master')

@section('title', 'Laravel Shopping Cart')

@section('content')

    <div class="cart-show">

        <div class="container mt-3">

            <div class="row">

                <div class="col-8 offset-2">

                    <h1>Checkout</h1>

                    {{-- <form action="{{ url('checkout') }}" method="POST">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ env('STRIPE_PUB_KEY') }}"
                            data-amount="{{ $totalPrice * 100 }}"
                            data-name="Stripe Demo"
                            data-description="Stripe payment"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-currency="usd">
                        </script>

                    </form> --}}

                    <strong>TotalPrice: ${{ $totalPrice }}</strong>

                    <div id="charge-error" class="alert alert-danger" {{ !Session::has('error') ? 'hidden' : '' }}>{{ Session::get('error') }}</div>

                    <form action="{{ url('checkout') }}" method="POST" class="mt-2">
                    
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="card_holder_name">Card Holder Name</label>
                            <input type="text" id="card_holder_name" name="card_holder_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="credit_card_number">Credit Card Number</label>
                            <input type="text" id="credit_card_number" name="credit_card_number" class="form-control" required>
                        </div>

                        <div class="form-inline">
                            <div class="form-group mb-2">
                                <label for="expiration_month" class="d-inline-block mr-2">Expiration Month</label>
                                <input type="text" class="form-control" id="expiration_month" required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="expiration_year" class="d-inline-block mr-2">Expiration Year</label>
                                <input type="text" class="form-control" id="expiration_year" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cvc">CVC</label>
                            <input type="text" class="form-control" id="cvc" required>
                        </div>

                        <input type="submit" class="btn btn-success" value="Buy">

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('script')

    <script src="https://js.stripe.com/v3/"></script>
    {{-- <script src="{{ asset('js/checkout.js') }}"></script> --}}

@endsection