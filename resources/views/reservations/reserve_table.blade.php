<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - Zestiamo</title>

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
        .form-container {
            background-color: #222;
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
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
            <h1 class="h4">Reserve Table</h1>
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

    <!-- Reservation Form -->
    <div class="container py-5">
        <div class="form-container">
            <h2 class="mb-4">Insert Your Data</h2>
            <form action="{{ route('reservations.store') }}" method="POST">
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
                    <label for="table_number" class="form-label">Table Number</label>
                    <input type="number" class="form-control" id="table_number" name="table_number" placeholder="Enter your desired table number" required>
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
