<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class CommodityType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'slug',
    ];
}
