<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UtilityPagesController extends Controller
{
    public function PrivacyPolicyGet()
    {
        $contents ="";
        $path = "static_content\UtilityPage\PrivacyPolicy";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('backend.UtilityPage.PrivacyPolicy', compact('contents'));
    }
    public function PrivacyPolicyUpdate(Request $request)
    {
        //
        Storage::put('static_content\UtilityPage\PrivacyPolicy', $request->text);
        return redirect()->route('admin.utility_page.privacy_policy');
    }
    public function TermsAndConditionsGet()
    {
        $contents ="";
        $path = "static_content\UtilityPage\TermsAndConditions";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('backend.UtilityPage.TermsAndConditions', compact('contents'));
    }
    public function TermsAndConditionsUpdate(Request $request)
    {
        //
        Storage::put('static_content\UtilityPage\TermsAndConditions', $request->text);
        return redirect()->route('admin.utility_page.terms_and_conditions');
    }
    public function DisclaimerGet()
    {
        $contents ="";
        $path = "static_content\UtilityPage\Disclaimer";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('backend.UtilityPage.Disclaimer', compact('contents'));
    }
    public function DisclaimerUpdate(Request $request)
    {
        //
        Storage::put('static_content\UtilityPage\Disclaimer', $request->text);
        return redirect()->route('admin.utility_page.disclaimer');
    }

    // Route::get('/utility_page/disclaimer', 'Backend\UtilityPagesController@DisclaimerGet')->name('utility_page.disclaimer');
    // Route::patch('/utility_page/disclaimer', 'Backend\UtilityPagesController@DisclaimerUpdate')->name('utility_page.disclaimer');

}
