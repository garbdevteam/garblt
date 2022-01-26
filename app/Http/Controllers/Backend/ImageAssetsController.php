<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImageAssets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ImageAssets = ImageAssets::paginate(30);
        return view('backend.image_assets.index', compact('ImageAssets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.image_assets.create');

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
            'title' => ['required'],
            'in_list' => ['required'],
            'image_file' => ['required', 'mimes:jpeg,jpg,png,gif', 'max:2000'],
        ]);

        $ImageAssets = ImageAssets::create($validatedData);

        if ($image = $request->file('image_file')) {

            $destinationPath = "image_assets/" ;

            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $uploaded = Storage::put("public/" . $destinationPath . $fileName, file_get_contents($image->getRealPath()));

            $ImageAssets->update([
                'image' => $destinationPath . $fileName,
            ]);
        }

        return redirect()->route('admin.image_assets.index');

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
        $ImageAsset = ImageAssets::findOrFail($id);

        return view('backend.image_assets.edit', compact('ImageAsset'));

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
        $ImageAsset = ImageAssets::findOrFail($id);

        $validatedData = $request->validate([
            'title' => ['required'],
            'in_list' => ['required'],
        ]);

        $ImageAsset->update($validatedData);

        return redirect()->route('admin.image_assets.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ImageAsset = ImageAssets::findOrFail($id);

            if (Storage::exists($ImageAsset->StoragePathImage)) {
                Storage::delete($ImageAsset->StoragePathImage);
            }
        $ImageAsset->delete();

        return redirect()->route('admin.image_assets.index');

    }
}
