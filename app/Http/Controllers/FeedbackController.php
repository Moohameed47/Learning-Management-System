<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return response()->json($feedbacks);
    }

    public function create()
    {
        // view to show the create form
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'group_id' => 'required|exists:groups,id',
            'feedback_text' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $feedback = Feedback::create($validatedData);
        return response()->json($feedback, 201);
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return response()->json($feedback);
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'group_id' => 'sometimes|required|exists:groups,id',
            'feedback_text' => 'sometimes|required|string',
            'rating' => 'sometimes|required|numeric|min:1|max:5',
        ]);

        $feedback->update($validatedData);
        return response()->json($feedback);
    }

    public function delete($id)
    {
        $feedback = Feedback::findOrFail($id);
        return response()->json($feedback);
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return response()->json(['message' => 'Feedback deleted successfully']);
    }
}
