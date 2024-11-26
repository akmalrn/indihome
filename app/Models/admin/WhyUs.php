<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    use HasFactory;

    protected $table = 'why_us';

    protected $fillable = [
        'path',
        'title',
        'overview',
        'description',
    ];
}
