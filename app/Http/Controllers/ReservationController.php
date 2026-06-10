<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * 1. index() - Read: View Availability
     * Handles date and guest count criteria to dynamically filter and return available slots.
     */
    public function index(Request $request)
    {
        $query = Reservation::query();

        if ($request->has('reservation_date')) {
            $query->where('reservation_date', $request->query('reservation_date'));
        }

        if ($request->has('guest_count')) {
            $query->where('guest_count', '<=', $request->query('guest_count'));
        }

        $availableSlots = $query->get();

        return view('customer.index', compact('availableSlots'));
    }

    /**
     * 2. create() - Read: Form View
     * Returns the structured booking form view once a preferred time slot is chosen.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * 3. store() - Create: Finalize Booking
     * Validates the incoming payload data, binds them to the chosen slot, and saves to database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name'    => 'required|string|max:300',
            'contact_info'     => 'required|string',
            'reservation_date' => 'required|date',
            'time_slot'        => 'required',
            'guest_count'      => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);

        // Default reservation status for new submissions
        $validated['status'] = 'Confirmed';

        // Record entry to the database
        Reservation::create($validated);

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation finalized successfully!');
    }

    /**
     * 4. destroy() - Delete: Cancel Reservation
     * Allows customers to remove or change their reservation status to "Cancelled".
     */
    public function delete($id)
    {
        $reservation = Reservation::findOrFail($id);
        
        $reservation->delete();

        return redirect()->route('reservations.index')
                         ->with('success', 'Your reservation has been successfully cancelled.');
    }
}
use App\Http\Controllers\ReservationController;

// Customer Reservation CRUD Routes
Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/{id}', [ReservationController::class, 'show'])->name('reservation.show');
Route::get('/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::put('/reservation/{id}', [ReservationController::class, 'update'])->name('reservation.update');
Route::delete('/reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Defines fields that are safe to be mass-assigned during CRUD storage actions
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'reservation_date',
        'reservation_time',
        'guest_count',
        'special_requests',
        'status',   // Added to track states like 'Pending' or 'Confirmed'
        'table_id'  // Foreign key mapping to physical table layouts
    ];

    // Establish the relationship back to a physical table profile
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}