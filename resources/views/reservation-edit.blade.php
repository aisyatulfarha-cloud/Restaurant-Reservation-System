<!DOCTYPE html>

<html>
<head>
    <title>Edit Reservation Information</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #fff7f8;
        font-family: Arial, sans-serif;
    }

    .navbar {
        background-color: #f8c8d8;
    }

    .brand {
        font-size: 28px;
        font-weight: bold;
        color: #b95c6b;
    }

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

    .title {
        color: #b95c6b;
        font-weight: bold;
        text-align: center;
    }

    .notice-box {
        background-color: #f0f7ed;
        color: #55724d;
        border-radius: 20px;
        padding: 15px;
        text-align: center;
        margin-bottom: 25px;
    }

    .form-control {
        border-radius: 20px;
        background-color: #eeeeee;
        border: none;
        padding: 12px;
    }

    label {
        font-weight: bold;
        margin-top: 10px;
        color: #555;
    }

    .btn-save {
        background-color: #88a978;
        color: white;
        font-weight: bold;
        border-radius: 25px;
        padding: 12px;
        width: 100%;
        border: none;
    }

    .btn-save:hover {
        background-color: #6f8f61;
        color: white;
    }

    .btn-back {
        background-color: #f47f96;
        color: white;
        font-weight: bold;
        border-radius: 25px;
        padding: 12px;
        width: 100%;
        border: none;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-back:hover {
        color: white;
    }
</style>
```

</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <span class="brand">Amazon Lily</span>

```
    <div>
        <a href="{{ route('home') }}" class="btn btn-light me-2">Home</a>
        <a href="#" class="btn btn-light me-2">About Us</a>
        <a href="{{ route('reservation.select') }}" class="btn btn-success">Reservation</a>
    </div>
</div>
```

</nav>

<section class="hero">
    <div class="container">
        <div class="form-card">

```
        <h2 class="title">Edit Customer Information</h2>

        <div class="notice-box">
            You may update your personal information only.
            To change date, guest count, or time, please cancel and make a new reservation.
        </div>

        <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <label>Full Name</label>
                    <input type="text"
                           name="full_name"
                           class="form-control"
                           value="{{ $reservation->full_name }}"
                           required>
                </div>

                <div class="col-md-6">
                    <label>Phone Number</label>
                    <input type="text"
                           name="phone_number"
                           class="form-control"
                           value="{{ $reservation->phone_number }}"
                           required>
                </div>
            </div>

            <div class="mt-3">
                <label>Email Address</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $reservation->email }}">
            </div>

            <div class="mt-3">
                <label>Special Request</label>
                <textarea name="special_request"
                          class="form-control"
                          rows="4">{{ $reservation->special_request }}</textarea>
            </div>

            <div class="row mt-4">

                <div class="col-md-4">
                    <a href="{{ route('reservation.confirmation', $reservation->id) }}"
                       class="btn-back">
                        Back
                    </a>
                </div>

                <div class="col-md-8">
                    <button type="submit" class="btn-save">
                        Save Changes
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>
```

</section>

</body>
</html>
