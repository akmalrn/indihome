<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OurTeamController extends Controller
{
    public function index()
    {
        $teams = OurTeam::all();
        return view('backend.our-team.index', compact('teams'));
    }

    public function create()
    {
        return view('backend.our-team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'path' => 'required|image',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'dribbble' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        if ($request->hasFile('path')) {
            $image = $request->file('path');
            $imageName = time() . '-' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/our-team'), $imageName);
            $validated['path'] = 'uploads/our-team/' . $imageName;
        }

        OurTeam::create($validated);

        return redirect()->route('our-team.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $team = OurTeam::findOrFail($id);
        return view('backend.our-team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'path' => 'nullable|image',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'dribbble' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $team = OurTeam::findOrFail($id);

        if ($request->hasFile('path')) {
            $image = $request->file('path');
            $imageName = time() . '-' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/our-team'), $imageName);

            if (file_exists(public_path($team->path))) {
                unlink(public_path($team->path));
            }

            $validated['path'] = 'uploads/our-team/' . $imageName;
        } else {
            $validated['path'] = $team->path;
        }

        $team->update($validated);

        return redirect()->route('our-team.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $team = OurTeam::findOrFail($id);

        if (file_exists(public_path($team->path))) {
            unlink(public_path($team->path));
        }

        $team->delete();

        return redirect()->route('our-team.index')->with('success', 'Data berhasil dihapus.');
    }
}
