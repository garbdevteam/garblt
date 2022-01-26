<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AuthorityLeaders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorityLeadersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AuthorityLeaders = AuthorityLeaders::orderBy('order', 'asc')->get();
        return view('backend.AuthorityLeaders.index', compact('AuthorityLeaders'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.AuthorityLeaders.create');
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
            'name' => ['required'],
            'title' => ['required'],
            'thumbnail_image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);
        $validatedData['order'] = AuthorityLeaders::max('order') + 1;

        $AuthorityLeader = AuthorityLeaders::create($validatedData);

        if ($image = $request->file('thumbnail_image')) {
            $destinationPath = 'AuthorityLeader/' . $AuthorityLeader->id . "." . $image->getClientOriginalExtension();
            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image->getRealPath()));
            $AuthorityLeader->update([
                'thumbnail_image' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.authority_leaders.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AuthorityLeader = AuthorityLeaders::findOrFail($id);
        return view('backend.AuthorityLeaders.edit', compact('AuthorityLeader'));
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
        $AuthorityLeader = AuthorityLeaders::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required'],
            'title' => ['required'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);

        $AuthorityLeader->update($validatedData);

        if ($image = $request->file('image')) {
            if (Storage::exists($AuthorityLeader->StoragePathImage)) {
                Storage::delete($AuthorityLeader->StoragePathImage);
            }
            $destinationPath = 'AuthorityLeader/' . $AuthorityLeader->id . "." . $image->getClientOriginalExtension();
            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image->getRealPath()));
            $AuthorityLeader->update([
                'thumbnail_image' => $destinationPath,
            ]);
        }
        return redirect()->route('admin.authority_leaders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $AuthorityLeader = AuthorityLeaders::findOrFail($id);

        $AuthorityLeader->delete();

        if (Storage::exists($AuthorityLeader->StoragePathImage)) {
            Storage::delete($AuthorityLeader->StoragePathImage);
        }

        return redirect()->route('admin.authority_leaders.index');
    }

    public function orderGet()
    {
        $AuthorityLeaders = AuthorityLeaders::orderBy('order')->get();
        return view('backend.AuthorityLeaders.order', compact('AuthorityLeaders'));
    }

    public function orderEdit(Request $request)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('authority_leaders.index');
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $AuthorityLeaders = AuthorityLeaders::all();
        foreach ($AuthorityLeaders as $AuthorityLeader) {
            $AuthorityLeader->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $AuthorityLeader = AuthorityLeaders::findOrFail($ListItem);
            $AuthorityLeader->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.authority_leaders.index');
    }

}
