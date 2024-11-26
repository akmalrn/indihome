<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'title',
        'overview',
        'description',
        'category_id',
        'type_id'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryService::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeService::class);
    }
}
