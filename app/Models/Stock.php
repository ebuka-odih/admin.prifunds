<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageAttribute()
    {
        return $this->attributes['image'] ?? 'trading.png';
    }

    public function trade_stock()
    {
        return $this->hasMany(TradeStock::class, 'stock_id');
    }


}
