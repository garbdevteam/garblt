<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoadSigns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoadSignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RoadSigns = RoadSigns::orderBy('order', 'asc')->get();
        return view('backend.RoadSigns.index', compact('RoadSigns'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.RoadSigns.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);
        $validatedData['order'] = RoadSigns::max('order') + 1;

        $RoadSign = RoadSigns::create($validatedData);

        if ($image_file = $request->file('image')) {

            $destinationPath = 'RoadSign/' . $RoadSign->id . "." . $image_file->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image_file->getRealPath()));

            $RoadSign->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.road_signs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RoadSign = RoadSigns::findOrFail($id);
        return view('backend.RoadSigns.edit', compact('RoadSign'));

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
        $RoadSign = RoadSigns::findOrFail($id);

        $validatedData = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image_file' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);

        $RoadSign->update($validatedData);


        if ($image_file = $request->file('image_file')) {

            if (Storage::exists($RoadSign->StoragePathImage)) {
                Storage::delete($RoadSign->StoragePathImage);
            }

            $destinationPath = 'RoadSign/' . $RoadSign->id . "." . $image_file->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image_file->getRealPath()));

            $RoadSign->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.road_signs.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $RoadSign = RoadSigns::findOrFail($id);

        $RoadSign->delete();

        if (Storage::exists($RoadSign->StoragePathImage)) {
            Storage::delete($RoadSign->StoragePathImage);
        }

        return redirect()->route('admin.road_signs.index');

    }

    public function orderGet()
    {
        $RoadSigns = RoadSigns::orderBy('order')->get();
        return view('backend.RoadSigns.order', compact('RoadSigns'));
    }

    public function orderEdit(Request $request)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('admin.road_signs.index');
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $RoadSigns = RoadSigns::all();
        foreach ($RoadSigns as $RoadSign) {
            $RoadSign->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $RoadSign = RoadSigns::findOrFail($ListItem);
            $RoadSign->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.road_signs.index');
    }

}
