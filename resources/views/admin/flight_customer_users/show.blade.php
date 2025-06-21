@extends('admin.layout')

@section('title', 'Flight Customer User Details')

@section('content')
    <h1>Customer User Details</h1>

    <a href="{{ route('admin.flight_customer_users.index') }}" class="btn btn-secondary mb-3">Back to list</a>

    <table class="table table-bordered">
      <tr>
        <th>ID</th><td>{{ $flightCustomerUser->id }}</td>
      </tr>
      <tr>
        <th>Full Name</th><td>{{ $flightCustomerUser->full_name }}</td>
      </tr>
      <tr>
        <th>Email</th><td>{{ $flightCustomerUser->email }}</td>
      </tr>
      <tr>
        <th>Phone</th><td>{{ $flightCustomerUser->phone ?? '-' }}</td>
      </tr>
      <tr>
        <th>Passport Number</th><td>{{ $flightCustomerUser->passport_number ?? '-' }}</td>
      </tr>
      <tr>
        <th>Date of Birth</th><td>{{ $flightCustomerUser->date_of_birth?->format('Y-m-d') ?? '-' }}</td>
      </tr>
      <tr>
        <th>Created At</th><td>{{ $flightCustomerUser->created_at->format('Y-m-d H:i') }}</td>
      </tr>
      <tr>
        <th>Updated At</th><td>{{ $flightCustomerUser->updated_at->format('Y-m-d H:i') }}</td>
      </tr>
    </table>
@endsection