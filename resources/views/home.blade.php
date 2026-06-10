<!DOCTYPE html>
<html>
<head>
    <title>Amazon Lily</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }


            .hero {
    min-height: 100vh;
    background-image:
        linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.45)),
        url("/images/homeb.jpg");
    background-size: cover;
    background-position: center;
    border-radius: 0;
    position: relative;
    color: white;
}
        

        .navbar-custom {
            padding: 30px 55px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
            background-color: white;
            padding: 6px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 35px;
            font-weight: bold;
            font-size: 16px;
        }

        .nav-links a:hover {
            color: #f8c8d8;
        }

        .hero-content {
            text-align: center;
            max-width: 750px;
            margin: 110px auto 0;
            padding: 20px;
        }

        .restaurant-name {
            font-size: 72px;
            font-weight: bold;
            color: #fff;
        }

        .tagline {
            font-size: 28px;
            color: #f8c8d8;
            font-weight: bold;
            margin-top: 10px;
        }

        .description {
            font-size: 18px;
            margin: 20px auto 35px;
            max-width: 620px;
            line-height: 1.6;
        }

        .btn-reservation {
            background-color: #f47f96;
            color: white;
            padding: 15px 45px;
            border-radius: 35px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-reservation:hover {
            background-color: #88a978;
            color: white;
        }

        .top-line {
            width: 80px;
            height: 4px;
            background-color: #f8c8d8;
            margin: 0 auto 25px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<section class="hero">

    <div class="navbar-custom">
        <img src="/images/logo.PNG" class="logo">

        <div class="nav-links">
            <a href="#">About Us</a>
            <a href="staffLogin">Staff Login</a>
        </div>
    </div>

    <div class="hero-content">
        <div class="top-line"></div>

        <h1 class="restaurant-name">Amazon Lily</h1>

        <div class="tagline">Experience the Culinary Excellence</div>

        <p class="description">
            Reserve your table and enjoy a warm, elegant dining experience
            surrounded by beautiful ambience, delicious food, and memorable moments.
        </p>

        <a href="reservation" class="btn-reservation">
            Make Reservation
        </a>
    </div>

</section>

</body>
</html>
