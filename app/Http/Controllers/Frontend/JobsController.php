<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function JobsGet()
    {
        $Jobs = Jobs::paginate(20);
        return view('frontend.jobs.jobs',compact('Jobs'));
    }

}
