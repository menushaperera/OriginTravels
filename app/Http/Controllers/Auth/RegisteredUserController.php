<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate common fields
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'regex:/^\+?[1-9]\d{1,14}$/', 'unique:users,phone'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'in:Customer,Travel Agent'],
        ]);

        // Extra validation for Travel Agent
        if ($request->role === 'Travel Agent') {
            $request->validate([
                'iataNum' => ['required', 'string', 'max:50'],
            ]);
        }

        // Create new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],      // <-- IMPORTANT
            'password' => Hash::make($request->password),
            'iataNum' => $request->role === 'Travel Agent' ? $request->iataNum : null,
        ]);

        // Assign the selected role
        $user->assignRole($request->role);

        // Trigger the registered event
        event(new Registered($user));

        // Log the new user in
        Auth::login($user);

        // Redirect based on user role
        if ($user->hasRole('Admin')) {
            return redirect('/admin/dashboard');
        } elseif ($user->hasRole('Travel Agent')) {
            return redirect('/agent/dashboard');
        } elseif ($user->hasRole('Customer')) {
            return redirect('/customer/dashboard');
        }

        // Default fallback
        return redirect('/');
    }
}
