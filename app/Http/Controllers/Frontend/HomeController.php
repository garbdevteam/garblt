<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NationalRoadsProject;
use App\Models\News;
use App\Models\Services;
use App\Models\ImageAssets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $ImportanceOfAuthority ="";
        $ImportanceOfAuthorityPath = "static_content\AboutAuthority\ImportanceOfAuthority";
        if (Storage::exists($ImportanceOfAuthorityPath)) {
            $ImportanceOfAuthority = Storage::get($ImportanceOfAuthorityPath);
        }

        $map = "";
        $mapPath = "static_content\AboutAuthority\map";
        if (Storage::exists($mapPath)) {
            $map = Storage::get($mapPath);
        }

        // dd(Hash::make("Q;E?s@aOQl!Fn*aa"));
        $News = News::orderBy('id', "desc")->take(9)->get();
        $services = Services::orderBy('id', "desc")->take(3)->get();
        $projects = NationalRoadsProject::orderBy('id',"desc")->take(3)->get();
        $media = ImageAssets::orderBy('id', "desc")->take(6)->get();
        return view('frontend.home.index',compact('News','ImportanceOfAuthority', 'services', 'projects', 'map', 'media'));
    }

    public function footer(){

        $ImportanceOfAuthority ="";
        $ImportanceOfAuthorityPath = "static_content\AboutAuthority\ImportanceOfAuthority";
        if (Storage::exists($ImportanceOfAuthorityPath)) {
            $ImportanceOfAuthority = Storage::get($ImportanceOfAuthorityPath);
        }

        return view('frontend.layout.main', compact('ImportanceOfAuthority'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
