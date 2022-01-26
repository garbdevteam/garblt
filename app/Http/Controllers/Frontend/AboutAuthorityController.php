<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AuthorityLeaders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutAuthorityController extends Controller
{
    public function aboutUs()
    {
        $AuthorityLeaders = AuthorityLeaders::orderBy('order', 'asc')->get();

        $ImportanceOfAuthority ="";
        $ImportanceOfAuthorityPath = "static_content\AboutAuthority\ImportanceOfAuthority";
        if (Storage::exists($ImportanceOfAuthorityPath)) {
            $ImportanceOfAuthority = Storage::get($ImportanceOfAuthorityPath);
        }

        $ChairmanWord ="";
        $ChairmanWordPath = "static_content\ChairmanWord";
        if (Storage::exists($ChairmanWordPath)) {
            $ChairmanWord = Storage::get($ChairmanWordPath);
        }

        $chairmanName ="";
        $chairmanNamePath = "static_content\AboutAuthority\chairmanName";
        if (Storage::exists($chairmanNamePath)) {
            $chairmanName = Storage::get($chairmanNamePath);
        }
        $map = "";
        $mapPath = "static_content\AboutAuthority\map";
        if (Storage::exists($mapPath)) {
            $map = Storage::get($mapPath);
        }

        $authorityhistory = "";
        $authorityhistorypath = "static_content\AboutAuthority\HistoryOfAuthority";
        if (Storage::exists($authorityhistorypath)) {
            $authorityhistory = Storage::get($authorityhistorypath);
        }
        

        return view('frontend.about-us.index', compact('AuthorityLeaders','ImportanceOfAuthority','ChairmanWord','chairmanName','map','authorityhistory'));
    }

    






}
