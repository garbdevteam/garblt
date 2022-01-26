<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Regions;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Regions = Regions::orderBy('order', 'asc')->get();

        return view('backend.regions.index', compact('Regions'));

    }
    public function orderGet()
    {
        $Regions = Regions::orderBy('order')->get();
        return view('backend.regions.order', compact('Regions'));
    }

    public function orderEdit(Request $request)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('regions.index');
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $Regions = Regions::all();
        foreach ($Regions as $Region) {
            $Region->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $Region = Regions::findOrFail($ListItem);
            $Region->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.regions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.regions.create');
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
        $validatedData = $request->validate([
            'name' => ['required'],
            'chief_name' => ['required'],
            'telephone' => ['required'],
            'fax' => ['required'],
        ]);

        $RegionsLAstOrder = Regions::max('id');
        $validatedData['order'] = $RegionsLAstOrder + 1;

        Regions::create($validatedData);

        return redirect()->route('admin.regions.index');
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
        $Region = Regions::findOrFail($id);
        return view('backend.regions.edit', compact('Region'));
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
        $Region = Regions::findOrFail($id);
        $validatedData = $request->validate([
            'name' => ['required'],
            'chief_name' => ['required'],
            'telephone' => ['required'],
            'fax' => ['required'],
        ]);

        $Region->update($validatedData);

        return redirect()->route('admin.regions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Region = Regions::findOrFail($id);

        $Region->delete();

        return redirect()->route('admin.regions.index');
    }
}
