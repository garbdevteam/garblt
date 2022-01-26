<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegionsRoadsProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegionsRoadsProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($regions_id)
    {
        $RegionsRoadsProjects = RegionsRoadsProject::orderBy('order', 'asc')->get();
        return view('backend.RegionsRoadsProject.index', compact('RegionsRoadsProjects','regions_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($regions_id)
    {
        return view('backend.RegionsRoadsProject.create', compact('regions_id'));

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
            'file_image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);
        $validatedData['region_id'] = $regions_id;
        $validatedData['order'] = RegionsRoadsProject::max('order') + 1;

        $RegionsRoadsProject = RegionsRoadsProject::create($validatedData);

        if ($image = $request->file('file_image')) {

            $destinationPath = 'RegionsRoadsProject/' . $RegionsRoadsProject->id . "." . $image->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image->getRealPath()));

            $RegionsRoadsProject->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.regions_roads.index', $regions_id);

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
        $RegionsRoadsProject = RegionsRoadsProject::findOrFail($id);
        return view('backend.RegionsRoadsProject.edit', compact('RegionsRoadsProject', 'regions_id'));

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
        $RegionsRoadsProject = RegionsRoadsProject::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'length' => ['required'],
            'file_image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);

        $RegionsRoadsProject->update($validatedData);

        if ($image = $request->file('file_image')) {

            if (Storage::exists($RegionsRoadsProject->StoragePathImage)) {
                Storage::delete($RegionsRoadsProject->StoragePathImage);
            }

            $destinationPath = 'RegionsRoadsProject/' . $RegionsRoadsProject->id . "." . $image->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image->getRealPath()));

            $RegionsRoadsProject->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.regions_roads.index', $regions_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($regions_id, $id)
    {
        $RegionsRoadsProject = RegionsRoadsProject::findOrFail($id);

        $RegionsRoadsProject->delete();

        if (Storage::exists($RegionsRoadsProject->StoragePathImage)) {
            Storage::delete($RegionsRoadsProject->StoragePathImage);
        }

        return redirect()->route('admin.regions_roads.index', $regions_id);

    }

    public function orderGet($regions_id)
    {
        $RegionsRoadsProjects = RegionsRoadsProject::orderBy('order')->get();
        return view('backend.RegionsRoadsProject.order', compact('RegionsRoadsProjects','regions_id'));
    }

    public function orderEdit(Request $request, $regions_id)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('admin.regions_roads.index', $regions_id);
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $RegionsRoadsProjects = RegionsRoadsProject::all();
        foreach ($RegionsRoadsProjects as $RegionsRoadsProject) {
            $RegionsRoadsProject->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $RegionsRoadsProject = RegionsRoadsProject::findOrFail($ListItem);
            $RegionsRoadsProject->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.regions_roads.index', $regions_id);
    }

}
