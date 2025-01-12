<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('images/bg_auth.png'); /* Ganti dengan URL/path gambar Anda */
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
            background-color: rgba(0, 0, 0, 0.5); /* Overlay hitam dengan opacity 50% */
            z-index: -1;
        }

        h2 {
            font-family: 'Times New Roman', serif;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: white; /* Warna putih untuk menonjolkan teks di atas overlay */
        }

        label {
            font-weight: bold;
            font-size: 0.9rem;
        }

        .btn-custom {
            width: 48%; /* Membuat lebar tombol sama */
            font-size: 1rem;
            padding: 0.5rem;
            margin: 0.5rem;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-register {
            background-color: #2F271E;
            color: white;
            border: none;
        }

        .btn-register:hover {
            background-color: #555;
            color: white;
        }

        .btn-link {
            background: none;
            border: none;
            padding: 0;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            text-decoration: underline;
            cursor: pointer;
        }

        .btn-link:hover {
            color: #ccc;
        }

        .form-container {
            padding: 2rem;
            background-color: transparent;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        .show-password {
            color: white;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .text-options {
            text-align: left;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Zestiamo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.show') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('resto.menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="text-center mt-5 pt-5">
        <h2>REGISTER</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('register.submit') }}" method="post" class="form-container">
                    @csrf
                    <div class="mb-3">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="show-password">
                            <input type="checkbox" id="showPassword" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password'">
                            <label for="showPassword">Show Password</label>
                        </div>
                    </div>
                    
                    <!-- Updated Buttons -->
                    <div class="text-options mt-3">
                        <p>Already have an account? 
                            <button type="button" class="btn-link" onclick="location.href='login'">Login</button>
                        </p>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom btn-register">Register</button>
                    </div>
                </form>

                @if (@session('failed')) 
                    <p class="text-danger mt-3">{{ session('failed') }}</p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
