@extends('admin.layout')

@section('title', 'Flight Bookings')

@section('content')
    <h1>Flight Bookings</h1>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Add New Booking</a>

    @if($bookings->count())
      <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Passenger Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Flight Number</th>
              <th>Departure Date</th>
              <th>Origin</th>
              <th>Destination</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookings as $booking)
              <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->passenger_name }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->phone }}</td>
                <td>{{ $booking->flight_number }}</td>
                <td>{{ $booking->departure_date }}</td>
                <td>{{ $booking->origin }}</td>
                <td>{{ $booking->destination }}</td>
                <td>
                  <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-sm btn-warning">Edit</a>

                  <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to delete this booking?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{ $bookings->links() }}

    @else
      <p>No flight bookings found.</p>
    @endif
@endsection