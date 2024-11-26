<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricings = Pricing::all();
        return view('backend.pricing.index', compact('pricings'));
    }

    public function create()
    {
        return view('backend.pricing.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'overview' => 'required|',
        ]);

        Pricing::create([
            'title' => $request->title,
            'description' => $request->description,
            'overview' => $request->overview,
        ]);

        return redirect()->route('pricings.index')->with('success', 'Data saved successfully.');
    }

    public function edit($id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('backend.pricing.edit', compact('pricing'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|required|string|max:255',
            'description' => 'nullable|required|string',
            'overview' => 'nullable|',
        ]);

        $data = Pricing::findOrFail($id);

        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'overview' =>  $request->overview,
        ]);

        return redirect()->route('pricings.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $data = Pricing::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}
