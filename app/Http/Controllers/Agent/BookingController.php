<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('package')
            ->where('agent_id', auth()->id())
            ->adminApproved()
            ->latest()
            ->paginate(20);

        return view('agent.bookings.index', compact('bookings'));
    }
}
