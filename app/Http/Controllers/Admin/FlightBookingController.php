<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlightBooking;
use Illuminate\Http\Request;

class FlightBookingController extends Controller
{
    // Display list of bookings
    public function index()
    {
        $bookings = FlightBooking::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    // Show form to create booking
    public function create()
    {
        return view('bookings.create');
    }

    // Store new booking
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'passenger_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'flight_number' => 'required|string|max:50',
            'departure_date' => 'required|date|after_or_equal:today',
            'origin' => 'required|string|max:100',
            'destination' => 'required|string|max:100',
        ]);

        FlightBooking::create($validated);

        return redirect()->route('bookings.index')->with('success', 'Flight booking created successfully.');
    }

    // Show booking (optional)
    public function show(FlightBooking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    // Edit booking form (optional)
    public function edit(FlightBooking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    // Update booking (optional)
    public function update(Request $request, FlightBooking $booking)
    {
        $validated = $request->validate([
            'passenger_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'flight_number' => 'required|string|max:50',
            'departure_date' => 'required|date|after_or_equal:today',
            'origin' => 'required|string|max:100',
            'destination' => 'required|string|max:100',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Flight booking updated successfully.');
    }

    // Delete booking (optional)
    public function destroy(FlightBooking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Flight booking deleted successfully.');
    }
}