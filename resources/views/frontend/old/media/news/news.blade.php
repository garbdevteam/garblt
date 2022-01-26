@extends('frontend.layout')

@section('body')

<section class="main-news">
    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>الاخبار</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item active" aria-current="page">الاخبار</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="news-items">
        <div class="container">
            @foreach ($News as $NewsItem)
            <div class="news-item">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="{{route('frontend.news.thumb_image', $NewsItem->id)}}" alt="">
                    </div>
                    <div class="col-12 col-md-7">
                        <p>{{Carbon\Carbon::parse($NewsItem->news_date)->locale('ar_EG')->isoFormat("DD  MMMM  Y")}}</p>
                        <h4><a href="{{route('frontend.news.detail', $NewsItem->id)}}">{{$NewsItem->title}}</a></h4>
                        <p>
                            {{Str::limit($NewsItem->description, 450, '...')}}
                            <a href="{{route('frontend.news.detail', $NewsItem->id)}}"
                                style="color:#0062cc; text-align:left;">المزيد</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-10">
                    <hr>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="pages">
        {{$News->links()}}
    </div>

</section>


@endsection
