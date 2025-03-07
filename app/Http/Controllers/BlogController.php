<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller {
    public function index() {
        $blogs = Blog::where('status', 'published')->paginate(10);
        return view('blogs.index', compact('blogs'));
    }
    public function edit($id) {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'nullable|boolean',
            'latest' => 'nullable|boolean',
        ]);
    
        $blog = Blog::findOrFail($id);
    
        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image')->store('blogs', 'public');
        } else {
            $imagePath = $blog->image;
        }
    
        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured'),
            'latest' => $request->has('latest'),
        ]);
    
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }
    public function showById($id) {
        // Fetch the blog details
        $blog = Blog::join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')
                    ->where('blogs.id', $id)
                    ->select('blogs.*', 'blog_categories.name as category_name')
                    ->firstOrFail();
    
        // Fetch Featured Properties
        $featuredProperties = DB::table('properties')
            ->join('price_range', 'properties.price_range_id', '=', 'price_range.range_id')
            ->join('property_category', 'properties.property_type_id', '=', 'property_category.pid')
            ->where('properties.is_featured', 1)
            ->where('properties.is_active', 1)
            ->select(
                'properties.properties_id', 'properties.title', 'properties.address', 'properties.builder_name',
                'properties.s_price', 'properties.is_featured', 'properties.localities', 'properties.city',
                'property_category.category_name', 'price_range.from_price', 'properties.select_bhk', 'properties.area',
                'price_range.from_price', 'price_range.to_price'
            )
            ->get();
    
        // Fetch images for featured properties
        $propertyImages = DB::table('property_images')
            ->whereIn('properties_id', $featuredProperties->pluck('properties_id'))
            ->select('properties_id', 'image_url')
            ->orderBy('is_featured', 'DESC')
            ->get()
            ->groupBy('properties_id');
    
        // Attach images to featured properties
        foreach ($featuredProperties as $featured) {
            $featured->image = isset($propertyImages[$featured->properties_id])
                ? env('baseURL') . "/" . $propertyImages[$featured->properties_id]->first()->image_url
                : env('baseURL') . "/theme/frontend/img/default.jpg"; // Default image if no image found
        }
         // Fetch Featured Blogs
            $featuredBlogs = Blog::where('is_featured', 1)
            ->where('is_active', 1)
            ->select('id', 'title', 'image', 'created_at')
            ->orderBy('created_at', 'DESC')
            ->take(5) // Limit to 5 blogs
            ->get();
    
        return view('blogs.show', compact('blog', 'featuredProperties', 'featuredBlogs'));
    }

    public function show($slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blogs.show', compact('blog'));
    }

    public function create() {
        $categories = BlogCategory::all();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'nullable|boolean',
            'latest' => 'nullable|boolean',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('blogs', 'public') : null;

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'published_at' => now(),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created.');
    }
    public function toggleStatus($id) {
        $blog = Blog::findOrFail($id);
        $blog->is_active = !$blog->is_active;
        $blog->save();
    
        return redirect()->back()->with('success', 'Blog status updated successfully.');
    }
}
