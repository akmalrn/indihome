<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8192',
        ]);

        $imageName = null;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sliders'), $imageName);
        }

        Slider::create([
            'title' => $request->title,
            'overview' => $request->overview,
            'description' => $request->description,
            'path' => $imageName,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('slider.index')->with('success', 'Data saved successfully.');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|required|string|max:255',
            'overview' => 'nullable|required|string',
            'description' => 'nullable|required|string',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8192',
        ]);

        $data = Slider::findOrFail($id);

        if ($request->hasFile('path')) {
            if (file_exists(public_path('uploads/sliders/' . $data->path))) {
                unlink(public_path('uploads/sliders/' . $data->path));
            }

            $image = $request->file('path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders'), $imageName);

            $data->path = $imageName;
        }

        $data->update([
            'title' => $request->title,
            'overview' => $request->overview,
            'description' => $request->description,
        ]);

        return redirect()->route('slider.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $data = Slider::findOrFail($id);

        if (file_exists(public_path('uploads/sliders/' . $data->path))) {
            unlink(public_path('uploads/sliders/' . $data->path));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}
