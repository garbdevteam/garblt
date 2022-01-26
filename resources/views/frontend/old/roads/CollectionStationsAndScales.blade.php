@extends('frontend.layout')

@section('body')
<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>محطات التحصيل والموازين</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item">طرق</li>
                        <li class="breadcrumb-item active" aria-current="page">محطات التحصيل والموازين</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="leaders traffic">
        <div class="container">
            <div class="row">

                @foreach ($CollectionStationsAndScales as $CollectionStationsAndScale)
                <div class="col-xs-12 col-md-6">
                    <div class="adv">
                        <div class="row ">
                            <div class="col-7 vertical-line">
                                <h5>{{$CollectionStationsAndScale->title}}</h5>
                                <div class="details">
                                    <div class="row">
                                        <div class="col-3">
                                            <p>الوصف</p>
                                        </div>
                                        <div class="col-9">
                                            <p style="overflow: hidden;">{{$CollectionStationsAndScale->description}}</p>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <p>الموقع</p>
                                        </div>
                                        <div class="col-9">
                                            <p style="overflow: hidden;">{{$CollectionStationsAndScale->location}}</p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <p>الاشتراك</p>
                                        </div>
                                        <div class="col-9">
                                            <p style="overflow: hidden;">{{$CollectionStationsAndScale->subscription}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <p>التحصيل</p>
                                        </div>
                                        <div class="col-9">
                                            <p style="overflow: hidden;">{{$CollectionStationsAndScale->tariff}}</p>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    {{$CollectionStationsAndScales->links()}}
                </div>
            </div>
        </div>
    </div>

</section>




@endsection
