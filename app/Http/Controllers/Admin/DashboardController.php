<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Package;
use App\Models\Destination;

class DashboardController extends Controller
{
    public function index()
    {
        $year = now()->year;

        // Top-level stats (adjust “role()” if you use a different roles system)
        $stats = [
            'total_customers'    => User::role('Customer')->count(),
            'active_customers'   => User::role('Customer')->whereNotNull('email_verified_at')->count(),
            'total_agents'       => User::role('Travel Agent')->count(),
            'active_agents'      => User::role('Travel Agent')->whereNotNull('email_verified_at')->count(),
            'total_packages'     => Package::count(),
            'featured_packages'  => Package::where('is_featured', true)->count(),
            'total_destinations' => Destination::count(),
            'recent_customers'   => User::role('Customer')->latest()->take(5)->get(),
            'recent_agents'      => User::role('Travel Agent')->latest()->take(5)->get(),
        ];

        // PostgreSQL/Supabase monthly grouping
        $rawMonth = "DATE_PART('month', created_at)::int";

        $customersByMonth = User::role('Customer')
            ->selectRaw("$rawMonth AS m, COUNT(*) AS c")
            ->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()])
            ->groupBy('m')
            ->orderBy('m')
            ->pluck('c', 'm'); // [1 => 5, 2 => 3, ...]

        // Fill missing months with zeros (12 points for the chart)
        $monthlyCustomers = collect(range(1, 12))
            ->mapWithKeys(fn ($m) => [$m => (int)($customersByMonth[$m] ?? 0)]);

        // If you don't have revenue yet, keep zeros
        $monthlyRevenue = collect(range(1, 12))
            ->mapWithKeys(fn ($m) => [$m => 0]);

        return view('admin.dashboard', compact('stats', 'monthlyCustomers', 'monthlyRevenue'));
    }
}
