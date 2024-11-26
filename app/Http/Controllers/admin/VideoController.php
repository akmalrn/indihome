<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('backend.video.index', compact('videos'));
    }

    public function create()
    {
        return view('backend.video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string',
            'youtube' => 'required|string',
            'path' => 'required|image',
        ]);

        $imageName = null;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/videos'), $imageName);
        }

        Video::create([
            'name' => $request->name,
            'year' => $request->year,
            'youtube' => $request->youtube,
            'path' => $imageName,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('videos.index')->with('success', 'Data saved successfully.');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('backend.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|required|string|max:255',
            'year' => 'nullable|required|string',
            'youtube' => 'nullable|required|string',
            'path' => 'nullable|image',
        ]);

        $data = Video::findOrFail($id);

        if ($request->hasFile('path')) {
            if (file_exists(public_path('uploads/videos/' . $data->path))) {
                unlink(public_path('uploads/videos/' . $data->path));
            }

            $image = $request->file('path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/videos'), $imageName);

            $data->path = $imageName;
        }

        $data->update([
            'name' => $request->name,
            'year' => $request->year,
            'youtube' => $request->youtube,
        ]);

        return redirect()->route('videos.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $data = video::findOrFail($id);

        if (file_exists(public_path('uploads/videos/' . $data->path))) {
            unlink(public_path('uploads/videos/' . $data->path));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}
