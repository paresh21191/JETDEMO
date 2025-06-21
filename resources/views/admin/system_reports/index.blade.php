@extends('admin.layout')

@section('title', 'System Reports')

@section('content')
<h1>System Reports</h1>

<div class="row">
  <div class="col-md-6 col-lg-3 mb-3">
    <div class="card text-white bg-primary">
      <div class="card-body">
        <h5 class="card-title">Total Flight Bookings</h5>
        <p class="card-text fs-2">{{ $totalBookings }}</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3 mb-3">
    <div class="card text-white bg-success">
      <div class="card-body">
        <h5 class="card-title">Total Customers</h5>
        <p class="card-text fs-2">{{ $totalCustomers }}</p>
      </div>
    </div>
  </div>
</div>

<h3 class="mt-4">Bookings & Customers - Last 7 Days</h3>
<canvas id="lineChart" width="400" height="150"></canvas>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('lineChart').getContext('2d');
  const lineChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: {!! json_encode($dateLabels) !!},
          datasets: [{
              label: 'Bookings',
              data: {!! json_encode($bookingCounts) !!},
              borderColor: 'rgba(54, 162, 235, 1)',
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              fill: true,
              tension: 0.3,
          }, {
              label: 'New Customers',
              data: {!! json_encode($customerCounts) !!},
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              fill: true,
              tension: 0.3,
          }]
      },
      options: {
          responsive: true,
          scales: {
              y: {
                  beginAtZero: true,
                  precision: 0
              }
          }
      }
  });
</script>
@endsection