<!DOCTYPE html>
<html>
<head>
    <title>Customer Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #fff7f8; font-family: Arial, sans-serif; }
        .navbar { background-color: #f8c8d8; }
        .brand { font-size: 28px; font-weight: bold; color: #b95c6b; }
        .hero {
            min-height: 90vh;
            background: linear-gradient(rgba(255,247,248,0.75), rgba(240,248,232,0.85)),
            url("{{ asset('images/restaurant.jpg') }}");
            background-size: cover;
            background-position: center;
            padding: 40px 0;
        }
        .form-card {
            background: white;
            border-radius: 30px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            max-width: 700px;
            margin: auto;
        }
        .title { color: #b95c6b; font-weight: bold; text-align: center; }
        .summary-box {
            background-color: #f3f3f3;
            border-radius: 25px;
            padding: 15px;
            text-align: center;
            margin-bottom: 25px;
        }
        .summary-item {
            background-color: #f47f96;
            color: white;
            padding: 10px 18px;
            border-radius: 25px;
            margin: 5px;
            display: inline-block;
        }
        .form-control {
            border-radius: 20px;
            background-color: #eeeeee;
            border: none;
            padding: 12px;
        }
        label { font-weight: bold; margin-top: 10px; }
        .btn-back {
            background-color: #c9c98f;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 12px;
            border: none;
            text-align: center;
            text-decoration: none;
        }
        .btn-submit {
            background-color: #5d8faa;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 12px;
            border: none;
        }
        .btn-submit:hover, .btn-back:hover { opacity: 0.9; color: white; }
        .button-row { display: flex; gap: 20px; margin-top: 30px; }
        .button-row .btn-back { width: 35%; }
        .button-row .btn-submit { width: 65%; }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <span class="brand">Amazon Lily</span>
        <div>
            <a href="{{ url('/') }}" class="btn btn-light me-2">Home</a>
            <a href="#" class="btn btn-light me-2">About Us</a>
            <a href="{{ route('reservation.select') }}" class="btn btn-success">Reservation</a>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="form-card">

            <h2 class="title">Please Fill In</h2>

            <div class="summary-box">
                <span class="summary-item">{{ \Carbon\Carbon::parse($reservation_date)->format('l, M d, Y') }}</span>
                <span class="summary-item">{{ $guest_count }} Guests</span>
                <span class="summary-item">{{ \Carbon\Carbon::parse($reservation_time)->format('g:i A') }}</span>
            </div>

            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf

                <input type="hidden" name="reservation_date" value="{{ $reservation_date }}">
                <input type="hidden" name="guest_count" value="{{ $guest_count }}">
                <input type="hidden" name="reservation_time" value="{{ $reservation_time }}">

                <div class="row">
                    <div class="col-md-6">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" placeholder="Enter your name" required>
                    </div>

                    <div class="col-md-6">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Enter your phone number" required>
                    </div>
                </div>

                <div class="mt-3">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div>

                <div class="mt-3">
                    <label>Special Request</label>
                    <textarea name="special_request" class="form-control" rows="4" placeholder="Any dietary restrictions or special request?"></textarea>
                </div>

                <div class="button-row">
                    <a href="{{ route('reservation.select') }}" class="btn btn-back">Back</a>

                    <button type="submit" class="btn btn-submit">
                        Submit Reservation
                    </button>
                </div>

                <p class="text-center mt-3 text-danger">
                    Please ensure correct information details.
                </p>
            </form>

        </div>
    </div>
</section>

</body>
</html>