<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return response()->json($groups);
    }

    public function create()
    {
        // view to show the create form
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'round_id' => 'required|exists:rounds,id',
            'instructor_id' => 'required|exists:users,id',
            'mentor_id' => 'required|exists:users,id',
            'status' => 'required|string',
        ]);

        $group = Group::create($validatedData);
        return response()->json($group, 201);
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return response()->json($group);
    }

    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $validatedData = $request->validate([
            'round_id' => 'sometimes|required|exists:rounds,id',
            'instructor_id' => 'sometimes|required|exists:users,id',
            'mentor_id' => 'sometimes|required|exists:users,id',
            'status' => 'sometimes|required|string',
        ]);

        $group->update($validatedData);
        return response()->json($group);
    }

    public function delete($id)
    {
        $group = Group::findOrFail($id);
        return response()->json($group);
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return response()->json(['message' => 'Group deleted successfully']);
    }
}
