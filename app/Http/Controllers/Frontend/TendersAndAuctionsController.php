<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TendersAndAuctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TendersAndAuctionsController extends Controller
{
    //
    public function TendersAndAuctionsGet()
    {
        $TendersAndAuctions = TendersAndAuctions::paginate(20);
        return view('frontend.TendersAndAuctions.TendersAndAuctions',compact('TendersAndAuctions'));
    }

}
