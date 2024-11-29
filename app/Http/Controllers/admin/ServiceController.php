<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\CategoryService;
use App\Models\admin\Service;
use App\Models\admin\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $categoryservices = CategoryService::all();
        if ($request->has('category_id') && $request->category_id != '') {
            $services = Service::where('category_id', $request->category_id)->get();
        } else {
            $services = Service::take(11)->get();
        }
        return view('backend.service.index', compact('categoryservices', 'services'));
    }

    public function create()
    {
        $typeservices = TypeService::all();
        $categoryservice = CategoryService::all();
        return view('backend.service.create', compact('typeservices', 'categoryservice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:category_services,id',
            'type_id' => 'required|exists:type_services,id',
        ]);

        Service::create([
            'title' => $request->title,
            'overview' => $request->overview,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
        ]);

        return redirect()->route('services.index')->with('success', 'Service added successfully.');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $typeservices = TypeService::all();
        $categoryservice = CategoryService::all();
        return view('backend.service.edit', compact('service', 'categoryservice', 'typeservices'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:category_services,id',
            'type_id' => 'required|exists:type_services,id',
        ]);

        $service = Service::findOrFail($id);

        $service->update([
            'title' => $request->title,
            'overview' => $request->overview,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
        ]);

        // Redirect with a success message
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        // Mencari layanan berdasarkan ID
        $service = Service::findOrFail($id);

        // Menghapus gambar dari server jika ada
        if ($service->path) {
            $imagePath = public_path($service->path);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Menghapus file gambar
            }
        }

        // Menghapus layanan dari database
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
