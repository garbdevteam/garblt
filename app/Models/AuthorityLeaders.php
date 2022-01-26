<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorityLeaders extends Model
{
    protected $fillable = [
        'name', 'title','thumbnail_image','order'
    ];

    public function getFullPathImageAttribute(){
        return env('APP_URL') . "storage/" . $this->thumbnail_image;
    }
    public function getStoragePathImageAttribute(){
        return "public/" . $this->thumbnail_image;
    }

}
