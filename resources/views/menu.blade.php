<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Zestiamo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .menu-header {
            background-color: #5E3A12;
            color: #fff;
            padding: 15px 0;
        }
        .menu-header a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            margin-right: 15px;
        }
        .menu-item {
            background-color: #222;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        .menu-item:hover {
            transform: scale(1.02);
        }
        .menu-item img {
            border-radius: 8px;
            max-width: 100%;
            height: auto;
        }
        .menu-item h5 {
            margin-top: 15px;
        }
        .btn-add {
            background-color: #5E3A12;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-add:hover {
            background-color: #74491A;
        }
        footer {
            background-color: #5E3A12;
            color: #fff;
            padding: 30px 0;
        }
        footer .info {
            font-size: 14px;
        }
        .cart-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .cart-container a {
            background-color: #74491A;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }
        .cart-container a:hover {
            background-color: #5E3A12;
        }
        .cart-container .badge {
            background-color: #ff9800;
            color: #000;
            font-weight: bold;
            margin-left: 10px;
            padding: 5px 10px;
            border-radius: 12px;
        }

        .avatar-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .avatar-section img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>

    <!-- Menu Header -->
    <header class="menu-header">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Menu</h1>
            <div class="cart-container">
                <a href="{{ route('home.show') }}">Home</a>
                <a href="#">Menu</a>
                <a href="{{ route('contact.show') }}">Contact</a>
                <a href="{{ route('resto.viewOrder') }}" class="btn">
                    <span>View Order</span>
                    <span class="badge">{{ $cartCount }}</span>
                </a>

                @if(Auth::check())
                    <!-- Display avatar if user is logged in -->
                    <div class="avatar-section">
                        <img src="{{ Auth::user()->avatar ?? '/images/guest.png' }}" alt="Avatar">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                @else
                    <!-- Display login button if user is not logged in -->
                    <a href="{{ route('login') }}" class="btn btn-light btn-sm">Log In</a>
                @endif
            </div>
        </div>
    </header>

    <!-- Menu Section -->
    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <!-- Loop through menu items -->
            @foreach($menuItems as $item)
            <div class="col-md-6 col-lg-4">
                <div class="menu-item">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                    <h5>{{ $item['name'] }}</h5>
                    <p>Rp. {{ number_format($item['price'], 0, ',', '.') }}</p>
                    <p>{{ $item['description'] }}</p>
                    <form action="{{ route('resto.addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{ $item['name'] }}">
                        <input type="hidden" name="price" value="{{ $item['price'] }}">
                        <button type="submit" class="btn-add">Add</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="margin-right: 50px">
                <p style="margin: 0; font-style: italic; font-size: 12px; font-family: 'Homemade Apple', cursive;">Italian Cuisine</p>
                <h3 style="font-family: 'Kaisei Decol', serif; margin-bottom: 5px; font-size: 26px;">Zestíamo</h3>
            </div>
            <div style="display: flex; gap: 70px; font-size: 16px;">
                <p style="margin-bottom: 0;">Jl. Hang Tuah Raya No. 33, Kebayoran Baru, Jakarta Selatan</p>
                <p style="margin-bottom: 0;">Open Everyday, Monday to Sunday, 11AM Onwards.</p>
                <p style="margin-bottom: 0;">© 2024 Zestiamo. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
