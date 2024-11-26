<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\TypeService;
use Illuminate\Http\Request;

class TypeServiceController extends Controller
{
    public function index()
    {
        $TypeServices = TypeService::all();
        return view('backend.service.type.index', compact('TypeServices'));
    }

    public function create()
    {
        return view('backend.service.type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        TypeService::create([
            'title' => $request->title,
        ]);

        return redirect()->route('type-services.index')->with('success', 'title added successfully.');
    }

    public function edit($id)
    {
        $TypeService = TypeService::findOrFail($id);
        return view('backend.service.type.edit', compact('TypeService'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255,' . $id,
        ]);

        $TypeService = TypeService::findOrFail($id);
        $TypeService->update([
            'title' => $request->title,
        ]);

        return redirect()->route('type-services.index')->with('success', 'title updated successfully.');
    }

    public function destroy($id)
    {
        $TypeService = TypeService::findOrFail($id);
        $TypeService->delete();

        return redirect()->route('type-services.index')->with('success', 'title successfully deleted.');
    }
}
