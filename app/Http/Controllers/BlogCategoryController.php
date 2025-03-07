<?php
namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller {
    public function index() {
        $categories = BlogCategory::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:blog_categories']);
        BlogCategory::create(['name' => $request->name, 'slug' => Str::slug($request->name)]);
        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }
}

