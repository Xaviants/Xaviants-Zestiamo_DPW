<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takeaway Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .form-container {
            background-color: #222;
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
        }
        .btn {
            background-color: #5E3A12;
            color: #fff;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #74491A;
        }
        .navbar {
            background-color: #5E3A12;
        }
        .navbar .avatar-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar .avatar-section img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('resto.menu') }}" class="btn btn-sm">Menu</a>
            <h1 class="h4">Takeaway Order</h1>
            <div class="d-flex">
                @if(Auth::check())
                    <div class="navbar-nav avatar-section">
                        <img src="{{ Auth::user()->avatar ?? '/images/guest.png' }}" alt="Avatar">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm">Log In</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Form Section -->
    <div class="container py-5">
        <div class="form-container">
            <h2 class="mb-4">Takeaway Order</h2>
            <form action="{{ route('takeaway.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="mb-3">
                    <label for="pickup_location" class="form-label">Pickup Location</label>
                    <textarea class="form-control" id="pickup_location" name="pickup_location" rows="3" placeholder="Enter pickup location" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select class="form-select" id="payment_method" name="payment_method" required>
                        <option value="Cash">Cash</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="E-Wallet">E-Wallet</option>
                    </select>
                </div>
                <button type="submit" class="btn w-100">Submit</button>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
