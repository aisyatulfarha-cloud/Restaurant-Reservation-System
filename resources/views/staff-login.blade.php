<!DOCTYPE html>
<html>
<head>
    <title>Staff Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-page {
            min-height: 100vh;
            background-image:
                linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.55)),
                url("{{ asset('images/homeb.jpg') }}");
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 430px;
            background: rgba(255, 255, 255, 0.92);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
            text-align: center;
        }

        .logo-circle {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            background-color: white;
            padding: 6px;
        }

        .title {
            color: #b95c6b;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            color: #555;
            text-align: left;
            display: block;
            margin-top: 15px;
        }

        .form-control {
            border-radius: 20px;
            background-color: #eeeeee;
            border: none;
            padding: 12px;
        }

        .btn-login {
            background-color: #88a978;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 12px;
            width: 100%;
            margin-top: 25px;
            border: none;
        }

        .btn-login:hover {
            background-color: #6f8f61;
            color: white;
        }

        .back-link {
            display: block;
            margin-top: 18px;
            color: #b95c6b;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<section class="login-page">

    <div class="login-card">

        <img src="{{ asset('images/logo.png') }}" class="logo-circle">

        <h2 class="title">Staff Login</h2>
        <p class="subtitle">Access reservation management dashboard</p>

        <form action="{{ route('staff.login.submit') }}" method="POST">
            @csrf

            <label>Staff ID / Email</label>
            <input type="text" class="form-control" placeholder="Enter staff ID or email">

            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter password">

            <button type="submit" class="btn-login">
                Login
            </button>
        </form>

        <a href="{{ route('home') }}" class="back-link">Back to Home</a>

    </div>

</section>

</body>
</html>