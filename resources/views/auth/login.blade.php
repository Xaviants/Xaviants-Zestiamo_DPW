<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
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

        .btn-login {
            background-color: #2F271E;
            color: white;
            border: none;
        }

        .btn-login:hover {
            background-color: #555;
            color: white;
        }

        .btn-signup {
            background-color: #2F271E;
            color: #ffffff;
            border: 2px solid #333;
        }

        .btn-signup:hover {
            background-color: #333;
            color: white;
        }

        .btn-link {
            background: none;
            border: none;
            padding: 0;
            color: #2F271E;
            font-weight: bold;
            font-size: 1rem;
            text-decoration: underline;
            cursor: pointer;
        }

        .btn-link:hover {
            color: #555;
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
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
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
        <h2>LOGIN</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-start">
                        <form action="{{ route('login.submit') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Username">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>

                            <!-- Updated Buttons -->
                            <div class="text-left mt-3">
                                <p>You don't have an account? 
                                    <button type="button" class="btn-link" onclick="location.href='register'">Sign Up</button>
                                </p>
                                <button type="button" class="btn-link" onclick="location.href='forgotPassword'">Forgot Password?</button>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-custom btn-login">Login</button>
                            </div>
                        </form>

                        @if (@session('failed')) 
                            <p class="text-danger mt-3">{{ session('failed') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
