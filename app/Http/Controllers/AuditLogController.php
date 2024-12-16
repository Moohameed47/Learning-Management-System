<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditLog;

class AuditLogController extends Controller
{
    public function index()
    {
        $logs = AuditLog::all();
        return response()->json($logs);
    }

    public function create()
    {
        // view to show the create form
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'action' => 'required|string',
            'timestamp' => 'required|date',
        ]);

        $log = AuditLog::create($validatedData);
        return response()->json($log, 201);
    }

    public function edit($id)
    {
        $log = AuditLog::findOrFail($id);
        return response()->json($log);
    }

    public function update(Request $request, $id)
    {
        $log = AuditLog::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'action' => 'sometimes|required|string',
            'timestamp' => 'sometimes|required|date',
        ]);

        $log->update($validatedData);
        return response()->json($log);
    }

    public function delete($id)
    {
        $log = AuditLog::findOrFail($id);
        return response()->json($log);
    }

    public function destroy($id)
    {
        $log = AuditLog::findOrFail($id);
        $log->delete();
        return response()->json(['message' => 'Audit log deleted successfully']);
    }
}
