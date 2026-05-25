<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacilityReport;
use App\Models\Room;

class FacilityReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CREATE REPORT PAGE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $rooms = Room::all();

        return view('facility-reports.create', compact('rooms'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE REPORT
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'room_id' => 'required',

            'issue_title' => 'required',

            'issue_description' => 'required',

            'issue_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $imagePath = null;

        if ($request->hasFile('issue_image')) {

            $imagePath = $request->file('issue_image')
                ->store('facility-reports', 'public');
        }

        FacilityReport::create([

            'user_id' => auth()->id(),

            'room_id' => $request->room_id,

            'issue_title' => $request->issue_title,

            'issue_description' => $request->issue_description,

            'issue_image' => $imagePath,

            'status' => 'Pending',

        ]);

        return redirect()->route('facility.report.create')
            ->with('success', 'Facility issue report submitted successfully.');
    }
    /*
    |--------------------------------------------------------------------------
    | ADMIN REPORT LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $reports = FacilityReport::latest()->get();

        return view('facility-reports.index', compact('reports'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    public function updateStatus(
    Request $request,
    FacilityReport $report
)
{
    $report->update([

        'status' => $request->status

    ]);

    /*
    |--------------------------------------------------------------------------
    | AUTO MAINTENANCE
    |--------------------------------------------------------------------------
    */

    if($request->status == 'Unavailable'){

        $report->room->update([

            'is_under_maintenance' => true,

            'maintenance_note' =>
                $report->issue_title,

            'status' =>
                'Unavailable'

        ]);
    }

    return redirect()
        ->route('facility.reports')
        ->with(
            'success',
            'Facility report updated successfully.'
        );
}

public function destroy(
    FacilityReport $report
)
{
    if(
        $report->user_id != auth()->id()
    ){
        abort(403);
    }

    if($report->issue_image){

        \Storage::disk('public')
            ->delete(
                $report->issue_image
            );
    }

    $report->delete();

    return redirect()
        ->back()
        ->with(
            'success',
            'Report deleted successfully.'
        );
}
}