<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $table = 'pricing' ;

    protected $fillable = [
        'title',
        'overview',
        'description',
    ];
}
