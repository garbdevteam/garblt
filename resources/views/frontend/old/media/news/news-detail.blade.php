@extends('frontend.layout')

@section('body')

<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>{{$News->title}}</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item"><a href="{{route('frontend.news.index')}}">الاخبار</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$News->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="news-detail">
        <div class="container">
            <p class="date">{{Carbon\Carbon::parse($News->news_date)->locale('ar_EG')->isoFormat("DD  MMMM  Y")}}</p>
        <h3>{{$News->title}}</h3>
            <div class="row">
                <div class="col-12">
                <img src="{{route('frontend.news.full_image', $News->id)}}" alt="not found">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p class="desc">{{$News->description}}</p>
                </div>
            </div>

        </div>
    </div>


</section>


@endsection
