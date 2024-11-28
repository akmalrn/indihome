<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        return view('backend.configuration.index', compact('configuration'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'path_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'website_name' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_descriptions' => 'nullable|string',
            'footer' => 'nullable|string',
            'path_services' => 'nullable',
            'overview_1' => 'nullable',
            'description_1' => 'nullable',
            'price_1' => 'nullable',
            'path_1' => 'nullable',
        ]);

        $data = [
            'website_name' => $request->input('website_name'),
            'title' => $request->input('title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_descriptions' => $request->input('meta_descriptions'),
            'footer' => $request->input('footer'),
            'overview_1' => $request->input('overview_1'),
            'price_1' => $request->input('price_1'),
            'description_1' => $request->input('description_1'),
        ];

        if ($request->hasFile('path')) {
            $oldPath = Configuration::find(1)->path ?? null;
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
            $image = $request->file('path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/configuration');
            $image->move($destinationPath, $imageName);
            $data['path'] = 'uploads/configuration/' . $imageName;
        }

        if ($request->hasFile('path_logo')) {
            $oldPathLogo = Configuration::find(1)->path_logo ?? null;
            if ($oldPathLogo && File::exists(public_path($oldPathLogo))) {
                File::delete(public_path($oldPathLogo));
            }
            $logo = $request->file('path_logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $destinationPath = public_path('uploads/configuration');
            $logo->move($destinationPath, $logoName);
            $data['path_logo'] = 'uploads/configuration/' . $logoName;
        }

        if ($request->hasFile('path_services')) {
            $oldPathLogo = Configuration::find(1)->path_services ?? null;
            if ($oldPathLogo && File::exists(public_path($oldPathLogo))) {
                File::delete(public_path($oldPathLogo));
            }
            $logo = $request->file('path_services');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $destinationPath = public_path('uploads/configuration');
            $logo->move($destinationPath, $logoName);
            $data['path_services'] = 'uploads/configuration/' . $logoName;
        }

        if ($request->hasFile('path_1')) {
            $oldPathLogo = Configuration::find(1)->path_1 ?? null;
            if ($oldPathLogo && File::exists(public_path($oldPathLogo))) {
                File::delete(public_path($oldPathLogo));
            }
            $logo = $request->file('path_1');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $destinationPath = public_path('uploads/configuration');
            $logo->move($destinationPath, $logoName);
            $data['path_1'] = 'uploads/configuration/' . $logoName;
        }

        Configuration::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->back()->with('success', 'Configuration has been successfully saved or updated.');
    }
}
