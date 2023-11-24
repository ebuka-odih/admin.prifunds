<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeStock extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function status()
    {
        if ($this->status == 0){
            return "<span class='badge bg-warning'>Open</span>";
        }elseif ($this->status > 0){
            return "<span class='badge bg-success'>Traded</span>";
        }else{
            return "<span class='badge bg-danger text text-uppercase'>Cancelled</span>";
        }
    }


}
