<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Your Order - Zestiamo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #5E3A12;
            padding: 15px 0;
        }
        .header a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            margin-right: 15px;
        }
        .order-item {
            border-bottom: 1px solid #444;
            padding: 15px 0;
        }
        .notes {
            background-color: #5E3A12;
            border: none;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            width: 100%;
        }
        .total-payment {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .btn {
            background-color: #5E3A12;
            color: #fff;
            border: none;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #74491A;
            color: #fff;
        }
        .footer {
            background-color: #5E3A12;
            color: #fff;
            padding: 20px 0;
            margin-top: 50px;
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

    <!-- Header -->
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('resto.menu') }}" class="btn btn-sm">Menu</a>
            <h1 class="h4">Check Your Order</h1>
            <div>
                <a href="{{ route('home.show') }}">Home</a>
                <a href="{{ route('resto.menu') }}">Menu</a>
                <a href="{{ route('contact.show') }}">Contact</a>

            </div>
            @if(Auth::check())
                <!-- Display avatar if user is logged in -->
                <div class="avatar-section">
                    <img src="{{ Auth::user()->avatar ?? '/images/guest.png' }}" alt="Avatar">
                    <span>{{ Auth::user()->name }}</span>
                </div>
            @else
                <!-- Display login button if user is not logged in -->
                <a href="{{ route('login') }}" class="btn btn-sm">Log In</a>
            @endif
        </div>
    </header>

    <!-- Order Section -->
    <div class="container py-5">
        <h2 class="mb-4">CHECK YOUR ORDER</h2>
        @if($cartItems->isEmpty())
            <p>Your cart is empty. Please order the dish first. Go to <a href="{{ route('resto.menu') }}">Menu</a></p>
        @else
            <div class="order-list">
                @foreach($cartItems as $item)
                <div class="order-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="/images/{{ strtolower(str_replace(' ', '_', $item->name)) }}.jpg" alt="{{ $item->name }}" style="width: 100px; height: auto; border-radius: 8px; margin-right: 20px;">
                        <div>
                            <h5>{{ $item->name }}</h5>
                            <p>Rp. {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- Increase Quantity -->
                        <form action="{{ route('resto.updateQuantity', $item->id) }}" method="POST" class="me-2">
                            @csrf
                            <input type="hidden" name="action" value="increase">
                            <button type="submit" class="btn btn-sm">+</button>
                        </form>
                        <!-- Quantity Display -->
                        <span>{{ $item->quantity }}</span>
                        <!-- Decrease Quantity -->
                        <form action="{{ route('resto.updateQuantity', $item->id) }}" method="POST" class="ms-2">
                            @csrf
                            <input type="hidden" name="action" value="decrease">
                            <button type="submit" class="btn btn-sm">-</button>
                        </form>
                        <!-- Remove Item -->
                        <form action="{{ route('resto.removeFromCart', $item->id) }}" method="POST" class="ms-2">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <!-- Notes Section for each item -->
                <div class="mt-3">
                    <form action="{{ route('resto.updateNotes', $item->id) }}" method="POST">
                        @csrf
                        <div>
                            <label for="notes_{{ $item->id }}" class="form-label">Notes for {{ $item->name }}:</label>
                            <textarea id="notes_{{ $item->id }}" name="notes" class="notes" rows="3" placeholder="Leave your notes here ...">{{ $item->notes }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-sm mt-2">Save Notes</button>
                    </form>
                </div>
                @endforeach
            </div>

            <!-- Total, Reserve Table, and Save -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="total-payment">TOTAL PAYMENT: Rp. {{ number_format($totalPayment, 0, ',', '.') }}</div>
                <div>
                    <!-- Reserve Table -->
                    <form action="{{ route('reservations.create') }}" method="GET" class="d-inline">
                        <button type="submit" class="btn">Reserve Table</button>
                    </form>
                    <!-- Takeaway -->
                    <form action="{{ route('takeaway.create') }}" method="GET" class="d-inline">
                        <button type="submit" class="btn">Takeaway</button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer style="background-color: #5E3A12; color: #fff; padding: 40px 0; font-family: 'Arial', sans-serif;">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Left section for 'Zestíamo' and 'Italian Cuisine' -->
            <div style="margin-right: 50px">
                <p style="margin: 0; font-style: italic; font-size: 12px; font-family: 'Homemade Apple', cursive;">Italian Cuisine</p>
                <h3 style="font-family: 'Kaisei Decol', serif; margin-bottom: 5px; font-size: 26px;">Zestíamo</h3>
            </div>
        
            <!-- Right section for address and other information -->
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
