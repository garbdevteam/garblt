<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Jobses = Jobs::orderBy('id', 'desc')->get();
        return view('backend.Jobs.index', compact('Jobses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Jobs.create');

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
            'description' => ['required'],
            'job_file' => ['required', 'mimes:pdf', 'max:10000'],
        ]);
        if ($validatedData['end_date']) {
            if (!checkdate(request()->end_date['month'], request()->end_date['day'], request()->end_date['year'])) {
                return redirect()->back()->withErrors(['خطأ بتاريخ الانتهاء']);
            }
            $validatedData['end_date'] = request()->end_date['year'] . "-" . request()->end_date['month'] . "-" . request()->end_date['day'];
        }

        $Jobs = Jobs::create($validatedData);

        if ($file = $request->file('job_file')) {

            $destinationPath = 'Jobs/' . $Jobs->id . "." . $file->getClientOriginalExtension();

            $uploaded = Storage::put("public/" . $destinationPath, file_get_contents($file->getRealPath()));
            $Jobs->update([
                'file' => $destinationPath,
            ]);

        }

        return redirect()->route('admin.jobs.index');

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
        $Jobs = Jobs::findOrFail($id);
        return view('backend.Jobs.edit', compact('Jobs'));

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
        $Jobs = Jobs::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required'],
            'end_date.day' => ['required'],
            'end_date.month' => ['required'],
            'end_date.year' => ['required'],
            'description' => ['required'],
            'job_file' => ['nullable', 'mimes:pdf', 'max:10000'],
        ]);
        if ($validatedData['end_date']) {
            if (!checkdate(request()->end_date['month'], request()->end_date['day'], request()->end_date['year'])) {
                return redirect()->back()->withErrors(['خطأ بتاريخ الانتهاء']);
            }
            $validatedData['end_date'] = request()->end_date['year'] . "-" . request()->end_date['month'] . "-" . request()->end_date['day'];
        }

        $Jobs->update($validatedData);

        if ($file = $request->file('job_file')) {

            if (Storage::exists($Jobs->StoragePathFile)) {
                Storage::delete($Jobs->StoragePathFile);
            }

            $destinationPath = 'Jobs/' . $Jobs->id . "." . $file->getClientOriginalExtension();

            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($file->getRealPath()));

            $Jobs->update([
                'file' => $destinationPath,
            ]);
        }

        return redirect()->route('admin.jobs.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Jobs = Jobs::findOrFail($id);

        $Jobs->delete();

        if (Storage::exists($Jobs->StoragePathFile)) {
            Storage::delete($Jobs->StoragePathFile);
        }

        return redirect()->route('admin.jobs.index');

    }
}
