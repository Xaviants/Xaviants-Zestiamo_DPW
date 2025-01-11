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
        .footer {
            background-color: #5E3A12;
            color: #fff;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>
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
    <footer class="footer">
        <div class="container text-center">
            <p><strong>Zestiamo</strong></p>
            <p>Jl. Hang Tuah Raya No. 33, Kebayoran Baru, Jakarta Selatan</p>
            <p>Open Everyday, Monday to Sunday 11AM Onwards.</p>
            <p>&copy; 2024 Zestiamo. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
