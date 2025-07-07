<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FypsModel extends Model
{
    use HasFactory;

    protected $table = "fyps";
    protected $primarKey = "fyp_id";
}
