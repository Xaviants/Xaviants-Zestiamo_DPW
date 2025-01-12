<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Zestiamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/bg_auth.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .thank-you-message {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }
        .thank-you-message h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .thank-you-message p {
            font-size: 18px;
        }
        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .btn-close {
            background-color: #5E3A12;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-close:hover {
            background-color: #74491A;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <img src="{{ asset('/images/guest.png') }}" alt="User Avatar" class="avatar">
        <div class="thank-you-message">
            <!-- Displaying the user's name after "THANK YOU" -->
            <h1>THANK YOU, {{ Auth::user()->name }}</h1>
            <p>Your order is being processed...</p>
        </div>
        <a href="{{ route('home.show') }}">
            <button class="btn-close"></button>
        </a>
    </div>
</body>
</html>
