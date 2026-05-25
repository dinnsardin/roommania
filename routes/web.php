<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FacilityReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Models\Room;
use App\Models\Booking;

/*
|--------------------------------------------------------------------------
| WELCOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    if (auth()->user()->role == 'admin') {

        return view('admin.dashboard', [

            'totalRooms' => Room::count(),

            'totalBookings' => Booking::count(),

            'pendingBookings' => Booking::where('status', 'Pending')->count(),

            'approvedBookings' => Booking::where('status', 'Approved')->count(),

            'recentBookings' => Booking::latest()
                ->take(5)
                ->get(),

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | LECTURER DASHBOARD
    |--------------------------------------------------------------------------
    */

    return view('lecturer.dashboard', [

        'myBookings' => Booking::where('user_id', auth()->id())
            ->count(),

        'pendingBookings' => Booking::where('user_id', auth()->id())
            ->where('status', 'Pending')
            ->count(),

        'approvedBookings' => Booking::where('user_id', auth()->id())
            ->where('status', 'Approved')
            ->count(),

        'recentBookings' => Booking::where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get(),

    ]);

})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile',
        [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | ROOM MANAGEMENT (ADMIN)
    |--------------------------------------------------------------------------
    */

    Route::resource('rooms', RoomController::class)
        ->middleware('admin');

    /*
    |--------------------------------------------------------------------------
    | BOOKING SYSTEM
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ROOM AVAILABILITY
    |--------------------------------------------------------------------------
    */

    Route::get('/availability',
        [BookingController::class, 'availability'])
        ->name('availability');

    /*
    |--------------------------------------------------------------------------
    | CREATE BOOKING
    |--------------------------------------------------------------------------
    */

    Route::get('/bookings/create/{room}',
        [BookingController::class, 'create'])
        ->name('bookings.create');

    /*
    |--------------------------------------------------------------------------
    | STORE BOOKING
    |--------------------------------------------------------------------------
    */

    Route::post('/bookings/store',
        [BookingController::class, 'store'])
        ->name('booking.store');

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware('admin')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | ADMIN BOOKING MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::get('/admin/bookings',
            [BookingController::class, 'adminIndex'])
            ->name('admin.bookings');

        /*
        |--------------------------------------------------------------------------
        | APPROVE BOOKING
        |--------------------------------------------------------------------------
        */

        Route::patch('/admin/bookings/{booking}/approve',
            [BookingController::class, 'approve'])
            ->name('booking.approve');

        /*
        |--------------------------------------------------------------------------
        | REJECT BOOKING
        |--------------------------------------------------------------------------
        */

        Route::patch('/admin/bookings/{booking}/reject',
            [BookingController::class, 'reject'])
            ->name('booking.reject');

        /*
        |--------------------------------------------------------------------------
        | FACILITY REPORT ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/facility-reports',
            [FacilityReportController::class, 'index'])
            ->name('facility.reports');

        /*
        |--------------------------------------------------------------------------
        | UPDATE REPORT STATUS
        |--------------------------------------------------------------------------
        */

        Route::patch('/facility-report/{report}/update-status',
            [FacilityReportController::class, 'updateStatus'])
            ->name('facility.report.update.status');

    });

    /*
    |--------------------------------------------------------------------------
    | LECTURER ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware('lecturer')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | BOOKING HISTORY
        |--------------------------------------------------------------------------
        */

        Route::get('/booking-history',
            [BookingController::class, 'history'])
            ->name('booking.history');

        /*
        |--------------------------------------------------------------------------
        | CANCEL BOOKING
        |--------------------------------------------------------------------------
        */

        Route::delete('/booking/{booking}/cancel',
            [BookingController::class, 'cancel'])
            ->name('booking.cancel');

        /*
        |--------------------------------------------------------------------------
        | ROOM SCHEDULE
        |--------------------------------------------------------------------------
        */

        Route::get('/room-schedule',
            [BookingController::class, 'schedule'])
            ->name('room.schedule');

        /*
        |--------------------------------------------------------------------------
        | FACILITY REPORT
        |--------------------------------------------------------------------------
        */

        Route::get('/facility-report/create',
            [FacilityReportController::class, 'create'])
            ->name('facility.report.create');

        /*
        |--------------------------------------------------------------------------
        | STORE FACILITY REPORT
        |--------------------------------------------------------------------------
        */

        Route::post('/facility-report/store',
            [FacilityReportController::class, 'store'])
            ->name('facility.report.store');
        
        Route::delete(
    '/booking/{booking}/delete',
    [BookingController::class, 'destroy']
)->name('booking.destroy');

Route::delete(
    '/facility-report/{report}/delete',
    [FacilityReportController::class, 'destroy']
)->name('facility.report.destroy');
    });

});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';