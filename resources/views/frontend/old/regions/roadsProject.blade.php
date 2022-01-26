@extends('frontend.layout')

@section('body')
<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>مشروعات الطرق المنفذة بالمنطقة</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{route('frontend.region.detail', $region_id)}}">المناطق</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> مشروعات الطرق المنفذة بالمنطقة</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <p class="roads-desc">مشروعات الطرق التى تم تنفيذها بالمنطقة</p>
    </div>

    <div class="roads">
        <div class="container">

            @foreach ($Roads as $Road)
            <div class="row">
                <div class="col-12">
                    <div class="road">
                        <div class="row" style="padding-right:30px;">
                            <div class="col-9 road-info">
                                <p>
                                    <span>اسم المشروع :</span>
                                    <span> {{$Road->name}}</span>
                                </p>
                                <p>
                                    <span>موقع المشروع :</span>
                                    <span> {{$Road->location}}</span>
                                </p>
                                <p>
                                    <span>طول الطريق :</span>
                                    <span> {{$Road->length}}</span>
                                </p>
                            </div>

                            <div class="col-3">
                                <img class="project-image" src="{{$Road->FullPathImage}}" alt="not found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            <br><br>

        </div>
    </div>

</section>
@endsection
