<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/bg_auth.png');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            position: relative;
            min-height: 100vh;
            z-index: 0;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: white;
        }

        .btn-custom {
            background-color: #2F271E;
            color: white;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Zestiamo</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="text-center mt-5 pt-5">
        <h2>RESET YOUR PASSWORD</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <!-- Pesan Sukses -->
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Pesan Error -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" 
                                   placeholder="Enter your email" value="{{ old('email') }}" required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="New Password" required>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="show-new-password" 
                                       onclick="document.getElementById('password').type = this.checked ? 'text' : 'password'">
                                <label class="form-check-label" for="show-new-password">Show New Password</label>
                            </div>
                        </div>
                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="show-confirm-password" 
                                       onclick="document.getElementById('password_confirmation').type = this.checked ? 'text' : 'password'">
                                <label class="form-check-label" for="show-confirm-password">Show Confirm Password</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
