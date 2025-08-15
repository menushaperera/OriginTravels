<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\CustomTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomTourProcessingMail;

class CustomTourController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_custom_tours' => CustomTour::count(),
            'pending'            => CustomTour::where('status', 'pending')->count(),
            'in_progress'        => CustomTour::where('status', 'processing')->count(),
        ];
        $latest = CustomTour::latest()->take(6)->get();

        return view('agent.dashboard', compact('stats', 'latest'));
    }

    public function index(Request $request)
    {
        $q = CustomTour::query();
        if ($s = $request->get('search')) {
            $q->where(function ($x) use ($s) {
                $x->where('name', 'ilike', "%$s%")
                  ->orWhere('email', 'ilike', "%$s%")
                  ->orWhere('destination', 'ilike', "%$s%");
            });
        }
        if ($st = $request->get('status')) {
            $q->where('status', $st);
        }
        $tours = $q->latest()->paginate(12)->withQueryString();

        return view('agent.custom_tours.index', compact('tours'));
    }

    public function show(CustomTour $customTour)
    {
        return view('agent.custom_tours.show', compact('customTour'));
    }

    public function updateStatus(Request $request, CustomTour $customTour)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,processing,completed,cancelled'],
        ]);
        $customTour->update(['status' => $data['status']]);

        return back()->with('success', 'Status updated.');
    }

    public function sendEmail(Request $request, CustomTour $customTour)
    {
        $data = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        Mail::to($customTour->email)->send(
            new CustomTourProcessingMail($customTour, $data['subject'], $data['message'])
        );

        if ($customTour->status === 'pending') {
            $customTour->update(['status' => 'processing']);
        }

        return back()->with('success', 'Email sent to customer.');
    }
}
