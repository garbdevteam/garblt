@extends('frontend.layout')

@section('body')
<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>المناطق</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item"><a href="{{route('frontend.region')}}">المناطق </a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$Region->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="region-13">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="info">
                        <div class="row">
                            <div class="col-4 col-md-2">
                                <div class="main">
                                    <p>أسم المنطقة</p>
                                    <p>اسم قائد المنطقة</p>
                                    <p>تليفون المنطقة</p>
                                    <p>فاكس المنطقة</p>
                                </div>
                            </div>
                            <div class="col-8 col-md-10">
                                <div class="desc">
                                    <p>{{$Region->name}}</p>

                                    <p>{{$Region->chief_name}}</p>
                                    <p>{{$Region->telephone}}</p>
                                    <p>{{$Region->fax}}</p>

                                </div>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col-6">
                                <div class="projects">
                                    <h5>مشروعات الطرق</h5>
                                    <a href="{{route('frontend.region.roads', $Region->id)}}">اضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="projects">
                                    <h5>مشروعات الكباري</h5>
                                <a href="{{route('frontend.region.bridges', $Region->id)}}">اضغط هنا</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

@endsection
