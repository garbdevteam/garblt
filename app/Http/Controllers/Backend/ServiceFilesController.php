<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceFile;
use Illuminate\Http\Request;

class ServiceFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($service_id)
    {
        $ServiceFile = ServiceFile::where('service_id', $service_id)->orderBy('id', 'asc')->get();
        return view('backend.ServiceFiles.index', compact('ServiceFile','service_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service_id)
    {
        //
        return view('backend.Services.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$service_id)
    {
        $validatedData = $request->validate([
            'services_name' => ['required'],
        ]);
        $validatedData['order'] = Services::max('order') + 1;

        $Service = Services::create($validatedData);

        return redirect()->route('admin.services.index');

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
    public function edit($service_id, $id)
    {
        $Service = Services::findOrFail($id);

        return view('backend.Services.edit', compact('Service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$service_id, $id)
    {
        $Service = Services::findOrFail($id);
        $validatedData = $request->validate([
            'services_name' => ['required'],
        ]);
        $Service->update($validatedData);

        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($service_id, $id)
    {
        $Service = Services::findOrFail($id);
        $Service->delete();

        return redirect()->route('admin.services.index');
    }


    public function orderGet($service_id)
    {
        $Services = Services::orderBy('order','asc')->get();
        return view('backend.Services.order', compact('Services'));
    }

    public function orderEdit(Request $request, $service_id)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('admin.services.index');
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $Services = Services::all();
        foreach ($Services as $Service) {
            $Service->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $Service = Services::findOrFail($ListItem);
            $Service->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.services.index');
    }

}
