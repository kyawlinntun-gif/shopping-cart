@extends('layouts.master')

@section('title', 'Laravel Shopping Cart')

@section('content')

    <div class="shopping-index">

        <div class="container">

            @include('messages.success.success')

            <h1>Laravel Shopping Cart</h1>

            @foreach($products->chunk(3) as $productChunk)

                <div class="row mt-3">

                    @foreach($productChunk as $product)

                        <div class="col-sm-6 col-md-4">

                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('img/'. $product->imgPath) }}" class="card-img-top img-thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">
                                        {{ $product->description }}
                                    </p>
                                    <div class="clearfix">
                                        <div class="float-left font-weight-bold">$ {{ $product->price }}</div>
                                        <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-success float-right">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                    @endforeach

                </div>

            @endforeach

        </div>

    </div>

@endsection