<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Jobs;
use App\Models\NationalRoadsProject;
use App\Models\RegionsRoadsProject;
use App\Models\RegionsBridgesProject;
use App\Models\RoadSigns;
use App\Models\Services;
use App\Models\Regions;
use App\Models\ImageAssets;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\TendersAndAuctions;
use Illuminate\Support\Facades\Storage;
use App\Models\CollectionStationsAndScales;


class FrontencController extends Controller
{
    public function roadNetworkMap()
    {
        $contents ="";
        $path = "static_content\\roads\RoadNetworkMap";

        if (Storage::exists($path)) {
            $contents = Storage::get($path);
        }
        return view('frontend.roads-bridges.road-network',compact('contents'));
    }
    public function projects()
    {
        $projects = NationalRoadsProject::orderBy('id',"desc")->take(10)->get();
        return view('frontend.roads-bridges.projects.index', compact('projects'));
    }
    public function tollingStation()
    {
        $station = CollectionStationsAndScales::orderBy('id',"desc")->take(4)->get();
        return view('frontend.roads-bridges.tolling-station.index', compact('station'));
    }

    public function allowableLoads()
    {
        $contents ="";
        $path = "static_content\\roads\AllowableLoads";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }

        $roads = RegionsRoadsProject::orderBy('id', 'desc')->take(4)->get();
        $bridges = RegionsBridgesProject::orderBy('id', 'desc')->take(4)->get();

        return view('frontend.roads-bridges.allowable-loads.index' , compact('contents', 'roads', 'bridges'));
    }
    public function roadSafety()
    {
        $RoadSign = RoadSigns::orderBy('id', "desc")->take(20)->get();
        return view('frontend.roads-bridges.road-safety.index', compact('RoadSign'));
    }
    public function regions()
    {

        $regions = Regions::orderBy('id', 'desc')->take(20)->get();

        return view('frontend.regions.index', compact('regions'));
    }
    public function regionDetails($id)
    {
        //return $id;
        $roads = RegionsRoadsProject::where('region_id', $id)->orderBy('id', 'desc')->take(4)->get();
        $bridges = RegionsBridgesProject::where('region_id', $id)->orderBy('id', 'desc')->take(4)->get();
        return view('frontend.regions.show', compact('roads', 'bridges'));
    }
    public function services()
    {
        $services = Services::all();
        return view('frontend.services.index', compact('services'));
    }

    public function news()
    {
        $News = News::orderBy('id', "desc")->take(9)->get();
        return view('frontend.news.index', compact('News'));
    }

    public function newsShowOne($id){

        $News = News::where('id', $id)->first();
        return view('frontend.news.show', compact('News'));

    }
    public function media()
    {
        $media = ImageAssets::orderBy('id', 'desc')->get();

        return view('frontend.media.index', compact('media'));
    }
    public function tender()
    {
        $tenders = TendersAndAuctions::orderBy('id', 'desc')->take(20)->get();
        return view('frontend.tender.index', compact('tenders'));
    }
    public function tenderShow($id)
    {
        $tender = TendersAndAuctions::find($id);
        return view('frontend.tender.show', compact('tender'));
    }

    public function jobs()
    {
        $jobs = Jobs::orderBy('id', "desc")->take(20)->get();
        return view('frontend.jobs.index',compact('jobs'));
    }
    public function jobsShow($id)
    {
        $job = Jobs::find($id);
        return view('frontend.jobs.show', compact('job'));
    }

    public function contactUs()
    {
        return view('frontend.contact-us.index');
    }

    // public function storeContactUs(Request $request){
    //     //return $request->all();
    //     $validatedData = $request->validate([
    //         'name' => ['required'],
    //         'email' => ['required'],
    //         'phone' => ['required'],
    //         'message' => ['required'],
    //     ]);

    //     $contact = ContactUs::create($validatedData);

    //     return view('frontend.contact-us.index')->with(['success' => 'تم ارسال رسالتم بنجاح']);


    // }
    public function termsConditions()
    {
        $contents ="";
        $path = "static_content\UtilityPage\TermsAndConditions";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('frontend.terms-conditions.index', compact('contents'));
    }
    public function privacyPolicy()
    {
        $contents ="";
        $path = "static_content\UtilityPage\PrivacyPolicy";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }
        return view('frontend.privacy-policy.index', compact('contents'));
    }
    public function faq()
    {
        return view('frontend.faq.index');
    }

    public function DisclaimerGet()
    {
        $contents ="";
        $path = "static_content\UtilityPage\Disclaimer";

        if (Storage::exists($path)) {

            $contents = Storage::get($path);
        }

        return view('frontend.disclaimer.index', compact('contents'));
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }




}
