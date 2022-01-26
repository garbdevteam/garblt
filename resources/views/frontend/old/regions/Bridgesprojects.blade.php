@extends('frontend.layout')

@section('body')
<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>مشروعات الكباري المنفذة</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{route('frontend.region.detail', $region_id)}}">المناطق</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> مشروعات الكباري المنفذة بالمنطقة</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <p class="roads-desc text-center">أهم المشروعات الكباري المنفذة بالمنطقة</p>
    </div>

    <div class="roads">
        <div class="container">
            @foreach ($Bridges as $Bridge)
            <div class="row">
                <div class="col-12">
                    <div class="road project ">
                        <div class="row">
                            <div class="col-9" style="padding-right:30px;">
                                <p>
                                    <span>اسم المشروع :</span>
                                    <span> {{$Bridge->name}}</span>
                                </p>
                                <p>
                                    <span>موقع المشروع :</span>
                                    <span> {{$Bridge->location}}</span>
                                </p>
                                <p>
                                    <span>طول الكوبري :</span>
                                    <span> {{$Bridge->length}}</span>
                                </p>
                                <p>
                                    <span>حمولة الكوبري :</span>
                                    <span> {{$Bridge->bridge_load}}</span>
                                </p>
                                <p>
                                    <span>تكلفة الكوبري :</span>
                                    <span> {{$Bridge->cost}}</span>
                                </p>
                            </div>

                            <div class="col-3 image-container">
                                <img class="project-image" src="{{$Bridge->FullPathImage}}" alt="not found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            <br>
        </div>
    </div>

</section>

@endsection
