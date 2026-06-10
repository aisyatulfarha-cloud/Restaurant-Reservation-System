<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmed</title>
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
        .confirm-card {
            background: rgba(255,255,255,0.95);
            border-radius: 30px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            max-width: 750px;
            margin: auto;
        }
        .title { color: #b95c6b; font-weight: bold; text-align: center; }
        .detail-section {
            background-color: #fff7f8;
            border-radius: 22px;
            padding: 22px;
            margin-top: 20px;
        }
        .section-title { color: #b95c6b; font-weight: bold; margin-bottom: 15px; }
        .info-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ead6d9;
            padding: 10px 0;
        }
        .info-label { font-weight: bold; color: #555; }
        .info-value { color: #333; text-align: right; }
        .request-box {
            background-color: white;
            border-radius: 18px;
            padding: 15px;
            margin-top: 8px;
        }
        .thank-you {
            font-size: 34px;
            color: #f47f96;
            font-weight: bold;
            text-align: center;
            margin: 25px 0;
        }
        .btn-main {
            background-color: #5d8faa;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 12px;
            width: 100%;
        }
        .btn-main:hover { background-color: #4b7890; color: white; }
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
        <div class="confirm-card">

            <h2 class="title">Reservation Confirmed!</h2>
            <p class="text-center text-muted">Your booking details are shown below.</p>

            <div class="detail-section">
                <h4 class="section-title">Reservation Details</h4>

                <div class="info-row">
                    <span class="info-label">Booking ID</span>
                    <span class="info-value">{{ $reservation->booking_id }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Date</span>
                    <span class="info-value">
                        {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('l, M d, Y') }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Guests</span>
                    <span class="info-value">{{ $reservation->guest_count }} Guests</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Time</span>
                    <span class="info-value">
                        {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A') }}
                    </span>
                </div>
            </div>

            <div class="detail-section">
                <h4 class="section-title">Customer Information</h4>

                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">{{ $reservation->full_name }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Phone Number</span>
                    <span class="info-value">{{ $reservation->phone_number }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Email Address</span>
                    <span class="info-value">{{ $reservation->email ?? '-' }}</span>
                </div>

                <div class="mt-3">
                    <span class="info-label">Special Request</span>
                    <div class="request-box">
                        {{ $reservation->special_request ?? 'No special request' }}
                    </div>
                </div>
            </div>

            <div class="thank-you">Thank you!</div>

            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-main">Edit Reservation</a>
                </div>

                <div class="col-md-6">
                    <a href="{{ route('reservation.select') }}" class="btn btn-main">Cancel Reservation</a>
                </div>
            </div>

            <p class="text-center mt-4 text-danger">
                Please save your Booking ID for reference.
            </p>

        </div>
    </div>
</section>

</body>
</html>