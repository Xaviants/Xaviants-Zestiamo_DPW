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
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('resto.menu') }}" class="btn btn-sm">Menu</a>
            <h1 class="h4">Check Your Order</h1>
            <div>
                <a href="home">Home</a>
                <a href="menu">Menu</a>
                <a href="contact">Contact</a>
                <a href="login" class="btn btn-sm">Log In</a>
            </div>
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
                @endforeach
            </div>

            <!-- Notes Section -->
            <div class="mt-4">
                <label for="notes" class="form-label">NOTES:</label>
                <textarea id="notes" class="notes" rows="3" placeholder="Leave your notes here ..."></textarea>
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
    <footer class="footer">
        <div class="container text-center">
            <p><strong>Zestiamo</strong></p>
            <p>Jl. Hang Tuah Raya No. 33, Kebayoran Baru, Jakarta Selatan</p>
            <p>Open Everyday, Monday to Sunday 11AM Onwards.</p>
            <p>&copy; 2024 Zestiamo. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
