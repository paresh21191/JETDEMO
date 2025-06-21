@extends('admin.layout')

@section('title', 'Flight Customer Users')

@section('content')
    <h1>Flight Customer Users</h1>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.flight_customer_users.create') }}" class="btn btn-primary mb-3">Add New Customer User</a>

    @if ($users->count())
      <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Passport Number</th>
              <th>Date of Birth</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->full_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone ?? '-' }}</td>
                <td>{{ $user->passport_number ?? '-' }}</td>
                <td>{{ \Illuminate\Support\Carbon::parse($user->date_of_birth)->format('Y-m-d') ?? '-' }}</td>

                <td>
                  <a href="{{ route('admin.flight_customer_users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>

                  <form action="{{ route('admin.flight_customer_users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete customer user?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{ $users->links() }}

    @else
      <p>No customer users found.</p>
    @endif
@endsection