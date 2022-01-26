<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TendersAndAuctions extends Model
{
    protected $fillable = [
        'name', 'number', 'end_date', 'file', 'price', 'primary_insurance', 'description'
    ];

    public function getFullPathFileAttribute(){
        return env('APP_URL') . "storage/" . $this->file;
    }

    public function getStoragePathFileAttribute(){
        return "public/" . $this->file;
    }

}

