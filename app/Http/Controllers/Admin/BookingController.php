<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingApprovedMail;
use App\Mail\BookingAssignedToAgentMail;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status'); // new|approved|rejected|null
        $query  = Booking::with(['package','user','agent'])->latest();
        if ($status) $query->where('admin_status', $status);

        $bookings = $query->paginate(20);
        // include phone here
        $agents   = User::role('Travel Agent')->orderBy('name')->get(['id','name','email','phone']);

        return view('admin.bookings.index', compact('bookings','agents','status'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['package','user','agent']);
        // include phone here
        $agents = User::role('Travel Agent')->orderBy('name')->get(['id','name','email','phone']);
        return view('admin.bookings.show', compact('booking','agents'));
    }

    public function approve(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'agent_id'    => 'nullable|exists:users,id',
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        if (!empty($data['agent_id'])) {
            abort_unless(User::find($data['agent_id'])?->hasRole('Travel Agent'), 422, 'Selected user is not a Travel Agent');
        }

        $booking->update([
            'agent_id'     => $data['agent_id'] ?? $booking->agent_id,
            'admin_status' => Booking::ADMIN_APPROVED,
            'approved_at'  => now(),
            'admin_notes'  => $data['admin_notes'] ?? null,
        ]);
        $booking->load('agent','package');

        Mail::to($booking->customer_email)->send(new BookingApprovedMail($booking));

        if ($booking->agent) {
            Mail::to($booking->agent->email)->send(new BookingAssignedToAgentMail($booking));
        }

        return redirect()->route('admin.bookings.show', $booking)
            ->with('success', 'Booking approved and notifications sent.');
    }

    public function reject(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        $booking->update([
            'admin_status' => Booking::ADMIN_REJECTED,
            'rejected_at'  => now(),
            'admin_notes'  => $data['admin_notes'] ?? null,
        ]);

        return redirect()->route('admin.bookings.show', $booking)
            ->with('success', 'Booking rejected.');
    }
}
