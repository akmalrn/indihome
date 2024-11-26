<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $aboutus = AboutUs::first();
        return view('backend.about-us.index', compact('user', 'aboutus'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validasi input
        $request->validate([
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'title' => 'nullable|string',
            'overview' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Tentukan data yang akan disimpan atau diupdate
        $data = [
            'title' => $request->input('title'),
            'overview' => $request->input('overview'),
            'description' => $request->input('description'),
        ];

        // Cek jika ada file gambar untuk path
        if ($request->hasFile('path')) {
            // Hapus file lama jika ada
            $oldPath = AboutUs::find(1)->path ?? null;
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            // Simpan gambar baru dengan move()
            $image = $request->file('path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/aboutus');
            $image->move($destinationPath, $imageName);

            // Simpan path gambar di database
            $data['path'] = 'uploads/aboutus/' . $imageName;
        }

        // Simpan atau update data ke dalam database
        AboutUs::updateOrCreate(
            ['id' => 1], // Cari berdasarkan ID 1 (karena tabel ini hanya memiliki 1 row)
            $data // Data yang diupdate atau disimpan
        );

        return redirect()->back()->with('success', 'AboutUs has been successfully saved or updated.');
    }
}
