<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'old_price',
        'rating',
        'image',
        'location',
        'phone',
        'seller_name',
        'condition',
        'is_featured',
        'views',
        'meta',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'meta'        => 'array',
        'price'       => 'decimal:2',
        'old_price'   => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name) . '-' . Str::random(5);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Setting\Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    // Get vehicle-specific meta field
    public function vehicleMeta(string $key, $default = null)
    {
        return data_get($this->meta, $key, $default);
    }

    public function isVehicle(): bool
    {
        return $this->category?->isVehicleCategory() ?? false;
    }

    public function getConditionLabelAttribute(): string
    {
        return match($this->condition) {
            'new'         => 'Mpya',
            'fairly_used' => 'Imetumika Kidogo',
            default       => 'Imetumika',
        };
    }
}
