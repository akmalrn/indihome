<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryBlogController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('backend.blog.category.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        CategoryBlog::create([
            'category' => $request->category,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $categoryblog = CategoryBlog::findOrFail($id);
        return view('backend.blog.category.edit', compact('categoryblog', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255,' . $id,
        ]);

        $categoryblog = CategoryBlog::findOrFail($id);
        $categoryblog->update([
            'category' => $request->category,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $categoryblog = CategoryBlog::findOrFail($id);
        $categoryblog->delete();

        return redirect()->route('blogs.index')->with('success', 'Category successfully deleted.');
    }
}
