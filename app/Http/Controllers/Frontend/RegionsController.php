<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Regions;
use Illuminate\Http\Request;
use App\Models\RegionsRoadsProject;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Regions = Regions::orderBy('order', 'ASC')->paginate(6);
        return view('frontend.regions.regions', compact('Regions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Region = Regions::findOrFail($id);
        return view('frontend.regions.regions-detail', compact('Region'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RegionBridges($region_id)
    {
        $Bridges = RegionsBridgesProject::where('region_id', $region_id)->orderBy('order','asc')->get();
        return view('frontend.regions.Bridgesprojects', compact('Bridges','region_id'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RegionRoads($region_id)
    {
        $Roads = RegionsRoadsProject::where('region_id', $region_id)->orderBy('order','asc')->get();
        return view('frontend.regions.roadsProject', compact('Roads','region_id'));
    }


}
