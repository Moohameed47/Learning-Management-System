<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstructorMentorLeaveTracking;

class InstructorMentorLeaveTrackingController extends Controller
{
    public function index()
    {
        $leaveRecords = InstructorMentorLeaveTracking::all();
        return response()->json($leaveRecords);
    }

    public function create()
    {
        // view to show the create form
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'leave_date' => 'required|date',
            'leave_type' => 'required|string',
            'reason' => 'required|string',
            'status' => 'required|string', // Pending, Approved, Rejected
        ]);

        $leaveRecord = InstructorMentorLeaveTracking::create($validatedData);
        return response()->json($leaveRecord, 201);
    }

    public function edit($id)
    {
        $leaveRecord = InstructorMentorLeaveTracking::findOrFail($id);
        return response()->json($leaveRecord);
    }

    public function update(Request $request, $id)
    {
        $leaveRecord = InstructorMentorLeaveTracking::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'leave_date' => 'sometimes|required|date',
            'leave_type' => 'sometimes|required|string',
            'reason' => 'sometimes|required|string',
            'status' => 'sometimes|required|string',
        ]);

        $leaveRecord->update($validatedData);
        return response()->json($leaveRecord);
    }

    public function delete($id)
    {
        $leaveRecord = InstructorMentorLeaveTracking::findOrFail($id);
        return response()->json($leaveRecord);
    }

    public function destroy($id)
    {
        $leaveRecord = InstructorMentorLeaveTracking::findOrFail($id);
        $leaveRecord->delete();
        return response()->json(['message' => 'Leave record deleted successfully']);
    }
}
