<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UtilityPagesController extends Controller
{
    public function DisclaimerGet()
    {
        $contents ="";
        $path = "static_content\UtilityPage\Disclaimer";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('frontend.UtilityPages.Disclaimer', compact('contents'));
    }

    public function TermsAndConditionsGet()
    {
        $contents ="";
        $path = "static_content\UtilityPage\TermsAndConditions";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('frontend.UtilityPages.TermsAndConditions', compact('contents'));
    }
    public function PrivacyPolicyGet()
    {
        $contents ="";
        $path = "static_content\UtilityPage\PrivacyPolicy";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }


        return view('frontend.UtilityPages.PrivacyPolicy', compact('contents'));
    }

}

