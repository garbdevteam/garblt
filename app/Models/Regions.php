<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    protected $fillable = [
        'name', 'chief_name', 'telephone','fax','order'
    ];

}
