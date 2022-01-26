@extends('frontend.layout.main')

@section('body')

<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>المناطق</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item active" aria-current="page">المناطق</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="regions">
        <div class="container">
            <div class="row">
                @foreach ($Regions as $Region)
                <div class="col-xs-12 col-md-6">
                    <div class="region">
                        <div class="info vertical-line">
                            <h5>{{$Region->name}}</h5>
                            <div class="row">
                                <div class="col-4">
                                    <p>قائد المنطقة</p>
                                    <p>التليفون</p>
                                    <p>فاكس المنطقة</p>
                                </div>
                                <div class="col-8">
                                    <p>{{$Region->chief_name}}</p>
                                    <p>{{$Region->telephone}}</p>
                                    <p>{{$Region->fax}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <a href="{{route('frontend.region.detail', $Region->id)}}">التفاصيل</a>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

    <div class="pages">
        {{$Regions->links()}}
    </div>

</section>


@endsection
