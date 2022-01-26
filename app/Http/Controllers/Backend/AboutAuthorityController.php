<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AuthorityLeaders;
use App\Models\contact_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AboutAuthorityController extends Controller
{

    public function AboutAuthority()
    {
        //
        $ImportanceOfAuthority = "";
        $ImportanceOfAuthorityPath = "static_content\AboutAuthority\ImportanceOfAuthority";
        if (Storage::exists($ImportanceOfAuthorityPath)) {
            $ImportanceOfAuthority = Storage::get($ImportanceOfAuthorityPath);
        }

        $ChairmanWord = "";
        $ChairmanWordPath = "static_content\ChairmanWord";
        if (Storage::exists($ChairmanWordPath)) {
            $ChairmanWord = Storage::get($ChairmanWordPath);
        }

        $ChairmanWord = "";
        $ChairmanWordPath = "static_content\ChairmanWord";
        if (Storage::exists($ChairmanWordPath)) {
            $ChairmanWord = Storage::get($ChairmanWordPath);
        }

        $chairmanName = "";
        $chairmanNamePath = "static_content\AboutAuthority\chairmanName";
        if (Storage::exists($chairmanNamePath)) {
            $chairmanName = Storage::get($chairmanNamePath);
        }

        $map = "";
        $mapPath = "static_content\AboutAuthority\map";
        if (Storage::exists($mapPath)) {
            $map = Storage::get($mapPath);
        }

        $AuthorityLeaders = AuthorityLeaders::orderBy('order', 'asc')->get();
       // $image = $AuthorityLeaders->FullPathImage();

       $contents = "";
       $path = "static_content\AboutAuthority\HistoryOfAuthority";
       if (Storage::exists($path)) {
           $contents = Storage::get($path);
       }

        return view('backend.about_authority.AboutAuthority', compact('contents','AuthorityLeaders', 'ImportanceOfAuthority', 'ChairmanWord', 'chairmanName','map'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function HistoryOfAuthorityGet()
    {
        //
        $contents = "";
        $path = "static_content\AboutAuthority\HistoryOfAuthority";
        if (Storage::exists($path)) {
            $contents = Storage::get($path);
        }
        return view('backend.about_authority.HistoryOfAuthority', compact('contents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function HistoryOfAuthorityUpdate(Request $request)
    {
        //
        Storage::put('static_content\AboutAuthority\HistoryOfAuthority', $request->text);
        return redirect()->route('admin.about_authority.history_of_authority');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ChairmanWordUpdate(Request $request)
    {
        //return $request->all();
        //
        Storage::put('static_content\ChairmanWord', $request->text);
        return redirect()->route('admin.about_authority');
    }
    public function chairmanNameUpdate(Request $request)
    {
        //
        Storage::put('static_content\AboutAuthority\chairmanName', $request->text);
        return redirect()->route('admin.about_authority');
    }

    public function ImportanceOfAuthorityGet(){

        return redirect()->route('admin.about_authority');

    }


    public function ImportanceOfAuthorityUpdate(Request $request)
    {
        //
        Storage::put('static_content\AboutAuthority\ImportanceOfAuthority', $request->text);
        return redirect()->route('admin.about_authority');
    }

    public function ImportanceOfAuthorityImageUpdate(Request $request)
    {

        $validatedData = $request->validate([
            'image_file' => ['nullable', 'mimes:jpg', 'max:1700'],
        ]);

        if ($image_file = $request->file('image_file')) {
            $destinationPath = "aboutUs/ImportanceOfAuthorityImage.jpg";
            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image_file->getRealPath()));
        }

        return redirect()->route('admin.about_authority');
    }

    public function ChairmanWordImageUpdate(Request $request)
    {

        $validatedData = $request->validate([
            'image_file' => ['nullable', 'mimes:jpg', 'max:1700'],
        ]);

        if ($image_file = $request->file('image_file')) {
            $destinationPath = "aboutUs/chairmanImage.jpg";
            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image_file->getRealPath()));
        }

        return redirect()->route('admin.about_authority');
    }
    public function evolutionImageUpdate(Request $request)
    {

        $validatedData = $request->validate([
            'image_file' => ['nullable', 'mimes:png,jpg', 'max:1700'],
        ]);

        if ($image_file = $request->file('image_file')) {
            $destinationPath = "aboutUs/infograph.png";
            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image_file->getRealPath()));
        }

        return redirect()->route('admin.about_authority');
    }
    public function personsImageUpdate(Request $request)
    {

        $validatedData = $request->validate([
            'image_file' => ['nullable', 'mimes:png,jpg', 'max:1700'],
        ]);

        if ($image_file = $request->file('image_file')) {
            $destinationPath = "aboutUs/persons.png";
            $uploaded = Storage::put('public/' . $destinationPath, file_get_contents($image_file->getRealPath()));
        }

        return redirect()->route('admin.about_authority');
    }

    public function mapUpdate(Request $request)
    {
        //
        Storage::put('static_content\AboutAuthority\map', $request->text);
        return redirect()->route('admin.about_authority');
    }

    //
    //

    public function OrganizationalStructureGet()
    {
        //
        $contents = "";
        $path = "static_content\AboutAuthority\OrganizationalStructure";
        if (Storage::exists($path)) {
            $contents = Storage::get($path);
        }
        return view('backend.about_authority.OrganizationalStructure', compact('contents'));
    }
    public function OrganizationalStructureUpdate(Request $request)
    {
        //
        Storage::put('static_content\AboutAuthority\OrganizationalStructure', $request->text);
        return redirect()->route('admin.about_authority.organizational_structure');
    }


     public function storeContactUs(Request $request){
        //return $request->all();
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'message' => ['required'],
        ]);

        $contact = contact_us::create($validatedData);

        session()->flash('success' , 'تم ارسال رسالتك بنجاح');

        return redirect()->route('frontend.contact-us');


    }

    public function getContactUs(){
        $contact = contact_us::orderBy("id", "desc")->get();

        return view('backend.contact.index', compact('contact'));
    }







}
