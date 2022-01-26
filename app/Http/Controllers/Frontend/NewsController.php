<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $News = News::paginate(20);
        return view('frontend.media.news.news',compact('News'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        setLocale(LC_TIME, "ar_EG");
        Carbon::setLocale('ar_EG');
        $News = News::findOrFail($id);
        return view('frontend.media.news.news-detail', compact('News'));
    }

            /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetFullImage($news_id)
    {
        $News = News::findOrFail($news_id);
        $path = "public/news/full.jpg";
        if ($News->full_image != null) {
            $exists = Storage::exists($News->full_image);
            if ($exists) {
                $path = $News->full_image;
            }
        }
        $file = Storage::get($path);
        $mimeType = Storage::mimeType($path);
        return response($file, 200)
            ->header('Content-Type', $mimeType);

    }

    public function GetThumbnailImage($news_id)
    {
        $News = News::findOrFail($news_id);
        $path = "public/news/thumb.jpg";

        if ($News->thumbnail_image != null) {
            $exists = Storage::exists($News->thumbnail_image);
            if ($exists) {
                $path = $News->thumbnail_image;
            }
        }
        $file = Storage::get($path);
        $mimeType = Storage::mimeType($path);
        return response($file, 200)
            ->header('Content-Type', $mimeType);
    }

}
