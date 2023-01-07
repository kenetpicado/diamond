<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
        'player_id',
        'player_name',
        'usd_nio',
        'dollar_price',
        'commission',
        'amount',
        'is_sent',
        'is_paid',
        'user_id',
        'sent_at',
    ];

    public function scopeSelectHome($query)
    {
        return $query->select([
            'usd_nio',
            'dollar_price',
            'amount',
            'is_sent',
            'is_paid'
        ]);
    }

    public function scopeSelectEarning($query)
    {
        return $query->select([
            'player_id',
            'player_name',
            'usd_nio',
            'dollar_price',
            'amount',
        ]);
    }

    public function getUsdNioTotalAttribute()
    {
        return $this->usd_nio * $this->amount;
    }

    public function getTotalPayAttribute(): float
    {
        return $this->amount * $this->dollar_price;
    }

    public function getTotalCommissionAttribute()
    {
        return $this->amount * $this->commission;
    }

    public function getTotalSentAttribute()
    {
        return $this->total_commission + $this->total_pay;
    }

    public function getEarningAttribute()
    {
        return $this->dollar_price - $this->usd_nio;
    }

    public function getTotalEarningAttribute()
    {
        return $this->earning * $this->amount;
    }
}
