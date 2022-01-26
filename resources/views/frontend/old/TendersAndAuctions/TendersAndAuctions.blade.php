@extends('frontend.layout')

@section('body')

<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>المناقصات والمزادات</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}"> الرئيسية </a></li>
                        <li class="breadcrumb-item active" aria-current="page">مناقصات ومزادات</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="regions">
        <div class="container">
            <div class="row">
                @if ($TendersAndAuctions->count() == 0)

                <div class="col-xs-12 col-md-6">
                    <div class="region">
                        <div class="info vertical-line">
                            <h5>لا يوجد مناقصات ومزادات حالية</h5>
                        </div>
                    </div>
                </div>

                @else
                @foreach ($TendersAndAuctions as $TendersAndAuction)

                <div class="col-xs-12 col-md-6">
                    <div class="region">
                        <div class="info vertical-line">
                            <h5>{{$TendersAndAuction->name}}</h5>
                            <div class="row">
                                <div class="col-4">
                                    <p>رقم المناقصة / مزاد</p>
                                    <p>تاريخ الانتهاء</p>
                                    <p>ملف الاعلان</p>
                                </div>
                                <div class="col-8">
                                    <p>{{$TendersAndAuction->number}}</p>
                                    <p>{{$TendersAndAuction->end_date}}</p>
                                    <p><a href="{{$TendersAndAuction->FullPathFile}}" target="_blank">التفاصيل</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


                @endif



            </div>
        </div>
    </div>

</section>
@endsection
