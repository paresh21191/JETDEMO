@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome to your admin panel, <strong>{{ auth()->user()->name }}</strong>.</p>

    <!-- Example admin cards -->
    <div class="row">
      <div class="col-md-4">
        <div class="card text-bg-primary mb-3">
          <div class="card-header">Users</div>
          <div class="card-body">
            <h5 class="card-title">Manage Users</h5>
            <p class="card-text">View and manage registered users.</p>
            <a href="#" class="btn btn-light disabled">Coming Soon</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-bg-success mb-3">
          <div class="card-header">Settings</div>
          <div class="card-body">
            <h5 class="card-title">Admin Settings</h5>
            <p class="card-text">Configure your application settings.</p>
            <a href="#" class="btn btn-light disabled">Coming Soon</a>
          </div>
        </div>
      </div>
    </div>
@endsection