<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function select()
    {
        return view('reservation-select');
    }

    public function details(Request $request)
    {
        $request->validate([
            'reservation_date' => 'required|date',
            'guest_count' => 'required|integer|min:1',
            'reservation_time' => 'required',
        ]);

        return view('reservation-details', [
            'reservation_date' => $request->reservation_date,
            'guest_count' => $request->guest_count,
            'reservation_time' => $request->reservation_time,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'guest_count' => 'required|integer|min:1',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email',
            'special_request' => 'nullable|string',
        ]);

        $reservation = Reservation::create([
            'booking_id' => 'ALR' . rand(10000, 99999),
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'guest_count' => $request->guest_count,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'special_request' => $request->special_request,
            'status' => 'Pending',
        ]);

        return redirect()->route('reservation.confirmation', $reservation->id);
    }

    public function confirmation(Reservation $reservation)
    {
        return view('reservation-confirmation', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservation-edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email',
            'special_request' => 'nullable|string',
        ]);

        $reservation->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'special_request' => $request->special_request,
        ]);

        return redirect()->route('reservation.confirmation', $reservation->id);
    }

    public function dashboard(Request $request)
    {
        $reservations = Reservation::query();

        if ($request->search) {
            $reservations->where(function ($query) use ($request) {
                $query->where('booking_id', 'like', '%' . $request->search . '%')
                    ->orWhere('full_name', 'like', '%' . $request->search . '%')
                    ->orWhere('phone_number', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->from_date) {
            $reservations->whereDate('reservation_date', '>=', $request->from_date);
        }

        if ($request->to_date) {
            $reservations->whereDate('reservation_date', '<=', $request->to_date);
        }

        if ($request->reservation_time && $request->reservation_time != 'all') {
            $reservations->where('reservation_time', $request->reservation_time);
        }

        if ($request->guest_count && $request->guest_count != 'all') {
            $reservations->where('guest_count', $request->guest_count);
        }

        if ($request->status && $request->status != 'all') {
            $reservations->where('status', $request->status);
        }

        $reservations = $reservations->latest()->get();

        return view('staff-dashboard', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Arrived,Cancelled',
        ]);

        $reservation->update([
            'status' => $request->status,
        ]);

        return redirect()->route('staff.dashboard');
    }
}