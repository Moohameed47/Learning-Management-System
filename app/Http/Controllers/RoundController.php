<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Round;

class RoundController extends Controller
{
    public function index()
    {
        $rounds = Round::all();
        return response()->json($rounds);
    }

    public function create()
    {
        // view to show the create form
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $round = Round::create($validatedData);
        return response()->json($round, 201);
    }

    public function edit($id)
    {
        $round = Round::findOrFail($id);
        return response()->json($round);
    }

    public function update(Request $request, $id)
    {
        $round = Round::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
        ]);

        $round->update($validatedData);
        return response()->json($round);
    }

    public function delete($id)
    {
        $round = Round::findOrFail($id);
        return response()->json($round);
    }

    public function destroy($id)
    {
        $round = Round::findOrFail($id);
        $round->delete();
        return response()->json(['message' => 'Round deleted successfully']);
    }
}
