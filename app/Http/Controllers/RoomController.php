<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::query();

        if ($request->search) {

            $query->where('room_name', 'like', '%' . $request->search . '%');
        }

        if ($request->room_type) {

            $query->where('room_type', $request->room_type);
        }

        $rooms = $query->get();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'room_name' => 'required',

            'room_type' => 'required',

            'capacity' => 'required|integer|min:1',

        ]);

        $latestRoom = Room::orderBy('room_id', 'desc')->first();

        $number = 1;

        if ($latestRoom) {

            $lastNumber = intval(substr($latestRoom->room_id, 2));

            $number = $lastNumber + 1;
        }

        $roomId = 'RM' . str_pad($number, 3, '0', STR_PAD_LEFT);

        Room::create([

            'room_id' => $roomId,

            'room_name' => $request->room_name,

            'room_type' => $request->room_type,

            'capacity' => $request->capacity,

            'status' => 'Available',

            // MAINTENANCE
            'is_under_maintenance' =>
                $request->has('is_under_maintenance'),

            'maintenance_note' =>
                $request->maintenance_note,

            'maintenance_until' =>
                $request->maintenance_until,
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Room added successfully.');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([

            'room_name' => 'required',

            'room_type' => 'required',

            'capacity' => 'required|integer|min:1',

        ]);

        $room->update([

            'room_name' => $request->room_name,

            'room_type' => $request->room_type,

            'capacity' => $request->capacity,
            'status' => $request->status,
            // MAINTENANCE
            'is_under_maintenance' =>
                $request->has('is_under_maintenance'),

            'maintenance_note' =>
                $request->maintenance_note,

            'maintenance_until' =>
                $request->maintenance_until,
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}