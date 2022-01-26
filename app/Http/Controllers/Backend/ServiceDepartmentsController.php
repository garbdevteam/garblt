<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceDepartments;
use Illuminate\Support\Facades\Storage;

class ServiceDepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ServiceDepartments = ServiceDepartments::orderBy('id', 'desc')->get();
        return view('backend.ServiceDepartments.index', compact('ServiceDepartments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ServiceDepartments.create');
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
            'department_name' => ['required'],
            'context' => ['required'],
        ]);
        $validatedData['order'] = ServiceDepartments::max('order') + 1;

        $ServiceDepartment = ServiceDepartments::create($validatedData);

        return redirect()->route('admin.service_departments.index');

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
        $ServiceDepartment = ServiceDepartments::findOrFail($id);

        return view('backend.ServiceDepartments.edit', compact('ServiceDepartment'));

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
        $ServiceDepartment = ServiceDepartments::findOrFail($id);
        $validatedData = $request->validate([
            'department_name' => ['required'],
            'context' => ['required'],
        ]);
        $ServiceDepartment->update($validatedData);

        return redirect()->route('admin.service_departments.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ServiceDepartment = ServiceDepartments::findOrFail($id);
        $ServiceDepartment->delete();

        return redirect()->route('admin.service_departments.index');
    }


    public function orderGet()
    {
        $ServiceDepartments = ServiceDepartments::orderBy('order')->get();
        return view('backend.ServiceDepartments.order', compact('ServiceDepartments'));
    }

    public function orderEdit(Request $request)
    {
        //
        if ($request->list_order == null) {
            return redirect()->route('admin.service_departments.index');
        };

        $validatedData = $request->validate([
            'list_order' => ['required'],
        ]);

        $ServiceDepartments = ServiceDepartments::all();
        foreach ($ServiceDepartments as $ServiceDepartment) {
            $ServiceDepartment->update([
                'order' => null
            ]);
        }

        $orderCounter = 1;
        foreach (explode(",", $validatedData['list_order']) as $ListItem) {
            $ServiceDepartment = ServiceDepartments::findOrFail($ListItem);
            $ServiceDepartment->update([
                'order' => $orderCounter++
            ]);
        }

        return redirect()->route('admin.service_departments.index');
    }

}
