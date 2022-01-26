<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Services = Services::orderBy('id', 'asc')->get();
        return view('backend.Services.index', compact('Services'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'services_name' => ['required'],
        ]);
        $validatedData['order'] = Services::max('order') + 1;
        $validatedData['service_image'] = $request->service_image;

        $Service = Services::create($validatedData);
       
        if ($request->hasFile('service_image')) {
            $image = $request->file('service_image');
            $destinationPath = 'services/' . $Service->id . "/";

            $fileName = 'full.' . $image->getClientOriginalExtension();
            $uploaded = Storage::put($destinationPath . $fileName, file_get_contents($image->getRealPath()));

            $Service->update([
                'service_image' => $destinationPath . $fileName,
            ]);

            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        $Service = Services::findOrFail($id);
        $validatedData = $request->validate([
            'services_name' => ['required'],
        ]);
        $Service->update($validatedData);
        if ($request->hasFile('service_image')) {
            $image = $request->file('service_image');
            $destinationPath = 'services/' . $Service->id . "/";

            $fileName = 'full.' . $image->getClientOriginalExtension();
            $uploaded = Storage::put($destinationPath . $fileName, file_get_contents($image->getRealPath()));

            $Service->update([
                'service_image' => $destinationPath . $fileName,
            ]);

            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Service = Services::findOrFail($id);
        $Service->delete();

        return redirect()->route('admin.services.index');
    }

    public function orderGet()
    {
        $Services = Services::orderBy('order','asc')->get();
        return view('backend.Services.order', compact('Services'));
    }

    public function orderEdit(Request $request)
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

    public function getImage($service_id){
       // return $service_id;

        $Services = Services::findOrFail($service_id);
        $path = "public/services/full.jpg";
        if ($Services->service_image != null) {
            $exists = Storage::exists($Services->service_image);
            if ($exists) {
                $path = $Services->service_image;
            }
        }
        $file = Storage::get($path);
        $mimeType = Storage::mimeType($path);
        return response($file, 200)
            ->header('Content-Type', $mimeType);

    }

}
