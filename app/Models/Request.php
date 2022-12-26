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
     * @var array
     */
    protected $fillable = [
        'player_id', 
        'player_name', 
        'dollar_price', 
        'commission',
        'amount',
        'is_sent',
        'is_paid',
        'user_id',
        'sent_at',
    ];

    public function getTotalPayAttribute()
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
}
