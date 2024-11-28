<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;

    protected $table = 'our_team';

    protected $fillable = [
        'path',
        'name',
        'position',
        'description',
        'facebook',
        'twitter',
        'dribbble',
        'linkedin',
    ];
}
