@extends('frontend.layout.main')

@section('content')
<section class="road-safety">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">المركز الاعلامى</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('frontend.news.index') }}" style="color: #016599">الاخبار</a></li>
            </ol>
        </nav>
        <h2 class="heading">تفاصيل الخبر</h2>
<br>
        <div class="single-tender">
            <h2 class="heading"> {{$News->title}}</h2>
            <div class="time">
                <img src="{{ url('frontend\images\icons\clock.svg')}}" alt="">
                <span>
                   {{ $News->news_date}}
                </span>
            </div>

            <div class="conditions text-center">
                <div class="row">
                    <div class="col">
                        <h4>{{$News->title}}</h4>
                        <br>
                        <img src="{{ asset(route('admin.news.thumb_image', $News->id)) }}" alt="">
                    </div>
                </div>
                <br>
                <div class="row">



                </div>
            </div>

            <div class="desc">
                <p style="text-align:center">{{$News->description}}</p>

            </div>

        </div>



    </div>
</section>


@endsection
