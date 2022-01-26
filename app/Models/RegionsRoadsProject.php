<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionsRoadsProject extends Model
{
    protected $fillable = [
        'region_id', 'name', 'location','length','image','order'
    ];

    public function getFullPathImageAttribute(){
        return env('APP_URL') . "storage/" . $this->image;
    }
    public function getStoragePathImageAttribute(){
        return "public/" . $this->image;
    }

}
