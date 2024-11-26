<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ConfigurationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $configuration = Configuration::first();
        return view('backend.configuration.index', compact('user', 'configuration'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validasi input
        $request->validate([
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'path_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'website_name' => 'nullable|string',
            'title' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'email_address' => 'nullable|email',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'skype' => 'nullable',
            'dribbble' => 'nullable',
            'linkedin' => 'nullable',
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
            'phone_number' => $request->input('phone_number'),
            'email_address' => $request->input('email_address'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'skype' => $request->input('skype'),
            'dribbble' => $request->input('dribbble'),
            'linkedin' => $request->input('linkedin'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_descriptions' => $request->input('meta_descriptions'),
            'footer' => $request->input('footer'),
            'overview_1' => $request->input('overview_1'),
            'price_1' => $request->input('price_1'),
            'description_1' => $request->input('description_1'),
        ];

        // Cek jika ada file gambar untuk path
        if ($request->hasFile('path')) {
            // Hapus file lama jika ada
            $oldPath = Configuration::find(1)->path ?? null;
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            // Simpan gambar baru dengan move()
            $image = $request->file('path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/configuration');
            $image->move($destinationPath, $imageName);

            // Simpan path gambar di database
            $data['path'] = 'uploads/configuration/' . $imageName;
        }

        // Cek jika ada file gambar untuk path_logo
        if ($request->hasFile('path_logo')) {
            // Hapus file logo lama jika ada
            $oldPathLogo = Configuration::find(1)->path_logo ?? null;
            if ($oldPathLogo && File::exists(public_path($oldPathLogo))) {
                File::delete(public_path($oldPathLogo));
            }

            // Simpan gambar logo baru dengan move()
            $logo = $request->file('path_logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $destinationPath = public_path('uploads/configuration');
            $logo->move($destinationPath, $logoName);

            // Simpan path logo di database
            $data['path_logo'] = 'uploads/configuration/' . $logoName;
        }

        if ($request->hasFile('path_services')) {
            // Hapus file logo lama jika ada
            $oldPathLogo = Configuration::find(1)->path_services ?? null;
            if ($oldPathLogo && File::exists(public_path($oldPathLogo))) {
                File::delete(public_path($oldPathLogo));
            }

            // Simpan gambar logo baru dengan move()
            $logo = $request->file('path_services');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $destinationPath = public_path('uploads/configuration');
            $logo->move($destinationPath, $logoName);

            // Simpan path logo di database
            $data['path_services'] = 'uploads/configuration/' . $logoName;
        }

        if ($request->hasFile('path_1')) {
            // Hapus file logo lama jika ada
            $oldPathLogo = Configuration::find(1)->path_1 ?? null;
            if ($oldPathLogo && File::exists(public_path($oldPathLogo))) {
                File::delete(public_path($oldPathLogo));
            }

            // Simpan gambar logo baru dengan move()
            $logo = $request->file('path_1');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $destinationPath = public_path('uploads/configuration');
            $logo->move($destinationPath, $logoName);

            // Simpan path logo di database
            $data['path_1'] = 'uploads/configuration/' . $logoName;
        }

        // Simpan atau update data ke dalam database
        Configuration::updateOrCreate(
            ['id' => 1], // Cari berdasarkan ID 1 (karena tabel ini hanya memiliki 1 row)
            $data // Data yang diupdate atau disimpan
        );

        return redirect()->back()->with('success', 'Configuration has been successfully saved or updated.');
    }
}
