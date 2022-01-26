<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TrafficControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrafficControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TrafficControls = TrafficControl::orderBy('order', 'asc')->get();
        return view('backend.TrafficControl.index', compact('TrafficControls'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.TrafficControl.create');

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
            'image_file' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);
        $validatedData['order'] = TrafficControl::max('order') + 1;

        $TrafficControl = TrafficControl::create($validatedData);

        if ($image_file = $request->file('image_file')) {

            $destinationPath = 'TrafficControl/' . $TrafficControl->id . "." . $image_file->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image_file->getRealPath()));

            $TrafficControl->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.traffic_control.index');

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
        $TrafficControl = TrafficControl::findOrFail($id);
        return view('backend.TrafficControl.edit', compact('TrafficControl'));

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
        $TrafficControl = TrafficControl::findOrFail($id);

        $validatedData = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image_file' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);

        $TrafficControl->update($validatedData);


        if ($image_file = $request->file('image_file')) {

            if (Storage::exists($TrafficControl->StoragePathImage)) {
                Storage::delete($TrafficControl->StoragePathImage);
            }

            $destinationPath = 'TrafficControl/' . $TrafficControl->id . "." . $image_file->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image_file->getRealPath()));

            $TrafficControl->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.traffic_control.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TrafficControl = TrafficControl::findOrFail($id);

        $TrafficControl->delete();

        if (Storage::exists($TrafficControl->StoragePathImage)) {
            Storage::delete($TrafficControl->StoragePathImage);
        }

        return redirect()->route('admin.traffic_control.index');

    }

    public function orderGet()
    {
        $TrafficControls = TrafficControl::orderBy('order')->get();
        return view('backend.TrafficControl.order', compact('TrafficControls'));
    }

    public function orderEdit(Request $request)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('admin.traffic_control.index');
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $TrafficControls = TrafficControl::all();
        foreach ($TrafficControls as $TrafficControl) {
            $TrafficControl->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $TrafficControl = TrafficControl::findOrFail($ListItem);
            $TrafficControl->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.traffic_control.index');
    }

}
