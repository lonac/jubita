<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setting\CommodityType;


class MarketPrice extends Model
{
    protected $fillable = [
        'commodity_type_id',
        'price_min',
        'price_max',
        'market_type',
        'recorded_at',
    ];

    public function commodity()
    {
        return $this->belongsTo(CommodityType::class,'commodity_type_id');
    }
}
