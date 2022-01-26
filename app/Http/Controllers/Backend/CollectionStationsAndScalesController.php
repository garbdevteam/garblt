<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CollectionStationsAndScales;
use Illuminate\Http\Request;

class CollectionStationsAndScalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CollectionStationsAndScales = CollectionStationsAndScales::orderBy('order', 'asc')->get();
        return view('backend.CollectionStationsAndScales.index', compact('CollectionStationsAndScales'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.CollectionStationsAndScales.create');
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
            'location' => ['required'],
            'subscription' => ['nullable'],
            'tariff' => ['nullable'],
        ]);


        $validatedData['order'] = CollectionStationsAndScales::max('order') + 1;

        $CollectionStationsAndScales = CollectionStationsAndScales::create($validatedData);


        return redirect()->route('admin.collection_stations_and_scales.index');

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
        $CollectionStationsAndScale = CollectionStationsAndScales::findOrFail($id);
        return view('backend.CollectionStationsAndScales.edit', compact('CollectionStationsAndScale'));

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
        $CollectionStationsAndScale = CollectionStationsAndScales::findOrFail($id);

        $validatedData = $request->validate([
            'title' => ['required'],
            'location' => ['required'],
            'subscription' => ['nullable'],
            'tariff' => ['nullable'],
        ]);

        $CollectionStationsAndScale->update($validatedData);

        return redirect()->route('admin.collection_stations_and_scales.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CollectionStationsAndScale = CollectionStationsAndScales::findOrFail($id);

        $CollectionStationsAndScale->delete();

        return redirect()->route('admin.collection_stations_and_scales.index');
    }

    public function orderGet()
    {
        $CollectionStationsAndScales = CollectionStationsAndScales::orderBy('order')->get();
        return view('backend.CollectionStationsAndScales.order', compact('CollectionStationsAndScales'));
    }

    public function orderEdit(Request $request)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('admin.collection_stations_and_scales.index');
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $CollectionStationsAndScales = CollectionStationsAndScales::all();
        foreach ($CollectionStationsAndScales as $CollectionStationsAndScale) {
            $CollectionStationsAndScale->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $CollectionStationsAndScale = CollectionStationsAndScales::findOrFail($ListItem);
            $CollectionStationsAndScale->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.collection_stations_and_scales.index');
    }

}
