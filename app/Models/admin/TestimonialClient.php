<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialClient extends Model
{
    use HasFactory;

    protected $table = 'testimonial_client';

    protected $fillable = [
        'path',
        'name',
        'position',
        'description',
    ];
}
