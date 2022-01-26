<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $News = News::paginate(30);
        return view('backend.news.index', compact('News'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'news_date.day' => ['required'],
            'news_date.month' => ['required'],
            'news_date.year' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            //'image' => ['required', 'dimensions:min_width=1050,min_height=660,max_width=1050,max_height=660', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);
        if ($validatedData['news_date']) {
            if (!checkdate(request()->news_date['month'], request()->news_date['day'], request()->news_date['year'])) {
                return redirect()->back()->withErrors(['خطأ بتاريخ الخبر']);
            }
            $validatedData['news_date'] = request()->news_date['year'] . "-" . request()->news_date['month'] . "-" . request()->news_date['day'];
        }

        $News = News::create($validatedData);

        if ($image = $request->file('image')) {

            $destinationPath = 'news/' . $News->id . "/";

            $fileName = 'full.' . $image->getClientOriginalExtension();
            $uploaded = Storage::put($destinationPath . $fileName, file_get_contents($image->getRealPath()));

            $News->update([
                'full_image' => $destinationPath . $fileName,
            ]);

            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(350, 220, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::put($destinationPath . "thumbnail." . $image->getClientOriginalExtension(), (string) $resize_image->encode());
            $News->update([
                'thumbnail_image' => $destinationPath . "thumbnail." . $image->getClientOriginalExtension(),
            ]);

        }

        return redirect()->route('admin.news.index');
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
        $path = "news/full.jpg";
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
        $path = "news/thumb.jpg";

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $News = News::findOrFail($id);
        return view('backend.news.show', compact('News'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $News = News::findOrFail($id);
        return view('backend.news.edit', compact('News'));

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
        $News = News::findOrFail($id);

        $validatedData = $request->validate([
            'news_date.day' => ['nullable'],
            'news_date.month' => ['nullable'],
            'news_date.year' => ['nullable'],
            'title' => ['nullable'],
            'description' => ['nullable'],
           // 'image' => ['nullable', 'dimensions:min_width=1050,min_height=660,max_width=1050,max_height=660', 'mimes:jpeg,jpg,png,gif', 'max:1700'],
        ]);
        if ($validatedData['news_date']) {
            if (!checkdate(request()->news_date['month'], request()->news_date['day'], request()->news_date['year'])) {
                return redirect()->back()->withErrors(['خطأ بتاريخ الخبر']);
            }
            $validatedData['news_date'] = request()->news_date['year'] . "-" . request()->news_date['month'] . "-" . request()->news_date['day'];
        }

        $News->update($validatedData);

        if ($image = $request->file('image')) {

            $destinationPath = 'news/' . $News->id . "/";

            $fileName = 'full.' . $image->getClientOriginalExtension();
            $uploaded = Storage::put($destinationPath . $fileName, file_get_contents($image->getRealPath()));

            $News->update([
                'full_image' => $destinationPath . $fileName,
            ]);

            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(350, 220, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::put($destinationPath . "thumbnail." . $image->getClientOriginalExtension(), (string) $resize_image->encode());
            $News->update([
                'thumbnail_image' => $destinationPath . "thumbnail." . $image->getClientOriginalExtension(),
            ]);

        }

        return redirect()->route('admin.news.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $News = News::findOrFail($id);

        $DirectoryArray = explode("/",$News->thumbnail_image);
        array_pop($DirectoryArray);
        $DirectoryPath = implode("/",$DirectoryArray);
        if (Storage::exists($DirectoryPath)) {
            Storage::deleteDirectory($DirectoryPath);
        }
        $News->delete();
        return redirect()->route('admin.news.index');

    }
}
