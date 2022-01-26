<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = [
        'name', 'end_date', 'description', 'file'
    ];

    public function getFullPathFileAttribute(){
        return env('APP_URL') . "/storage/" . $this->file;
    }

    public function getStoragePathFileAttribute(){
        return "public/" . $this->file;
    }

}
