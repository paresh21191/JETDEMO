@extends('admin.layout')

@section('title', 'Edit Flight Customer User')

@section('content')
    <h1>Edit Flight Customer User</h1>

    <a href="{{ route('admin.flight_customer_users.index') }}" class="btn btn-secondary mb-3">Back to list</a>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.flight_customer_users.update', $flightCustomerUser) }}" method="POST" novalidate>
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="full_name" class="form-label">Full Name *</label>
        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name', $flightCustomerUser->full_name) }}" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email *</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $flightCustomerUser->email) }}" required>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $flightCustomerUser->phone) }}">
      </div>

      <div class="mb-3">
        <label for="passport_number" class="form-label">Passport Number</label>
        <input type="text" name="passport_number" id="passport_number" class="form-control" value="{{ old('passport_number', $flightCustomerUser->passport_number) }}">
      </div>

      <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth', $flightCustomerUser->date_of_birth ? \Illuminate\Support\Carbon::parse($flightCustomerUser->date_of_birth)->format('Y-m-d') : '') }}"  max="{{ date('Y-m-d') }}">
        
      </div>

      <button class="btn btn-success" type="submit">Update Customer User</button>
    </form>
@endsection