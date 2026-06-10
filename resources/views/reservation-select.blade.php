<!DOCTYPE html>
<html>
<head>
    <title>Amazon Lily Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #fff7f8; font-family: Arial, sans-serif; }
        .navbar { background-color: #f8c8d8; }
        .brand { font-size: 28px; font-weight: bold; color: #b95c6b; }
        .hero {
            min-height: 90vh;
            background: linear-gradient(rgba(255,247,248,0.65), rgba(240,248,232,0.75)),
            url("{{ asset('images/homeb.jpg') }}");
            background-size: cover;
            background-position: center;
            padding: 60px 0;
        }
        .reservation-card {
            background: white;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .title { color: #b95c6b; font-weight: bold; }
        .btn-main {
            background-color: #88a978;
            color: white;
            border-radius: 25px;
            padding: 12px;
            font-weight: bold;
            width: 100%;
            border: none;
        }
        .btn-main:hover { background-color: #6f8f61; color: white; }
        .side-img {
            width: 100%;
            height: 230px;
            object-fit: cover;
            border-radius: 25px;
            border: 8px solid #f8c8d8;
        }
        label { font-weight: bold; color: #555; }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <span class="brand">Amazon Lily</span>
        <div>
            <a href="{{ url('/') }}" class="btn btn-light me-2">Home</a>
            <a class="btn btn-light me-2">About Us</a>
            <a href="{{ route('reservation.select') }}" class="btn btn-success">Reservation</a>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-4">
                <img class="side-img" src="{{ asset('images/drink.jpg') }}">
            </div>

            <div class="col-md-5">
                <div class="reservation-card">
                    <h2 class="text-center title">Restaurant Reservation</h2>
                    <p class="text-center text-muted">Reserve your seat easily</p>

                    <form action="{{ route('reservation.details') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Select Date</label>
                            <input type="date" name="reservation_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Number of Guests</label>
                            <input type="number" name="guest_count" class="form-control" placeholder="Enter number of guests" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label>Available Time Slots</label>
                            <select name="reservation_time" class="form-control" required>
                                <option value="20:00">8:00 PM</option>
                                <option value="21:00">9:00 PM</option>
                                <option value="22:00">10:00 PM</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-main">
                            Make Reservation
                        </button>

                        <p class="text-center mt-3" style="color:#efbcc5;">
                            Secure your seat now!
                        </p>
                    </form>
                </div>
            </div>

            <div class="col-md-3">
                <img class="side-img mb-4" src="{{ asset('images/bar.jpg') }}">
                <img class="side-img" src="https://images.unsplash.com/photo-1551218808-94e220e084d2">
            </div>

        </div>
    </div>
</section>

</body>
</html>

