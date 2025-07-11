<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    //

    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index', compact('skills'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:skills,name',
            'progress' => 'required|integer|min:0|max:100',
            'color' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new skill
        Skill::create([
            'name' => $request->name,
            'progress' => $request->progress,
            'color' => $request->color,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Skill berhasil ditambahkan'
        ]);
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return response()->json($skill);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:skills,name,' . $id,
            'progress' => 'required|integer|min:0|max:100',
            'color' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Find and update the skill
        $skill = Skill::findOrFail($id);
        $skill->update([
            'name' => $request->name,
            'progress' => $request->progress,
            'color' => $request->color,
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Skill updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}
