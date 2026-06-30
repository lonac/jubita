<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
        'is_main',
        'status',
        'category_type',
        'icon',
        'color',
    ];

    protected $casts = [
        'is_main' => 'boolean',
        'status'  => 'boolean',
    ];

    const TYPE_NEWS    = 'news';
    const TYPE_PRODUCT = 'product';
    const TYPE_BOTH    = 'both';

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product\Product::class, 'category_id');
    }

    public function isProductCategory(): bool
    {
        return in_array($this->category_type, [self::TYPE_PRODUCT, self::TYPE_BOTH]);
    }

    public function isNewsCategory(): bool
    {
        return in_array($this->category_type, [self::TYPE_NEWS, self::TYPE_BOTH]);
    }

    public function isVehicleCategory(): bool
    {
        if (! $this->isProductCategory()) return false;
        $needle = strtolower($this->name . ' ' . $this->slug);
        return str_contains($needle, 'gari') || str_contains($needle, 'car') || str_contains($needle, 'vehicle');
    }
}
