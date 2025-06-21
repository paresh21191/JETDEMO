@extends('../admin.layout')

@section('title', 'Create Flight Booking')

@section('content')
    <h1>Create Flight Booking</h1>

    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary mb-3">Back to list</a>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    
    <form action="{{ route('admin.bookings.store') }}" method="post"  novalidate>
      @csrf
      <div class="mb-3">
        <label for="passenger_name" class="form-label">Passenger Name</label>
        <input type="text" name="passenger_name" id="passenger_name" class="form-control" value="{{ old('passenger_name') }}" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Passenger Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
      </div>

      <div class="mb-3">
        <label for="flight_number" class="form-label">Flight Number</label>
        <input type="text" name="flight_number" id="flight_number" class="form-control" value="{{ old('flight_number') }}" required>
      </div>

      <div class="mb-3">
        <label for="departure_date" class="form-label">Departure Date</label>
        <input type="date" name="departure_date" id="departure_date" class="form-control" value="{{ old('departure_date') }}" required min="{{ date('Y-m-d') }}">
      </div>

      <div class="mb-3">
        <label for="origin" class="form-label">Origin</label>
        <input type="text" name="origin" id="origin" class="form-control" value="{{ old('origin') }}" required>
      </div>

      <div class="mb-3">
        <label for="destination" class="form-label">Destination</label>
        <input type="text" name="destination" id="destination" class="form-control" value="{{ old('destination') }}" required>
      </div>

      <button class="btn btn-primary" type="submit">Save Booking</button>
    </form>
@endsection