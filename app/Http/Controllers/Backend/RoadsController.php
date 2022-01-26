<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoadsController extends Controller
{

    // AllowableLoadsGet
    // AllowableLoadsUpdate
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllowableLoadsGet()
    {
        $contents ="";
        $path = "static_content\\roads\AllowableLoads";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('backend.Roads.AllowableLoads', compact('contents'));


    }
    public function AllowableLoadsUpdate(Request $request)
    {
        //
        Storage::put('static_content\\roads\AllowableLoads', $request->text);
        return redirect()->route('admin.roads.allowable_loads');
    }


    public function FutureProjectsGet()
    {
        $contents ="";
        $path = "static_content\\roads\FutureProjects";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('backend.Roads.FutureProjects', compact('contents'));


    }
    public function FutureProjectsUpdate(Request $request)
    {
        //
        Storage::put('static_content\roads\FutureProjects', $request->text);
        return redirect()->route('admin.roads.future_projects');
    }
    public function RoadNetworkMapGet()
    {
        $contents ="";
        $path = "static_content\\roads\RoadNetworkMap";

        if (Storage::exists($path)) {
            $contents = Storage::get($path);
        }
        return view('backend.Roads.RoadNetworkMap', compact('contents'));


    }
    public function RoadNetworkMapUpdate(Request $request)
    {
        //
        Storage::put('static_content\\roads\RoadNetworkMap', $request->text);
        return redirect()->route('admin.roads.road_network_map');
    }



    /**
     * Display a listing of the resource.
     *`
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
