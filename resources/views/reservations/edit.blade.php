<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation - Zestiamo</title>

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
            <a href="{{ route('reservations.index') }}" class="btn btn-sm">Back to Reservations</a>
            <h1 class="h4">Edit Reservation</h1>
        </div>
    </header>

    <!-- Edit Form -->
    <div class="container py-5">
        <h2 class="mb-4">Edit Reservation</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $reservation->name }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $reservation->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="table_number" class="form-label">Table Number</label>
                <input type="number" id="table_number" name="table_number" class="form-control" value="{{ $reservation->table_number }}" required>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="Cash" {{ $reservation->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Credit Card" {{ $reservation->payment_method == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="E-Wallet" {{ $reservation->payment_method == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                </select>
            </div>
            <button type="submit" class="btn">Save Changes</button>
        </form>
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
 