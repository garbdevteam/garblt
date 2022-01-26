<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFile extends Model
{
    protected $fillable = [
        'service_id', 'name', 'file_path','order'
    ];

    public function getFullPathFileAttribute(){
        return env('APP_URL') . "storage/" . $this->file_path;
    }
    public function getStoragePathFileAttribute(){
        return "public/" . $this->file_path;
    }


}
