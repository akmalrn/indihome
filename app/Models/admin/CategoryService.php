<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    use HasFactory;

    protected $table = 'category_services';

    protected $fillable = [
        'category',
        'path',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
