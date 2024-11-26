<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use App\Models\admin\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categoryblogs = CategoryBlog::all();
        $blogs = Blog::with('category')->get(); // Fetch all blogs with their categories
        return view('backend.blog.index', compact('user', 'categoryblogs', 'blogs'));
    }

    public function create()
    {
        $user = Auth::user();
        $categoryblog = CategoryBlog::all(); // Fetch all categories for the dropdown
        return view('backend.blog.create', compact('categoryblog', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'keywords' => 'required|string',
            'descriptions' => 'required|string', // Ensure this field exists in your database
            'category_id' => 'required|exists:category_blogs,id', // Validate category
            'path' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192', // Validate image
        ]);

        $imageName = null;

        // Handle the file upload
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $imageName);
        }

        // Create a new blog entry
        Blog::create([
            'title' => $request->title,
            'overview' => $request->overview,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'descriptions' => $request->descriptions, // Ensure this is a valid field
            'category_id' => $request->category_id,
            'path' => $imageName ?? null, // Ensure this is nullable
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog added successfully.');
    }

    public function edit($id)
    {
        // Ubah findOrFails menjadi findOrFail
        $blog = Blog::findOrFail($id);
        $user = Auth::user();
        $categoryblogs = CategoryBlog::all();
        return view('backend.blog.edit', compact('user', 'categoryblogs', 'blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'keywords' => 'required|string',
            'descriptions' => 'required|string', // Ensure this field exists in your database
            'category_id' => 'required|exists:category_blogs,id', // Validate category
            'path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192', // Validate image
        ]);

        $blog = Blog::findOrFail($id);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('path')) {
            // Delete the existing image if it exists
            $existingImagePath = public_path('uploads/blogs/' . $blog->path);
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }

            // Process the new image upload
            $image = $request->file('path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs'), $imageName);
            $blog->path = $imageName; // Update the blog's image path
        }

        // Update the blog entry
        $blog->update([
            'title' => $request->title,
            'overview' => $request->overview,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'descriptions' => $request->descriptions,
            'category_id' => $request->category_id,
            // The path is handled separately above
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete the image from the server if it exists
        if ($blog->path) {
            $imagePath = public_path('uploads/blogs/' . $blog->path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the blog from the database
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
