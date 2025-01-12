<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Takeaway - Zestiamo</title>

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
        .form-label {
            font-weight: bold;
        }
        .btn {
            background-color: #5E3A12;
            color: #fff;
            border: none;
        }
        .btn:hover {
            background-color: #74491A;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('takeaway.index') }}" class="btn btn-sm">Back to Takeaway Orders</a>
            <h1 class="h4">Edit Takeaway</h1>
        </div>
    </header>

    <!-- Edit Form -->
    <div class="container py-5">
        <h2 class="mb-4">Edit Takeaway Order</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('takeaway.update', $takeaway->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $takeaway->name }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $takeaway->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="pickup_location" class="form-label">Pickup Location</label>
                <textarea id="pickup_location" name="pickup_location" class="form-control" rows="3" required>{{ $takeaway->pickup_location }}</textarea>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="Cash" {{ $takeaway->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Credit Card" {{ $takeaway->payment_method == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="E-Wallet" {{ $takeaway->payment_method == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                </select>
            </div>
            <button type="submit" class="btn">Save Changes</button>
        </form>
    </div>

    <!-- Footer -->
    <footer style="background-color: #5E3A12; color: #fff; padding: 40px 0; font-family: 'Arial', sans-serif;">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="margin-right: 50px;">
                <p style="margin: 0; font-style: italic; font-size: 12px;">Italian Cuisine</p>
                <h3 style="margin-bottom: 5px; font-size: 26px;">Zestíamo</h3>
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
