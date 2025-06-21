<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlightCustomerUser;
use Illuminate\Http\Request;

class FlightCustomerUserController extends Controller
{
    public function index()
    {
        $users = FlightCustomerUser::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.flight_customer_users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.flight_customer_users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:flight_customer_users,email',
            'phone'            => 'nullable|string|max:20',
            'passport_number'  => 'nullable|string|max:100',
            'date_of_birth'    => 'nullable|date|before:today',
        ]);

        FlightCustomerUser::create($validated);

        return redirect()->route('admin.flight_customer_users.index')->with('success', 'Customer user created successfully.');
    }

    public function show(FlightCustomerUser $flightCustomerUser)
    {
        return view('admin.flight_customer_users.show', compact('flightCustomerUser'));
    }

    public function edit(FlightCustomerUser $flightCustomerUser)
    {
        return view('admin.flight_customer_users.edit', compact('flightCustomerUser'));
    }

    public function update(Request $request, FlightCustomerUser $flightCustomerUser)
    {
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:flight_customer_users,email,' . $flightCustomerUser->id,
            'phone'            => 'nullable|string|max:20',
            'passport_number'  => 'nullable|string|max:100',
            'date_of_birth'    => 'nullable|date|before:today',
        ]);

        $flightCustomerUser->update($validated);

        return redirect()->route('admin.flight_customer_users.index')->with('success', 'Customer user updated successfully.');
    }

    public function destroy(FlightCustomerUser $flightCustomerUser)
    {
        $flightCustomerUser->delete();

        return redirect()->route('admin.flight_customer_users.index')->with('success', 'Customer user deleted successfully.');
    }
}