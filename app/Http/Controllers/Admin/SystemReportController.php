<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlightBooking;
use App\Models\FlightCustomerUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemReportController extends Controller
{
    public function index()
    {
        // Total flight bookings
        $totalBookings = FlightBooking::count();

        // Total customers
        $totalCustomers = FlightCustomerUser::count();

        // Bookings last 7 days (grouped by day)
        $bookingsLast7Days = FlightBooking::select(
            DB::raw('DATE(departure_date) as date'),
            DB::raw('count(*) as total')
        )
        ->whereDate('departure_date', '>=', Carbon::now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        // Customers registered last 7 days
        $customersLast7Days = FlightCustomerUser::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
        ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        // Prepare arrays for chart (dates labels and counts)
        $dateLabels = [];
        $bookingCounts = [];
        $customerCounts = [];

        $period = collect();
        for ($i = 6; $i >= 0; $i--) {
            $period->push(Carbon::now()->subDays($i)->format('Y-m-d'));
        }

        foreach ($period as $date) {
            $dateLabels[] = $date;

            $bookingForDate = $bookingsLast7Days->firstWhere('date', $date);
            $bookingCounts[] = $bookingForDate ? $bookingForDate->total : 0;

            $customerForDate = $customersLast7Days->firstWhere('date', $date);
            $customerCounts[] = $customerForDate ? $customerForDate->total : 0;
        }

        return view('admin.system_reports.index', compact(
            'totalBookings',
            'totalCustomers',
            'dateLabels',
            'bookingCounts',
            'customerCounts'
        ));
    }
}