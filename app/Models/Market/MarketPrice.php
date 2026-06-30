<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setting\CommodityType;

class MarketPrice extends Model
{
    protected $fillable = [
        'commodity_type_id',
        'location',
        'unit',
        'price_min',
        'price_max',
        'market_type',
        'recorded_at',
    ];

    protected $casts = [
        'recorded_at' => 'datetime',
        'price_min'   => 'decimal:2',
        'price_max'   => 'decimal:2',
    ];

    public function commodity()
    {
        return $this->belongsTo(CommodityType::class, 'commodity_type_id');
    }
}
