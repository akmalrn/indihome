<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\WhyUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhyUsController extends Controller
{
    public function index()
    {
        $whyus = WhyUs::first();
        return view('backend.why-us.index', compact('whyus'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
        ]);

        $imageName = null;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/whyus'), $imageName);
        }

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'overview' => $request->input('overview'), // Tambahkan overview
            'path' => $imageName,
        ];


        WhyUs::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->back()->with('success', 'WhyUs has been successfully saved or updated.');
    }
}
