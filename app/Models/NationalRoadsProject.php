<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NationalRoadsProject extends Model
{
    protected $fillable = [
        'name', 'description','location', 'length', 'cost', 'image', 'order'
    ];

    public function getFullPathImageAttribute(){
        return env('APP_URL') . "storage/" . $this->image;
    }

    public function getStoragePathImageAttribute(){
        return "public/" . $this->image;
    }

}
