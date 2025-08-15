<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomTourController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;   

use App\Http\Controllers\Agent\CustomTourController as AgentCustomTourController;
use App\Http\Controllers\Agent\BookingController as AgentBookingController;   

use App\Http\Controllers\PackagePublicController;
use App\Http\Controllers\BookingController;

use App\Models\Package;
use App\Models\Destination;

/*
|--------------------------------------------------------------------------
| Public pages
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'))->name('welcome');
Route::get('/privacy-policy', fn () => view('privacypolicy'))->name('privacy.policy');
Route::get('/terms-conditions', fn () => view('termscondition'))->name('terms.conditions');

/*
|--------------------------------------------------------------------------
| Authenticated dashboard redirect
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user?->hasRole('Admin'))        return redirect('/admin/dashboard');
    if ($user?->hasRole('Travel Agent')) return redirect('/agent/dashboard');
    if ($user?->hasRole('Customer'))     return redirect('/customer/dashboard');
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Packages
    Route::get('/admin/packages',                [PackageController::class, 'index'])->name('admin.packages.index');
    Route::get('/admin/packages/create',         [PackageController::class, 'create'])->name('admin.packages.create');
    Route::post('/admin/packages',               [PackageController::class, 'store'])->name('admin.packages.store');
    Route::get('/admin/packages/{package}/edit', [PackageController::class, 'edit'])->name('admin.packages.edit');
    Route::put('/admin/packages/{package}',      [PackageController::class, 'update'])->name('admin.packages.update');
    Route::delete('/admin/packages/{package}',   [PackageController::class, 'destroy'])->name('admin.packages.destroy');

    // Bookings (NEW)
    Route::get('/admin/bookings',                         [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/admin/bookings/{booking}',               [AdminBookingController::class, 'show'])->name('admin.bookings.show')->whereNumber('booking');
    Route::post('/admin/bookings/{booking}/approve',      [AdminBookingController::class, 'approve'])->name('admin.bookings.approve')->whereNumber('booking');
    Route::post('/admin/bookings/{booking}/reject',       [AdminBookingController::class, 'reject'])->name('admin.bookings.reject')->whereNumber('booking');
});

/*
|--------------------------------------------------------------------------
| Travel Agent
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:Travel Agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentCustomTourController::class, 'dashboard'])
        ->name('agent.dashboard');

    // Agent: Custom Tours
    Route::get('/agent/custom-tours',                    [AgentCustomTourController::class, 'index'])->name('agent.custom_tours.index');
    Route::get('/agent/custom-tours/{customTour}',       [AgentCustomTourController::class, 'show'])->name('agent.custom_tours.show')->whereNumber('customTour');
    Route::patch('/agent/custom-tours/{customTour}/status', [AgentCustomTourController::class, 'updateStatus'])->name('agent.custom_tours.status')->whereNumber('customTour');
    Route::post('/agent/custom-tours/{customTour}/email',   [AgentCustomTourController::class, 'sendEmail'])->name('agent.custom_tours.email')->whereNumber('customTour');

    // Agent: Bookings (NEW)
    Route::get('/agent/bookings', [AgentBookingController::class, 'index'])->name('agent.bookings.index');
});

/*
|--------------------------------------------------------------------------
| Customer area
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:Customer'])->group(function () {
    Route::get('/customer/dashboard', fn () => view('customer.dashboard'))->name('customer.dashboard');

    Route::get('/customer/custom-tours', fn () => view('customer.customtours'))->name('customer.custom.tours');
    Route::get('/customer/aboutus',     fn () => view('customer.aboutus'))->name('customer.aboutus');
    Route::get('/customer/contact-us',  fn () => view('customer.contactus'))->name('customer.contact-us');

    Route::get('/customer/destination', function () {
        $packages = Package::where('status', 'active')
            ->orderBy('display_order')
            ->orderByDesc('is_bestseller')
            ->orderByDesc('is_featured')
            ->get();

        $destinations = Destination::select('id', 'name')->orderBy('name')->get();

        return view('customer.destination', compact('packages', 'destinations'));
    })->name('customer.destination');
});

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::post('/customer/contact-us',   [ContactController::class,   'store'])->name('contact.submit');
Route::post('/customer/custom-tours', [CustomTourController::class,'store'])->name('customer.custom.tours.submit');

Route::get('/packages/{package}', [PackagePublicController::class, 'show'])
    ->name('packages.show')
    ->whereNumber('package');

/*
|--------------------------------------------------------------------------
| Checkout (Stripe)
|--------------------------------------------------------------------------
*/
Route::prefix('checkout')->name('checkout.')->group(function () {
    // AJAX endpoints
    Route::post('create-intent', [BookingController::class, 'createIntent'])->name('create-intent');
    Route::post('verify',        [BookingController::class, 'verify'])->name('verify');

    // Back-compat alias for old JS that calls route('checkout.intent')
    Route::post('intent',        [BookingController::class, 'createIntent'])->name('intent');

    // Pages using {booking}
    Route::get('success/{booking}', [BookingController::class, 'success'])
        ->name('success')->whereNumber('booking');

    Route::get('cancel', [BookingController::class, 'cancel'])->name('cancel');

    // Invoice download (PDF)
    Route::get('invoice/{booking}', [BookingController::class, 'downloadInvoice'])
        ->name('invoice')->whereNumber('booking');

    // Must be last: the package checkout page
    Route::get('{package}', [BookingController::class, 'show'])
        ->name('show')->whereNumber('package');
});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',[ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
