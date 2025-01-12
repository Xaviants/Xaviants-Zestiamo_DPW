<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zestiamo - Italian Cuisine</title>

    <!-- Import Fonts from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Homemade+Apple&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Preloader Styles */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        #preloader span {
            font-size: 1.5rem;
            color: #fff;
            font-family: 'Kaisei Decol', serif;
            animation: blink 1s infinite;
        }
        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        /* Hide preloader after animation ends */
        body.loaded #preloader {
            display: none;
        }

        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #fff;
            background-color: #000;
            overflow-x: hidden;
        }

        .navbar {
            position: sticky;   
            top: 0;
            z-index: 1000;
        }

        .header {
            position: relative;
            height: 100vh;
            background: url('/images/bgpasta.jpg') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .subtitle {
            font-size: 2.7rem;
            margin: 0 0 10px;
            font-family: 'Homemade Apple', cursive;
            color: #fff;
            z-index: 5;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            animation: fadeInUp 2s ease-out;
        }

        .header h1 {
            font-size: 7rem;
            margin: 10px 0 0;
            line-height: 1.2;
            z-index: 2;
            font-family: 'Kaisei Decol', serif;
            letter-spacing: 2px;
            font-weight: 599;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
            animation: fadeInUp 2s ease-out 0.5s;
        }

        .header p {
            font-size: 1.2rem;
            margin: 20px 0;
            max-width: 600px;
            z-index: 2;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            animation: fadeInUp 2s ease-out 1s;
        }

        .view-menu-btn {
            background-color: #fff;
            color: #000;
            padding: 12px 25px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            transition: all 0.3s;
            z-index: 2;
        }

        .view-menu-btn:hover {
            background-color: #e0e0e0;
            color: #333;
            transform: scale(1.05);
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #carouselExampleIndicators {
            margin-top: 50px;
            margin-bottom: 200px;
        }

        footer {
            background-color: #5E3A12;
            color: #fff;
            padding: 30px 0;
        }
        footer .info {
            font-size: 14px;
        }

        .carousel-inner img {
            width: 18%;
            height: auto;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
        }

        .logout-section {
            margin-top: 20px;
        }

        .logout-section button {
            font-size: 14px;
        }

        /* Styling for user info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            justify-content: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .user-info h3 {
            margin: 0;
            font-family: 'Homemade Apple', cursive;
            color: #fff;
            font-size: 1.2rem;
        }

        .logout-section {
            margin-left: 20px;
        }

        .logout-section button {
            font-size: 14px;
            padding: 6px 15px;
            border-radius: 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
        }

        .logout-section button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body class="loaded">
    <!-- Preloader -->
    <div id="preloader">
        <span>Loading...</span>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Zestiamo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('resto.menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
                    </li>

                    @if(Auth::check())
                        <li class="nav-item user-info">
                            <!-- Menampilkan avatar bulat jika pengguna sudah login -->
                            <a class="nav-link" href="#">
                                <img src="{{ Auth::user()->avatar ?? '/images/guest.png' }}" alt="Avatar">
                            </a>
                            <h3>Benvenuto, {{ Auth::user()->name }}</h3>
                            <div class="logout-section">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Logout</button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <!-- Tombol login jika pengguna belum login -->
                            <a class="btn btn-light btn-sm" href="{{ route('login') }}">Log In</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="header">
        <div class="overlay"></div>
        <p class="subtitle">Italian Cuisine</p>
        <h1 style="font-family: 'Kaisei Decol', serif; font-weight: 599;">Zestiamo</h1>
        <p>A Zestiamo, crediamo che il cibo italiano sia un'esperienza da vivere. Ogni piatto è preparato con amore e passione per portarti il vero sapore dell'Italia.</p>
        <a href="menu" class="view-menu-btn">View Menu</a>
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
