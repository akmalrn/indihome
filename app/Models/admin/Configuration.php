<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $table = 'configuration';

    protected $fillable = [
        'path',
        'path_logo',
        'website_name',
        'title',
        'phone_number',
        'email_address',
        'facebook',
        'linkedin',
        'dribbble',
        'twitter',
        'skype',
        'meta_keywords',
        'meta_descriptions',
        'footer',
        'path_services',
        'overview_1',
        'description_1',
        'price_1',
        'path_1',
    ];
}
