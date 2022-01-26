<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageAssets extends Model
{
    protected $fillable = [
        'title', 'image', 'in_list'
    ];

    public function getFullPathImageAttribute(){
        return env('APP_URL') . "storage/" . $this->image;
    }

    public function getStoragePathImageAttribute(){
        return "public/" . $this->image;
    }
}
