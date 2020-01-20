<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $description
 * @property int $initiator_id
 * @property int $restaurant_id
 * @property Order[] $orders
 */
class TeamBuying extends Model
{
    protected $fillable = [
        'title',
        'description',
        'initiator_id',
        'restaurant_id',
    ];

    protected function orders()
    {
        $this->hasMany(Order::class);
    }
}
