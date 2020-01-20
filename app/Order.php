<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'room_id',
        'team_buying_id',
        'initiator_id',
        'customer_id',
        'item',
        'money',
        'pay_at',
    ];

    protected $casts = [
        'item' => 'array'
    ];

    protected function teamBuying()
    {
        return $this->belongsTo(TeamBuying::class);
    }
}
