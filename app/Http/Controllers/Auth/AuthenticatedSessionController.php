<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // This checks the user credentials
        $request->authenticate();

        // Create new session
        $request->session()->regenerate();

        // Get the logged in user
        $user = Auth::user();

        // Redirect based on role
        if ($user->hasRole('Admin')) {
            return redirect('/admin/dashboard');
        } elseif ($user->hasRole('Travel Agent')) {
            return redirect('/agent/dashboard');
        } elseif ($user->hasRole('Customer')) {
            return redirect('/customer/dashboard');
        }

        // Default redirect (if no role found)
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
