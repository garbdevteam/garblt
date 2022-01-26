<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TendersAndAuctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TendersAndAuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TendersAndAuctions = TendersAndAuctions::orderBy('id', 'desc')->get();
        return view('backend.TendersAndAuctions.index', compact('TendersAndAuctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.TendersAndAuctions.create');
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
            'end_date.day' => ['required'],
            'end_date.month' => ['required'],
            'end_date.year' => ['required'],
            'number' => ['required'],
            'auction_file' => ['required', 'file', 'max:10000'],
            'price' => ['required'],
            'primary_insurance' => ['required'],
            'description' => ['required']
        ]);

        if ($validatedData['end_date']) {
            if (!checkdate(request()->end_date['month'], request()->end_date['day'], request()->end_date['year'])) {
                return redirect()->back()->withErrors(['خطأ بتاريخ الانتهاء']);
            }
            $validatedData['end_date'] = request()->end_date['year'] . "-" . request()->end_date['month'] . "-" . request()->end_date['day'];
        }

        $TendersAndAuction = TendersAndAuctions::create($validatedData);

        if ($file = $request->file('auction_file')) {
            if ($request->file('auction_file')->getClientOriginalExtension() == "pdf") {
                $destinationPath = 'TendersAndAuction/' . $TendersAndAuction->id . "." . $file->getClientOriginalExtension();

                $uploaded = Storage::put("public/" . $destinationPath, file_get_contents($file->getRealPath()));
                $TendersAndAuction->update([
                    'file' => $destinationPath,
                ]);
            }
        }

        return redirect()->route('admin.auctions.index');
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
        $TendersAndAuction = TendersAndAuctions::findOrFail($id);

        return view('backend.TendersAndAuctions.edit', compact('TendersAndAuction'));

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
        $TendersAndAuction = TendersAndAuctions::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required'],
            'end_date.day' => ['required'],
            'end_date.month' => ['required'],
            'end_date.year' => ['required'],
            'number' => ['required'],
            'auction_file' => ['nullable', 'file', 'max:10000'],
            'price' => ['required'],
            'primary_insurance' => ['required'],
            'description' => ['required']
        ]);
        if ($validatedData['end_date']) {
            if (!checkdate(request()->end_date['month'], request()->end_date['day'], request()->end_date['year'])) {
                return redirect()->back()->withErrors(['خطأ بتاريخ الانتهاء']);
            }
            $validatedData['end_date'] = request()->end_date['year'] . "-" . request()->end_date['month'] . "-" . request()->end_date['day'];
        }

        $TendersAndAuction->update($validatedData);

        if ($file = $request->file('auction_file')) {
            if ($request->file('auction_file')->getClientOriginalExtension() == "pdf") {
                if (Storage::exists($TendersAndAuction->StoragePathFile)) {
                    Storage::delete($TendersAndAuction->StoragePathFile);
                }

                $destinationPath = 'TendersAndAuction/' . $TendersAndAuction->id . "." . $file->getClientOriginalExtension();

                $uploaded = Storage::put("public/" . $destinationPath, file_get_contents($file->getRealPath()));
                $TendersAndAuction->update([
                    'file' => $destinationPath,
                ]);
            }
        }

        return redirect()->route('admin.auctions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TendersAndAuction = TendersAndAuctions::findOrFail($id);

        $TendersAndAuction->delete();

        if (Storage::exists($TendersAndAuction->StoragePathFile)) {
            Storage::delete($TendersAndAuction->StoragePathFile);
        }

        return redirect()->route('admin.auctions.index');


    }
}
