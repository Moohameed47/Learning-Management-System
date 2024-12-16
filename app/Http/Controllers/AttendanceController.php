<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }

    public function create()
    {
        // view to show the create form
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'student_id' => 'required|exists:users,id',
            'session_date' => 'required|date',
            'status' => 'required|string',
            'score' => 'required|numeric',
        ]);

        $attendance = Attendance::create($validatedData);
        return response()->json($attendance, 201);
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return response()->json($attendance);
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $validatedData = $request->validate([
            'group_id' => 'sometimes|required|exists:groups,id',
            'student_id' => 'sometimes|required|exists:users,id',
            'session_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|string',
            'score' => 'sometimes|required|numeric',
        ]);

        $attendance->update($validatedData);
        return response()->json($attendance);
    }

    public function delete($id)
    {
        $attendance = Attendance::findOrFail($id);
        return response()->json($attendance);
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return response()->json(['message' => 'Attendance deleted successfully']);
    }
}
