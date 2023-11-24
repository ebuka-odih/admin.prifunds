<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transID()
    {
        return $this->id."3435";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, "payment_method_id");
    }

    public function status()
    {
        if ($this->status == 0){
            return "<span class='badge badge-dot bg-warning'>Pending</span>";
        }elseif ($this->status > 0){
            return "<span class='badge badge-dot bg-success'>Successful</span>";
        }else{
            return "<span class='badge badge-dot bg-danger'>Cancelled</span>";
        }
    }
    public function adminStatus()
    {
        if ($this->status == 0){
            return "<span class='badge bg-warning text text-uppercase'>Pending</span>";
        }elseif ($this->status > 0){
            return "<span class='badge bg-success text text-uppercase'>Successful</span>";
        }else{
            return "<span class='badge bg-danger text text-uppercase'>Cancelled</span>";
        }
    }



}
