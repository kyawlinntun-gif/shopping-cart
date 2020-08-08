@extends('layouts.master')

@section('title', 'Laravel Shopping Cart')

@section('content')

    <div class="cart-show">

        <div class="container">

            @if(Session::has('cart'))

                <div class="row">

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="col-6 offset-3">
                        
                        <ul class="list-group">

                            @foreach ($products as $product)

                                <li class="list-group-item">{{ $product['item']['name'] }} <span class="badge badge-success">{{ $product['price'] }}</span> 
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Reduce by 1</a>
                                            <a class="dropdown-item" href="#">Reduce by all</a>
                                        </div>
                                    </div>
                                    <span class="badge badge-pill badge-secondary float-right">{{ $product['qty'] }}</span></li>
                                {{-- {{ dd($product) }} --}}
                                
                            @endforeach

                        </ul>

                        <strong class="mt-4 d-block">Total: ${{ $totalPrice }}</strong>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-6 offset-3">

                        {{-- <a href="{{ url('checkout') }}" class="btn btn-success">Checkout</a> --}}

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-danger">Please login to checkout!</a>
                        @endguest

                        @auth

                            <form action="{{ url('checkout') }}" method="POST">
                                @csrf
                                <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ env('STRIPE_PUB_KEY') }}"
                                    data-amount="{{ $totalPrice * 100 }}"
                                    data-name="Stripe Demo"
                                    data-description="Stripe payment"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto"
                                    data-currency="usd"
                                    data-name="***"
                                    data-billing-address="true">
                                </script>
        
                            </form>
                            
                        @endauth

                    </div>

                </div>

            @else

                <h1>No items in Cart</h1>

            @endif

        </div>

    </div>

@endsection

@section('script')

    <script src="https://js.stripe.com/v3/"></script>
    {{-- <script src="{{ asset('js/checkout.js') }}"></script> --}}

@endsection