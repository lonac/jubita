<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
