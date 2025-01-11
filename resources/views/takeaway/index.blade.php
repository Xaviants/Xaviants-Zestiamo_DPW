<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takeaway Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .table-container {
            background-color: #222;
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
        }
        .btn {
            background-color: #5E3A12;
            color: #fff;
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
    <div class="container py-5">
        <h2>Takeaway Orders</h2>
        <div class="table-container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Pickup Location</th>
                        <th>Payment Method</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($takeaways as $takeaway)
                    <tr>
                        <td>{{ $takeaway->name }}</td>
                        <td>{{ $takeaway->phone }}</td>
                        <td>{{ $takeaway->pickup_location }}</td>
                        <td>{{ $takeaway->payment_method }}</td>
                        <td>
                            <a href="{{ route('takeaway.edit', $takeaway->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('takeaway.destroy', $takeaway->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer Section -->
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

</body>
</html>
