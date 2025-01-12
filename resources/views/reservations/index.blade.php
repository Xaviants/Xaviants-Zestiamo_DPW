<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - Zestiamo</title>
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
        .table {
            background-color: #222;
            color: #fff;
        }
        .btn {
            background-color: #5E3A12;
            color: #fff;
            border: none;
        }
        .btn:hover {
            background-color: #74491A;
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
            <h1 class="h4">Reservations</h1>
            <div>
                <a href="{{ route('reservations.create') }}" class="btn btn-sm">Add New Reservation</a>
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

    <!-- Reservation Table -->
    <div class="container py-5">
        <h2 class="mb-4">All Reservations</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Table Number</th>
                    <th>Payment Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $reservation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->table_number }}</td>
                        <td>{{ $reservation->payment_method }}</td>
                        <td>
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-sm">Edit</a>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <a href="{{ route('reservations.finish', $reservation->id) }}" class="btn btn-sm btn-success">Finish Reservation</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No reservations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
