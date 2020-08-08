@extends('layouts.master')

@section('title', 'User Profile')

@section('content')

    <div class="profiles-index">
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">
                    <h1>User Profile</h1>
                    <hr>
                    <h3>My Orders</h3>
                    @foreach ($orders as $order)
                        <div class="card mt-2">
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($order->cart->items as $item)
                                        <li class="list-group-item">
                                            {{ $item['item']['name'] }} | {{ $item['qty'] }} Units
                                            <span class="badge badge-pill badge-primary float-right">${{ $item['price'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer">
                                <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection