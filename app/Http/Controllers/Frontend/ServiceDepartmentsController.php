<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceDepartments;
use Illuminate\Http\Request;

class ServiceDepartmentsController extends Controller
{
    public function ServiceDepartmentsGet($service_departments_id)
    {
        $ServiceDepartment = ServiceDepartments::findOrFail($service_departments_id);
        return view('frontend.ServiceDepartments.ServiceDepartment', compact('ServiceDepartment'));

    }

}

