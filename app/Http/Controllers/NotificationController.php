<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

    public function create()
    {
        // view to show the create form
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'status' => 'required|string',
        ]);

        $notification = Notification::create($validatedData);
        return response()->json($notification, 201);
    }

    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        return response()->json($notification);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'message' => 'sometimes|required|string',
            'status' => 'sometimes|required|string',
        ]);

        $notification->update($validatedData);
        return response()->json($notification);
    }

    public function delete($id)
    {
        $notification = Notification::findOrFail($id);
        return response()->json($notification);
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return response()->json(['message' => 'Notification deleted successfully']);
    }
}
