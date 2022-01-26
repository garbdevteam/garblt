<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadSigns extends Model
{
    protected $fillable = [
        'title', 'description', 'image','order'
    ];
    public function getFullPathImageAttribute(){
        return env('APP_URL') . "/storage" . $this->image;
    }
    public function getStoragePathImageAttribute(){
        return "public/" . $this->image;
    }

}
