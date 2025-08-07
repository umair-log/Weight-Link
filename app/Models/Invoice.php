<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'type',
        'vehicle_name',
        'customer_name',
        'item_id',
        'user_id',
        'item_type',
        'amount',
        're_enter_first_weight',
        'dummy_weight_one',
        'dummy_weight_two',
        'driver'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
