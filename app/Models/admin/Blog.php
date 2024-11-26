<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'path',
        'title',
        'overview',
        'description',
        'category_id',
        'keywords',
        'descriptions',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryBlog::class);
    }
}
