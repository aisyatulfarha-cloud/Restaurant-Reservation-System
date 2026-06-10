<!DOCTYPE html>
<html>
<head>
    <title>Staff Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(rgba(255,247,248,0.85), rgba(240,248,232,0.9)),
            url("{{ asset('images/homeb.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
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

        .dashboard-card {
            background: rgba(255,255,255,0.95);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            margin-top: 40px;
        }

        .title {
            color: #b95c6b;
            font-weight: bold;
        }

        .filter-box {
            background-color: #f0f7ed;
            border-radius: 25px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .form-control, .form-select {
            border-radius: 20px;
            border: none;
            background-color: #eeeeee;
            padding: 10px;
        }

        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .btn-filter {
            background-color: #88a978;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 10px 25px;
            border: none;
        }

        .btn-filter:hover {
            background-color: #6f8f61;
            color: white;
        }

        .btn-reset {
            background-color: #f47f96;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 10px 25px;
            text-decoration: none;
        }

        .table {
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
        }

        thead {
            background-color: #f8c8d8;
            color: #6b3b35;
        }

        th, td {
            vertical-align: middle;
            font-size: 14px;
        }

        .status-select {
            border-radius: 20px;
            border: none;
            padding: 7px 10px;
            color: white;
            font-weight: bold;
        }

        .Pending {
            background-color: #d9b63f;
        }

        .Confirmed {
            background-color: #6f9b7b;
        }

        .Arrived {
            background-color: #5d8faa;
        }

        .Cancelled {
            background-color: #b95454;
        }

        .btn-update {
            background-color: #5d8faa;
            color: white;
            border-radius: 20px;
            font-weight: bold;
            border: none;
            padding: 7px 14px;
        }

        .btn-update:hover {
            background-color: #4b7890;
            color: white;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <span class="brand">Amazon Lily</span>

        <div>
            <a href="{{ url('/') }}" class="btn btn-light me-2">Home</a>
            <a href="{{ route('reservation.select') }}" class="btn btn-light me-2">Reservation</a>
            <a href="{{ url('/') }}" class="btn btn-success">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="dashboard-card">

        <h2 class="title text-center mb-4">Reservation Dashboard</h2>

        <div class="filter-box">
            <form action="{{ route('staff.dashboard') }}" method="GET">

                <div class="mb-3">
                    <label>Search Reservation</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Search by guest name, phone number, or booking ID"
                           value="{{ request('search') }}">
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control"
                               value="{{ request('from_date') }}">
                    </div>

                    <div class="col-md-3">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control"
                               value="{{ request('to_date') }}">
                    </div>

                    <div class="col-md-2">
                        <label>Time Slot</label>
                        <select name="reservation_time" class="form-select">
                            <option value="all">All</option>
                            <option value="20:00" {{ request('reservation_time') == '20:00' ? 'selected' : '' }}>8:00 PM</option>
                            <option value="21:00" {{ request('reservation_time') == '21:00' ? 'selected' : '' }}>9:00 PM</option>
                            <option value="22:00" {{ request('reservation_time') == '22:00' ? 'selected' : '' }}>10:00 PM</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label>Guests</label>
                        <select name="guest_count" class="form-select">
                            <option value="all">Any</option>
                            <option value="1" {{ request('guest_count') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ request('guest_count') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ request('guest_count') == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ request('guest_count') == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ request('guest_count') == '5' ? 'selected' : '' }}>5</option>
                            <option value="6" {{ request('guest_count') == '6' ? 'selected' : '' }}>6</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="all">All</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Confirmed" {{ request('status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="Arrived" {{ request('status') == 'Arrived' ? 'selected' : '' }}>Arrived</option>
                            <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-filter">Apply Filter</button>
                    <a href="{{ route('staff.dashboard') }}" class="btn-reset ms-2">Reset</a>
                </div>

            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Date / Time</th>
                        <th>Guest Name</th>
                        <th>Contact</th>
                        <th>Guests</th>
                        <th>Special Request</th>
                        <th>Status</th>
                        <th>Update</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->booking_id }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y') }}
                                <br>
                                {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A') }}
                            </td>

                            <td>{{ $reservation->full_name }}</td>
                            <td>{{ $reservation->phone_number }}</td>
                            <td>{{ $reservation->guest_count }}</td>
                            <td>{{ $reservation->special_request ?? '-' }}</td>

                            <td>
                                <form action="{{ route('staff.reservation.status', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <select name="status" class="status-select {{ $reservation->status }}">
                                        <option value="Pending" {{ $reservation->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Confirmed" {{ $reservation->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="Arrived" {{ $reservation->status == 'Arrived' ? 'selected' : '' }}>Arrived</option>
                                        <option value="Cancelled" {{ $reservation->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                            </td>

                            <td>
                                    <button type="submit" class="btn-update">Save</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-muted">
                                No reservations found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

</body>
</html>