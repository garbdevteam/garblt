<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDepartments extends Model
{
    protected $fillable = [
        'department_name', 'context', 'order'
    ];

}
