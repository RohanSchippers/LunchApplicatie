<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('storage/css/style.css') }}">
    <script src="//code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('storage/js/javascript.js') }}"></script>
</head>
<body>

<div class="navbar">
    <div class="navbar-left">
        <a class="hamburger" href="#">&#9776; <!-- Hamburgermenu-icoon --></a>
        <ul class="eatnjoy-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Over Ons</a></li>
            <li><a href="#">Diensten</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="navbar-logo">
        <a href="#"><img src="{{ asset('storage/images/Logo2.svg') }}" alt="Logo"></a>
    </div>
    <div class="navbar-right">
        <a href="{{ route('cart.index') }}"><img src="{{ asset('storage/images/winkelwagen.svg') }}" alt="Winkelwagen"></a>
    </div>
</div>

<!-- Lege ruimte om submenu onder de navbar te plaatsen -->
<div style="height: 60px;"></div>

<!-- Submenu -->
<div class="submenu">
    <a href="{{ route('sandwiches.index') }}">Alles</a>
    <a href="{{ route('products.category', 'brood') }}">Brood</a>
    <a href="{{ route('products.category', 'drank') }}">Drank</a>
    <a href="{{ route('products.category', 'snacks') }}">Snacks</a>
</div>



<!-- Voeg het zoekformulier toe aan je weergave -->
<div class="search-container">
    <div class="navbar-right">
        <form action="{{ route('search') }}" method="GET">
            <button type="submit" class="search-button">
                <img src="{{ asset('storage/images/vergrootglas.svg') }}" alt="Zoekbalk">
            </button>
            <input class="search-input" type="text" name="q" placeholder="Zoeken...">
        </form>
    </div>
</div>

</div>

<div class="container">

    @foreach ($broodjes as $broodje)
        <div class="product">
            <img src="{{ $broodje->product_image }}">
            <h2>{{ $broodje->productnaam }}</h2>
            <p>Prijs: €{{ $broodje->prijs }}</p>
            <button type="button" class="cart-button" data-product-id="{{ $broodje->productid }}" onclick="addToCart(this)">+</button>
            <button type="button" class="cart-button" data-product-id="{{ $broodje->productid }}" onclick="removeFromCart(this)">-</button>
        </div>
    @endforeach
</div>

<script>
    const cart = {{ Illuminate\Support\Js::from(session('cart')) }} || {};
    function addToCart(ele) {
        console.log("Adding 1 to cart with product id: " + ele.dataset.productId);
        if (cart[ele.dataset.productId] === undefined) {
            cart[ele.dataset.productId] = 0;
        }
        cart[ele.dataset.productId] += 1;

        updateCart();
    }

    function removeFromCart(ele) {
        console.log("Removing 1 from cart with product id: " + ele.dataset.productId);
        if (cart[ele.dataset.productId] !== undefined) {
            if (cart[ele.dataset.productId] > 1) {
                cart[ele.dataset.productId] -= 1;
            } else {
                delete cart[ele.dataset.productId];
            }
        }

        updateCart();
    }

    function updateCart() {
        console.log("Updating cart to backend");
        console.log(cart);

        $.post('{{ route('cart.update') }}', {cart: cart}, function (data) {
            console.log(data);
        });
    }
</script>

</body>
</html>
