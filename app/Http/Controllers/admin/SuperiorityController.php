<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Superiority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperiorityController extends Controller
{
    public function index()
    {
        $superioritys = Superiority::all();
        return view('backend.superiority.index', compact('superioritys'));
    }

    public function create()
    {
        return view('backend.superiority.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
        ]);

        Superiority::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()->route('superiority.index')->with('success', 'Data saved successfully.');
    }

    public function edit($id)
    {
        $superiority = Superiority::findOrFail($id);
        return view('backend.superiority.edit', compact('superiority'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|required|string|max:255',
            'description' => 'nullable|required|string',
            'icon' => 'nullable|required|string',
        ]);

        $data = Superiority::findOrFail($id);


        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()->route('superiority.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $data = Superiority::findOrFail($id);

        if (file_exists(public_path('uploads/superioritys/' . $data->path))) {
            unlink(public_path('uploads/superioritys/' . $data->path));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}
