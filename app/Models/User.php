<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function status()
    {
        if ($this->status == 0){
            return "<span class='user-status user-status-unverified'>Unverified</span>";
        }elseif ($this->status > 0){
            return "<span class='user-status user-status-verified'>Verified</span>";
        }else{
            return "<span class='badge bg-warning text text-uppercase'>Blocked</span>";
        }
    }

    public function adminStatus()
    {
        if ($this->status == 0){
            return "<span class='badge bg-danger'>Unverified</span>";
        }elseif ($this->status > 0){
            return "<span class='badge bg-success'>Verified</span>";
        }else{
            return "<span class='badge bg-warning text text-uppercase'>Blocked</span>";
        }
    }

    protected $appends = ['referral_link'];
    protected $with = ['referredBy'];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    public function all_referrals()
    {
        $refs = User::whereReferredBy($this->id)->get();
        return $refs;
    }

    public function referredBy()
    {
        return $this->belongsTo(User::class, 'referred_by', 'id');
    }
    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('register', ['ref' => $this->username, 'id'=> $this->id]);
    }

    public function getAvatarAttribute()
    {
        return $this->attributes['avatar'] ?? 'user.png';
    }

    public function withdrawal()
    {
        return $this->hasMany(Withdraw::class, 'user_id');
    }
    public function deposit()
    {
        return $this->hasMany(Deposit::class, 'user_id');
    }
    public function funding()
    {
        return $this->hasMany(Funding::class, 'user_id');
    }

    public function trade()
    {
        return $this->hasMany(Trade::class, 'user_id');
    }
    public function trade_stock()
    {
        return $this->hasMany(TradeStock::class, 'user_id');
    }




}
