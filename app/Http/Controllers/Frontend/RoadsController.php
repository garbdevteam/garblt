<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RoadSigns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TrafficControl;
use App\Models\CollectionStationsAndScales;
use App\Models\NationalRoadsProject;

class RoadsController extends Controller
{


    public function RoadSignsGet()
    {
        $RoadSigns = RoadSigns::orderBy('order', 'asc')->paginate(6);
        return view('frontend.roads.RoadSigns', compact('RoadSigns'));
    }

    public function TrafficControlGet()
    {
        $TrafficControls = TrafficControl::orderBy('order', 'asc')->paginate(6);
        return view('frontend.roads.TrafficControl', compact('TrafficControls'));
    }

    public function CollectionStationsAndScalesGet()
    {
        $CollectionStationsAndScales = CollectionStationsAndScales::orderBy('order', 'asc')->paginate(6);
        return view('frontend.roads.CollectionStationsAndScales', compact('CollectionStationsAndScales'));
    }

    public function NationalRoadsProjectGet()
    {
        $NationalRoadsProjects = NationalRoadsProject::orderBy('order', 'asc')->get();
        return view('frontend.roads.NationalRoadsProjects', compact('NationalRoadsProjects'));

    }

    public function NationalRoadsProjectGetOne($id)
    {
        $project = NationalRoadsProject::where('id', $id)->first();
        return view('frontend.roads-bridges.projects.show', compact('project'));

    }

    public function AllowableLoadsGet()
    {
        //
        $contents ="";
        $path = "static_content\\roads\AllowableLoads";
        if (Storage::exists($path)) {
            $contents = Storage::get($path);
        }
        return view('frontend.roads.AllowableLoads', compact('contents'));
    }

    public function FutureProjectsGet()
    {
        $contents ="";
        $path = "static_content\\roads\FutureProjects";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('frontend.roads.FutureProjects', compact('contents'));
    }
    public function RoadNetworkMapGet()
    {
        $contents ="";
        $path = "static_content\\roads\RoadNetworkMap";

        if (Storage::exists($path)) {
            $contents = Storage::get($path);
        }
        return view('frontend.roads.RoadNetworkMap', compact('contents'));


    }

}
