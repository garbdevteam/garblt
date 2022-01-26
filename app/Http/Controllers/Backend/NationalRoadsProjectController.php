<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NationalRoadsProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class NationalRoadsProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $NationalRoadsProjects = NationalRoadsProject::orderBy('order', 'asc')->get();

        return view('backend.NationalRoadsProject.index', compact('NationalRoadsProjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.NationalRoadsProject.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $validatedData = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'location' => ['required'],
            'length' => ['required'],
            'cost' => ['required'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);

        $validatedData['order'] = NationalRoadsProject::max('order') + 1;

        $NationalRoadsProject = NationalRoadsProject::create($validatedData);

        if ($image = $request->file('image')) {

            if (Storage::exists($NationalRoadsProject->StoragePathImage)) {
                Storage::delete($NationalRoadsProject->StoragePathImage);
            }

            $destinationPath = 'NationalRoadsProject/' . $NationalRoadsProject->id . "." . $image->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image->getRealPath()));

            $NationalRoadsProject->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.national_roads_project.index');

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
        $NationalRoadsProject = NationalRoadsProject::findOrFail($id);
        return view('backend.NationalRoadsProject.edit', compact('NationalRoadsProject'));

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
        $NationalRoadsProject = NationalRoadsProject::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'location' => ['required'],
            'length' => ['required'],
            'cost' => ['required'],
            'image_file' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);

        $NationalRoadsProject->update($validatedData);

        if ($image = $request->file('image')) {

            if (Storage::exists($NationalRoadsProject->StoragePathImage)) {
                Storage::delete($NationalRoadsProject->StoragePathImage);
            }

            $destinationPath = 'NationalRoadsProject/' . $NationalRoadsProject->id . "." . $image->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image->getRealPath()));

            $NationalRoadsProject->update([
                'image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.national_roads_project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $NationalRoadsProject = NationalRoadsProject::findOrFail($id);

        $NationalRoadsProject->delete();

        if (Storage::exists($NationalRoadsProject->StoragePathImage)) {
            Storage::delete($NationalRoadsProject->StoragePathImage);
        }

        return redirect()->route('admin.national_roads_project.index');
    }

    public function orderGet()
    {
        $NationalRoadsProjects = NationalRoadsProject::orderBy('order')->get();
        return view('backend.NationalRoadsProject.order', compact('NationalRoadsProjects'));
    }

    public function orderEdit(Request $request)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('admin.national_roads_project.index');
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $NationalRoadsProjects = NationalRoadsProject::all();
        foreach ($NationalRoadsProjects as $NationalRoadsProject) {
            $NationalRoadsProject->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $NationalRoadsProject = NationalRoadsProject::findOrFail($ListItem);
            $NationalRoadsProject->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.national_roads_project.index');
    }

    public function GetFullImage(){
        $nationalroadsproject_id = 4;
        $nationalroadsproject = NationalRoadsProject::findOrFail($nationalroadsproject_id);
         $path = "/public/NationalRoadsProject";
         //return $path;
         if ($nationalroadsproject->image != null) {
             $exists = Storage::exists($nationalroadsproject->image);
             if ($exists) {
                 $path = $nationalroadsproject->image;
             }
         }
        // return $path;
         $file = Storage::get($path);
         var_dump($file);
         die();
         $mimeType = Storage::mimeType($path);
         return response($file, 200)
             ->header('Content-Type', $mimeType);
 
    }

}
