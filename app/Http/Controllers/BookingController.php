<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ROOM AVAILABILITY
    |--------------------------------------------------------------------------
    */

    public function availability(Request $request)
    {
        $query = Room::query();

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where('room_name', 'like', '%' . $request->search . '%')

                  ->orWhere('room_id', 'like', '%' . $request->search . '%');

            });
        }

        /*
        |--------------------------------------------------------------------------
        | ROOM TYPE FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->room_type && $request->room_type != 'All') {

            $query->where('room_type', $request->room_type);
        }

        $rooms = $query->latest()->get();

        $roomTypes = Room::select('room_type')
            ->distinct()
            ->pluck('room_type');

        return view('lecturer.availability', compact(
            'rooms',
            'roomTypes'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE BOOKING
    |--------------------------------------------------------------------------
    */

    public function create(Room $room, Request $request)
    {
        $selectedDate = $request->selected_date ?? now()->format('Y-m-d');

        /*
        |--------------------------------------------------------------------------
        | GET BOOKINGS
        |--------------------------------------------------------------------------
        */

        $bookings = Booking::where('room_id', $room->id)

            ->where('booking_date', $selectedDate)

            ->whereIn('status', ['Pending', 'Approved'])

            ->get();

        /*
        |--------------------------------------------------------------------------
        | OCCUPIED SLOTS
        |--------------------------------------------------------------------------
        */

        $occupiedSlots = [];

        foreach ($bookings as $booking) {

            $slots = explode(',', $booking->booking_time);

            foreach ($slots as $slot) {

                $occupiedSlots[] = trim($slot);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | TIME SLOTS
        |--------------------------------------------------------------------------
        */

        $timeSlots = [];

        $start = strtotime('08:00');

        $end = strtotime('23:00');

        while ($start <= $end) {

            $timeSlots[] = date('H:i', $start);

            $start = strtotime('+30 minutes', $start);
        }

        return view('lecturer.bookings.create', compact(
            'room',
            'selectedDate',
            'timeSlots',
            'occupiedSlots'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE BOOKING
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
{
    $request->validate([

        'room_id' => 'required',

        'booking_date' => 'required|date',

        'time_slots' => 'required|array',

        'purpose' => 'required',

    ]);

    /*
    |--------------------------------------------------------------------------
    | SORT TIME SLOTS
    |--------------------------------------------------------------------------
    */

    $slots = $request->time_slots;

    sort($slots);

    /*
    |--------------------------------------------------------------------------
    | CHECK OVERLAP
    |--------------------------------------------------------------------------
    */

    $existingBookings = Booking::where('room_id', $request->room_id)

        ->where('booking_date', $request->booking_date)

        ->whereIn('status', ['Pending', 'Approved'])

        ->get();

    foreach ($existingBookings as $booking) {

        $bookedSlots = array_map('trim',
            explode(',', $booking->booking_time));

        foreach ($slots as $slot) {

            if (in_array($slot, $bookedSlots)) {

                return redirect()->back()

                    ->with('error',
                        'Selected time slot already booked.');
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | GENERATE BOOKING ID
    |--------------------------------------------------------------------------
    */

    $latestBooking = Booking::latest()->first();

    $number = 1;

    if ($latestBooking) {

        $lastNumber = intval(substr($latestBooking->booking_id, 2));

        $number = $lastNumber + 1;
    }

    $bookingId = 'BK' . str_pad($number, 3, '0', STR_PAD_LEFT);

    /*
    |--------------------------------------------------------------------------
    | SAVE BOOKING
    |--------------------------------------------------------------------------
    */

    Booking::create([

        'booking_id' => $bookingId,

        'user_id' => auth()->id(),

        'room_id' => $request->room_id,

        'booking_date' => $request->booking_date,

        'booking_time' => implode(',', $slots),

        'purpose' => $request->purpose,

        'status' => 'Pending',

        /*
        |--------------------------------------------------------------------------
        | OLD DATETIME SUPPORT
        |--------------------------------------------------------------------------
        */

        'start_datetime' =>
            $request->booking_date . ' ' . $slots[0],

        'end_datetime' =>
            $request->booking_date . ' ' . end($slots),

    ]);

    return redirect()

        ->route('booking.history')

        ->with('success',
            'Booking submitted successfully.');
}

    /*
    |--------------------------------------------------------------------------
    | ADMIN BOOKINGS
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $bookings = Booking::with('user', 'room')

            ->latest()

            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE BOOKING
    |--------------------------------------------------------------------------
    */

    public function approve(Booking $booking)
    {
        $booking->status = 'Approved';

        $booking->save();

        return redirect()->back()

            ->with('success',
                'Booking approved.');
    }

    /*
    |--------------------------------------------------------------------------
    | REJECT BOOKING
    |--------------------------------------------------------------------------
    */

    public function reject(Booking $booking)
    {
        $booking->status = 'Rejected';

        $booking->save();

        return redirect()->back()

            ->with('success',
                'Booking rejected.');
    }

    /*
    |--------------------------------------------------------------------------
    | HISTORY
    |--------------------------------------------------------------------------
    */

    public function history(Request $request)
    {
        $query = Booking::with('room', 'user')

            ->where('user_id', auth()->id());

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where('purpose', 'like', '%' . $request->search . '%')

                ->orWhereHas('room', function ($room) use ($request) {

                    $room->where('room_name',
                        'like',
                        '%' . $request->search . '%');

                });

            });
        }

        /*
        |--------------------------------------------------------------------------
        | ROOM FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->room_type && $request->room_type != 'All') {

            $query->whereHas('room', function ($room) use ($request) {

                $room->where('room_type', $request->room_type);

            });
        }

        $bookings = $query->latest()->get();

        $roomTypes = Room::select('room_type')

            ->distinct()

            ->pluck('room_type');

        return view('lecturer.history', compact(
            'bookings',
            'roomTypes'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | CANCEL BOOKING
    |--------------------------------------------------------------------------
    */

    public function cancel(Booking $booking)
    {
        if ($booking->user_id != auth()->id()) {

            abort(403);
        }

        if ($booking->status != 'Pending') {

            return redirect()->back()

                ->with('error',
                    'Only pending bookings can be cancelled.');
        }

        $booking->status = 'Cancelled';

        $booking->save();

        return redirect()->back()

            ->with('success',
                'Booking cancelled successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | ROOM SCHEDULE
    |--------------------------------------------------------------------------
    */

    public function schedule(Request $request)
    {
        $selectedDate = $request->selected_date
    ? date('Y-m-d', strtotime($request->selected_date))
    : now()->format('Y-m-d');

        /*
        |--------------------------------------------------------------------------
        | ROOM FILTER
        |--------------------------------------------------------------------------
        */

        $roomQuery = Room::query();

        if ($request->search) {

            $roomQuery->where('room_name',
                'like',
                '%' . $request->search . '%');
        }

        if ($request->room_type && $request->room_type != 'All') {

            $roomQuery->where('room_type',
                $request->room_type);
        }

        $rooms = $roomQuery->get();

        /*
        |--------------------------------------------------------------------------
        | ROOM TYPES
        |--------------------------------------------------------------------------
        */

        $roomTypes = Room::select('room_type')

            ->distinct()

            ->pluck('room_type');

        /*
        |--------------------------------------------------------------------------
        | BOOKINGS
        |--------------------------------------------------------------------------
        */

        $bookings = Booking::with('room', 'user')

            ->where('booking_date', $selectedDate)

            ->whereIn('status', ['Pending', 'Approved'])

            ->get();

        /*
        |--------------------------------------------------------------------------
        | TIME SLOTS
        |--------------------------------------------------------------------------
        */

        $timeSlots = [];

        $time = strtotime('08:00');

        $end = strtotime('23:00');

        while ($time <= $end) {

            $timeSlots[] = date('H:i', $time);

            $time = strtotime('+30 minutes', $time);
        }


        return view('lecturer.schedule', compact(

            'rooms',

            'bookings',

            'timeSlots',

            'selectedDate',

            'roomTypes'

        ));
    }

    public function destroy(Booking $booking)
{
    if ($booking->user_id != auth()->id()) {

        abort(403);
    }

    $booking->delete();

    return redirect()
        ->back()
        ->with(
            'success',
            'Booking deleted successfully.'
        );
}
}