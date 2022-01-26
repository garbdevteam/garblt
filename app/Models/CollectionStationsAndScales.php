<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionStationsAndScales extends Model
{
    protected $fillable = [
        'title', 'location', 'subscription','tariff','order'
    ];

}
