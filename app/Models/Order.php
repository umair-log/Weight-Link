<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'material_for_transport',
        'transportation_company',
        'truck',
        'weight_details',
        'extra',
        'extra2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
