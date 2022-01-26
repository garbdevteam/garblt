<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'news_date', 'title', 'description','thumbnail_image','full_image'
    ];

}
