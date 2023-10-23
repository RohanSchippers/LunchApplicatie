@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($cartItems as $item)
        <div class="product">
            <img src="{{ $item->product_image }}">
            <h2>{{ $item->productnaam }}</h2>
            <p>Prijs: €{{ $item->prijs }}</p>
            <button class="decrement">-</button>
            <span>{{ $item->aantal }}</span>
            <button class="increment">+</button>
        </div>
    @endforeach

</div>

<div id="cart">
    <div class="cart-content">
        <h2>Shopping Cart</h2>
        <div id="cartItems"></div>
        <button id="closeCartBtn" class="close-cart" onclick="history.back()">Close</button>
    </div>
</div>
<script src="{{ asset('js/cart.js')}}"></script>
@endsection
