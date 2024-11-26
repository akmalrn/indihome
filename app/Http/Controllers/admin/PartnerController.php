<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    // Tampilkan halaman daftar partner
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        $partners = Partner::all();
        return view('backend.partner.index', compact('partners', 'user'));
    }

    // Tampilkan form untuk membuat partner baru
    public function create()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('backend.partner.create', compact('user'));
    }

    // Simpan partner baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:8192',
            'title' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        $imageName = null;

        // Mengecek apakah file diupload
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imageName = time() . '_' . $file->getClientOriginalName();
            // Memindahkan file ke folder 'uploads/partners'
            $file->move(public_path('uploads/partners'), $imageName);
        }

        Partner::create([
            'path' => 'uploads/partners/' . $imageName,
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect()->route('partner.index')->with('success', 'Partner created successfully.');
    }

    // Tampilkan form untuk mengedit partner
    public function edit($id)
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        $partner = Partner::findOrFail($id);
        return view('backend.partner.edit', compact('partner', 'user'));
    }

    // Update partner yang sudah ada di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'path' => 'image|mimes:jpeg,png,jpg,gif,webp|max:8192', // opsional
            'title' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        $partner = Partner::findOrFail($id);
        $imageName = $partner->path; // gunakan gambar lama jika tidak ada upload baru

        // Mengecek apakah file diupload
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imageName = time() . '_' . $file->getClientOriginalName();
            // Memindahkan file ke folder 'uploads/partners'
            $file->move(public_path('uploads/partners'), $imageName);
        }

        $partner->update([
            'path' => 'uploads/partners/' . $imageName,
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect()->route('partner.index')->with('success', 'Partner updated successfully.');
    }

    // Hapus partner dari database
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->route('partner.index')->with('success', 'Partner deleted successfully.');
    }
}
