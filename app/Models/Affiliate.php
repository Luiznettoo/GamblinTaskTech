<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;
    protected $fillable = [
        'affiliate_id',
        'affiliate_name',
        'affiliate_latitude',
        'affiliate_longitude',
        'affiliate_distance'
    ];
}
