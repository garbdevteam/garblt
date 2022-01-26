<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegionsBridgesProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegionsBridgesProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($regions_id)
    {
        $RegionsBridgesProjects = RegionsBridgesProject::orderBy('order', 'asc')->get();
        return view('backend.RegionsBridgesProject.index', compact('RegionsBridgesProjects','regions_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($regions_id)
    {
        return view('backend.RegionsBridgesProject.create', compact('regions_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $regions_id)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'length' => ['required'],
            'bridge_load' => ['required'],
            'cost' => ['required'],
            'file_image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);
        $validatedData['region_id'] = $regions_id;
        $validatedData['order'] = RegionsBridgesProject::max('order') + 1;

        $RegionsBridgesProject = RegionsBridgesProject::create($validatedData);

        if ($image = $request->file('file_image')) {

            $destinationPath = 'RegionsBridgesProject/' . $RegionsBridgesProject->id . "." . $image->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image->getRealPath()));

            $RegionsBridgesProject->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.regions_bridges.index', $regions_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($regions_id, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($regions_id, $id)
    {
        $RegionsBridgesProject = RegionsBridgesProject::findOrFail($id);
        return view('backend.RegionsBridgesProject.edit', compact('RegionsBridgesProject', 'regions_id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$regions_id, $id)
    {
        $RegionsBridgesProject = RegionsBridgesProject::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'length' => ['required'],
            'bridge_load' => ['required'],
            'cost' => ['required'],
            'file_image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);

        $RegionsBridgesProject->update($validatedData);

        if ($image = $request->file('file_image')) {

            if (Storage::exists($RegionsBridgesProject->StoragePathImage)) {
                Storage::delete($RegionsBridgesProject->StoragePathImage);
            }

            $destinationPath = 'RegionsBridgesProject/' . $RegionsBridgesProject->id . "." . $image->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image->getRealPath()));

            $RegionsBridgesProject->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.regions_bridges.index', $regions_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($regions_id, $id)
    {
        $RegionsBridgesProject = RegionsBridgesProject::findOrFail($id);

        $RegionsBridgesProject->delete();

        if (Storage::exists($RegionsBridgesProject->StoragePathImage)) {
            Storage::delete($RegionsBridgesProject->StoragePathImage);
        }

        return redirect()->route('admin.regions_bridges.index', $regions_id);

    }

    public function orderGet($regions_id)
    {
        $RegionsBridgesProjects = RegionsBridgesProject::orderBy('order')->get();
        return view('backend.RegionsBridgesProject.order', compact('RegionsBridgesProjects','regions_id'));
    }

    public function orderEdit(Request $request, $regions_id)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('admin.regions_bridges.index', $regions_id);
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $RegionsBridgesProjects = RegionsBridgesProject::all();
        foreach ($RegionsBridgesProjects as $RegionsBridgesProject) {
            $RegionsBridgesProject->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $RegionsBridgesProject = RegionsBridgesProject::findOrFail($ListItem);
            $RegionsBridgesProject->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.regions_bridges.index', $regions_id);
    }
}
