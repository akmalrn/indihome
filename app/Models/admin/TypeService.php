<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;

    protected $table = 'type_services';

    protected $fillable = [
        'title',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
