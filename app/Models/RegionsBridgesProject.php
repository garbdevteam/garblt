<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionsBridgesProject extends Model
{
    protected $fillable = [
        'region_id', 'name', 'location','length','bridge_load','cost', 'image','order'
    ];

    public function getFullPathImageAttribute(){
        return env('APP_URL') . "storage/" . $this->image;
    }
    public function getStoragePathImageAttribute(){
        return "public/" . $this->image;
    }

}
