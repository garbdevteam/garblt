<?php

use App\Models\Regions;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Regions::create([
            'name' => "المنطقة الاولي المركزية",
            'chief_name' => "مهندس / عماد حسين",
            'telephone' => "0223892176",
            'fax' => "0223892176",
        ]);
        Regions::create([
            'name' => "المنطقة الثانية",
            'chief_name' => "مهندس / عماد حسين",
            'telephone' => "0223892176",
            'fax' => "0223892176",
        ]);
        Regions::create([
            'name' => "المنطقة الثالثة",
            'chief_name' => "مهندس / عماد حسين",
            'telephone' => "0223892176",
            'fax' => "0223892176",
        ]);
        Regions::create([
            'name' => "المنطقة الرابعة",
            'chief_name' => "مهندس / عماد حسين",
            'telephone' => "0223892176",
            'fax' => "0223892176",
        ]);
        Regions::create([
            'name' => "المنطقة الخامسة",
            'chief_name' => "مهندس / عماد حسين",
            'telephone' => "0223892176",
            'fax' => "0223892176",
        ]);
        Regions::create([
            'name' => "المنطقة السادسة",
            'chief_name' => "مهندس / عماد حسين",
            'telephone' => "0223892176",
            'fax' => "0223892176",
        ]);
        Regions::create([
            'name' => "المنطقة السابعة",
            'chief_name' => "مهندس / عماد حسين",
            'telephone' => "0223892176",
            'fax' => "0223892176",
        ]);
    }
}

