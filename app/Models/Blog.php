<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'image',
        'category_id', 'meta_title', 'meta_keyword',
        'meta_description', 'published_at', 'status', 'is_featured', 'latest'
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
        });
    }

    public function category() {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeLatestBlogs($query)
    {
        return $query->where('latest', true);
    }
}
